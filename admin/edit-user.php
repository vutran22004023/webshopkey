<?php
session_start(); // Khởi động phiên

require_once('../model/connect.php');

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Truy vấn thông tin người dùng từ cơ sở dữ liệu
    $query = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit();
    }

    if (isset($_POST['edit'])) {
        // Người dùng nhấn nút "Chỉnh sửa", cho phép chỉnh sửa thông tin
        $isEditing = true;
    } elseif (isset($_POST['update'])) {
        // Người dùng đã chỉnh sửa thông tin, cập nhật vào cơ sở dữ liệu
        $newName = $_POST['new-name'];
        $newEmail = $_POST['new-email'];

        $updateQuery = "UPDATE users SET username=?, email=? WHERE id=?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param('ssi', $newName, $newEmail, $userId);

        if ($updateStmt->execute()) {
            // Cập nhật thành công, cập nhật thông tin trong phiên
            $_SESSION['name'] = $newName;
            $_SESSION['email'] = $newEmail;
            header("Location: edit-user.php?thanhcong"); // Để tải lại trang
            exit();
        } else {
            echo "Error updating user information: " . $conn->error;
        }
    }
} else {
    // Người dùng chưa đăng nhập, điều hướng đến trang đăng nhập hoặc trang chính
    header("Location: login.php"); // Thay thế "login.php" bằng trang đăng nhập của bạn
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>
<header>
    <div class="header-top"></div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid" style="height: 90px;">
            <a class="navbar-brand" href="#">
                <img src="./images/logo/black-green-futuristic-game-logo-1.png" width="100" height="90" alt="">
            </a>
            <div class="container-fluid d-flex">
                <form class="d-flex" action="search.php" method="POST">
                    <input class="form-control me-2" style="margin-left: 30px;width: 300px;" name="name-product" placeholder="What do you need?">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="login container-fluid " style="margin-left: 300px;">
                <?php

                if (!empty($_SESSION['username'])) {

                ?>
                    <li style="list-style: none; font-size: 20px" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./edit-user.php">Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="#">Đơn hàng đã đặt</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./logout.php">Đăng xuất</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <i class="fa-solid fa-user"></i>
                    <a href="../admin/Login.php">Đăng Nhập</a>
                    <span>/</span>
                    <a href="../admin//Register.php">Đăng ký</a>
                <?php } ?>


            </div>

            <button class="cart container-fluid " style="border-radius: 10px; width: 450px; height: 60px; margin-right: 20px;">
                <a href="./view-cart.php" style="color: #000">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Giỏ Hàng</span>
                </a>
            </button>
        </div>
    </nav>
    <nav class="nav navbar  navbar-light" style="background-color: #625D5D; padding: 0;">
        <ul class="nav" style="margin-left: 40px;">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">Disabled</a>
            </li>
        </ul>
    </nav>
</header>
    <h1>User Profile</h1>
    <form method="POST">
    <!-- <fieldset disabled> -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="new-name" value="<?php echo $user['username']; ?>" <?php if(isset($isEditing)) echo "disabled"; ?>><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="new-email" value="<?php echo $user['email']; ?>" <?php if(isset($isEditing)) echo "disabled"; ?>><br>
        <!-- </fieldset> -->
        


        <?php if(isset($isEditing)): ?>
            <input type="submit" name="update" value="Thay đổi thành công">
        <?php else: ?>
            <input type="submit" name="edit" value="chỉnh sửa">
        <?php endif; ?>
    </form>

    <!-- Nút hoặc biểu tượng để quay lại trang chính hoặc trang khác -->
    <a href="index.php">Quay lại trang chính</a>
    <?php include ('../admin/footer.php') ?>
</body>
</html>
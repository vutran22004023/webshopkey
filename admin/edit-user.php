<?php
session_start(); // Khởi động phiên

require_once('../model/connect.php');

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['username'])) {
    $userId = $_SESSION['id-user'];

    // Truy vấn thông tin người dùng từ cơ sở dữ liệu bằng ID
    $query = "SELECT * FROM users WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $userId);
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
        $newFullname = $_POST['new-fullname'];
        $newUsername = $_POST['new-username'];
        $newEmail = $_POST['new-email'];
        $newAddress = $_POST['new-address'];
        $newPhone = $_POST['new-phone'];
        $newPassword = $_POST['new-password'];
        $userId = $user['id']; // Lấy ID người dùng từ kết quả truy vấn

        $updateQuery = "UPDATE users SET fullname=?, username=?, email=?, address=?, phone=?, password=? WHERE id=?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param('ssssssi', $newFullname, $newUsername, $newEmail, $newAddress, $newPhone, $newPassword, $userId);

        if ($updateStmt->execute()) {
            // Cập nhật thành công, cập nhật thông tin trong phiên
            $_SESSION['fullname'] = $newFullname;
            $_SESSION['username'] = $newUsername;
            $_SESSION['email'] = $newEmail;
            $_SESSION['address'] = $newAddress;
            $_SESSION['phone'] = $newPhone;
            $_SESSION['password'] = $newPassword;
            header("Location:edit-user.php?thanhcong"); // Để tải lại trang
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
    <link rel="stylesheet" href="./css/edit-user.css">
</head>

<body>
    <header>
        <div class="header-top"></div>
        <nav class="navbar navbar-expand-lg" style="background-color: #d9d8d8;">
            <div class="container-fluid" style="height: 90px;">
                <a class="navbar-brand" href="./home.php">
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
                                <li><a class="dropdown-item" href="./order-list.php">Đơn hàng đã đặt</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./logout.php">Đăng xuất</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <i class="fa-solid fa-user"></i>
                        <a style="text-decoration: none; color:#000;" href="../admin/Login.php">Đăng Nhập</a>
                        <span>/</span>
                        <a style="text-decoration: none; color: #000;" href="../admin/Register.php">Đăng ký</a>
                    <?php } ?>


                </div>

                <button class="cart container-fluid " style="border-radius: 10px; width: 450px; height: 60px; margin-right: 20px;">
                    <a href="./view-cart.php" style="color: #000;text-decoration: none;">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Giỏ Hàng</span>
                    </a>
                </button>
            </div>
        </nav>
        <nav class="nav navbar  navbar-light" style="background-color: #625D5D; padding: 0;">
            <ul class="nav" style="margin-left: 40px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./home.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./category.php">Thể Loại</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact.php">Liên Hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Disabled</a>
                </li>
            </ul>
        </nav>
    </header>
    <h1>Thông tin cá Nhân</h1>
    <?php if (isset($isEditing)) : ?>
        <!-- Form chỉnh sửa thông tin -->
        <div class="form">
            <form method="POST">
                <label for="new-fullname">Full Name:</label>
                <input type="text" id="new-fullname" name="new-fullname" value="<?php echo $user['fullname']; ?>"><br>

                <label for="new-username">Username:</label>
                <input type="text" id="new-username" name="new-username" value="<?php echo $user['username']; ?>"><br>

                <label for="new-email">Email:</label>
                <input type="email" id="new-email" name="new-email" value="<?php echo $user['email']; ?>"><br>

                <label for="new-address">Address:</label>
                <input type="text" id="new-address" name="new-address" value="<?php echo $user['address']; ?>"><br>

                <label for="new-phone">Phone:</label>
                <input type="number" id="new-phone" name="new-phone" value="<?php echo $user['phone']; ?>"><br>

                <label for="new-password">Password:</label>
                <input type="password" id="new-password" name="new-password" value="<?php echo $user['password']; ?>"><br>

                <!-- Các trường thông tin khác -->

                <input type="submit" name="update" value="Update">
            </form>
        </div>
    <?php else : ?>
        <div class="form">
            <!-- Hiển thị thông tin người dùng -->
            <p><strong>Full Name:</strong> <?php echo $user['fullname']; ?></p>
            <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
            <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
            <p><strong>Password:</strong> <?php echo $user['password']; ?></p>
            <!-- Hiển thị các trường thông tin khác -->

            <form method="POST">
                <input type="submit" name="edit" value="Edit">
            </form>
        </div>
    <?php endif; ?>

    <?php include('../admin/footer.php') ?>
</body>

</html>
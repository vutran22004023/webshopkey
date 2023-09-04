<?php
require_once('../model/connect.php');

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Sử dụng MySQLi với Prepared Statements để ngăn chặn SQL Injection
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $product = $result->fetch_assoc();
    } else {
        // Xử lý trường hợp không tìm thấy sản phẩm
        echo "Product not found.";
        exit();
    }
} else {
    // Xử lý trường hợp không có ID sản phẩm được truyền
    echo "Product ID not provided.";
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
    <link rel="stylesheet" href="./css/Product-details.css">
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
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" style="margin-left: 30px;width: 300px;" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>

                    </div>
                    <div class="login container-fluid " style="margin-left: 300px;">
                        <i class="fa-solid fa-user"></i>
                        <a href="">Đăng Nhập</a>
                        <span>/</span>
                        <a href="">Đăng ký</a>
                    </div>

                    <button class="cart container-fluid " style="border-radius: 10px; width: 450px; height: 60px; margin-right: 20px;">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Giỏ Hàng</span>
                    </button>
                </div>
            </nav>
            <nav class="nav navbar  navbar-light" style="background-color: #625D5D; padding: 0;">
                <ul class="nav" style="margin-left: 40px;">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="#" >Disabled</a>
                    </li>
                  </ul>
              </nav>
        </header>

        <div class="containers">
            <div class="content">
                <div class="item-left">
                    <img src="/images (1)/add/9.jpg" width="500" height="300" style="border-radius: 10px ;" alt="">
                </div>
                <div class="item-right">
                    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                    <div class="item-text">
                        <p>Trạng thái: còn hàng</p>
                        <p>Thể loại:...</p>
                        <p>Giá: <?php echo htmlspecialchars($product['price']); ?> đ</p>
                        <h4>Chọn gói sản phẩm</h4>
                        <div class="package">
                            <div>
                                <button>TK Thường</button>
                            </div>
                            <div>
                                <button>TK Pro</button>
                            </div>
                        </div>

                        <div class="pay">
                            <div class="buy">
                                <button>
                                    <i class="fa-solid fa-credit-card"></i> Mua ngay
                                </button>
                            </div>
                            
                            <div class="add-cart">
                                <button>
                                    <i class="fa-solid fa-cart-shopping"></i> Thêm vào Giỏ Hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../model/connect.php';
?>

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
                            <li><a class="dropdown-item" href="./viewed_products.php">Lịch sử xem</a></li>
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
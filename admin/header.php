<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../model/connect.php';
?>

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
                    <li style="list-style: none;" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
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
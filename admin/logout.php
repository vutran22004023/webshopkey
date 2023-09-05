<?php
session_start(); // Khởi động phiên

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['username'])) {
    // Hủy bỏ phiên hiện tại
    session_destroy();
    // Điều hướng người dùng đến trang đăng nhập hoặc trang chính
    header("Location: home.php"); // Thay thế "login.php" bằng trang đăng nhập của bạn
    exit(); // Kết thúc script
} else {
    // Người dùng chưa đăng nhập, điều hướng về trang chính hoặc trang đăng nhập
    header("Location: index.php"); // Thay thế "index.php" bằng trang chính của bạn
    exit(); // Kết thúc script
}
?>
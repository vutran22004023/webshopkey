<?php
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED);
    require_once 'C:\Users\Acer\Documents\Zalo Received Files\baitap_session\webshopkey\model\connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit']))
    {
        if (isset($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        }

        if (isset($_POST['username'])) {
            $username = $_POST['username'];
        }

        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }

        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }

        if (isset($_POST['confirmPassword'])) {
            $confirmPassword = $_POST['confirmPassword'];
        }
        // Kiểm tra mật khẩu và mật khẩu xác nhận
        if ($password !== $confirmPassword) {
            echo "Mật khẩu xác nhận không khớp.";
            exit;
        }  

        $confirmPassword = password_hash($password, PASSWORD_DEFAULT);
        



        $sql = "INSERT INTO users (fullname, username ,password, email,role)
                VALUES ('$fullname', '$username','$password', '$email', 1)";
        $res = mysqli_query($conn,$sql);
        if ($res)   
        {
            $_SESSION['username'] = $username;
            echo '<script>alert("Đăng nhập thành công!");</script>';
            header("location:Login.php?rf=success");
            exit();
        }
        else 
        {
            echo '<script>alert("Đăng ký không thành công!");</script>';
            header("location:Register.php?rf=erorr");
        }
    }
}
?>

<?php
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED);
    require_once '../model/connect.php';  

    if (isset($_POST['submit']))
    {
        
        $password = $_POST['password'];
        $username = $_POST['username'];
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn,$sql);
        $rows = mysqli_num_rows($res);
        if ($rows > 0) {
            $_SESSION['username'] = $username;
            header('Location:home.php?ls=success');
            exit();
            
            
        }else {
            $_SESSION['error'] ="Ten dang nhap mat khau ko dung";
            header('Location:Login.php?error=0');
            exit();
        }

    
    } 
?>

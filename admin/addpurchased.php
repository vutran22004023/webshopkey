<?php
    session_start();
    $id = $_GET['id'];
    $prd = NULL;
    
    if (isset($_SESSION['purchased'][$id]))
    {
        $prd = $_SESSION['purchased'][$id] + 1;
    }
    else
    {
        $prd = 1;
    }

    $_SESSION['purchased'][$id] = $prd;
    $sl = $_SESSION['purchased'];
    header('location:./home.php');
?>


<?php
require_once('../model/connect.php');
$render = "";
    $sql = "SELECT id,image,name,price FROM products WHERE category_id=1  AND status = 0";
    $result = mysqli_query($conn, $sql);

    while ($kq = mysqli_fetch_assoc($result)) {
        $render .= '
            <div class="card" style="width: 18rem; margin-bottom:20px;">
            <img src="' . $kq['image'] . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $kq['name'] . '</h5>
                <p class="card-text">' . $kq["price"] . '</p>
                <a href="Product-details.php?id=' . $kq['id'] . '" class="btn btn-primary">Chi Tiết</a>
                <a href="addcart.php?id=' . $kq['id'] . '" class="btn btn-primary">Thêm vào giỏ hàng</a>
            </div>
        </div>
            ';
    }
    $sql = "SELECT id,image,name,price FROM products WHERE category_id=2  AND status = 0";
    $result = mysqli_query($conn, $sql);

    while ($kq = mysqli_fetch_assoc($result)) {
        $render .= '
            <div class="card" style="width: 18rem; margin-bottom:20px;">
            <img src="' . $kq['image'] . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $kq['name'] . '</h5>
                <p class="card-text">' . $kq["price"] . '</p>
                <a href="Product-details.php?id=' . $kq['id'] . '" class="btn btn-primary">Chi Tiết</a>
                <a href="addcart.php?id=' . $kq['id'] . '" class="btn btn-primary">Thêm vào giỏ hàng</a>
            </div>
        </div>
            ';
    } 
    $sql = "SELECT id,image,name,price FROM products WHERE category_id=3  AND status = 0";
    $result = mysqli_query($conn, $sql);

    while ($kq = mysqli_fetch_assoc($result)) {
        $render .= '
            <div class="card" style="width: 18rem; margin-bottom:20px;">
            <img src="' . $kq['image'] . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $kq['name'] . '</h5>
                <p class="card-text">' . $kq["price"] . '</p>
                <a href="Product-details.php?id=' . $kq['id'] . '" class="btn btn-primary">Chi Tiết</a>
                <a href="addcart.php?id=' . $kq['id'] . '" class="btn btn-primary">Thêm vào giỏ hàng</a>
            </div>
        </div>
            ';
    } 


$conn->close();
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
</head>

<body>
    <?php include('../admin/header.php') ?>

    <div class="slider">
        <div class="contents" >
            
            <div class="cards" style="width: 18rem; margin-bottom:20px;display: grid;grid-template-columns: repeat(4, 300px);">
                <?php echo $render; ?>
            </div>
        </div>
    </div>

    <?php include('../admin/footer.php') ?>
</body>

</html>
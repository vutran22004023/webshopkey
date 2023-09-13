<?php
require_once('../model/connect.php');
$render = "";
if (isset($_POST['name-product'])) {
    $query = "SELECT * from products where name like '%" . $_POST['name-product'] . "%'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)) {
        while ($table = mysqli_fetch_array($result)) {
            $render .= '
            <div class="card" style="width: 18rem; margin-bottom:20px;">
            <img src="' . $table['image'] . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $table['name'] . '</h5>
                <p class="card-text">' . $table["price"] . '</p>
                <a href="Product-details.php?id=' . $table['id'] . '" class="btn btn-primary">Chi Tiết</a>
                <a href="addcart.php?id=' . $table['id'] . '" class="btn btn-primary">Thêm vào giỏ hàng</a>
            </div>
        </div>
            ';
        }
    }
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
</head>

<body>
<?php include ('../admin/header.php') ?>

    <div class="slider">
        <div class="contents" style="margin-top: 50px;">
            <div class="title" style="text-align: center;margin-bottom: 20px;" >
                <h2>Tìm kiếm sản phẩm</h2>
            </div>
            <div class="cards" style="width: 18rem; text-align: center;">
                <?php echo $render; ?>
            </div>
        </div>
    </div>

    <?php include ('../admin/footer.php') ?>
</body>

</html>
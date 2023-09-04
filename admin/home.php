<?php
require_once '../model/connect.php';
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
    <link rel="stylesheet" href="./css/home.css">
</head>

<body>
    <?php include ('../admin/header.php') ?>
        
    <div class="slider">
        <div class="content">
            <div class="section">
                <div class="section-slider-left">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="./images/add/10.jpg" class="d-block w-100" style="border-radius: 10px;" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="./images/game/1.png" class="d-block w-100" style="border-radius: 10px;" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./images/office/11.jpg" class="d-block w-100" style="border-radius: 10px;" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="section-slider-right">
                    <div class="section-slider-img">
                        <img src="./images/office/12.jpg" alt="">
                    </div>
                    <div class="section-slider-img">
                        <img src="./images/add/9.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="section-slider-bottom">
                <div class="section-slider-bootom-img">
                    <img src="./images/game/6.png" alt="">
                </div>
                <div class="section-slider-bootom-img">
                    <img src="./images/game/1.png" alt="">
                </div>
                <div class="section-slider-bootom-img">
                    <img src="./images/game/2.png" alt="">
                </div>
            </div>
        </div>
    </div>


    <div class="slider">
        <div class="contents">
            <div class="title">
                <h2>Window Bản Quyền</h2>
            </div>
            <div class="carts">
                <?php
                $sql = "SELECT id,image,name,price FROM products WHERE category_id=1 AND status = 0";
                $result = mysqli_query($conn, $sql);

                while ($kq = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="card" style="width: 18rem; margin-bottom:20px;">
                        <img src="<?php echo $kq['image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $kq['name']; ?></h5>
                            <p class="card-text"><?php echo $kq['price']; ?><sup> đ</sup></p>
                            <a href="Product-details.php?id= <?php echo $kq['id']; ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>

    <div class="slider">
        <div class="contents">
            <div class="title">
                <h2>Window Bản Quyền</h2>
            </div>
            <div class="carts">
                <?php
                $sql = "SELECT id,image,name,price FROM products WHERE category_id=2 AND status = 0";
                $result = mysqli_query($conn, $sql);

                while ($kq = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="card" style="width: 18rem; margin-bottom:20px;">
                        <img src="<?php echo $kq['image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $kq['name']; ?></h5>
                            <p class="card-text"><?php echo $kq['price']; ?><sup> đ</sup></p>
                            <a href="Product-details.php?id= <?php echo $kq['id']; ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>

    <div class="slider">
        <div class="contents">
            <div class="title">
                <h2>Window Bản Quyền</h2>
            </div>
            <div class="carts">
                <?php
                $sql = "SELECT id,image,name,price FROM products WHERE category_id=3 AND status = 0";
                $result = mysqli_query($conn, $sql);

                while ($kq = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="card" style="width: 18rem; margin-bottom:20px;">
                        <img src="<?php echo $kq['image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $kq['name']; ?></h5>
                            <p class="card-text"><?php echo $kq['price']; ?><sup> đ</sup></p>
                            <a href="Product-details.php?id= <?php echo $kq['id']; ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>


    <?php include ('../admin/footer.php') ?>
</body>

</html>
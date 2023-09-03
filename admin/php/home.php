

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
    <div class="main">
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
                        <a class="nav-link " href="#">Disabled</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

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
                <h2>Sản Phẩm Nổi Bật</h2>
            </div>

            <div class="carts">
                <div class="card" style="width: 18rem; margin-bottom:20px;">
                    <img src="/images (1)/add/10.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                <div class="card" style="width: 18rem; margin-bottom:20px;">
                    <img src="/images (1)/add/10.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin-bottom:20px;">
                    <img src="/images (1)/add/10.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin-bottom:20px;">
                    <img src="/images (1)/add/10.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin-bottom:20px;">
                    <img src="/images (1)/add/10.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin-bottom:20px;">
                    <img src="/images (1)/add/10.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="slider">
        <div class="contents">
            <div class="title">
                <h2>Sản Phẩm Nổi Bật</h2>
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
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>

                <?php } ?>



            </div>
        </div>
    </div>


    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auti mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Company Name</h5>
                    <p>Get ready to show off your love for Minecraft with officially curated Minecraft apparel, accessories, and drinkware.</p>

                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning"> Products </h5>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">The Provider</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">The Creativity</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">The Provider</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">The Provider</a>
                    </p>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Useful links</h5>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">The Provider</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">The Creativity</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">The Provider</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">The Provider</a>
                    </p>
                </div>

                <div class="col-md-4 col-lg-3 col-x-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
                    <p>
                        <i class="fas fa-home mr-3"></i> Đà nẵng, Việt nam
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> levu1962004@gmail.com
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> 0906472426
                    </p>
                    <p>
                        <i class="fas fa-print mr-3"></i> 0926688124
                    </p>
                </div>
            </div>
            <hr class="mb-4">
            <div class="row align-items-center">
                <div class="col-md-7 col-lg-8">
                    <p>Copyright @2020 All rights reserved by:
                        <a href="#">
                            <strong class="text-warning">The Providers</strong>

                        </a>
                    </p>
                </div>

                <div class="col-md-5 col-lg-4">
                    <div class="text-center text-md-right">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-google-plus"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
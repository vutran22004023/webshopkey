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
            <img src="'.$table['image'].'" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">'.$table['name'].'</h5>
                <p class="card-text">'.$table["price"].'</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
            ';}
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
    <link rel="stylesheet" href="./css/home.css">
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
        <div class="contents">
            <div class="title">
                <h2>Tìm kiếm sản phẩm</h2>
            </div>
            <div class="search-bar">
                <tr>
                    <td class="tdLabel"><label for="register_country" class="label">Danh mục: </label></td>
                    <td>
                      <select name="country" id="register_country" style="width:160px">
                        <option value="india">india</option>
                        <option value="pakistan">pakistan</option>
                        <option value="africa">africa</option>
                        <option value="china">china</option>
                        <option value="other">other</option>
                      </select>
                    </td>
                </tr>
                <tr>
                    <td class="tdLabel"><label for="register_country" class="label">Thể loại: </label></td>
                    <td>
                      <select name="country" id="register_country" style="width:160px">
                        <option value="india">Tất cả</option>
                        <option value="pakistan">pakistan</option>
                        <option value="africa">africa</option>
                        <option value="china">china</option>
                        <option value="other">other</option>
                      </select>
                    </td>
                </tr>

                <tr>
                    <td class="tdLabel"><label for="register_country" class="label">Mức giá: </label></td>
                    <td>
                      <select name="country" id="register_country" style="width:160px">
                        <option value="india">Tất cả</option>
                        <option value="pakistan">pakistan</option>
                        <option value="africa">africa</option>
                        <option value="china">china</option>
                        <option value="other">other</option>
                      </select>
                    </td>
                    <tr>
                        <td class="tdLabel"><label for="register_country" class="label">Sắp Xếp: </label></td>
                        <td>
                          <select name="country" id="register_country" style="width:160px">
                            <option value="india">india</option>
                            <option value="pakistan">pakistan</option>
                            <option value="africa">africa</option>
                            <option value="china">china</option>
                            <option value="other">other</option>
                          </select>
                        </td>
                    </tr>
                    <tr>
                        <input type="submit" value="Lọc" >
                    </tr>
                </tr>
            </div>
            <div class="carts" style="margin-top: 30px;">
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
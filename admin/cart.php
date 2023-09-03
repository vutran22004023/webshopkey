<?php
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED);
    error_reporting(2);
    require_once '../model/connect.php';
    $infor = '';
    // cập nhật giỏ hàng
    if (isset($_POST['update-cart']))
    {
        foreach ($_POST['num'] AS $id => $prd)
        {
            if (($prd == 0) and (is_numeric($prd)))
            {
                unset($_SESSION['cart'][$id]);
            }
            elseif (($prd > 0) and (is_numeric($prd)))
            {
                $_SESSION['cart'][$id] = $prd;
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
    <link rel="stylesheet" href="./css/cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="C:\Users\Acer\Documents\Zalo Received Files\baitap_session\webshopkey\admin\css\cart.css">
</head>
<body>
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
                      <a class="nav-link " href="#" >Disabled</a>
                    </li>
                  </ul>
              </nav>
        </header>
        
        <div class="content">
            <div class="content-item">
                <h2>Giỏ Hàng</h2>
                <div class="item">
                    <div class="item-left">
        <?php
            $totalAllSale = 0;
            $total = 0;
            $totalPay = 0;
            if (isset($_SESSION['cart'])) 
            {
                foreach ($_SESSION['cart'] AS $id => $prd) 
                {
                    $sql = "SELECT * FROM products WHERE id = $id";
                    $result = mysqli_query($conn,$sql);
                    if (!$result) {
                        echo 'Không thể chọn!';
                    }
                    else
                    {
                        while ($row = mysqli_fetch_assoc($result))
                    {
                        if ($row['image'] == null || $row['image'] == '') {
                            $Image = "";
                        }
                        else {
                            $Image = $row['image'];
                        }

                        // Số lượng sản phẩm
                        $quantity = $_SESSION['cart'][$row['id']];

                        // Giảm giá 1%
                        $salePrice = $row['saleprice'] * $row['price'] / 100;

                        // Tổng giảm giá của 1 sản phẩm: "tổng giảm giá * số lượng"
                        $totalSalePrice = $salePrice * $quantity;

                        // Tổng giá của 1 sản phẩm đó: "số lượng * giá - giảm giá""
                        $totalPriceProduct = $quantity * $row['price'] - $totalSalePrice;

                        // Tổng giảm giá của các sản phẩm: "tổng giảm + tổng giảm giá từng sản phẩm"
                        $totalAllSale = $totalAllSale + $totalSalePrice;

                        // Tổng tiền của 1 sản phẩm: "tổng tiền + số lượng * giá"
                        $total = $total + $quantity * $row['price'];

                        // Tổng tiền người dùng phải trả: "tổng tiền sản phẩm - tổng giảm giá"
                        $totalPay = $total - $totalAllSale;
        ?>
                        <div class="item-left-content">
                        <img src="<?php echo $Image; ?>" width="210" height="120"  alt="">
                            <div class="contents">
                                <div class="content-text">
                                <p style="width: 200px;"><?php echo $row['name']; ?></p>
                                    <p><?php echo number_format($row['price']); ?></p>
                                </div>
                                <div class ="form-group">
                                <input type="number" size="2" name="num[<?php echo $row['id']; ?>]" value="<?php echo $_SESSION['cart'][$row['id']]; ?>" min="1"/>
                                </div>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')" href ="delete-cart.php?id=<?php echo $id; ?>">
                                                                <span class="fa fa-trash fa-lg" aria-hidden="true"></span>
                                                        </a
                                <hr class="mb-3" style="background-color: #625D5D;">
                                
                            </div>
                        </div>
                        <?php
                                                    $infor = $infor . $row['name'] . ' - ' . $_SESSION['cart'][$row['id']] . ' cái - giá: ' . $row['price'] . '<br/>';
                                                }
                                            }
                                        }
                                        // Lưu thông tin mua sản phẩm để gửi email cho khách hàng
                                        $_SESSION['infor'] = $infor;
                                        // Lưu tổng tiền phải thanh toán để gửi email cho khách hàng
                                        $_SESSION['total'] = $totalPay;
                                    }
                                    ?>
                        
                    </div>
                    <div class="item-right">
                    <div class="calculator">
                            <div class ="col-md-5 col-sm-6 col-xs-12 update-view ">
                                <button type="submit" name="update-cart"> Cập nhật giỏ hàng </button>
                                <button id ="total">
                                    <span style="font-weight: bold;"> Tổng tiền: <?php echo number_format($totalPay); ?>
                                        <sup>đ</sup>
                                    </span>
                                </button>
                            </div><!-- /col -->
                        </div><!-- /caculate -->

                        <div class ="col-md-7 col-sm-6 col-xs-12 title_right">
                            <div class ="title_right">
                                <button>
                                    <a href="index.php"> Tiếp tục mua hàng </a>
                                </button>
                            </div><!-- /title_right-->

                            <button class="delete">
                                <a onclick="return confirm('Giỏ hàng sẽ trống! Bạn chắc chắn muốn hủy giỏ hàng này không?')" href ="delete-cart.php?idCancel=0"> Hủy giỏ hàng </a>
                            </button>
                            <?php
                                if (isset($_SESSION['username']))
                                {
                            ?>
                                    <button><a href="delete-cart.php?id=0"> Đặt hàng </a></button>
                            <?php
                                }
                                else
                                {
                            ?>
                                    <button><a href="order-cart.php"> Tiến hành mua hàng </a></button>
                            <?php
                                }
                            ?>
                        </div>
                        </div>
                    </div>
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
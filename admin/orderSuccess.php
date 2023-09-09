<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

require_once '../model/connect.php';

?>
<!DOCTYPE html>
<html>
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
    <!-- button top -->
    <header>
    <div class="header-top"></div>
    <nav class="navbar navbar-expand-lg" style="background-color: #d9d8d8;">
        <div class="container-fluid" style="height: 90px;">
            <a class="navbar-brand" href="./home.php">
                <img src="./images/logo/black-green-futuristic-game-logo-1.png" width="100" height="90" alt="">
            </a>
            <div class="container-fluid d-flex">
                <form class="d-flex" action="search.php" method="POST">
                    <input class="form-control me-2" style="margin-left: 30px;width: 300px;" name="name-product" placeholder="What do you need?">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="login container-fluid " style="margin-left: 300px;">
                <?php

                if (!empty($_SESSION['username'])) {

                ?>
                    <li style="list-style: none; font-size: 20px" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./edit-user.php">Thông tin cá nhân</a></li>
                            <li><a class="dropdown-item" href="./order-list.php">Đơn hàng đã đặt</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./logout.php">Đăng xuất</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <i class="fa-solid fa-user"></i>
                    <a style="text-decoration: none; color:#000;" href="../admin/Login.php">Đăng Nhập</a>
                    <span>/</span>
                    <a style="text-decoration: none; color: #000;" href="../admin/Register.php">Đăng ký</a>
                <?php } ?>


            </div>

            <button class="cart container-fluid " style="border-radius: 10px; width: 450px; height: 60px; margin-right: 20px;">
                <a href="./view-cart.php" style="color: #000;text-decoration: none;">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Giỏ Hàng</span>
                </a>
            </button>
        </div>
    </nav>
    <nav class="nav navbar  navbar-light" style="background-color: #625D5D; padding: 0;">
        <ul class="nav" style="margin-left: 40px;">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./home.php">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./category.php">Thể Loại</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./contact.php">Liên Hệ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">Disabled</a>
            </li>
        </ul>
    </nav>
</header>
    
    <?php
        // Lấy id của order_detail
        if (isset($_GET['idOrderDetail']))
        {
            // get id of orders
            $idOrder = $_GET['idOrderDetail'];
            $notDelete = '';
            // Nếu muốn xóa
            if (isset($_GET['notDelete']))
            {
                $notDelete = "Không thể xóa sản phẩm đã được giao cho khách hàng!";
            }
            
            // Lấy id sản phẩm
            if (isset($_GET['idProduct']))
            {
                $idProduct = $_GET['idProduct'];
                // Cập nhật số lượng sản phẩm
                if (isset($_POST['updateQuantity']))
                {
                    if (isset($_POST['quantity']))
                    {
                        $quantityEdit = $_POST['quantity'];
                        $sqlUpdate = "UPDATE product_order SET quantity = $quantityEdit WHERE product_id = $idProduct AND order_id = $idOrder";
                        $resultUpdate = mysqli_query($conn,$sqlUpdate);
                    }
                }
            }

            $sql = "SELECT * FROM view_order_list WHERE orders =" . $idOrder . ' GROUP BY idOrder';
            $result = mysqli_query($conn,$sql);
            if ($result)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
    ?>          
        
                <!-- Page content -->
                <div id="page-wrapper">
                    <div class="container">
                        <div class="row">
                            <?php echo "<script type=\"text/javascript\">alert(\"Chúc mừng bạn đã đặt hàng thành công!\");</script>"; ?>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h2 class="page-header"> Chi tiết đơn hàng </h2>
                                <div class ="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <h3> Thông tin người nhận </h3>
                                        <table class="table table-responsive">
                                            <tr>
                                                <th>Tên khách hàng</th>
                                                <td><?php echo $row['fullname']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo $row['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Số điện thoại</th>
                                                <td><?php echo $row['phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Địa chỉ</th>
                                                <td><?php echo $row['address']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Ngày đặt hàng</th>
                                                <td><?php echo $row['dateOrder']; ?></td>
                                            </tr>
                                        </table>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
        <?php
                }
            }
        ?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h3> Thông tin chi tiết sản phẩm </h3>
                                <p style="color: #009999"><?php echo $notDelete; ?>
                                <table class="table table-striped table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr align="center">
                                            <th> Tên sản phẩm </th>
                                            <th> Giá </th>
                                            <th> Giảm giá </th>
                                            <th> Số lượng </th>
                                            <th> Tổng cộng </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sqlOrderProduct = "SELECT * FROM view_order_list WHERE idOrder =" . $idOrder;
                                            $result_OrderProduct = mysqli_query($conn,$sqlOrderProduct);

                                            if ($result_OrderProduct)
                                            {
                                                $total = 0;
                                                $totalAllSale = 0;
                                                $totalPay = 0;
                                                while ($kq = mysqli_fetch_assoc($result_OrderProduct))
                                                {
                                                    // Giảm giá 1%: "giá bán * giá sp / 100"
                                                    $salePrice = $kq['saleprice'] * $kq['price'] / 100;

                                                    // Tổng tiền giảm của 1 sp: "tổng giảm giá * số lượng"
                                                    $totalSalePrice = $salePrice * $kq['quantity'];

                                                    // Tổng giá của sản phẩm: "số lượng * giá - tổng giảm giá"
                                                    $totalPriceProduct = $kq['quantity'] * $kq['price'] - $totalSalePrice;

                                                    // Tổng giảm giá của các sản phẩm: "tổng giảm + tổng giảm giá từng sản phẩm"
                                                    $totalAllSale = $totalAllSale + $totalSalePrice;

                                                    // Tổng tiền của 1 sản phẩm: "tổng tiền + số lượng * giá"
                                                    $total = $total + $kq['quantity'] * $kq['price'];

                                                    // Tổng tiền người dùng phải trả: "tổng tiền sản phẩm - tổng giảm giá"
                                                    $totalPay = $total - $totalAllSale;
                                        ?>
                                                    <tr class="odd gradeX" align="center">
                                                        <!-- Tên sản phẩm đã đặt -->
                                                        <td><?php echo $kq['nameProduct']; ?></td>

                                                        <!-- Giá sản phẩm đã đặt -->
                                                        <td><?php echo number_format($kq['price']); ?></td>

                                                        <!-- Giảm giá sản phẩm đã đặt -->
                                                        <td><?php echo number_format($salePrice); ?></td>

                                                        <!-- Số lượng sản phẩm đã đặt -->
                                                        <td><?php echo $kq['quantity']; ?></td>

                                                        <!-- Tổng cộng tiền của 1 sản phẩm đã đặt -->
                                                        <td><?php echo number_format($totalPriceProduct); ?></td>
                                                    </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="6">
                                                <h4 style="float: right; padding-right: 4px; color: #000000 ;">
                                                    Tổng tiền chưa giảm: <?php echo number_format($total); ?><sup> đ</sup> <br/><br/>
                                                    Số tiền được giảm: - <?php echo number_format($totalAllSale); ?><sup> đ</sup> <br/><br/>
                                                    Tổng tiền phải thanh toán: <?php echo number_format($totalPay) ?><sup> đ</sup>
                                                </h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <p style="background-color: #00ff6c;padding: 10px; border-radius: 5%; border: #00ff6c; width: 130px;">
                            <a href="./home.php" style="text-decoration: none; color: #fff"> Trở về trang chủ </a>
                        </p>
                    </div><!-- /.conatiner-fluid -->
                </div><!-- /#page-wrapper -->
    <?php
        }
        include('./footer.php');
    ?>

</body>
</html>
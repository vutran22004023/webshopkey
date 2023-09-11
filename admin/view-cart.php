<?php
session_start();
error_reporting(0);
require_once('../model/connect.php');
$infor = '';
// cập nhật giỏ hàng
if (isset($_POST['update-cart'])) {
    foreach ($_POST['num'] as $id => $prd) {
        if (($prd == 0) and (is_numeric($prd))) {
            unset($_SESSION['cart'][$id]);
        } elseif (($prd > 0) and (is_numeric($prd))) {
            $_SESSION['cart'][$id] = $prd;
        }
    }
}
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
</head>

<body>
    <!-- header -->
    <?php include './header.php'; ?>
    <!-- /header -->

    <div class="container">
        <fieldset>
            <form name="form1" action="" method="POST">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="viewcart">
                            <div class="titless">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row title_left">
                                        <h2 style="margin-top:40px; margin-bottom:20px"> THÔNG TIN MUA HÀNG </h2>
                                    </div><!-- /title_left -->
                                </div><!-- /col -->
                            </div><!-- /title -->

                            <div class="content">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Ảnh sản phẩm </th>
                                            <th> Tên sản phẩm</th>
                                            <th> Số lượng </th>
                                            <th> Giá </th>
                                            <th> Giảm giá </th>
                                            <th> Tổng giá </th>
                                            <th> Xóa </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $totalAllSale = 0;
                                        $total = 0;
                                        $totalPay = 0;
                                        if (isset($_SESSION['cart'])) {
                                            foreach ($_SESSION['cart'] as $id => $prd) {
                                                $sql = "SELECT * FROM products WHERE id = $id";
                                                $result = mysqli_query($conn, $sql);
                                                if (!$result) {
                                                    echo 'Không thể chọn!';
                                                } else {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        if ($row['image'] == null || $row['image'] == '') {
                                                            $Image = "";
                                                        } else {
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
                                                        <tr>
                                                            <!-- Ảnh sản phẩm -->
                                                            <td>
                                                                <center><img src="<?php echo $Image; ?>" width=" 100px;"></center>
                                                            </td>

                                                            <!-- Tên sản phẩm -->
                                                            <td><?php echo $row['name']; ?></td>

                                                            <!-- Số lượng sản phẩm -->
                                                            <td>
                                                                <div class="form-group">
                                                                <input type="number" size="2" name="num[<?php echo $row['id']; ?>]" value="1" value="<?php echo ($_SESSION['cart'][$row['id']] >= 1) ? $_SESSION['cart'][$row['id']] : 1; ?>" min="1" />
                                                                </div>
                                                            </td>

                                                            <!-- Giá của 1 sản phẩm -->
                                                            <td><?php echo number_format($row['price']); ?></td>

                                                            <!-- Giảm giá -->
                                                            <td><?php echo $salePrice; ?></td>

                                                            <!-- Tổng giá của 1 sản phẩm -->
                                                            <td><?php echo ($totalPriceProduct); ?></td>

                                                            <!-- Xóa sản phẩm -->
                                                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')" href="delete-cart.php?id=<?php echo $id; ?>">
                                                                    <span class="fa fa-trash fa-lg" aria-hidden="true"></span>
                                                                </a></td>
                                                        </tr>
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
                                    </tbody>
                                </table>
                            </div><!-- /content -->
                            <div class="btn-calculator" style="display: flex; margin-bottom: 30px">
                                <div class="calculator">
                                    <div class="col-md-5 col-sm-6 col-xs-12 update-view d-flex">
                                        <button type="submit" name="update-cart" style="width: 400px; height:60px"> Cập nhật giỏ hàng </button>
                                        <button id="total" style="width: 500px; height:60px; margin-left: 30px">
                                            <span style="font-weight: bold;"> Tổng tiền: <?php echo number_format($totalPay); ?>
                                                <sup>đ</sup>
                                            </span>
                                        </button>
                                    </div><!-- /col -->
                                </div><!-- /caculate -->

                                <div class="col-md-7 col-sm-6 col-xs-12 title_right d-flex " style="width: 200px;">
                                    <div class="title_right">
                                        <button style="margin-left: 10px; width:100px; height: 60px;border-radius: 10px;">
                                            <a href="./home.php" style="text-decoration: none;color:#000;width: 600px; height:60px;"> Tiếp tục mua hàng </a>
                                        </button>
                                    </div><!-- /title_right-->

                                    <button class="delete" style="margin-left: 10px; width:500px; height: 60px;border-radius: 10px;">
                                        <a onclick="return confirm('Giỏ hàng sẽ trống! Bạn chắc chắn muốn hủy giỏ hàng này không?')" href="delete-cart.php?idCancel=0" style="text-decoration: none; color:#000;"> Hủy giỏ hàng </a>
                                    </button>
                                    <?php
                                    if (isset($_SESSION['username'])) {
                                    ?>
                                        <button style="margin-left: 10px; width:400px; height: 60px;border-radius: 10px;"><a href="delete-cart.php?id=0" style="text-decoration: none;color:#000;"> Đặt hàng </a></button>
                                    <?php
                                    } else {
                                    ?>
                                        <button style="margin-left: 10px; width:400px; height: 60px;border-radius: 10px;"><a href="./order-cart.php" style="text-decoration: none;color:#000; margin-left: 10px;"> Tiến hành mua hàng </a></button>
                                    <?php
                                    }
                                    ?>
                                </div><!-- /col -->
                            </div>
                        </div><!-- /viewcart -->
                    </div><!-- /col -->
                </div><!-- /row -->
            </form>
        </fieldset>
    </div><!-- /container -->

    <!-- footer -->
    <?php include './footer.php'; ?>
    <!-- /footer -->

</body>

</html>
<?php
session_start();
error_reporting(0);
require_once('../model/connect.php');
$infor = '';
// cập nhật giỏ hàng
if (isset($_POST['update-purchased'])) {
    foreach ($_POST['num'] as $id => $prd) {
        if (($prd == 0) and (is_numeric($prd))) {
            unset($_SESSION['purchased'][$id]);
        } elseif (($prd > 0) and (is_numeric($prd))) {
            $_SESSION['purchased'][$id] = $prd;
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
                        <div class="viewpurchased">
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
                                            <th> Giá </th>
                                            <th> Key </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $totalAllSale = 0;
                                        $total = 0;
                                        $totalPay = 0;
                                        if (isset($_SESSION['purchased'])) {
                                            foreach ($_SESSION['purchased'] as $id => $prd) {
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

                                        ?>
                                                        <tr>
                                                            <!-- Ảnh sản phẩm -->
                                                            <td>
                                                                <center><img src="<?php echo $Image; ?>" width=" 100px;"></center>
                                                            </td>

                                                            <!-- Tên sản phẩm -->
                                                            <td><?php echo $row['name']; ?></td>

                                                            <!-- Giá của 1 sản phẩm -->
                                                            <td><?php echo number_format($row['price']); ?></td>
                                                            <!-- Key của 1 sản phẩm -->
                                                            <td><?php echo number_format($row['keyprd']); ?></td>
                                                        </tr>
                                        <?php
                                                        $infor = $infor . $row['name'] . ' - ' . $_SESSION['purchased'][$row['id']] . ' cái - giá: ' . $row['price'] . '<br/>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!-- /content -->

                        </div><!-- /viewpurchased -->
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
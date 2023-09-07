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
<div class="row">
            <div class ="col-md-5 col-sm-6 col-xs-12">
                <div class="info-customer">
                    <h3 style="text-align: center;"><strong> THÔNG TIN MUA HÀNG </strong></h3>
                    <p style="text-align: center;">
                        <a href="user/register.php"> Đăng kí mua hàng</a>&nbsp;|&nbsp;
                        <a href="user/login.php"> Đăng nhập </a>
                    </p>
                    <!-- form mua hàng -->
                    <form name="form1" action="" method="POST">
                        <label> Họ và Tên </label> <span style="color:#f00">&#42;</span></label>
                        <div class="form-group">
                            <input type="text" class ="form-control" name="name" placeholder="Nhập họ tên của bạn" required>
                        </div>
                        <!-- /họ và tên -->

                        <label> Email </label> <span style="color:#f00">&#42;</span></label>
                        <div class="form-group">
                            <input type="email" class ="form-control" name="email" placeholder="Nhập email của bạn" required>
                        </div>
                        <!-- /email -->

                        <label> Số điện thoại </label> <span style="color:#f00">&#42;</span></label>
                        <div class="form-group">
                            <input type="text" class ="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength ="9" maxlength ="11" name="phone" placeholder="Nhập số điện thoại của bạn" required>
                        </div>
                        <!-- /số điện thoại -->

                        <label> Địa chỉ </label> <span style="color:#f00">&#42;</span></label>
                        <div class="form-group">
                            <input type="text" class ="form-control" name="address" placeholder="Nhập địa chỉ của bạn" required>
                        </div>
                        <!-- /địa chỉ -->

                        <button class ="btn btn-default btn-lg" name="register"> Đăng kí nhận hàng </button>
                    </form>
                </div><!-- /info-customer -->
            </div><!-- /col -->

            <!-- div chia khoảng cách -->
            <div class="col-md-2 hidden-sm">
            </div>

            <!-- Thông tin đơn hàng -->
            <div class ="col-md-5 col-sm-6 col-xs-12">
                <div class="show-infor">
                    <?php
                        if (isset($_POST['register']))
                        {
                            // Lấy information từ customer chưa có account
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];

                            // Lưu session cho tài khoản mới
                            $_SESSION['name_cus'] = $name;
                            $_SESSION['email_cus'] = $email;
                            $_SESSION['phone_cus'] = $phone;
                            $_SESSION['address'] = $address;
                    ?>
                            <h3 style="text-align: center;"><strong> THÔNG TIN ĐƠN HÀNG </strong></h3>
                            <form name="form2" action="delete-cart.php?id=0" method="POST">
                                <table class="table">
                                    <tr>
                                        <td>Tên khách hàng: </td>
                                        <td><?php echo $name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><?php echo $email; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại:</td>
                                        <td><?php echo $phone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ: </td>
                                        <td><?php echo $address; ?></td>
                                    </tr>
                                </table>
                                <center><button class="btn" name="send"> Gửi </button></center>
                            </form>
                    <?php
                        }
                    ?>
                </div><!-- /show-infor -->
            </div><!-- /col -->
        </div><!-- /row -->

        <?php include ('../admin/footer.php') ?>

</body>
</html>
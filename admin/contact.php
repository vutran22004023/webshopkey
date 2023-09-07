<?php
    require_once '../model/connect.php';
    // Success
    if(isset($_GET['cs'])) {
        echo "<script type=\"text/javascript\">alert(\"Gửi liên hệ thành công!\");</script>";
    }
    else {
        echo "";
    }
    // Fail
    if(isset($_GET['cf'])) {
        echo "<script type=\"text/javascript\">alert(\"Gửi liên hệ thất bại!\");</script>";
    }
    else {
        echo "";
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
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>
    <!-- header -->
    <?php include './header.php'; ?>
    <!-- /header -->
    
    <div class="container">
        
        <div class= "row">
            <div class= "col-md-12 col-sm-16 col-xs-12">
                <div class= "titles">
                    <center>
                        <h3><strong> THÔNG TIN LIÊN HỆ </strong></h3>
                    </center>
                </div>
                <form name="form-lien-he" action ="contact-back.php" method ="POST" accept-charset="utf-8">
                    <div class="contents">
                        <div class="form-group">
                            <label>Họ và tên: <span style="color:#f00">&#42;</span></label>
                            <input name="contact-name" placeholder="Nhập họ tên đầy đủ" class="form-control" required="required" maxlength="255" type="text" id="contact-name"> 
                        </div>

                        <div class="form-group">
                            <label>Email: <span style="color:#f00">&#42;</span></label>
                            <input name="contact-email" placeholder="Nhập email của bạn" class="form-control" required="required" maxlength="255" type="email" id="contact-email">  
                        </div>

                        <div class="form-group">
                            <label>Tiêu đề: <span style="color:#f00">&#42;</span></label>
                            <input name="contact-subject" placeholder="Nhập tiêu đề của bạn" class="form-control" required="required" maxlength="255" type="text" id="contact-subject">  
                        </div>
                        
                        <div class="form-group">
                            <label>Nội dung: <span style="color:#f00">&#42;</span></label>
                            <textarea name="contact-content" placeholder="Nhập thông tin cần liên hệ..." class="form-control" id="ContactContent" rows="5" required></textarea>
                        </div>
                        <center><button type="submit" name="sendcontact" class="btn btn-info"> Gửi liên hệ </button></center>
                    </div><!-- /content -->
                </form>
            </div><!-- /col -->
        </div><!-- /row -->
    </div><!-- /container -->

    
    <?php include './footer.php'; ?>
<script>
    new WOW().init();
</script>
</body>
</html>
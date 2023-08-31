<?php require_once('./model/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login-register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="main">
        <!----------------------- Main Container -------------------------->
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <!----------------------- Login Container -------------------------->
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <!--------------------------- Left Box ----------------------------->
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                    <img src="./public/images/frame-37.png" class="img-fluid" style="border-radius: 20px;">
                </div>
                <!-------------------- ------ Right Box ---------------------------->

                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-4" style="text-align: center;">
                            <h1>Register</h1>
                        </div>
                        <form action="Register-back.php" method="post" name="form-register" accept-charset="utf-8">
                            <div class="input-group mb-3">
                                <input type="text" name="username" class="form-control form-control-lg bg-light fs-6" placeholder="Họ Tên">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="" class="form-control form-control-lg bg-light fs-6" placeholder="Tên đăng nhập">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Mật Khẩu">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="confirmPassword" class="form-control form-control-lg bg-light fs-6" placeholder="Điền lại mật khẩu">
                            </div>
                            <div class="input-group mb-3 d-flex justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="formCheck">
                                    <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="submit" name="submit" class="btn btn-lg btn-primary w-100 fs-6" value="Register" />
                            </div>
                            <div class="input-group mb-3">
                                <button class="btn btn-lg btn-light w-100 fs-6"><img src="https://th.bing.com/th/id/R.0fa3fe04edf6c0202970f2088edea9e7?rik=joOK76LOMJlBPw&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fgoogle-logo-png-open-2000.png&ehk=0PJJlqaIxYmJ9eOIp9mYVPA4KwkGo5Zob552JPltDMw%3d&risl=&pid=ImgRaw&r=0" style="width:20px" class="me-2"><small>Sign In with Google</small></button>
                            </div>
                            <div class="input-group mb-3">
                                <button class="btn btn-lg btn-light w-100 fs-6"><img src="https://th.bing.com/th/id/R.51ae405e1b464603ee8ac65599eb5c95?rik=Hz2DT9FdIMH3cQ&pid=ImgRaw&r=0" style="width:30px" class="me-2"><small>Sign In with Facebook</small></button>
                            </div>
                            <div class="row">
                                <small>Quay lại? <a href="#">Đăng nhập</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
</div>
</body>

</html>
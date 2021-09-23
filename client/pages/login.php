<?php
require_once("../../connect/base.php");
require_once("../../connect/db.php");
require_once("../layouts/css.php");
session_start();
$error = [];
if (isset($_POST['submit'])) {
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    if (empty($email)) {
        $error['email'] = 'Email không được để trống';
    }
    if (empty($password)) {
        $error['password'] = 'Password không được để trống';
    }
    if (!$error) {
        $sqlUserQuery = "SELECT * FROM `users` WHERE email = '$email'";
        $user = executeQuery($sqlUserQuery, false);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['auth'] = [
                "id" => $user['id'],
                "username" => $user['username'],
                "avatar" => $user['avatar'],
                "email" => $user['email'],
                "birthday" => $user['birthday'],
                "gender" => $user['gender'],
                "phone" => $user['phone'],
                "address" => $user['address'],
                "role_id" => $user['role_id']
            ];
            header('location: ../index.php');
            die;
        }

    }
}

?>

<?php
sleep(1);
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

<div class="limiter align-items-center">
    <div class="container-login100" style="background-image: url('../../dist/img/bg-01.jpg');">
        <div class="col-md-12">
            <a href="../index.php" style="color:#fff; text-decoration:underline">
                <i class="fa fa-arrow-left"></i>
                <strong>Back To Home</strong>
            </a>
        </div>
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-5 m-t-140">
                    <div class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-54">
                        <form class="login100-form validate-form">
                            <span class="login100-form-title p-b-49">
                                Đăng nhập với
                            </span>
                            <div class="login-form-using" id="logreg-forms">
                                <div class="col-md-6 social-login text-center">
                                    <a href="" class="btn facebook-btn social-btn"><i
                                            class="fab fa-facebook"></i>
                                        Facebook
                                    </a>
                                </div>
                                <div class="col-md-6 social-login text-center">
                                    <a href="" class="btn google-btn social-btn"><i
                                            class="fab fa-google-plus-g"></i>
                                        Google
                                    </a>
                                </div>
                                <div></div>
                            </div>
                            </form>
                    </div>
                </div>
                <div class="text-center col-md-2 text-or">
                    &mdash; OR &mdash;
                </div> -->
                <div class="col-md-6 offset-3">
                    <div class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-54">
                        <form method="POST" action="login.php" class="login100-form validate-form">
                            <span class="login100-form-title p-b-49">
                                Đăng nhập
                            </span>
                            <div class="wrap-input100">
                                <span class="label-input100">Email</span>
                                <input type="email" class="input100" name="email" placeholder="Nhập email">
                                <span class="focus-input100" data-symbol="&#xf15a;"></span>
                            </div>
                            <?php if (isset($error['email'])) : ?>
                                <p class="text-danger"><?= $error['email'] ?></p>
                            <?php endif ?>

                            <div class="wrap-input100 m-t-23">
                                <span class="label-input100">Mật khẩu</span>
                                <input class="input100" type="password" name="password" placeholder="Nhập mật khẩu">
                                <span class="focus-input100" data-symbol="&#xf191;"></span>
                            </div>
                            <?php if (isset($error['password'])) : ?>
                                <p class="text-danger"><?= $error['password'] ?></p>
                            <?php endif ?>

                            <div class="row">
                                <div class="col-md-6 text-left p-t-8 p-b-25">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label>
                                            Nhớ mật khẩu
                                        </label>
                                    </div>
                                </div>
                                <div class="text-right text-transition col-md-6 p-t-8 p-b-25">
                                    <a href="">
                                        Quên mật khẩu?
                                    </a>
                                </div>
                            </div>

                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button class="login100-form-btn" name="submit">
                                        Đăng nhập
                                    </button>
                                </div>
                            </div>

                            <div class="flex-col-c p-t-50">
                                <span class="txt1 p-b-17">
                                    Bạn chưa có tài khoản?
                                    <a href="register.php" class="txt2">
                                        Đăng ký ngay
                                    </a>
                                </span>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="../../dist/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../../dist/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="../../dist/vendor/bootstrap/js/popper.js"></script>
<script src="../../dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../../dist/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../../dist/vendor/daterangepicker/moment.min.js"></script>
<script src="../../dist/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="../../dist/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="../../dist/js/main.js"></script>
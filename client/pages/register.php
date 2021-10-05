<?php 
require_once("../../connect/base.php");
require_once("../../connect/db.php");
require_once("../../connect/dao/pdo_user.php");
session_start();
require_once("../layouts/css.php");

$error = [];
// $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@(gmail.com|([a-z0-9]+).edu.vn)$/';
$regex_email = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
$regex_phone = '/(03|09)[0-9]{8}/';
// (^[A-Za-z]{3,16})([ ]{1})([A-Za-z]{3,16})?([ ]{0,1})?([A-Za-z]{3,16})?([ ]{0,1})?([A-Za-z]{3,16})
$regex_name = '/(^[A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪỬỮỰỲỴÝỶỸ]{1})([a-z_àáâãèéêìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{0,8})/u';
// $regex_name = '/^[_A-Za-z0-9-]{1,8}+(\.[_a-z0-9-]{1.8}+)$/';
$regex_username = '/^[A-Za-z0-9_\.]{5,50}$/';
if(isset($_POST['register']))
{
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=trim($_POST['email']);
    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $created_at = date('Y-m-d H:i:s');
    $avatar= 'https://c0.klipartz.com/pngpicture/136/22/gratis-png-perfil-de-usuario-computadora-iconos-chica-cliente-avatar.png';
    
    if(empty($name)) {
        $error['name'] = 'Tên không được để trống';
    }
    elseif(!preg_match($regex_name, $name)) {
        $error['name'] = 'Không đúng định dạng họ và tên';
    }
    if(empty($username)) {
        $error['username'] = 'Tên không được để trống';
    }
    elseif(!preg_match($regex_username, $username)) {
        $error['username'] = 'Độ dài tên tài khoản từ 5-50 ký tự';
    }
    if(empty($email)) {
        $error['email'] = 'Email không được để trống';
    }
    if (!preg_match($regex_email,$email)) {
        $error['email'] = 'Không đúng định dạng email';
    }
    // if (mysql_num_rows(mysql_query("SELECT email FROM member WHERE email='$email'")) > 0)
    // {
    //     echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
    //     exit;
    // }
    if(empty($_POST['password'])) {
        $error['password'] = 'Password không được để trống';
    }
    if(empty($_POST['password_confirm'])) {
        $error['password_confirm'] = 'Nhập lại password không được để trống';
    }
    if ($_POST['password'] !== $_POST['password_confirm']) {
        $error['password_confirm'] = 'Nhập sai password';
    }
    // if (!preg_match($regex_phone,$phone)) {
    //     $error['phone'] = 'Không đúng định dạng số điện thoại';
    // }
    // if(){

    // }
    
    
    if(!$error){
        insert($name,$username,$avatar,$email,$password,0,$created_at);
        echo '<meta http-equiv="refresh" content="1;url=login.php">';
        die();
    }
    
}
?>

<div class="limiter align-items-center">
    <div class="container-login100" style="background-image: url('../../dist/img/bg-01.jpg');">
        <div class="col-md-12">
            <a href="../index.php" style="color:#fff; text-decoration:underline">
                <i class="fa fa-arrow-left"></i>
                <strong>Trở về trang chủ</strong>
            </a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-54">
                        <form method="POST" action="" class="login100-form validate-form">
                            <span class="login100-form-title p-b-49">
                                Đăng ký
                            </span>

                            <div class="m-b-25">
                                <div class="wrap-input100">
                                    <span class="label-input100">Họ và tên*</span>
                                    <input type="text" class="input100" name="name" placeholder="Nhập họ và tên" value="<?php if(isset($_COOKIE["name"])) { echo $_COOKIE["name"]; } ?>">
                                    <span class="focus-input100" data-symbol="&#xf207;"></span>
                                </div>
                                <?php if (isset($error['name'])) : ?>
                                <p class="text-danger"><?= $error['name'] ?></p>
                                <?php endif ?>
                                <div class="wrap-input100">
                                    <span class="label-input100">Tên tài khoản*</span>
                                    <input type="text" class="input100" name="username" placeholder="Nhập tên tài khoản" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
                                    <span class="focus-input100" data-symbol="&#xf207;"></span>
                                </div>
                                <?php if (isset($error['username'])) : ?>
                                <p class="text-danger"><?= $error['username'] ?></p>
                                <?php endif ?>
                                <div class="wrap-input100 m-t-5">
                                    <span class="label-input100">Email*</span>
                                    <input type="email" class="input100" name="email" placeholder="Nhập email">
                                    <span class="focus-input100" data-symbol="&#xf15a;"></span>
                                </div>
                                <?php if (isset($error['email'])) : ?>
                                <p class="text-danger"><?= $error['email'] ?></p>
                                <?php endif ?>
                                <div class="wrap-input100 m-t-5">
                                    <span class="label-input100">Password*</span>
                                    <input type="password" class="input100" name="password"
                                        placeholder="Nhập password" value="">
                                    <span class="focus-input100" data-symbol="&#xf191;"></span>
                                </div>
                                <?php if (isset($error['password'])) : ?>
                                <p class="text-danger"><?= $error['password'] ?></p>
                                <?php endif ?>
                                <div class="wrap-input100 m-t-5">
                                    <span class="label-input100">Nhập lại password*</span>
                                    <input type="password" class="input100" name="password_confirm"
                                        placeholder="Nhập lại password">
                                    <span class="focus-input100" data-symbol="&#xf18f;"></span>
                                </div>
                                <?php if (isset($error['password_confirm'])) : ?>
                                <p class="text-danger"><?= $error['password_confirm'] ?></p>
                                <?php endif ?>
                            </div>
                            <!-- <div class="row m-t-10">
                                <div class="col-md-6">
                                    <div class="wrap-input100">
                                        <span class="label-input100">Ngày sinh</span>
                                        <input type="date" class="input100" name="birthday" value="">
                                        <span class="focus-input100" data-symbol="&#xf331;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wrap-input100">
                                        <span class="label-input100">Giới tính</span>
                                        <br>
                                        <select name="gender" id="" class="input100">
                                            <option value="1">Nam</option>
                                            <option value="2">Nữ</option>
                                            <option value="3">Khác</option>
                                        </select>
                                        <span class="focus-input100" data-symbol="&#xf203;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-10 m-b-25">
                                <div class="col-md-6">
                                    <div class="wrap-input100">
                                        <span class="label-input100">Địa chỉ</span>
                                        <input type="text" class="input100" name="address" placeholder="Nhập địa chỉ">
                                        <span class="focus-input100" data-symbol="&#xf196;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wrap-input100">
                                        <span class="label-input100">Số điện thoại</span>
                                        <input type="text" class="input100" name="phone"
                                            placeholder="Nhập số điện thoại">
                                        <span class="focus-input100" data-symbol="&#xf2be;"></span>
                                    </div>
                                </div>
                            </div> -->
                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button class="login100-form-btn" name="register">
                                        Đăng ký
                                    </button>
                                </div>
                            </div>

                            <div class=" p-t-50">
                                <a href="login.php" class="txt2">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="dropDownSelect1"></div>

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
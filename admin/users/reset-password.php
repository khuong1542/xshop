<?php 
// session_start();
require_once '../../connect/base.php';
require_once '../../connect/db.php';
require_once '../../connect/dao/pdo_user.php';
if (isset($_POST['submit'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php require_once '../layouts/title_admin.php' ?></title>

    <?php require_once '../layouts/css.php'; ?>
</head>
<style>
#btnPassword {
    display: block;
    position: absolute;
    top: 44px;
    right: 20px;
}
#btnResetPassword {
    display: block;
    position: absolute;
    top: 113px;
    right: 20px;
}
#btnConfirmPassword {
    display: block;
    position: absolute;
    top: 193px;
    right: 20px;
}
</style>

<body id="page-top">

    <div id="wrapper">
        <?php require_once '../layouts/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php require_once '../layouts/header.php'; ?>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Đổi mật khẩu</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 offset-3">
                                            <div class="add-form__name">
                                                <label for="">Mật khẩu cũ</label>
                                                <input type="password" class="form-control"  id="ipnPassword" name="password">
                                                <span class="fas fa-eye" id="btnPassword"></span>
                                            </div>
                                            <?php if (isset($error['password'])) : ?>
                                            <p class="text-danger"><?= $error['password'] ?></p>
                                            <?php endif ?>
                                            <div class="add-form__resetpassword">
                                                <label for="">Mật khẩu mới</label>
                                                <input type="password" class="form-control" name="resetpassword" id="ipnResetPassword">
                                                <span class="fas fa-eye" id="btnResetPassword"></span>
                                            </div>
                                            <?php if (isset($error['resetpassword'])) : ?>
                                            <p class="text-danger"><?= $error['resetpassword'] ?></p>
                                            <?php endif ?>
                                            <div class="add-form__password_confirm m-t-10">
                                                <label for="">Nhập lại mật khẩu mới</label>
                                                <input type="password" class="form-control" name="password_confirm" id="ipnConfirmPassword">
                                                <span class="fas fa-eye" id="btnConfirmPassword"></span>
                                            </div>
                                            <?php if (isset($error['password_confirm'])) : ?>
                                            <p class="text-danger"><?= $error['password_confirm'] ?></p>
                                            <?php endif ?>
                                            <div class="add-form__image m-t-20">
                                                <button class="btn btn-primary" name="submit">Lưu</button>
                                                <input class="btn btn-warning" type="reset" value="Đặt lại">
                                                <a href="<?=BASE_ADMIN.'users/list-admin.php'?>"
                                                    class="btn btn-danger">Hủy</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require_once '../layouts/script.php';?>
    <script>
    let showPassword = false
    const ipnElement = document.querySelector('#ipnPassword')
    const ipnElementReset = document.querySelector('#ipnResetPassword')
    const ipnElementConfirm = document.querySelector('#ipnConfirmPassword')
    const btnElement = document.querySelector('#btnPassword')
    const btnElementReset = document.querySelector('#btnResetPassword')
    const btnElementConfirm = document.querySelector('#btnConfirmPassword')

    btnElement.addEventListener('click', togglePassword)
    btnElementReset.addEventListener('click', toggleResetPassword)
    btnElementConfirm.addEventListener('click', toggleConfirmPassword)

    function togglePassword() {
        if (showPassword) {
            ipnElement.setAttribute('type', 'password')
            showPassword = false
        }else {
            ipnElement.setAttribute('type', 'text')
            showPassword = true
        }
    }
    function toggleResetPassword() {
        if (showPassword) {
            ipnElementReset.setAttribute('type', 'password')
            showPassword = false
        }else {
            ipnElementReset.setAttribute('type', 'text')
            showPassword = true
        }
    }
    function toggleConfirmPassword() {
        if (showPassword) {
            ipnElementConfirm.setAttribute('type', 'password')
            showPassword = false
        }else {
            ipnElementConfirm.setAttribute('type', 'text')
            showPassword = true
        }
    }
    </script>
</body>

</html>
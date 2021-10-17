<?php
    require_once '../../connect/base.php'; 
    require_once '../../connect/db.php'; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSHOP</title>
    <?php include '../layouts/css.php' ?>
    <link rel="stylesheet" href="<?=BASE.'dist/css/client/pages/infomation.css" type="text/css'?>">
</head>
<style>
#btnPassword {
    display: block;
    position: absolute;
    top: 16px;
    right: 20px;
}
#btnResetPassword {
    display: block;
    position: absolute;
    top: 16px;
    right: 20px;
}
#btnConfirmPassword {
    display: block;
    position: absolute;
    top: 16px;
    right: 20px;
}
</style>
<body>
    <header class="header">
        <?php require_once '../layouts/header.php'; ?>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="information-aside">
                    <ul class="information-aside__list ">
                        <li class="information-aside__header ">
                            Thông tin tài khoản
                        </li>
                        <li class="information-aside__item">
                            <a href="<?=BASE_CLIENT.'pages/infomation.php?id='.$_SESSION['auth']['id']?>"
                                class="information-aside__link">Hồ sơ cá nhân</a>
                        </li>
                        <li class="information-aside__item">
                            <a href="<?=BASE_CLIENT.'pages/change-password.php?id='.$_SESSION['auth']['id']?>"
                                class="information-aside__link">Đổi mật khẩu</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header">Đổi mật khẩu</div>
                                <div class="card-body">
                                    <form method="POST" action="">
                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Mật
                                                khẩu</label>

                                            <div class="col-md-6">
                                                <input id="ipnPassword" type="password" class="form-control change-password"
                                                    name="password" value="" required autocomplete="password" autofocus>
                                                <span class="fas fa-eye" id="btnPassword"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu
                                                mới</label>

                                            <div class="col-md-6">
                                                <input id="ipnResetPassword" type="password" class="form-control  change-password"
                                                    name="resetpassword" required autocomplete="new-password">
                                                <span class="fas fa-eye" id="btnResetPassword"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-right">Nhập lại mật khẩu
                                                mới</label>
                                            <div class="col-md-6">
                                                <input type="password" class="form-control change-password" id="ipnConfirmPassword" name="password_confirm"
                                                    required autocomplete="new-password">
                                                <span class="fas fa-eye" id="btnConfirmPassword"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Đổi mật khẩu
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <?php require_once '../layouts/footer.php'; ?>
    </footer>
    <?php include '../layouts/script.php' ?>
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
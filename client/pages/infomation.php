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
                <div class="profile">

                    <div class="profile-header">
                        <h2 class="profile-header__h2">Thông tin tài khoản</h2>
                    </div>
                    <div class="profile-content">
                        <?php if (isset($message)): ?>

                        <div class="alert alert-success text-center alert-custom" role="alert">
                            {{ session('message') }}
                        </div>
                        <?php endif ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="profile-img__wrapper">
                                <div class="profile-img-item">
                                    <img src="<?= BASE.'dist/img/users/'.$_SESSION['auth']['avatar'] ?>" alt="">
                                </div>
                                <div class="profile-img-upload">
                                    <input type="file" id="actual-btn" hidden name="avatar" />
                                    <label for="actual-btn" id="actual-label">
                                        <i class="fa fa-fw fa-camera"></i>
                                        <span>Thay ảnh đại diện</span>
                                    </label>

                                    <span id="file-chosen">Chưa có file ảnh nào</span>

                                </div>
                            </div>
                            <div class="profile-infomation ">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="profile-infomation__label">Họ và tên</label>
                                            <input class="form-control" type="text" name="name"
                                                value="<?= $_SESSION['auth']['name'] ?>"
                                                placeholder="Vui lòng nhập tên của bạn">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="profile-infomation__label">Tên tài khoản</label>
                                            <input class="form-control" type="text" name="name"
                                                value="<?= $_SESSION['auth']['username'] ?>"
                                                placeholder="Vui lòng nhập tên của bạn">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="profile-infomation__label">Email</label>
                                            <input class="form-control" type="text" name="email"
                                                value="<?= $_SESSION['auth']['email'] ?>"
                                                placeholder="Vui lòng nhập email" readonly disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="profile-infomation__label">Số điện thoại</label>
                                            <input class="form-control" type="text" name="phone"
                                                value="<?= $_SESSION['auth']['phone'] ?>"
                                                placeholder="Vui lòng nhập số điện thoại">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="profile-infomation__label">Giới tính</label>
                                            <div class="form-control">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" id="man"
                                                        value="0" <?php if ($_SESSION['auth']['gender'] == 0) echo "checked" ?>>
                                                    <label class="form-check-label" for="man">Nam</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="woman" value="1" <?php if ($_SESSION['auth']['gender'] == 1) echo "checked" ?>>
                                                    <label class="form-check-label" for="woman">Nữ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="profile-infomation__label">Ngày sinh</label>
                                            <input class="form-control" type="date" name="birth_date"
                                                value="<?= $_SESSION['auth']['birthday'] ?>"
                                                placeholder="Vui lòng nhập ngày sinh">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col d-flex justify-content-center">
                                        <button class="btn profile-infomation__button " type="submit">Lưu lại</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                const actualBtn = document.getElementById('actual-btn');

                const fileChosen = document.getElementById('file-chosen');

                actualBtn.addEventListener('change', function() {
                    fileChosen.textContent = this.files[0].name
                })
                </script>
            </div>

        </div>

    </div>
    <footer class="footer">
        <?php require_once '../layouts/footer.php'; ?>
    </footer>
    <?php include '../layouts/script.php' ?>

</body>

</html>
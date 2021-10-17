<?php
    require_once '../../connect/base.php'; 
    require_once '../../connect/db.php'; 
    require_once '../layouts/slider.php';
    $errors =[];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSHOP</title>
    <?php include '../layouts/css.php' ?>
    <link rel="stylesheet" href="<?=BASE.'dist/css/client/pages/contact.css" type="text/css'?>">
</head>

<body>
    <header class="header">
        <?php require_once '../layouts/header.php'; ?>
    </header>
    <div class="container">
        <div class="contact-form__desktop m-t-20 m-b-20">
            <div class="contact-form__main col-md-8">
                <form action="" method="post" class="m-l-20">
                    <div class="row">
                        <div class="contact-form__topic">
                            <?php if (isset($errors['topic'])): ?>
                            <span class="text-danger">{{ $errors->first('topic') }}</span>
                            <?php endif ?>
                            <input type="text" class="form-control" name="topic" placeholder="Chủ đề">
                        </div>
                        <div class="contact-form__name">
                            <?php if (isset($errors['name'])): ?>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            <?php endif ?>
                            <input type="text" class="form-control" name="name" placeholder="Họ tên">
                        </div>
                        <div class="contact-form__email">
                            <?php if (isset($errors['email'])): ?>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            <?php endif ?>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="contact-form__phone">
                            <?php if (isset($errors['phone'])): ?>
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                            <?php endif ?>
                            <input type="number" class="form-control" name="phone" placeholder="Số điện thoại">
                        </div>
                        <div class="contact-form__content">
                            <?php if (isset($errors['content'])): ?>
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                            <?php endif ?>
                            <textarea class="form-control" name="content" cols="31" rows="10"
                                placeholder="Nội dung"></textarea>
                        </div>
                        <div class="contact-form__button">
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 contact-form__profile">
                <div class="contact-form__profile__header">
                    <strong>Thông tin liên hệ</strong>
                </div>
                <div class="form-contact__profile__content">
                    <div class="contact-address">
                        <p>
                            <i class="fa fa-map-marker"></i>
                            Khu E, Tòa nhà FPT Polytechnic, đường Trịnh Văn Bô, Phương Canh, Nam Từ Liêm, Hà Nội
                        </p>
                    </div>
                    <div class="contact-email">
                        <p>
                            <i class="fa fa-envelope"></i>
                            polylib@fpt.edu.vn
                        </p>
                    </div>
                    <div class="contact-phone">
                        <p>
                            <i class="fa fa-phone"></i>
                            (024) 8582 0808
                        </p>
                    </div>
                    <div class="contact-email">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer class="footer">
        <?php require_once '../layouts/footer.php'; ?>
    </footer>
    <?php include '../layouts/script.php' ?>
</body>

</html>
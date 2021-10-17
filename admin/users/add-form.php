<?php 
// session_start();
require_once '../../connect/base.php';
require_once '../../connect/db.php';
require_once '../../connect/dao/pdo_user.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $file = $_FILES['avatar'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    require_once '../validate/authors/validate-add.php';
    if (!$error) {
    
        $name_image = "";
        if($file['size'] > 0){
            $name_image = uniqid() . '-' . str_replace(' ','-',trim($file['name']));
            move_uploaded_file($file['tmp_name'], '../../dist/img/users/' . $name_image);
            $filename = $name_image;
        }
        elseif(empty($file['size'])){
            $name_image = 'default-author.png';
            move_uploaded_file($file['tmp_name'],'../../dist/img/users/' . $name_image);
            $filename = trim($name_image);
        }

        insert($name,$username,$filename,$email,$password,'1',$created_at,$updated_at);

        header('location:' . BASE_ADMIN . 'users/list-admin.php'); 
    }
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
    #btnPassword{
        display: block;
        position: absolute;
        top: 44px;
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
                            <h6 class="m-0 font-weight-bold text-primary">Thêm mới quản trị</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="add-form__name col-md-6">
                                            <label for="">Họ và tên</label>
                                            <input type="text" class="form-control" name="name" placeholder="Họ và tên">
                                        </div>
                                        <?php if (isset($error['name'])) : ?>
                                        <p class="text-danger"><?= $error['name'] ?></p>
                                        <?php endif ?>
                                        <div class="add-form__username col-md-6">
                                            <label for="">Tên tài khoản</label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Tên tài khoản">
                                        </div>
                                        <?php if (isset($error['username'])) : ?>
                                        <p class="text-danger"><?= $error['username'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="row">
                                        <div class="add-form__email m-t-10 col-md-6">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                        <?php if (isset($error['email'])) : ?>
                                        <p class="text-danger"><?= $error['email'] ?></p>
                                        <?php endif ?>
                                        <div class="add-form__password m-t-10 col-md-6">
                                            <label for="">Mật khẩu</label>
                                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu" id="ipnPassword">
                                            <span class="fas fa-eye" id="btnPassword"></span>
                                        </div>
                                        <?php if (isset($error['password'])) : ?>
                                        <p class="text-danger"><?= $error['password'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="add-form__image m-t-10">
                                        <label for="">Ảnh</label>
                                        <input type="file" class="form-control" name="avatar">
                                    </div>
                                    <?php if (isset($error['image'])) : ?>
                                    <p class="text-danger"><?= $error['image'] ?></p>
                                    <?php endif ?>
                                    <div class="add-form__image m-t-20">
                                        <button class="btn btn-primary" name="submit">Lưu</button>
                                        <input class="btn btn-warning" type="reset" value="Đặt lại">
                                        <a href="<?=BASE_ADMIN.'users/list-admin.php'?>" class="btn btn-danger">Hủy</a>
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
    const btnElement = document.querySelector('#btnPassword')

    btnElement.addEventListener('click', togglePassword)

    function togglePassword() {
        if (showPassword) {
            ipnElement.setAttribute('type', 'password')
            showPassword = false
        } else {
            ipnElement.setAttribute('type', 'text')
            showPassword = true
        }
    }
    </script>
</body>

</html>
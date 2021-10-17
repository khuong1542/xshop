<?php
// session_start();
require_once '../../connect/base.php';
require_once '../../connect/db.php';

$id = $_GET['id'];
$selectUser = "SELECT * FROM users WHERE id = $id";
$result = executeQuery($selectUser, false);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $updated_at = date('Y-m-d H:i:s');
    $file = $_FILES['avatar'];
    require_once '../validate/users/validate-add.php';
    if (!$error) {

        $updateBookQuery = "UPDATE `users` SET `name`='$name',`username`='$username',`email`='$email',`birthday`='$birthday',`phone`='$phone',`gender`='$gender',`address`='$address',`updated_at`='$updated_at'";
        $name_image = "";
        if($file['size'] > 0){
            $select = "SELECT * from authors where id = $id";
            $author = executeQuery($select, false);
            $link_hinh = '../../dist/img/authors/' . $author['avatar'];
            if (is_file($link_hinh)) {
                unlink($link_hinh);
            }
            $name_image = uniqid() . '-' . str_replace(' ', '-', trim($file['name']));
            move_uploaded_file($file['tmp_name'],'../../dist/img/users/' . $name_image);
            $filename = $name_image;
            $updateBookQuery .= ", avatar = '$filename'";
        }

        $updateBookQuery .= "where id = $id";
        executeQuery($updateBookQuery);

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

<body id="page-top">

    <div id="wrapper">
        <?php require_once '../layouts/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php require_once '../layouts/header.php'; ?>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sửa quản trị</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="add-form__name col-md-6">
                                            <label for="">Tên tác giả</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Tên tác giả" value="<?=$result['name'] ?>">
                                        </div>
                                        <?php if (isset($error['name'])) : ?>
                                        <p class="text-danger"><?= $error['name'] ?></p>
                                        <?php endif ?>
                                        <div class="add-form__username col-md-6">
                                            <label for="">Tên tài khoản</label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Tên tài khoản" value="<?=$result['username'] ?>">
                                        </div>
                                        <?php if (isset($error['username'])) : ?>
                                        <p class="text-danger"><?= $error['username'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="row">
                                        <div class="add-form__email m-t-10 col-md-6">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email"
                                                value="<?=$result['email'] ?>">
                                        </div>
                                        <?php if (isset($error['email'])) : ?>
                                        <p class="text-danger"><?= $error['email'] ?></p>
                                        <?php endif ?>
                                        <div class="add-form__birthday m-t-10 col-md-6">
                                            <label for="">Ngày sinh</label>
                                            <input type="date" class="form-control" name="birthday"
                                                value="<?=$result['birthday'] ?>">
                                        </div>
                                        <?php if (isset($error['birthday'])) : ?>
                                        <p class="text-danger"><?= $error['birthday'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="row">
                                        <div class="add-form__image m-t-10 col-md-6">
                                            <label for="">Số điện thoại</label>
                                            <input type="number" name="phone" class="form-control"
                                                value="<?=$result['phone']?>" placeholder="Số điện thoại">
                                        </div>
                                        <?php if (isset($error['phone'])) : ?>
                                        <p class="text-danger"><?= $error['phone'] ?></p>
                                        <?php endif ?>
                                        <div class="add-form__gender m-t-10 col-md-6">
                                            <label for="">Giới tính</label>
                                            <select name="gender" id="" class="form-control">
                                                <option value="0" <?php if ($result['gender']==0) {echo "selected";}?>>
                                                    Nam</option>
                                                <option value="1" <?php if ($result['gender']==1) {echo "selected";}?>>
                                                    Nữ</option>
                                                <option value="2" <?php if ($result['gender']=='') {echo "selected";}?>>
                                                    Chưa xác định</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="add-form__address m-t-10">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" class="form-control" name="address"
                                            value="<?=$result['address']?>" placeholder="Địa chỉ">
                                    </div>
                                    <?php if (isset($error['address'])) : ?>
                                    <p class="text-danger"><?= $error['address'] ?></p>
                                    <?php endif ?>
                                    <div class="add-form__image m-t-10">
                                        <label for="">Ảnh</label>
                                        <input type="file" class="form-control" name="avatar">
                                        <img src="../../dist/img/users/<?=$result['avatar'] ?>" width="200" alt="">
                                    </div>
                                    <?php if (isset($error['image'])) : ?>
                                    <p class="text-danger"><?= $error['image'] ?></p>
                                    <?php endif ?>
                                    <div class="add-form__image m-t-10">
                                        <button class="btn btn-primary" name="submit">Lưu</button>
                                        <a href="<?=BASE_ADMIN.'users/list.php'?>" class="btn btn-danger">Hủy</a>
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

    <?php require_once '../layouts/script.php'; ?>

</body>

</html>
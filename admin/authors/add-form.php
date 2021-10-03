<?php 
// session_start();
require_once '../../connect/base.php'; 
require_once '../../connect/db.php';
require_once '../../connect/dao/pdo_author.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'].'-'.rand(100,999);
    $birthday = $_POST['birthday'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $created_at = date('Y-m-d H:i:s');
    $file = $_FILES['avatar'];
    require_once '../validate/authors/validate-add.php';
    if (!$error) {
       
        $checkExistedQuery = "select * from authors where name = '$name'";
        $existedBook = executeQuery($checkExistedQuery, false);

        $name_image = "";
        if($file['size'] > 0){
            $name_image = uniqid() . '-' . $file['name'];
            move_uploaded_file($file['tmp_name'], '../../dist/img/authors/' . $name_image);
            $filename = BASE.'dist/img/authors/' .$name_image;
        }
        elseif(empty($file['size'])){
            $name_image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQB9HZzNjwK62BVEEvSWHDzZdIQHcsu8qoaxj1ochXZuZkqgfdz6txVvaNmkz_OAY6kOE&usqp=CAU';
            move_uploaded_file($file['tmp_name'],'../../dist/img/authors/' . $name_image);
            $filename = trim($name_image);
        }

        insert($name,$slug,$birthday,$filename,$status,$description,$created_at);

        header('location:' . BASE_ADMIN . 'authors/list.php'); 
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
                            <h6 class="m-0 font-weight-bold text-primary">Thêm mới tác giả</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="add-form__name">
                                        <label for="">Tên tác giả</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên tác giả">
                                    </div>
                                    <?php if (isset($error['name'])) : ?>
                                    <p class="text-danger"><?= $error['name'] ?></p>
                                    <?php endif ?>
                                    <div class="add-form__slug m-t-10">
                                        <label for="">Đường dẫn</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Đường dẫn">
                                    </div>
                                    <?php if (isset($error['slug'])) : ?>
                                    <p class="text-danger"><?= $error['slug'] ?></p>
                                    <?php endif ?>
                                    <div class="add-form__birthday m-t-10">
                                        <label for="">Ngày sinh</label>
                                        <input type="date" class="form-control" name="birthday">
                                    </div>
                                    <?php if (isset($error['birthday'])) : ?>
                                    <p class="text-danger"><?= $error['birthday'] ?></p>
                                    <?php endif ?>
                                    <div class="add-form__image m-t-10">
                                        <label for="">Ảnh</label>
                                        <input type="file" class="form-control" name="avatar">
                                    </div>
                                    <?php if (isset($error['image'])) : ?>
                                    <p class="text-danger"><?= $error['image'] ?></p>
                                    <?php endif ?>
                                    <div class="add-form__image m-t-10">
                                        <label for="">Trạng thái</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="0">Hiện</option>
                                            <option value="1">Ẩn</option>
                                        </select>
                                    </div>
                                    <div class="add-form__slug m-t-10">
                                        <label for="">Giới thiệu tác giả</label>
                                        <textarea id="editor1" name="description" cols="30" rows="10" class="form-control" placeholder="Giới thiệu tác giả"></textarea>
                                        <!-- <input type="text" class="form-control" id="slug" name="slug" placeholder="Đường dẫn"> -->
                                    </div>
                                    <?php if (isset($error['slug'])) : ?>
                                    <p class="text-danger"><?= $error['slug'] ?></p>
                                    <?php endif ?>
                                    <div class="add-form__image m-t-10">
                                        <button class="btn btn-primary" name="submit">Lưu</button>
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
</body>

</html>
<?php 
// session_start();
require_once '../../connect/base.php'; 
require_once '../../connect/db.php';
require_once '../../connect/dao/pdo_category.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $status = $_POST['status'];
    $created_at = date('Y-m-d H:i:s');
    $file = $_FILES['image'];
    require_once '../validate/categories/validate-add.php';
    if (!$error) {
       
        $checkExistedQuery = "select * from categories where name = '$name'";
        $existedBook = executeQuery($checkExistedQuery, false);

        $name_image = "";
        if($file['size'] > 0){
            $name_image = uniqid() . '-' . $file['name'];
            move_uploaded_file($file['tmp_name'],'../../dist/img/categories/' . $name_image);
            $filename = BASE.'dist/img/books/'.$name_image;
        }
        elseif(empty($file['size'])){
            $name_image = 'https://tonsmb.org/wp-content/uploads/2014/03/default_image_01.png';
            move_uploaded_file($file['tmp_name'],'../../dist/img/categories/' . $name_image);
            $filename = trim($name_image);
        }

        insert($name,$slug,$filename,$status,$created_at);

        header('location:' . BASE_ADMIN . 'categories/list.php'); 
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

    <title>SB Admin 2 - Tables</title>

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
                            <h6 class="m-0 font-weight-bold text-primary">Thêm mới danh mục</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="add-form__name">
                                        <label for="">Tên danh mục</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên danh mục">
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
                                    <div class="add-form__image m-t-10">
                                        <label for="">Ảnh</label>
                                        <input type="file" class="form-control" name="image">
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
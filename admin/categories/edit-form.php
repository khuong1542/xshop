<?php
// session_start();
require_once '../../connect/base.php';
require_once '../../connect/db.php';

$id = $_GET['id'];
$selectCategory = "SELECT * FROM categories WHERE id = $id";
$result = executeQuery($selectCategory, false);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $status = $_POST['status'];
    $updated_at = date('Y-m-d H:i:s');
    $file = $_FILES['image'];
    require_once '../validate/categories/validate-add.php';
    if (!$error) {

        $checkExistedQuery = "select * from categories where name = '$name'";
        $existedBook = executeQuery($checkExistedQuery, false);

        $updateBookQuery = "UPDATE `categories` SET `name`='$name',`slug`='$slug',`status`='$status',`updated_at`='$updated_at'";
        $name_image = "";
        if($file['size'] > 0){
            $select = "SELECT * from categories where id = $id";
            $book_unlink = executeQuery($select, false);
            $link_hinh = '../../dist/img/categories/' . $book_unlink['image'];
            if (is_file($link_hinh)) {
                unlink($link_hinh);
            }
            $name_image = uniqid() . '-' . str_replace(' ', '-', trim($file['name']));
            move_uploaded_file($file['tmp_name'],'../../dist/img/categories/' . $name_image);
            $filename = $name_image;
            $updateBookQuery .= ", image = '$filename'";
        }

        $updateBookQuery .= "where id = $id";
        executeQuery($updateBookQuery);

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
                            <h6 class="m-0 font-weight-bold text-primary">Sửa danh mục</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="add-form__name">
                                        <label for="">Tên slide</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Tên danh mục" value="<?php echo $result['name'] ?>">
                                    </div>
                                    <?php if (isset($error['name'])) : ?>
                                    <p class="text-danger"><?= $error['name'] ?></p>
                                    <?php endif ?>
                                    <div class="add-form__slug m-t-10">
                                        <label for="">Tên slide</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            placeholder="Tên danh mục" value="<?php echo $result['slug'] ?>">
                                    </div>
                                    <?php if (isset($error['slug'])) : ?>
                                    <p class="text-danger"><?= $error['slug'] ?></p>
                                    <?php endif ?>
                                    <div class="add-form__image m-t-10">
                                        <label for="">Ảnh</label>
                                        <input type="file" class="form-control" name="image">
                                        <img width="300" style="margin-top:10px"
                                            src="<?=$result['image'] ?>" alt="">
                                    </div>
                                    <?php if (isset($error['image'])) : ?>
                                    <p class="text-danger"><?= $error['image'] ?></p>
                                    <?php endif ?>
                                    <div class="add-form__image m-t-10">
                                        <label for="">Trạng thái</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="0" <?php if ($result['status']==0) {echo "selected";}?>>Hiển
                                                thị</option>
                                            <option value="1" <?php if ($result['status']==1) {echo "selected";}?>>Ẩn
                                            </option>
                                        </select>
                                    </div>
                                    <div class="add-form__image m-t-10">
                                        <button class="btn btn-primary" name="submit">Lưu</button>
                                        <a href="<?=BASE_ADMIN.'categories/list.php'?>" class="btn btn-danger">Hủy</a>
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
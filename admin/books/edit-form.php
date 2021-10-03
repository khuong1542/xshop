<?php
// session_start();
require_once '../../connect/base.php';
require_once '../../connect/db.php';

$id = $_GET['id'];
$selectBook = "SELECT books.*, categories.name as cate_name, authors.name as author_name
                FROM books
                INNER JOIN categories ON books.cate_id = categories.id
                INNER JOIN authors ON books.author_id = authors.id
                WHERE books.id = $id";
$resultBooks = executeQuery($selectBook, false);
$categories = executeQuery("SELECT * from categories where `status` = '0'");
$authors = executeQuery("SELECT * from authors where `status` = '0'");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'].'-'.rand(100,999);
    $cate_id = $_POST['cate_id'];
    $author_id = $_POST['author_id'];
    $price = $_POST['price'];
    $sale = ($_POST['price'] - ($_POST['price']*$_POST['sale']/100));
    $status = $_POST['status'];
    $special = $_POST['special'];
    $description = $_POST['description'];
    $updated_at = date('Y-m-d H:i:s');
    $file = $_FILES['image'];
    require_once '../validate/books/validate-add.php';
    if (!$error) {
        $checkExistedQuery = "select * from books where id = '$id'";
        $existedBook = executeQuery($checkExistedQuery, false);

        $updateBookQuery = "UPDATE `books` SET `name`='$name', `slug`='$slug', `price`='$price', `sale`='$sale', `description`='$description', `special`='$special', `cate_id`='$cate_id', `author_id`='$author_id', `status`='$status', `updated_at`='$updated_at'";
        $name_image = "";
        if($file['size'] > 0){
            $name_image = uniqid() . '-' . $file['name'];
            move_uploaded_file($file['tmp_name'],'../../dist/img/books/' . $name_image);
            $filename = BASE.'dist/img/books/' .$name_image;
            $updateBookQuery .= ", image = '$filename'";
        }

        $updateBookQuery .= "where id = $id";
        executeQuery($updateBookQuery);

        header('location:' . BASE_ADMIN . 'books/list.php'); 
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
                            <h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="add-form__name col-md-12" hidden>
                                        <label for="">Tên sách</label>
                                        <input type="text" class="form-control" name="id" placeholder="Tên sách">
                                    </div>
                                    <div class="row">
                                        <div class="add-form__name col-md-6">
                                            <label for="">Tên sách</label>
                                            <?php if (isset($error['name'])) : ?>
                                            <p class="text-danger"><?= $error['name'] ?></p>
                                            <?php endif ?>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Tên sách" value="<?=$resultBooks['name']?>">
                                        </div>
                                        <div class="add-form__slug col-md-6">
                                            <label for="">Đường dẫn</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                placeholder="Đường dẫn" value="<?=$resultBooks['slug']?>">
                                        </div>
                                    </div>
                                    <?php if (isset($error['slug'])) : ?>
                                    <p class="text-danger"><?= $error['slug'] ?></p>
                                    <?php endif ?>
                                    <div class="row">
                                        <div class="add-form__cate m-t-10 col-md-6">
                                            <label for="">Danh mục</label>
                                            <div class="select-box-a">
                                                <select class="my-select form-control" name="cate_id"
                                                    data-live-search="true">
                                                    <?php foreach($categories as $cate): ?>
                                                    <option value="<?= $cate['id']?>"><?= $cate['name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="add-form__cate m-t-10 col-md-6">
                                            <label for="">Tác giả</label>
                                            <div class="select-box">
                                                <select class="my-select form-control" name="author_id"
                                                    data-live-search="true">
                                                    <?php foreach($authors as $author): ?>
                                                    <option value="<?= $author['id']?>"><?= $author['name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($error['author'])) : ?>
                                    <p class="text-danger"><?= $error['author'] ?></p>
                                    <?php endif ?>
                                    <div class="row">
                                        <div class="add-form__price m-t-10 col-md-6">
                                            <label for="">Giá</label>
                                            <input type="number" class="form-control" name="price"
                                                value="<?=$resultBooks['price']?>">
                                        </div>
                                        <?php if (isset($error['price'])) : ?>
                                        <p class="text-danger"><?= $error['price'] ?></p>
                                        <?php endif ?>
                                        <div class="add-form__sale m-t-10 col-md-6">
                                            <label for="">Giảm giá (%)</label>
                                            <input type="number" class="form-control" name="sale"
                                                value="<?= ($resultBooks['price'] - $resultBooks['sale'])*100/$resultBooks['price']?>">
                                        </div>
                                        <?php if (isset($error['sale'])) : ?>
                                        <p class="text-danger"><?= $error['sale'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="row">
                                        <div class="add-form__image m-t-10 col-md-6">
                                            <label for="">Ảnh</label>
                                            <input type="file" class="form-control" name="image">
                                            <img src="<?=$resultBooks['image']?>" width="100" alt="">
                                        </div>
                                        <?php if (isset($error['image'])) : ?>
                                        <p class="text-danger"><?= $error['image'] ?></p>
                                        <?php endif ?>
                                        <div class="add-form__image m-t-10 col-md-6">
                                            <label for="">Đặc biệt</label>
                                            <select name="special" id="" class="form-control">
                                                <option value="0" <?php if ($resultBooks['special']==0) {echo "selected";}?>>
                                                    Đặc biệt</option>
                                                <option value="1" <?php if ($resultBooks['special']==1) {echo "selected";}?>>
                                                    Không đặc biệt</option>
                                            </select>
                                        </div>
                                        <?php if (isset($error['image'])) : ?>
                                        <p class="text-danger"><?= $error['image'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="add-form__image m-t-10">
                                        <label for="">Trạng thái</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="0" <?php if ($resultBooks['status']==0) {echo "selected";}?>>Hiển
                                                thị</option>
                                            <option value="1" <?php if ($resultBooks['status']==1) {echo "selected";}?>>Ẩn
                                            </option>
                                        </select>
                                    </div>
                                    <div class="add-form__description m-t-10">
                                        <label for="">Giới thiệu sách</label>
                                        <textarea name="description" id="editor1" cols="30" rows="10"
                                            class="form-control" placeholder="Giới thiệu sách"><?=$resultBooks['description']?></textarea>
                                    </div>
                                    <?php if (isset($error['description'])) : ?>
                                    <p class="text-danger"><?= $error['description'] ?></p>
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

    <?php require_once '../layouts/script.php'; ?>

</body>

</html>
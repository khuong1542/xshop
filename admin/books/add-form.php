<?php 
// session_start();
require_once '../../connect/base.php'; 
require_once '../../connect/db.php';
require_once '../../connect/dao/pdo_book.php';
$selectCategories = "SELECT * from categories where `status` = '0'";
$selectAuthor = "SELECT * from authors where `status` = '0'";
$categories = executeQuery($selectCategories);
$authors = executeQuery($selectAuthor);
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'].'-'.strtotime(date('Y-m-d H:i:s'));
    $cate_id = $_POST['cate_id'];
    $author_id = $_POST['author_id'];
    $price = $_POST['price'];
    $percent = $_POST['percent'];
    $sale = ($price - ($price*$percent/100));
    $status = $_POST['status'];
    $special = $_POST['special'];
    $description = $_POST['description'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    $file = $_FILES['image'];
    require_once '../validate/books/validate-add.php';
    if (!$error) {
       
        $checkExistedQuery = "select * from books where name = '$name'";
        $existedBook = executeQuery($checkExistedQuery, false);

        $name_image = "";
        if($file['size'] > 0){
            $name_image = uniqid() . '-' . str_replace(' ','-',trim($file['name']));
            move_uploaded_file($file['tmp_name'], '../../dist/img/books/' . $name_image);
            $filename = $name_image;
        }
        elseif(empty($file['size'])){
            $name_image = 'default.png';
            move_uploaded_file($file['tmp_name'],'../../dist/img/books/' . $name_image);
            $filename = trim($name_image);
        }
        insert($name,$slug,$price,$percent,$sale,$filename,$description,$special,$cate_id,$author_id,$status,$created_at,$updated_at);

        // executeQuery("INSERT INTO category_book(book_id, category_id) VALUES ((SELECT id FROM books WHERE name = '$name'), $cate_id)");

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
                            <h6 class="m-0 font-weight-bold text-primary">Th??m m???i s???n ph???m</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" class="form-control" value="0" name="view">
                                    <div class="row">
                                        <div class="add-form__name col-md-6">
                                            <label for="">T??n s??ch</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($_POST['name'])) echo $name?>"
                                                placeholder="T??n s??ch">
                                            <?php if (isset($error['name'])) : ?>
                                            <p class="text-danger"><?= $error['name'] ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="add-form__slug col-md-6">
                                            <label for="">???????ng d???n</label>
                                            <input type="text" class="form-control" id="slug" name="slug" value="<?php if(isset($_POST['slug'])) echo $slug?>"
                                                placeholder="???????ng d???n">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="add-form__cate m-t-10 col-md-6">
                                            <label for="">Danh m???c</label>
                                            <div class="select-box-a">
                                                <select class="selectpicker form-control" name="cate_id"
                                                    data-live-search="true">
                                                    <option value="">Kh??ng x??c ?????nh</option>
                                                    <?php foreach($categories as $cate): ?>
                                                    <option value="<?= $cate['id']?>" <?php if(isset($_POST['cate_id'])&&$cate_id==$cate['id']) echo 'selected'?>><?=$cate['name']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="add-form__cate m-t-10 col-md-6">
                                            <label for="">T??c gi???</label>
                                            <div class="select-box">
                                                <select class="selectpicker form-control" name="author_id"
                                                    data-live-search="true">
                                                    <option value="">Kh??ng x??c ?????nh</option>
                                                    <?php foreach($authors as $author): ?>
                                                    <option value="<?= $author['id']?>" <?php if(isset($_POST['author_id'])&&$author_id==$author['id']) echo 'selected'?>><?= $author['name']?></option>
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
                                            <label for="">Gi??</label>
                                            <input type="number" class="form-control" name="price" placeholder="Gi?? s???n ph???m" value="<?php if(isset($_POST['price'])) echo $price?>">
                                            <?php if (isset($error['price'])) : ?>
                                            <p class="text-danger"><?= $error['price'] ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="add-form__percent m-t-10 col-md-6">
                                            <label for="">Gi???m gi?? (%)</label>
                                            <input type="number" class="form-control" name="percent" value="<?php if(isset($_POST['percent'])) echo $percent; else echo 0?>">
                                            <?php if (isset($error['percent'])) : ?>
                                            <p class="text-danger"><?= $error['percent'] ?></p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="add-form__image m-t-10 col-md-6">
                                            <label for="">?????c bi???t</label>
                                            <select name="special" id="" class="form-control">
                                                <option value="1">Kh??ng ?????c bi???t</option>
                                                <option value="0">?????c bi???t</option>
                                            </select>
                                        </div>

                                        <div class="add-form__image m-t-10 col-md-6">
                                            <label for="">Tr???ng th??i</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="0" <?php if(isset($_POST['status'])) echo 'selected'?>>Hi???n</option>
                                                <option value="1" <?php if(isset($_POST['status'])) echo 'selected'?>>???n</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="add-form__image m-t-10">
                                        <label for="">???nh</label>
                                        <input type="file" class="form-control" name="image">
                                        <?php if (isset($error['image'])) : ?>
                                        <p class="text-danger"><?= $error['image'] ?></p>
                                        <?php endif ?>
                                    </div>
                                    <div class="add-form__description m-t-10">
                                        <label for="">Gi???i thi???u s??ch</label>
                                        <textarea name="description" id="editor1" cols="30" rows="10"
                                            class="form-control" placeholder="Gi???i thi???u s??ch"></textarea>
                                    </div>
                                    <div class="add-form__image m-t-10">
                                        <button class="btn btn-primary" name="submit">L??u</button>
                                        <input class="btn btn-warning" type="reset" value="?????t l???i">
                                        <a href="<?=BASE_ADMIN.'books/list.php'?>" class="btn btn-danger">H???y</a>
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
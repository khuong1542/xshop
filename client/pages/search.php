<?php
require_once '../../connect/base.php';
require_once '../../connect/db.php';

$selectAllCate = "SELECT * from `categories` where status = 0";
    $categories = executeQuery($selectAllCate);
    
//lấy sản phẩm theo tìm kiếm bằng like 
if (isset($_POST['submit'])) {
    $keyword = $_POST['keyword'];
    $sqlSearch = "SELECT books.*, categories.name as cate_name, authors.name as author_name
                    FROM books
                    INNER JOIN categories ON books.cate_id = categories.id
                    INNER JOIN authors ON books.author_id = authors.id
                    WHERE books.status = 0 AND books.name like '%$keyword%'  order by id desc";
    $books = executeQuery($sqlSearch);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSHOP</title>
    <?php include '../layouts/css.php' ?>
    <link rel="stylesheet" href="<?=BASE.'dist/css/client/pages/category.css" type="text/css'?>">
    <!-- <link rel="stylesheet" href="{{ asset('css/client/pages/category.css') }}"> -->
</head>

<body>
    <header class="header">
        <?php require_once '../layouts/header.php'; ?>
    </header>
    <div class="container">
        <div class="row cate-desktop">
            <div class="col-md-3 book-category__aside ">
                <div class="book-search__aside ">

                    <div class=" filter-group ">
                        <ul class="filter-list ">
                            <a class="filter-item__link ">
                                <li class="filter-item">
                                    <h3 style="font-weight:700">Tất cả danh mục</h3>
                                    <span class="filter-item__quantity"><?=count($categories)?></span>
                                </li>
                            </a>

                        </ul>
                    </div>
                    <div class=" filter-group ">
                        <ul class="filter-list ">
                            <?php foreach($categories as $category): ?>
                            <a href="<?=BASE_CLIENT.'pages/category.php?id='.$category['id']?>"
                                class="filter-item__link  ">
                                <li class="filter-item {{ isset($_GET['id']) ? 'active' : null }}">
                                    <?=$category['name']?>
                                    <!-- <span class="filter-item__quantity"></span> -->
                                </li>
                            </a>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 book-category__content ">
                <div class="book-card-collection">
                    <?php if(count($books) >0 ): ?>
                    <?php foreach($books as $book): ?>
                    <div class="book-card ">
                        <div class="book-card__img">
                            <a
                                href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$book['id'].'&cate_id='.$book['cate_id']?>">
                                <img src="<?=BASE.'dist/img/books/'.$book['image']?>" alt="">
                            </a>
                        </div>
                        <div class="book-card__title">
                            <a
                                href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$book['id'].'&cate_id='.$book['cate_id']?>">
                                <h3> <?=$book['name']?> </h3>
                            </a>
                        </div>
                        <div class="book-card__author" style="font-size:10px">
                            Tác giả:
                            <a href="">
                                <?=$book['author_name'] ?></a>
                        </div>
                        <div class="book-card__star">
                            <i class="far fa-star"></i>
                        </div>
                        <div class="book-card__btn">
                            <a href="<?=BASE_CLIENT.'pages/cart-add.php?id='.$book['id']?>" class="borrow-btn"><i
                                    class="fa fa-shopping-cart"> Thêm giỏ hàng</i></a>
                            <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$book['id'].'&cate_id='.$book['cate_id']?>"
                                class="review-btn">Chi tiết</a>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <?php else: ?>

                    <div class="search-result">
                        <div class="search-text">
                            <p>Không có cuốn sách nào!</p>
                        </div>
                    </div>
                    <?php endif ?>

                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('.show-cate').click(function() {
            $('.book-category__aside').slideToggle();
        })
    })
    </script>


    <!-- @endsection -->

    <footer class="footer">
        <?php require_once '../layouts/footer.php'; ?>
    </footer>
    <?php include '../layouts/script.php' ?>
</body>

</html>
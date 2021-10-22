<?php
    require_once '../../connect/base.php'; 
    require_once '../../connect/db.php';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $no_of_records_per_page = 9;
    $offset = ($page-1) * $no_of_records_per_page;

    // $total_pages = "SELECT * FROM books where cate_id=".$_GET['id'];
    // $total_row = count(executeQuery($total_pages));
    
    $total_pages_sql = "SELECT * FROM books";
    $total_rows = count(executeQuery($total_pages_sql));
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    $id = $_GET['id'];
    $selectOneAuthor = "SELECT * from `authors` where status = 0 and id = $id";
    $authors = executeQuery($selectOneAuthor,false);
    if(!isset($_GET['id']) || $_GET['id'] == ""){
        $selectAllBook = "  SELECT books.*, categories.name as cate_name, authors.name as author_name
                            FROM books
                            INNER JOIN categories ON books.cate_id = categories.id
                            INNER JOIN authors ON books.author_id = authors.id
                            WHERE books.status = 0
                            ORDER by id desc LIMIT $offset, $no_of_records_per_page";
        $books = executeQuery($selectAllBook);
    }else{
        $id = $_GET['id'];
        $selectAllBook = "  SELECT books.*, categories.name as cate_name, authors.name as author_name
                            FROM books
                            INNER JOIN categories ON books.cate_id = categories.id
                            INNER JOIN authors ON books.author_id = authors.id
                            WHERE books.status = 0 and books.cate_id= $id
                            ORDER by id desc LIMIT $offset, $no_of_records_per_page";
        $books = executeQuery($selectAllBook);
    }
    
$selectAllBookRelated = "   SELECT books.*,authors.name as author_name, categories.id as category_id, categories.name as cate_name
from books 
INNER JOIN authors on books.author_id = authors.id 
INNER JOIN categories on books.cate_id = categories.id
where books.status = 0 and books.author_id = $id
order by books.author_id desc limit 6";
$bookRelateds = executeQuery($selectAllBookRelated);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSHOP</title>
    <?php include '../layouts/css.php' ?>
    <link rel="stylesheet" href="<?=BASE.'dist/css/client/pages/author.css" type="text/css'?>">
</head>

<body>
    <header class="header">
        <?php require_once '../layouts/header.php'; ?>
    </header>
    <div class="container">
        <div class="book-detail-content row">

            <div class="col-md-4 book-cover">
                <div class="book-cover__wrapper">
                    <img src="<?= BASE.'dist/img/authors/'.$authors['avatar'] ?>" class="book-cover__image"
                        alt="Ảnh tác giả">
                </div>
            </div>

            <div class="col-md-8">
                <div class="book-detail-info">
                    <div class="book-info__header">
                        <div class="book-info__title">
                            <h2>
                                <?= $authors['name'] ?>
                            </h2>
                        </div>
                        <div class="book-info__authors m-t-10">
                            <span class="info-authors__name">
                                Ngày sinh: <?php if($authors['birthday']!="0000-00-00"): ?>
                                            <?= date('d-m-Y',strtotime($authors['birthday'])) ?>
                                            <?php else : ?>
                                            Chưa xác định
                                            <?php endif ?>
                            </span>
                        </div>
                    </div>
                    <div class="book-info__description">
                        <div class="book-description__text">
                        <?= $authors['description'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="book-author">
            <div class="book-author__title">
                <h2></h2>
            </div>
            <div class="book-carouse">
            <div class="book-carouse__header">
                <div class="carouse-header__title">Sản phẩm</div>
            </div>
            <div class="book-carouse__body">
                <?php if(count($bookRelateds) > 0) : ?>
                <div class="row">
                    <?php foreach($bookRelateds as $bookRelated): ?>
                    <!-- <div class="col-md-3"> -->
                    <div class="book-card">
                        <div class="book-card__img">
                            <a
                                href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookRelated['id'].'&cate_id='.$bookRelated['cate_id']?>">
                                <img src="<?= BASE.'dist/img/books/'.$bookRelated['image']?>"
                                    alt="Ảnh sản phẩm liên quan">
                            </a>
                        </div>

                        <div class="book-card__title">
                            <a
                                href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookRelated['id'].'&cate_id='.$bookRelated['cate_id']?>">
                                <h3><?=$bookRelated['name'] ?></h3>
                            </a>
                        </div>
                        <div class="book-card__author" style="font-size: 10px">
                            Tác giả:
                            <a href="">
                                <?=$bookRelated['author_name'] ?></a>
                        </div>
                        <div class="book-card__star">
                            <p> <span class="book-star">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </span>
                            </p>
                        </div>

                        <div class="book-card__price">
                            <?php if($bookRelated['sale']==$bookRelated['price']):?>
                            <span><?=number_format($bookRelated['sale'],0,'',',')?>đ</span>
                            <?php else: ?>
                            <span><?=number_format($bookRelated['sale'],0,'',',')?>đ</span>
                            <del><?=number_format($bookRelated['price'],0,'',',')?>đ</del>
                            <?php endif ?>
                        </div>
                        <div class="book-card__btn">
                            <?php if(isset($_SESSION['auth'])): ?>
                            <a href="<?=BASE_CLIENT.'pages/cart-add.php?id='.$bookRelated['id']?>"
                                class="shopping-btn"><i class="fa fa-shopping-cart"></i></a>
                            <!-- <a href="<?=BASE_CLIENT.'pages/delete-heart.php?id='.$bookRelated['id']?>" class="heart-btn"><i
                                            class="fas fa-heart"></i></a> -->
                            <form action="<?=BASE_CLIENT.'pages/add-heart.php?id='.$bookRelated['id']?>" method="post">
                                <input type="hidden" value="<?=$_SESSION['auth']['id']?>" name="user_id">
                                <input type="hidden" value="<?=$bookRelated['id']?>" name="book_id">
                                <button type="submit" class="heart-btn"><i class="far fa-heart"></i></button>
                            </form>
                            <?php else: ?>
                            <a href="<?=BASE_CLIENT.'pages/login.php'?>" class="shopping-btn"><i
                                    class="fa fa-shopping-cart"></i></a>
                            <a href="<?=BASE_CLIENT.'pages/login.php'?>" class="heart-btn"><i
                                    class="far fa-heart"></i></a>
                            <?php endif ?>
                            <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookRelated['id'].'&cate_id='.$bookRelated['cate_id']?>"
                                class="review-btn">Chi tiết</a>
                        </div>
                    </div>
                    <!-- </div> -->
                    <?php endforeach ?>
                </div>
                <?php else: ?>
                <div class="book-user-comment__message">
                    <p style="font-size:10pt; text-align:center"> Chưa có sách cùng loại nào!</p>
                </div>
                <?php endif ?>
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
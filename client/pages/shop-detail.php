<?php
// session_start();
require_once '../../connect/base.php';
require_once '../../connect/db.php';
require_once '../../connect/dao/pdo_comment.php';

$id = $_GET['id'];
$cate_id = $_GET['cate_id'];

$selectAllCate = "SELECT * from `categories` where status = 0";
// $selectAllCate = "SELECT * from `wishlists` where status = 0";
$categories = executeQuery($selectAllCate);

$selectOneBook = "  SELECT books.*, categories.name as cate_name, categories.slug as cate_slug, authors.name as author_name
                        FROM books
                        INNER JOIN categories ON books.cate_id = categories.id
                        INNER JOIN authors ON books.author_id = authors.id
                        WHERE books.status = 0 and books.id=$id order by id desc";
$books = executeQuery($selectOneBook, false);

$selectAllBookRelated = "   SELECT books.*,authors.name as author_name, categories.id as category_id, categories.name as cate_name
                        from books 
                        INNER JOIN authors on books.author_id = authors.id 
                        INNER JOIN categories on books.cate_id = categories.id
                        where books.status = 0 and books.id != $id and books.cate_id = $cate_id
                        order by rand() desc limit 6";
$bookRelateds = executeQuery($selectAllBookRelated);
// echo count($bookRelateds);
// die;

$selectAllComment = "SELECT comments.*, books.name as book_name, users.name as user_name, users.avatar as user_avatar
                    FROM comments
                    INNER JOIN books ON comments.book_id = books.id
                    INNER JOIN users ON comments.user_id = users.id
                    WHERE comments.book_id=$id and comments.content != '' order by id desc";
$comments = executeQuery($selectAllComment);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSHOP</title>
    <?php include '../layouts/css.php' ?>
    <link rel="stylesheet" href="<?= BASE . 'dist/css/client/pages/shop-detail.css" type="text/css' ?>">
</head>

<body>
    <?php if($books['id'] == $_GET['id'] && $books['cate_id'] == $_GET['cate_id']): ?>
    <?php executeQuery("UPDATE `books` SET view=view + 1 WHERE id = $id and status=0"); ?>
    <header class="header">
        <?php require_once '../layouts/header.php'; ?>
    </header>
    <div class="container">
        <div class="book-detail-content row">

            <div class="col-md-4 book-cover">
                <div class="book-cover__wrapper">
                    <img src="<?= BASE.'dist/img/books/'.$books['image'] ?>" class="book-cover__image" alt="Ảnh sản phẩm">
                </div>
            </div>

            <div class="col-md-8">
                <div class="book-detail-info">
                    <div class="book-info__header">
                        <div class="book-info__title">
                            <h2>
                                <?= $books['name'] ?>
                            </h2>
                        </div>
                        <div class="book-info__authors">
                            <span class="info-authors__name">
                                Tác giả:
                                <a href="{{route('author.detail',$author->id)}}">
                                    <?= $books['author_name'] ?> </a>
                            </span>
                        </div>
                        <div class="book-info-rating">
                            <div class="rate-stars">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="review-count ">( )</span>
                        </div>
                        <div class="book-info__tags">
                            <div class="info-tag__item">
                                <a href="<?=BASE_CLIENT.'pages/category.php?id='.$books['cate_id']?>"
                                    class="button button__outline-sm"><?=$books['cate_name'] ?></a>
                            </div>
                        </div>
                        <div class="book-info__price m-b-20 m-t-10">
                            <?php if ($books['sale'] == $books['price']) : ?>
                            <span><?= number_format($books['sale'], 0, '', ',') ?>đ </span>
                            <?php else : ?>
                            <span><?= number_format($books['sale'], 0, '', ',') ?>đ </span>
                            <del><?= number_format($books['price'], 0, '', ',') ?>đ</del>
                            <?php endif ?>
                        </div>

                    </div>
                    <!-- <div class="book-info__description">
                        <div class="book-description__text">
                            <?= $books['description'] ?>
                        </div>
                    </div> -->
                    <div class="book-button-group">
                        <div class="book-button-item">
                            <a href="<?=BASE_CLIENT.'pages/cart-add.php?id='.$books['id']?>"
                                class="button button__background-lg"><i class="fa fa-shopping-cart"></i> Thêm giỏ
                                hàng</a>
                        </div>
                        <div class="book-button-item">
                            <a href="" class="button button__outline-lg ">
                                <i class="fa fa-heart"></i> Yêu thích
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="book-tabs data-tabs">
            <div class="book-tabs__wrapper">
                <ul class="nav nav-tabs book-tabs__list justify-content-center">
                    <li class="book-tabs__item">
                        <a class="book-tabs__link active" data-toggle="tab" href="#description">Mô tả</a>
                    </li>
                    <li class="book-tabs__item">
                        <a class="book-tabs__link" data-toggle="tab" href="#comment">Bình luận</a>
                    </li>
                    <li class="book-tabs__item">
                        <a class="book-tabs__link" data-toggle="tab" href="#rating">Đánh giá </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="book-tabs__description tab-pane in active" id="description">
                    <?= $books['description'] ?>
                </div>

                <div class="book-tabs__comment tab-pane in" id="comment">
                    <?php if (isset($_SESSION['auth'])) : ?>
                    <div class="comment-box__wrapper">
                        <div class="comment-box__image">
                            <img src="<?= $_SESSION['auth']['avatar'] ?>" alt="" id="js-user-avatar">
                        </div>
                        <div class="comment-box__content">
                            <form action="<?= BASE_CLIENT . 'pages/comment.php' ?>" method="post">
                                <div class="comment__input">
                                    <input type=text name=content placeholder="Viết bình luận ..." />
                                    <input type="hidden" name="user_id" value="<?= $_SESSION['auth']['id'] ?>" />
                                    <input type="hidden" name="book_id" value="<?= $_GET['id'] ?>" />
                                </div>
                                <div class="comment__btn">
                                    <button name="comment" class="button button__background-lg button-comment">Bình
                                        luận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php else : ?>
                    <p class="text-center" style="font-weight: 700; font-size: 16pt">Vui lòng đăng nhập để gửi bình
                        luận!</p>
                    <?php endif ?>
                    <div class="js-book-user-comment m-t-20" id="js-book-user-comment">
                        <?php if(count($comments) > 0):?>
                        <?php foreach($comments as $comment): ?>
                        <div class="book-user-comment">
                            <div class="comment-box__image">
                                <img src="<?=BASE.'dist/img/users/'.$comment['user_avatar']?>" alt="">
                            </div>
                            <div class="book-user-comment__body js-comment-body">
                                <div class="book-user-comment__heading">
                                    <div class="book-user-comment__name"><?=$comment['user_name']?></div>
                                    <div class="book-user-comment__content"><?=$comment['content']?></div>
                                </div>
                                <div class="book-user-comment__footer">
                                    <div class="book-user-comment__date">
                                        <?=date('d-m-Y',strtotime($comment['created_at'])) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <?php else: ?>
                        <p class="text-center m-t-20" style="font-weight: 300;">Sách chưa có bình luận nào!</p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="book-tabs__comment tab-pane" id="rating">

                </div>
            </div>
        </div>

        <div class="book-carouse">
            <div class="book-carouse__header">
                <div class="carouse-header__title">Sách cùng thể loại</div>
            </div>
            <div class="book-carouse__body">
                <?php if(count($bookRelateds) > 0) : ?>
                <div class="books__slider owl-carousel">
                    <?php foreach($bookRelateds as $bookRelated): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                        <a href="">
                            <div class="book-card">
                                <div class="book-card__img">
                                    <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookRelated['id']?>">
                                        <img src="<?= BASE.'dist/img/books/'.$bookRelated['image']?>" alt="Ảnh sản phẩm liên quan">
                                    </a>
                                </div>

                                <div class="book-card__title">
                                    <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookRelated['id']?>">
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
                                    <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookRelated['id']?>"
                                        class="review-btn">Chi tiết</a>
                                </div>
                            </div>
                        </a>
                    </div>
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
    <footer class="footer">
        <?php require_once '../layouts/footer.php'; ?>
    </footer>
    <?php include '../layouts/script.php' ?>
    <?php else: ?>
    <?php header('location:'.BASE.'404.php') ?>
    <?php endif ?>

</body>

</html>
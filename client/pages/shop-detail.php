<?php
// session_start();
require_once '../../connect/base.php';
require_once '../../connect/db.php';
require_once '../../connect/dao/pdo_comment.php';

$id = $_GET['id'];

$selectAllCate = "SELECT * from `categories` where status = 0";
$categories = executeQuery($selectAllCate);

$selectAllBook = "  SELECT books.*, categories.name as cate_name, authors.name as author_name
                        FROM books
                        INNER JOIN categories ON books.cate_id = categories.id
                        INNER JOIN authors ON books.author_id = authors.id
                        WHERE books.status = 0 and books.id=$id order by id desc";
$books = executeQuery($selectAllBook, false);

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
    <header class="header">
        <?php require_once '../layouts/header.php'; ?>
    </header>
    <div class="container">
        <div class="book-detail-content row">

            <div class="col-md-4 book-cover">
                <div class="book-cover__wrapper">
                    <img src="<?= $books['image'] ?>" class="book-cover__image" alt="">
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
                        <div class="book-info__price m-b-20">
                            <?php if ($books['sale'] == $books['price']) : ?>
                            <span><?= number_format($books['sale'], 0, '', ',') ?>đ </span>
                            <?php else : ?>
                            <span><?= number_format($books['sale'], 0, '', ',') ?>đ </span>
                            <del><?= number_format($books['price'], 0, '', ',') ?>đ</del>
                            <?php endif ?>
                        </div>

                    </div>
                    <div class="book-info__description">
                        <div class="book-description__text">
                            <!-- <?= substr(strip_tags($books['description']), 0, 150); ?> -->
                            <?= $books['description'] ?>
                        </div>
                    </div>
                    <div class="book-button-group">
                        <div class="book-button-item">
                            <a href="{{ route('Book.Order', ['id' => $book->id]) }}"
                                class="button button__background-lg"><i class="fa fa-shopping-cart"></i> Thêm giỏ
                                hàng</a>
                        </div>
                        <div class="book-button-item">
                            <a href="{{ route('book.review', $book->slug) }}" class="button button__outline-lg ">
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
                                <img src="<?=$comment['user_avatar']?>" alt="">
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
                        <p class="text-center m-t-20" style="font-weight: 300;">Chưa có bình luận nào</p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="book-tabs__comment tab-pane" id="rating">

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
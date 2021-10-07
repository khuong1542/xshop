<?php
    require_once '../../connect/base.php';
    require_once '../../connect/db.php';
    $selectAllPost = "SELECT * from posts where status = 0";
    $posts  = executeQuery($selectAllPost, false);

    $id = $_GET['id'];
    $selectAllComment = "SELECT comment_posts.*, posts.title as post_title, users.name as user_name, users.avatar as user_avatar
    FROM comment_posts
    INNER JOIN posts ON comment_posts.post_id = posts.id
    INNER JOIN users ON comment_posts.user_id = users.id
    WHERE comment_posts.post_id=$id and comment_posts.content != '' order by id desc";
    $comment_posts = executeQuery($selectAllComment);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSHOP</title>
    <?php include '../layouts/css.php' ?>
    <link rel="stylesheet" href="<?= BASE . 'dist/css/client/pages/post-detail.css" type="text/css' ?>">
</head>

<body>
    <header class="header">
        <?php require_once '../layouts/header.php'; ?>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-area">
                    <div class="blog-post-details">
                        <div class="blog-img">
                            <a href="#">
                                <img src="<?= $posts['image'] ?>" alt="">
                            </a>
                        </div>
                        <div class="blog-content m-t-20">
                            <div class="blog-content__title">
                                <h3><?= $posts['title'] ?></h3>
                            </div>
                            <div class="blog-content__date">
                                <span><a href="#"></a><?= date('d-m-Y', strtotime($posts['created_at'])) ?>
                                ( <?=count($comment_posts)?> <a href="#comment">#comments</a>)</span>
                            </div>
                            <div class="blog-content__content">
                                <?= $posts['content'] ?>
                            </div>
                            <div class="comment-box m-t-10">
                                <div class="comment-title m-b-20">
                                    <h3><?=count($comment_posts)?> comments</h3>
                                </div>
                                <div class="book-tabs__comment m-l-10 " id="comment">
                                    <?php if (isset($_SESSION['auth'])) : ?>
                                        <div class="comment-box__wrapper">
                                            <div class="comment-box__image">
                                                <img src="<?= $_SESSION['auth']['avatar'] ?>" alt="" id="js-user-avatar">
                                            </div>
                                            <div class="comment-box__content">
                                                <form action="<?= BASE_CLIENT . 'pages/post-comment.php' ?>" method="post">
                                                    <div class="comment__input">
                                                        <input type=text name=content placeholder="Viết bình luận ..." />
                                                        <input type="hidden" name="user_id" value="<?= $_SESSION['auth']['id'] ?>" />
                                                        <input type="hidden" name="post_id" value="<?= $_GET['id'] ?>" />
                                                    </div>
                                                    <div class="comment__btn">
                                                        <button name="comment" class="button button__background-lg button-comment">Bình
                                                            luận</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <p class="text-center" style="font-weight: 700; font-size: 16pt">Vui lòng đăng
                                            nhập để gửi bình
                                            luận!</p>
                                    <?php endif ?>
                                    <div class="js-book-user-comment m-t-20" id="js-book-user-comment">
                                        <?php if (count($comment_posts) > 0) : ?>
                                            <?php foreach ($comment_posts as $comment_post) : ?>
                                                <div class="book-user-comment">
                                                    <div class="comment-box__image">
                                                        <img src="<?= $comment_post['user_avatar'] ?>" alt="">
                                                    </div>
                                                    <div class="book-user-comment__body js-comment-body">
                                                        <div class="book-user-comment__heading">
                                                            <div class="book-user-comment__name"><?= $comment_post['user_name'] ?>
                                                            </div>
                                                            <div class="book-user-comment__content"><?= $comment_post['content'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="book-user-comment__footer">
                                                            <div class="book-user-comment__date">
                                                                <?= date('d-m-Y', strtotime($comment_post['created_at'])) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                            <p class="text-center m-t-20" style="font-weight: 300;">Bài viết chưa có bình
                                                luận nào!</p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
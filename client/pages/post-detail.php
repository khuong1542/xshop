<?php
    require_once '../../connect/base.php';
    require_once '../../connect/db.php';
    $id = $_GET['id'];
    $selectAllPost = "SELECT * from posts where id = $id and status=0";
    $posts  = executeQuery($selectAllPost, false);

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
    <?php if($posts['id'] == $_GET['id']): ?>
        
    <?php executeQuery("UPDATE `posts` SET view=view + 1 WHERE id = $id and status=0"); ?>
    <header class="header">
        <?php require_once '../layouts/header.php'; ?>
    </header>
    <div class="container m-b-20">
        <?php if(isset($posts['id']) && $posts['status']==0): ?>
        <div class="row">
            <div class="col-md-9">
                <div class="blog-area">
                    <div class="blog-post-details">
                        <div class="blog-img">
                            <a href="#">
                                <img src="<?= BASE.'dist/img/posts/'.$posts['image'] ?>" alt="">
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
                                            <img src="<?= BASE.'dist/img/users/'.$_SESSION['auth']['avatar'] ?>" alt="" id="js-user-avatar">
                                        </div>
                                        <div class="comment-box__content">
                                            <form action="<?= BASE_CLIENT . 'pages/post-comment.php' ?>" method="post">
                                                <div class="comment__input">
                                                    <input type=text name=content placeholder="Vi???t b??nh lu???n ..." />
                                                    <input type="hidden" name="user_id"
                                                        value="<?= $_SESSION['auth']['id'] ?>" />
                                                    <input type="hidden" name="post_id" value="<?= $_GET['id'] ?>" />
                                                </div>
                                                <div class="comment__btn">
                                                    <button name="comment"
                                                        class="button button__background-lg button-comment">B??nh
                                                        lu???n</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php else : ?>
                                    <p class="text-center" style="font-weight: 700; font-size: 16pt">Vui l??ng ????ng
                                        nh???p ????? g???i b??nh
                                        lu???n!</p>
                                    <?php endif ?>
                                    <div class="js-book-user-comment m-t-20" id="js-book-user-comment">
                                        <?php if (count($comment_posts) > 0) : ?>
                                        <?php foreach ($comment_posts as $comment_post) : ?>
                                        <div class="book-user-comment">
                                            <div class="comment-box__image">
                                                <img src="<?= BASE.'dist/img/users/'.$comment_post['user_avatar'] ?>" alt="">
                                            </div>
                                            <div class="book-user-comment__body js-comment-body">
                                                <div class="book-user-comment__heading">
                                                    <div class="book-user-comment__name">
                                                        <?= $comment_post['user_name'] ?>
                                                    </div>
                                                    <div class="book-user-comment__content">
                                                        <?= $comment_post['content'] ?>
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
                                        <p class="text-center m-t-20" style="font-weight: 300;">B??i vi???t ch??a c?? b??nh
                                            lu???n n??o!</p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <button class="alert alert-danger text-danger" style="font-size: 1.5rem; width:100%; height:50px;">
            Kh??ng t???n t???i b??i vi???t n??y!
        </button>
        <?php endif ?>
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
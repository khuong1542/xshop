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
    $total_pages_sql = "SELECT * FROM posts  where status = 0";
    $total_rows = count(executeQuery($total_pages_sql));
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $selectAllPost = "SELECT * from posts where status = 0";
    $posts  = executeQuery($selectAllPost);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSHOP</title>
    <?php include '../layouts/css.php' ?>
    <link rel="stylesheet" href="<?=BASE.'dist/css/client/pages/post.css" type="text/css'?>">
</head>

<body>
    <header class="header">
        <?php require_once '../layouts/header.php'; ?>
    </header>
    <section class="breadcrumb-section set-bg"
        data-setbg="https://drncvpyikhjv3.cloudfront.net/sites/131/2016/09/21101909/blue-background-header-1.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Bài viết</h2>
                        <div class="breadcrumb__option">
                            <a href="<?=BASE_CLIENT?>">Trang chủ</a>
                            <i class="fa fa-chevron-right"></i>
                            <span>Bài viết</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container m-t-20">
        <div class="row post-desktop">
            <div class="col-md-9 post-wrap">
                <div class="post-header">
                    <div class="post-header-text">Danh sách bài viết</div>
                    <!-- <div class="post-header-button">
                        <a href="{{route('post.create')}}" class="post-header-link">Tạo bài viết</a>
                    </div> -->
                </div>
                <div class="post-list">
                    <?php foreach ($posts as $post):?>
                    <div class="post-item">
                        <div class="post-item__aside col-md-2">
                            <div class="post-user-avatar">
                                <a href="<?=BASE_CLIENT.'pages/post-detail.php?id='.$post['id']?>" class="post-user-avatar__link">
                                    <img class="post-image" src="<?=$post['image']?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="post-item__content col-md-10">
                            <div class="post-content__title">
                                <a href="<?=BASE_CLIENT.'pages/post-detail.php?id='.$post['id']?>" class="post-title__link">
                                    <?=$post['title'] ?>
                                </a>
                            </div>
                            <!-- <div class="post-content__tag">
                                @foreach($post->cates as $cate)
                                <div class="post-tag__item">
                                    <a href="" class="post-tag__link">
                                        #{{$cate->name}}
                                    </a>
                                </div>
                                @endforeach
                            </div> -->
                            <div class="post-content__content">
                                <?=substr($post['content'],0,150) ?>...
                            </div>

                            <div class="post-content__footer">
                                <div class="post-footer__details">
                                    <div class="post-content__date">
                                        <?=date('d-m-Y',strtotime($post['created_at']))?></div>

                                    <div class="post-wishlist">
                                        <span class="post-wishlist__span">
                                            <i class="fas fa-heart"></i>
                                            2
                                            Yêu thích
                                        </span>
                                    </div>
                                    <div class="post-view">
                                        <span class="post-view__span"><i class=" fa fa-eye"></i>
                                            5
                                            Lượt xem
                                        </span>
                                    </div>
                                    <div class="post-comment">
                                        <span class="post-comment__span"><i class=" fa fa-comments"></i>
                                            3
                                            bình luận
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="text-center">
                    <div class="category-pagination__wrap">
                        <div class="ui pagination menu category-pagination" role="navigation">
                            <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                                <a class="page-link"
                                    href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                            </li>
                            <?php for($i=1;$i<=$total_pages; $i++): ?>
                            <li class="page-item"><a class="page-link" href="<?='?page='.$i?>"><?=$i?></a></li>
                            <?php endfor ?>
                            <li class="page-item <?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                                <a class="page-link"
                                    href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">
                                    <i class="fa fa-chevron-right "></i>
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3 post-aside">
                <div class="post-aside-wrap">
                    <div id="row_wishlist"></div>
                    <div class="post-aside-header">
                        <div class="post-aside-header__text">Danh mục bài viết</div>

                    </div>
                    <div class="post-aside__list ">
                        @foreach ($cates as $cate)
                        <div class="post-aside__item">
                            <a href="" class="post-aside__link">
                                {{ $cate->name }}
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- <script>
    $(document).ready(function() {
        $('.cate-post').click(function() {
            $('.post-aside-header').toggleClass('show-border')

            $('.post-aside__list').slideToggle();
        })
    })
    </script> -->
    <footer class="footer">
        <?php require_once '../layouts/footer.php'; ?>
    </footer>
    <?php include '../layouts/script.php' ?>
</body>

</html>
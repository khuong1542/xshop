<?php session_start(); ?>

<?php
sleep(1);
?>

<header class="header header-desktop container">

    <div class="header__logo">
        <a href=""><img src="<?=BASE.'dist/img/logo.png'?>" alt="" class="header__logo-img"></a>
    </div>

    <ul class="header__nav">
        <li class="header__nav-li"><a class="link" href="<?=BASE_CLIENT?>">Trang Chủ</a></li>
        <li class="header__nav-li"><a class="link" href="<?=BASE_CLIENT.'pages/category.php'?>">Danh Mục</a></li>
        <li class="header__nav-li"><a class="link" href="<?=BASE_CLIENT.'pages/post.php'?>">Bài Viết</a></li>
        <li class="header__nav-li"><a class="link" href="<?=BASE_CLIENT.'pages/contact.php'?>">Liên Hệ</a></li>
    </ul>
    <div class="header__search">
        <form action="<?=BASE_CLIENT.'pages/search.php' ?>" method="post" class="search-form"  enctype="multipart/form-data">
            <input class="search-input" name="keyword" id="js-header-search-desktop" type="text" placeholder="Tìm kiếm theo tên sách" value="">
            <button class="search-btn" name="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <div class="search__dropdown" hidden id="js-search__dropdown">
            <div class="search-dropdown__categories">

                <div class="search-dropdown__heading">
                    Sách
                </div>

                <ul class="search-dropdown__ul " id="js-search-dropdown__ul--cate">


                </ul>
            </div>
            <div class="search-dropdown__authors">

                <div class="search-dropdown__heading">
                    Tác Giả
                </div>

                <ul class="search-dropdown__ul " id="js-search-dropdown__ul--author">

                </ul>

            </div>
            <div class="search-dropdown__posts">

                <div class="search-dropdown__heading">
                    Bài Viết
                </div>

                <ul class="search-dropdown__ul " id="js-search-dropdown__ul--post">

                </ul>

            </div>
            <a class="load-more__notification js-search-all" href="javascript:void(0)">Xem tất cả </a>
        </div>
    </div>
    <div class="header__information">
        <?php if(isset($_SESSION['auth'])) : ?>
            <div>
                <a id="navbarDropdown" class="nav-link  header__information-info" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="<?php echo $_SESSION['auth']['avatar'] ?>" alt="">
                    <i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-custom" aria-labelledby="navbarDropdown">
                    <?php if($_SESSION['auth']['role_id'] == 1) : ?>
                    <a class="dropdown-item dropdown-item-custom" href="<?php echo BASE_ADMIN ?>">
                        <i class="fas fa-users-cog"></i>Quản trị
                    </a>
                    <?php endif ?>
                    <a class="dropdown-item dropdown-item-custom" href="">
                        <i class="fas fa-user"></i>Hồ sơ cá nhân
                    </a>
                    <!-- <a class="dropdown-item dropdown-item-custom" href="">
                        <i class="fas fa-history"></i>Lịch sử mượn sách
                    </a>
                    <a class="dropdown-item dropdown-item-custom" href="">
                        <i class="fas fa-address-book"></i>Bài viết của tôi
                    </a>
                    <a class="dropdown-item dropdown-item-custom" href="">
                        <i class="fas fa-star"></i>Đánh giá
                    </a> -->
                    <a class="dropdown-item dropdown-item-custom" href="<?=BASE_CLIENT.'pages/logout.php'?>">
                        <i class="fas fa-sign-out-alt"></i>Đăng xuất
                    </a>

                </div>
            </div>
        <?php else: ?>
            <a class="btn--login" href="<?=BASE_CLIENT.'pages/login.php'?>">Đăng nhập</a>
        <?php endif ?>
    </div>
</header>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


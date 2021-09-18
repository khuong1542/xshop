<?php session_start(); ?>

<?php
sleep(1);
?>

<header class="header header-desktop container">

    <div class="header__logo">
        <a href=""><img src="../dist/img/logo.png" alt="" class="header__logo-img"></a>
    </div>

    <ul class="header__nav">
        <li class="header__nav-li"><a class="link" href="">Trang Chủ</a></li>
        <li class="header__nav-li"><a class="link" href="">Danh Mục</a></li>
        <li class="header__nav-li"><a class="link" href="">Bài Viết</a></li>
        <li class="header__nav-li"><a class="link" href="">Liên Hệ</a></li>
    </ul>
    <div class="header__search">
        <form action="" method="Get" class="search-form" autocomplete="off">
            <input class="search-input" name="keyword" id="js-header-search-desktop" type="text" placeholder="Tìm kiếm theo tên sách, tác giả" value="">
            <button class="search-btn">
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
            <!-- <div class="header__information-notification ">
                <div class="header-notification" id="header-notification">
                    <button class=" header-notification__bell" id="alertsDropdown">
                        <i class="fas fa-bell fa-fw"></i>
                        <span class="badge badge-danger badge-counter" id="unread-notify"></span>
                    </button>

                    <div hidden id="menu_notification" aria-labelledby="alertsDropdown">
                        <div class="notification-dropdown-header">
                            <div class="notification-header__title">Thông báo</div>
                            <div class="notification-header__more"><a href="">Đánh dấu tất cả là đã đọc</a></div>
                        </div>
                        <div class="notification-dropdown-body">
                            <div id="notification-message"> Bạn chưa có thông báo mới</div>
                            <div class=" notification-dropdown">
                                <a class="notification-dropdown__link" href="">
                                    <div class="notification-dropdown-wrapper">

                                        <div class="notification-avatar">
                                            <img src="" alt="">

                                        </div>
                                        <div class=" notification-body">
                                            <div class="notification-body__content "></div>
                                            <span class="notification-body__time "></span>
                                        </div>
                                        <div class=" notification-icon">
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-check "></i>
                                        </div>
                                    </div>
                                </a>
                            </div>


                        </div>
                        <a class="load-more__notification" href="">Xem tất cả </a>
                    </div>
                </div>
            </div> -->
            <div>
                <a id="navbarDropdown" class="nav-link  header__information-info" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="<?php echo $_SESSION['auth']['avatar'] ?>" alt="">
                    <i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-custom" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item dropdown-item-custom" href="">
                        <i class="fas fa-users-cog"></i>Quản trị
                    </a>
                    <a class="dropdown-item dropdown-item-custom" href="">
                        <i class="fas fa-user"></i>Hồ sơ cá nhân
                    </a>
                    <a class="dropdown-item dropdown-item-custom" href="">
                        <i class="fas fa-history"></i>Lịch sử mượn sách
                    </a>
                    <a class="dropdown-item dropdown-item-custom" href="">
                        <i class="fas fa-address-book"></i>Bài viết của tôi
                    </a>
                    <a class="dropdown-item dropdown-item-custom" href="">
                        <i class="fas fa-star"></i>Đánh giá
                    </a>
                    <a class="dropdown-item dropdown-item-custom" href="pages/logout.php">
                        <i class="fas fa-sign-out-alt"></i>Đăng xuất
                    </a>

                </div>
            </div>
        <?php else: ?>
            <a class="btn--login" href="pages/login.php">Đăng nhập</a>
        <?php endif ?>
    </div>
</header>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

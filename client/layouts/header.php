<?php 
session_start(); 
$user_id = isset($_SESSION['auth']['id'])? $_SESSION['auth']['id'] : null;

//kiểm tra giỏ hàng 
$totalItemOnCart = 0;
$totalPrice = 0;
$cart = '';
$cart = isset($_SESSION[CART]) ? $_SESSION[CART] : null;
if($cart != ''){
    foreach ($cart as $item) {
        $totalItemOnCart += $item['quantity'];
        $itemTotal = $item['price']*$item['quantity'];
        $totalPrice += $itemTotal;
    }
}
$logo = executeQuery("SELECT * from logo where status = 0 limit 1");
if(isset($_SESSION['auth'])){
    $user_id = $_SESSION['auth']['id'];
    $users = executeQuery(("SELECT*FROM `users`where id = $user_id"),false);
}
?>

<?php
// sleep(1);
?>

<header class="header header-desktop container">

    <div class="header__logo">
        <?php foreach($logo as $lo):?>
        <?php if($lo['status']==0): ?>
        <a href="<?=BASE?>"><img src="<?=BASE.'dist/img/logo/'.$lo['image']?>" alt="" class="header__logo-img"></a>
        <?php else: ?>
        <a href="<?=BASE?>"><img src="https://jobseekers.vn/wp-content/uploads/2017/04/default-logo.png" alt="Logo" class="header__logo-img"></a>
        <?php endif ?>
        <?php endforeach ?>
    </div>

    <ul class="header__nav">
        <li class="header__nav-li"><a class="link" href="<?=BASE_CLIENT?>">Trang Chủ</a></li>
        <li class="header__nav-li"><a class="link" href="<?=BASE_CLIENT.'pages/category.php'?>">Danh Mục</a></li>
        <li class="header__nav-li"><a class="link" href="<?=BASE_CLIENT.'pages/post.php'?>">Bài Viết</a></li>
        <li class="header__nav-li"><a class="link" href="<?=BASE_CLIENT.'pages/contact.php'?>">Liên Hệ</a></li>
    </ul>
    <div class="header__search">
        <form action="<?=BASE_CLIENT.'pages/search.php'?>" method="post" class="search-form"
            enctype="multipart/form-data">
            <input class="search-input" name="keyword" id="js-header-search-desktop" type="text"
                placeholder="Tìm kiếm theo tên sách" value="">
            <button class="search-btn" name="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <div class="header__information">
        <?php if(isset($_SESSION['auth'])) : ?>
        <div class="header__information-notification ">
            <div class="header-notification" id="header-notification">
                <a href="<?=BASE_CLIENT.'pages/cart.php' ?>" class="header-notification__bell" id="alertsDropdown">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge badge-danger badge-counter" id="unread-notify">
                        <?php echo $totalItemOnCart ?></span>
                </a>
            </div>
        </div>
        <div>
            <a id="navbarDropdown" class="nav-link  header__information-info" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img src="<?php echo BASE.'dist/img/users/'.$users['avatar'] ?>" alt="">
                <i class="fas fa-caret-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-custom" aria-labelledby="navbarDropdown">
                <?php if($_SESSION['auth']['role_id'] == 1) : ?>
                <a class="dropdown-item dropdown-item-custom" href="<?php echo BASE_ADMIN ?>">
                    <i class="fas fa-users-cog"></i>Quản trị
                </a>
                <?php endif ?>
                <a class="dropdown-item dropdown-item-custom" href="<?=BASE_CLIENT.'pages/infomation.php?id='.$_SESSION['auth']['id']?>">
                    <i class="fas fa-user"></i>Hồ sơ cá nhân
                </a>
                <a class="dropdown-item dropdown-item-custom" href="">
                    <i class="fas fa-history"></i>Đơn hàng
                </a>
                <a class="dropdown-item dropdown-item-custom" href="<?=BASE_CLIENT.'pages/wishlists.php?user_id='.$_SESSION['auth']['id']?>">
                    <i class="fas fa-address-book"></i>Sản phẩm yêu thích
                </a>
                <a class="dropdown-item dropdown-item-custom" href="">
                    <i class="fas fa-star"></i>Đánh giá
                </a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"
    integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
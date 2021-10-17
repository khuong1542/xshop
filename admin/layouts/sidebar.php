
<?php 
session_start();
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=BASE_CLIENT ?>">
        <img src="<?=BASE.'dist/img/logo.png' ?>" alt="" width="50">
        <div class="sidebar-brand-text mx-3">X-Shop <span>Admin</span></div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?=BASE_ADMIN ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Interface
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#logo" aria-expanded="true"
            aria-controls="logo">
            <i class="fab fa-adn"></i>
            <span>Logo</span>
        </a>
        <div id="logo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?=BASE_ADMIN . 'logo/list.php' ?>">Danh sách</a>
                <a class="collapse-item" href="<?=BASE_ADMIN . 'logo/add-form.php' ?>">Thêm mới</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sliders" aria-expanded="true"
            aria-controls="sliders">
            <i class="fas fa-sliders-h"></i>
            <span>Slider</span>
        </a>
        <div id="sliders" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?=BASE_ADMIN . 'sliders/list.php' ?>">Danh sách</a>
                <a class="collapse-item" href="<?=BASE_ADMIN . 'sliders/add-form.php' ?>">Thêm mới</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categories" aria-expanded="true"
            aria-controls="categories">
            <i class="fas fa-th-list"></i>
            <span>Danh mục</span>
        </a>
        <div id="categories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?=BASE_ADMIN . 'categories/list.php' ?>">Danh sách</a>
                <a class="collapse-item" href="<?=BASE_ADMIN . 'categories/add-form.php' ?>">Thêm mới</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#authors" aria-expanded="true"
            aria-controls="authors">
            <i class="fas fa-user"></i>
            <span>Tác giả</span>
        </a>
        <div id="authors" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=BASE_ADMIN . 'authors/list.php' ?>">Danh sách</a>
                <a class="collapse-item" href="<?=BASE_ADMIN . 'authors/add-form.php' ?>">Thêm mới</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#books" aria-expanded="true"
            aria-controls="books">
            <i class="fas fa-address-book"></i>
            <span>Sản phẩm</span>
        </a>
        <div id="books" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=BASE_ADMIN . 'books/list.php' ?>">Danh sách</a>
                <a class="collapse-item" href="<?=BASE_ADMIN . 'books/add-form.php' ?>">Thêm mới</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#comments" aria-expanded="true"
            aria-controls="comments">
            <i class="fas fa-comments"></i>
            <span>Bình luận</span>
        </a>
        <div id="comments" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?=BASE_ADMIN.'comments/list-book.php'?>">Sản phẩm</a>
                <a class="collapse-item" href="<?=BASE_ADMIN.'comments/list-post.php'?>">Bài viết</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#posts" aria-expanded="true"
            aria-controls="posts">
            <i class="fas fa-book-open"></i>
            <span>Bài viết</span>
        </a>
        <div id="posts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=BASE_ADMIN . 'posts/list.php' ?>">Danh sách</a>
                <a class="collapse-item" href="<?=BASE_ADMIN . 'posts/add-form.php' ?>">Thêm mới</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Tài khoản
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-user-cog"></i>
            <span>Tài khoản quản trị</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?=BASE_ADMIN.'users/list-admin.php'?>">Danh sách tài khoản</a>
                <a class="collapse-item" href="<?=BASE_ADMIN.'users/add-form.php'?>">Thêm mới admin</a>
            </div>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?=BASE_ADMIN.'users/list.php'?>">
            <i class="fas fa-user-cog"></i>
            <span>Tài khoản người dùng</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->
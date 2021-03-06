<?php
    require_once '../../connect/base.php'; 
    require_once '../../connect/db.php'; 
    require_once '../layouts/slider.php'; 
    $selectAllCate = "SELECT * from `categories` where status = 0 order by id desc";
    $category = executeQuery($selectAllCate);
    // $selectAllBookCate = "select b.*,c.name as cate_name from books b join categories c
    //                         on b.cate_id = c.id order by id desc limit 6";
    $selectAllBookSpecial = "SELECT books.*,authors.name as author_name 
                            from books  join authors on books.author_id = authors.id 
                            where special = 0 order by id desc limit 6";
    $selectAllBookNew = "SELECT books.*,authors.name as author_name 
                        from books join authors on books.author_id = authors.id 
                        order by id desc limit 6";
    $selectAllBookFavorite = "SELECT books.*,authors.name as author_name 
                        from books join authors on books.author_id = authors.id 
                        where view > 0 order by view desc limit 10";
    $bookSpecials = executeQuery($selectAllBookSpecial);
    $bookNews = executeQuery($selectAllBookNew);
    $bookFavorites  = executeQuery($selectAllBookFavorite);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSHOP</title>
    <?php include '../layouts/css.php' ?>
    <link rel="stylesheet" href="<?=BASE.'dist/css/client/pages/index.css" type="text/css'?>">
</head>

<body>
    <header class="header">
        <?php require_once '../layouts/header.php'; ?>
    </header>
    <div class="container">
        <!-- Slider -->
        <div class="silder">
            <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php echo make_slide_indicators($connect) ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php echo make_sliders($connect) ?>
                </div>
                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- End Slide -->

        <!-- Category -->
        <div class="category">
            <section class="featured spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>Danh m???c</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="categories">
                <div class="container">
                    <div class="row">
                        <div class="categories__slider owl-carousel">
                            <?php foreach($category as $cate): ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                                <a href="<?=BASE_CLIENT.'pages/category.php?id='.$cate['id'] ?>">
                                    <div class="categories__item">
                                        <img src="<?= $cate['image']?>" alt="">
                                        <div class="featured__item__text">
                                            <h4><?php echo $cate['name'] ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- End Category -->

        <!-- Product Special -->
        <?php if (count($bookSpecials) > 0): ?>
        <div class="book-carouse special">
            <div class="book-carouse__header">
                <div class="carouse-header__title">S??ch ?????c bi???t</div>
            </div>
            <div class="book-carouse__body">
                <div class="books__slider owl-carousel">
                    <?php foreach($bookSpecials as $bookSpecial): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="">
                            <div class="book-card">
                                <div class="book-card__img">
                                    <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookSpecial['id']?>">
                                        <img src="<?= $bookSpecial['image']?>" alt="">
                                    </a>
                                </div>

                                <div class="book-card__title">
                                    <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookSpecial['id']?>">
                                        <h3><?=$bookSpecial['name'] ?></h3>
                                    </a>
                                </div>
                                <div class="book-card__author" style="font-size: 10px">
                                    T??c gi???:
                                    <a href="">
                                        <?=$bookSpecial['author_name'] ?></a>
                                </div>
                                <div class="book-card__star">
                                    <p> <span class="book-star">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                    </p>
                                </div>

                                <div class="book-card__price">
                                    <?php if($bookSpecial['sale'] == $bookSpecial['price']): ?>
                                    <span><?=number_format($bookSpecial['sale'],0,'',',')?>??</span>
                                    <?php else: ?>
                                    <span><?=number_format($bookSpecial['sale'],0,'',',')?>??</span>
                                    <del><?=number_format($bookSpecial['price'],0,'',',')?>??</del>
                                    <?php endif ?>
                                </div>
                                <div class="book-card__btn">
                                    <a href="<?=BASE_CLIENT.'pages/cart-add.php?id='.$bookSpecial['id']?>"
                                        class="borrow-btn"><i class="fa fa-shopping-cart"></i></a>
                                    <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookSpecial['id']?>"
                                        class="review-btn">Chi ti???t</a>
                                </div>

                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <?php endif ?>
        <!-- End Book Special -->

        <!-- Book New -->
        <div class="book-carouse new">
            <div class="book-carouse__header">
                <div class="carouse-header__title">S??ch m???i nh???t</div>
            </div>
            <div class="book-carouse__body">
                <?php if (count($bookNews) > 0): ?>
                <div class="books__slider owl-carousel">
                    <?php foreach($bookNews as $bookNew): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                        <a href="">
                            <div class="book-card">
                                <div class="item__hot">M???i</div>
                                <div class="book-card__img">
                                    <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookNew['id']?>">
                                        <img src="<?= $bookNew['image']?>" alt="">
                                    </a>
                                </div>

                                <div class="book-card__title">
                                    <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookNew['id']?>">
                                        <h3><?=$bookNew['name'] ?></h3>
                                    </a>
                                </div>
                                <div class="book-card__author" style="font-size: 10px">
                                    T??c gi???:
                                    <a href="">
                                        <?=$bookNew['author_name'] ?></a>
                                </div>
                                <div class="book-card__star">
                                    <p> <span class="book-star">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                    </p>
                                </div>
                                <div class="book-card__price">
                                    <?php if($bookNew['sale'] == 0): ?>
                                    <span><?=number_format($bookNew['price']-$bookNew['price']*$bookNew['sale']/100,0,'',',')?>??</span>
                                    <?php else: ?>
                                    <span><?=number_format($bookNew['sale'],0,'',',')?>??</span>
                                    <del><?=number_format($bookNew['price'],0,'',',')?>??</del>
                                    <?php endif ?>
                                </div>
                                <div class="book-card__btn">
                                    <?php if(isset($_SESSION['auth'])): ?>
                                    <a href="<?=BASE_CLIENT.'pages/cart-add.php?id='.$bookNew['id']?>"
                                        class="shopping-btn"><i class="fa fa-shopping-cart"></i></a>
                                    <a href="<?=BASE_CLIENT.'pages/login.php'?>" class="heart-btn"><i
                                            class="far fa-heart"></i></a>
                                    <?php else: ?>
                                    <a href="<?=BASE_CLIENT.'pages/login.php'?>" class="shopping-btn"><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a href="<?=BASE_CLIENT.'pages/login.php'?>" class="heart-btn"><i
                                            class="far fa-heart"></i></a>
                                    <?php endif ?>
                                    <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookNew['id']?>"
                                        class="review-btn">Chi ti???t</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>
                </div>
                <?php else: ?>
                <div class="book-user-comment__message">
                    <p style="font-size:10pt; text-align:center"> Ch??a c?? s??ch m???i n??o!</p>
                </div>
                <?php endif ?>
            </div>
        </div>
        <!-- End Book New -->

        <!-- Book Favorite -->
        <div class="book-carouse favorite">
            <div class="book-carouse__header">
                <div class="carouse-header__title">S??ch ???????c y??u th??ch nhi???u nh???t</div>
            </div>
            <div class="book-carouse__body">
                <?php if (count($bookFavorites) > 0): ?>
                <div class="books__slider owl-carousel">
                    <?php foreach($bookFavorites as $bookFavorite): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="">
                            <div class="book-card">
                                <div class="book-card__img">
                                    <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookFavorite['id']?>">
                                        <img src="<?= $bookFavorite['image']?>" alt="">
                                    </a>
                                </div>

                                <div class="book-card__title">
                                    <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookFavorite['id']?>">
                                        <h3><?=$bookFavorite['name'] ?></h3>
                                    </a>
                                </div>
                                <div class="book-card__author" style="font-size: 10px">
                                    T??c gi???:
                                    <a href="">
                                        <?=$bookFavorite['author_name'] ?></a>
                                </div>
                                <div class="book-card__star">
                                    <p> <span class="book-star">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                    </p>
                                </div>
                                <div class="book-card__price">
                                    <?php if($bookFavorite['sale'] == $bookFavorite['price']): ?>
                                    <span><?=number_format($bookFavorite['sale'],0,'',',')?>??</span>
                                    <?php else: ?>
                                    <span><?=number_format($bookFavorite['sale'],0,'',',')?>??</span>
                                    <del><?=number_format($bookFavorite['price'],0,'',',')?>??</del>
                                    <?php endif ?>
                                </div>
                                <div class="book-card__btn">
                                    <a href="<?=BASE_CLIENT.'pages/cart-add.php?id='.$bookFavorite['id']?>"
                                        class="borrow-btn"><i class="fa fa-shopping-cart"></i></a>
                                    <a href="<?=BASE_CLIENT.'pages/shop-detail.php?id='.$bookFavorite['id']?>"
                                        class="review-btn">Chi ti???t</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>
                </div>
                <?php else: ?>
                <div class="book-user-comment__message">
                    <p style="font-size:10pt; text-align:center"> Ch??a c?? s??ch ???????c y??u th??ch n??o!</p>
                </div>
                <?php endif ?>

            </div>
        </div>
        <!-- End Book Favorite -->
    </div>
    <footer class="footer">
        <?php require_once '../layouts/footer.php'; ?>
    </footer>
    <?php include 'layouts/script.php' ?>
</body>

</html>
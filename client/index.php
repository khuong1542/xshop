<?php
    require_once '../connect/base.php'; 
    require_once '../connect/db.php'; 
    require_once 'layouts/slider.php'; 
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
    <?php include 'layouts/css.php' ?>
    <link rel="stylesheet" href="<?=BASE.'dist/css/client/pages/index.css" type="text/css'?>">
</head>

<body>
    <header class="header">
        <?php require_once './layouts/header.php'; ?>
    </header>
    <div class="container">
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
        <div class="category">
            <section class="featured spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>Danh mục</h2>
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
                                <div class="categories__item">
                                    <img src="<?= $cate['image']?>" alt="">
                                    <div class="featured__item__text">
                                        <h4><a href=""><?php echo $cate['name'] ?></a></h4>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="product-special">
            <div class="book-carouse book-carouse-mobile">
                <div class="book-carouse__header">
                    <div class="carouse-header__title">Sách đặc biệt</div>
                </div>
                <?php if (count($bookSpecials) > 0): ?>
                <div class="book-carouse__body">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="book-carousel__wrapper">
                                <?php foreach ($bookSpecials as $bookSpecial): ?>
                                <div class="book-card ">
                                    <div class="book-card__img">
                                        <a href="">
                                            <img src="<?=$bookSpecial['image'] ?>" alt="" />
                                        </a>
                                    </div>
                                    <div class="book-card__title">
                                        <a href="">
                                            <h3><?=$bookSpecial['name'] ?></h3>
                                        </a>
                                    </div>
                                    <div class="book-card__author" style="font-size: 10px">
                                        Tác giả:
                                        <a href="">
                                            <?=$bookSpecial['author_name'] ?></a>
                                    </div>
                                    <div class="book-card__author">
                                        <p> <span class="book-star">
                                                <i class="fas fa-star"></i></p>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="book-user-comment__message">
                    <p style="font-size:10pt; text-align:center"> Chưa có sách đặc biệt nào!</p>
                </div>
                <?php endif ?>
            </div>
        </div>
        <div class="product-new">
            <div class="book-carouse book-carouse-mobile">
                <div class="book-carouse__header">
                    <div class="carouse-header__title">Sách mới nhất</div>
                </div>
                <?php if (count($bookNews) > 0): ?>
                <div class="book-carouse__body">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="book-carousel__wrapper">
                                <?php foreach ($bookNews as $bookNew): ?>
                                <div class="book-card ">
                                    <div class="book-card__img">
                                        <a href="">
                                            <img src="<?=$bookNew['image'] ?>" alt="" />
                                        </a>
                                    </div>
                                    <div class="book-card__title">
                                        <a href="">
                                            <h3><?=$bookNew['name'] ?></h3>
                                        </a>
                                    </div>
                                    <div class="book-card__author" style="font-size: 10px">
                                        Tác giả:
                                        <a href="">
                                            <?=$bookNew['author_name'] ?></a>
                                    </div>
                                    <div class="book-card__author">
                                        <p> <span class="book-star">
                                                <i class="fas fa-star"></i></p>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="book-user-comment__message">
                    <p style="font-size:10pt; text-align:center"> Chưa có sách đặc biệt nào!</p>
                </div>
                <?php endif ?>
            </div>
        </div>
        <div class="product-favorite">
            <div class="book-carouse book-carouse-mobile">
                <div class="book-carouse__header">
                    <div class="carouse-header__title">Sách được yêu thích nhiều nhất</div>
                </div>
                <?php if (count($bookFavorites) > 0): ?>
                <div class="book-carouse__body">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="book-carousel__wrapper">
                                <?php foreach ($bookFavorites as $bookFavorite): ?>
                                <div class="book-card ">
                                    <div class="book-card__img">
                                        <a href="">
                                            <img src="<?=$bookFavorite['image'] ?>" alt="" />
                                        </a>
                                    </div>
                                    <div class="book-card__title">
                                        <a href="">
                                            <h3><?=$bookFavorite['name'] ?></h3>
                                        </a>
                                    </div>
                                    <div class="book-card__author" style="font-size: 10px">
                                        Tác giả:
                                        <a href="">
                                            <?=$bookFavorite['author_name'] ?></a>
                                    </div>
                                    <div class="book-card__author">
                                        <p> <span class="book-star">
                                                <i class="fas fa-star"></i></p>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="book-user-comment__message">
                    <p style="font-size:10pt; text-align:center"> Chưa có sách đặc biệt nào!</p>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <footer class="footer">
        <?php require_once './layouts/footer.php'; ?>
    </footer>
    <?php include 'layouts/script.php' ?>
</body>

</html>
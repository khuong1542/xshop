<?php
    require_once '../connect/base.php'; 
    require_once '../connect/db.php'; 
    require_once 'layouts/slider.php'; 
    $selectAllCate = "SELECT * from `categories` where status = 0 order by id desc";
    $category = executeQuery($selectAllCate);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSHOP</title>
    <?php include 'layouts/css.php' ?>
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
                                    <img src="<?php echo BASE.'dist/img/categories/'.$cate['image']?>" alt="">
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
        <div class="product-special"></div>
        <div class="product-new"></div>
        <div class="product-favorite"></div>
    </div>
    <footer class="footer">
        <?php require_once './layouts/footer.php'; ?>
    </footer>
    <?php include 'layouts/script.php' ?>
</body>

</html>
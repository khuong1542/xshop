<?php
require_once '../../connect/base.php';
require_once '../../connect/db.php';

$cart = isset($_SESSION['CART']) ? $_SESSION['CART'] : [];
$totalPrice = 0;


?>
<html class="no-js" lang="">
<!-- Mirrored from preview.hasthemes.com/james-preview/james/cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Nov 2019 14:52:41 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Giỏ Hàng </title>
    <?php include '../layouts/css.php' ?>
    <link rel="stylesheet" href="<?=BASE.'dist/css/client/pages/cart.css'?>">
</head>

<body>

    <header class="header">
        <?php require_once '../layouts/header.php'; ?>
    </header>
    <div class="container">
        <div class="shopping-cart">
            <div class="table-responsive">
                <table class="table-bordered table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Hình ảnh</th>
                            <th style="text-align: center;">Sản phẩm</th>
                            <th style="text-align: center;">Số lượng</th>
                            <th style="text-align: center;">Đơn giá </th>
                            <th style="text-align: center;">Thành tiền</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody style="text-align: center; ">
                        <?php if($cart != []): ?>
                        <?php foreach ($cart as $item) : ?>
                        <tr>
                            <td>
                                <div class="cart-img">
                                    <a href="#">
                                        <img style="width: 100px;" src="<?php echo $item['image'] ?>" alt="">
                                    </a>
                                </div>
                            </td>

                            <td>
                                <a
                                    href="<?php echo BASE_CLIENT . "shop-detail.php?id=" . $item['id'] ?>"><?php echo $item['name'] ?></a>
                            </td>

                            <td>
                                <div class="cart-action">
                                    <form action="update-cart.php?id=<?php echo $item['id'] ?>" method="post">
                                        <button type="" name="reduction">-</button>
                                        <input type="text" name="quantity" readonly=""
                                            value="<?php echo $item['quantity'] ?>" class="quantity_input" />
                                        <button type="" name="increase">+</button>
                                    </form>
                                </div>
                            </td>

                            <td>
                                <?php echo number_format($item['sale'], 0, '', ','); ?> vnđ
                            </td>

                            <td>
                                <?php
                                            $itemTotal = $item['sale'] * $item['quantity'];
                                            $totalPrice += $itemTotal;
                                            echo number_format($itemTotal, 0, '', ','); ?> vnđ
                            </td>

                            <td>
                                <button>
                                    <a href="<?=BASE_CLIENT.'pages/cart-delete.php?id='.$item['id']?>"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa ?')">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </button>
                            </td>

                        </tr>
                        <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td class="text-center" colspan="10">Chưa có sản phẩm nào!</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>

                <span><b>Tổng thanh toán:</b></span>
                <span class="pay-price"><?php echo number_format($totalPrice, 0, '', ',') . '₫'; ?></span>

                <div class="shopping-button">
                    <div class="continue-shopping">
                        <a href="index.php"><button type="submit">Tiếp tục mua sắm</button></a>
                    </div>


                    <?php
                            if ($cart = 0) {
                            ?>

                    <?php

                            } elseif ($totalPrice > 0) {
                            ?>
                    <div class="shopping-cart-left">
                        <button type="submit"><a href="_share/ttkh.php">Thanh Toán</a></button>
                    </div>
                    <?php
                            }

                            ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <footer class="footer">
        <?php include_once '../layouts/footer.php'; ?>
    </footer>
    <?php require_once '../layouts/script.php'; ?>
</body>

</html>
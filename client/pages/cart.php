<?php
// session_start();
require_once '../../connect/base.php';
require_once '../../connect/db.php';

$cart = isset($_SESSION[CART]) ? $_SESSION[CART] : [];
$totalPrice = 0;
?>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Giỏ Hàng </title>
    <?php include '../layouts/css.php' ?>
    <link rel="stylesheet" href="<?= BASE . 'dist/css/client/pages/cart.css' ?>">
</head>

<body>

    <header class="header">
        <?php require_once '../layouts/header.php'; ?>
    </header>
    <div class="container">
        <div class="continue-shopping">
            <a href="<?= BASE_CLIENT . 'pages/category.php' ?>" class="btn btn-info">Tiếp tục mua
                sắm</a>
        </div>
        <div class="shopping-cart">
            <div class="table-responsive">
                <table class="table-bordered table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Hình ảnh</th>
                            <th class="text-center">Sản phẩm</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Đơn giá </th>
                            <th class="text-center">Thành tiền</th>
                            <th class="text-center">Hành động</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cart = isset($_SESSION[CART]) ? $_SESSION[CART] : [];
                        $totalPrice = 0;
                        ?>
                        <?php if ($cart != "") : ?>
                            <?php foreach ($cart as $item) : ?>
                                <tr>
                                    <td class="text-center">
                                        <a href="<?= BASE_CLIENT . "shop-detail.php?id=" . $item['id'] ?>" class="cart-img">
                                            <img width="70" src="<?=BASE.'dist/img/books/'.$item['image'] ?>" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?= BASE_CLIENT . "shop-detail.php?id=" . $item['id'] ?>"><?= $item['name'] ?></a>
                                    </td>
                                    <td class="text-center">
                                        <form action="<?=BASE_CLIENT.'pages/cart-update.php?id='.$item['id'] ?>" method="post" class="cart-action">
                                            <button type="" name="reduction">-</button>
                                            <input type="text" class="text-center" name="quantity" value="<?= $item['quantity'] ?>" class="quantity_input" />
                                            <button type="" name="increase">+</button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <?= number_format($item['sale'], 0, '', ',') . '₫'; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        $itemTotal = $item['sale'] * $item['quantity'];
                                        $totalPrice += $itemTotal; 
                                        echo number_format($itemTotal, 0, '', ',') . '₫'; ?>
                                    </td>

                                    <td class="text-center">
                                        <button>
                                            <a href="<?= BASE_CLIENT . 'pages/cart-delete.php?id=' . $item['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </button>
                                    </td>

                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <td class="text-center"><span><b>Tổng thanh toán:</b></span></td>
                                <td colspan="10"><?= number_format($totalPrice, 0, '', ',') . '₫'; ?></td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td class="text-center" colspan="10">Chưa có sản phẩm nào!</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                    <?php if ($cart = 0) { ?>
                    <?php } elseif ($totalPrice > 0) { ?>
                        <tr>
                            <td colspan="10">
                                <div class="shopping-button">
                                    <div class="shopping-cart-left">
                                        <form action="" method="post">
                                            <a href="" class="btn btn-danger">Xóa tất cả</a>
                                            <button name="update_cart" class="btn btn-warning">Sửa giỏ hàng</button>
                                        </form>
                                    </div>
                                    <div class="shopping-cart-right">
                                        <a href="" class="btn btn-success">Thanh Toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>

    <footer class="footer">
        <?php include_once '../layouts/footer.php'; ?>
    </footer>
    <?php require_once '../layouts/script.php'; ?>
</body>

</html>
<?php
session_start();
require_once '../../connect/base.php';
require_once '../../connect/db.php';
// session_destroy();
// if(isset($_POST['']))
$id = isset($_GET['id']) ? $_GET['id'] : "";

$cart = isset($_SESSION['CART']) ? $_SESSION['CART'] : null;
foreach ($cart as $key => $item) {
    if ($item['id']  == $id) {
        unset($_SESSION['CART'][$key]);
        header('location: ' . $_SERVER['HTTP_REFERER']);
        die;
    }
}


        // header('location: ' . BASE_CLIENT);

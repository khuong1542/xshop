<?php 
session_start();
require_once '../../connect/db.php';
$cart = $_SESSION['cart'];

$id = $_GET['id'];
$getBookByIdQuery = "SELECT * from books where id =$id and sale != 0";
$books = executeQuery($getBookByIdQuery, false);

$existed = -1;
foreach ($cart as $index => $item) {
	if ($item['id'] == $books['id']) {
		$existed = $index;
		break;
	}
}
if ($existed == -1) {
	$cart[] = [
		'id' => $books['id'],
		'name' => $books['name'],
		'price' => $books['price'],
		'sale' => $books['sale'],
		'image' => $books['image'],
		'quantity' => 1
	];
} else {
	$cart[$existed]['quantity']++;
}
$_SESSION['CART'] = $cart;
header('location:'.$_SERVER['HTTP_REFERER']);


 ?>
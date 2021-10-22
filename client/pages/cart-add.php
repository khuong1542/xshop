<?php 
session_start();
require_once '../../connect/db.php';
require_once '../../connect/base.php';

$id = $_GET['id'];
$sqlQuery = "select * from books where id = $id";
$books = executeQuery($sqlQuery, false);

if(!isset($_SESSION[CART]) || $_SESSION[CART] == null){
	$_SESSION[CART] = [];
	$_SESSION[CART][] = [
		'id' => $books['id'],
		'name' => $books['name'],
		'sku' => $books['sku'],
		'price' => $books['price'],
		'sale' => $books['sale'],
		'image' => $books['image'],
		'cate_id' => $books['cate_id'],
		'quantity' => 1
	];
}else{
	$cart = $_SESSION[CART];
	$existed = -1;
	foreach ($cart as $index => $item) {
		if($item['id'] == $books['id']){
			$existed = $index;
			break;
		}
	}

	if($existed == -1){
		$cart[] = [
			'id' => $books['id'],
			'name' => $books['name'],
			'sku' => $books['sku'],
			'price' => $books['price'],
			'sale' => $books['sale'],
			'image' => $books['image'],
			'cate_id' => $books['cate_id'],
			'quantity' => 1
		];
	}else{
		$cart[$existed]['quantity']++;
	}
	$_SESSION[CART] = $cart;

}

header('location: ' .  $_SERVER['HTTP_REFERER']);

 ?>
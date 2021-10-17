<?php 
session_start();
require_once '../../connect/db.php';
require_once '../../connect/base.php';

$id = $_GET['id'];
$user_id = $_POST['user_id'];
$book_id = $_POST['book_id'];
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
// var_dump($_POST);
executeQuery("INSERT INTO wishlists(user_id, book_id, created_at, updated_at) VALUES('$user_id', '$book_id', '$created_at', '$updated_at')");

header('location: ' . $_SERVER['HTTP_REFERER']);

 ?>
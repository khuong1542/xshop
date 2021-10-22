<?php
require_once '../../connect/base.php';
require_once '../../connect/db.php';
if(isset($_POST['add_wishlist_books'])){
    $book_id = $_POST['book_id'];
    $user_id = $_POST['user_id'];
    $status = "Đã thích";
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    executeQuery("INSERT INTO `wishlists`(user_id, book_id, status, created_at, updated_at) VALUES ('$user_id','$book_id','$status','$created_at','$updated_at')");
    header('location: ' . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['delete_wishlist_books'])){
    $book_id = $_POST['book_id'];
    $user_id = $_POST['user_id'];
    $status = "Đã thích";
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    executeQuery("DELETE FROM `wishlists` WHERE book_id=$book_id and user_id = $user_id");
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

?>
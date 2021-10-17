<?php 
require_once '../../connect/base.php';
require_once '../../connect/db.php';
require_once '../../connect/dao/pdo_comment.php';
if (isset($_POST['comment'])) {
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];
    $content = $_POST['content'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    // insertComment($user_id, $book_id, $content, $created_at);    
    executeQuery("INSERT INTO comments(user_id, book_id, content, created_at, updated_at) VALUES ('$user_id', '$book_id', '$content', '$created_at', '$updated_at')");
    header('location:'.BASE_CLIENT.'pages/shop-detail.php?id='.$book_id);
}
?>
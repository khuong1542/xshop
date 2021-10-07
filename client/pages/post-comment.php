<?php 
require_once '../../connect/base.php';
require_once '../../connect/db.php';
require_once '../../connect/dao/pdo_post_comment.php';
if (isset($_POST['comment'])) {
    $user_id = $_POST['user_id'];
    $post_id = $_POST['post_id'];
    $content = $_POST['content'];
    $created_at = date('Y-m-d H:i:s');
    // insertComment($user_id, $post_id, $content, $created_at);    
    executeQuery("INSERT INTO comment_posts(user_id, post_id, content, created_at) VALUES ('$user_id', '$post_id', '$content', '$created_at')");
    header('location:'.BASE_CLIENT.'pages/post-detail.php?id='.$post_id);
}
?>
<?php

function insertComment($user_id,$book_id,$content,$created_at){
    $sql = "INSERT INTO comment_posts(user_id, book_id, content, created_at) VALUES (?, ?, ?, ?)";
    pdo_execute($sql,$user_id,$book_id,$content,$created_at);
}


?>
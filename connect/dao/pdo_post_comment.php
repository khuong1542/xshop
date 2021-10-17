<?php

function select_all_comment_post(){
    $result = "SELECT * from `comment_posts`";
    return executeQuery($result);
}
function select_one_comment_post($id){
    $result = "SELECT * from `comment_posts` where id =?";
    return pdo_query_one($result, $id);
}
function insertComment($user_id,$book_id,$content,$created_at,$updated_at){
    $sql = "INSERT INTO comment_posts(user_id, book_id, content, created_at,updated_at) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql,$user_id,$book_id,$content,$created_at,$updated_at);
}


?>
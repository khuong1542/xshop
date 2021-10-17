<?php

function select_all_comment(){
    $result = "SELECT * from `comments`";
    return executeQuery($result);
}
function select_one_comment($id){
    $result = "SELECT * from `comments` where id =?";
    return pdo_query_one($result, $id);
}
function insertComment($user_id,$book_id,$content,$created_at,$updated_at){
    $sql = "INSERT INTO comments(user_id, book_id, content, created_at, updated_at) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql,$user_id,$book_id,$content,$created_at,$updated_at);
}


?>
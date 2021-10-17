<?php

function select_all_post(){
    $result = "SELECT * from `posts`";
    return executeQuery($result);
}
function select_one_post($id){
    $result = "SELECT * from `posts` where id =?";
    return pdo_query_one($result, $id);
}
function insert($title,$slug,$image,$content,$view,$status,$created_at,$updated_at){
    $sql = "INSERT INTO posts(title, slug, image, content, view, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql,$title,$slug,$image,$content,$view,$status,$created_at,$updated_at);
}
// function update($name,$slug,$avatar,$status,$updated_at){
//     $sql = "UPDATE `posts` SET `name`='?',`slug`='?',`avatar`='?',`status`='?',`updated_at`='?'";
//     pdo_execute($sql,$name,$slug,$avatar,$status,$updated_at);
// }


?>
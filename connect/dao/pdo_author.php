<?php

function select_all_author(){
    $result = "SELECT * from `authors`";
    return executeQuery($result);
}
function select_one_author($id){
    $result = "SELECT * from `authors` where id =?";
    return pdo_query_one($result, $id);
}

function insert($name,$slug,$birthday,$avatar,$status,$description,$created_at,$updated_at){
    $sql = "INSERT INTO authors(name, slug, birthday, avatar, status, description, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql,$name,$slug,$birthday,$avatar,$status,$description,$created_at,$updated_at);
}
function update_query($id,$name,$slug,$birthday,$avatar,$status,$description,$updated_at){
    $sql = "UPDATE authors SET `name`='?',`slug`='?',`birthday`='?',`avatar`='?',`status`='?',`description`='?',`updated_at`='?' where id=?";
    return pdo_execute($sql,$name,$slug,$birthday,$avatar,$status,$description,$updated_at,$id);
}
// function update($name,$slug,$avatar,$status,$updated_at){
//     $sql = "UPDATE `authors` SET `name`='?',`slug`='?',`avatar`='?',`status`='?',`updated_at`='?'";
//     return pdo_execute($sql,$name,$slug,$avatar,$status,$updated_at);
// }


?>
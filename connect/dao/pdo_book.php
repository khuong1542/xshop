<?php

function select_all_book(){
    $result = "SELECT * from `books`";
    return executeQuery($result);
}
function select_one_book($id){
    $result = "SELECT * from `books` where id =?";
    return pdo_query_one($result, $id);
}
function insert($name,$slug,$price,$percent,$sale,$image,$description,$special,$cate_id,$author_id,$status,$created_at,$updated_at){
    $sql = "INSERT INTO books(name, slug, price, percent, sale, image, description, special, cate_id, author_id, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql,$name,$slug,$price,$percent,$sale,$image,$description,$special,$cate_id,$author_id,$status,$created_at,$updated_at);
}
function update($name,$slug,$image,$status,$updated_at){
    $sql = "UPDATE `books` SET `name`='?',`slug`='?',`image`='?',`status`='?',`updated_at`='?'";
    pdo_execute($sql,$name,$slug,$image,$status,$updated_at);
}


?>
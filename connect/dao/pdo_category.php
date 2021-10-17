<?php

function select_all_category(){
    $result = "SELECT * from `categories`";
    return executeQuery($result);
}
function select_one_category($id){
    $result = "SELECT * from `categories` where id =?";
    return pdo_query_one($result, $id);
}
function insert($name,$slug,$image,$status,$created_at,$updated_at){
    $sql = "INSERT INTO categories(name, slug, image, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
    pdo_execute($sql,$name,$slug,$image,$status,$created_at,$updated_at);
}
function update($name,$slug,$image,$status,$updated_at){
    $sql = "UPDATE `categories` SET `name`='?',`slug`='?',`image`='?',`status`='?',`updated_at`='?'";
    pdo_execute($sql,$name,$slug,$image,$status,$updated_at);
}
function get_product_by_cate($id){
    $sql = "SELECT * from `categories` where id = '$id'";
    return pdo_execute($sql);
}


?>
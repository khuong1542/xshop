<?php

function show(){
    $result = "SELECT * from `categories`";
    executeQuery($result);
}

function insert($name,$slug,$image,$status,$created_at){
    $sql = "INSERT INTO categories(name, slug, image, status, created_at) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql,$name,$slug,$image,$status,$created_at);
}
function update($name,$slug,$image,$status,$updated_at){
    $sql = "UPDATE `categories` SET `name`='?',`slug`='?',`image`='?',`status`='?',`updated_at`='?'";
    pdo_execute($sql,$name,$slug,$image,$status,$created_at);
}
function get_product_by_cate($id){
    $sql = "SELECT * from `categories` where id = '$id'";
    return pdo_execute($sql);
}


?>
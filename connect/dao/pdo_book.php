<?php

function show(){
    $result = "SELECT * from `books`";
    executeQuery($result);
}

function insert($name,$slug,$price,$sale,$image,$description,$special,$cate_id,$author_id,$status,$created_at){
    $sql = "INSERT INTO books(name, slug, price, sale, image, description, special, cate_id, author_id, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql,$name,$slug,$price,$sale,$image,$description,$special,$cate_id,$author_id,$status,$created_at);
}
function update($name,$slug,$image,$status,$updated_at){
    $sql = "UPDATE `books` SET `name`='?',`slug`='?',`image`='?',`status`='?',`updated_at`='?'";
    pdo_execute($sql,$name,$slug,$image,$status,$created_at);
}


?>
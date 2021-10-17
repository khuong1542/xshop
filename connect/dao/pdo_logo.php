<?php

function select_all_logo(){
    $result = "SELECT * from `logo`";
    return executeQuery($result);
}
function select_one_logo($id){
    $result = "SELECT * from `logo` where id =?";
    return pdo_query_one($result, $id);
}
function insert($image,$status,$created_at,$updated_at){
    $sql = "INSERT INTO logo(image, status, created_at, updated_at) VALUES (?, ?, ?, ?)";
    pdo_execute($sql,$image,$status,$created_at,$updated_at);
}
function update($image,$status,$updated_at){
    $sql = "UPDATE `logo` SET `image`='?',`status`='?',`updated_at`='?'";
    pdo_execute($sql,$image,$status,$updated_at);
}
function get_product_by_cate($id){
    $sql = "SELECT * from `logo` where id = '$id'";
    return pdo_execute($sql);
}


?>
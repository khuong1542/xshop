<?php

function show(){
    $result = "SELECT * from `categories`";
    executeQuery($result);
}

function insert($name,$slug,$image,$status,$created_at){
    $sql = "INSERT INTO categories(name, slug, image, status, created_at) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql,$name,$slug,$image,$status,$created_at);
}


?>
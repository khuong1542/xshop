<?php
// require_once '../db.php';

function show(){
    
}

function insert($name,$slug,$image,$status,$created_at){
    $sql = "INSERT INTO categories(name, slug, image, status, created_at) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql,$name,$slug,$image,$status,$created_at);
}


?>
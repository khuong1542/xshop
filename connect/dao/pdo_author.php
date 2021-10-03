<?php

function show(){
    $result = "SELECT * from `authors`";
    executeQuery($result);
}

function insert($name,$slug,$birthday,$avatar,$status,$description,$created_at){
    $sql = "INSERT INTO authors(name, slug, birthday, avatar, status, description, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql,$name,$slug,$birthday,$avatar,$status,$description,$created_at);
}
function update($name,$slug,$avatar,$status,$updated_at){
    $sql = "UPDATE `authors` SET `name`='?',`slug`='?',`avatar`='?',`status`='?',`updated_at`='?'";
    pdo_execute($sql,$name,$slug,$avatar,$status,$updated_at);
}


?>
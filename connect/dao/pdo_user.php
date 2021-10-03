<?php

function show(){
    $result = "SELECT * from `users`";
    executeQuery($result);
}

function insert($name,$username,$avatar,$email,$password,$role_id,$created_at){
    $sql = "INSERT INTO users (name, username, avatar, email, password, role_id, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql,$name,$username,$avatar,$email,$password,$role_id,$created_at);
}

?>
<?php

function select_all_user(){
    $result = "SELECT * from `users`";
    return executeQuery($result);
}
function select_one_user($id){
    $result = "SELECT * from `users` where id =?";
    return pdo_query_one($result, $id);
}

function insert($name,$username,$avatar,$email,$password,$role_id,$created_at,$updated_at){
    $sql = "INSERT INTO users (name, username, avatar, email, password, role_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql,$name,$username,$avatar,$email,$password,$role_id,$created_at,$updated_at);
}

?>
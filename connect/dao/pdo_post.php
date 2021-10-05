<?php

function insert($title,$slug,$image,$content,$status,$created_at){
    $sql = "INSERT INTO posts(title, slug, image, content, status, created_at) VALUES (?, ?, ?, ?, ?, ?)";
    pdo_execute($sql,$title,$slug,$image,$content,$status,$created_at);
}
// function update($name,$slug,$avatar,$status,$updated_at){
//     $sql = "UPDATE `posts` SET `name`='?',`slug`='?',`avatar`='?',`status`='?',`updated_at`='?'";
//     pdo_execute($sql,$name,$slug,$avatar,$status,$updated_at);
// }


?>
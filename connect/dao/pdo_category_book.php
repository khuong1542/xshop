<?php

function insertCateBook($book_id,$category_id){
    $sql = "INSERT INTO category_book(book_id, category_id) VALUES (?, ?)";
    pdo_execute($sql,$book_id,$category_id);
}

?>
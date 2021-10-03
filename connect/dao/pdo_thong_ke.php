<?php

function thong_ke_san_pham(){
    $sql = "SELECT categories.id, categories.name, COUNT(*) so_luong, MIN(books.)";
    return pdo_execute($sql);
}


?>
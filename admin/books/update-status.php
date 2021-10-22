<?php 

require_once '../../connect/db.php';
if (isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $cate_id = $_POST['cate_id'];
    // var_dump($cate_id);
    $updateStatus_book = "UPDATE `books` SET `status`=$status WHERE id = $id";
    $updateStatus_cate = "UPDATE `categories` SET `status`=$status WHERE id = $cate_id";
    $result = executeQuery($updateStatus_book);
    $result = executeQuery($updateStatus_cate);
}
if (isset($_POST['special'])) {
    $id = $_POST['id'];
    $special = $_POST['special'];
    $updateSpecial = "UPDATE `books` SET `special`=$special WHERE id = $id"; 
    $result = executeQuery($updateSpecial);
}
?>
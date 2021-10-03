<?php 

require_once '../../connect/db.php';
if (isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $updateStatus = "UPDATE `books` SET `status`=$status WHERE id = $id"; 
    $result = executeQuery($updateStatus);
}
if (isset($_POST['special'])) {
    $id = $_POST['id'];
    $special = $_POST['special'];
    $updateSpecial = "UPDATE `books` SET `special`=$special WHERE id = $id"; 
    $result = executeQuery($updateSpecial);
}
?>
<?php 

require_once '../../connect/db.php';
if (isset($_POST['status'])) {
    
$id = $_POST['id'];
$status = $_POST['status'];
$update_cate = "UPDATE `categories` SET `status`=$status WHERE id = $id"; 
$update_book = "UPDATE `books` SET `status`=$status WHERE cate_id = $id"; 
$result = executeQuery($update_book);
$result = executeQuery($update_cate);
if ($result) {
    return 'data updated';
}


}
?>

<?php 

require_once '../../connect/db.php';
if (isset($_POST['status'])) {
    
$id = $_POST['id'];
$status = $_POST['status'];
$update = "UPDATE `logo` SET `status`=$status WHERE id = $id"; 
$result = executeQuery($update);
if ($result) {
    return 'data updated';
}


}
?>

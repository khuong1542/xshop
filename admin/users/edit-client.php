<?php 
require_once '../../connect/base.php'; 
require_once '../../connect/db.php';

$id = $_GET['id'];
$getListUserQuery = "UPDATE `users` SET `role_id`= 1 WHERE id=$id and role_id = 0";
$users = executeQuery($getListUserQuery);
header('location:'.$_SERVER['HTTP_REFERER']);

?>
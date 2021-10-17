<?php 
require_once '../../connect/base.php'; 
require_once '../../connect/db.php'; 
$getListUserQuery = "UPDATE `users` SET `role_id`= 0 WHERE role_id = 1";
$users = executeQuery($getListUserQuery);
header('location:'.$_SERVER['HTTP_REFERER']);

?>
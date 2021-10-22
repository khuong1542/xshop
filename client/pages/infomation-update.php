<?php
require_once '../../connect/base.php';
require_once '../../connect/db.php';
$id = $_GET['id'];
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    $avatar = $_FILES['avatar'];
    $name_image = "";
    $updateProfile = "UPDATE `users` SET `name`='$name',`username`='$username',
                                        `birthday`='$birthday',`gender`='$gender',
                                        `address`='$address',`phone`='$phone',
                                        `created_at`='$created_at',`updated_at`='$updated_at'";
    if($avatar['size'] > 0){
        $name_image = uniqid() . '-' . str_replace(' ', '-', trim($avatar['name']));
        move_uploaded_file($avatar['tmp_name'],'../../dist/img/users/' . $name_image);
        $filename = $name_image;
        $updateProfile .= ", avatar = '$filename'";
    }
    $updateProfile .= 'where id = ' . $id;
    executeQuery($updateProfile);
    header('location:'.$_SERVER['HTTP_REFERER']);
}
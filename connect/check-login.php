<?php 
  	session_start();
    require_once 'base.php';
    require_once 'db.php';
    $user_login = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
    $id_user = $user_login['id'];
    $sqlUserQuery = "select * from users where id = '$id_user'";
    $user = executeQuery($sqlUserQuery, true);
     if ($user == '' | $user['role_id'] != '1') {
         header('location: ' . BASE_CLIENT . '');
            die;
     }

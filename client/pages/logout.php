<?php
session_start();
// require_once 'aside/connect.php';
unset($_SESSION['auth']);
// header('refresh:3;url=../index.php');
header('location: ../index.php');


?>

<?php
    sleep(2);
?>
<?php 

function checkCount($table){
    global $connect;
    // $connect = mysqli_connect('localhost','root','','duanmau');
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($connect,$sql);
    $count = $result -> num_rows;
    return $count;
}
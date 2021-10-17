<?php
require_once '../../connect/base.php';
require_once '../../connect/db.php';
// require_once 'include/check_login.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$select = "SELECT * from books where id = $id";
	$book = executeQuery($select,false);
	// var_dump($book['image']);
	$link_hinh= '../../dist/img/books/'.$book['image'];

	if(is_file($link_hinh)) 
    {
        unlink($link_hinh);
    }
	$delete = "DELETE FROM books WHERE id = $id";
	$conn = getConnect();
    $stmt = $conn->prepare($delete);
    $stmt->execute();

	header('location:'.BASE_ADMIN.'books/list.php');
}
?>
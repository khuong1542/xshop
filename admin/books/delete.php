<?php
require_once '../../connect/base.php';
require_once '../../connect/db.php';
// require_once 'include/check_login.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$select = "SELECT * from authors where id = $id";
	$query = mysqli_query($connect,$select);
	$row = mysqli_fetch_array($query);
	$link_hinh= '../../dist/img/authors/'.$row['image'];
	if(is_file($link_hinh)) 
    {
        unlink($link_hinh);
    }
	$delete = "DELETE FROM authors WHERE id = $id";
	$conn = getConnect();
    $stmt = $conn->prepare($delete);
    $stmt->execute();

	header('location:'.BASE_ADMIN.'authors/list.php');
}
?>
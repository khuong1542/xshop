

<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
$connect = mysqli_connect('localhost', 'root', '', 'duanmau');

function getConnect()
{
	$host = "localhost";
	$dbname = "duanmau";
	$dbusername = "root";
	$dbpwd = "";
	try {
		$connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpwd);
	} catch (Exception $ex) {
		var_dump($ex->getMessage());
		die;
	}
	return $connect;
}
function executeQuery($exeSql, $fetchAll = true)
{
	$connect = getConnect();
	$stmt = $connect->prepare($exeSql);
	$stmt->execute();

	if ($fetchAll) {
		return $stmt->fetchAll();
	}

	return $stmt->fetch();
}
function pdo_execute($sql)
{
	$args = array_slice(func_get_args(), 1);
	try {
		$connect = getConnect();
		$stmt = $connect->prepare($sql);
		$stmt->execute($args);
	} catch (PDOException $e) {
		var_dump($e->getMessage());
		die;
	}
}
function pdo_query_one($sql)
{
	$sql_args = array_slice(func_get_args(), 1);
	try {
		$conn = getConnect();
		$stmt = $conn->prepare($sql);
		$stmt->execute($sql_args);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	} catch (PDOException $e) {
		throw $e;
	} finally {
		unset($conn);
	}
}


























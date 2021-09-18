<?php 

function getConnect(){
	$host = "localhost";
	$dbname = "duanmau";
	$dbusername = "root";
	$dbpwd = "";
	try{
		$connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpwd);
	}catch(Exception $ex){
		var_dump($ex->getMessage());
		die;
	}
	return $connect;
}

function executeQuery($sqlQuery, $getAll = false){
	$conn = getConnect();
	$stmt = $conn->prepare($sqlQuery);
	$stmt->execute();
	$result = $stmt->fetchAll();
	if(!$result){
		return null;
	}
	if($getAll){
		return $result;
	}
	return $result[0];
}

 ?>
<?php 
	session_start();
	require_once '../../connect/db.php';
	require_once '../../connect/base.php';

	$id = isset($_GET['id']) ? $_GET['id'] : "";
	$url = $_SERVER['HTTP_REFERER'];
	

	if (isset($_POST['increase'])) {
		extract($_REQUEST);
		if ($quantity > 0 && $quantity != '' && is_numeric($quantity)) {
			if(isset($_SESSION[CART])){
		        $cart = $_SESSION[CART];
		        foreach ($cart as $key => $item) {
		        	if ($item['id']  == $id) {
		        		$quantity ++;
		            	$item['quantity'] = $quantity;
		            	$_SESSION[CART][$key] = $item;
		         		header('location: ' . $url);
   						die;	
		            }
		        }
		    }
		}else{
			header('location: ' . $url);
    		die;
		}
	}
	if (isset($_POST['reduction'])) {
		extract($_REQUEST);
		if ($quantity > 1 && $quantity != '' && is_numeric($quantity)) {
			if(isset($_SESSION[CART])){
		        $cart = $_SESSION[CART];
		        foreach ($cart as $key => $item) {
		        	if ($item['id']  == $id) {
		        		$quantity --;
		            	$item['quantity'] = $quantity;
		            	$_SESSION[CART][$key] = $item;
		         		header('location: ' . $url);
   						die;	
		            }
		        }
		    }
		}else{
			header('location: ' . $url);
    		die;
		}
	}



	
?>
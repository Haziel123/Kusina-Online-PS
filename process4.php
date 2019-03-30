<?php


	$mysqli = new mysqli('localhost', 'root', '', 'kusina online') or die(mysqli($mysqli));
	
	$order_id= 0;
	$update = false;
	$order_id= '';
	$menu_id = '';
	$price = '';
	$quantity = '';
	{
	
	}
	
	if (isset($_POST['add'])) {
		$order_id = $_POST['order_id'];
		$menu_id = $_POST['menu_id'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		
		
		$mysqli->query("INSERT INTO order_item (order_id, menu_id, price, quantity) VALUES('$order_id', '$menu_id', '$price', '$quantity')") or die($mysqli->error);
		header("location: orders.php");
	}
		if (isset($_GET['delete'])) {
		$order_id = $_GET['delete'];
		$mysqli->query("DELETE FROM order_item WHERE order_id=$order_id") or die($mysqli->error());
		header("location: orders.php");
	}
	if (isset($_GET['edit'])) {
		$order_id = $_GET['edit'];
		$update = true;
		$result = $mysqli->query("SELECT * FROM order_item WHERE order_id=$order_id") or die($mysqli->error());
		if (@count($result)==1) {
			$row = $result->fetch_array();
			$order_id = $row['order_id'];
			$menu_id = $row['menu_id'];
			$price = $row['price'];
			$quantity = $row['quantity'];
			
		}
	}
	if (isset($_POST['update'])) {
		$order_id = $_POST['order_id'];
		$menu_id = $_POST['menu_id'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		
		
		$mysqli->query("UPDATE order_item SET order_id='$order_id', menu_id='$menu_id', price='$price', quantity='$quantity' WHERE order_id=$order_id") or die($mysqli->error);
		header("location: orders.php");
	}
?>
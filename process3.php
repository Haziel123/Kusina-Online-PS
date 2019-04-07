<?php


	$mysqli = new mysqli('localhost', 'root', '', 'kusina online') or die(mysqli($mysqli));
	
	$order_id= 0;
	$update = false;
	$order_id= '';
	$customer_id = '';
	$timestamp= '';
	{
	
	}
	
	if (isset($_POST['add'])) {
		$order_id = $_POST['order_id'];
		$customer_id = $_POST['customer_id'];
		$timestamp = $_POST['timestamp'];
		
		
		
		$mysqli->query("INSERT INTO customer_order (order_id, customer_id, timestamp) VALUES('$order_id', '$customer_id', '$timestamp')") or die($mysqli->error);
		header("location: order.php");
	}
		if (isset($_GET['delete'])) {
		$menu_id = $_GET['delete'];
		$mysqli->query("DELETE FROM customer_order WHERE order_id=$order_id") or die($mysqli->error());
		header("location: order.php");
	}
	if (isset($_GET['edit'])) {
		$menu_id = $_GET['edit'];
		$update = true;
		$result = $mysqli->query("SELECT * FROM customer_order WHERE order_id=$order_id") or die($mysqli->error());
		if (@count($result)==1) {
			$row = $result->fetch_array();
			$order_id = $row['order_id'];
			$customer_id = $row['customer_id'];
			$timestamp = $row['timestamp'];
				
		}
	}
	if (isset($_POST['update'])) {
		$order_id = $_POST['order_id'];
		$customer_id = $_POST['customer_id'];
		$timestamp = $_POST['timestamp'];
		
		
		
		$mysqli->query("UPDATE customer_order SET order_id='$order_id', customer_id='$customer_id', timestamp='$timestamp' WHERE order_id=$order_id") or die($mysqli->error);
		header("location: order.php");
	}
?>
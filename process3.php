<?php


$mysqli = new mysqli('localhost', 'root', '', 'kusina online') or die(mysqli($mysqli));
	
	$order_id = 0;
	$update = false;
	$order_id = '';
	$customer_id = '';
	$timestamp = '';
	$menu_id = '';
	$price = '';
	$quantity = '';
	
	
//customer oder
	if (isset($_POST['submit'])) {
		$order_id = $_POST['order_id'];
		$customer_id = $_POST['customer_id'];
		$timestamp = $_POST['timestamp'];
		
		$mysqli->query("INSERT INTO customer_order(order_id, customer_id, timestamp) VALUES('$order_id', '$customer_id', '$timestamp')") or die($mysqli->error);
		header("location: order.php");
	}
	if (isset($_GET['delete'])) {
		$order_id = $_GET['delete'];
		$mysqli->query("DELETE FROM customer_order WHERE order_id=$order_id") or die($mysqli->error());
		header("location: order.php");
	}
	
	if (isset($_GET['edit_customerorder'])) {
		$order_id = $_GET['edit_customerorder'];
		$update = true;
		$sql = "SELECT * FROM customer_order WHERE order_id='".$order_id."'";
		$result = $mysqli->query($sql) or die($mysqli->error());
		if (@count($result)==1) {
			$row = $result->fetch_array();
			$order_id = $row['order_id'];
			$customer_id = $row['customer_id'];
			$timestamp = $row['timestamp'];
			
		}
	}
	if (isset($_POST['update_order'])) {
		$order_id = $_POST['order_id'];
		$customer_id = $_POST['customer_id'];
		$timestamp = $_POST['timestamp'];
		$mysqli->query("UPDATE customer_order SET order_id='$order_id', customer_id='$customer_id', timestamp='$timestamp' WHERE order_id=$order_id") or die($mysqli->error);
		header("location: order.php");
	}
	
	
//order items
	if (isset($_POST['add'])) {
		$order_id = $_POST['order_id'];
		$menu_id = $_POST['menu_id'];
		$price = $_POST['price'];
		$quantity= $_POST['quantity'];
		
		$mysqli->query("INSERT INTO order_item(order_id, menu_id, price, quantity) VALUES('$order_id', '$menu_id', '$price', '$quantity')") or die($mysqli->error);
		header("location: order.php");
	}
	

	
	
	?>
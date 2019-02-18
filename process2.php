<?php


	$mysqli = new mysqli('localhost', 'root', '', 'kusina online') or die(mysqli($mysqli));
	
	$menu_id= 0;
	$update = false;
	$menu_id= '';
	$menu_name = '';
	$description= '';
	$price = '';
	$unit = '';
	{
	
	}
	
	if (isset($_POST['add'])) {
		$menu_id = $_POST['menu_id'];
		$menu_name = $_POST['menu_name'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$unit = $_POST['unit'];
		
		
		$mysqli->query("INSERT INTO menu (menu_id, menu_name, description, price, unit) VALUES('$menu_id', '$menu_name', '$description', '$price', '$unit')") or die($mysqli->error);
		header("location: menu.php");
	}
		if (isset($_GET['delete'])) {
		$menu_id = $_GET['delete'];
		$mysqli->query("DELETE FROM menu WHERE menu_id=$menu_id") or die($mysqli->error());
		header("location: menu.php");
	}
	if (isset($_GET['edit'])) {
		$menu_id = $_GET['edit'];
		$update = true;
		$result = $mysqli->query("SELECT * FROM menu WHERE menu_id=$menu_id") or die($mysqli->error());
		if (@count($result)==1) {
			$row = $result->fetch_array();
			$menu_id = $row['menu_id'];
			$menu_name = $row['menu_name'];
			$description = $row['description'];
			$price = $row['price'];
			$unit = $row['unit'];
			
		}
	}
	if (isset($_POST['update'])) {
		$menu_id = $_POST['menu_id'];
		$menu_name = $_POST['menu_name'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$unit = $_POST['unit'];
		
		
		$mysqli->query("UPDATE menu SET menu_id='$menu_id', menu_name='$menu_name', description='$description', price='$price', unit='$unit' WHERE menu_id=$menu_id") or die($mysqli->error);
		header("location: menu.php");
	}
?>
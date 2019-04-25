<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kusina Online</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/jss/bootstrap.js">
	<script src="bootstrap-4.0.0-beta.3-dist/jquery/jquery.min.js"></script>
	<script src="bootstrap-4.0.0-beta.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container text-center">
	<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$Firstname = $_POST['Firstname'];
	$Lastname = $_POST['Lastname'];
	$Email = $_POST['Email'];
	$User = $_POST['Username'];
	$Pass = $_POST['Password'];
	
	$db = mysqli_connect('localhost','root','','kusina');

	if($User == "" || $Pass == "" || $Firstname == "" || $Lastname == "" || $Email == "") {
		echo "<br/>";
	} else {
		mysqli_query($db, "INSERT INTO register(Firstname, Lastname, Email, Username, Password) VALUES('$Firstname', '$Lastname', '$Email', '$User', md5('$Pass'))")
			or die("Could not execute the insert query.");
			
		header('location: login.php');
	}
} else {
?>
<center>
	<main class="bd-masthead" id="content" role="main">
  		<div class="container">
    	<div class="col-md-8 order-md-2 text-center text-md-left pr-md-2">
		<form name="form1" method="post" action=""><br/>
		<div class="container">
			<h2><font color="white" face="arial black">SIGNUP FOR FREE</h2></font>
	</div><br/>
		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="validationServer01"><font color="white">Firstname:</label></font>
				<input type="text" name="Firstname" class="form-control is-valid" id="validationServer01"  required>
			</div>&nbsp;
		<div class="col-md-6 mb-3">
			<label for="validationServer01"><font color="white">Lastname:</label></font>
				<input type="text" name="Lastname" class="form-control is-valid" id="validationServer01"  required>
			</div>
		</div>
		<div class="row">
		<div class="col-md-6 mb-3">
			<label for="validationServer01"><font color="white">Email:</label></font>
				<input type="email" name="Email" class="form-control is-valid" id="validationServer01"  required>
			</div>
		</div>
		<div class="row">
		<div class="col-md-6 mb-3">
			<label for="validationServer01"><font color="white">Username:</label></font>
				<input type="text" name="Username" class="form-control is-valid" id="validationServer01"  required>
			</div>
		</div>
		<div class="row">
		<div class="col-md-6 mb-3">
			<label for="validationServer01"><font color="white">Password:</label></font>
				<input type="password" name="Password" class="form-control is-valid" id="validationServer01"  required>
			</div>
		</div>
			<button class="btn btn-outline-success" type="submit" name="submit" value="Submit">Register</button><br/><br/>
			<p><font color="white">Already have an account ? &nbsp; <a class="btn btn-sm btn-outline-info" href="login.php" role="button">Login</a></p></font>
			</form>
		</div>
  </div>
<?php
}
?>
</div><br/><br/>
</body>
</html>

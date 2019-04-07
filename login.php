<?php
include('register.php'); 
if(isset($_SESSION['login_user'])){
header("location: home.php"); 
}
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Kusina Online</title>
		<link rel="stylesheet" href="log.css">
		
</head>
<body>
    <div class="loginbox">
    <img src="images/kusina.jpg" class="avatar">
        <h1>Admin</h1>
        <form action="home.php" method="POST">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" onclick="check(this.form)" value="Login">
        </form>
		<script src="js.js">
		</script>   
</div>
</body>
</html>
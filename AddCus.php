<!DOCTYPE html>
<html>
<head>
	<title>Kusina Online</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/jss/bootstrap.js">
		<script src="bootstrap-4.0.0-beta.3-dist/jquery/jquery.min.js"></script>
		<script src="bootstrap-4.0.0-beta.3-dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body><br/>

<div class="container">
		<form action="order.php" method="POST">
	<div class="container">
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="home.php">Back</a></li>
		<li class="breadcrumb-item"><a href="orders.php">Orders View</a></li>
	</ol>
	</nav>
 </form>
<br>
	<div class="container">
	 <tr>
	 
			<?php require_once 'process3.php'; ?>
			<form method="post" action="process3.php">
					<input type="Hidden" name="order_id" value="<?php echo $order_id; ?>">
					</br>
					<h2><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; C U S T O M E R &nbsp;&nbsp;O R D E R &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></h2><br/><br/>
					<div class="form-group row">
			            <label for="colFormLabel" class="col-sm-2 col-form-label"><b>Order ID:</b></label>
				        <div class="col-sm-5">
					<input type="text" name="order_id" class="form-control" id="colFormLabel" placeholder="order id" value="<?php echo $order_id; ?>" required>
				        </div>
		           </div>
					<div class="form-group row">
			            <label for="colFormLabel" class="col-sm-2 col-form-label"><b>Customer ID:</b></label>
				        <div class="col-sm-5">
							<select name="customer_id" class="form-control" required>
								<option value="customer_id">customer id</option>
								<option value="customer_id"></option>
									<?php
										$con = new mysqli("localhost", "root", "", "kusina online");
										$sql = "SELECT * FROM customer";
										$query = mysqli_query($con,$sql);
									?>
									<?php while($row = mysqli_fetch_array($query)):?>
									<option value="<?php echo $row['customer_id'];?>"><?php echo $row['first_name'];?></option>
									<?php endwhile;?>
							</select>
				        </div>
					</div>
				   
					<div class="form-group row">
			            <label for="colFormLabel" class="col-sm-2 col-form-label"><b>Timestamp:</b></label>
				        <div class="col-sm-5">
					<input type="datetime-local" class="form-control" name="timestamp" placeholder="timestamp" value="<?php echo $timestamp; ?>" required >	
				        </div>
					</div>	
					</tr>
					<br>
					<br>
			<?php 
				if ($update == true):
			?>
				<input class="btn btn-info" type="submit" name="update_order" value="update" >
			<?php else: ?>
				<input class="btn btn-info" type="submit" name="submit" value="save" >
			<?php endif ;?>
			</form>
			</center>
	</div>
</body>
</html>

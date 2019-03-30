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
			<?php require_once 'process4.php'; ?>
			<form method="post" action="process4.php">
					<input type="Hidden" name="order_id" value="<?php echo $order_id; ?>">
					</br>
					<h2><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O R D E R&nbsp;&nbsp; I T E M&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></h2><br/><br/>
					<div class="form-group row">
			             <label for="colFormLabel" class="col-sm-2 col-form-label"><b>Order ID:</b></label>
				            <div class="col-sm-5">
							<select name="order_id" class="form-control" required>
								<option value="order_id">order id</option>
								<option value="order_id"></option>
									<?php
										$con = new mysqli("localhost", "root", "", "kusina online");
										$sql = "SELECT * FROM customer_order";
										$query = mysqli_query($con,$sql);
									?>
									<?php while($row = mysqli_fetch_array($query)):?>
									<option value="<?php echo $row['order_id'];?>"><?php echo $row['order_id'];?></option>
									<?php endwhile;?>
							</select>
				            </div>
		           </div>
					
					
					<div class="form-group row">
			             <label for="colFormLabel" class="col-sm-2 col-form-label"><b>Menu ID:</b></label>
				            <div class="col-sm-5">
							<select name="menu_id" class="form-control" required>
								<option value="menu_id">menu id</option>
								<option value="menu_id"></option>
									<?php
										$con = new mysqli("localhost", "root", "", "kusina online");
										$sql = "SELECT * FROM menu";
										$query = mysqli_query($con,$sql);
									?>
									<?php while($row = mysqli_fetch_array($query)):?>
									<option value="<?php echo $row['menu_id'];?>"><?php echo $row['menu_name'];?></option>
									<?php endwhile;?>
							</select>
				            </div>
		           </div>
				   
				   
				   <div class="form-group row">
			            <label for="colFormLabel" class="col-sm-2 col-form-label"><b>Price:</b></label>
				          <div class="col-sm-5">
					<input type="text" class="form-control" name="price" placeholder="price" value="<?php echo $price; ?>" required >	
				          </div>
		           </div>
				   <div class="form-group row">
			            <label for="colFormLabel" class="col-sm-2 col-form-label"><b>Quantity:</b></label>
				          <div class="col-sm-5">
					<input type="text" class="form-control" name="quantity" placeholder="quantity" value="<?php echo $quantity; ?>" required >	
				          </div>
		           </div>
				
				   
						
				</tr>
				<br>
				<br>
					<?php 
						if ($update == true):
					?>
						<input class="btn btn-info" type="submit" name="update" value="update" >
					<?php else: ?>
						<input class="btn btn-info" type="submit" name="add" value="save" >
					<?php endif ;?>
			
			</form>
			</center>
	</div>
</body>
</html>

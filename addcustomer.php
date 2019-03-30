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
		<li class="breadcrumb-item"><a href="customer.php">Customers View</a></li>
	</ol>
	</nav>
 </form>
<br>
	
	<div class="container">
	 <tr>
	
			
				<?php require_once 'process.php'; ?>	
					<form action="process.php" method="POST">
						<h2><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C U S T O M E R </strong></h2><br/>
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Customer ID:</b></label>
							<div class="col-sm-5">
						<input type="text" name="customer_id" class="form-control" id="colFormLabel" placeholder="customer id" value="<?php echo $customer_id; ?>" required>
						</div> 				
						</div>
						
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>First Name:</b></label>
							<div class="col-sm-5">
						<input type="text" name="first_name" class="form-control" placeholder="first name" value="<?php echo $first_name; ?>" required>
						</div> 	
						</div>
						
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Last Name:</b></label>
							<div class="col-sm-5">
						<input type="text" name="last_name" class="form-control" placeholder="last name" value="<?php echo $first_name; ?>" required >
						</div>  
						</div>
						
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>M.I:</b></label>	
							<div class="col-sm-5">
						<input type="text" name="middle_initial" class="form-control" placeholder="m.i" value="<?php echo $first_name; ?>" required>
						</div>
						</div>
					
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Phone Number:</b></label>
							<div class="col-sm-5">
							<input type="number" name="phone_number" class="form-control" placeholder="phone number" value="<?php echo $phone_number; ?>" required>
						</div>
						</div>
					
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Province:</b></label>
							<div class="col-sm-5">
							<input type="text" name="province" class="form-control" placeholder="province" value="<?php echo $province; ?>" required>
						</div>	
						</div>
						
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Street:</b></label>
							<div class="col-sm-5">
							<input type="text" name="street" class="form-control" placeholder="street" value="<?php echo $street; ?>" required>
						</div>	
						</div>
						
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Barangay:</b></label>
							<div class="col-sm-5">
							<input type="text" name="barangay" class="form-control" placeholder="barangay" value="<?php echo $barangay; ?>" required>
						</div>	
						</div>
						
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>City:</b></label>
							<div class="col-sm-5">
							<input type="text" name="city" class="form-control" placeholder="city" value="<?php echo $city; ?>" required><br>
						</div>	
						</div>
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

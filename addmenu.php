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

					<h2><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; M E N U </strong></h2><br/>
			
				<?php require_once 'process2.php'; ?>	
					<form action="process2.php" style="width:700px " method="POST">
						<input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>">
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Menu ID:</b></label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="menu_id" placeholder="menu id" value="<?php echo $menu_id; ?>" required>
						</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Menu Name:</b></label>
							<div class="col-sm-5">
						<input type="text"  class="form-control" name="menu_name" placeholder="menu_name" value="<?php echo $menu_name; ?>" required>
						</div> 				
						</div>
						
						
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Price:</b></label>
							<div class="col-sm-5">
						<input type="text" class="form-control" name="price" placeholder="price" value="<?php echo $price; ?>" required >
						</div>  
						</div>
						
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Description:</b></label>
							<div class="col-sm-5">
						<input type="text"  class="form-control" name="description" placeholder="description" value="<?php echo $description; ?>" required>
						</div> 	
						</div>
						
						<div class="form-group row">
							<label for="colFormLabel" class="col-sm-2 col-form-label"><b>Unit:</b></label>	
							<div class="col-sm-5">
						<select name="unit" class="form-control" name="unit" placeholder="unit" value="<?php echo $unit; ?>" required>
							<option value="kilogram">unit</option>
							<option value="kilogram"></option>
							<option value="kilogram">kilogram</option>
							<option value="second">second</option>
							<option value="meter">meter</option>
						</select>
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

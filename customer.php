<?php
	if(isset($_POST['btn_search']))
	{
    $search = $_POST['search'];
		
		$query = "SELECT * FROM `customer` WHERE CONCAT(`customer_id`, `first_name`, 'last_name', 'middle_initial', 'phone_number', 'province', 'street',  'barangay', 'city') LIKE '%".$search."%'";
		$search_result = filterTable($query);
    
	}
	else {
		$query = "SELECT * FROM `customer`";
		$search_result = filterTable($query);
	}

	
	function filterTable($query)
	{
		$connect = mysqli_connect("localhost", "root", "", "kusina online");
		$filter_Result = mysqli_query($connect, $query);
		return $filter_Result;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Kusina Online</title>
			<link rel="stylesheet" href="style.css">
			<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
			<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/jss/bootstrap.js">
			<script src="bootstrap-4.0.0-beta.3-dist/jquery/jquery.min.js"></script>
			<script src="bootstrap-4.0.0-beta.3-dist/js/bootstrap.bundle.min.js"></script>
			
	</head>
<body><br/>
	<form action="customer.php" method="POST">
	<div class="container">
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="home.php">Back</a></li>
		<li class="breadcrumb-item active" aria-current="page">Customer list</li>
	</ol>
</nav><br/>
	<div class="container">
		<div class="col-sm-12">
		<div class="table-responsive">
		<table class="table table-hover table-light">
		<thead>
		<tr>
			<th>Customer ID</th>
			<th>Name</th>
			<th>M.I.</th>
			<th>Phone Number</th>
			<th>Province</th>
			<th>Street</th>
			<th>Barangay</th>
			<th>City</th>
			<th>Action</th>
		</tr>
		</thead>
			
				<?php while($row = mysqli_fetch_array($search_result)):?>
			<tbody>
			<tr>
				<td><?php echo $row['customer_id'];?></td>
				<td><?php echo $row['first_name'];?>  <?php echo $row['last_name'];?></td>
				<td><?php echo $row['middle_initial'];?></td>
				<td><?php echo $row['phone_number'];?></td>
				<td><?php echo $row['province'];?></td>
				<td><?php echo $row['street'];?></td>
				<td><?php echo $row['barangay'];?></td>
				<td><?php echo $row['city'];?></td>
			<td>
			<div class="btn-group">
			<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option
			</button>
			<div class="dropdown-menu">
			<a  data-toggle="modal" data-target="#exampleModalCenter1" class="dropdown-item">Add</a>
			<a class="dropdown-item" href="customer.php?edit=<?php echo $row['customer_id']; ?>">Edit</a>
			<a class="dropdown-item" href="process.php?delete=<?php echo $row["customer_id"]; ?>" onclick="return confirm('Are you sure?');">Delete</a>
			</div>
			</div>
			</td>
			</tr>
			</tbody>
			<?php endwhile;?>
			</table>
				<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="form-control">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" >Add Customer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			   </div>
			  <div class="modal-body">
			<?php require_once 'process.php'; ?>
			<form action="process.php" method="post">
			 <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
			  <label class="col-form-label">Customer ID:</label>
			   <input type="text" class="form-control form-control-sm" name="customer_id" placeholder="" required>
			    <label class="col-form-label">First Name:</label>
				 <input type="text" class="form-control form-control-sm" name="first_name" placeholder="" required>
				  <label class="col-form-label">Last Name:</label>
				   <input type="text" class="form-control form-control-sm" name="last_name" placeholder="" required>
					<label class="col-form-label">Middle Initial:</label>
					 <input type="text" class="form-control form-control-sm" name="middle_initial" placeholder="" required>
					  <label class="col-form-label">Phone Number:</label>
					   <input type="number" class="form-control form-control-sm" name="phone_number" placeholder="" required>
						<label class="col-form-label">Province:</label>
						 <input type="text" class="form-control form-control-sm" name="province" placeholder="" required>
						  <label class="col-form-label">Street:</label>
						   <input type="text" class="form-control form-control-sm" name="street" placeholder="" required>
						    <label class="col-form-label">Barangay:</label>
						     <input type="text" class="form-control form-control-sm" name="barangay" placeholder="" required>
						      <label class="col-form-label">City:</label>
						       <input type="text" class="form-control form-control-sm" name="city" placeholder="" required><br/>
						        <input class="btn btn-danger btn-block button2" type="submit" name="add" value="Save" onclick="return confirm('Are you sure?');">
							   </form>
						     </div>
						    <div class="modal-footer">
						   <button type="button" class="btn btn-primary btn-block button2" data-dismiss="modal">Close</button>
						  </div>
					    </div>
				      </div>
			        </div>
				  </div>
				</div>
				<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="form-control">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" >Update</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			   </div>
			  <div class="modal-body">
			<?php require_once 'process.php'; ?>
			<form action="process.php" method="post">
			 <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
			  <label class="col-form-label">First Name:</label>
			   <input type="text" class="form-control form-control-sm" name="first_name" placeholder="" value="<?php echo $first_name; ?>" required>
			    <label class="col-form-label">Last Name:</label>
			     <input type="text" class="form-control form-control-sm" name="last_name" placeholder="" value="<?php echo $last_name; ?>" required>
			      <label class="col-form-label">Middle Initial:</label>
			       <input type="text" class="form-control form-control-sm" name="middle_initial" placeholder="" value="<?php echo $middle_initial; ?>" required>
			     	<label class="col-form-label">Phone Number:</label>
				     <input type="number" class="form-control form-control-sm" name="phone_number" placeholder="" value="<?php echo $phone_number; ?>" required>
				      <label class="col-form-label">Province:</label>
				       <input type="text" class="form-control form-control-sm" name="province" placeholder="" value="<?php echo $province; ?>" required>
				        <label class="col-form-label">Street:</label>
				         <input type="text" class="form-control form-control-sm" name="street" placeholder="" value="<?php echo $street; ?>" required>
				          <label class="col-form-label">Barangay:</label>
				           <input type="text" class="form-control form-control-sm" name="barangay" placeholder="" value="<?php echo $barangay; ?>" required>
				            <label class="col-form-label">City:</label>
				            <input type="text" class="form-control form-control-sm" name="city" placeholder="" value="<?php echo $city; ?>" required><br/>
				            <?php
								if ($update == true):
								echo "<script>$('#exampleModalCenter2').modal('show');</script>";
							?>
								<input class="btn btn-danger btn-block button2" type="submit" name="update" value="Update" onclick="return confirm('Are you sure?');">
							<?php else: ?>
								<input class="btn btn-danger btn-block button2" type="submit" name="submit" value="Save" onclick="return confirm('Are you sure?');">
							<?php endif; ?>
						  </form>
						</div>
					 <div class="modal-footer">
					 <button type="button" class="btn btn-primary btn-block button2" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
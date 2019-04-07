<?php
	if(isset($_POST['btn_search']))
	{
    $search = $_POST['search'];
		
		$query = "SELECT * FROM `customer_order` WHERE CONCAT(`order_id`, `customer_id`, 'timestamp') LIKE '%".$search."%'";
		$search_result = filterTable($query);
    
	}
	else {
		$query = "SELECT * FROM `customer_order`";
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
		<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body><br/>
	<form action="order.php" method="POST">
	<div class="container">
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="home.php">Back</a></li>
		<li class="breadcrumb-item active" aria-current="page">Order item list</li>
		
	</ol>
	</nav>
	<div class="container"><center>			
    <div class="col-md-10">
		<div class="thumbnail">
		<img src="images/bg.jpg" style="width:100%" height="250">
		<div class="caption">
	</div>
	</a>
	</div>
	</div>
	</div>
<div class="container">
		<div class="row">
		<div class="col-sm-12"></br>
		<div class="table-responsive">
		<table class="table table-hover table-light">
		<thead>
		<tr>
			<th>Order ID</th>
			<th>Menu ID</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Action</th>
		</tr>
		</thead>
		
			<div class="btn-group">
			<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option
			</button>
			<div class="dropdown-menu">
			<a  data-toggle="modal" data-target="#exampleModalCenter1" class="dropdown-item">Add</a>
			<a class="dropdown-item" href="order.php?edit=<?php echo $row['order_id']; ?>">Edit</a>
			<a class="dropdown-item" href="process3.php?delete=<?php echo $row["order_id"]; ?>" onclick="return confirm('Are you sure?');">Delete</a>
			</div>
			</div>
			
			
		<?php while($row = mysqli_fetch_array($search_result)):?>
			<tbody>
			<tr>
				<td><?php echo $row['order_id'];?></td>
				<td><?php echo $row['customer_id'];?></td>
				<td><?php echo $row['price'];?></td>
				<td><?php echo $row['quantity'];?></td>
			<td>
			<div class="btn-group">
			<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option
			</button>
			<div class="dropdown-menu">
			<a  data-toggle="modal" data-target="#exampleModalCenter1" class="dropdown-item">Add</a>
			<a class="dropdown-item" href="order.php?edit=<?php echo $row['order_id']; ?>">Edit</a>
			<a class="dropdown-item" href="process3.php?delete=<?php echo $row["order_id"]; ?>" onclick="return confirm('Are you sure?');">Delete</a>
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
					<h5 class="modal-title">Order</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			   </div>
			  <div class="modal-body">
		<?php require_once 'process3.php'; ?>
			<form action="process.php" method="post">
			<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
			<label class="col-form-label">Order ID:</label>
			<input type="text" class="form-control form-control-sm" name="order_id" placeholder="order id" required>
			<label class="col-form-label">Menu ID:</label>
			<input type="text" class="form-control form-control-sm" name="menu_id" placeholder="menu id" required>
			<label class="col-form-label">Price:</label>
			<input type="text" class="form-control form-control-sm" name="price" placeholder="price" required>
			<label class="col-form-label">Quantity:</label>
			<input type="text" class="form-control form-control-sm" name="quantity" placeholder="quantity" required><br/>
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
			<?php require_once 'process3.php'; ?>
			<form action="process.php" method="post">
			<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
			<label class="col-form-label">Order ID:</label>
			<input type="text" class="form-control form-control-sm" name="order_id" placeholder="order id" value="<?php echo $order_id; ?>" required>
			<label class="col-form-label">Menu ID:</label>
			<input type="text" class="form-control form-control-sm" name="menu_id" placeholder="menu id" value="<?php echo $menu_id; ?>" required>
			<label class="col-form-label">Price:</label>
			<input type="text" class="form-control form-control-sm" name="price" placeholder="price" value="<?php echo $price; ?>" required>
			<label class="col-form-label">Quantity:</label>
			<input type="text" class="form-control form-control-sm" name="quantity" placeholder="quantity" required><br/>
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
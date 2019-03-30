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
<?php
	$con = new mysqli('localhost', 'root', '', 'kusina online') or die(mysqli ($mysqli));
	$sql = "SELECT * FROM customer";
	$query_cus = mysqli_query($con,$sql);
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
<div class="container">
		<form action="order.php" method="POST">
	<div class="container">
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="home.php">Back</a></li>
		<li class="breadcrumb-item"><a href="AddCus.php">Add Customer Order</a></li>
		<li class="breadcrumb-item"><a href="additem.php">Add Order Item</a></li>
		<li class="breadcrumb-item active" aria-current="page">Order list</li>
		
	</ol>
	</nav>
 </form>

			
			<center>
				<div class="container">			
		<div class="row">
		<div class="col-md-7">
		<div class="thumbnail">
		<img src="images/kusina1.jpg" style="width:100%" height="300">
		<div class="caption">
	</div>
	
	</div>
	</div>
			<div class="col-md-4">
			<h2><b><u>All Total</u></b></h2>
			<?php
							$con = new mysqli("localhost", "root", "", "kusina online");
							$sql = "SELECT SUM(price*quantity) as `total` FROM order_item ";
							$querytotal = mysqli_query($con,$sql);
					?>
					
					<?php while($row = mysqli_fetch_array($querytotal)):?><br><br>
					<h1><span><?php echo "&#8369;".$row['total'];?></span></h1>
			<?php endwhile; ?>
		</div>
		</div>
<br> 
			<div class = "row">
			<div class="col-sm-6">
		<h2><b>Customer Order</b></h2>
			
				<div class="table-responsive">
					<table class="table table-hover table-light">
					<thead>
						<tr>
							<th>Order ID</th>
							<th>Customer ID</th>
							<th>Timestamp</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php
							$con = new mysqli("localhost", "root", "", "kusina online");
							$sql = "SELECT * FROM customer,customer_order where customer.customer_id = customer_order.customer_id";
							$querycustomer = mysqli_query($con,$sql);
					?>
					
				<?php while($row = mysqli_fetch_array($querycustomer)):?>
<tbody>
	<tr>
			<td><?php echo $row['order_id'];?></td>
			<td><?php echo $row['first_name'];?></td>
			<td><?php echo $row['timestamp'];?></td>
			
	  <td>
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option</button>
						<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					<a class="dropdown-item" href="process3.php?delete=<?php echo $row["order_id"]; ?>" onclick="return confirm('are you sure you want to delete?')">Delete</a>
				<a class="dropdown-item" href="AddCus.php?edit_customerorder=<?php echo $row["order_id"]; ?>" onclick="return confirm('are you sure you want to edit?')">Edit</a>
			</div>
		</div>
	  </td>
	</tr>
</tbody>			
<?php endwhile;?>		
</table>
</div>
</div>
<div class="col-sm-6">
<h2><b> Order Items</b></h2>
		
			<div class="table-responsive">
				<table class="table table-hover table-light">
					<thead>
						<tr>
							<th>Order ID</th>
							<th>Menu ID</th>
							<th>Price<th>
							<th>Quantity</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php
							$con = new mysqli("localhost", "root", "", "kusina online");
							$sql = "SELECT * FROM order_item ";
							$queryorderitem = mysqli_query($con,$sql);
					?>
					
				<?php while($row = mysqli_fetch_array($queryorderitem)):?>
				<?php
						$x=$row['order_id'];
						$y=$row['menu_id'];
						$j=$row['price'];
						$k=$row['quantity'];
						$m= $j*$k;
						
				
				?>
<tbody>			
	<tr>
			<td><?php echo $x;?></td>
			<td><?php echo $y;?></td>
			<td><?php echo "&#8369;" .$j;?></td>
			<td></td>
			<td><?php echo $k;?></td>
			<td><?php echo "&#8369;" .$m;?></td>
	  <td>
			<div class="btn-group" role="group">
					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option</button>
						<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					<a class="dropdown-item" href="process3.php?delete=<?php echo $row["order_id"]; ?>" onclick="return confirm('are you sure you want to delete?')">Delete</a>
				<a class="dropdown-item" href="additem.php?edit=<?php echo $row["order_id"]; ?>" onclick="return confirm('are you sure you want to edit?')">Edit</a>
			</div>
			</div>
	  </td>
	</tr>
</tbody>
<?php endwhile;?>
</table>
			</div>
	</div>
	

</div>
</body>
</html>



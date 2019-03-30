<?php
	if(isset($_POST['btn_search']))
	{
    $search = $_POST['search'];
		
		$query = "SELECT * FROM `menu` WHERE CONCAT(`menu_id`, `menu_name`, 'description', 'price', 'unit') LIKE '%".$search."%'";
		$search_result = filterTable($query);
    
	}
	else {
		$query = "SELECT * FROM `menu`";
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
	<div class="container">
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="home.php">Back</a></li>
<<<<<<< HEAD
=======
		<li class="breadcrumb-item"><a href="addmenu.php">Add Menu</a></li>
>>>>>>> fifth commit
		<li class="breadcrumb-item active" aria-current="page">Menu list</li>
	</ol>
  </nav>


	<div class="container">
		<div class="col-sm-12">
		<div class="table-responsive">
		<table class="table table-hover table-light">
		<thead>
		<tr>
			<th>Menu ID</th>
			<th>Menu Name</th>
<<<<<<< HEAD
			<th>Description</th>
			<th>Price</th>
			<th>Unit</th>
			<td>
			<div class="btn-group">
			<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
			</button>
			<div class="dropdown-menu">
			<a  data-toggle="modal" data-target="#exampleModalCenter1" class="dropdown-item">Add</a>
			
			</div>
			</div>
=======
			<th>Price</th>
			<th>Description</th>
			<th>Unit</th>
			<th>Action</th>
			<td>
			
>>>>>>> fifth commit
			</td>
		</tr>
		</thead>
			
				<?php while($row = mysqli_fetch_array($search_result)):?>
			<tbody>
			<tr>
				<td><?php echo $row['menu_id'];?></td>
				<td><?php echo $row['menu_name'];?></td>
<<<<<<< HEAD
				<td><?php echo $row['description'];?></td>
				<td><?php echo $row['price'];?></td>
				<td><?php echo $row['unit'];?></td>
			<td>
			<div class="btn-group">
			<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option
			</button>
			<div class="dropdown-menu">
			<a  data-toggle="modal" data-target="#exampleModalCenter1" class="dropdown-item">Add</a>
			<a class="dropdown-item" href="menu.php?edit=<?php echo $row['menu_id']; ?>">Edit</a>
			<a class="dropdown-item" href="process2.php?delete=<?php echo $row["menu_id"]; ?>" onclick="return confirm('Are you sure?');">Delete</a>
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
				<h5 class="modal-title" >Add Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			   </div>
			  <div class="modal-body">
			<?php require_once 'process2.php'; ?>
			<form action="process2.php" method="post">
			<input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>">
			<label class="col-form-label">Menu ID:</label>
			<input type="text" class="form-control form-control-sm" name="menu_id" placeholder="" required>
			<label class="col-form-label">Menu Name:</label>
			<input type="text" class="form-control form-control-sm" name="menu_name" placeholder="" required>
			
			
			<label class="col-form-label">Description:</label>
			<textarea class="form-control" rows="5" id="comment" name="description" placeholder="" required></textarea>
	
			<label class="col-form-label">Price:</label>
			<input type="text" class="form-control form-control-sm" name="price" placeholder="" required>
			<label class="col-form-label">Unit:</label>
			<input type="number" class="form-control form-control-sm" name="unit" placeholder="" required><br/>
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
					<?php require_once 'process2.php'; ?>
						<form action="process2.php" method="post">
						<input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>">
						<label class="col-form-label">Menu Name:</label>
						<input type="text" class="form-control form-control-sm" name="menu_name" placeholder="" value="<?php echo $menu_name; ?>" required>
						<label class="col-form-label">Description:</label>
						<textarea class="form-control" rows="5" id="comment" name="description" placeholder="" required><?php echo $description; ?></textarea>
						<label class="col-form-label">Price:</label>
						<input type="text" class="form-control form-control-sm" name="price" placeholder="" value="<?php echo $price; ?>" required>
						<label class="col-form-label">Unit:</label>
						<input type="number" class="form-control form-control-sm" name="unit" placeholder="" value="<?php echo $unit; ?>" required><br/>
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
=======
				<td><?php echo $row['price'];?></td>
				<td><?php echo $row['description'];?></td>
				<td><?php echo $row['unit'];?></td>
			 <td>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option</button>
						<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					<a class="dropdown-item" href="process2.php?delete=<?php echo $row["menu_id"]; ?>" onclick="return confirm('are you sure you want to delete?')">Delete</a>
				<a class="dropdown-item" href="addmenu.php?edit=<?php echo $row["menu_id"]; ?>" onclick="return confirm('are you sure you want to edit?')">Edit</a>
			</div>
			</div>
	  </td>
	</tr>
</tbody>

	<?php endwhile;?>
	</table>
</center>
     
     
    </div>  
</section>
>>>>>>> fifth commit
		</body>
	</html>
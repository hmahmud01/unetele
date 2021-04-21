<?php  
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
include 'db.php';
error_reporting(0);
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$query = "DELETE FROM tblcategory WHERE id=$id";
	$sql = mysqli_query($con, $query);

	if ($sql) {
		$msg="Successfully Delete Your Record!";
	}else{
		$error="Something is wrong! Please try again."; 
	}
}
?>
<?php include 'inc/header.php'; ?>

<div class="container-fluid ds-main">
	<div class="contaniner ds-container">
		<div class="row">
			<div class="col-sm-2" style="padding:0px;">
				<?php include 'inc/sidebar.php'; ?>
			</div>
			<div class="col-sm-10 ds-main-content">
				<div class="row dst-main">
					<div class="col-sm-6">
						<ul class="visit-store">
							<li><a href="../index.php"><i class="fa fa-desktop"></i>Visit Store</a></li>
						</ul>
					</div>
					<div class="col-sm-6 dst-user">
						<div class="dropdown">
						    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
						      <i class="fa fa-user-circle-o"></i> Admin
						    </button>
						    <div class="dropdown-menu">
						      <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
						      <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>
						    </div>
						</div>
					</div>
				</div>
				<div class="row dst-main2">
					<div class="col-sm-6">
						<ul class="visit-store">
							<li><h4>Manage Categories</h4></li>
						</ul>
					</div>
					<div class="col-sm-6 dst-user">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb brd-cump">
						    <li class="breadcrumb-item"><a href="#">Admin</a></li>
						    <li class="breadcrumb-item"><a href="#">Category</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Manage Categories</li>
						  </ol>
						</nav>
					</div>
				</div>
				<div class="row dst-main3">
					<?php if($msg){ ?>
					<div class="alert alert-success" role="alert">
					<strong>Well done!</strong> <?php echo htmlentities($msg);?>
					</div>
					<?php } ?>
					<?php if($error){ ?>
					<div class="alert alert-danger" role="alert">
					<strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
					<?php } ?>
					<div class="col-sm-12">
						<div class="card">
							<div class="visit-store">
								<a href="add-category.php"><button class="btn btn-primary">Add Category</button></a>
								<span></span>
								<div class="addform-custom">
									<table class="table">
									    <thead class="thead-dark">
									      <tr>
									        <th>#</th>
									        <th>Category</th>
									        <th>Description</th>
									        <th>Posting Date</th>
									        <th>Last updation Date</th>
									        <th colspan="2">Action</th>
									      </tr>
									    </thead>
									    <tbody>

									    <?php  

									    $query = "SELECT * FROM tblcategory";
									    	$result = mysqli_query($con,$query);
									    	$cnt=1;
									    	while ($row = mysqli_fetch_array($result)) {?>
									    		
									    

									      <tr>
									        <td scope="row"><?php echo htmlentities($cnt);$cnt++;?></td>
									        <td><?php echo $row['CategoryName']; ?></td>
									        <td><?php echo $row['Description']; ?></td>
									        <td><?php echo $row['PostingDate']; ?></td>
									        <td><?php echo $row['UpdationDate']; ?></td>
									        <td>
									        	<a href="manage-categories.php?delete=<?php echo $row['id']; ?>"><button class="btn btn-danger">DELETE</button></a>
									        </td>
									        <td>
									        	<a href="edit-category.php?edit=<?php echo $row['id']; ?>"><button class="btn btn-success">UPDATE</button></a>
									        </td>
									      </tr>
									      	<?php }?>
									    </tbody>
									  </table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid main-footer">
					<div class="container">
						<i class="fa fa-keyboard-o"></i><span>Copyright © 2021 By Monir Ahmed</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php }else{
	header("Location:index.php");
	exit();
}


 ?>




<?php include 'inc/footer.php' ?>
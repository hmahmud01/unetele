<?php  
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
include 'db.php';
error_reporting(0);
//Delete Query...
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$query = "DELETE FROM mt_user WHERE id=$id";
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
							<li><h4>Manage Users</h4></li>
						</ul>
					</div>
					<div class="col-sm-6 dst-user">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb brd-cump">
						    <li class="breadcrumb-item"><a href="#">Admin</a></li>
						    <li class="breadcrumb-item"><a href="#">Users</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Manage Users</li>
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
								<a href="add-user.php"><button class="btn btn-primary">Add Users</button></a>
								<span></span>
								<div class="addform-custom">
									<table class="table">
									    <thead class="thead-dark">
									      <tr>
									        <th colspan="2">#</th>
									        <th>First Name</th>
									        <th>Last Name</th>
									        <th>Role</th>
									        <th>User Name</th>
									        <th>Phone Number</th>
									        <th>Images</th>
									        <th colspan="3">Action</th>
									      </tr>
									    </thead>
									    <tbody>

									    <?php  

									    $query = "SELECT * FROM mt_user";
									    	$result = mysqli_query($con,$query);
									    	$cnt=1;
									    	while ($row = mysqli_fetch_array($result)) {?>
									      <tr>
									        <td scope="row"><?php echo htmlentities($cnt);$cnt++;?></td>
									        <td colspan="2"><?php echo $row['firstname']; ?></td>
									        <td><?php echo $row['lastname']; ?></td>
									        <td><?php echo $row['role']; ?></td>
									        <td><?php echo $row['username']; ?></td>
									        <td><?php echo $row['phone']; ?></td>
									        <td><?php echo "<img src='".$row['image']."' alt='Image' style='width:100px;height:100px'>"; ?></td>
									        <td>
									        	<a href="manage-user.php?delete=<?php echo $row['id']; ?>"><button class="btn btn-danger">DELETE</button></a>
									        </td>
									        <td>
									        	<a href="edit-user.php?edit=<?php echo $row['id']; ?>"><button class="btn btn-success">UPDATE</button></a>
									        </td>
									        <td>
									        	<a href="price-check.php?price-edit=<?php echo $row['id']; ?>"><button class="btn btn-info">Price Check</button></a>
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
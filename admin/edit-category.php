<?php  
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
include 'db.php';
error_reporting(0);
if (isset($_GET['edit'])) {
	$edit_id = $_GET['edit'];
	$record = "SELECT * FROM tblcategory WHERE id='$edit_id'";
	$run = mysqli_query($con, $record);
	$query = mysqli_fetch_array($run);
	$catName = $query['CategoryName'];
	$catDesc = $query['Description'];

}
if (isset($_POST['update'])) {
	$Upcat=$_POST['cat'];
	$Updesc=$_POST['cat_des'];
    $update = "UPDATE tblcategory SET CategoryName='$Upcat', Description='$Updesc' WHERE id='$edit_id'";
	$result = mysqli_query($con,$update);
	if ($result) {
		$msg="Category Updated Successfully";
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
							<li><h4>Update Category</h4></li>
						</ul>
					</div>
					<div class="col-sm-6 dst-user">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb brd-cump">
						    <li class="breadcrumb-item"><a href="#">Admin</a></li>
						    <li class="breadcrumb-item"><a href="#">Category</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Update Category</li>
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
								<h5>Update Category</h5>
								<span></span>
								<div class="addform-custom">
									<form method="post" name="category">
									  <div class="form-group row">
									    <label for="" class="col-sm-2 col-form-label font-weight-bold">Category Name</label>
									    <div class="col-sm-8">
									      <input type="text" class="form-control" id="" name="cat" placeholder="" value="<?php echo $catName; ?>">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="" class="col-sm-2 col-form-label font-weight-bold">Category Description</label>
									    <div class="col-sm-8">
									      <textarea id="summernote" type="textarea" name="cat_des" class="form-control" rows="5"><?php echo $catDesc; ?></textarea>
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="" class="col-sm-2 col-form-label font-weight-bold"></label>
									    <div class="col-sm-4">
									      <input type="submit" class="btn btn-primary" value="Update" name="update">
									    </div>
									  </div>
									</form>
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
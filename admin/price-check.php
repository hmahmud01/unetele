<?php  

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
include 'db.php';
error_reporting(0);
//Record Update

if (isset($_GET['price-edit'])) {
	$edit_id = $_GET['price-edit'];
	$record = "SELECT * FROM tblprice_check WHERE user_id='$edit_id'";
	$run = mysqli_query($con, $record);
	$query = mysqli_fetch_array($run);
	$check_price1 = $query['price_one'];
	$check_price2 = $query['price_two'];
	$check_price3 = $query['price_three'];
	$check_price4 = $query['price_four'];
	$check_price5 = $query['price_five'];
	$check_price6 = $query['price_six'];
	$check_price7 = $query['price_seven'];
	$check_price8 = $query['price_eight'];
	$check_price9 = $query['price_nine'];
	$check_price10 = $query['price_ten'];

}
if (isset($_POST['update'])) {
	$update_price1=$_POST['price1'];
	$update_price2=$_POST['price2'];
	$update_price3=$_POST['price3'];
	$update_price4=$_POST['price4'];
	$update_price5=$_POST['price5'];
	$update_price6=$_POST['price6'];
	$update_price7=$_POST['price7'];
	$update_price8=$_POST['price8'];
	$update_price9=$_POST['price9'];
	$update_price10=$_POST['price10'];
    

    $update = "UPDATE tblprice_check SET price_one='$update_price1', price_two='$update_price2', price_three='$update_price3', price_four='$update_price4', price_five='$update_price5', price_six='$update_price6', price_seven= '$update_price7', price_eight='$update_price8', price_nine='$update_price9', price_ten='update_price10' WHERE user_id='$edit_id'";
	$result = mysqli_query($con,$update);
	if ($result) {
		$msg="Price Updated Successfully";
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
							<li><h4>Update Price</h4></li>
						</ul>
					</div>
					<div class="col-sm-6 dst-user">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb brd-cump">
						    <li class="breadcrumb-item"><a href="#">Admin</a></li>
						    <li class="breadcrumb-item"><a href="#">Users</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Update Price</li>
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
								<h5>Price Update</h5>
								<span class="line-btm"></span>
								<div class="addform-custom">
									<form method="post" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id;?>">
									  	<div class="form-group row">
									  	<label class="col-sm-6 font-weight-bold text-center">First Category </label>
									  	<label class="col-sm-6"></label>
									  	<label for="" class="col-sm-12"></label>
									    <label for="" class="col-sm-1 font-weight-bold">Price 1: </label>
										    <div class="col-sm-6">
										      <input type="text" class="form-control" id="" name="price1" placeholder="" required value="$<?php echo $check_price1; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="" class="col-sm-1 font-weight-bold">Price 2: </label>
										    <div class="col-sm-6">
										      <input type="text" class="form-control" id="" name="price2" placeholder="" required value="$<?php echo $check_price2; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="" class="col-sm-1 font-weight-bold">Price 3: </label>
										    <div class="col-sm-6">
										      <input type="text" class="form-control" id="" name="price3" placeholder="" required value="$<?php echo $check_price3; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="" class="col-sm-1 font-weight-bold">Price 4: </label>
										    <div class="col-sm-6">
										      <input type="text" class="form-control" id="" name="price4" placeholder="" required value="$<?php echo $check_price4; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="" class="col-sm-1 font-weight-bold">Price 5: </label>
										    <div class="col-sm-6">
										      <input type="text" class="form-control" id="" name="price5" placeholder="" required value="$<?php echo $check_price5; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									  	<label class="col-sm-6 font-weight-bold text-center">Second Category </label>
									  	<label class="col-sm-6"></label>
									  	<label for="" class="col-sm-12"></label>
									    <label for="" class="col-sm-1 font-weight-bold">Price 1: </label>
										    <div class="col-sm-6">
										      <input type="text" class="form-control" id="" name="price6" placeholder="" required value="$<?php echo $check_price6; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="" class="col-sm-1 font-weight-bold">Price 2: </label>
										    <div class="col-sm-6">
										      <input type="text" class="form-control" id="" name="price7" placeholder="" required value="$<?php echo $check_price7; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="" class="col-sm-1 font-weight-bold">Price 3: </label>
										    <div class="col-sm-6">
										      <input type="text" class="form-control" id="" name="price8" placeholder="" required value="$<?php echo $check_price8; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="" class="col-sm-1 font-weight-bold">Price 4: </label>
										    <div class="col-sm-6">
										      <input type="text" class="form-control" id="" name="price9" placeholder="" required value="$<?php echo $check_price9; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="" class="col-sm-1 font-weight-bold">Price 5: </label>
										    <div class="col-sm-6">
										      <input type="text" class="form-control" id="" name="price10" placeholder="" required value="$<?php echo $check_price10; ?>">
										    </div>
									  	</div>
									  <div class="form-group row">
									    <label for="" class="col-sm-1 col-form-label"></label>
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
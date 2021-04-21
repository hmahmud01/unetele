<?php  

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
include 'db.php';
error_reporting(0);
//Record Update

if (isset($_GET['edit'])) {
	$edit_id = $_GET['edit'];
	$record = "SELECT * FROM mt_user WHERE id='$edit_id'";
	$run = mysqli_query($con, $record);
	$query = mysqli_fetch_array($run);
	$fname = $query['firstname'];
	$lname = $query['lastname'];
	$uname = $query['username'];
	$email = $query['email'];
	$phone = $query['phone'];
	$role = $query['role'];
	$password = $query['password'];
	$address = $query['address'];
	$image = $query['image'];

}
if (isset($_POST['update'])) {
	$UpfirstName=$_POST['first-name'];
	$UplastName=$_POST['last-name'];
	$Upemail=$_POST['email'];
	$Upphone=$_POST['phone'];
	$Uprole=$_POST['role'];
	$UpuserName=$_POST['user-name'];
	$Uppassword=$_POST['password'];
	$Upaddress=$_POST['address'];
    $image = 'img/'.$_FILES['image']['name'];

    if (preg_match("!image!", $_FILES['image']['type'])) {
        if (copy($_FILES['image']['tmp_name'], $image)) {
           $_SESSION['image']=$image;
        }
    }

    $update = "UPDATE mt_user SET firstname='$UpfirstName', lastname='$UplastName', username='$UpuserName', email='$Upemail', phone='$Upphone', role='$Uprole', password= '$Uppassword', address='$Upaddress', image='$image' WHERE id='$edit_id'";
	$result = mysqli_query($con,$update);
	if ($result) {
		$msg="User Updated Successfully";
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
						      <i class="fa fa-user-circle-o"></i> <?php echo $uname; ?>
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
							<li><h4>Update User</h4></li>
						</ul>
					</div>
					<div class="col-sm-6 dst-user">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb brd-cump">
						    <li class="breadcrumb-item"><a href="#">Admin</a></li>
						    <li class="breadcrumb-item"><a href="#">Users</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Update user</li>
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
								<h5>Update</h5>
								<span class="line-btm"></span>
								<div class="addform-custom">
									<form method="post" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id;?>">
									  	<div class="form-group row">
									    <label for="" class="col-sm-2 font-weight-bold">First Name:<span style="color:red">*</span></label>
										    <div class="col-sm-8">
										      <input type="text" class="form-control" id="" name="first-name" placeholder="" required value="<?php echo $fname; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="" class="col-sm-2 font-weight-bold">Last Name:<span style="color:red">*</span></label>
										    <div class="col-sm-8">
										      <input type="text" class="form-control" id="" name="last-name" placeholder="" required value="<?php echo $lname; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="" class="col-sm-2 font-weight-bold">E-mail:<span style="color:red">*</span></label>
										    <div class="col-sm-8">
										      <input type="text" class="form-control" id="" name="email" placeholder="" required value="<?php echo $email; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="" class="col-sm-2 font-weight-bold">Phone Number:<span style="color:red">*</span></label>
										    <div class="col-sm-8">
										      <input type="text" class="form-control" id="" name="phone" placeholder="" required value="<?php echo $phone; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="formControlSelect1" class="col-sm-2 font-weight-bold">Role:<span style="color:red">*</span></label>
										    <div class="col-sm-8">
										      	<select class="form-control" id="formControlSelect1" name="role">
										      		<option><?php echo $role; ?></option>
										      		<option>Admin</option>
										      		<option>Manager</option>
										      		<option>User</option>
											    </select>
										    </div>
									  	</div>
									  	<div class="form-group row">
									    <label for="" class="col-sm-2 font-weight-bold">User Name:<span style="color:red">*</span></label>
										    <div class="col-sm-8">
										      <input type="text" class="form-control" id="" name="user-name" placeholder="" required value="<?php echo $uname; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									  	<label for="" class="col-sm-2 font-weight-bold">Password:<span style="color:red">*</span></label>
										    <div class="col-sm-8">
										      <input type="password" class="form-control" id="" name="password" required value="<?php echo $password; ?>">
										    </div>
									  	</div>
									  	<div class="form-group row">
									  	<label for="" class="col-sm-2 font-weight-bold">Address:<span style="color:red">*</span></label>
										    <div class="col-sm-8">
										      <textarea type="text" class="form-control"  id="summernote" name="address" rows="4" required ><?php echo $address; ?></textarea>
										    </div>
									  	</div>
										<div class="form-group row">
										  	<label for="" class="col-sm-2 font-weight-bold">Feature Image:</label>
										    <div class="col-sm-8">
										    	<input type="file" class="form-control" id="feture-image" name="image" placeholder="" required>
											</div>
									  	</div>
									  <div class="form-group row">
									    <label for="" class="col-sm-2 col-form-label"></label>
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
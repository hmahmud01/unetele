<?php  

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
include 'db.php';
error_reporting(0);
if(isset($_POST['submit'])){
	$postTitle=$_POST['post-title'];
	$catId=$_POST['category'];
	$subcatId=$_POST['subcategory'];
	$postDest=$_POST['post-dest'];
	$arr = explode(" ",$postTitle);
	$postUrl=implode("-",$arr);
    $image = 'img/'.$_FILES['image']['name'];

    if (preg_match("!image!", $_FILES['image']['type'])) {
        if (copy($_FILES['image']['tmp_name'], $image)) {
           $_SESSION['image']=$image;
        }
    }
	$status=1;
	$query = "INSERT INTO tblposts(PostTitle, CategoryId, SubCategoryId, PostDetails, PostUrl, Is_Active, image) VALUES ('$postTitle', '$catId', '$subcatId', '$postDest', '$postUrl', '$status', '$image')";
	$result = mysqli_query($con,$query);
	if ($result) {
		$msg="New Post created";
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
							<li><h4>Add Post</h4></li>
						</ul>
					</div>
					<div class="col-sm-6 dst-user">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb brd-cump">
						    <li class="breadcrumb-item"><a href="#">Admin</a></li>
						    <li class="breadcrumb-item"><a href="#">Post</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Add Post</li>
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
								<h5>Add Post</h5>
								<span></span>
								<div class="addform-custom">
									<form method="post" name="category" enctype="multipart/form-data">
									  <div class="form-group row">
									  	<label for="" class="col-sm-2"></label>
									    <label for="" class="col-sm-10">Post Title</label>
									    <label for="" class="col-sm-2"></label>
									    <div class="col-sm-9">
									      <input type="text" class="form-control" id="" name="post-title" placeholder="">
									    </div>
									  </div>
									  <div class="form-group row">
									  	<label for="" class="col-sm-2"></label>
									    <label for="" class="col-sm-10">Category</label>
									    <label for="" class="col-sm-2"></label>
									    <div class="col-sm-9">
									      	<select class="form-control" name="category" required>
                                           	<option value="">Select Category</option>
										<?php
										// Feching active categories
										$ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
										while($result=mysqli_fetch_array($ret))
										{ ?>
										<option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
										<?php } ?>

											</select>
									    </div>
									  	</div>
									  	<div class="form-group row">
									  	<label for="" class="col-sm-2"></label>
									    <label for="" class="col-sm-10">Sub Category</label>
									    <label for="" class="col-sm-2"></label>
										    <div class="col-sm-9">
											    <select class="form-control" name="subcategory" required>
	                                           	<option value="">Select Sub Category </option>
											<?php
											// Feching active Sub Categories
											$ret1=mysqli_query($con,"select SubCategoryId,Subcategory from  tblsubcategory where Is_Active=1");
											while($result=mysqli_fetch_array($ret1))
											{?>
											<option value="<?php echo htmlentities($result['SubCategoryId']);?>"><?php echo htmlentities($result['Subcategory']);?></option>
											<?php } ?>

												</select>
										    </div>
									  	</div>
										<div class="form-group row">
											<div class="col-sm-2"></div>
											<div class="card visit-store1">
											  	<label for="" class="col-sm-2"></label>
											    <label for="" class="col-sm-10">Post Details</label>
											    <label for="" class="col-sm-2"></label>
											    <div class="col-sm-9 col-md-12">
											    	<textarea name="post-dest" class="form-control" id="summernote"></textarea>
												</div>
											</div>
									  	</div>
										<div class="form-group row">
											<div class="col-sm-2"></div>
											<div class="card visit-store1">
											  	<label for="" class="col-sm-2"></label>
											    <label for="" class="col-sm-10">Feature Image</label>
											    <label for="" class="col-sm-2"></label>
											    <div class="col-sm-9 col-md-12">
											    	<input type="file" class="form-control" id="feture-image" name="image" placeholder="">
												</div>
											</div>
									  	</div>
									  <div class="form-group row">
									    <label for="" class="col-sm-2 col-form-label"></label>
									    <div class="col-sm-4">
									      <input type="submit" class="btn btn-primary" value="Submit" name="submit">
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
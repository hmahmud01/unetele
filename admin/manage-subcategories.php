<?php  

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
include 'db.php';

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
							<li><h4>Manage SubCategories</h4></li>
						</ul>
					</div>
					<div class="col-sm-6 dst-user">
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb brd-cump">
						    <li class="breadcrumb-item"><a href="#">Admin</a></li>
						    <li class="breadcrumb-item"><a href="#">Sub Category</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Manage SubCategories</li>
						  </ol>
						</nav>
					</div>
				</div>
				<div class="row dst-main3">
					<div class="col-sm-12">
						<div class="card">
							<div class="visit-store">
								<a href="add-subcategory.php"><button class="btn btn-primary">Add Sub Category</button></a>
								<span></span>
								<div class="addform-custom">
									<table class="table">
									    <thead class="thead-dark">
									      <tr>
									        <th>#</th>
									        <th>Category</th>
									        <th>Sub Category</th>
									        <th>Description</th>
									        <th>Posting Date</th>
									        <th>Last updation Date</th>
									        <th colspan="2">Action</th>
									      </tr>
									    </thead>
									    <tbody>

									    <?php  

									    $query = "SELECT tblcategory.CategoryName as catName,tblsubcategory.Subcategory as subcatName,tblsubcategory.SubCatDescription as SubCatDescription,tblsubcategory.PostingDate as subCatpostingdate,tblsubcategory.UpdationDate as subcatupdationdate from tblsubcategory join tblcategory on tblsubcategory.CategoryId=tblcategory.id where tblsubcategory.Is_Active=1";
									    $cnt=1;
									    	$result = mysqli_query($con,$query);
									    	while ($row = mysqli_fetch_array($result)) {?>

									      <tr>
									        <td scope="row"><?php echo htmlentities($cnt);$cnt++;?></td>
									        <td><?php echo $row['catName']; ?></td>
									        <td><?php echo $row['subcatName']; ?></td>
									        <td><?php echo $row['SubCatDescription']; ?></td>
									        <td><?php echo $row['subCatpostingdate']; ?></td>
									        <td><?php echo $row['subcatupdationdate']; ?></td>
									        <td>
									        	<a href="#"><button class="btn btn-danger">DELETE</button></a>
									        </td>
									        <td>
									        	<a href="#"><button class="btn btn-success">UPDATE</button></a>
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
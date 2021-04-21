<?php  
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

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
				<div class="container-fluid dshm-content">
					<div class="container ">
						<div class="row">
							<div class="col-sm-6">
								<h2 class="dsh-title">Dashboard</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<a href="#">
									<div class="card">
									  <div class="card-body">
									    <h3>Total Post</h3>
									    <div class="row">
										    <div class="col-sm-3 money-icon"><i class="fa fa-money"></i></div>
										    <div class="col-sm-9"><span>Tk13,670.00</span></div>
									    </div>
									  </div>
									</div>
								</a>
							</div>
							<div class="col-sm-3">
								<a href="#">
									<div class="card">
									  <div class="card-body">
									    <h3>Total User</h3>
									    <div class="row">
										    <div class="col-sm-3 shopping-icon"><i class="fa fa-shopping-cart"></i></div>
										    <div class="col-sm-9"><span>2</span></div>
									    </div>
									  </div>
									</div>
								</a>
							</div>
							<div class="col-sm-3">
								<a href="#">
									<div class="card">
									  <div class="card-body">
									    <h3>Total Category</h3>
									    <div class="row">
										    <div class="col-sm-3 cubes-icon"><i class="fa fa-cubes"></i></div>
										    <div class="col-sm-9"><span>64</span></div>
									    </div>
									  </div>
									</div>
								</a>
							</div>
							<div class="col-sm-3">
								<a href="#">
									<div class="card">
									  <div class="card-body">
									    <h3>Total Pages</h3>
									    <div class="row">
										    <div class="col-sm-3 users-icon"><i class="fa fa-users"></i></div>
										    <div class="col-sm-9"><span>2</span></div>
									    </div>
									  </div>
									</div>
								</a>
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








<?php include 'inc/footer.php'; ?>

<?php }else{
	header("Location:index.php");
	exit();
}


 ?>
<?php  
include 'db.php';
?>
<div class="ds-ls-menu">
<h3>Dashboard</h3>

<div class="sidebar">
	<ul class="sidebar-menu">
		<li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>	
		<div id="accordion">	
		<li>
			<div class="card ds-card">
			    <div class="card-header" id="heading-1">
			      <h5 class="mb-0">
			        <a class="card-link" data-toggle="collapse" href="#collapseOne">
			          <i class="fa fa-list"></i> <span>Category</span>
			        </a>
			      </h5>
			    </div>
			    <div id="collapseOne" class="collapse" data-parent="#accordion">
			      <div class="card-body">
			        <ul>
			        	<li><a href="add-category.php">Add Category</a></li>
			        	<li><a href="manage-categories.php">Manage Categories</a></li>
			        </ul>
			      </div>
			    </div>
			</div>
		</li>
		<li>
			<div class="card ds-card">
			    <div class="card-header" id="heading-2">
			      <h5 class="mb-0">
			        <a class="card-link" data-toggle="collapse" href="#collapseTwo">
			          <i class="fa fa-list"></i> <span>Sub Category</span>
			        </a>
			      </h5>
			    </div>
			    <div id="collapseTwo" class="collapse" data-parent="#accordion">
			      <div class="card-body">
			        <ul>
			        	<li><a href="add-subcategory.php">Add Sub Category</a></li>
			        	<li><a href="manage-subcategories.php">Manage Sub Categories</a></li>
			        </ul>
			      </div>
			    </div>
			</div>
		</li>
		<li>
			<div class="card ds-card">
			    <div class="card-header" id="heading-3">
			      <h5 class="mb-0">
			        <a class="card-link" data-toggle="collapse" href="#collapseThree">
			          <i class="fa fa-list"></i> <span>Posts</span>
			        </a>
			      </h5>
			    </div>
			    <div id="collapseThree" class="collapse" data-parent="#accordion">
			      <div class="card-body">
			        <ul>
			        	<li><a href="add-post.php">Add Posts</a></li>
			        	<li><a href="manage-post.php"> Manage Posts</a></li>
			        	<li><a href="trash-post.php"> Trash Posts</a></li>
			        </ul>
			      </div>
			    </div>
			</div>
		</li>
		<li>
			<div class="card ds-card">
			    <div class="card-header" id="heading-4">
			      <h5 class="mb-0">
			        <a class="card-link" data-toggle="collapse" href="#collapseFour">
			          <i class="fa fa-list"></i> <span>Pages</span>
			        </a>
			      </h5>
			    </div>
			    <div id="collapseFour" class="collapse" data-parent="#accordion">
			      <div class="card-body">
			        <ul>
			        	<li><a href="about.php">About Us</a></li>
			        	<li><a href="contact.php">Contact Us</a></li>
			        </ul>
			      </div>
			    </div>
			</div>
		</li>
		<li>
			<div class="card ds-card">
			    <div class="card-header" id="heading-5">
			      <h5 class="mb-0">
			        <a class="card-link" data-toggle="collapse" href="#collapseFive">
			          <i class="fa fa-list"></i> <span>Users</span>
			        </a>
			      </h5>
			    </div>
			    <div id="collapseFive" class="collapse" data-parent="#accordion">
			      <div class="card-body">
			        <ul>
			        	<li><a href="add-user.php">Add Users</a></li>
			        	<li><a href="manage-user.php">Manage Users</a></li>
			        </ul>
			      </div>
			    </div>
			</div>
		</li>
		<li>
			<div class="card ds-card">
			    <div class="card-header" id="heading-6">
			      <h5 class="mb-0">
			        <a class="card-link" data-toggle="collapse" href="#collapseSix">
			          <i class="fa fa-list"></i> <span>Comments</span>
			        </a>
			      </h5>
			    </div>
			    <div id="collapseSix" class="collapse" data-parent="#accordion">
			      <div class="card-body">
			        <ul>
			        	<li><a href="#">Waiting for Approval</a></li>
			        	<li><a href="#">Approved Comments</a></li>
			        </ul>
			      </div>
			    </div>
			</div>
		</li>
	</div>

		<li><a href="#"><i class="fa fa-cogs"></i> <span>Settings</span></a></li>
		
	</ul>
	</div>
</div>
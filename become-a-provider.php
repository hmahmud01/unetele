<?php  
// define variables and set empty values
$name_error = $lname_error = $email_error = $phone_error = $npi_error = $selectone_error = "";
$fname = $lname = $email = $phone = $npi = $message = $msg ="";

	if(isset($_POST['submit'])) {
	$title = $_POST['gender'];
	$first_name = $_POST['fname'];
	$middle_name = $_POST['mname'];
	$last_name = $_POST['lname'];
	$email_id = $_POST['email'];
	$contact = $_POST['phone'];
	$specialits1 = $_POST['specialits1'];
	$specialits2 = $_POST['specialits2'];
	$specialits3 = $_POST['specialits3'];
	$specialits4 = $_POST['specialits4'];
	$npi = $_POST['npi'];
	$selectone = $_POST['selectone'];
	if($first_name=='' || $last_name=='' || $email_id=='' || $contact=='' || $npi=='' || $selectone==''){
		echo "";
	} else {

	$from       = "Untele Doc";
	$webmaster  = "info@unteledoc.com"; //It's web master mail info@example.com
	$to         = "info@unteledoc.com"; // where you want to get mail 
	$subject    = "New Message from 'Provider Recruiting'";

	$headers    = "From: " . $from . "<" . $webmaster . ">\r\n";
	$headers    .= "X-Mailer: PHP/" . phpversion() . "\r\n";
	$headers    .= "MIME-Version: 1.0" . "\r\n";
	$headers    .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = "<html><body>";
	$message .= "<p><b>Title :</b>".$_POST['gender']  ."</p>";
	$message .= "<p><b>First Name :</b>".$_POST['fname']  ."</p>";
	$message .= "<p><b>Middle Name :</b>".$_POST['mname']  ."</p>";
	$message .= "<p><b>Last Name :</b>".$_POST['lname']  ."</p>";
	$message .= "<p><b>Email : </b>". $_POST['email'] ."</p>";
	$message .= "<p><b>Phone : </b>". $_POST['phone'] ."</p>";
	$message .= "<p><b>NPI : </b>". $_POST['npi'] ."</p>";
	$message .= "<p><b>Specialties : </b>". $_POST['specialits1'] .   $_POST['specialits2'] . $_POST['specialits3'] . $_POST['specialits4'] ."</p>";
	$message .= "<p><b>Message :</b>".$_POST['message']."</p>";
	$message .= "<p><b>State of Licensure :</b>".$_POST['selectone']."</p>";
	$message .= "</body></html>";

	$sendmail = mail($to, $subject, $message, $headers);

	echo $msg ="Message Successfully done";
	echo "<script>window.open('become-a-provider.php?sent=Your Form Has been Submited','_self')</script>";
	}
	}
	//form is submitted with post method
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (empty($_POST['fname'])) {
		$name_error = "First Name is required";
	}else{
		$name = test_input($_POST['fname']);
		if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
			$name_error = "Only letters and white space allowed";
		}
	}
	if (empty($_POST['lname'])) {
		$lname_error = "Last Name is required";
	}else{
		$lname = test_input($_POST['lname']);
		if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
			$lname_error = "Only letters and white space allowed";
		}
	}
	if (empty($_POST['email'])) {
		$email_error = "Email is required";
	}else{
		$email = test_input($_POST['email']);
		//check if e-mail address is well formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email_error = "Invalid email Formet";
		}
	}
	if (empty($_POST['phone'])) {
		$phone_error = "Phone Number is required";
	}else{
		$phone = test_input($_POST['phone']);
		//check if e-mail address is well formed
		if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)) {
			$phone_error = "Invalid Phone Number";
		}
	}
	if (empty($_POST['npi'])) {
		$npi_error = "NPI is required";
	}else{
		$dept = test_input($_POST['npi']);
		if (!preg_match("/^[a-zA-Z ]*$/", $npi)) {
			$npi_error = "Only letters and white space allowed";
		}
	}
}
function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<?php include 'inc/header.php' ?>
<div class="container-fluid becomepro-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<p class="provider-head-text">Welcome To United TeleDoc</p>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid join-with-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6 join-header">
				<img class="join-us-img" src="images/sidebar-img.png">
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6 ">
				<div class="join-text">
					<h2 class="join-title-text">Join with <span>Us</span></h2>
					<p class="join-body-text">The world’s leading virtual care provider group. We are looking for board-certified doctors with a specialty in internal medicine, family medicine, emergency medicine and Psychiatry who are eager to help more people to get the care in their moment of need.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid why-chose-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 ">
				<div class="why-join-text">
					<h2 class="why-join-title-text">Why Chose <span>Us</span></h2>
					<p class="why-join-body-text">The world’s leading virtual care provider group. We are looking for board-certified doctors with a specialty in internal medicine, family medicine, emergency medicine and Psychiatry who are eager to help more people to get the care in their moment of need.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-4">
				<a href="#">
					<div class="compenstion">
						<div class="row">
							<div class="col-sm-2">
								<div class="icondoll">
									<i class="fa fa-usd clip-board" aria-hidden="true"></i>
								</div>
							</div>	
							<div class="col-sm-10">
								<div class="com-body">
									<h3 class="title-hover">Compensation</h3>
									<p>We offer competitive compensation for all physicians. </p>
								</div>
							</div>
						</div>	
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-4">
				<a href="#">
					<div class="compenstion">
						<div class="row">
						<div class="col-sm-2">
							<div class="icondoll">
								<i class="fa fa-clipboard clip-board" aria-hidden="true"></i>
							</div>
						</div>	
						<div class="col-sm-10">
							<div class="com-body">
								<h3 class="title-hover">Convenient</h3>
								<p>Convenient way to deliver care from your comfort. You can access as a provider any where from you laptop/computer any time. </p>
							</div>
						</div>
						</div>	
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-4">
				<a href="#">
					<div class="compenstion">
						<div class="row">
						<div class="col-sm-2">
							<div class="icondoll">
								<i class="fa fa-clock-o clip-board" aria-hidden="true"></i>
							</div>
						</div>	
						<div class="col-sm-10">
							<div class="com-body">
								<h3 class="title-hover">Flexibility</h3>
								<p>Our physician ambassadors will help you optimize how best to schedule and work with us. </p>
							</div>
						</div>
						</div>	
					</div>
				</a>
				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-4">
				<a href="#">
					<div class="compenstion">
						<div class="row">
						<div class="col-sm-2">
							<div class="icondoll">
								<i class="fa fa-desktop clip-board" aria-hidden="true"></i>
							</div>
						</div>	
						<div class="col-sm-10">
							<div class="com-body">
								<h3 class="title-hover">Training</h3>
								<p>Our online training and guidelines will help you understand telehealth and our system. </p>
							</div>
						</div>
						</div>	
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-4">
				<a href="#">
					<div class="compenstion">
						<div class="row">
							<div class="col-sm-2">
								<div class="icondoll">
									<i class="fa fa-check-square-o clip-board" aria-hidden="true"></i>
								</div>
							</div>	
							<div class="col-sm-10">
								<div class="com-body">
									<h3 class="title-hover">Insurance Coverage</h3>
									<p>All providers are backed by industry leading malpractice insurance coverage.  </p>
								</div>
							</div>
						</div>	
					</div>
				</a>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-4">
				<a href="#">
					<div class="compenstion">
						<div class="row">
						<div class="col-sm-2">
							<div class="icondoll">
								<i class="fa fa-comment-o clip-board" aria-hidden="true"></i>
							</div>
						</div>	
						<div class="col-sm-10">
							<div class="com-body">
								<h3 class="title-hover">Customer Support</h3>
								<p>Access to our dedicated 24/7 customer service. </p>
							</div>
						</div>
						</div>	
					</div>
				</a>
				
			</div>
		</div>
	</div>
</div>
<div class="container-fluid provid-form-section">
	<div class="container form-border">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="provid-text">
					<h2 class="provid-title-text">Provider Recruitment <span>Form</span></h2>
					<p class="provid-body-text">The world’s leading virtual care provider group. We are looking for board-certified doctors with a specialty in internal medicine, family medicine, emergency medicine and Psychiatry who are eager to help more people to get the care in their moment of need.</p>
				</div>
				<div class="form-control-main">
					<form method="POST" action="<?=$_SERVER['PHP_SELF']; ?>">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
								  <label class="form-check-label font-weight-bold tit-size">Title</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Mr.">
								  <label class="form-check-label" for="inlineRadio1">Mr.</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Mrs.">
								  <label class="form-check-label" for="inlineRadio2">Mrs.</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Miss.">
								  <label class="form-check-label" for="inlineRadio3">Miss.</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-6 col-lg-5">
								<div class="form-group">
								    <label class="font-weight-bold tit-size" for="exampleInputFirstName">First Name<span style="color:#FF346B">*</span></label>
								    <input type="text" class="form-control" name="fname" id="exampleInputFirstName" placeholder="First Name">
								    <span class="error1"><?php echo $name_error; ?></span>
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-2">
								<div class="form-group">
								    <label class="font-weight-bold tit-size" for="exampleInputMiddleName">Middle Name</label>
								    <input type="text" class="form-control" name="mname" id="exampleInputMiddleName" placeholder="Middle">
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-5">
								<div class="form-group">
								    <label class="font-weight-bold tit-size" for="exampleInputLastName">Last Name<span style="color:#FF346B">*</span></label>
								    <input type="text" class="form-control" name="lname" id="exampleInputLastName" placeholder="Last Name">
								    <span class="error1"><?php echo $lname_error; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-6 col-lg-5">
								<div class="form-group">
								    <label class="font-weight-bold tit-size" for="exampleInputPassword1">Email:<span style="color:#FF346B">*</span></label>
								    <input type="text" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email">
								    <span class="error1"><?php echo $email_error; ?></span>
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-5">
								<div class="form-group">
								    <label class="font-weight-bold tit-size" for="exampleInputPassword1">Phone#<span style="color:#FF346B">*</span></label>
								    <input type="text" class="form-control" name="phone" id="exampleInputPassword1" placeholder="Phone">
								    <span class="error1"><?php echo $phone_error; ?></span>
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-2">
								<div class="form-group">
								    <label class="font-weight-bold tit-size" for="exampleInputPassword1">NPI#<span style="color:#FF346B">*</span></label>
								    <input type="text" class="form-control" name="npi" id="exampleInputPassword1" placeholder="NPI">
								    <span class="error1"><?php echo $npi_error; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
								    <label class="font-weight-bold tit-size" for="exampleFormControlTextarea1">Specialties</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="checkbox" name="specialits1" id="inlineCheckbox1" value="Internal Medicine">
								  <label class="form-check-label tit-size" for="inlineCheckbox1">Internal Medicine</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="checkbox" name="specialits2" id="inlineCheckbox2" value=" Family Medicine">
								  <label class="form-check-label tit-size" for="inlineCheckbox2">Family Medicine</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="checkbox" name="specialits3" id="inlineCheckbox3" value=" Emergency Medicine">
								  <label class="form-check-label tit-size" for="inlineCheckbox3">Emergency Medicine</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="checkbox" name="specialit4" id="inlineCheckbox4" value=" Pediatrics">
								  <label class="form-check-label tit-size" for="inlineCheckbox4">Pediatrics</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
								    <label class="font-weight-bold tit-size" for="exampleFormControlTextarea1">Message</label>
								    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
								  </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
								    <label class="font-weight-bold tit-size" for="form-field-field_45fd579">State of Licensure<span style="color:#FF346B">*</span></label>
								  <select name="selectone" id="form-field-field_45fd579" class="elementor-field-textual elementor-size-xs select-form-size" required="required" aria-required="true" multiple="" size="4">
									<option value="Alabama">Alabama</option>
									<option value="Alaska">Alaska</option>
									<option value="Arizona">Arizona</option>
									<option value="Arkansas">Arkansas</option>
									<option value="California">California</option>
									<option value="Colorado">Colorado</option>
									<option value="Connecticut">Connecticut</option>
									<option value="Delaware">Delaware</option>
									<option value="Florida">Florida</option>
									<option value="Georgia">Georgia</option>
									<option value="Hawaii">Hawaii</option>
									<option value="Idaho">Idaho</option>
									<option value="Illinois">Illinois</option>
									<option value="Indiana">Indiana</option>
									<option value="Iowa">Iowa</option>
									<option value="Kansas">Kansas</option>
									<option value="Kentucky">Kentucky</option>
									<option value="Louisiana">Louisiana</option>
									<option value="Maine">Maine</option>
									<option value="Maryland">Maryland</option>
									<option value="Massachusetts">Massachusetts</option>
									<option value="Michigan">Michigan</option>
									<option value="Minnesota">Minnesota</option>
									<option value="Mississippi">Mississippi</option>
									<option value="Missouri">Missouri</option>
									<option value="Montana">Montana</option>
									<option value="Nebraska">Nebraska</option>
									<option value="Nevada">Nevada</option>
									<option value="New Hampshire">New Hampshire</option>
									<option value="New Jersey">New Jersey</option>
									<option value="New Mexico">New Mexico</option>
									<option value="New York">New York</option>
									<option value="North Carolina">North Carolina</option>
									<option value="North Dakota">North Dakota</option>
									<option value="Ohio">Ohio</option>
									<option value="Oklahoma">Oklahoma</option>
									<option value="Oregon">Oregon</option>
									<option value="Pennsylvania">Pennsylvania</option>
									<option value="Rhode Island">Rhode Island</option>
									<option value="South Carolina">South Carolina</option>
									<option value="South Dakota">South Dakota</option>
									<option value="Tennessee">Tennessee</option>
									<option value="Texas">Texas</option>
									<option value="Utah">Utah</option>
									<option value="Vermont">Vermont</option>
									<option value="Virginia">Virginia</option>
									<option value="Washington">Washington</option>
									<option value="West Virginia">West Virginia</option>
									<option value="Wisconsin">Wisconsin</option>
									<option value="Wyoming">Wyoming</option>
									<option value=""></option>			
								</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<button class="btn btn-primary submit-button-bottom" name="submit">Submit<i class="fa fa-arrow-circle-o-right btton-icon"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="main-body-prome2">
	<div class="container-fluid">
		<div class="container padding-tab-zero padding-zero-all">
			<div class="row">
				<div class="col-sm-12 body-prome-bottom1 padding-zero-all">
				     <h1 class="second-til-home" >Frequently Asked<span class="how-span"> Questions</span></h1>
				</div>
			</div>
			<div class="row accordian-home ">
				<div class="col-sm-12 col-md-12 col-lg-12 padding-tab-zero padding-zero-all">
					<div class="col-sm-12 col-md-12 col-lg-6 body-prome2">
						<img class="how-image" src="images/confident-businesswoman-working-on-laptop-TBFXM64-2.jpg" alt="">
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6 body-prome2 tab-accor">
						<div id="accordion">
						  <div class="card">
						    <div class="card-header home-accor-2" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link tab-but-new" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          What is United TeleDoc Medical Group? 
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						      <div class="card-body">
						        <p class="home-accor-p">United TeleDoc Group is a world-class virtual medical practice with board-certified and state-licensed providers across numerous specialties including internal medical, family medicine, dermatology and behavioral health. </p>
						      </div>
						    </div>
						  </div>
						  <div class="card">
						    <div class="card-header home-accor-2" id="headingTwo">
						      <h5 class="mb-0">
						        <button class="btn btn-link tab-but-new collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Is it a full time/Part time job?
						        </button>
						      </h5>
						    </div>
						    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						      <div class="card-body">
						       <p class="home-accor-p">Each provider is hired as a contract employee through United TeleDoc Group and is not a full-time employee. All contract employees receive a 1099 annually. </p>
						      </div>
						    </div>
						  </div>
						  <div class="card">
						    <div class="card-header home-accor-2" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link tab-but-new collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Does group offer medical malpractice insurance?
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						      <div class="card-body">
						        <p class="home-accor-p">Yes. United Teldoc Medical Group offers coverage up to $1 million per incident. This insurance is provided free of charge.</p>
						      </div>
						    </div>
						  </div>
						  <div class="card">
						    <div class="card-header home-accor-2" id="headingFour">
						      <h5 class="mb-0">
						        <button class="btn btn-link tab-but-new collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
						         Who is eligible to join the United TeleDoc?
						        </button>
						      </h5>
						    </div>
						    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
						      <div class="card-body">
						        <p class="home-accor-p">We require physicians with board-certifications in internal medicine, pediatrics, emergency medicine, and family medicine, who are committed to high-quality virtual care to join our Telemedicine practice team.</p>
						      </div>
						    </div>
						  </div>
						  <div class="card">
						    <div class="card-header home-accor-2" id="headingFive">
						      <h5 class="mb-0">
						        <button class="btn btn-link tab-but-new collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
						          What types of training United TeleDoc offer?
						        </button>
						      </h5>
						    </div>
						    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
						      <div class="card-body">
						        <p class="home-accor-p">Our physician ambassadors will help you to complete platform training before to start taking cases.</p>
						      </div>
						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

<?php include 'inc/footer.php' ?>
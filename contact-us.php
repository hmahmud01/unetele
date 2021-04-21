<?php  
// define variables and set empty values
$name_error = $lname_error = $email_error = $phone_error = $dept_error = $message_error = "";
$fname = $lname = $email = $phone = $dept = $message = $msg ="";

	if(isset($_POST['submit'])) {
		
	$first_name = $_POST['fname'];
	$last_name = $_POST['lname'];
	$email_id = $_POST['email'];
	$contact = $_POST['phone'];
	$department = $_POST['dept'];
	$message = $_POST['message'];
	if($first_name=='' || $last_name=='' || $email_id=='' || $contact=='' || $department=='' || $message==''){
		echo "";
	} else {

	$from       = "Untele doc";
	$webmaster  = "info@unteledoc.com"; //It's web master mail info@example.com
	$to         = "info@unteledoc.com"; // where you want to get mail 
	$subject    = "New Message from 'Contact us'";

	$headers    = "From: " . $from . "<" . $webmaster . ">\r\n";
	$headers    .= "X-Mailer: PHP/" . phpversion() . "\r\n";
	$headers    .= "MIME-Version: 1.0" . "\r\n";
	$headers    .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = "<html><body>";
	$message .= "<p><b>First Name :</b>".$_POST['fname']  ."</p>";
	$message .= "<p><b>Last Name :</b>".$_POST['lname']  ."</p>";
	$message .= "<p><b>Email : </b>". $_POST['email'] ."</p>";
	$message .= "<p><b>Phone : </b>". $_POST['phone'] ."</p>";
	$message .= "<p><b>Department : </b>". $_POST['dept'] ."</p>";
	$message .= "<p><b>Message :</b>".$_POST['message']."</p>";
	$message .= "</body></html>";

	$sendmail = mail($to, $subject, $message, $headers);

	echo $msg="Message Successfully done";
	echo "<script>window.open('contact-us.php?sent=Your Form Has been Submited','_self')</script>";
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
	if (empty($_POST['dept'])) {
		$dept_error = "Name is required";
	}else{
		$dept = test_input($_POST['dept']);
		if (!preg_match("/^[a-zA-Z ]*$/", $dept)) {
			$dept_error = "Only letters and white space allowed";
		}
	}
	if (empty($_POST['message'])) {
		$message = "";
	}else{
		$message = test_input($_POST['message']);
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
<div class="container-fluid contact-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<p class="contact-head-text">Contact us</p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid contact-middle-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6">
				<p class="contact-head-title">Customer Service</p>
				<p class="contact-text">We’d love to answer any questions you may have. Please feel free to give us a call and one of our support team members will gladly assist you.</p>
				<div class="row call-us-toll-section">
					<div class="col-sm-6 col-md-6">
						<h2 class="toll-title">Call us -Local</h2>
						<p class="call-us-toll">+1 239 330 4915</p>
					</div>
					<div class="col-sm-6 col-md-6">
						<h2 class="toll-title">Call us -Toll free</h2>
						<p class="call-us-toll">+1 866 809 2896</p>
					</div>
				</div>
				<span class="call-divider"></span>
				<p class="contact-head-title">Send Us a Message</p>
				<p class="contact-text">Can’t find what you need here? Just send us a message explaining how we can help and our team will get back to you right away.</p>
				<div class="form-section">
					<!-- <div class="message">
						<?php echo $msg;?>
					</div> -->
					<form method="POST" action="<?=$_SERVER['PHP_SELF']; ?>">
						<div class="form-group">
					    	<input type="text" class="form-control form-focus-style" id="" placeholder="First Name" name="fname" tabindex="1">
					    	<span class="error1"><?php echo $name_error; ?></span>
					  	</div>
					  	<div class="form-group">
					    	<input type="text" class="form-control form-focus-style" id="" placeholder="Last Name" name="lname">
					    	<span class="error1"><?php echo $lname_error; ?></span>
					  	</div>
					  	<div class="form-group">
					    	<input type="email" class="form-control form-focus-style col-sm-6 float-left" id="" placeholder="Enter Your Email" name="email">
					    	<input type="text" class="form-control form-focus-style col-sm-6" id="" placeholder="Enter Your Phone Number" name="phone">
					    	<span class="error1 col-sm-6 float-left"><?php echo $email_error; ?></span><span class="error1 col-sm-6"><?php echo $phone_error; ?></span>
					  	</div>
					  	<div class="form-group">
					    	<select class="form-control form-focus-style" id="dept" name="dept">
								<option>Select Your Department</option>
								<option>Accounting</option>
								<option>Customer Service</option>
								<option>General Inquiry</option>
								<option>Marketing</option>
								<option>Media Relations</option>
								<option>IT Supports</option>
								<option>Sales</option>
							</select>
							<span class="error1"><?php echo $dept_error; ?></span>
					  	</div>
					  	<div class="form-group">
					    	<textarea type="text" class="form-control form-focus-style" id="" placeholder="Write Your Message" name="message" rows="4"></textarea>
					    	<span class="error1"><?php echo $message_error; ?></span>
					  	</div>
					  	<button type="submit" class="btn btn-primary btn-lg" aria-pressed="true" name="submit">Send Message</button>
					  	<div>
					  	    <?php echo $msg;?>
					  	</div>
					</form>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="headquater-section">
					<h2 class="contact-headquater-title">Headquarters</h2>
					<ul style="padding: 0px;">
						<li style="list-style: none;">Florida</li>
						<li style="list-style: none;">2231 DEL PRADO BLVD S</li>
						<li style="list-style: none;">CAPE CORAL, FL 33990</li>
						<li style="list-style: none;">Monday – Friday, 9:30 am – 5:30 pm.</li>
					</ul>
					<div class="headquater-maps">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26360909.888257857!2d-113.7487596447871!3d36.24229940962353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sus!4v1613807110372!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'inc/footer.php' ?>
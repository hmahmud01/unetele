<?php session_start();?>
<?php  require 'db.php';

	if (isset($_POST['username']) && isset($_POST['password'])) {
		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$uname = validate($_POST['username']);
		$pass = validate($_POST['password']);

		if (empty($uname)) {
			header("Location:index.php?error=User Name is Required");
			exit();
		}elseif (empty($pass)) {
			header("Location:index.php?error=Password is Required");
			exit();
		}else{
			$sql="SELECT * FROM tbl_admin WHERE username = '$uname' AND password = '$pass'";
			$result = mysqli_query($con,$sql);
			if (mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);

				if ($row['username'] === $uname && $row['password'] === $pass) {
					$_SESSION['username'] = $row['username'];
					$_SESSION['id'] = $row['id'];
					header("Location:user-dashboard.php?");
					exit();
				}else{
					header("Location:index.php?error=Incorect User or Password");
					exit();
				}
			}else{
				header("Location:index.php?error=Incorect User or Password");
				exit();
			}
		}

	}else{
		header("Location:index.php");
		exit();
	}

?>
<?php include '../config/config.php';?>






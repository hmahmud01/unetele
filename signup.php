
<?php
error_reporting(0);
session_start();
    include 'admin/db.php';

    if (isset($_POST['signup'])) {
        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        $image = 'images/'.$_FILES['image']['name'];

        if (preg_match("!image!", $_FILES['image']['type'])) {
            if (copy($_FILES['image']['tmp_name'], $image)) {
               $_SESSION['image']=$image;
            }
        }

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $emailquery = "SELECT * FROM signup WHERE $email='$email'";
        $result = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($result);
        if ($emailcount>0) {
            echo "Email Already Exists";
        }else{
            if ($password === $cpassword) {
                $sql = "INSERT INTO signup(firstname, lastname, email, phone, password,cpassword,image) VALUES ('$firstname','$lastname','$email','$phone','$password','$cpassword','$image')";

                    $query = mysqli_query($con,$sql);
                    if ($query == 1) {?>
                        <script>
                        alert("New Data Created") ;
                        </script>
                        <?php
                    }else{
                        echo "Not Created!";
                    }
            }else{
                echo "Password are not matching";
            }
        }

        


    }


?>

<?php include 'inc/header.php'; ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>Registration Form</h4>
                <form action="signup.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="firstname" class="col-sm-4 col-form-label"><b>First Name</b></label>
                        <div class="col-sm-8">
                          <input type="text" name="firstname" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname" class="col-sm-4 col-form-label"><b>Last Nane</b></label>
                        <div class="col-sm-8">
                          <input type="text" name="lastname" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label"><b>E-mail</b></label>
                        <div class="col-sm-8">
                          <input type="text" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-4 col-form-label"><b>Phone Number</b></label>
                        <div class="col-sm-8">
                          <input type="text" name="phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label"><b>Password</b></label>
                        <div class="col-sm-8">
                          <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cpassword" class="col-sm-4 col-form-label"><b>Confirm Password</b></label>
                        <div class="col-sm-8">
                          <input type="password" name="cpassword" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="file" class="col-sm-4 col-form-label"><b>Example file input</b></label>
                        <div class="col-sm-8">
                          <input type="file" name="image" class="form-control-file">
                        </div>
                    </div>
                    <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
<?php 
session_start();
 ?>
<?php include "../config/config.php"; ?>
<?php include "../lib/Database.php"; ?>
<?php
$db = new Database();
?>

<?php
class format{
public function validation($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
}
$fm = new format();
?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:50:31 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>BangoDash Bootstrap  Admin Template</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body>
 <!-- Start wrapper-->
 <div id="wrapper">
	<div class="card card-primary card-authentication1 mx-auto my-5 animated bounceInDown">
		<div class="card-body">
		 <div class="card-content p-2">
		  <div class="card-title text-uppercase text-center pb-2">Sign In</div>


<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $fm->validation($_POST['email']);
	$password = $fm->validation($_POST['password']);

	$email = mysqli_real_escape_string($db->link, $email);
	$password = mysqli_real_escape_string($db->link, $password);

	$query = "SELECT * FROM tbl_user WHERE email='$email' AND pass='$password'";

	$result = $db->select($query);

if ($result == true) {
	$_SESSION['email'] = $email;

$query = "select * from tbl_user where email='$email'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
if ($result['verifystatus'] == 'Y') {
	//header("location:../index.php");
	 echo '<script>window.location = "../index.php"</script> ';
} else {
	//header("location:mailverify.php?email=".$email);
    echo '<script>window.location = "mailverify.php?email="'.$email.'"</script> ';

}
}
	

}
} else {
		echo "<div class='alert alert-danger'>"."Email & Password Doesn't be matched "."</div>";
	}


}

?>
		    <form action="signin.php" method="post">
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputUsername" class="sr-only">Email Address</label>
				  <input name="email" type="email" id="exampleInputUsername" class="form-control form-control-rounded" placeholder="Email Address">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputPassword" class="sr-only">Password</label>
				  <input name="password" type="password" id="exampleInputPassword" class="form-control form-control-rounded" placeholder="Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>


			  <button style="margin-bottom: 20px;" type="submit" class="btn btn-primary shadow-primary btn-block waves-effect waves-light">Sign In</button>

			<div class="form-row mr-0 ml-0">

			 <div class="form-group col-6 text-right">
			  <a href="reset-password.php">Forget Password</a>
			 </div>
			</div>

			  <div class="text-center pt-3">
				<hr>
				<p class="text-muted">Do not have an account? <a href="signup.php"> Sign Up here</a></p>
			  </div>
			 </form>
		   </div>
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- waves effect js -->
  <script src="assets/js/waves.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
	
</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:50:31 GMT -->
</html>

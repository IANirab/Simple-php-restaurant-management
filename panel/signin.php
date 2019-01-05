<?php include "../lib/session.php"; ?>
<?php 
session::init();
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

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signin2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:50:31 GMT -->
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
	   <div class="card-authentication2 mx-auto my-5">
	    <div class="card-group shadow-lg">

	    	<div class="card mb-0">
	    		<div class="card-body">
	    			<div class="card-content p-3">
					 <div class="card-title text-uppercase text-center pb-3">Sign In</div>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $fm->validation($_POST['email']);
	$password = $fm->validation($_POST['password']);

	$email = mysqli_real_escape_string($db->link, $email);
	$password = mysqli_real_escape_string($db->link, $password);

	$query = "SELECT * FROM tbl_admin WHERE email='$email' AND pass='$password'";

	$result = $db->select($query);

	if ($result != false) {
		$value = mysqli_fetch_array($result);
		$row = mysqli_num_rows($result);
		if ($row > 0) {
			session::set("login", true);
			session::set("email", $value['email']);
			session::set("id", $value['id']);
			//header("location:index.php");
			echo '<script> window.location = "index.php";</script>';
		} else {
			echo "No Result Found !!";
		}
	} else {
		echo "<div class='alert alert-danger alert-dismissible' role='alert'>
           <button type='button' class='close' data-dismiss='alert'>×</button>
            <div class='alert-icon contrast-alert'>
           <i class='icon-close'></i>
            </div>
            <div class='alert-message'>
              <span> Email & Password Didn't Matched !! </span>
            </div>
                  </div>";
	}


}

?>
					   <form action="signin.php" method="post">
						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							   <label for="exampleInputUsername" class="sr-only">Username</label>
								 <input name="email" type="text" id="exampleInputUsername" class="form-control" placeholder="Email Address">
								 <div class="form-control-position">
									<i class="icon-user"></i>
								</div>
						   </div>
						  </div>
						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							  <label for="exampleInputPassword" class="sr-only">Password</label>
							  <input type="password" name="password" id="exampleInputPassword" class="form-control" placeholder="Password">
							  <div class="form-control-position">
								  <i class="icon-lock"></i>
							  </div>
						   </div>
						  </div>
						<button type="submit" class="btn btn-primary shadow-primary btn-block waves-effect waves-light">Sign In</button>
					</form>
				 </div>
				</div>
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

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signin2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:50:31 GMT -->
</html>

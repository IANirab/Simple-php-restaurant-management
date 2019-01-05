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

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:50:31 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>BangoDash Bootstrap  Admin Template</title>
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
		  <div class="card-title text-uppercase text-center pb-2">Forget Password</div>
		    <p class="text-center pb-2">Please enter your email address. You will receive Your password via email.</p>






<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];


$query = "select * from tbl_user where email='$email'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){

   	require 'phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer();

	$mail->Host='smtp.gmail.com';
	$mail->Port='587';
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';

	  $id1=1;
  $query1 = "select * from tbl_sentmail where id='$id1'";
  $post1 = $db->select($query1);
            if($post1){
                while($result1 = $post1->fetch_assoc()){
    $mail1 = $result1['email'];
    $pass1 = $result1['password'];

	$mail->Username=$mail1;
	$mail->Password=$pass1;

}
}



	//$mail->isSMTP();
	$mail->setFrom($result['email'],$result['name']);
	$mail->addAddress($result['email']);
	$mail->addReplyTo($result['email'],$result['name']);




	$mail->isHTML(true);
	$mail->Subject=' Forget Passsword';
	$mail->Body= "Your Password is ".$result['pass'];

	if ($mail->send()) {
		$result1="Message Sent Successfully";
	} else {
		$result1= "Try Again !! Message Not Sent";
	}




 }

	<div class="alert alert-light-success alert-dismissible alert-round" role="alert">
				   <button type="button" class="close" data-dismiss="alert">×</button>
				    <div class="alert-icon contrast-alert">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span> Check Your MailBox . We send Your Password By Mail !!</span>
				    </div>
    </div>


} else {
echo '
	<div class="alert alert-light-danger alert-dismissible alert-round" role="alert">
				   <button type="button" class="close" data-dismiss="alert">×</button>
				    <div class="alert-icon contrast-alert">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span> Email is not matched !!</span>
				    </div>
    </div>
';

}
}
?>






		    <form action="" method="post">
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputEmailAddress" class="sr-only">Email Address</label>
				  <input type="text" name="email" id="exampleInputEmailAddress" class="form-control form-control-rounded" placeholder="Email Address">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>
			 
			  <button type="submit" class="btn btn-primary btn-round btn-block waves-effect waves-light mt-3">Reset Password</button>
			  <div class="text-center pt-3">
				<hr>
				<p class="text-muted">Return to the <a href="signin.php"> Sign In</a></p>
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

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:50:31 GMT -->
</html>

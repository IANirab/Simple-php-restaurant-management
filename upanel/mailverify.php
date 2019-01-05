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
		  <div class="card-title text-uppercase text-center pb-2">Mail Verification</div>
		    <p class="text-center pb-2">Please enter your email address. You will receive a Verification Code</p>


    <?php
        if (isset($_POST['Verify'])) {
            $title = $_REQUEST['code'];
            $author = $_REQUEST['value'];
            $email = $_GET['email'];


			$query = "SELECT * FROM tbl_user WHERE email='$email' AND verifyid='$title'";
			$result = $db->select($query);
			if ($result) {







            if (empty($title) || empty($author)) {
                echo '<div class="alert alert-light-danger alert-dismissible alert-round" role="alert">
				   <button type="button" class="close" data-dismiss="alert">×</button>
				    <div class="alert-icon contrast-alert">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span> Field is Required !!</span>
				    </div>
                  </div>';
            }

            $title  =  mysqli_real_escape_string($db->link,$_POST['code']);
            $author =  mysqli_real_escape_string($db->link,$_POST['value']);
            
            
            
            if($title ==''){
                $error = "Field Must not Be Empty";
            }else{
            	$id = $_GET['email'];
                $query = "UPDATE tbl_user
                SET
                verifystatus   = '$author'
                WHERE email = '$id'";
                $create = $db->update($query);
                if ($create) {


require 'phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer();

  $mail->Host='smtp.gmail.com';
  $mail->Port='587';
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='tls';
  $mail->Username='kingb5861@gmail.com';
  $mail->Password='01712611078';



  $mail->isSMTP();
  $mail->setFrom('kingb5861@gmail.com');
  $mail->addAddress($_GET['email']);
  $mail->addReplyTo('kingb5861@gmail.com');


  $mail->isHTML(true);
  $mail->Subject=' Verify Your Mail ';
  $mail->Body= 'Your Mail Verification is Successfully Done !!';

  if ($mail->send()) {
    $result1="Message Sent Successfully";
  } else {
    $result1= "Try Again !! Message Not Sent";
  }


                	header("location:signin.php");
                	echo "<div class='alert alert-success'>"."Account Created Successfully!! Now Go back & Login"."</div>";
                }
            }
			   

			} else {

echo '<div class="alert alert-light-danger alert-dismissible alert-round" role="alert">
				   <button type="button" class="close" data-dismiss="alert">×</button>
				    <div class="alert-icon contrast-alert">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span> Wrong Code !!Try Again </span>
				    </div>
                  </div>';


        }
    }
        ?>


		    <form action="" method="post">
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputEmailAddress" class="sr-only"> Verification Code</label>
				  <input type="text" id="exampleInputEmailAddress" name="code" class="form-control form-control-rounded" placeholder=" Verification Code Here ">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>
			 <input type="hidden" value="Y" name="value">
			  <button type="submit" name="Verify" class="btn btn-primary btn-round btn-block waves-effect waves-light mt-3"> Verify</button>
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

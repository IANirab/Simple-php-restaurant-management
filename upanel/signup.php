<script>
    alert('Sorry to say, Registration System is currently Disabled By Admin !!');
    window.location.href='../index.php';
</script>
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

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:50:31 GMT -->
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
		  <div class="card-title text-uppercase text-center pb-2">Sign Up</div>


    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_REQUEST['name'];
            $author = $_REQUEST['email'];
            $body1 = $_REQUEST['pass'];
            $contact = $_REQUEST['contact'];
            $address = $_REQUEST['address'];
             $zip = $_REQUEST['zip'];


			$query = "SELECT * FROM tbl_user WHERE email='$author'";
			$result = $db->select($query);
			if ($result) {
				   echo '<div class="alert alert-light-danger alert-dismissible alert-round" role="alert">
				   <button type="button" class="close" data-dismiss="alert">×</button>
				    <div class="alert-icon contrast-alert">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span> Email Already Exits !!</span>
				    </div>
                  </div>';

			}else {


            if (empty($title) || empty($author) || empty($body1) || empty($contact) || empty($address) || empty($zip)) {
                echo '<div class="alert alert-light-danger alert-dismissible alert-round" role="alert">
				   <button type="button" class="close" data-dismiss="alert">×</button>
				    <div class="alert-icon contrast-alert">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span> All Fields Are Required !!</span>
				    </div>
                  </div>';
            }

            $title  =  mysqli_real_escape_string($db->link,$_POST['name']);
            $author =  mysqli_real_escape_string($db->link,$_POST['email']);
            $body1  =  mysqli_real_escape_string($db->link,$_POST['pass']);
            $contact =  mysqli_real_escape_string($db->link,$_POST['contact']);
            $address  =  mysqli_real_escape_string($db->link,$_POST['address']);
            $verify  =  mysqli_real_escape_string($db->link,$_POST['verify']);
            $zip  =  mysqli_real_escape_string($db->link,$_POST['zip']);
            
            
            if($body1 ==''){
                $error = "Field Must not Be Empty";
            }else{
            $query = "INSERT INTO tbl_user(name,email,pass,phone,address,verifyid,zip) VALUES('$title','$author','$body1','$contact','$address','$verify','$zip')";
            $create = $db->update($query);
            if ($create) {





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
  $id1=1;
  $query1 = "select * from tbl_sentmail where id='$id1'";
  $post1 = $db->select($query1);
            if($post1){
                while($result1 = $post1->fetch_assoc()){
    $mail1 = $result1['email'];
    $pass1 = $result1['password'];

  $mail->setFrom($mail1);
  $mail->addAddress($author);
  $mail->addReplyTo($mail1);
}
}

  $mail->isHTML(true);
  $mail->Subject=' Verify Your Mail ';
  $mail->Body= 'Your Mail Verification Code : '.$verify.'<br>';
  if ($mail->send()) {
    $result1="Message Sent Successfully";
  } else {
    $result1= "Try Again !! Message Not Sent";
  }








                	header("location:mailverify.php?email=$author");
                	echo "<div class='alert alert-success'>"."Account Created Successfully!! Now Go back & Login"."</div>";
                }
            }

        }
    }
        ?>




		    <form action="signup.php" method="post">
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputName" class="sr-only">Name</label>
				  <input name="name" type="text" id="exampleInputName" class="form-control form-control-rounded" placeholder="Name">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputEmailId" class="sr-only">Email ID</label>
				  <input name="email" type="text" id="exampleInputEmailId" class="form-control form-control-rounded" placeholder="Email Address">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputPassword" class="sr-only">Password</label>
				  <input name="pass" type="text" id="exampleInputPassword" class="form-control form-control-rounded" placeholder="Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
                    <input type="text" placeholder="Contact Number" name="contact" class="form-control form-control-rounded" id="input-21" required="">
                </div>

                <div class="form-group">
                    <input type="text" placeholder="Zip Code" name="zip" class="form-control form-control-rounded" id="input-21" required="">
                </div>

              <div class="form-group">
                <textarea class="form-control" rows="4" id="input-9" placeholder="Your Full Address" name="address" required=""></textarea>
              </div>
			<input type="hidden" value="<?php session_start(); echo session_id();?>" name="verify">
			 <button type="submit" class="btn btn-primary btn-round btn-block waves-effect waves-light">Sign Up</button>
			  <div class="text-center pt-3">
				<hr>
				<p class="text-muted">Already have an account? <a href="signin.php"> Sign In here</a></p>
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

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:50:31 GMT -->
</html>

<?php include "inc/header.php"; ?>

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">

<?php
$result1="";
if (isset($_GET['did'])) {
	require 'phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer();

	$mail->Host='smtp.gmail.com';
	$mail->Port='587';
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';
	$mail->Username='kingb5861@gmail.com';
	$mail->Password='01712611078';


$id = $_GET['did'];
$query = "select * from tbl_user WHERE id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){



	//$mail->isSMTP();
	$mail->setFrom($result['email'],$result['name']);
	$mail->addAddress($result['email']);
	$mail->addReplyTo($result['email'],$result['name']);

}
}


	$mail->isHTML(true);
	$mail->Subject='Account Suspension';
	$mail->Body= 'Your Account Have been Deleted For Wrong Causes !!';

	if ($mail->send()) {
		$result1="Message Sent Successfully";
	} else {
		$result1= "Try Again !! Message Not Sent";
	}

}
?>


<div class="container-fluid">

      <!--Start Dashboard Content-->
                    <?php
                    if (isset($_GET['did'])) {
                    $id=$_GET['did'];
                    $delquery = "delete from tbl_user where id='$id'";
                    $deldata = $db->delete($delquery);
                    if ($deldata) {
                    echo "
            <div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            <div class='alert-icon contrast-alert'>
           <i class='icon-check'></i>
            </div>
            <div class='alert-message'>
              <span><strong>Success!</strong>Removed Succesfully</span>
            </div>
                  </div>
                    ";
                    } else {
                        echo "
<div class='alert alert-danger alert-dismissible' role='alert'>
           <button type='button' class='close' data-dismiss='alert'>×</button>
            <div class='alert-icon contrast-alert'>
           <i class='icon-close'></i>
            </div>
            <div class='alert-message'>
              <span><strong>Danger!</strong> Operation Failed ! Try Again.</span>
            </div>
            </div>

                        ";
                    }
                    }
                    ?>








      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Total Users With Details </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Phone Number</th>
                        <th>Zip Code</th>
                        <th>Full Address</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>


<?php
$query = "select * from tbl_user where verifystatus='Y' order by id desc";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>

</div>
<tr>
                      <td><?php echo $result['id']; ?></td>
                      <td><?php echo $result['name']; ?></td>
                      <td><?php echo $result['email']; ?></td>
                      <td><?php echo $result['phone']; ?></td>
                      <td><?php echo $result['zip']; ?></td>
                      <td><?php echo $result['address']; ?></td>
                      <td><?php echo $result['pass']; ?></td>
                      <td>                      
<button type="button" class="btn btn-outline-danger waves-effect waves-light m-1" id="confirm-btn-alert<?php echo $result['id']; ?>"> <i class="fa fa-trash-o"></i></button>
   <script type="text/javascript">
$(document).ready(function() {
              $("#confirm-btn-alert<?php echo $result['id']; ?>").click(function(){

                  swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      swal("Poof! Succesfully Deleted!", {
                        icon: "success",
                      }).then(function() {
                            window.location.href = "?did=<?php echo $result['id']; ?>";
                            console.log('The Ok Button was clicked.');
                            });
                    } else {
                      swal("It is safe now!");
                    }
                  });
              });
});
</script>


</td>
</tr>
<?php } } ?>
                </tbody>
                <tfoot>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                </tfoot>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->      

  </div> 
       <!--End Dashboard Content-->
</div>







   
       <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  

   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  
  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- waves effect js -->
  <script src="assets/js/waves.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  
  <!-- Vector map JavaScript -->
  <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- Sparkline JS -->
  <script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
  <!-- Chart js -->
  <script src="assets/plugins/Chart.js/Chart.min.js"></script>
  <!-- Index js -->
  <script src="assets/js/index.js"></script>
  
  <script src="assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
  <script src="assets/plugins/alerts-boxes/js/sweet-alert-script.js"></script>


</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:24:05 GMT -->
</html>

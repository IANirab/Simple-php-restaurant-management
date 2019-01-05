<?php include "inc/header.php"; ?>


<style type="text/css">
	input#basic-input {
    width: 350px;
}
input[type="submit"] {
    width: 85px;
    height: 35px;
    background: #fc5b13;
    border: none;
    color: white;
    border-radius: 2px;
}
</style>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_REQUEST['name'];
            $phone = $_REQUEST['phone'];
            $pass = $_REQUEST['pass'];
            $address = $_REQUEST['address'];
            $zip = $_REQUEST['zip'];


            if (empty($name) || empty($phone) || empty($pass) || empty($address) || empty($zip)) {
                echo "
<div class='alert alert-danger alert-dismissible' role='alert'>
           <button type='button' class='close' data-dismiss='alert'>×</button>
            <div class='alert-icon contrast-alert'>
           <i class='icon-close'></i>
            </div>
            <div class='alert-message'>
              <span><strong>Danger!</strong> All Fields are Required</span>
            </div>
                  </div>
                ";
            } else {
                echo "
<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            <div class='alert-icon contrast-alert'>
           <i class='icon-check'></i>
            </div>
            <div class='alert-message'>
              <span><strong>Success!</strong> Updated Succesfully</span>
            </div>
                  </div>
                ";
            }

            $name  =  mysqli_real_escape_string($db->link,$_POST['name']);;
            $phone  =  mysqli_real_escape_string($db->link,$_POST['phone']);
            $pass  =  mysqli_real_escape_string($db->link,$_POST['pass']);
            $address  =  mysqli_real_escape_string($db->link,$_POST['address']);
            $zip  =  mysqli_real_escape_string($db->link,$_POST['zip']);
            
            
            if($name =='' || $pass =='' || $phone =='' || $address =='' || $zip ==''){
                $error = "Field Must not Be Empty";
            }else{
            	$id = $_SESSION['email'];
                $query = "UPDATE tbl_user
                SET
                zip = '$zip',
                phone = '$phone',
                name = '$name',
                pass   = '$pass',
                address  = '$address'
                WHERE email = '$id'";
                $create = $db->update($query);
            }

        }
?>


<?php
$id = $_SESSION['email'];
$query = "select * from tbl_user where email='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
<form action="" method="post" enctype="multipart/form-data">
<h3 align="center"> Account Settings </h3>
<hr>
<div style="padding: 15px;" class="alert alert-primary" role="alert">
  Notice : <br>
 Fill Your address with Zip-code where you can received your orders !!<br>
</div>


<label for="basic-textarea">Name</label>
<textarea rows="4" name="name" class="form-control" id="basic-textarea"><?php echo $result['name']; ?></textarea><br>

<label for="basic-textarea">Current Password</label>
<textarea rows="4" name="pass" class="form-control" id="basic-textarea"><?php echo $result['pass']; ?></textarea><br>
<br>

<label for="basic-textarea">Your Phone</label>
<textarea rows="4" name="phone" class="form-control" id="basic-textarea"><?php echo $result['phone']; ?></textarea><br>
<br>

<label for="basic-textarea">Zip Code</label>
<textarea rows="4" name="zip" class="form-control" id="basic-textarea"><?php echo $result['zip']; ?></textarea><br>
<br>

<label for="basic-textarea">Your Address</label>
<textarea rows="4" name="address" class="form-control" id="basic-textarea"><?php echo $result['address']; ?></textarea><br>
<br>
<?php } } ?>
<input type="submit" value="Update" name="submit">
</form>











 </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->

	<!--End footer-->
   
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
  
</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:24:05 GMT -->
</html>

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
            $dishes = $_REQUEST['dishes'];
            $customers = $_REQUEST['customers'];
            $awards = $_REQUEST['awards'];
            $working_hours = $_REQUEST['working_hours'];




            if (empty($dishes) || empty($customers) || empty($awards) || empty($working_hours)) {
                echo "
          <div class='alert alert-danger alert-dismissible' role='alert'>
           <button type='button' class='close' data-dismiss='alert'>×</button>
            <div class='alert-icon contrast-alert'>
           <i class='icon-close'></i>
            </div>
            <div class='alert-message'>
              <span><strong>Danger!</strong> All Fields Are Required</span>
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
                  </div> ";
            }

            $dishes =  mysqli_real_escape_string($db->link,$_POST['dishes']);
            $customers  =  mysqli_real_escape_string($db->link,$_POST['customers']);
            $awards =  mysqli_real_escape_string($db->link,$_POST['awards']);
            $working_hours  =  mysqli_real_escape_string($db->link,$_POST['working_hours']);
            
            
            if($dishes =='' || $customers =='' || $awards =='' || $working_hours ==''){
                $error = "Field Must not Be Empty";
            }else{
            	$id = $_GET['id'];
                $query = "UPDATE tbl_counter
                SET
                dishes = '$dishes',
                customers   = '$customers',
                awards = '$awards',
                working_hours   = '$working_hours'
                WHERE id = '$id'";
                $create = $db->update($query);
            }

        }
        ?>


<?php
$id = $_GET['id'];
$query = "select * from tbl_counter where id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
<form action="" method="post" enctype="multipart/form-data">
<h3 align="center">--Edit Counter--</h3>
<hr>

<label for="basic-input">Dishes</label>
<input type="text" name="dishes" id="basic-input" value="<?php echo $result['dishes']; ?>" class="form-control">
<br>
<label for="basic-input">Customers</label>
<input type="text" name="customers" id="basic-input" value="<?php echo $result['customers']; ?>" class="form-control">
<br>
<label for="basic-input">Awards</label>
<input type="text" name="awards" id="basic-input" value="<?php echo $result['awards']; ?>" class="form-control">
<br>
<label for="basic-input">Working Hours</label>
<input type="text" name="working_hours" id="basic-input" value="<?php echo $result['working_hours']; ?>" class="form-control">
<br>
<?php } } ?>
<input type="submit" value="UPDATE" name="submit">
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

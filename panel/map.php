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


        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_temp = $_FILES['img']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
        $upload_img = "../assets/images/".$unique_img;


        move_uploaded_file($file_temp, $upload_img);




            if (empty($file_name)) {
                echo "
<div class='alert alert-danger alert-dismissible' role='alert'>
           <button type='button' class='close' data-dismiss='alert'>×</button>
            <div class='alert-icon contrast-alert'>
           <i class='icon-close'></i>
            </div>
            <div class='alert-message'>
              <span><strong>Danger!</strong> All Fields Are Required </span>
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
              <span><strong>Success!</strong> Removed Succesfully</span>
            </div>
            </div>
                ";
            }

            
            
            if($file_name ==''){
                $error = "Field Must not Be Empty";
            }else{
              $id=1;
                $query = "UPDATE tbl_map
                SET
                img = '$unique_img'
                WHERE id = '$id'";
                $create = $db->update($query);
            }
            }
        ?>



<form action="" method="post" enctype="multipart/form-data">

<h3 align="center">Add Feature</h3>
<hr>

<br>
    <label>Image</label><br>
    <input type="file" name="img"><br><br>
 <br>
<br>
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

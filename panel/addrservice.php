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
            $icon = $_REQUEST['icon'];
            $body = $_REQUEST['body'];
            $title = $_REQUEST['title'];
            $number = $_REQUEST['number'];




            if (empty($title) || empty($number) || empty($body)|| empty($icon)) {
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
				      <span><strong>Success!</strong> Created Succesfully</span>
				    </div>
                  </div>
                ";
            }

            $title  =  mysqli_real_escape_string($db->link,$_POST['title']);
            $icon =  mysqli_real_escape_string($db->link,$_POST['icon']);
            $body  =  mysqli_real_escape_string($db->link,$_POST['body']);
            $number =  mysqli_real_escape_string($db->link,$_POST['number']);
            
            
            if($title =='' || $body =='' || $icon =='' || $number ==''){
                $error = "Field Must not Be Empty";
            }else{
            	
                $query = "INSERT INTO tbl_rservices(title,body,number,icon) VALUES('$title','$body','$number','$icon')";
                $create = $db->update($query);

            }

        }
        ?>



<form action="" method="post" enctype="multipart/form-data">
<h3 align="center">Add - Service for Reservation Page</h3>
<hr>

<label for="basic-input">Icon</label>
<input type="text" name="icon" id="basic-input" class="form-control">
<br>
<label for="basic-input">Title</label>
<input type="text" name="title" id="basic-input" class="form-control">
<br>
<label for="basic-input">Body</label>
<textarea class="ckeditor" name="body"></textarea>
<br>
<label for="basic-input">Number</label>
<input type="number" name="number" id="basic-input" class="form-control">
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

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
    	<div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <div class="alert-icon contrast-alert">
           <i class="icon-check"></i>
            </div>
            <div class="alert-message">
              <span>Don't Use 'Http://' in 'Link' Field</span>
            </div>
		</div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $body = $_REQUEST['body'];
            $body2 = $_REQUEST['body2'];
            $price = $_REQUEST['price'];



        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_temp = $_FILES['img']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
        $upload_img = "../assets/images/slider/".$unique_img;


        move_uploaded_file($file_temp, $upload_img);




            if (empty($file_name) || empty($body) || empty($body2) || empty($price)) {
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


            $body  =  mysqli_real_escape_string($db->link,$_POST['body']);
            $body2  =  mysqli_real_escape_string($db->link,$_POST['body2']);
            $price  =  mysqli_real_escape_string($db->link,$_POST['price']);

            
            
            if($file_name =='' || $body =='' || $body2 =='' || $price ==''){
                $error = "Field Must not Be Empty";
            }else{
                $query = "INSERT INTO tbl_slider(title,body,img,link) VALUES('$body','$body2','$unique_img','$price')";
                $create = $db->update($query);
            }

        }
        ?>



<form action="" method="post" enctype="multipart/form-data">

<h3 align="center">Add Silde For Home Page</h3>
<hr>

<br>
    <label>Image</label><br>
    <input type="file" name="img"><br><br>


 <br>
<label for="basic-textarea">Title</label>
<textarea rows="4" name="body" class="form-control" id="basic-textarea"></textarea><br>
<label for="basic-textarea">Short Description</label>
<textarea rows="4" name="body2" class="form-control" id="basic-textarea"></textarea><br>
<label for="basic-input">Link</label>
<input type="text" name="price" id="basic-input" class="form-control">
<br>

<input type="submit" value="Creat" name="submit">
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

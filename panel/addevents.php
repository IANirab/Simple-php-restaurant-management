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
            $title = $_REQUEST['title'];
            $date = $_REQUEST['date'];
            $body = $_REQUEST['body'];
            $month = $_REQUEST['month'];
            $days = $_REQUEST['days'];
            $food = $_REQUEST['food'];
            $guests = $_REQUEST['guests'];
            $link = $_REQUEST['link'];


        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_temp = $_FILES['img']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
        $upload_img = "../assets/images/event/".$unique_img;


        move_uploaded_file($file_temp, $upload_img);




            if (empty($file_name) || empty($title) || empty($date) || empty($body) || empty($month) || empty($days) || empty($food) || empty($guests) || empty($link)) {
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
            $date =  mysqli_real_escape_string($db->link,$_POST['date']);
            $body  =  mysqli_real_escape_string($db->link,$_POST['body']);
            $month  =  mysqli_real_escape_string($db->link,$_POST['month']);
            $days =  mysqli_real_escape_string($db->link,$_POST['days']);
            $food  =  mysqli_real_escape_string($db->link,$_POST['food']);      
            $guests =  mysqli_real_escape_string($db->link,$_POST['guests']);
            $link  =  mysqli_real_escape_string($db->link,$_POST['link']);            
            
            if($file_name =='' || $title =='' || $date =='' || $body =='' || $month =='' || $days =='' || $food =='' || $guests =='' || $link ==''){
                $error = "Field Must not Be Empty";
            }else{
                $query = "INSERT INTO tbl_event(title,dates,body,link,img,day,food,guests,month) VALUES('$title','$date','$body','$link','$unique_img','$days','$food','$guests','$month')";
                $create = $db->update($query);
            }

        }
        ?>



<form action="" method="post" enctype="multipart/form-data">

<h3 align="center">Add Event</h3>
<hr>

<br>
    <label>Image</label><br>
    <input type="file" name="img"><br><br>
 <br>

<label for="basic-textarea">Title</label>
<textarea rows="4" name="title" class="form-control" id="basic-textarea"></textarea><br>
<br>

<label for="basic-textarea">Body</label>
<textarea rows="4" name="body" class="form-control" id="basic-textarea"></textarea><br>
<br>

<label for="basic-input">Date</label>
<input type="number" placeholder="1-30" name="date" id="basic-input" class="form-control">
<br>

<label for="basic-input">Month</label>
<input type="text" name="month" placeholder="June" id="basic-input" class="form-control">
<br>

<label for="basic-input">Days</label>
<input type="number" name="days" id="basic-input" class="form-control">
<br>

<label for="basic-input">Food</label>
<input type="number" name="food" id="basic-input" class="form-control">
<br>

<label for="basic-input">Guests</label>
<input type="text" name="guests" id="basic-input" class="form-control">
<br>

<label for="basic-textarea">Link</label>
<textarea rows="4" placeholder="Don't Use 'http://' " name="link" class="form-control" id="basic-textarea"></textarea><br>
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

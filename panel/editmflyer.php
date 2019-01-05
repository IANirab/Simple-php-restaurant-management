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
            $author = $_REQUEST['author'];


        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_temp = $_FILES['img']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
        $upload_img = "../assets/images/background/".$unique_img;


        move_uploaded_file($file_temp, $upload_img);




        $file_name1 = $_FILES['img1']['name'];
        $file_size1 = $_FILES['img1']['size'];
        $file_temp1 = $_FILES['img1']['tmp_name'];

        $div1 = explode('.', $file_name1);
        $file_ext1 = strtolower(end($div1));
        $unique_img1 = substr(md5(time()), 0, 10).'.'.$file_ext1;
        $upload_img1 = "../assets/images/background/".$unique_img1;


        move_uploaded_file($file_temp1, $upload_img1);



        $file_name2 = $_FILES['img2']['name'];
        $file_size2 = $_FILES['img2']['size'];
        $file_temp2 = $_FILES['img2']['tmp_name'];

        $div2 = explode('.', $file_name2);
        $file_ext2 = strtolower(end($div2));
        $unique_img2 = substr(md5(time()), 0, 10).'.'.$file_ext2;
        $upload_img2 = "../assets/images/background/".$unique_img2;


        move_uploaded_file($file_temp2, $upload_img2);




            if (empty($file_name) || empty($title) || empty($author) || empty($file_name1) || empty($file_name2)) {
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

            $title  =  mysqli_real_escape_string($db->link,$_POST['title']);
            $author =  mysqli_real_escape_string($db->link,$_POST['author']);
            
            
            if($file_name =='' || $title =='' || $author =='' || $file_name1 =='' || $file_name2 ==''){
                $error = "Field Must not Be Empty";
            }else{
            	$id = $_GET['id'];
                $query = "UPDATE tbl_mflyer
                SET
                img1 = '$unique_img',
                img2 = '$unique_img1',
                img3 = '$unique_img2',
                name   = '$title',
                link   = '$author'
                WHERE id = '$id'";
                $create = $db->update($query);
            }

        }
        ?>


<?php
$id = 1;
$query = "select * from tbl_mflyer where id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
<form action="" method="post" enctype="multipart/form-data">
<h3 align="center">Edit Menu's Flyer</h3>
<hr>

    <label>Background</label><br>
    <input type="file" name="img"><br><br>
 <br>
     <label>Image - 1</label><br>
    <input type="file" name="img1"><br><br>
 <br>
     <label>Image - 2</label><br>
    <input type="file" name="img2"><br><br>
 <br>

<label for="basic-textarea">Title</label>
<textarea rows="4" name="title" class="ckeditor" id="basic-textarea"><?php echo $result['name']; ?></textarea><br>
<label for="basic-input">Link</label>
<input type="text" name="author" id="basic-input" value="<?php echo $result['link']; ?>" class="form-control">
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

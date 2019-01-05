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
            $title = $_REQUEST['title'];
            $author = $_REQUEST['author'];
            $body1 = $_REQUEST['body1'];
            $tag = $_REQUEST['tag'];
            $cat = $_REQUEST['cat'];





        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_temp = $_FILES['img']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
        $upload_img = "../assets/images/blog/".$unique_img;








            if (empty($title) || empty($author) || empty($body1) || empty($tag) || empty($cat) || empty($file_name)) {
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
            $author =  mysqli_real_escape_string($db->link,$_POST['author']);
            $body1  =  mysqli_real_escape_string($db->link,$_POST['body1']);
            $tag  =  mysqli_real_escape_string($db->link,$_POST['tag']);
            $cat  =  mysqli_real_escape_string($db->link,$_POST['cat']);
            
            
            if($body1 ==''){
                $error = "Field Must not Be Empty";
            }else{
                $query = "INSERT INTO tbl_post(title,cat,author,body,tag,img) VALUES('$title','$cat','$author','$body1','$tag','$unique_img')";
                $create = $db->update($query);
            }

        }
        ?>



<form action="addpost1.php" method="post" enctype="multipart/form-data">

<h3 align="center">Add Post</h3>
<hr>
<label for="custom-select">SELECT CATEGORY</label> 
  <select class="form-control" name="cat" id="custom-select">
<?php
$id = $_GET['id'];
$query = "select * from tbl_category";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
    <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
<?php } } ?>
    
 </select>
 <br>
<label>Image</label><br>
<input type="file" name="img">
<br>
<br>
<label for="basic-input">Title</label>
<input type="text" name="title" id="basic-input" class="form-control">
<br>
<label for="basic-input">Author</label>
<input type="text" name="author" id="basic-input" class="form-control">
<br>
<label for="basic-textarea">Body</label>
<textarea class="ckeditor" name="body1"></textarea><br>



<label for="basic-input">Tags</label>
<input type="text" name="tag" name="cat" id="basic-input" class="form-control">
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

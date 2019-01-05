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
            $body = $_REQUEST['body'];
            $body2 = $_REQUEST['body2'];

            $price = $_REQUEST['price'];
            $tags = $_REQUEST['tags'];


        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_temp = $_FILES['img']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
        $upload_img = "../assets/images/product/".$unique_img;


        move_uploaded_file($file_temp, $upload_img);




            if (empty($file_name) || empty($title) || empty($author) || empty($body) || empty($body2) || empty($price) || empty($tags)) {
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
            $body  =  mysqli_real_escape_string($db->link,$_POST['body']);
            $body2  =  mysqli_real_escape_string($db->link,$_POST['body2']);

            $price  =  mysqli_real_escape_string($db->link,$_POST['price']);
            $tags  =  mysqli_real_escape_string($db->link,$_POST['tags']);
            
            
            if($file_name =='' || $title =='' || $author =='' || $body =='' || $body2 =='' || $price =='' || $tags ==''){
                $error = "Field Must not Be Empty";
            }else{
            	$id = $_GET['id'];
                $query = "UPDATE tbl_food
                SET
                body = '$body',
                body2 = '$body2',
                title = '$title',
                author   = '$author',
                tags   = '$tags',
                img   = '$unique_img',
                price  = '$price'
                WHERE id = '$id'";
                $create = $db->update($query);
            }

        }
        ?>


<?php
$id = $_GET['id'];
$query = "select * from tbl_food where id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
<form action="edititeams.php?id=<?php echo $result['id']; ?>" method="post" enctype="multipart/form-data">
<h3 align="center">Edit Iteams</h3>
<hr>

    <label>Image</label><br>
    <input type="file" name="img"><br><br>
 <br>
<label for="basic-input">Title</label>
<input type="text" name="title" id="basic-input" value="<?php echo $result['title']; ?>" class="form-control">
<br>
<label for="basic-input">Author</label>
<input type="text" name="author" id="basic-input" value="<?php echo $result['author']; ?>" class="form-control">
<br>
<label for="basic-input">Price</label>
<input type="text" name="price" id="basic-input" value="<?php echo $result['price']; ?>" class="form-control">
<br>
<label for="basic-textarea">Body</label>
<textarea rows="4" name="body" class="ckeditor" id="basic-textarea"><?php echo $result['body']; ?></textarea><br>
<label for="basic-textarea">Last Description</label>
<textarea rows="4" name="body2" class="ckeditor" id="basic-textarea"><?php echo $result['body2']; ?></textarea><br>

<label for="basic-textarea">Tags</label>
<textarea rows="4" name="tags" class="form-control" id="basic-textarea"><?php echo $result['tags']; ?></textarea><br>
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

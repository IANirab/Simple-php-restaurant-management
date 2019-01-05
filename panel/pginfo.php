<?php include "inc/header.php"; ?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->


<div class="card">
            <div class="card-body">
              <h5 class="card-title">All Category - [ Header ] <br></h5>
			  <div class="table-responsive">
                <table class="table">
                  <thead class="thead-primary shadow-primary">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$id=1;
$query = "select * from tbl_header where id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>

                    <tr>
                      <td><a href="editheader.php?id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></td>
                      <td>No Action</td>
                    </tr>
<?php } } ?>

<?php
$id=2;
$query = "select * from tbl_header where id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
                     <tr>
                      <td><a href="editheader.php?id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></td>
                      <td>No Action</td>
                    </tr>
<?php } } ?>

<?php
$id=3;
$query = "select * from tbl_header where id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
                     <tr>
                      <td><a href="editheader.php?id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></td>
                      <td>No Action</td>
                    </tr>
<?php } } ?>



<?php
$id=4;
$query = "select * from tbl_header where id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
                     <tr>
                      <td><a href="editheader.php?id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></td>
                      <td>No Action</td>
                    </tr>
<?php } } ?>



<?php
$id=5;
$query = "select * from tbl_header where id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
                     <tr>
                      <td><a href="editheader.php?id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></td>
                      <td>No Action</td>
                    </tr>
<?php } } ?>




<?php
$id=6;
$query = "select * from tbl_header where id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
                     <tr>
                      <td><a href="editheader.php?id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></td>
                      <td>No Action</td>
                    </tr>
<?php } } ?>


<?php
$id=7;
$query = "select * from tbl_header where id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
                     <tr>
                      <td><a href="editheader.php?id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></td>
                      <td>No Action</td>
                    </tr>
<?php } } ?>



                  </tbody>
                </table>
            </div>
            </div>
          </div>


	 
       <!--End Dashboard Content-->

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
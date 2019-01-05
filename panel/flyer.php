<?php include "inc/header.php"; ?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->


                    <?php
                    if (isset($_GET['did'])) {
                    $id=$_GET['did'];
                    $delquery = "delete from tbl_banner where id='$id'";
                    $deldata = $db->delete($delquery);
                    if ($deldata) {
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
                    } else {
                        echo "
<div class='alert alert-danger alert-dismissible' role='alert'>
           <button type='button' class='close' data-dismiss='alert'>×</button>
            <div class='alert-icon contrast-alert'>
           <i class='icon-close'></i>
            </div>
            <div class='alert-message'>
              <span><strong>Danger!</strong> Operation Faild !! Try Again.</span>
            </div>
            </div>
                        ";
                    }
                    }
                    ?>



 


<div class="card">
            <div class="card-body">
              <h5 class="card-title"><h4 class="text-info">All Banners - [ Home Page ] </h4><br><a href="addflyer.php"><button type="button" class="btn btn-square btn-outline-success waves-effect waves-light m-1">Add New</button></a><br><br></h5>
        <div class="table-responsive">
                <table class="table">
                  <thead class="thead-success shadow-success">
                    <tr>

                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col">Sort Details</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
<div style="display: none;">
<?php
$query = "select * from tbl_banner";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
</div>
<tr> 
                     <th><img style="width: 118px;" src="../assets/images/<?php echo $result['img']; ?>"></th>
                      <td><?php echo $result['title']; ?></td>
                      <td><?php echo $result['body']; ?></td>
                      <td>

<button type="button" class="btn btn-outline-danger waves-effect waves-light m-1" id="confirm-btn-alert<?php echo $result['id']; ?>"> <i class="fa fa-trash-o"></i></button>
   <script type="text/javascript">
$(document).ready(function() {
              $("#confirm-btn-alert<?php echo $result['id']; ?>").click(function(){

                  swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      swal("Poof! Succesfully Deleted!", {
                        icon: "success",
                      }).then(function() {
                            window.location.href = "?did=<?php echo $result['id']; ?>";
                            console.log('The Ok Button was clicked.');
                            });
                    } else {
                      swal("It is safe now!");
                    }
                  });
              });
});
</script>
</td>
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
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 BangoDash Admin
        </div>
      </div>
    </footer>
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
  
<script src="assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
<script src="assets/plugins/alerts-boxes/js/sweet-alert-script.js"></script>

</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:24:05 GMT -->
</html>

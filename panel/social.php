<?php include "inc/header.php"; ?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->
      


                    <?php
                    if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                    $delquery = "delete from tbl_social where id='$id'";
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
              <span><strong>Danger!</strong> Operation Failed , Try Again</span>
            </div>
                  </div>
                        ";
                    }
                    }
                    ?>





<div class="card">
            <div class="card-body">
              <h5 class="card-title">All Category <br><br><a href="addsocial.php"><b>Add New</b></a><br></h5>
			  <div class="table-responsive">
                <table class="table">
                  <thead class="thead-primary shadow-primary">
                    <tr>
                      <th scope="col">Icon</th>
                      <th scope="col">Name</th>
                      <th scope="col">Link</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

<?php
$query = "select * from tbl_social";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>

                    <tr>
                      <td><?php echo $result['icon']; ?></td>
                      <td><?php echo $result['name']; ?></td>
                      <td><?php echo $result['link']; ?></td>
                      <td><a href="editsocial.php?id=<?php echo $result['id']; ?>"><button type="button" class="btn btn-outline-primary waves-effect waves-light m-1"> <i aria-hidden="true" class="fa fa-cog"></i> </button></a>


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
                            window.location.href = "?id=<?php echo $result['id']; ?>";
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

<?php include "inc/header.php"; ?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->



                    <?php
                    if (isset($_GET['did'])) {
                    $id=$_GET['did'];
                    $delquery = "delete from tbl_event where id='$id'";
                    $deldata = $db->delete($delquery);
                    if ($deldata) {
                    echo "<div class='alert alert-success'>"."Removed Successfully!!"."</div>";
                    } else {
                        echo "<div class='alert alert-success'>"."Operation Failed.Try Again!!"."</div>";
                    }
                    }
                    ?> 


<div class="card">
            <div class="card-body">
              <h5 class="card-title"><h4 class="text-info">All Event's</h4><br><a href="addevents.php"><button type="button" class="btn btn-square btn-outline-success waves-effect waves-light m-1">Add New</button></a><br><br></h5>
        <div class="">







<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Date</th>
      <th scope="col">Days</th>
      <th scope="col">Food</th>
      <th scope="col">Guests</th>
      <th scope="col">Link</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>


<?php
$query = "select * from tbl_event";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
    <tr>
     <td><img style="width: 118px;" src="../assets/images/event/<?php echo $result['img']; ?>"></td>
      <td><?php echo $result['title']; ?></td>
      <td><?php echo $fm->textshorten($result['body']); ?></td>
      <td><?php echo $result['dates']." ".$result['month']; ?></td>
      <td><?php echo $result['day']; ?></td>
      <td><?php echo $result['food']; ?></td>
      <td><?php echo $result['guests']; ?></td>
      <td><?php echo $result['link']; ?></td>
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

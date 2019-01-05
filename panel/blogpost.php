
<?php include "inc/header.php"; ?>
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->



<div class="card">
            <div class="card-body">
<h5 class="card-title"><h4 class="text-info">All Blog Post </h4><br><a href="addpost1.php"><button type="button" class="btn btn-square btn-outline-success waves-effect waves-light m-1">Add New</button></a><br><br></h5>
              <hr>
			  <div class="">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Post ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col"> Body</th>
                    <th scope="col">Tag's</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
<?php
$id = $_GET['id'];
$query = "select * from tbl_post where cat='$id' order by id desc";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
                  <tr>
                    <td><?php echo $result['id']; ?></td>
                    <td><img style="width: 100%;" src="../assets/images/blog/<?php echo $result['img']; ?>"></td>
                    <td><?php echo $result['title']; ?></td>
                    <td><?php echo $result['author']; ?></td>
                    <td><p><?php echo $fm->textshorten($result['body']); ?></p></td>
                    <td><?php echo $result['tag']; ?></td>
                    <td><a href="editblog.php?id=<?php echo $result['id']; ?>"><button type="button" class="btn btn-outline-primary waves-effect waves-light m-1"> <i aria-hidden="true" class="fa fa-cog"></i> </button></a>
                      <button type="button" class="btn btn-outline-danger waves-effect waves-light m-1" id="confirm-btn-alert<?php echo $result['id']; ?>"> <i class="fa fa-trash-o"></i></button>

   <script type="text/javascript">
$(document).ready(function() {
              $("#confirm-btn-alert<?php echo $result['id']; ?>").click(function(){

                  swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                      }).then(function() {
                            window.location.href = "deldata.php?did=<?php echo $result['id'] ?>";
                            console.log('The Ok Button was clicked.');
                            });
                    } else {
                      swal("Your file is safe!");
                    }
                  });
              });
});

</script>

                   </td>
                    <td></td>
                  </tr>
<?php } } ?>

                </tbody>
              </table>
             </div>
            </div>
          </div>










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
  <!-- Bootstrap core JavaScript-->
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

  <!--Sweet Alerts -->
  <script src="assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
  <script src="assets/plugins/alerts-boxes/js/sweet-alert-script.js"></script>
</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:24:05 GMT -->
</html>

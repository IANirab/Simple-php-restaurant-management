<?php include "inc/header.php"; ?>

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">





<div class="container-fluid">

      <!--Start Dashboard Content-->







      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> All order's </div>
            <div class="card-body">
              <a href="../menu-grid-2.php"><button type="button" class="btn btn-square btn-outline-success waves-effect waves-light m-1">Order Now</button></a>
              
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>

                      <th scope="col">Image</th>
                      <th scope="col">Title</th>
                      <th scope="col">Price</th>
                      <th scope="col">Quentity</th>
                      <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>

<div style="display: none;">
<?php
$id = $_SESSION['email'];
$query = "select * from tbl_orders where email='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
</div>
<tr>
                      <td><img style="width: 118px;" src="../assets/images/product/<?php echo $result['img']; ?>"></td>
                      <td><?php echo $result['title']; ?></td>
                      <td><?php echo $result['price']; ?></td>
                      <td><?php echo $result['qty']; ?></td>
                      <?php if ($result['status'] == 'pending'): ?>
                      <td><span class="badge gradient-blooker text-white shadow">Pending</span></td>
                      <?php endif ?>
                      <?php if ($result['status'] == 'complete'): ?>
                      <td><span class="badge gradient-quepal text-white shadow">Paid</span></td>
                      <?php endif ?>
</tr>                      
<?php } } ?>

                </tbody>
                <tfoot>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                </tfoot>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->


   
       <!--End Dashboard Content-->

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

  <script src="assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
  <script src="assets/plugins/alerts-boxes/js/sweet-alert-script.js"></script>


  <!--Data Tables js-->
  <script src="assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
  <script src="assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

    <script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

    </script>
  
</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/table-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:49:36 GMT -->
</html>

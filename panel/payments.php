<?php include "inc/header.php"; ?>

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">




      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Total Products Selling With User-Details </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>User's Name</th>
                        <th>User's Email</th>
                        <th>Buy Products</th>
                        <th>Total Amount</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>

<?php
$query = "select * from tbl_user";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
    $email=$result['email'];
    $name=$result['name'];
    
?>

<?php
$query1 = "select sum(grandtotal) as atotal,sum(qty) as ctotal from tbl_orders  where email = '$email'";
$post1 = $db->select($query1);
if($post1){   
   while($result1 = $post1->fetch_assoc()){

?>

</div>
<tr>
<td><?php echo $name; ?></td>   
<td><?php echo $email; ?></td>

<?php if ($result1['atotal'] != NULL): ?>
<td><?php echo $result1['ctotal']; ?></td>
<?php endif ?>
<?php if ($result1['atotal'] == NULL): ?>
<td><?php echo 0; ?></td>
<?php endif ?>


<?php if ($result1['atotal'] != NULL): ?>
<td><?php echo "$".$result1['atotal']; ?></td>
<?php endif ?>
<?php if ($result1['atotal'] == NULL): ?>
<td><?php echo 0; ?></td>
<?php endif ?>

</tr>
<?php } } } } ?>
                </tbody>
                <tfoot>
                    <tr>
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

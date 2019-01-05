<?php include "inc/header.php"; ?>

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->

<h4 style="text-align: center;">Your Stats</h4>
<hr>

<div class="row">
<div class="col-12 col-sm-6 col-lg-6 col-xl-3">
</div>

        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card border border-success">
            <div class="card-body">
              <div class="media">
               <div class="media-icons">
                  <span class="bg-success border-top-left-radius"></span> <i class="icon-pie-chart"></i>
              </div>
              <div class="media-body text-right">
                <h6 class="text-uppercase">Orders Completed</h6>
          <?php
          $id=$_SESSION['email'];
          $query = "select * from tbl_orders where email='$id' AND status='complete'";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
          ?>
                <h4><?php if ($count == NULL) {
                  echo 0;
                } else { echo $count; ?></h4>
          <?php } } else {?>
               <h4>0</h4>
             <?php } ?>
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card border border-danger">
            <div class="card-body">
              <div class="media">
               <div class="media-icons">
                  <span class="bg-danger border-top-left-radius"></span> <i class="icon-layers"></i>
              </div>
              <div class="media-body text-right">
                <h6 class="text-uppercase">Pending Orders</h6>


                <?php
          $id=$_SESSION['email'];
          $query = "select * from tbl_orders where email='$id' && status='pending'";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
          ?>
                <h4><?php if ($count == NULL) {
                  echo 0;
                } else { echo $count; ?></h4>
          <?php } } else {?>
               <h4>0</h4>
             <?php } ?>


              </div>
            </div>
            </div>
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
  
</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:24:05 GMT -->
</html>

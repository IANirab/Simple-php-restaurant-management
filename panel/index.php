<?php include "inc/header.php"; ?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">







<li style="text-align: center;" class="breadcrumb-item"><span>Todays Stats</span></li>
<hr>

<div class="row">
        <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
          <div class="card gradient-scooter">
            <div class="card-body">
              <div class="media">
               <div class="media-icons-big">
                  <span class="gradient-scooter border-top-left-radius"></span> <i class="icon-basket-loaded"></i>
              </div>
              <div class="media-body text-right mt-3">
                <h6 class="text-uppercase text-white">Pending Orders</h6>
          <?php
          $id="pending";
          $query = "select * from tbl_orders where status='$id'";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
          ?>
                <h4 class="text-white"><?php echo $count; ?></h4>
          <?php } ?>
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
          <div class="card gradient-quepal">
            <div class="card-body">
              <div class="media">
               <div class="media-icons-big">
                  <span class="gradient-quepal border-top-left-radius"></span> <i class="icon-pie-chart"></i>
              </div>
              <div class="media-body text-right mt-3">
      <?php
$dates1 = date("Y/m/d");;
      $query = "select * from tbl_orders where date1='$dates1'";
      $msg = $db->select($query);
if ($msg) {


      $qty= 0;
      while($result = $msg->fetch_assoc()){
    $qty += $result['grandtotal'];

}
?>

                <h6 class="text-uppercase text-white">Todays Sold</h6>
                <h4 class="text-white">$<?php echo $qty; ?></h4>
<?php } else { ?>
                <h6 class="text-uppercase text-white">Todays Sold</h6>
                <h4 class="text-white">$0</h4>
<?php } ?>
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
          <div class="card gradient-bloody">
            <div class="card-body">
              <div class="media">
               <div class="media-icons-big">
                  <span class="gradient-bloody border-top-left-radius"></span> <i class="icon-layers"></i>
              </div>
              <div class="media-body text-right mt-3">
                <h6 class="text-uppercase text-white">Products</h6>
          <?php
          $id = 'able';
          $query = "select * from tbl_food where abl='$id'";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
            ?>
                <h4 class="text-white"><?php echo $count; ?></h4>
          <?php } ?>
              </div>
            </div>
            </div>
          </div>
        </div>

<!--
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
<div class="card gradient-blooker">
            <div class="card-body">
              <div class="media">
               <div class="media-icons-big">
                  <span class="gradient-blooker border-top-left-radius"></span> <i class="icon-graph text-white"></i>
              </div>
              <div class="media-body text-right mt-3">
                <h6 class="text-uppercase text-white">Sold</h6>

                <h4 class="text-white">Sold value</h4>
              </div>
            </div>
            </div>
          </div>
        </div>
      -->


      </div>












      <!--Start Dashboard Content-->
<li style="text-align: center;" class="breadcrumb-item"><span>Total Stats</span></li>
<hr>




      <div class="row mt-4">
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card gradient-quepal">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
          <?php
          $id="complete";
          $query = "select * from tbl_orders where status='$id'";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
            ?>
                <h4 class="text-white"><?php echo $count; ?></h4>
            <?php } ?>
                <span class="text-white"> Orders Completed</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-basket-loaded text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card gradient-blooker">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
          <?php
          $id = "complete";
          $query = "select * from tbl_books where status='$id'";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
            ?>
                <h4 class="text-white"><?php echo $count; ?></h4>
            <?php } ?>    
                <span class="text-white">Total Booking</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-wallet text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card gradient-scooter">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
          <?php
          $query = "select * from tbl_food";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
            ?>
                <h4 class="text-white"><?php echo $count; ?></h4>
          <?php } ?>
                <span class="text-white">All Products</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-layers text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card gradient-bloody">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
          <?php
          $query = "select * from tbl_user";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
            ?>
                <h4 class="text-white"><?php echo $count; ?></h4>
            <?php } ?>

                <span class="text-white">Total Users</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-user text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->





	 
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

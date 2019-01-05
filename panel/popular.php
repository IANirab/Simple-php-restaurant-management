<?php include "inc/header.php"; ?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->



                    <?php
                    if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                		$query = "UPDATE tbl_food
                		SET
                		status = 'popular'
                		WHERE id = '$id'";
                		$create = $db->update($query);
                    if ($create) {
                    echo "<div class='alert alert-success alert-dismissible' role='alert'>
				    <button type='button' class='close' data-dismiss='alert'>×</button>
				    <div class='alert-icon contrast-alert'>
					 <i class='icon-check'></i>
				    </div>
				    <div class='alert-message'>
				      <span><strong>Success!</strong> Updated Succesfully</span>
				    </div>
                  </div>";
                    } else {
                        echo "
            <div class='alert alert-danger alert-dismissible' role='alert'>
           <button type='button' class='close' data-dismiss='alert'>×</button>
            <div class='alert-icon contrast-alert'>
           <i class='icon-close'></i>
            </div>
            <div class='alert-message'>
              <span><strong>Danger!</strong> Operation Failed ! Try Again.</span>
            </div>
            </div>
                    ";
                    }
                    }
                    ?>

                    <?php
                    if (isset($_GET['did'])) {
                    $id=$_GET['did'];
                		$query = "UPDATE tbl_food
                		SET
                		status = ''
                		WHERE id = '$id'";
                		$create = $db->update($query);
                    if ($create) {
                    echo "<div class='alert alert-success alert-dismissible' role='alert'>
				    <button type='button' class='close' data-dismiss='alert'>×</button>
				    <div class='alert-icon contrast-alert'>
					 <i class='icon-check'></i>
				    </div>
				    <div class='alert-message'>
				      <span><strong>Success!</strong> Updated Succesfully</span>
				    </div>
                  </div>";
                    } else {
                        echo "
            <div class='alert alert-danger alert-dismissible' role='alert'>
           <button type='button' class='close' data-dismiss='alert'>×</button>
            <div class='alert-icon contrast-alert'>
           <i class='icon-close'></i>
            </div>
            <div class='alert-message'>
              <span><strong>Danger!</strong> Operation Failed ! Try Again.</span>
            </div>
            </div>
                        ";
                    }
                    }
                    ?>
 


<div class="card">
            <div class="card-body">
              <h5 class="card-title">All Products [-For-Popular-]</h5>
        <div class="table-responsive">
                <table class="table">
                  <thead class="thead-success shadow-success">
                    <tr>

                      <th scope="col">Image</th>
                      <th scope="col">Title</th>
                      <th scope="col">Price</th>
                      <th scope="col">Category</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    
<div style="display: none;">
<?php
$query = "select * from tbl_food";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
</div>
<tr> 
                     <th><img style="width: 118px;" src="../assets/images/product/<?php echo $result['img']; ?>"></th>
                      <td><?php echo $result['title']; ?></td>
                      <td><?php echo $result['price']; ?></td>
                      <th><?php echo $result['cat']; ?></th>
                      <td>
                      	<?php if ($result['status'] == NULL): ?>
                      	<a href="?id=<?php echo $result['id']; ?>">
                      	<button type="button" class="btn btn-outline-warning waves-effect waves-light"> <i class="fa fa-star"></i> </button></a>
                      <?php endif ?>
                      <?php if ($result['status'] == 'popular'): ?>
                      	<a href="?did=<?php echo $result['id']; ?>">
                      	<button type="button" class="btn btn-outline-danger waves-effect waves-light"> <i class="fa fa fa-trash-o"></i> </button>
                      	</a>
                      <?php endif ?>
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
  
</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:24:05 GMT -->
</html>

<?php include "inc/header.php"; ?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->





    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_REQUEST['able'];



            if (empty($title)) {
                echo "
<div class='alert alert-danger alert-dismissible' role='alert'>
           <button type='button' class='close' data-dismiss='alert'>×</button>
            <div class='alert-icon contrast-alert'>
           <i class='icon-close'></i>
            </div>
            <div class='alert-message'>
              <span><strong>Danger!</strong> All Fields are Required</span>
            </div>
                  </div>
                ";
            } else {
                echo "
<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            <div class='alert-icon contrast-alert'>
           <i class='icon-check'></i>
            </div>
            <div class='alert-message'>
              <span><strong>Success!</strong> Updated Succesfully</span>
            </div>
                  </div>
                ";
            }

            $title  =  mysqli_real_escape_string($db->link,$_POST['able']);
            $id  =  mysqli_real_escape_string($db->link,$_POST['id']);

            
            if($title ==''){
                $error = "Field Must not Be Empty";
            }else{
                $query = "UPDATE tbl_food
                SET
                abl  = '$title'
                WHERE id = '$id'";
                $create = $db->update($query);
            }

        }
        ?>









<div class="card">
            <div class="card-body">
              <h5 class="card-title"><h4 class="text-info">All Food Iteams</h4><br><a href="additeams.php"><button type="button" class="btn btn-square btn-outline-success waves-effect waves-light m-1">Add New</button></a><br><br></h5>
        <div class="">
                <table class="table">
                  <thead class="thead-success shadow-success">
                    <tr>

                      <th scope="col">Image</th>
                      <th scope="col">Title</th>
                      <th scope="col">Price</th>
                      <th scope="col">Author</th>
                      <th scope="col">Category</th>
                      <th scope="col">Body</th>
                      <th scope="col">Tags</th>
                      <th scope="col">Last Description</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    
<div style="display: none;">
<?php
$id = $_GET['id'];
$query = "select * from tbl_food where cat='$id' order by id desc";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>
</div>
<tr> 
                     <th><img style="width: 118px;" src="../assets/images/product/<?php echo $result['img']; ?>"></th>
                      <td><?php echo $result['title']; ?></td>
                      <td><?php echo $result['price']; ?></td>
                      <td><?php echo $result['author']; ?></td>
                      <th><?php echo $result['cat']; ?></th>
                      <td><?php echo $fm->textshorten2($result['body']); ?></td>
                      <td><?php echo $result['tags']; ?></td>
                      <td><?php echo $fm->textshorten2($result['body2']); ?></td>
                      <td>

                       <?php if ($result['abl'] != 'able') { ?>
<form action="" method="post">

  <input type="hidden" value="able" name="able">
  <input type="hidden" value="<?php echo $result['id']; ?>" name="id">

                  <button type="submit" class="btn btn-outline-warning waves-effect waves-light m-1"> <i class="fa fa-star"></i> </button>
</form>
                       <?php } else { ?>
<form action="" method="post">

  <input type="hidden" value="update" name="able">
  <input type="hidden" value="<?php echo $result['id']; ?>" name="id">
                        
          <button type="submit" class="btn btn-warning waves-effect waves-light m-1"> <i class="fa fa-star"></i> </button>
</form>
                        

                        <?php } ?>
                      <a href="edititeams.php?id=<?php echo $result['id']; ?>">
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light m-1"> <i aria-hidden="true" class="fa fa-cog"></i> </button>
                      </a> 


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
                            window.location.href = "deldata.php?diid=<?php echo $result['id'] ?>";
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

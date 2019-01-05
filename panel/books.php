<?php include "inc/header.php"; ?>

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">

<?php
$result1="";
if (isset($_GET['did'])) {
	require 'phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer();

	$mail->Host='smtp.gmail.com';
	$mail->Port='587';
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';
    $id1=1;
  $query1 = "select * from tbl_sentmail where id='$id1'";
  $post1 = $db->select($query1);
            if($post1){
                while($result1 = $post1->fetch_assoc()){
    $mail1 = $result1['email'];
    $pass1 = $result1['password'];

	$mail->Username=$mail1;
	$mail->Password=$pass1;

}
}


$id = $_GET['did'];
$query = "select * from tbl_books WHERE id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){



	//$mail->isSMTP();
	$mail->setFrom($result['email'],$result['name']);
	$mail->addAddress($result['email']);
	$mail->addReplyTo($result['email'],$result['name']);

}
}
$query = "select * from tbl_mailbox WHERE cat='tableDelete'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){

	$mail->isHTML(true);
	$mail->Subject='Request DisApproved';
	$mail->Body= $result['body'];
}
}
	if ($mail->send()) {
		$result1="Message Sent Successfully";
	} else {
		$result1= "Try Again !! Message Not Sent";
	}

}
?>



<?php
$result1="";
if (isset($_GET['diid'])) {
	require 'phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer();

	$mail->Host='smtp.gmail.com';
	$mail->Port='587';
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';
	$mail->Username='kingb5861@gmail.com';
	$mail->Password='01712611078';


$id = $_GET['diid'];
$query = "select * from tbl_books WHERE id='$id'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){



	//$mail->isSMTP();
	$mail->setFrom($result['email'],$result['name']);
	$mail->addAddress($result['email']);
	$mail->addReplyTo($result['email'],$result['name']);

}
}
$query = "select * from tbl_mailbox WHERE cat='tableApprove'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){

	$mail->isHTML(true);
	$mail->Subject='Request Approved';
	$mail->Body= $result['body'];
}
}
	if ($mail->send()) {
		$result1="Message Sent Successfully";
	} else {
		$result1= "Try Again !! Message Not Sent";
	}

}
?>






<div class="container-fluid">





      <!--Start Dashboard Content-->
                    <?php
                    if (isset($_GET['did'])) {
                    $id=$_GET['did'];
                    $delquery = "delete from tbl_books where id='$id'";
                    $deldata = $db->delete($delquery);
                    if ($deldata) {
                    echo "<div class='alert alert-success'>"."Removed Successfully!!"."</div>";
                    } else {
                        echo "<div class='alert alert-success'>"."Operation Failed.Try Again!!"."</div>";
                    }
                    }
                    ?>
                    <?php
                    if (isset($_GET['diid'])) {
                    $id=$_GET['diid'];
                    $query = "UPDATE tbl_books
                    SET
                    status = 'complete'
                    WHERE id = '$id'";
                    $create = $db->update($query);
                    if ($create) {
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






      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> All Booking's </div>
<div class="card-body">
<div style="padding: 15px;" class="alert alert-primary" role="alert">
  Now Message is Hide <br>
 You can See This Clients Message into Your mail Box <br>
</div>

</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Chairs</th>
                      <th scope="col">Booking Date</th>
                      <th scope="col">Time</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>

<div style="display: none;">
<?php
$query = "select * from tbl_books";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?>


</div>
<tr>
                      <th><?php echo $result['name']; ?></th>
                      <td><?php echo $result['email']; ?></td>
                      <th><?php echo $result['person']; ?></th>
                      <td><?php echo $result['dates']; ?></td>
                      <td><?php echo $result['times']; ?></td>
                      <td><?php echo $result['phone']; ?></td>
                      <?php if ($result['status'] == 'pending'): ?>
                      <td><span class="badge gradient-blooker text-white shadow">Pending</span></td>
                      <?php endif ?>
                      <?php if ($result['status'] == 'complete'): ?>
                      <td><span class="badge gradient-quepal text-white shadow">Complete</span></td>
                      <?php endif ?>
                      <td>
                        <?php if ($result['status'] == 'pending') { ?>
                        <a href="?diid=<?php echo $result['id']; ?>"><button type="button" class="btn btn-outline-success waves-effect waves-light m-1"> <i aria-hidden="true" class="fa fa-check"></i></button></a> ||  
                      <?php } ?>
                        
<button type="button" class="btn btn-outline-danger waves-effect waves-light m-1" id="confirm-btn-alert<?php echo $result['id']; ?>"> <i class="fa fa-trash-o"></i></button>



   <script type="text/javascript">
$(document).ready(function() {
              $("#confirm-btn-alert<?php echo $result['id']; ?>").click(function(){

                  swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this order!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      swal("Poof! Order has been Succesfully Deleted!", {
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

                     

          </div>

       <!--End Dashboard Content-->

    </div>







   
       <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  

   
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

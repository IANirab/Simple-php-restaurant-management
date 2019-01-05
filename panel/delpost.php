<?php include "../config/config.php"; ?>
<?php include "../lib/Database.php"; ?>
<?php include "../helpers/format.php"; ?>
<?php 
$db = new Database();
$fm = new format();
?>    




                    <?php
                    if (isset($_GET['diid'])) {
                    $id=$_GET['diid'];
                    $delquery = "delete from tbl_gal where id='$id'";
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


                    <?php
                    if (isset($_GET['did'])) {
                    $id=$_GET['did'];
                    $delquery = "delete from tbl_author where id='$id'";
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
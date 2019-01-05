<?php include "../lib/session.php"; ?>
<?php 
session::checksession();
?>
<?php include "../config/config.php"; ?>
<?php include "../lib/Database.php"; ?>
<?php include "../helpers/format.php"; ?>
<?php 
$db = new Database();
$fm = new format();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kvthemes.com/bangodash/color-version/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:22:40 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>BangoDash Bootstrap  Admin Template</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
  <link rel="stylesheet" type="text/css" href="fontawesome/css/fontawesome.min.css">
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

  <script src="assets/js/jquery.min.js"></script>


<link href="https://fonts.googleapis.com/css?family=Crete+Round|Permanent+Marker|Righteous" rel="stylesheet">
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.php">
       <!-- <img src="assets/images/logo.png" class="logo-icon" alt="Bangodash"> -->
       <h5 style="font-family: Permanent Marker;color: #E91E63;margin-left: 35px;font-size: 25px;" class="logo-text"> ECHOVEL</h5>
     </a>
	 </div>
	 <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="index.php" class="waves-effect">
          <i class="icon-home"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
      </li>

      <li>
        <a href="blog.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Blog</span>
        </a>
      </li>
	   
      <li>
        <a href="iteamscat.php" class="waves-effect">
          <i class="icon-calendar"></i> <span> Products Category </span>
        </a>
      </li>

      <li>
        <a href="iteams.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>All Products</span>
        </a>
      </li>


      <li>
        <a href="allorders.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>All Orders</span>
          <?php
          $id = "pending";
          $query = "select * from tbl_orders where status='$id'";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
            ?>
             <small class="badge float-right badge-warning"><?php echo $count; ?></small>
          <?php } ?>
        </a>
      </li>

      <li>
        <a href="books.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>All Booking</span>
          <?php
          $id = "pending";
          $query = "select * from tbl_books where status='$id'";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
            ?>
             <small class="badge float-right badge-warning"><?php echo $count; ?></small>
          <?php } ?>
        </a>
      </li>


      <li>
        <a href="subsc.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Subscriber's</span>
          <?php
          $query = "select * from tbl_subscribe";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
            ?>
             <small class="badge float-right badge-warning"><?php echo $count; ?></small>
          <?php } ?>
        </a>
      </li>

      <li>
        <a href="comments.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>All Comments</span>
          <?php
          $id=null;
          $query = "select * from tbl_comments where cat='$id'";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
            ?>
             <small class="badge float-right badge-warning"><?php echo $count; ?></small>
          <?php } ?>
        </a>
      </li>

      <li>
        <a href="message.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Message's</span>
          <?php
          $id=0;
          $query = "select * from tbl_contactbox where status='$id' ";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
            ?>
             <small class="badge float-right badge-warning"><?php echo $count; ?></small>
          <?php } ?>
        </a>
      </li>

      <li>
        <a href="alluser.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>User's</span>
          <?php
          $id="Y";
          $query = "select * from tbl_user where verifystatus='$id' ";
          $msg = $db->select($query);
          if ($msg) {
            $count = mysqli_num_rows($msg);
            ?>
             <small class="badge float-right badge-warning"><?php echo $count; ?></small>
          <?php } ?>
        </a>
      </li>

      <li>
        <a href="open.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Open Hour</span>
        </a>
      </li>

      <li>
        <a href="about.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>About Info</span>
        </a>
      </li>

      <li>
        <a href="contact.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Contact Info</span>
        </a>
      </li>

      <li>
        <a href="home.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Home Info</span>
        </a>
      </li>

      <li>
        <a href="pginfo.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Header Setting</span>
        </a>
      </li>

      <li>
        <a href="footer.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Footer Info</span>
        </a>
      </li>

      <li>
        <a href="event.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Events Info</span>
        </a>
      </li>

      <li>
        <a href="email.php" class="waves-effect">
          <i class="icon-calendar"></i> <span> Email Account </span>
        </a>
      </li>

      <li>
        <a href="mailbox.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Edit Massages</span>
        </a>
      </li>

      <li>
        <a href="extra.php" class="waves-effect">
          <i class="icon-calendar"></i> <span> Extra Settings</span>
        </a>
      </li>

      <li>
        <a href="logo.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Logo Setting</span>
        </a>
      </li>

      <li>
        <a href="payments.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Payments</span>
        </a>
      </li>

      <li>
        <a href="pass.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>Change Password</span>
        </a>
      </li>

    </ul>
	 
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top gradient-ibiza">


  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
  </ul>
     

<?php 
if (isset($_GET['action']) && $_GET['action'] == "logout") {
    session::destory(); 
    echo '<script> window.location = "../index.php";</script>';
}
?>

  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
	    <i class="icon-envelope-open"></i></a>
    </li>
    <li class="nav-item">
    <form action="?action=logout" method="post">
    <a href="?action=logout"><button type="button" class="btn btn-danger waves-effect waves-light m-1">Logout</button></a>
    </form>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->
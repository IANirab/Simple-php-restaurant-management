<?php 
session_start();
if (!isset($_SESSION['email'])) {
  header("location:../index.php");
}
if (isset($_GET['action']) && $_GET['action'] == "logout") {
    session_destroy();
    header("location:../index.php") ;
}
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
  
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="../resturant/index.php">
       <img src="assets/images/logo-icon.png" class="logo-icon" alt="Bangodash">
       <h5 class="logo-text"> BangoDash</h5>
     </a>
	 </div>
	 <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>

      <li>
        <a href="index.php" class="waves-effect">
          <i class="icon-home"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="../index.php" class="waves-effect">
          <i class="icon-calendar"></i> <span> Home Page</span>
        </a>
      </li>

      <li>
        <a href="uorder.php" class="waves-effect">
          <i class="icon-calendar"></i> <span>All Orders</span>
        </a>
      </li>
	 

      <li>
        <a href="account.php" class="waves-effect">
          <i class="fa-fa-cog"></i> <span>Account Settings</span>
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
      <a class="nav-link toggle-menu" href="#">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
  </ul>

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
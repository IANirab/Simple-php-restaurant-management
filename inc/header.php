<?php
session_start();
if (isset($_POST["addcart"])) {
  if (isset($_SESSION["shopping_cart"])) {
    $iteam_array_id = array_column($_SESSION["shopping_cart"], "id");
    if (!in_array($_GET['id'], $iteam_array_id)) {
      $count = count($_SESSION["shopping_cart"]);
      $iteam_array = array(
      'id' => $_GET['id'],
      'title' => $_POST["hidden_name"],
      'price' => $_POST["hidden_price"],
      'img' => $_POST["hidden_img"],
      'quantity' => $_POST["quantity"]
    );
      $_SESSION["shopping_cart"][$count] = $iteam_array;
    } else {
      echo "<script>alert('Iteam Already Add')</script>";
    }
  } else {
    $iteam_array = array(
      'id' => $_GET['id'],
      'title' => $_POST["hidden_name"],
      'price' => $_POST["hidden_price"],
      'img' => $_POST["hidden_img"],
      'quantity' => $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $iteam_array;

  }
}
if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["shopping_cart"] as $key => $value) {
      if ($value['id'] == $_GET['id']) {
        unset($_SESSION["shopping_cart"][$key]);
      }
    }
  }
}
?>
<?php include "lib/session.php"; ?>
<?php 
//session::init();
?>
<?php include "config/config.php"; ?>
<?php include "lib/Database.php"; ?>
<?php include "helpers/format.php"; ?>
<?php 
$db = new Database();
$fm = new format();
?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
  
<!-- Mirrored from sun-themes.com/html/fooday/home-shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Aug 2018 14:59:03 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- Bootstrap CSS-->
    <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!-- IE 9-->
    <!-- Vendors-->
    <link rel="stylesheet" href="assets/vendors/flexslider/flexslider.min.css">
    <link rel="stylesheet" href="assets/vendors/swipebox/css/swipebox.min.css">
    <link rel="stylesheet" href="assets/vendors/slick/slick.min.css">
    <link rel="stylesheet" href="assets/vendors/slick/slick-theme.min.css">
    <link rel="stylesheet" href="assets/vendors/animate.min.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/vendors/pageloading/css/component.min.css">
    <!-- Font-icon-->
    <link rel="stylesheet" href="assets/fonts/font-icon/style.css">
    <!-- Style-->
    <link rel="stylesheet" type="text/css" href="assets/css/layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/elements.css">
    <link rel="stylesheet" type="text/css" href="assets/css/extra.css">
    <link rel="stylesheet" type="text/css" href="assets/css/widget.css">
    <link rel="stylesheet" type="text/css" href="assets/css/live-settings.css">
    <link id="colorpattern" rel="stylesheet" type="text/css" href="assets/css/color/colordefault.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <!-- Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">
    <!-- Script Loading Page-->
    <script src="assets/vendors/html5shiv.js"></script>
    <script src="assets/vendors/respond.min.js"></script>
    <script src="assets/vendors/pageloading/js/snap.svg-min.js"></script>
    <script src="assets/vendors/pageloading/sidebartransition/js/modernizr.custom.js"></script>

<style type="text/css">
  <?php
  $query = "select * from tbl_background where id='1'";
  $post = $db->select($query);
  if($post){
    while($result = $post->fetch_assoc()){
  ?>
  .page-title.page-about {
    background-image: url(assets/images/background/<?php echo $result['img']; ?>) !important;
}
<?php } } ?>

  <?php
  $query = "select * from tbl_background where id='2'";
  $post = $db->select($query);
  if($post){
    while($result = $post->fetch_assoc()){
  ?>
.page-title.page-reservation {
    background-image: url(assets/images/background/<?php echo $result['img']; ?>) !important;
}
<?php } } ?>


  <?php
  $query = "select * from tbl_background where id='3'";
  $post = $db->select($query);
  if($post){
    while($result = $post->fetch_assoc()){
  ?>
.page-title.page-menu {
    background-image: url(assets/images/background/<?php echo $result['img']; ?>) !important;
}
<?php } } ?>

  <?php
  $query = "select * from tbl_background where id='4'";
  $post = $db->select($query);
  if($post){
    while($result = $post->fetch_assoc()){
  ?>
.page-title.page-blog {
    background-image: url(assets/images/background/<?php echo $result['img']; ?>) !important;
}
 <?php } } ?> 

  <?php
  $query = "select * from tbl_background where id='5'";
  $post = $db->select($query);
  if($post){
    while($result = $post->fetch_assoc()){
  ?>
  .page-title.page-contact {
    background-image: url(assets/images/background/<?php echo $result['img']; ?>) !important;
}
<?php } } ?>


  <?php
  $query = "select * from tbl_mflyer where id='1'";
  $post = $db->select($query);
  if($post){
    while($result = $post->fetch_assoc()){
  ?>
.menu-banner-section {
    background-image: url(assets/images/background/<?php echo $result['img1']; ?>) !important;
}
<?php } } ?>

  <?php
  $query = "select * from tbl_timg where id='1'";
  $post = $db->select($query);
  if($post){
    while($result = $post->fetch_assoc()){
  ?>
.ab-testimonial-section {
    background-image: url(assets/images/background/<?php echo $result['img']; ?>) !important;
}
<?php } } ?>



  <?php
  $query = "select * from tbl_background where id='7'";
  $post = $db->select($query);
  if($post){
    while($result = $post->fetch_assoc()){
  ?>
.section-reservation-service {
    background-image: url(assets/images/background/<?php echo $result['img']; ?>) !important;
}
<?php } } ?>


  <?php
  $query = "select * from tbl_background where id='8'";
  $post = $db->select($query);
  if($post){
    while($result = $post->fetch_assoc()){
  ?>
.footer-main {
    background-image: url(assets/images/background/<?php echo $result['img']; ?>) !important;
}
<?php } } ?>

</style>

  </head>
  <body>



<!-- BEGIN JIVOSITE CODE {literal} -->

<script type='text/javascript'>
(function(){ var widget_id = 'hFfjIscKY1';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<div id='jivo_copyright' style='display: none'>Live Chat Powered by <a href='https://www.jivochat.com' target='_blank'>www.jivochat.com</a></div>

<!-- {/literal} END JIVOSITE CODE -->





    <div id="pagewrap" class="pagewrap">


      <div id="html-content" class="wrapper-content">
       <header>
          <div class="header-top top-layout-02">
            <div class="container">
              <div class="topbar-left">
                <div class="topbar-content">
                  <div class="item"> 
            <?php
            $query = "select * from tbl_header where id='6'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                    <div class="wg-contact"><i class="fa fa-map-marker"></i><span><?php echo $result['body']; ?></span></div>
            <?php } } ?>
                  </div>
                  <div class="item"> 
            <?php
            $query = "select * from tbl_header where id='7'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                    <div class="wg-contact"><i class="fa fa-phone"></i><span><?php echo $result['body']; ?></span></div>
            <?php } } ?>
                  </div>
                </div>
              </div>
              <div class="topbar-right">
                <div class="topbar-content">
                  <div class="item">
                    <ul class="socials-nb list-inline wg-social">
            <?php
            $query = "select * from tbl_social";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                      <li><a href="http://<?php echo $result['link']; ?>"><?php echo $result['icon']; ?></a></li>
            <?php } } ?>
                    </ul>
                  </div>
                  <div class="item">
<?php 
if (isset($_SESSION['email'])) { ?>

  <div class="wg-social"><i class="fa fa-user"></i><a href="upanel/">My Account</a></div>

<?php } else { ?>

<div class="wg-social"><i class="fa fa-user"></i><a href="upanel/signin.php">Login</a></div>

<?php } ?>
                    

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="header-main">
            <div class="container">
              <div class="open-offcanvas">☰</div>
              <div class="utility-nav">
                <div class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="search-bar dropdown-toggle"><i class="fa fa-search"></i></a>
                  <div class="dropdown-menu">
                    <div class="search-form">
                      <form action="searchresults.php" method="get">
                        <div class="input-group">
                          <input type="text" placeholder="Search" name="search" class="form-control">
                          <button style="float: right;
    margin-top: 10px;
    border: none;
    background: #f15f2a;
    color: white;" type="submit" name="searchresult"><i class="fa fa-search"></i></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            <?php
            $id=1;
            $query = "select * from tbl_logo where id='$id'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
              <div class="header-logo"><a href="index.php" class="logo"><img src="assets/images/<?php echo $result['img']; ?>" alt="fooday" class="logo-img"></a></div>
            <?php } } ?>


              <nav id="main-nav-offcanvas" class="main-nav-wrapper">
                <div class="close-offcanvas-wrapper"><span class="close-offcanvas">x</span></div>
                <div class="main-nav">
                  <ul id="main-nav" class="nav nav-pills">
                    <li><a href="index.php">home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="reservation.php">Reservation</a></li>
                    <li><a href="menu-grid-2.php">Menu</a></li>
                    <li><a href="blogs.php">blog</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a style="width: 82px;" href="list.php"><img style="width: 27px;" src="assets/images/cart.svg">-<?php if (isset($_SESSION['shopping_cart'])) {
                      echo count($_SESSION["shopping_cart"]);
                    } else {
                      echo 0;
                    } ?></a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </header>
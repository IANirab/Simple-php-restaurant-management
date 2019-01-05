 <footer>
          <div class="subscribe-section">
  <?php
  $query = "select * from tbl_background where id='6'";
  $post = $db->select($query);
  if($post){
    while($result = $post->fetch_assoc()){
  ?>
            <img src="assets/images/background/<?php echo $result['img']; ?>" alt="" class="img-subscribe">
  <?php } } ?>

            <div class="container">
              <div class="subscribe-wrapper">
                <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                    <div class="subscribe-heading">
                      <h3 class="title">Subcribe Us Now</h3>
                      <div class="des">Get more news and delicious dishes everyday from us</div>
                    </div>






         <?php
        if (isset($_POST['subscribe'])) {
            $email = $_REQUEST['email'];

            if (empty($email)) {
                echo "<div class='alert alert-danger'>"."All Fields are Requied !!"."</div>";
            } else {
                 echo "<script>"."alert('Thanks For Subscribe')"."</script>";
            }


            $query = "select * from tbl_subscribe";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
$mailemail = $result['email'];
}
}

if ($mailemail == $email) {
  echo "<script>"."alert('Email Already Added')"."</script>";
} else {
    

            $email  =  mysqli_real_escape_string($db->link,$_POST['email']);


            if($email =='') {
                $error = "Field Must not Be Empty";
            }else{
                $query = "INSERT INTO tbl_subscribe(email) VALUES('$email')";
                $create = $db->update($query);


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


  //$mail->isSMTP();
  $mail->setFrom($email);
  $mail->addAddress($email);
  $mail->addReplyTo($email);

$query = "select * from tbl_mailbox WHERE cat='subscribe'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){

  $mail->isHTML(true);
  $mail->Subject='Subscribe !!';
  $mail->Body= $result['body'];
}
}
  if ($mail->send()) {
    $result1="Message Sent Successfully";
  } else {
    $result1= "Try Again !! Message Not Sent";
  }

}


}

}

?>






                    <form action="" method="post" class="widget-newsletter">
                      <input placeholder="Email" name="email" class="form-control" required>
                      <span class="submit"><button style="border: none;
    background: #fcfcfc;" type="submit" name="subscribe"><i class="fa fa-paper-plane"></i></button></span>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-main">
            <div class="container">
              <div class="ft-widget-area">
                <div class="row">
                  <div class="col-md-3 col-sm-6">
                    <div class="ft-area1">
                      <div class="swin-widget swin-widget-about">
                        <div class="clearfix"><a class="wget-logo"><img src="assets/images/logo-ft.png" alt="" class="img img-responsive"></a></div>


                        <div class="wget-about-content">
            <?php
            $id=1;
            $query = "select * from tbl_fabout where id='$id'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                          <p><?php echo $result['body']; ?></p>
            <?php } } ?>
                          <ul class="socials socials-about list-unstyled list-inline pull-left mtm">
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


                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                    <div class="ft-area1">
                      <div class="swin-widget widget-about">
                        <div class="title-widget">Contact Us</div>
                        <div class="widget-body widget-content clearfix">
                          <div class="about-contact-info clearfix">
                            <div class="info-content address-content">
                              <div class="info-icon"><i class="fa fa-map-marker"></i></div>
                              <div class="info-text">
            <?php
            $query = "select * from tbl_address";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                                <p><?php echo $result['address']; ?></p><br>
            <?php } } ?>                    
                              </div>
                            </div>
                            <div class="info-content phone-content">
                              <div class="info-icon"><i class="fa fa-phone"></i></div>
                              <div class="info-text">
            <?php
            $query = "select * from tbl_phone";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                                <p><?php echo $result['number']; ?></p>
            <?php } } ?>
                              </div>
                            </div>
                            <div class="info-content email-content">
                              <div class="info-icon"><i class="fa fa-envelope"></i></div>
                              <div class="info-text">
            <?php
            $query = "select * from tbl_mail";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                                <p><?php echo $result['mail']; ?></p>
            <?php } } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                    <div class="ft-area1">
                      <div class="swin-widget widget-pages">
                        <div class="title-widget">Useful Link</div>
                        <div class="widget-body widget-content">
                          <ul class="list-unstyled">
            <?php
            $query = "select * from tbl_footer";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                            <li><a href="http://<?php echo $result['link']; ?>" class="link"><span class="text"><?php echo $result['name']; ?></span></a></li>
            <?php } } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                    <div class="ft-area1">
                      <div class="swin-widget widget-open-hour">
                        <div class="title-widget">Open Hour</div>
                        <div class="widget-body widget-content">
                          <div class="open-date-time">

            <?php
            $query = "select * from tbl_open";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                            <div class="open-date-time-item">
                              <div class="open-date">
                                <div class="open-date-item">
                                  <div class="open-date-text">
                                    <p><?php echo $result['name']; ?>:</p>
                                  </div>
                                  <div class="open-date-dot">.......................................</div>
                                </div>
                              </div>
                              <div class="open-time">
                                <div class="open-time-item">
                                  <p><?php echo $result['body']; ?></p>
                                </div>
                              </div>
                            </div>
            <?php } } ?>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer><a id="totop" href="#" class="animated"><i class="fa fa-angle-double-up"></i></a>
      </div>
      <div id="loader" data-opening="m -5,-5 0,70 90,0 0,-70 z m 5,35 c 0,0 15,20 40,0 25,-20 40,0 40,0 l 0,0 C 80,30 65,10 40,30 15,50 0,30 0,30 z" class="pageload-overlay">
        <div class="loader-wrapper">
          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 80 60" preserveaspectratio="none">
            <path d="m -5,-5 0,70 90,0 0,-70 z m 5,5 c 0,0 7.9843788,0 40,0 35,0 40,0 40,0 l 0,60 c 0,0 -3.944487,0 -40,0 -30,0 -40,0 -40,0 z"></path>
          </svg>
          <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
          </div>
          <div class="sk-circle sk-circle-out">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
          </div>
        </div>
      </div>
      
      
      
      <!--<div id="live-setting" class="hidden-sm hidden-xs"><a id="open-popup"><i class="fa fa-paint-brush"></i></a>-->
      <!--  <form id="popup">-->
      <!--    <h5 class="live-title">Site Color</h5>-->
      <!--    <div class="popup-inner">-->
      <!--      <div class="box-setting">-->
      <!--        <div class="pattern-color">-->
      <!--          <p>Pattern Color Variable:</p>-->
      <!--          <p class="text-small">( You can change any color as you want in source code. )</p>-->
      <!--          <div class="color-setting">-->
      <!--            <ul class="list-unstyled">-->
      <!--              <li class="colordefault"><span>Default</span><a></a></li>-->
      <!--              <li class="color01"><span>Pizza + Bread</span><a></a></li>-->
      <!--              <li class="color02"><span>Wine</span><a></a></li>-->
      <!--              <li class="color03"><span>Coffee</span><a></a></li>-->
      <!--              <li class="color04"><span>Vegetable</span><a></a></li>-->
      <!--              <li class="color05"><span>Cream</span><a></a></li>-->
      <!--            </ul>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--    <h5 class="live-title">Layout Options</h5>-->
      <!--    <div class="popup-inner">-->
      <!--      <div class="layout-setting"><a class="wide"> <span>Wide</span></a><a class="boxed"> <span>Boxed</span></a></div>-->
      <!--    </div>-->
      <!--    <div class="boxed-setting">-->
      <!--      <h5 class="live-title">Boxed layout images</h5>-->
      <!--      <div class="popup-inner">-->
      <!--        <div class="layout-boxed-bg"><a data-img="assets/images/layout-option/bg-01.jpg" class="bx-layout-img"><img src="assets/images/layout-option/bg-01.jpg" class="img img-responsive"></a><a data-img="assets/images/layout-option/bg-02.jpg" class="bx-layout-img"><img src="assets/images/layout-option/bg-02.jpg" class="img img-responsive"></a><a data-img="assets/images/layout-option/bg-03.jpg" class="bx-layout-img"><img src="assets/images/layout-option/bg-03.jpg" class="img img-responsive"></a></div>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </form>-->
      <!--</div>-->
      
      
    </div>
    <!-- jQuery-->
    <script src="assets/vendors/jquery-1.10.2.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <!-- Vendors-->
    <script src="assets/vendors/flexslider/jquery.flexslider-min.js"></script>
    <script src="assets/vendors/swipebox/js/jquery.swipebox.min.js"></script>
    <script src="assets/vendors/slick/slick.min.js"></script>
    <script src="assets/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/vendors/jquery-countTo/jquery.countTo.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/parallax/parallax.min.js"></script>
    <script src="assets/vendors/gmaps/gmaps.min.js"></script>
    <script src="assets/vendors/audiojs/audio.min.js"></script>
    <script src="assets/vendors/vide/jquery.vide.min.js"></script>
    <script src="assets/vendors/pageloading/js/svgLoader.min.js"></script>
    <script src="assets/vendors/pageloading/js/classie.min.js"></script>
    <script src="assets/vendors/pageloading/sidebartransition/js/sidebarEffects.min.js"></script>
    <script src="assets/vendors/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/vendors/wowjs/wow.min.js"></script>
    <script src="assets/vendors/skrollr.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/jquery-cookie/js.cookie.js"></script>
    <script src="../../../cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
    <!-- Own script-->
    <script src="assets/js/layout.js"></script>
    <script src="assets/js/elements.js"></script>
    <script src="assets/js/widget.js"></script>
  </body>

<!-- Mirrored from sun-themes.com/html/fooday/home-shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Aug 2018 14:59:41 GMT -->
</html>
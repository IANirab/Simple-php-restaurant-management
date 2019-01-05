<?php include "inc/header.php"; ?>
        <div class="page-container">
          <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-contact">
            <div class="container">

            <?php
            $id=5;
            $query = "select * from tbl_header where id='$id'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
              <div class="title-wrapper">
                <div data-top="transform: translateY(0px);opacity:1;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title"><?php echo $result['title']; ?></div>
                <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle"><?php echo $result['body']; ?></div>
              </div>
            <?php } } ?>
            </div>
          </div>
          <div class="page-content-wrapper">
            <section class="ct-info-section padding-top-100 padding-bottom-100">
              <div class="container">
                <div class="row">
                  <div class="col-md-8 col-sm-12">
                    <div class="swin-sc swin-sc-title style-2 text-left">
                      <p class="title"><span>Get In Touch</span></p>
                    </div>
                    <div class="reservation-form style-02">
                      <div class="swin-sc swin-sc-contact-form light mtl style-full">


<?php
        if (isset($_POST['contact'])) {
            $username = $_REQUEST['username'];
            $email = $_REQUEST['email'];
            $phone = $_REQUEST['phone'];
            $message = $_REQUEST['message'];

            if (empty($username) || empty($email) || empty($phone) || empty($message)) {
                echo "<div class='alert alert-danger'>"."All Fields are Requied !!"."</div>";
            } else {
                echo "<div class='alert alert-success'>"."Send Successfully!!"."</div>";
            }



            $username  =  mysqli_real_escape_string($db->link,$_POST['username']);
            $email  =  mysqli_real_escape_string($db->link,$_POST['email']);
            $phone  =  mysqli_real_escape_string($db->link,$_POST['phone']);
            $message  =  mysqli_real_escape_string($db->link,$_POST['message']);
                     
            if($username =='' || $email =='' || $phone =='' || $message =='') {
                $error = "Field Must not Be Empty";
            }else{
                $query = "INSERT INTO tbl_contactbox(name,email,phone,body) VALUES('$username','$email','$phone','$message')";
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


  //$mail->isSMTP(); //Remove When You upload website in Live Server .....#Pro_Nirab

  $id1=1;
  $query1 = "select * from tbl_sentmail where id='$id1'";
  $post1 = $db->select($query1);
            if($post1){
                while($result1 = $post1->fetch_assoc()){
    $mail1 = $result1['email'];
    $pass1 = $result1['password'];

  $mail->setFrom($mail1,'none');
  $mail->addAddress($mail1);
  $mail->addReplyTo($mail1,'none');
}
}


  $mail->isHTML(true);
  $mail->Subject='Contact Submission';
  $mail->Body= $result['body'];


  if ($mail->send()) {
    $result1="Message Sent Successfully";
  } else {
    $result1= "Try Again !! Message Not Sent";
  }

}

}
        
 ?>
                        <form action="contact.php" method="post">
                          <?php if (isset($_SESSION['email'])) { ?>
            <?php
            $id=$_SESSION['email'];
            $query = "select * from tbl_user where email='$id'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                            <input type="hidden" name="username" value="<?php echo $result['name']; ?>">
                          <?php } } } else {?>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" name="username" placeholder="Username" class="form-control">
                            </div>
                          </div>
                        <?php } ?>

                        <?php if (isset($_SESSION['email'])) { ?>
                          <input type="hidden" value="<?php echo $_SESSION['email']; ?>" name="email">
                        <?php } else { ?>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              <input type="text" name="email" placeholder="Email" class="form-control">
                            </div>
                          </div>
                        <?php } ?>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <div class="fa fa-phone"></div>
                              </div>
                              <input type="text" name="phone" placeholder="Phone" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <textarea placeholder="Message" name="message" class="form-control"></textarea>
                          </div>
                          <div class="form-group">
                            <div class="swin-btn-wrap">
                              <button type="submit" name="contact" class="swin-btn"><span>SEND</span></button>
                            </div>
                          </div>
                        </form>



                        
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="swin-sc swin-sc-title style-2 text-left">
                      <p class="title"><span>Contact Info</span></p>
                    </div>
                    <div class="swin-sc swin-sc-contact">

            <?php
            $query = "select * from tbl_hotel ";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                      <div class="media item">
                        <div class="media-left">
                          <div class="wrapper-icon"><i class="icons fa fa-map-marker"></i></div>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading title"><?php echo $result['name']; ?></h4>
                          <div class="description"><?php echo $result['address']; ?></div>
                        </div>
                      </div>
            <?php } } ?>
                      <div class="media item">
                        <div class="media-left">
                          <div class="wrapper-icon"><i class="icons fa fa-phone"></i></div>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading title">Phone Number</h4>
            <?php
            $query = "select * from tbl_phone ";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?><br>
                          <div class="description"><?php echo $result['number']; ?></div>

            <?php } } ?>
                        </div>
                      </div>
                      <div class="media item">
                        <div class="media-left">
                          <div class="wrapper-icon"><i class="icons fa fa-envelope"></i></div>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading title">Mail</h4>
                          <div class="description">
            <?php
            $query = "select * from tbl_mail ";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?><br>
                            <p><?php echo $result['mail']; ?></p>
            <?php } } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="map-section padding-bottom-100">
              <div class="container">
                <div id="map">
            <?php
            $query = "select * from tbl_map ";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                  <img src="assets/images/<?php echo $result['img']; ?>">
            <?php } } ?>
                </div>
              </div>
            </section>
          </div>
        </div>
<?php include "inc/footer.php"; ?>
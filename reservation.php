<?php include "inc/header.php"; ?>
        <div class="page-container">
          <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-reservation">
            <div class="container">
            <?php
            $id=2;
            $query = "select * from tbl_header where id='$id'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
              <div class="title-wrapper">
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title"><?php echo $result['title']; ?></div>
                <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle"><?php echo $result['body']; ?></div>
              </div>
            <?php } } ?>

            </div>
          </div>
          <div class="page-content-wrapper">
            <section class="section-reservation-form padding-top-100 padding-bottom-100">
              <div class="container">
                <div class="section-content">
                  <div class="swin-sc swin-sc-title style-2">
                    <h3 class="title"><span>Reservation Form</span></h3>
                  </div>
                  <div class="reservation-form">
                    <div class="row">
                      <div class="col-md-8 col-md-offset-2">
                        <p class="reservation-form-title text-center">We willing to help you make the reservation online to save your time and money or you can call us directly through the customer service hotline:

<?php
$query = "select * from tbl_phone limit 1";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){
?> 
              <span class="text-default"> <?php echo $result['number']; ?></span>
<?php } } ?>

                      </p>
                      </div>
                    </div>
                    <div class="swin-sc swin-sc-contact-form light mtl">







         <?php
        if (isset($_POST['table'])) {
            $username = $_REQUEST['username'];
            $email = $_REQUEST['email'];
            $phone = $_REQUEST['phone'];
            $people = $_REQUEST['people'];
            $dates = $_REQUEST['dates'];
            $time = $_REQUEST['time'];
            $message = $_REQUEST['message'];

            if (empty($username) || empty($email) || empty($phone) || empty($people) || empty($dates) || empty($time) || empty($message)) {
                echo "<div class='alert alert-danger'>"."All Fields are Requied !!"."</div>";
            } else {
                echo "<div class='alert alert-success'>"."Booking Successfully!!"."</div>";
            }



            $username  =  mysqli_real_escape_string($db->link,$_POST['username']);
            $email  =  mysqli_real_escape_string($db->link,$_POST['email']);
            $phone  =  mysqli_real_escape_string($db->link,$_POST['phone']);
            $people  =  mysqli_real_escape_string($db->link,$_POST['people']);
            $dates  =  mysqli_real_escape_string($db->link,$_POST['dates']);
            $time  =  mysqli_real_escape_string($db->link,$_POST['time']);
            $message  =  mysqli_real_escape_string($db->link,$_POST['message']);
                     
            if($username =='' || $email =='' || $phone =='' || $people =='' || $dates =='' || $time =='' || $message =='') {
                $error = "Field Must not Be Empty";
            }else{
                $query = "INSERT INTO tbl_books(name,email,dates,times,body,phone,person) VALUES('$username','$email','$dates','$time','$message','$phone','$people')";
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
  $id1=1;
  $query1 = "select * from tbl_sentmail where id='$id1'";
  $post1 = $db->select($query1);
            if($post1){
                while($result1 = $post1->fetch_assoc()){
    $mail1 = $result1['email'];
    $pass1 = $result1['password'];

  $mail->setFrom($mail1,'none');
  $mail->addAddress($email);
  $mail->addReplyTo($mail1,'none');
}
}

$query = "select * from tbl_mailbox WHERE cat='reform'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){

  $mail->isHTML(true);
  $mail->Subject='Reservation Form Submission';
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
        
 ?>

                      <form action="reservation.php" method="post">
                        <div class="form-group">
                            <?php if (isset($_SESSION['email'])) { ?>
                            <?php
                            $id=$_SESSION['email'];
                            $query = "select * from tbl_user where email='$id'";
                            $post = $db->select($query);
                            if($post){
                                while($result = $post->fetch_assoc()){
                            ?>
                          <div class="input-group">
                            <div style="display: none;" class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="hidden" name="username" placeholder="Username" value="<?php echo $result['name']; ?>" class="form-control">
                          </div>
                            <?php } } ?>

                            <?php } else { ?>

                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" name="username" placeholder="Username" class="form-control" required>
                          </div>
                            <?php } ?>


                      <?php if (isset($_SESSION['email'])) { ?>
                          <div class="input-group">
                            <div style="display: none;" class="input-group-addon"><i class="fa fa-envelope"></i></div>
                            <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Email" class="form-control">
                          </div>
                        <?php } else { ?>
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                            <input type="text" name="email" placeholder="Email" class="form-control" required>
                          </div>
                        <?php } ?>

                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <div class="fa fa-phone"></div>
                            </div>
                            <input type="text" name="phone" placeholder="Phone" class="form-control" required>
                          </div>
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-male"></i></div>
                            <select type="text" name="people" placeholder="People" class="form-control" required>
                              <option value="1">1 person</option>
                              <option value="2">2 People</option>
                              <option value="3">3 People</option>
                              <option value="4">4 People</option>
                              <option value="5">5 People</option>
                              <option value="6">6 People</option>
                              <option value="7">7 People</option>
                              <option value="8">8 People</option>
                              <option value="9">9 People</option>
                              <option value="10">10 People</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" name="dates" placeholder="Date" class="form-control datepicker" required>
                          </div>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <div class="fa fa-clock-o"></div>
                            </div>
                            <select type="text" name="time" placeholder="Time" class="form-control" required>
                              <option value="7:00 AM">7:00 AM</option>
                              <option value="8:00 AM">8:00 AM</option>
                              <option value="9:00 AM">9:00 AM</option>
                              <option value="10:00 AM">10:00 AM</option>
                              <option value="11:00 AM">11:00 AM</option>
                              <option value="12:00 AM">12:00 AM</option>
                              <option value="1:00 PM">1:00 PM</option>
                              <option value="2:00 PM">2:00 PM</option>
                              <option value="3:00 PM">3:00 PM</option>
                              <option value="4:00 PM">4:00 PM</option>
                              <option value="5:00 PM">5:00 PM</option>
                              <option value="6:00 PM">6:00 PM</option>
                              <option value="7:00 PM">7:00 PM</option>
                              <option value="8:00 PM">8:00 PM</option>
                              <option value="9:00 PM">9:00 PM</option>
                              <option value="10:00 PM">10:00 PM</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <textarea name="message" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                          <div class="swin-btn-wrap center">
                          <button type="submit" name="table" class="swin-btn"><span>Book Table</span></button>
                          </div>
                        </div>
                      </form>



                    </div>
                  </div>

            <?php
            $id=2;
            $query = "select * from tbl_logo where id='$id'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                  <div class="section-deco"><img src="assets/images/<?php echo $result['img']; ?>" alt="fooday" class="img-deco"></div>
                <?php } } ?>

                </div>
              </div>
            </section>
            <section data-bottom-top="background-position: 50% 100px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" class="section-reservation-service padding-top-100 padding-bottom-100">
              <div class="container">
                <div class="section-content">
                  <div class="swin-sc swin-sc-title style-2 light">
                    <h3 class="title"><span>Fooday Best Service</span></h3>
                  </div>
                  <div class="swin-sc swin-sc-iconbox light">
                    <div class="row">

            <?php
            $query = "select * from tbl_rservices order by number asc";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="item icon-box-02 wow fadeInUpShort">
                          <div class="wrapper-icon"><?php echo $result['icon']; ?><span class="number"><?php echo $result['number']; ?></span></div>
                          <h4 class="title"><?php echo $result['title']; ?></h4>
                          <div class="description"><?php echo $result['body']; ?></div>
                        </div>
                      </div>
            <?php } } ?>


                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="section-reservation-events padding-top-100 padding-bottom-100">
              <div class="container">
                <div class="section-content">
                  <div class="swin-sc swin-sc-title style-2">
                    <h3 class="title"><span>Upcoming Events</span></h3>
                  </div>
                  <div class="row">



            <?php
            $query = "select * from tbl_event order by id desc";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="swin-sc swin-sc-event swin-transition wow fadeInLeft">
                        <div class="swin-sc-event-inner">
                          <div class="event-info clearfix">
                            <div class="event-date"><span class="day"><?php echo $result['dates']; ?></span><span class="month"><?php echo $result['month']; ?></span></div>
                            <div class="event-title"><a href="http://<?php echo $result['link']; ?>" class="swin-transition"><?php echo $result['title']; ?></a></div>
                          </div>
                          <div class="event-featured-img"><img src="assets/images/event/<?php echo $result['img']; ?>" alt="fooday" class="img img-responsive"></div>
                          <div class="event-countdown swin-transition">
                            <div class="event-countdown-inner">
                              <div class="event-img"><img src="assets/images/event/<?php echo $result['img']; ?>" alt=""></div>
                              <ul class="event-countdown-content list-inline nav-justified">
                                <li><span class="num"><?php echo $result['day']; ?></span><span class="cap">/days</span></li>
                                <li><span class="num"><?php echo $result['food']; ?></span><span class="cap">/foods</span></li>
                                <li><span class="num"><?php echo $result['guests']; ?></span><span class="cap">/guests</span></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
<?php } } ?>



                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

<?php include "inc/footer.php"; ?>
  <?php
  require 'phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;

  $mail->Host='smtp.gmail.com';
  $mail->Port=587;
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='tls';
  $mail->Username='kingb5861@gmail.com';
  $mail->Password='01712611078';



  $mail->isSMTP();
  $mail->setFrom('kingb5861@gmail.com','from paroshi');
  $mail->addAddress('istiaqanirab202@gmail.com');
  $mail->addReplyTo('kingb5861@gmail.com');


  $mail->isHTML(true);
  $mail->Subject='Form Submission';
  $mail->Body= 'Paroshi';

  if ($mail->send()) {
    $result1="Message Sent Successfully";
  } else {
    $result1= "Try Again !! Message Not Sent";
  }
  echo $result1;
  ?>
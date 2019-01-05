<?php include "inc/header.php"; ?>
<style type="text/css"> 
@media (min-width: 992px)
.pb-lg-5, .py-lg-5 {
    padding-bottom: 3rem !important;
}
@media (min-width: 992px)
.pt-lg-5, .py-lg-5 {
    padding-top: 3rem !important;
}
@media (min-width: 992px)
.pl-lg-4, .px-lg-4 {
    padding-left: 1.5rem !important;
}
@media (min-width: 992px)
.pr-lg-4, .px-lg-4 {
    padding-right: 1.5rem !important;
}
h3.tittle-w3layouts {
    color: #353434;
    font-size: 3em;
    text-align: left;
    letter-spacing: 1px;
    font-weight: 400;
    text-shadow: 0 2px 12px rgba(0, 0, 0, 0.14);
}
@media (min-width: 992px)
.mb-lg-4, .my-lg-4 {
    margin-bottom: 1.5rem !important;
}
@media (min-width: 992px)
.mt-lg-4, .my-lg-4 {
    margin-top: 1.5rem !important;
}
.checkout-left {
    margin: 2em 0 0;
}
.checkout-right h4, .address_form h4 {
    font-size: 1.1em;
    margin: 1em 0;
    letter-spacing: 1px;
    color: #888;
}
table.timetable_sub {
    width: 100%;
    margin: 0 auto;
}
table {
    border-collapse: collapse;
}
.timetable_sub thead {
    background: #004284;
}
.timetable_sub th, .timetable_sub td {
    text-align: center;
    padding: 7px;
    font-size: 16px;
    color: #868282;
}
.timetable_sub th {
    background: #212121;
    color: #fff !important;
    text-transform: capitalize;
    font-size: 13px;
    border-right: 1px solid #ded2d2;
}
.timetable_sub td {
    border: 1px solid #CDCDCD;
}
.checkout-left-basket {
    float: left;
    padding-left: 0;
}
section.banner-bottom-wthreelayouts.py-lg-5.py-3{
  margin: 200px 0px;
}

</style>


<?php if(isset($_SESSION['email'])) { ?>
  
  <!--checkout-->
  <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container">
      <div class="inner-sec-shop px-lg-4 px-3">
        <h3 class="tittle-w3layouts my-lg-4 mt-3"> Check-Out </h3>
        <div class="checkout-right">

          <table class="timetable_sub">
            <thead>
              <tr>
                <th>SL No.</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
<tbody>
<?php if (!empty($_SESSION["shopping_cart"])) {
  $total = 0;
  foreach ($_SESSION["shopping_cart"] as $key => $value) {
   
?>
              <tr class="rem1">
                <td class="invert">1</td>
                <td class="invert-image">
                  <img style="width: 400px;" src="assets/images/product/<?php echo $value['img']; ?>" alt=" " class="img-responsive">
                </td>

                <td class="invert"><?php echo $value["title"]; ?></td>
                <td class="invert"><?php echo $value["price"]; ?></td>
                <td class="invert"><?php echo $value["quantity"]; ?></td>

                <td class="invert" id="price">$<?php echo $value['price'] * $value['quantity'];?></td>
              </tr>

<?php
}
} 
?>
  
            </tbody>    
          </table>
        </div>


<?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title   = $_REQUEST['title'];
        $grandtotal   = $_REQUEST['grandtotal'];
        $quantity   = $_REQUEST['quantity'];
        $img   = $_REQUEST['img'];

        $pmail   = $_REQUEST['pmail'];
        




            if (empty($title) ||empty($grandtotal) || empty($quantity) || empty($img) || empty($pmail)) {
                echo "<div class='alert alert-danger'>"."All Fields are Requied !!"."</div>";
            } else {
                echo "<div class='alert alert-success'>"."Ordered Successfully!!"."</div>";
            }




for ($i= 0; $i < count($_POST['title']); $i++) { // added for loop


if(isset($_POST['title'][$i])){

    $title =  mysqli_real_escape_string($db->link,$_POST['title'][$i]); // added [$i]
    $grandtotal =  mysqli_real_escape_string($db->link,$_POST['grandtotal'][$i]);
    $quantity =  mysqli_real_escape_string($db->link,$_POST['quantity'][$i]);
    $email =  mysqli_real_escape_string($db->link,$_POST['pmail'][$i]);
    $img =  mysqli_real_escape_string($db->link,$_POST['img'][$i]);
    $price =  mysqli_real_escape_string($db->link,$_POST['price'][$i]);
    $date =  mysqli_real_escape_string($db->link,$_POST['date'][$i]);
    

    if($title =='' || $grandtotal =='' || $quantity =='' || $email =='' || $img ==''){
    $error = "Field Must not Be Empty";
    }else{
        $query = "INSERT INTO tbl_orders(title,price,img,qty,email,grandtotal,date1) VALUES('$title','$price','$img','$quantity','$email','$grandtotal','$date')";
         $create  =   $db->update($query);


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


  $mail->setFrom($mail1,'None');
  $mail->addAddress($email);
  $mail->addReplyTo($mail1,'None');

}
}


$query = "select * from tbl_mailbox WHERE cat='checkout'";
$post = $db->select($query);
if($post){   
   while($result = $post->fetch_assoc()){

  $mail->isHTML(true);
  $mail->Subject='ordered Successfully !';
  $mail->Body= $result['body'];
}
}
  if ($mail->send()) {
    $result1="Message Sent Successfully";
  } else {
    $result1= "Try Again !! Message Not Sent";
  }


         unset($_SESSION["shopping_cart"]);
         
    }
}

}
}      
?>

<form action="checkout.php" method="post">
<?php
 if (!empty($_SESSION["shopping_cart"])) {
  $total = 0;
  $totalAll = 0;
  foreach ($_SESSION["shopping_cart"] as $key => $value) {   
    $totalAll += ($value['quantity']*$value['price']);
   
?>
<input type="hidden" name="title[]" value="<?php echo $value['title']; ?>">
<input type="hidden" name="price[]" value="<?php echo $value['price']; ?>">
<input type="hidden" value="<?php echo $value['img']; ?>" name="img[]">
<input type="hidden" value="<?php echo $value['quantity']; ?>" name="quantity[]">
<input type="hidden" value="<?php echo $totalAll; ?>" name="grandtotal[]">
<input type="hidden" value="<?php echo $_SESSION['email']; ?>" name="pmail[]">
<input type="hidden" value="<?php echo date("Y/m/d"); ?>" name="date[]">
<?php } } ?>
<br>
<br>

<?php if (!empty($_SESSION["shopping_cart"])) {
  $totalAll = 0;
  foreach ($_SESSION["shopping_cart"] as $key => $value) {
  

$totalAll += ($value['quantity']*$value['price']);

}
} else {
  $totalAll=0;
}
?> 
<p style="float: right;" class="h4">Total Price: <?php echo $totalAll;?></p><br> 
<hr>

<p class="h3">Checkout with : </p>
<br>

  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_M6QqxO3ySaR8SHJ1AepTZ3rJ"
    data-amount="<?php echo $totalAll * 100;?>"
    data-name="Food Factory"
    data-description="Payments By Card"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>

<!-- <button type="submit">Checkout</button> -->
</form>

        <div class="checkout-left row">
          <div class="clearfix"> </div>

        </div>

      </div>

    </div>
  </section>
  <!--//checkout-->
<?php } ?>
<?php include "inc/footer.php"; ?>
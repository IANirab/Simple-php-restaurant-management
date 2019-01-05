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
				<h3 class="tittle-w3layouts my-lg-4 mt-3">Your Cart </h3>
				<div class="checkout-right">
					<h4>Your shopping cart contains: <?php if (isset($_SESSION['shopping_cart'])) {
                      echo count($_SESSION["shopping_cart"]);
                    } else {
                      echo 0;
                    } ?>
						<span>Products</span>
					</h4>
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Image</th>
								<th>Product Name</th>
								<th>Quantity</th>

								<th>Price</th>
								<th>Remove</th>
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
								<td class="invert"><?php echo $value["quantity"]; ?></td>

								<td class="invert" id="price">$<?php echo $value['price'] * $value['quantity'];?></td>
								<td class="invert">
									<div class="rem">

										<div class="close1"><a href="list.php?action=delete&id=<?php echo $value['id']; ?>"><img src="assets/images/close.jpg"></a></div>
									</div>
								</td>
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
        $address   = $_REQUEST['address'];




            if (empty($title) ||empty($grandtotal) || empty($quantity) || empty($img) || empty($pmail) || empty($address)) {
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

    if($title =='' || $grandtotal =='' || $quantity =='' || $email =='' || $img ==''){
    $error = "Field Must not Be Empty";
    }else{
        $query = "INSERT INTO tbl_orders(title,price,img,qty,email,grandtotal) VALUES('$title','$price','$img','$quantity','$email','$grandtotal')";
         $create  =   $db->update($query);
         unset($_SESSION["shopping_cart"]);

    }
}

}
}      
?>
<br><br>
<?php if (!empty($_SESSION['shopping_cart'])) { 
for ($i=0; $i < count($_SESSION['shopping_cart']); $i++) { 
    if ($i == 0) { ?>
<a href="checkout.php"><button type="button" class="btn btn-primary">Checkout</button></a>

<?php } else { ?>



<?php } } } ?>


				<div class="checkout-left row">
<?php //echo $amount =$product['price']*$product['quanlity']; ?>
					<div class="clearfix"> </div>

				</div>

			</div>

		</div>
	</section>
	<!--//checkout-->
<?php } else { ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<h3 style="text-align: center;">You Need To Log-in For View Your Cart !!</h3>



<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php } ?>

<?php include "inc/footer.php"; ?>
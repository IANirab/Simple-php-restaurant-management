<?php 
session_start();
$pid = $_GET['hidden_id'];
$qty = $_GET['quanlity'];



if (isset($_SESSION['productcart'])) {
	$currentNo = $_SESSION['counter']+1;
	$_SESSION['productcart'][$currentNo];

	$_SESSION['productcart'][$currentNo] = $pid;
	$_SESSION['qtycart'][$currentNo] = $qty;

	$_SESSION['counter'] = $currentNo;
	
}else {
	$productcart = array();
	$qtycart = array();
	$_SESSION['productcart'][0] = $pid;
	$_SESSION['qtycart'][0] = $qty;
	$_SESSION['counter'] = 0;

}
header("location:../list.php");
?>
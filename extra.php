<?php 
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	header("location:blog-single.php?id=$id");
}
?>

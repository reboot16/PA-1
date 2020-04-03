<?php ob_start();

	require_once(dirname(__FILE__).'/function.php');
	$id = $_GET['items_id'];
  $query = "DELETE FROM cart WHERE id_cart ='$id'";
	$exect = mysqli_query($conn,$query);
  header('location:cart.php?add=1');
?>

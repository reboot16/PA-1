<?php
	require_once(dirname(__FILE__).'/commons/header.php');
	require_once(dirname(__FILE__).'/function.php');
	$itemId = $_SESSION['item_id'];
	$userid = $_SESSION['id'];
	$jumlah = $_POST['jumlah'];
	$pesanan_khusus = $_POST['pesanan_khusus'];
	
	$qgetcart = "SELECT * FROM cart WHERE id_user = '$userid'";
	$goq = mysqli_query($conn,$qgetcart);
	$cart =mysqli_fetch_array($goq);
	if($itemId == $cart['id_produk'])
	{
		$idcart = $cart['id_cart'];
		$jum = $cart['jumlah_produk'];
		$jumak = $jumlah+$jum;
		$qup = "UPDATE cart SET jumlah_produk='$jumak' WHERE id_cart = '$idcart'";
		$goqup = mysqli_query($conn,$qup);
	}
	else
	{
	$query = "SELECT * FROM produk WHERE id_produk = $itemId";
	$exect = mysqli_query($conn,$query);
	$items = mysqli_fetch_array($exect);
	$total = $jumlah * $items['harga'];
	$add = "INSERT INTO cart VALUES(NULL,'$itemId','$userid','$jumlah','$total', '$pesanan_khusus')";
	$addto = mysqli_query($conn, $add);
	}
	header('Location:cart.php?add=1');
?>

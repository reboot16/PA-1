<?php ob_start();
	include "function.php";
	
	$id = $_GET['items_id'];
    $query = "DELETE FROM produk WHERE id_produk='$id'";
	if($conn->query($query)==true){
		echo"<script>alert('Hapus Produk Berhasil');</script>";
	}
    header('Refresh:0 url=admin.php');
?>
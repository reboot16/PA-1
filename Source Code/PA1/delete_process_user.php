<?php ob_start();
	include "function.php";
	
	$id = $_GET['id_users'];
    $query = "DELETE FROM users WHERE id='$id'";
	if($conn->query($query)==true){
		echo"<script>alert('Hapus User Berhasil');</script>";
	}
    header('Refresh:0 url=user.php');
?>
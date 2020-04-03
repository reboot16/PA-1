<?php
	global $conn;
	$conn = mysqli_connect("localhost", "root", "", "pu");

	//$conn = mysqli_connect("localhost", "p1d4ti08", "6YsE4o1p", "p1d4ti08_pu");
		
	if(!$conn){
		die("Masalah Pada Database");
	}
	$db_use = mysqli_select_db($conn, "pu") or die("Select Database Problem !!");
?>

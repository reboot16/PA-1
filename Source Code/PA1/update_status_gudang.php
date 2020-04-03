<?php
  if(isset($_POST['edit']))
  {
    include('function.php');

    $id = $_GET['id_transaksi'];
	$status_transaksi = $_POST['status_transaksi'];
    
	$hasil = mysqli_query($conn, "UPDATE transaksi SET status_transaksi='$status_transaksi' WHERE id_transaksi='$id'");
	
    if($hasil)
    {
	  echo"<script>alert('Status Transaksi Telah Diperbarui');</script>";
      header("Refresh:0 url=gudang.php");
    }
    else {
      echo "Ada Masalah";
    }
  }
  else {
    header('Location:login.php');
  }
?>

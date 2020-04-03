<?php
  if(isset($_POST['edit']))
  {
    include('function.php');

    $id = $_GET['id_transaksi'];
	$status_transaksi = $_POST['status_transaksi'];
	$qgettransaksi = "SELECT * FROM transaksi WHERE id_transaksi = $id";
	$gotrans = mysqli_query($conn,$qgettransaksi);
	$trans = mysqli_fetch_array($gotrans);
	if($trans['status_transaksi']== 1 && $trans['bukti']== 'NULL')
	{
		echo "<script>alert('Belum ada Bukti transaksi');</script>";
		//header('Location:daftar_transaksi.php');
	}
	else
	{
	if($trans['status_transaksi'] == 1)
	{
		$qgetdetail = "SELECT * FROM detail_transaksi WHERE id_transaksi = $id";
		$godetail = mysqli_query($conn,$qgetdetail);
		while($det=mysqli_fetch_array($godetail))
		{
			$jumlah_produk = $det['jumlah'];
			$id_produk = $det['id_produk'];
			$qgetpr = "SELECT * FROM produk WHERE id_produk = $id_produk";
			$go = mysqli_query($conn,$qgetpr);
			$pr = mysqli_fetch_array($go);
			$qty = $pr['stock'];
			$prqt = $qty - $jumlah_produk;
			$qupdt = "UPDATE produk SET stock='$prqt' WHERE id_produk='$id_produk'";
			$goqupdt = mysqli_query($conn,$qupdt);
		}
	}
	$hasil = mysqli_query($conn, "UPDATE transaksi SET status_transaksi='$status_transaksi' WHERE id_transaksi='$id'");
	
    if($hasil)
    {
	  echo"<script>alert('Status Transaksi Telah Diperbarui');</script>";
      header("Refresh:0 url=daftar_transaksi.php");
    }
    else {
      echo "Ada Masalah";
    }
	}
  }
  else {
    header('Location:login.php');
  }
?>

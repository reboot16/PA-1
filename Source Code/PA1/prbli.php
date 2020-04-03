<?php
	  session_start();
	  $telp = $_POST['no_telp'];
      $alamat = $_POST['alamat'];
      $iden = $_POST['iden'];
	 function isi_keranjang()
      {
        include "function.php";
        $isikeranjang = array();
        $sid = $_SESSION['id'];
        $qker = "SELECT * FROM cart WHERE id_user ='$sid'";
        $sql = mysqli_query($conn,$qker);

        while ($r=mysqli_fetch_array($sql)) {
            $isikeranjang[] = $r;
        }
        return $isikeranjang;
      }
	  
	$isikeranjang = isi_keranjang();
    $jml = count($isikeranjang);
	$flag =0;
	for($i=0;$i<$jml;$i++)
	{
		$idpr = $isikeranjang[$i]['id_produk'];
		$qgetpr = "SELECT * FROM produk WHERE id_produk = $idpr";
		$gqpr = mysqli_query($conn,$qgetpr);
		$pro = mysqli_fetch_array($gqpr);
		$qtpr = $pro['stock'];
		if($isikeranjang[$i]['jumlah_produk'] > $qtpr)
		{
			echo "<script>alert('Stock Produk Tidak Tersedia Lagi');</script>";
			header('cart.php');
		}
		else
		{
			$flag = 1;
		}
	}
	if($flag == 1)
	{
			$_SESSION['no_telp'] =  $telp;
			$_SESSION['alamat'] = $alamat;
			$_SESSION['iden'] = $iden;
			header("Location:beli.php?trans=1");		
	}
?>
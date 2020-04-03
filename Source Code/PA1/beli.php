<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Transaksi | Parna Ulos</title>

		<link rel="icon" type="image/png" href="img/parna_logo.png">
		<link rel="stylesheet" href="css/style.css">

		<!-- Bootstrap-->
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/jquery.bxslider.css">
	</head>
	<body>
		<!-- Heaader-->
    <?php
			require_once(dirname(__FILE__).'/commons/header.php');
			if(isset($_SESSION['is_logged_in']))
			{
				if(isset($_GET['trans']))
				{

		?>
    <?php

      include "function.php";
	  $telp = $_SESSION['no_telp'];
      $alamat = $_SESSION['alamat'];
      $iden = $_SESSION['iden'];
      $iduser = $_SESSION['id'];
      $total_harga = $_SESSION['total_harga'];

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
		
    $tgl_skrg = date("Y-m-d");
    $qtanggal = "INSERT INTO transaksi VALUES(NULL,'$iduser','$alamat','$iden','$telp','$total_harga','$tgl_skrg','NULL',1)";
    $etanggal = mysqli_query($conn,$qtanggal);
    $seltab = "SELECT * FROM transaksi WHERE   id_user = '$iduser' AND  tanggal_transaksi =' $tgl_skrg' AND alamat_tujuan = '$alamat' AND identitas_penerima = '$iden' AND nomor_telepon = '$telp' AND total_pembayaran = '$total_harga'";
    $etab = mysqli_query($conn,$seltab);
    $orderan = mysqli_fetch_array($etab);
    $id_orders = $orderan['id_transaksi'];
    

    for ($i = 0; $i < $jml; $i++){
      $id_produk = $isikeranjang[$i]['id_produk'];
      $jumlah_produk = $isikeranjang[$i]['jumlah_produk'];
	  $pesanan_khusus = $isikeranjang[$i]['pesanan_khusus'];
      $qdet = "INSERT INTO detail_transaksi VALUES('$id_orders','$id_produk','$jumlah_produk','$pesanan_khusus')";
      $jalankan = mysqli_query($conn,$qdet);
    }
		/*for ($i = 0; $i < $jml; $i++){
			$jumlah_produk = $isikeranjang[$i]['jumlah_produk'];
			$id_produk = $isikeranjang[$i]['id_produk'];
			$qgetpr = "SELECT * FROM produk WHERE id_produk = $id_produk";
			$go = mysqli_query($conn,$qgetpr);
			$pr = mysqli_fetch_array($go);
			$qty = $pr['stock'];
			$prqt = $qty - $jumlah_produk;
			$qupdt = "UPDATE produk SET stock='$prqt' WHERE id_produk='$id_produk'";
			$goqupdt = mysqli_query($conn,$qupdt);
    }*/
	for ($i = 0; $i < $jml; $i++) {
      $id_cart = $isikeranjang[$i]['id_cart'];
      $qdel = "DELETE FROM cart WHERE id_cart = $id_cart";
      $jalan = mysqli_query($conn,$qdel);
    }


    ?>

		<?php
			require_once(dirname(__FILE__).'/commons/menubar.php');
		?>
		<div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="transaksi">
						<div class="panel panel-heading">
								<h3>TRANSAKSI ANDA</h3><hr class="pg-titl-bdr-btv"></hr>
							</div>
            
							<?php
								$qgettr = "SELECT * FROM transaksi WHERE id_transaksi = $id_orders";
								$qgetdt = "SELECT * FROM detail_transaksi WHERE id_transaksi = $id_orders";
								$eqgettr = mysqli_query($conn,$qgettr);
								$eqgetdt = mysqli_query($conn,$qgetdt);
								$det = mysqli_fetch_array($eqgetdt);
								$kh = $det['pesanan_khusus'];
								$tran = mysqli_fetch_array($eqgettr);
								$stat = $tran['status_transaksi'];
								$qgetst = "SELECT * FROM status_transaksi WHERE id_status = $stat";
								$eqgetst = mysqli_query($conn,$qgetst);
								$status = mysqli_fetch_array($eqgetst);
							 ?>
							
									<p>Nomor Order <font color="red">*</font> : <?=$tran['id_transaksi']?></p>
						 			<p>Tanggal Transaksi : <?=$tran['tanggal_transaksi']?></p>
						 			<p>Alamat Tujuan : <?=$tran['alamat_tujuan']?></p>
						 			<p>Identitas Penerima : <?=$tran['identitas_penerima']?></p>
									
						 			<p>Total Pembayaran : Rp <?=number_format($tran['total_pembayaran'])?></p>
									<p>Pesanan Khusus : <?=$kh?> </p>
						 			<p>Status Pesanan : <?=$status['nama']?></td>

						 	
						</div>
						<div class="col-md-4">
							<img src="img/mandiri.png"><br><br>
							<h4>No Rekening : 141 - 0021 - 778899</h4>
							<h4>Atas Nama : A. Sigalingging</h4>
						 </div>
						 <div class="col-md-4">
							<img src="img/bni.png"><br><br>
							<h4>No Rekening : 22 - 7575 - 8998</h4>
							<h4>Atas Nama : A. Sigalingging</h4>
						 </div>
						 <div class="col-md-4">
							<img src="img/bri.png"><br><br>
							<h4>No Rekening : 0360 - 010000 - 279 - 306</h4>
							<h4>Atas Nama : A. Sigalingging</h4>
						</div>
						<font color="red">*</font> Gunakan Nomor Order untuk proses pembayaran.<br><br>
						</div>
					</div>
					</div>


    <?php
	};
		if(!isset($_GET['trans']))
		{
		require_once(dirname(__FILE__).'/commons/menubar.php');

			include "function.php";
			$iduser = $_SESSION['id'];
			?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="about">
							<div class="panel panel-heading">
									<h3>RIWAYAT TRANSAKSI ANDA</h3><hr class="pg-titl-bdr-bta"></hr>
								</div>
							<table class="table">
								<thead>
									<tr>

										<th>Id Order</th>
										<th>Tanggal Transaksi</th>
										<th>Alamat Tujuan</th>
										<th>Identitas Penerima</th>
										<th>Produk (Jumlah)</th>
										<th>Total Pembayaran</th>
										<th>Pesanan Khusus</th>
										<th>Bukti Pembayaran</th>
										<th>Status Transaksi</th>

										<th>Operasi</th>
									</tr>
								</thead>
								<?php

									$qgettr = "SELECT * FROM transaksi WHERE id_user = $iduser";
									$eqgettr = mysqli_query($conn,$qgettr);
									while($tran = mysqli_fetch_array($eqgettr))
									{
									$id_orders = $tran['id_transaksi'];
									$qgetdt = "SELECT * FROM detail_transaksi WHERE id_transaksi = $id_orders";
									$eqgetdt = mysqli_query($conn,$qgetdt);
									$stat = $tran['status_transaksi'];
									$qgetst = "SELECT * FROM status_transaksi WHERE id_status = $stat";
									$eqgetst = mysqli_query($conn,$qgetst);
									while($status = mysqli_fetch_array($eqgetst))
									{
								 ?>
								<tbody>
									<tr>
										<td><?=$tran['id_transaksi']?></td>
										<td><?=$tran['tanggal_transaksi']?></td>
										<td><?=$tran['alamat_tujuan']?></td>
										<td><?=$tran['identitas_penerima']?></td>
										<td>
										<?php
											while($detail = mysqli_fetch_array($eqgetdt))
											{  $idpr = $detail['id_produk'];
												$kh = $detail['pesanan_khusus'];
		                    $qprod = "SELECT * FROM produk WHERE id_produk = $idpr";
		                    $gprod = mysqli_query($conn,$qprod);
		                    $prod = mysqli_fetch_array($gprod);
		                  ?>
		                  - <?=$prod['nama']?>&nbsp;(<?=$detail['jumlah']?>)<br>
		                  <?php
		                  }
		                ?>
									</td>
										<td>Rp <?=number_format($tran['total_pembayaran'])?></td>
										<td><?=$kh?></td>
										<td><?=$tran['bukti']?></td>
										<td><?=$status['nama']?></td>
										

										<?php
											if($tran['status_transaksi'] == 1)
											{
										?>
										<td colspan="2">
											<a href="view_transaksi_user.php?id=<?=$tran['id_transaksi']?>"><button name="kirim" class="btn btn-primary"><i class="fa fa-send"></i> Kirim Bukti Pembayaran</button></a>
										</td>
										<?php
									}
								 ?>
									</tr>
									<?php
									}
								}
								 ?>
								</tbody>
							</table>
							</div>
							</div>
						</div>
					</div>


			<?php
		};
	};
	?>
	<?php
 if(!isset($_SESSION['is_logged_in'])) {
	 header('Location:login.php');
	}
      require_once(dirname(__FILE__).'/commons/footer.php');
    ?>

    <!-- Scroll Up Button -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x active"></i></a>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.singlePageNav.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/wow.min.js"></script>
    <script>wow = new WOW({}).init();</script>
    <script>
      $('.carousel').carousel({			//Waktu Carousel
        interval: 5000
      })
    </script>
    </body>
    </html>

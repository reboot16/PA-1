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
  include "function.php";
  $id = $_GET['id'];
  $query =("SELECT * FROM transaksi WHERE id_transaksi = $id");
  $go =  mysqli_query($conn,$query);
  $trans = mysqli_fetch_array($go);
	$iduser = $trans['id_user'];
	$qgetuser = "SELECT * FROM users WHERE id = $iduser";
	$gousr = mysqli_query($conn,$qgetuser);
	$user = mysqli_fetch_array($gousr);
	$iddt = $trans['id_transaksi'];
	$qgetpr = "SELECT * FROM detail_transaksi WHERE id_transaksi = $iddt";
	$gpr = mysqli_query($conn,$qgetpr);
  require_once(dirname(__FILE__).'/commons/menubar.php');
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="transaksi">
	  <h3>DATA TRANSAKSI</h3> <hr class="pg-titl-bdr-btv"></hr><br>

        <p>Id Transaksi &emsp;&emsp;&emsp;&emsp;: <?=$trans['id_transaksi']?></p>

        <p>Tanggal Pemesanan &nbsp;: <?=$trans['tanggal_transaksi']?></p>

        <p>Pembeli &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;: <?=$user['nama']?></p>

        <p>Alamat Tujuan &emsp;&emsp;&emsp;: <?=$trans['alamat_tujuan']?></p>

        <p>Identitas Penerima&emsp;&nbsp;: <?=$trans['identitas_penerima']?></p>

				<p>Produk (Jumlah)&emsp;&emsp;&nbsp;:<br>
					<?php
						while($pr = mysqli_fetch_array($gpr))
						{
							$idpr = $pr['id_produk'];
							$qprod = "SELECT * FROM produk WHERE id_produk = $idpr";
							$gprod = mysqli_query($conn,$qprod);
							$prod = mysqli_fetch_array($gprod);
						?>
						- <?=$prod['nama']?>&nbsp;(<?=$pr['jumlah']?>)<br>
						<?php
						}
					?>
				</p>

        <p>Total Pembayaran &emsp;&nbsp;: Rp <?=number_format($trans['total_pembayaran'])?>.00</p>
				<p>Bukti Pembayaran &emsp;&nbsp;:</p>
				<?php
					$idt = $trans['id_transaksi'];
					$query = "SELECT * FROM transaksi WHERE id_transaksi = $idt";
					$go = mysqli_query($conn,$query);
					$pemb = mysqli_fetch_array($go);
					$nama = $pemb['bukti'];
				?>
				<center><img src="img/bukti/<?=$nama?>" class="img-thumbnail" alt="Bukti Bayaran Belum Dikirim"></center>

		<form action="update_status.php?id_transaksi=<?php echo $id ?>" method="post">
			<p>Status Pesanan <font color="red">*</font>&emsp;&emsp;&nbsp; :<br>
			</p>
			<div class="form-group">
				<select name="status_transaksi" class="form-control" required />
					<option value="2">Dikonfirmasi</option>
					<option value="4">Selesai</option>
				</select>
			</div>
			<center><button type="submit" name="edit" class="btn btn-success">UPDATE STATUS</button>
		</form>
		</center>
      </div>
	  <font color="red">*</font> Status Pesanan Dikonfirmasi Bila Bukti Pembayaran Telah Dikirim.<br>
	  <font color="red">*</font> Status Pesanan Selesai Bila Telah Melewati Status Packet.<br><br>
    </div>
  </div>
</div>


    <?php
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

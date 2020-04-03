<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Beranda | Parna Ulos</title>

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
if(!isset($_SESSION['is_logged_in']))
{
	header('Location:login.php');
}
  require_once(dirname(__FILE__).'/commons/header.php');
  include "function.php";
  $id = $_GET['id'];
  $query =("SELECT * FROM transaksi WHERE id_transaksi = $id");
  $go =  mysqli_query($conn,$query);
  $trans = mysqli_fetch_array($go);
  require_once(dirname(__FILE__).'/commons/menubar.php');
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="transaksi">
	  <h3>DATA TRANSAKSI</h3> <hr class="pg-titl-bdr-btv"></hr><br>

        <p>Id Transaksi : <?=$trans['id_transaksi']?></p>

        <p>Tanggal Pemesanan : <?=$trans['tanggal_transaksi']?></p>

        <p>Pembeli : <?=$trans['id_user']?></p>

        <p>Alamat Tujuan : <?=$trans['alamat_tujuan']?></p>

        <p>Identitas Penerima : <?=$trans['identitas_penerima']?></p>

        <p>Produk : <?=$trans['id_transaksi']?></p>

        <p>Total Pembayaran : <?=$trans['total_pembayaran']?></p>

		<form action="update_status.php?id_transaksi=<?php echo $id ?>" method="post">
			<p>Status Pesanan :<br>
			</p>
			<div class="form-group">
				<select name="status_transaksi" class="form-control" required />
					<option value="2">Dikonfirmasi</option>
					<option value="4">Selesai</option>
				</select>
			</div>
			<center><button type="submit" name="edit" class="btn btn-success">UPDATE STATUS</button>
		</form>
		<a href="bukti_pembayaran.php"><button type="submit" class="btn btn-primary">VIEW BUKTI</button></a>
		</center>
      </div>
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

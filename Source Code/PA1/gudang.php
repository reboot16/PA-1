<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Gudang | Parna Ulos</title>

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
		?>

		<!--Menubar-->
		<?php
			require_once(dirname(__FILE__).'/commons/menubar.php');
		?>

		<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="index.php"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
						<li><a href="#">Gudang</a></li>
					</ul>
				</div>
			</div>
		</div>
		</section>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="about">
		  <div class="panel panel-heading">
            <h3>DAFTAR PESANAN YANG MASUK</h3><hr class="pg-titl-bdr-bta"></hr>
		  </div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Pembeli</th>
                  <th>Alamat Tujuan</th>
                  <th>Identitas Penerima</th>
				  <th>Nomor Telepon</th>
                  <th>Produk (Jumlah)</th>
                  <th>Total Pembayaran</th>
                  <th>Status Pemesanan</th>
                </tr>
              </thead>
<?php
if(isset($_SESSION['is_logged_in']))
{
include "function.php";
$userid = $_SESSION['id'];
$query = "SELECT * FROM transaksi WHERE status_transaksi = 2";
$gquery = mysqli_query($conn,$query);
while($trans = mysqli_fetch_array($gquery))
{

    $id = $trans['id_transaksi'];
    $usrid = $trans['id_user'];
    $querget = "SELECT * FROM users WHERE id = '$usrid'";
    $gusr = mysqli_query($conn,$querget);
    $user = mysqli_fetch_array($gusr);
    $qgetpr = "SELECT * FROM detail_transaksi WHERE id_transaksi = $id";
    $gpr = mysqli_query($conn,$qgetpr);
  ?>
            <tbody>
              <tr>
                <td><?=$trans['id_transaksi']?></td>
                <td><?=$trans['tanggal_transaksi']?></td>
                <td><?=$user['nama']?></td>
                <td><?=$trans['alamat_tujuan']?></td>
                <td><?=$trans['identitas_penerima']?></td>
				<td><?=$trans['nomor_telepon']?></td>
								<td>
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
								</td>
                <td>Rp <?=number_format($trans['total_pembayaran'])?>.00</td>
                <td>Dikonfirmasi</td>
                <td colspan="2">
                  <a href="view_transaksi_gudang.php?id=<?=$trans['id_transaksi']?>"><button class="btn btn-info"><i class="fa fa-eye"></i> View</button></a>
              </tr>
            </tbody>



<?php
  };
}
?>
</table>
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

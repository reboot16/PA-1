<?php
	require_once(dirname(__FILE__).'/function.php');
?>

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
		<!-- Header-->
		<?php
			require_once(dirname(__FILE__).'/commons/header.php');
		?>

		<!---Menubar-->
		<?php
			require_once(dirname(__FILE__).'/commons/menubar.php');
		?>
		<div class="main-slider">
			<div id="myCarousel" class="carousel slide" dataride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<!-- deklarasi carousel -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="img/slider/1.jpg" class="img-thumbnail">
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
						<div class="flex-caption">
							<h3>Design Modern</h3>
							<p>Design Ulos dan Songket mengikuti era perkembangan</p>
						</div>
					</div>
					</div>
					<div class="item">
						<img src="img/slider/2.jpg" class="img-thumbnail">
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
						<div class="flex-caption">
							<h3>Bahan</h3>
							<p>Bahan yang digunakan tidak mudah luntur dan kualitas baik</p>
						</div>
					</div>
					</div>
					<div class="item">
						<img src="img/slider/3.jpg" class="img-thumbnail">
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
						<div class="flex-caption">
							<h3>Harga</h3>
							<p>Harga yang terjangkau namun hasil berkualitas</p>
						</div>
					</div>
					</div>
				</div>

			</div>
		</div>
		<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
		<section class="main-produk">
			<div class="container">
				<div class="row">
				<h3>ULOS</h3><hr class="pg-titl-bdr-btm"></hr>
				<?php
					$query = "SELECT * FROM produk WHERE kategori = 1";
					$item = mysqli_query($conn, $query);
					$no = 1;
					while($items = mysqli_fetch_array($item)){
						if($no == 4){
							echo'<div class="col-md-3">
									 <div class="card">
									  <a href="newbuy.php?items_id='.$items['id_produk'].'"><img src="img/produk/'.$items['gambar'].'" class="img-thumbnail" alt="Avatar"></a>
										<h4><b>'.$items['nama'].'</b></h4><hr>
										<h4><b>Rp '.number_format($items['harga']).'.00</b></h4>
									</div>
								</div>';
								break;
						}else{
							echo'<div class="col-md-3">
									 <div class="card">
									  <a href="newbuy.php?items_id='.$items['id_produk'].'"><img src="img/produk/'.$items['gambar'].'" class="img-thumbnail" alt="Avatar"></a>
										<h4><b>'.$items['nama'].'</b></h4><hr>
										<h4><b>Rp '.number_format($items['harga']).'.00</b></h4>
									</div>
								</div>';
						}

						$no++;
				?>

					<?php }; ?>
				</div>
				<center><p><a href="ulos.php"><button class="more">More &raquo</button></a></p></center>
			</div>
		</section>
		</div>
		<hr>
		<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
		<section class="main-produk">
			<div class="container">
				<div class="row">
				<h3>SONGKET</h3><hr class="pg-titl-bdr-btms"></hr>
				<?php
					$query = "SELECT * FROM produk WHERE kategori = 2";
					$item = mysqli_query($conn, $query);
					$no = 1;
					while($items = mysqli_fetch_array($item)){
						if($no == 4){
							echo'<div class="col-md-3">
									 <div class="card">
									  <a href="newbuy.php?items_id='.$items['id_produk'].'"><img src="img/produk/'.$items['gambar'].'" class="img-thumbnail" alt="Avatar"></a>
										<h4><b>'.$items['nama'].'</b></h4><hr>
										<h4><b>Rp '.number_format($items['harga']).'.00</b></h4>
									</div>
								</div>';
								break;
						}else{
							echo'<div class="col-md-3">
									 <div class="card">
									  <a href="newbuy.php?items_id='.$items['id_produk'].'"><img src="img/produk/'.$items['gambar'].'" class="img-thumbnail" alt="Avatar"></a>
										<h4><b>'.$items['nama'].'</b></h4><hr>
										<h4><b>Rp '.number_format($items['harga']).'.00</b></h4>
									</div>
								</div>';
						}
						$no++;
				?>

					<?php }; ?>
				</div>
				<center><p><a href="songket.php"><button class="more">More &raquo</button></a></p></center>
			</div>
		</section>
		</div>
		<hr>

		<section class="box">
			<h4>MENGAPA MEMILIH PARNA ULOS?</b></h4>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.4s">
							<div class="services">
								<div class="icons">
									<a href="pengiriman.php"><i class="fa fa-plane fa-2x" aria-hidden="true"></i></a>
								</div>
								<h4><b>PENGIRIMAN</b></h4>
								<p>
									Menyediakan produk ulos dan songket khas Batak Toba yang siap untuk dikirimkan
									keseluruh wilayah Indonesia.
								</p>
							</div>
						</div>
						<hr>
					</div>
					<div class="col-md-4">
						<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.8s">
							<div class="services">
								<div class="icons">
									<a href="about.php"><i class="fa fa-building-o fa-2x" aria-hidden="true"></i></a>
								</div>
								<h4><b>UKM</b></h4>
								<p>
									Merupakan salah satu home industri di daerah Toba Samosir yang memproduksi Ulos Toba
									dan Songket.
								</p>
							</div>
						</div>
						<hr>
					</div>
					<div class="col-md-4">
						<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.2s">
							<div class="services">
								<div class="icons">
									<a href="produk.php"><i class="fa fa-archive fa-2x" aria-hidden="true"></i></a>
								</div>
								<h4><b>PRODUK</b></h4>
								<p>
									Produk yang disediakan merupakan buatan asli masyarakat Batak Toba
									yang kualitasnya terjamin.
								</p>
							</div>
						</div>
						<hr>
					</div>
				</div>
			</div>
		</section>
		<!-- Footer-->
		<footer>
			<div class="inner-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4 f-about">
							<h1>Parna Ulos</h1>
							<p>Sebuah Website yang kami dirikan yang bertujuan untuk mempromosikan produk ulos dari perusahaan UD Parna Ulos
							agar dapat lebih dikenal oleh seluruh masyarakat diseluruh Indonesia.<br>
							Pendiri : Abdi Aruan, Leni Sihombing, Leonaldo Pasaribu</p>

						</div>
						<div class="col-md-4 l-posts">
							<h3 class="widgetheading">Visit</h3>
								<ul>
									<li><a href="http://www.del.ac.id/">Institut Teknologi Del</a></li>
									<li><a href="index.php">UD Parna Ulos</a></li>
								</ul>
						</div>
						<div class="col-md-4 f-contact">
							<h3 class="widgetheading">Contact Us</h3>
							<a href="#"><p><i class="fa fa-envelope"></i> leonaldopasaribu@gmail.com</p></a>
							<p><i class="fa fa-phone"></i>  +6282249719766</p>
							<p><i class="fa fa-home"></i> UD Parna Ulos  |  Kode POS 22411
								Sitoluama Laguboti Toba Samosir, Sumatera Utara <br>
								INDONESIA</p>
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
				interval: 3000
			})
		</script>
	</body>
</html>

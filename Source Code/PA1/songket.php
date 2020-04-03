<?php
	require_once(dirname(__FILE__).'/function.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Product | Parna Ulos</title>

		<link rel="icon" type="image/png" href="img/parna_logo.png">
		<link rel="stylesheet" href="css/style.css">

		<!-- Bootstrap-->
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
	</head>
	<body>
		<!-- Header-->
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
						<li><a href="#">Product</a></li>
						<li><a href="#">Songket</a></li>
					</ul>
				</div>
			</div>
		</div>
		</section>

		<section class="product">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div>
							<a href="ulos.php" class="list-group-item active list-group-item-info"><b>ULOS</b></a>
							<ul class="list-group">
								<li class="list-group-item">
									<i class="fa fa-angle-right"></i> Ulos Sadum
								</li>
								<li class="list-group-item">
									<i class="fa fa-angle-right"></i> Ulos Ragi Hotang
								</li>
								<li class="list-group-item">
									<i class="fa fa-angle-right"></i> Ulos Ragi Idup
								</li>
								<li class="list-group-item">
									<i class="fa fa-angle-right"></i> Ulos Mangiring
								</li>
								<li class="list-group-item">
									<i class="fa fa-angle-right"></i> Ulos Suri Suri
								</li>
							</ul>
						</div>

						<div>
							<a href="#" class="list-group-item active list-group-item-info"><b>SONGKET</b></a>
							<ul class="list-group">
								<li class="list-group-item">
									<i class="fa fa-angle-right"></i> Songket Toba
								</li>
								<li class="list-group-item">
									<i class="fa fa-angle-right"></i> Songket Sadum
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-9">
						<?php
							$query = "SELECT * FROM produk WHERE kategori = 2";
							$item = mysqli_query($conn, $query);
							while($items = mysqli_fetch_array($item)){
						?>
						<div class="col-md-4">
						 <div class="card">
						  <?php echo '<img src="img/produk/'.$items['gambar'].'"alt="Avatar">' ?>
							<h4><b><?=$items['nama']?></b></h4>
							<h4><b>Rp <?=number_format($items['harga'])?>.00</b></h4>
							<h4><b>Stock : <?=$items['stock']?></b></h4>
							<p><a href="newbuy.php?items_id=<?=$items['id_produk']?>"><button>Beli</button></a></p>
						</div>
						</div>
					<?php }; ?>
					</div>
				</div>
			</div>
		</section>

		<!-- Footer-->
		<?php
			require_once(dirname(__FILE__).'/commons/footer.php');
		?>

		<!-- Scroll Up Button -->
		<a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x active"></i></a>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-3.1.1.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.appear.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>

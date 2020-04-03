<?php
	require_once(dirname(__FILE__).'/function.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin | Parna Ulos</title>

		<link rel="icon" type="image/png" href="img/parna_logo.png">
		<link rel="stylesheet" href="css/style.css">

		<!-- Bootstrap-->
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
	</head>
	<body>
		<!-- Heaader-->
		<?php
			require_once(dirname(__FILE__).'/commons/header.php');
		?>

		<!---Menubar-->
		<?php
			require_once(dirname(__FILE__).'/commons/menubar.php');
		?>

		<section class="product">
			<div class="container">
				<div class="row">
					<h3>DAFTAR PRODUK ANDA</h3><hr class="pg-titl-bdr-btad"></hr>
					<a href="tambah_produk.php">
						<button class="btn btn-tambah"><i class="fa fa-plus-circle"> Tambah Produk</i></button>
					</a>
					<div class="col-md-12">
					<?php
					$query = "SELECT * FROM produk";
					$item = mysqli_query($conn, $query);
					while($items = mysqli_fetch_array($item)){
					?>
					<div class="col-md-4">
						 <div class="card">
						  <a href="#"><img src="img/produk/<?=$items['gambar']?>" class="img-thumbnail" alt="Avatar"></a>
							<h4><b><?=$items['nama']?></b></h4><hr>
							<h4><b>Rp <?=number_format($items['harga'])?>.00</b></h4>
							<h4><b>Stock <?=$items['stock']?></b></h4>
						</div>
					<center>
						<a href="update_produk.php?items_id=<?=$items['id_produk']?>"><button class="btn btn-primary">Edit</button></a>
						<a href="delete_process.php?items_id=<?= $items['id_produk']?>"><button class="btn btn-danger">Hapus</button></a>
					</center>
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

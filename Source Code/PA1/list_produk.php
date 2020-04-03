<?php
	include "function.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Daftar Produk | Parna Ulos</title>

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
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="about">
						<div class="panel panel-heading">
								<h3>DAFTAR PRODUK</h3><hr class="pg-titl-bdr-bta"></hr>
						</div>
							<table class="table table-hover">
								<thead>
									<tr>
											<th>Id Produk <font color="red">*</font></th>
											<th>Nama</th>
											<th>Kategori</th>
											<th>Harga</th>
											<th>Stock</th>
											<th>Keterangan</th>
									</tr>
								</thead>
								<?php
									$query = "SELECT * FROM produk";
									$go = mysqli_query($conn,$query);
									while($produk = mysqli_fetch_array($go))
									{

									$idkat = $produk['kategori'];
									$qgetkat = "SELECT * FROM kategori_produk WHERE id_kategori = $idkat";
									$gokat = mysqli_query($conn,$qgetkat);
									$kate = mysqli_fetch_array($gokat);
								?>
								<tbody>
							 		<tr>
										<td><?=$produk['id_produk']?></td>
							 			<td><?=$produk['nama']?></td>
							 			<td><?=$kate['nama']?></td>
							 			<td>Rp <?=number_format($produk['harga'])?>.00</td>
										<td><?=$produk['stock']?></td>
							 			<td><?=$produk['keterangan']?></td>
							 		</tr>
									<?php
								}
									 ?>
							 	</tbody>
							</table>
							</div>
							</div>
						</div>
					</div>




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

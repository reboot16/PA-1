<?php
	require_once(dirname(__FILE__).'/function.php');
?>

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
		
		<?php
		$idtran = $_GET['id'];
		?>

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="product">
							<h3>Kirim Bukti Pembayaran</h3><hr class="pg-titl-bdr-bte"></hr>

							<form action="tambah_bukti_process.php?idtr=<?=$idtran?>" method="post" enctype="multipart/form-data">

									<div class="form-group">
										<p>Nama File</p>
										<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama File" required />
									</div>
								<div class="form-group">
									<p>Bukti</p>
									<input type="file" name="bukti" accept="img/*" class="btn btn-primary">
								</div>
								<div class="text-center"><button name="tambah" type="submit" class="btn btn-komentar btn-lg">Kirim</button></div>
							</form>

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

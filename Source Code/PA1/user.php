<?php
	include "function.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>User | Parna Ulos</title>

		<link rel="icon" type="image/png" href="img/parna_logo.png">
		<link rel="stylesheet" href="css/style.css">


    <!-- Bootstrap-->
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/jquery.bxslider.css">
	</head>
	<body>

		<!--Header-->
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
						<li><a href="#">User</a></li>
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
				<h3>DAFTAR NAMA USER</h3><hr class="pg-titl-bdr-bta"></hr>
			  </div>
					<table class="table table-hover">
					  <thead>
						<tr>
						  <th>Nama</th>
						  <th>Tanggal Lahir</th>
						  <th>Email</th>
						  <th>Alamat</th>
						  <th></th>
						</tr>
					  </thead>

					<?php
					$query = "SELECT * FROM users WHERE role = 2 ORDER BY nama ASC";
					$user = mysqli_query($conn, $query);
					while($users = mysqli_fetch_array($user)){
					?>
					  <tbody>
						<tr>
							<td><?=$users['nama']?></td>
							<td><?=$users['tanggal_lahir']?></td>
							<td><?=$users['email']?></td>
							<td><?=$users['alamat']?></td>
							<td><a href="delete_process_user.php?id_users=<?=$users['id']?>"><button class="btn btn-danger">Hapus</button></a></td>
						</tr>
					  </tbody>


					<?php }; ?>

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
		<script src="js/jquery.singlePageNav.js"></script>
		<script src="js/jquery.flexslider.js"></script>
		<script src="js/jquery.appear.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/wow.min.js"></script>
		<script>wow = new WOW({}).init();</script>
	</body>
</html>

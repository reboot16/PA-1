<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sign Up | Parna Ulos</title>

		<link rel="icon" type="image/png" href="img/parna_logo.png">
		<link rel="stylesheet" href="css/style.css">

		<!-- Bootstrap-->
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
	</head>
	<body background="img/background.jpg" style="background-size:cover;"
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
			  <div class="form">
				<!-- the input -->
			  <div class="first-row">
					<a href="index.php"><img src="img/parna_logo.png" alt="login" class="icon-login"></a>
					<h2 class="first-login">SIGN UP</h2>
			  </div>
					<form action="sign_process.php" method="POST">
						<div class="input-group">
						<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
						<span class="input-group-addon">
						  <span class="fa fa-user fa-fw"></span>
						</span>
					  </div>
						<div class="input-group">
						<input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir(yyyy-mm-dd)">
						<span class="input-group-addon">
						  <span class="fa fa-calendar fa-fw"></span>
						</span>
					  </div>
						<div class="input-group">
						<input type="text" name="alamat" class="form-control" placeholder="Alamat">
						<span class="input-group-addon">
						  <span class="fa fa-home fa-fw"></span>
						</span>
					  </div>
						<div class="input-group">
						<input type="text" name="username" class="form-control" placeholder="Username">
						<span class="input-group-addon">
						  <span class="fa fa-user fa-fw"></span>
						</span>
					  </div>
					  <div class="input-group">
						<input type="password" name="password" class="form-control" placeholder="Password">
						<span class="input-group-addon">
						  <span class="fa fa-key fa-fw"></span>
						</span>
					  </div>
						<div class="input-group">
					 <input type="email" name="email" class="form-control" placeholder="Email">
					 <span class="input-group-addon">
						 <span class="fa fa-envelope fa-fw"></span>
					 </span>
					 </div>
					<br>
					<button type="submit" class="btn btn-lg login-btn">SIGN UP</button>
				</form>
			  </div>
		</div>


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-3.1.1.min.js"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>

	</body>
</html>

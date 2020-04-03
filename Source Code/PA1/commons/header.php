<header>
	<div class="container">
		<div class="row">
			<div class="first-div">
			<div class="col-md-12">
				<div class="col-md-6">
					<a href="index.php"><img src="img/logo.jpg" class="img-responsive"></a>
				</div>
				<div class="container">
				<div class="col-md-6">
						<div class="top">
							<div class="top-menu">
									<?php
									session_start();

									if(isset($_GET['do_logout'])){
											unset($_SESSION['is_logged_in']);
											header("location:index.php");
									}
									if(isset($_SESSION['is_logged_in'])){
										include 'function.php';
										$id = $_SESSION['id'];
										$query = "SELECT * FROM users WHERE id = $id";
										$go = mysqli_query($conn,$query);
										$user = mysqli_fetch_array($go);
									$role = $_SESSION['role'];
											if($role == 2)
											{
												echo '<ul>
													<li class="dropdown">
													<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"><i class="fa fa-user-circle" aria-hidden="true" style=""></i> '.$user['nama'] .'  <i class="fa fa-angle-down" aria-hidden="true"> </a></i>
													<ul class="dropdown-menu">
														<li><a href="cart.php?add=1"><i class="fa fa-cart-plus" aria-hidden="true"></i> KERANJANG</a></li>
														<li><a href="beli.php"><i class="fa fa-money" aria-hidden="true"></i> RIWAYAT TRANSAKSI</a></li>
													</ul>
												</li>';
												echo '<li><a href="index.php?do_logout"><i class="fa fa-sign-out"> LOGOUT</i></a></li></ul>';
											}
											else if($role == 1)
											{
												echo '<ul><li><a href="index.php?do_logout"><i class="fa fa-sign-out"> LOGOUT</i><a></li>(Administrator) </ul>';
											}
											else if($role == 3)
											{
												echo '<ul><li><a href="index.php?do_logout"><i class="fa fa-sign-out"> LOGOUT</i><a></li>(Petugas Gudang) </ul>';
											}

									}
									else {
											echo '<ul>
											<li><a href="login.php"> <i class="fa fa-user"> LOGIN </i> </a></li>';
											echo '<li> | </li>';
											echo '<li><a href="sign.php"> <i class=" fa fa-user-plus"> SIGN-UP </i></span></a></li>
											</ul>';
										}
									?>
								<script src="js/search.js"></script>
								<form class="navbar-form" role="search">
									<div class="form-group">
										<input type="text" class="form-control" onkeyup="showResult(this.value)">
										<button type="submit" class="btn search-btn"><i class="fa fa-search"></i></button>
										<div id="livesearch"></div>
									</div>
								</form>
							</div>
						</div>
				</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</header>

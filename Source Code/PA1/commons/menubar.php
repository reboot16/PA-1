<!--Menubar-->
	<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed toggle" data-toggle="collapse" data-target="#top-menu">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<?php
		if(isset($_SESSION['is_logged_in']))
		{

				   $role = $_SESSION['role'];
					 if($role == 2)
					 {
				?>
				<div class="navbar-collapse collapse" id="top-menu">
					<div class="menu">
						<ul class="nav navbar-nav" role="tablist">
							<li><a href="index.php"><i class="fa fa-home"> HOME</i></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"><i class="fa fa-archive"> PRODUCT</i> <i class="fa fa-angle-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="ulos.php">Ulos</a></li>
										<li><a href="songket.php">Songket</a></li>
									</ul>
								</li>
							<li><a class="menu" href="about.php"><i class="fa fa-building"> ABOUT</i></a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"><i class="fa fa-question"> HELP</i> <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="daftar_aduan.php">Daftar Aduan</a></li>
									<li><a href="help.php">Layanan Aduan</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
		<?php
			}
			else if($role == 1)
			{
		?>

		<div class="navbar-collapse collapse" id="top-menu">
			<div class="menu">
				<ul class="nav navbar-nav" role="tablist">
					<li><a class="menu" href="#"> </a></li>
					<li><a class="menu" href="admin.php"><i class="fa fa-home"> ADMIN</i></a></li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"><i class="fa fa-list"> TRANSAKSI</i> <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="daftar_transaksi.php">Daftar Transaksi</a></li>
								<li><a href="daftar_transaksi_selesai.php">Transaksi Selesai</a></li>
							</ul>
					</li>

					<li><a class="menu" href="user.php"><i class="fa fa-user"> USER</i></a></li>
					<li><a class="menu" href="daftar_aduan.php"> <i class="fa fa-bullhorn"> DAFTAR ADUAN</i></a></li>
				</ul>
			</div>
		</div>

			<?php
			}
			else if($role == 3)
			{
				?>
				<div class="navbar-collapse collapse" id="top-menu">
			<div class="menu">
				<ul class="nav navbar-nav" role="tablist">
					<li><a class="menu" href="#"> </a></li>
					<li><a class="menu" href="gudang.php"><i class="fa fa-home"> GUDANG</i></a></li>
					<li><a class="menu" href="list_produk.php"><i class="fa fa-list"> DAFTAR PRODUK</i></a></li>
				</ul>
			</div>
		</div>
				<?php
			}
		}
		else if(!isset($_SESSION['is_logged_in']))
		{
			?>
			<div class="navbar-collapse collapse" id="top-menu">
				<div class="menu">
					<ul class="nav navbar-nav" role="tablist">
						<li><a href="index.php"><i class="fa fa-home"> HOME</i></a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"><i class="fa fa-archive"> PRODUCT</i> <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="ulos.php">Ulos</a></li>
									<li><a href="songket.php">Songket</a></li>
								</ul>
							</li>
						<li><a class="menu" href="about.php"><i class="fa fa-building"> ABOUT</i></a></li>

					</ul>
				</div>
			</div>
		<?php
			}
		?>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-->
		</nav>

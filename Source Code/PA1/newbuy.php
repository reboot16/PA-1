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
		<link rel="stylesheet" href="css/jquery.bxslider.css">
	</head>
	<body>
		<!-- Header-->
<?php
	require_once(dirname(__FILE__).'/commons/header.php');
		$sid = session_id();
		unset($_SESSION['item_id']);
		$itemId = $_GET['items_id'];

	  require_once(dirname(__FILE__).'/function.php');
	  $query = "SELECT * FROM produk WHERE id_produk = $itemId";
	  $exect = mysqli_query($conn,$query);
	  $items = mysqli_fetch_array($exect);
	  $katid = $items['kategori'];
	  $qkategori = "SELECT nama FROM kategori_produk WHERE id_kategori = $katid";
	  $kategori = mysqli_query($conn,$qkategori);
	  $kate = mysqli_fetch_array($kategori);
	  $_SESSION['item_id'] = $itemId;
?>
<!--Menubar-->
	<?php
		require_once(dirname(__FILE__).'/commons/menubar.php');
	?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card1">
        <?php echo '<img src="img/produk/'.$items['gambar'].'"alt="Avatar" class="img-responsive">' ?>
      </div>
    </div>
	
	
    <div class="col-md-6">
      <div class="pesan">
        <h3><b>Nama Produk</b></h3>
        <h4><?=$items['nama']?></h4>
        <h3><b>Kategori Produk</b></h3>
        <h4><?=$kate['nama']?></h4>
        <h3><b>Deskripsi Produk</b></h3>
        <h4><?=$items['keterangan']?></h4>
        <h3><b>Harga Produk</b></h3>
        <h4>Rp <?=number_format($items['harga'])?>.00</h4>
		<h3><b>Stock</b></h3>
        <h4><?=$items['stock']?></h4>
		<br>
      </div>


      <form action="add_to_cart_process.php?add=1" method="post" role="form">
        <div class="form-group">
          <p>Jumlah Pesanan</p>
          <input type="number" min="1" max="<?=$items['stock']?>" name="jumlah" value="1" class="form-control" required />
        </div>
        <br>
        <div class="text-center"><button type="submit" class="btn btn-komentar btn-lg"><i class="fa fa-cart-plus"> Tambah Ke Keranjang</i></button></div>

    </div>
  </div>

		<p>Pesanan Khusus <font color="red">*</font></p>
		<textarea name="pesanan_khusus" class="form-control" rows="7" placeholder="Tentukan pola, warna dan ukuran yang diinginkan."></textarea><br>
		<p><font color="red">*</font> Untuk Costumer diluar provinsi, pesanan minimum yaitu 20 lembar ulos.</p>
	 </form>
  </div>



<br>
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

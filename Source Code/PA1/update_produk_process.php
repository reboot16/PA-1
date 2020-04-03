
<?php
	//mulai proses edit data
	//cek dahulu, jika tombol simpan di klik
	if(isset($_POST['edit'])){
		//inlcude atau memasukkan file koneksi ke database
		include('function.php');
		//jika tombol tambah benar di klik maka lanjut prosesnya
		$id_produk = $_GET['id_produk'];
		$nama = $_POST['nama'];
		$kategori = $_POST['kategori'];
		$harga = $_POST['harga'];
		$stock = $_POST['stock'];
		$keterangan = $_POST['keterangan'];
		
		
		if($_FILES['gambar']['name']){
			move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/produk/'.$nama.'.jpg');
			//proses menyimpan gambar ke dalam direktori
			$gambar = ''.$nama.'.jpg'; //membuat variabel $picture untuk disimpan sebagai url gambar ke dalam database
		}
		//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
		 $hasil = mysqli_query($conn, "UPDATE produk SET nama='$nama', kategori='$kategori', harga='$harga', stock='$stock', gambar='$gambar', keterangan='$keterangan' WHERE id_produk='$id_produk'");
		 
		 
		//jika query update sukses
		if($hasil){
			echo"<script>alert('Edit Produk Berhasil');</script>";
			header("Refresh:0 url=admin.php");
		}
		else{
			echo 'Gagal menyimpan data! '; //Pesan jika proses simpan gagal
			header("location:admin.php"); //membuat Link untuk kembali ke halaman edit
		}
	}
	else{ //jika tidak terdeteksi tombol simpan di klik
		//redirect atau dikembalikan ke halaman edit
		echo '<script>window.history.back()</script>';
	}
?>

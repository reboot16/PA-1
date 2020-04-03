<?php
	//mulai proses tambah data
	//cek dahulu, jika tombol tambah di klik
	if(isset($_POST['tambah'])){
		//inlcude atau memasukkan file koneksi ke database
		include('function.php');
		//jika tombol tambah benar di klik maka lanjut prosesnya
		$nama = $_POST['nama'];
		$kategori = $_POST['kategori'];
		$harga = $_POST['harga'];
		$stock = $_POST['stock'];
		//$id_admin = $_POST['id_admin'];
		if($_FILES['gambar']['name']){
			move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/produk/'.$nama.'.jpg'); 
			//proses menyimpan gambar ke dalam direktori
			$gambar = ''.$nama.'.jpg'; //membuat variabel $profile untuk disimpan sebagai url gambar ke dalam database
		}
		$keterangan = $_POST['keterangan'];
		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
		$input = mysqli_query($conn, "INSERT INTO produk VALUES('','$nama','$kategori','$harga', '$stock', '$gambar', '$keterangan')") or die(mysqli_error($conn));
		//jika query input sukses
		if($input){
			echo"<script>alert('Tambah Produk Berhasil');</script>";
			header("Refresh:0 url=admin.php");
		}
		else{
			echo 'Gagal menambahkan data '; //Pesan jika proses tambah	gagal
			header("location:tambah_produk.php");//membuat Link untuk kembali ke halaman tambah
		}
	}
	else{ //jika tidak terdeteksi tombol tambah di klik
		//redirect atau dikembalikan ke halaman tambah
		echo '<script>window.history.back()</script>';
	}
?>



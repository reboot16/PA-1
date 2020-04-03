<?php
	//mulai proses tambah data
	//cek dahulu, jika tombol tambah di klik
	$idtr = $_GET['idtr'];
	if(isset($_POST['tambah'])){
		//inlcude atau memasukkan file koneksi ke database
		include('function.php');
		//jika tombol tambah benar di klik maka lanjut prosesnya
		$nama = $_POST['nama'];
		//$id_admin = $_POST['id_admin'];
		if($_FILES['bukti']['name']){
			move_uploaded_file($_FILES['bukti']['tmp_name'], 'img/bukti/'.$nama.'.jpg');
			//proses menyimpan gambar ke dalam direktori
			$bukti = ''.$nama.'.jpg'; //membuat variabel $profile untuk disimpan sebagai url gambar ke dalam database
		}
		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
		$input = mysqli_query($conn, "UPDATE transaksi SET bukti='$bukti' WHERE id_transaksi='$idtr'") or die(mysqli_error($conn));
		//jika query input sukses
		if($input){
			echo"<script>alert('Tambah Bukti Berhasil');</script>";
			header("Refresh:0 url=beli.php");
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

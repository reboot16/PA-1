<?php
session_start();
  require_once(dirname(__FILE__).'/function.php');
  $itemId = $_GET['cart_id'];
  $jumlah = $_POST['jumlah'];
  if(!isset($_SESSION['harga']))
  {
    echo "fak";
  }
  else {


  $harga = $_SESSION['harga'];
  $total = $jumlah * $harga;
  $query = "UPDATE cart SET jumlah_produk='$jumlah', total_harga ='$total' WHERE id_cart = $itemId";
  $exe = mysqli_query($conn,$query);
  unset($_SESSION['harga']);
  header('Location:cart.php?add=1');
}
?>

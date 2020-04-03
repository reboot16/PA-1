<?php
  session_start();
  $namaku = $_POST['nama'];
  $tgllahir = $_POST['tanggal_lahir'];
  $alamat =  $_POST['alamat'];
  $usernameku = $_POST['username'];
  $passwordku = $_POST['password'];
  $emailku = $_POST['email'];
  $role = 2;
  global $conn;
  require_once(dirname(__FILE__).'/function.php');

  function execQ($strQ){
    global $conn;
    $res = mysqli_query($conn, $strQ);

    return $res;
  }

  $query = "INSERT INTO users VALUES(NULL,'$namaku' , '$tgllahir', '$alamat', '$usernameku', '$passwordku', '$emailku','$role')";

  if(execQ($query)){
    $SIGN['is_sign_in'] = TRUE;
    header("location:login.php");
  }else{
    echo "gagal";
  }
?>

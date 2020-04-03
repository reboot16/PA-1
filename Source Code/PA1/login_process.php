<?php
  session_start();
  $usernameku = $_POST['username'];
  $passwordku = $_POST['password'];

  require_once(dirname(__FILE__).'/function.php');

  $query = "SELECT * FROM users WHERE username = '$usernameku' and password = '$passwordku'";
	$exect = mysqli_query($conn,$query);

	$user_konfirmasi = "";
	$pass_konfirmasi = "";

	while($row=mysqli_fetch_array($exect))
	{
		$user_konfirmasi = $row['username'];
		$pass_konfirmasi = $row['password'];
		$name = $row['nama'];
    $id = $row['id'];
    $role = $row['role'];
	}
	if($usernameku == $user_konfirmasi && $passwordku == $pass_konfirmasi)
	{
    $_SESSION['is_logged_in'] = TRUE;
    $_SESSION['nama'] = $name;
    $_SESSION['id'] = $id;
    $_SESSION['role'] = $role;
    if($role == 2)
    {
      header("Refresh:0 url=index.php");
    }
    else if($role==1){
      header("Location:admin.php");
    }
	else if($role==3){
      header("Location:gudang.php");
    }

	}
	else
	{
	  echo"<script>alert('Maaf Anda Tidak Terdaftar!');</script>";
      header("Refresh:0 url=login.php");
	}

?>

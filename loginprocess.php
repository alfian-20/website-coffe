<?php
session_start();

include "conn.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM datauser WHERE username = '$username' AND password = '$password'";
$hasil = mysqli_query ($koneksi,$sql);
$jumlah = mysqli_num_rows($hasil);


	if ($jumlah>0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["id"]=$row["id"];
		$_SESSION["username"]=$row["username"];
		$_SESSION["nama"]=$row["nama"];
		$_SESSION["email"]=$row["email"];
		$_SESSION["alamat"]=$row["alamat"];
		$_SESSION["hp"]=$row["hp"];
		header("Location:index.php");
		
	}else {
		header("Location:login.php");
	}
	if ($_SESSION["username"] == 'admin') {
		header("Location:indexadmin.php");
	  }
?>
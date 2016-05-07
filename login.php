<?php
require "koneksi.php";
session_start();	

$Username = $_POST["Username"];
$Password = md5($_POST["Password"]);

//echo"SELECT * FROM Users WHERE Username='$Username' AND Password='$Password'";
$queryLogin = mysqli_query($koneksi,"SELECT * FROM Users WHERE Username='$Username' AND Password='$Password'");
$banyaknyaIsi = mysqli_num_rows($queryLogin);
$dataIsi = mysqli_fetch_array($queryLogin);

if ($banyaknyaIsi > 0){

	$_SESSION[Id]     = $dataIsi[idUser];
	$_SESSION[Username]     = $dataIsi[Username];
	$_SESSION[RoleAkses]    = $dataIsi[RoleAkses];

	header('location:beranda.php');
}
else{
	header('location:index.php');	
}
?>
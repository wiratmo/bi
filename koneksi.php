<?php
$host = "localhost";
$user = "root";
$pass = "zurich";
$database = "Surat";

	$koneksi=mysqli_connect($host, $user, $pass, $database);

	if (mysqli_connect_errno()){
		echo "gagal";
	}
?>
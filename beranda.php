<?php
session_start();
if ($_SESSION[RoleAkses]=="1"){
	header('location:admin.php');
	echo "admin";
	echo "<a href='logout.php'>logout</a>";
}
else if ($_SESSION[RoleAkses]=="2"){
	header('location:operator.php');
	echo "operator";
	echo "<a href='logout.php'>logout</a>";
}
else {
	header('location:index.php');
}
?>
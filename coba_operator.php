<?php
ob_start();
require "template/header.php";
header('location:awe.php');
//echo "<script> window.location.href='awe.php'</script>";
require "template/footer.php";
?>
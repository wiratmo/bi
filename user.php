<?php
ob_start();
error_reporting(0);
session_start();
if ($_SESSION[RoleAkses]!="1"){ 
	header('location:beranda.php');
	//header('location:beranda.php');
} else {

require "koneksi.php";
require "template/header.php";
$menu = $_GET[menu];
$id = $_GET[id];
if ($menu == "nonaktifkan"){
	mysqli_query($koneksi, "update Users set RoleAkses=NULL where idUser = $id");
	header('location:user.php');
} else if ($menu == "aktifkan"){
	mysqli_query($koneksi, "update Users set RoleAkses='2' where idUser = $id");
	header('location:user.php');
}else{
?>
<div class="right_col" role="main">
<div class="">
<!-- Right Coloum -->	
		 <div class="page-title">
              <div class="title_left">
                <h3>Manajemen User</h3>
              </div>

              <div class="title_right">
              </div>
            </div>
            <div class="clearfix"></div>
	            <div class="row">
	              <div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="x_panel">
		<!-- End Top Right Coloum -->
		<!-- Content Right Coloum -->
			<div class="x_title">
                    <h2>Satuan Kerja</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
			<?php $query_user = mysqli_query($koneksi, "Select * from Users where RoleAkses!='1' or RoleAkses is NULL");?>
			<table id="datatabel" class="hover" cellspacing="0" width="100%">
			<thead>
				<td>No</td>
				<td>Nama</td>
				<td>Username</td>
				<td>Status</td>
				<td>Aksi</td>
			</thead>
			<?php
			$no = 1;
			while ($isi = mysqli_fetch_assoc($query_user)) {?>
			<tr>
				<td><?php echo $no; ?></td>
				<td> <?php echo $isi[Name] ?></td>
				<td> <?php echo $isi[Username] ?></td>
				<?php if ($isi[RoleAkses]==2){ ?>
				<td> <button class="btn btn-success btn-xs"> Aktif </button></td>
				<td><a href="?menu=nonaktifkan&id=<?php echo $isi[idUser] ?>"><button class="btn btn-danger btn-xs"> Non-Aktifkan </button></a></td>
					<?php } else {?>
					<td> <button class="btn btn-danger btn-xs"> Non Aktif </button></td>
				<td><a href="?menu=aktifkan&id=<?php echo $isi[idUser] ?>"><button class="btn btn-success btn-xs"> Aktifkan </button></a></td>
					<?php } ?>

			</tr>
			<?php
			$no++;
			}
			?>
		</table>	
		</div>
</div>
</div>
</div>
</div>
</div>
<?php }}
require "template/footer.php";
?>
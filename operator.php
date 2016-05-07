<?php
ob_start();
error_reporting(0);
session_start();
require "koneksi.php";
require "template/headeroperator.php";?>
<div class="right_col" role="main">
	<div class="">
<?php $menu = $_GET['menu'];
if(isset($_POST['submit'])){
	$tahun = date("Y");
	$query_cektahun = mysqli_query($koneksi, "Select TahunBuku, noTahunBuku from Tahun order by idTahun DESC limit 1");
	$isi = mysqli_fetch_assoc($query_cektahun);
	if ($isi[TahunBuku] == $tahun){
			$noTahunBuku = $isi[noTahunBuku];
	} else {
		$noTahunBuku = (date("y")+2);
		$query_insertnoTahunBuku = mysqli_query($koneksi, "Insert into Tahun (TahunBuku, noTahunBuku) VALUES ($tahun, $noTahunBuku)");
	}

	if (empty($_POST['saker']))	
		{$saker='';} 
	else 
		{$saker=$_POST['saker'];} 
	if (empty($_POST['tim']))
		{$tim ='';} 
	else 
		{$tim ="-".$_POST['tim'];} 
	if (empty($_POST['unit']))
		{$unit='';} 
	else 
		{$unit="-".$_POST['unit'];};
	$Penerbit= $saker.$tim.$unit;
	$JenisDokumen = $_POST['jenisdokumen'];
	$SifatDokumen = $_POST['sifatdokumen'];
	$query_tempsurat=mysqli_query($koneksi, "Insert Into TempNoSurat (TahunBuku, Penerbit, JenisDokumen, SifatDokumen, IdUserCreate, DateCreate) VALUES ('$noTahunBuku', '$Penerbit', '$JenisDokumen', '$SifatDokumen', '$_SESSION[Id]', now())");
	mysqli_close($koneksi);
	header('location:operator.php');
} else {

if ($_SESSION[RoleAkses]=="2"){
	if ($menu == "input"){ ?>
	<!-- Right Coloum -->	
		 <div class="page-title">
              <div class="title_left">
                <h3>Tambahkan No Surat</h3>
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
                    
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
		<form action="" method="POST" class="form-horizontal form-label-left" novalidate>
		<!-- Saker -->
			<div class="item form-group" >
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Satuan Kerja <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12" >
	                <select name="saker" class="form-control col-md-7 col-xs-12" id="satuankerja">
	                <option value="">--</option>
				<?php $query_satuankerja = mysqli_query($koneksi, "Select SatuanKerja, Keterangan from SatuanKerja");
				while ($isi= mysqli_fetch_assoc($query_satuankerja)){?>
					<option value="<?php echo $isi[SatuanKerja] ?>"> <?php echo $isi[Keterangan] ?></option>
				<?php } ?>
	                </select>
	                </div>
	              </div>
	        <!-- End Item Form -->
		<!-- End Saker -->
						
		<!-- Tim -->
				<div class="item form-group ">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tim
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12" >
	                <select name="tim" class="form-control col-md-7 col-xs-12" id="tim">
	                <option value="">--</option>
				<?php $query_tim = mysqli_query($koneksi, "Select Tim, Keterangan from Tim");
				while ($isi= mysqli_fetch_assoc($query_tim)){?>
					<option value="<?php echo $isi[Tim] ?>"> <?php echo $isi[Keterangan] ?></option>
				<?php } ?>
	                </select>
	                </div>
	              </div>
	        <!-- End Item Form -->
		<!-- End Tim -->

		<!-- Unit -->
<!-- Begin Item Form -->
				<div class="item form-group " >
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unit Kerja 
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12" >
	                <select name="unit" class="form-control col-md-7 col-xs-12" id="unitkerja">
	                <option value="">--</option>
				<?php $query_unitkerja = mysqli_query($koneksi, "Select UnitKerja, Keterangan from UnitKerja");
				while ($isi= mysqli_fetch_assoc($query_unitkerja)){?>
					<option value="<?php echo $isi[UnitKerja] ?>"> <?php echo $isi[Keterangan] ?></option>
				<?php } ?>
	                </select>
	                </div>
	              </div>
	        <!-- End Item Form -->
	        		<!-- End Unit -->

		<!-- Jenis Dokumen -->
<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jenis Dokumen <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12" >
	                <select name="jenisdokumen" class="form-control col-md-7 col-xs-12">
	                <option value="">--</option>
				<?php $query_jenisdokumen = mysqli_query($koneksi, "Select JenisDokumen, Keterangan from JenisDokumen");
				while ($isi= mysqli_fetch_assoc($query_jenisdokumen)){?>
					<option value="<?php echo $isi[JenisDokumen] ?>"> <?php echo $isi[Keterangan] ?></option>
				<?php } ?>
	                </select>
	                </div>
	              </div>
	        <!-- End Item Form -->
		<!-- End jenis Dokumen -->

		<!-- Sifat Dokumen -->
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sifat Dokumen <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12" >
	                <select name="sifatdokumen" class="form-control col-md-7 col-xs-12">
	                				<option value="">--</option>
				<?php $query_sifatdokumen = mysqli_query($koneksi, "Select SifatDokumen, Keterangan from SifatDokumen");
				while ($isi= mysqli_fetch_assoc($query_sifatdokumen)){?>
					<option value="<?php echo $isi[SifatDokumen] ?>"> <?php echo $isi[Keterangan] ?></option>
				<?php } ?>
	                </select>
	                </div>
	              </div>
	        <!-- End Item Form -->
		<!-- End jenis Dokumen -->

	        <!-- Begin Button Submit -->
        		<div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="send" type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
		</form>
		</div>
		</div>
		</div>
		</div>
	<?php }
	else {?>
		<!-- Right Coloum -->	
		 <div class="page-title">
              <div class="title_left">
                <h3>Menu Manajemen</h3>
              </div>

              <div class="title_right">
              <a href="?menu=input"class="btn btn-info btn-lg"><i class="fa fa-pencil"></i>  Tambahkan</a>
              </div>
            </div>
            <div class="clearfix"></div>
	            <div class="row">
	              <div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="x_panel">
		<!-- End Top Right Coloum -->
		<!-- Content Right Coloum -->
			<div class="x_title">
                    <h2>No Surat</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
		<?php $query_view = mysqli_query($koneksi, "Select * from NoSurat order by idNoSurat DESC"); ?>
		<table id="datatabel" class="hover" cellspacing="0" width="100%">
			<thead>
				<td>No</td>
				<td>No Surat</td>
				<td>Tanggal Pembuatan</td>
				<td>Pembuat</td>
			</thead>
			<?php
			$no = 1;
			while ($isi = mysqli_fetch_assoc($query_view)) {?>
			<tr>
				<td><?php echo $no; ?></td>
				<td>
				<?php
				echo $isi[TahunBuku]."/".$isi[NoBuku]."/".$isi[Penerbit]."/".$isi[JenisDokumen]."/".$isi[SifatDokumen];
				?></td>
				<td><?php echo $isi[DateCreate] ?></td>
				<td><?php $user = mysqli_fetch_assoc(mysqli_query($koneksi, "Select Name from Users where idUser = $isi[IdUserCreator]"));
                echo $user[Name];
                ?></td>
			</tr>
			<?php
			$no++;
			}
			?>
		</table>	
		<?php } 
	}
else{
	header('location:beranda.php');
}} ?>
</div>
</div>
<script type="text/javascript">
	$("#satuankerja").keyup(function() {
  var id = $(this).val();
  if ((id).length > 0) {
    $("#tim").fadeIn("slow");
  }
  else
    {
      $("#tim").fadeOut("slow");
    }
})
</script>
<?php require "template/footer.php";
?>
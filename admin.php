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
?>
<div class="right_col" role="main">
	<div class="">
<?php
$menu = $_GET['menu'];
$submenu = $_GET['submenu'];
$id = $_GET['id'];
	if ($menu=="manajemen") { ?>
		<!-- Right Coloum -->	
		 <div class="page-title">
              <div class="title_left">
                <h3>Menu Manajemen</h3>
              </div>

              <div class="title_right">
              <a href="?menu=create&submenu=<?php echo $submenu; ?>"class="btn btn-info btn-lg"><i class="fa fa-pencil"></i>  Tambahkan</a>
              </div>
            </div>
            <div class="clearfix"></div>
	            <div class="row">
	              <div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="x_panel">
		<!-- End Top Right Coloum -->
		<?php if ($submenu=="satuankerja") { ?>
		<!-- Content Right Coloum -->
			<div class="x_title">
                    <h2>Satuan Kerja</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
			<?php $query_satuankerja = mysqli_query($koneksi, "Select * from SatuanKerja where Approval='Y'");?>
			<table id="datatabel" class="hover" cellspacing="0" width="100%">
			<thead>
				<td>No</td>
				<td>Satuan Kerja</td>
				<td>Keterangan</td>
				<td>Aksi</td>
			</thead>
			<?php
			$no = 1;
			while ($isi = mysqli_fetch_assoc($query_satuankerja)) {?>
			<tr>
				<td><?php echo $no; ?></td>
				<td> <?php echo $isi[SatuanKerja] ?></td>
				<td> <?php echo $isi[Keterangan] ?></td>
				<td> <a href="?menu=edit&submenu=satuankerja&id=<?php echo $isi[idSatuanKerja]?>"class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>  Edit</a><a href="?menu=delete&submenu=satuankerja&id=<?php echo $isi[idSatuanKerja]?>"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>  Delete</a></td>
			</tr>
			<?php
			$no++;
			}
			?>
		</table>	
		</div>
		<?php } else if($submenu=="tim"){ ?>
		<div class="x_title">
                    <h2>Tim</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
		<?php $query_tim = mysqli_query($koneksi, "Select * from Tim where Approval='Y'");?>
			<table id="datatabel" class="hover" cellspacing="0" width="100%">
			<thead>
				<td>No</td>
				<td>Tim</td>
				<td>Keterangan</td>
				<td>Aksi</td>
			</thead>
			<?php
			$no = 1;
			while ($isi = mysqli_fetch_assoc($query_tim)) {?>
			<tr>
				<td><?php echo $no; ?></td>
				<td> <?php echo $isi[Tim] ?></td>
				<td> <?php echo $isi[Keterangan] ?></td>
				<td> <a href="?menu=edit&submenu=tim&id=<?php echo $isi[idTim]?>"class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>  Edit</a><a href="?menu=delete&submenu=tim&id=<?php echo $isi[idTim]?>"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>  Delete</a></td>
			</tr>
			<?php
			$no++;
			}
			?>
		</table>
		</div>
		<?php } else if($submenu=="unitkerja"){ ?>
		<!-- Content Right Coloum -->
			<div class="x_title">
                    <h2>Unit Kerja</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
			<?php
		$query_unitkerja = mysqli_query($koneksi, "Select * from UnitKerja where Approval='Y'");?>
			<table id="datatabel" class="hover" cellspacing="0" width="100%">
			<thead>
				<td>No</td>
				<td>Unit Kerja</td>
				<td>Keterangan</td>
				<td>Aksi</td>
			</thead>
			<?php
			$no = 1;
			while ($isi = mysqli_fetch_assoc($query_unitkerja)) {?>
			<tr>
				<td><?php echo $no; ?></td>
				<td> <?php echo $isi[UnitKerja] ?></td>
				<td> <?php echo $isi[Keterangan] ?></td>
				<td> <a href="?menu=edit&submenu=unitkerja&id=<?php echo $isi[idUnitKerja]?>"class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>  Edit</a><a href="?menu=delete&submenu=unitkerja&id=<?php echo $isi[idUnitKerja]?>"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>  Delete</a></td>
			</tr>
			<?php
			$no++;
			}
			?>
		</table>
		</div>
		<?php } else if($submenu=="jenisdokumen"){ ?>
		<!-- Content Right Coloum -->
			<div class="x_title">
                    <h2>Jenis Dokumen</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
			<?php $query_jenisdokumen = mysqli_query($koneksi, "Select * from JenisDokumen where Approval='Y'");?>
			<table id="datatabel" class="hover" cellspacing="0" width="100%">
			<thead>
				<td>No</td>
				<td>Jenis Dokumen</td>
				<td>Keterangan</td>
				<td>Aksi</td>
			</thead>
			<?php
			$no = 1;
			while ($isi = mysqli_fetch_assoc($query_jenisdokumen)) {?>
			<tr>
				<td><?php echo $no; ?></td>
				<td> <?php echo $isi[JenisDokumen] ?></td>
				<td> <?php echo $isi[Keterangan] ?></td>
				<td> <a href="?menu=edit&submenu=jenisdokumen&id=<?php echo $isi[idJenisDokumen]?>"class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>  Edit</a><a href="?menu=delete&submenu=jenisdokumen&id=<?php echo $isi[idJenisDokumen]?>"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>  Delete</a></td>
			</tr>
			<?php
			$no++;
			}
			?>
		</table>
		</div>
		<?php } else if($submenu=="sifatdokumen"){ ?>
		<!-- Content Right Coloum -->
			<div class="x_title">
                    <h2>Sifat Dokumen</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
			<?php
		$query_sifatdokumen = mysqli_query($koneksi, "Select * from SifatDokumen where Approval='Y'");?>
			<table id="datatabel" class="hover" cellspacing="0" width="100%">
			<thead>
				<td>No</td>
				<td>Sifat Dokumen</td>
				<td>Keterangan</td>
				<td>Aksi</td>
			</thead>
			<?php
			$no = 1;
			while ($isi = mysqli_fetch_assoc($query_sifatdokumen)) {?>
			<tr>
				<td><?php echo $no; ?></td>
				<td> <?php echo $isi[SifatDokumen] ?></td>
				<td> <?php echo $isi[Keterangan] ?></td>
				<td> <a href="?menu=edit&submenu=sifatdokumen&id=<?php echo $isi[idSifatDokumen]?>"class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>  Edit</a><a href="?menu=delete&submenu=sifatdokumen&id=<?php echo $isi[idSifatDokumen]?>"class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>  Delete</a></td>
			</tr>
			<?php
			$no++;
			}
			?>
		</table>
		</div>
		<?php }
		else{
			require "template/page_404.html";
		} ?>
		</div>
		</div>
	<?php } else if ($menu == "edit"){ ?>
	<!-- Right Coloum -->	
		 <div class="page-title">
              <div class="title_left">
                <h3>Edit</h3>
              </div>

              <div class="title_right">
              </div>
            </div>
            <div class="clearfix"></div>
	            <div class="row">
	              <div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="x_panel">
		<!-- End Top Right Coloum -->
		<?php if ($submenu=="satuankerja") { 
			$query_adasatuankerja = mysqli_num_rows(mysqli_query($koneksi, "Select * from SatuanKerja where Approval='Y' and idSatuanKerja = $id"));
			if ($query_adasatuankerja > 0) { ?>
		<!-- Content Right Coloum -->
			<div class="x_title">
                    <h2>Satuan Kerja</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
			<?php $query_editsatuankerja = mysqli_query($koneksi, "Select * from SatuanKerja where idSatuanKerja='".$id."'");
			$isi = mysqli_fetch_assoc($query_editsatuankerja); ?>

			<form action="?menu=simpan&submenu=satuankerja&id=<?php echo $id ?>" method="POST" class="form-horizontal form-label-left" novalidate>		
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Satuan Kerja <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="satuankerja" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="satuankerja" value="<?php echo $isi[SatuanKerja] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->

	        <!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="keterangan" value="<?php echo $isi[Keterangan] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->

	        <!-- Begin Button Submit -->
        		<div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="send" type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
			</form>
		<?php } else {
			require "template/page_404.html";
		} 
	} else if ($submenu=="tim") {  
		$query_adatim = mysqli_num_rows(mysqli_query($koneksi, "Select * from Tim where Approval='Y' and idTim = $id"));
		if ($query_adatim > 0){ ?>
<!-- Content Right Coloum -->
			<div class="x_title">
                    <h2>Tim</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
			 <?php $query_edittim = mysqli_query($koneksi, "Select * from Tim where idTim='".$id."'");
			$isi = mysqli_fetch_assoc($query_edittim); ?>
			<form action="?menu=simpan&submenu=tim&id=<?php echo $id ?>" method="POST" class="form-horizontal form-label-left" novalidate>
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tim<span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tim" value="<?php echo $isi[Tim] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="keterangan" value="<?php echo $isi[Keterangan] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Button Submit -->
        		<div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="send" type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
			</form> 
		<?php }else {
			require "template/page_404.html";
			}} else if ($submenu=="unitkerja") { 
				$query_adaunitkerja = mysqli_num_rows(mysqli_query($koneksi, "Select * from UnitKerja where Approval='Y' and idUnitKerja = $id"));
				if ($query_adaunitkerja > 0) { ?>
			<!-- Content Right Coloum -->
			<div class="x_title">
                    <h2>Unit Kerja</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
			<?php $query_editunitkerja = mysqli_query($koneksi, "Select * from UnitKerja where idUnitKerja='".$id."'");
			$isi = mysqli_fetch_assoc($query_editunitkerja); ?>
			<form action="?menu=simpan&submenu=unitkerja&id=<?php echo $id ?>" method="POST" class="form-horizontal form-label-left" novalidate>
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unit Kerja<span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="unitkerja" value="<?php echo $isi[UnitKerja] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="keterangan" value="<?php echo $isi[Keterangan] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Button Submit -->
        		<div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="send" type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
			</form>
		<?php } else {
		require "template/page_404.html";	
		}
	} else if ($submenu=="jenisdokumen") {  
		$query_adajenisdokumen = mysqli_num_rows(mysqli_query($koneksi, "Select * from JenisDokumen where Approval='Y' and idJenisDokumen = $id"));
		if ($query_adajenisdokumen > 0) {  ?>
		<!-- Content Right Coloum -->
			<div class="x_title">
                    <h2>Jenis Dokumen</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
			<?php $query_editjenisdokumen = mysqli_query($koneksi, "Select * from JenisDokumen where idJenisDokumen='".$id."'");
			$isi = mysqli_fetch_assoc($query_editjenisdokumen); ?>
			<form action="?menu=simpan&submenu=jenisdokumen&id=<?php echo $id ?>" method="POST" class="form-horizontal form-label-left" novalidate>
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jenis Dokumen<span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="jenisdokumen" value="<?php echo $isi[JenisDokumen] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="keterangan" value="<?php echo $isi[Keterangan] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Button Submit -->
        		<div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="send" type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
			</form>
		<?php } else {
			require "template/page_404.html";	
			}}else if ($submenu=="sifatdokumen") { 
				$query_adasifatdokumen = mysqli_num_rows(mysqli_query($koneksi, "Select * from SifatDokumen where Approval='Y' and idSifatDokumen = $id"));
				if ($query_adasifatdokumen > 0){?>
			<!-- Content Right Coloum -->
			<div class="x_title">
                    <h2>Sifat Dokumen</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
			<?php $query_editsifatdokumen = mysqli_query($koneksi, "Select * from SifatDokumen where idSifatDokumen='".$id."'");
			$isi = mysqli_fetch_assoc($query_editsifatdokumen); ?>
			<form action="?menu=simpan&submenu=sifatdokumen&id=<?php echo $id ?>" method="POST" class="form-horizontal form-label-left" novalidate>
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sifat Dokumen <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sifatdokumen" value="<?php echo $isi[SifatDokumen] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="keterangan" value="<?php echo $isi[Keterangan] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Button Submit -->
        		<div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="send" type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
			</form>
		<?php } else {
			require "template/page_404.html";
		}} else if ($submenu=="surat"){ 
			$query_adaview = mysqli_num_rows(mysqli_query($koneksi, "Select * from NoSurat where Approval='Y' and KetDelete!='Y' and idNoSurat = $id"));
			if ($query_adaview > 0){ ?>
		<!-- Content Right Coloum -->
			<div class="x_title">
                    <h2>Sifat Dokumen</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
			<?php $query_editsurat= mysqli_query($koneksi, "Select * from NoSurat where idNoSurat='".$id."'");
			$isi = mysqli_fetch_assoc($query_editsurat); ?>
			<form action="?menu=simpan&submenu=surat&id=<?php echo $id ?>" method="POST" class="form-horizontal form-label-left" novalidate>
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tahun Surat<span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tahunbuku" value="<?php echo $isi[TahunBuku] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">No Surat <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nobuku" value="<?php echo $isi[NoBuku] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Penerbit <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="penerbit" value="<?php echo $isi[Penerbit] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jenis Dokumen <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="jenisdokumen" value="<?php echo $isi[JenisDokumen] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sifat Dokumen <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sifatdokumen" value="<?php echo $isi[SifatDokumen] ?>" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
			<!-- Begin Button Submit -->
        		<div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="send" type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
			</form>
		<?php }else{
			require "template/page_404.html";
		}} else {
			require "template/page_404.html";
		} ?>
		</div>
		</div>
	<?php } else if ($menu == "simpan"){
		if ($submenu=="satuankerja") {
			$query_simpansatuankerja = mysqli_query($koneksi, "Update SatuanKerja set SatuanKerja='$_POST[satuankerja]', Keterangan='$_POST[keterangan]', IdUserCreate='$_SESSION[Id]', DateUpdate= now(), Approval='N' where idSatuanKerja = $id");
			header('location:?menu=manajemen&submenu=satuankerja');
		} else if ($submenu=="tim") { 
			$query_simpantim = mysqli_query($koneksi, "Update Tim set Tim='$_POST[tim]', Keterangan='$_POST[keterangan]', IdUserCreate='$_SESSION[Id]', DateUpdate= now() , Approval='N' where idTim = $id");
			header('location:?menu=manajemen&submenu=tim');
		} else if ($submenu=="unitkerja") { 
			$query_simpanunitkerja = mysqli_query($koneksi, "Update UnitKerja set UnitKerja='$_POST[unitkerja]', Keterangan='$_POST[keterangan]', IdUserCreate='$_SESSION[Id]', DateUpdate= now(), Approval='N' where idUnitKerja = $id");
			header('location:?menu=manajemen&submenu=unitkerja');
		} else if ($submenu=="jenisdokumen") { 
			$query_simpanjenisdokumen = mysqli_query($koneksi, "Update JenisDokumen set JenisDokumen='$_POST[jenisdokumen]', Keterangan='$_POST[keterangan]', IdUserCreate='$_SESSION[Id]', DateUpdate= now(), Approval='N' where idJenisDokumen = $id");
			header('location:?menu=manajemen&submenu=jenisdokumen');
		} else if ($submenu=="sifatdokumen") { 
			$query_simpansifatdokumen = mysqli_query($koneksi, "Update SifatDokumen set SifatDokumen='$_POST[sifatdokumen]', Keterangan='$_POST[keterangan]', IdUserCreate='$_SESSION[Id]', DateUpdate= now(), Approval='N' where idSifatDokumen = $id");
			header('location:?menu=manajemen&submenu=sifatdokumen');
		} else if ($submenu=="surat"){
			$query_simpansurat= mysqli_query($koneksi, "Update NoSurat set TahunBuku='$_POST[tahunbuku]', NoBuku='$_POST[nobuku]', Penerbit='$_POST[penerbit]', JenisDokumen = '$_POST[jenisdokumen]', SifatDokumen='$_POST[sifatdokumen]', Approval='N', IdUserEditor='$_SESSION[Id]' , IdUserApprove='' where idNoSurat = $id");
			header('location:admin.php');
		} else if ($submenu=="approval"){
			$query_simpanapproval=mysqli_query($koneksi, "Update NoSurat set Approval='Y', IdUserApprove='$_SESSION[Id]' where idNoSurat = $id");
			header('location:?menu=approval&submenu=editsurat');
		} else if ($submenu == "approvesatuankerja"){
			mysqli_query($koneksi, "Update SatuanKerja set Approval='Y', IdUserApprove='$_SESSION[Id]' where idSatuanKerja= $id");
			header('location:?menu=approval&submenu=editmanajemen');
		} else if ($submenu == "approvetim"){
			mysqli_query($koneksi, "Update Tim set Approval='Y', IdUserApprove='$_SESSION[Id]' where idTim= $id");
			header('location:?menu=approval&submenu=editmanajemen');
		} else if ($submenu == "approveunitkerja"){
			mysqli_query($koneksi, "Update UnitKerja set Approval='Y', IdUserApprove='$_SESSION[Id]' where idUnitKerja= $id");
			header('location:?menu=approval&submenu=editmanajemen');
		} else if ($submenu == "approvejenisdokumen"){
			mysqli_query($koneksi, "Update JenisDokumen set Approval='Y', IdUserApprove='$_SESSION[Id]' where idJenisDokumen= $id");
			header('location:?menu=approval&submenu=editmanajemen');
		} else if ($submenu == "approvesifatdokumen"){
			mysqli_query($koneksi, "Update SifatDokumen set Approval='Y', IdUserApprove='$_SESSION[Id]' where idSifatDokumen= $id");
			header('location:?menu=approval&submenu=editmanajemen');
		} else if ($submenu == "createsatuankerja") {
			mysqli_query($koneksi, "Insert into SatuanKerja (SatuanKerja, Keterangan, IdUserCreate, Approval, KetDelete, DateCreate) VALUES ('$_POST[satuankerja]','$_POST[keterangan]', '$_SESSION[Id]', 'N', 'N', now())");
			header('location:?menu=manajemen&submenu=satuankerja');
		} else if ($submenu == "createtim") {
			mysqli_query($koneksi, "Insert into Tim (Tim, Keterangan, IdUserCreate, Approval, KetDelete, DateCreate) VALUES ('$_POST[tim]','$_POST[keterangan]', '$_SESSION[Id]', 'N', 'N', now())");
			header('location:?menu=manajemen&submenu=tim');
		} else if ($submenu == "createunitkerja") {
			mysqli_query($koneksi, "Insert into UnitKerja (UnitKerja, Keterangan, IdUserCreate, Approval, KetDelete, DateCreate) VALUES ('$_POST[unitkerja]','$_POST[keterangan]', '$_SESSION[Id]', 'N', 'N', now())");
			header('location:?menu=manajemen&submenu=unitkerja');
		} else if ($submenu == "createjenisdokumen") {
			mysqli_query($koneksi, "Insert into JenisDokumen (JenisDokumen, Keterangan, IdUserCreate, Approval, KetDelete, DateCreate) VALUES ('$_POST[jenisdokumen]','$_POST[keterangan]', '$_SESSION[Id]', 'N', 'N', now())");
			header('location:?menu=manajemen&submenu=jenisdokumen');
		} else if ($submenu == "createsifatdokumen") {
			mysqli_query($koneksi, "Insert into SifatDokumen (SifatDokumen, Keterangan, IdUserCreate, Approval, KetDelete, DateCreate) VALUES ('$_POST[sifatdokumen]','$_POST[keterangan]', '$_SESSION[Id]', 'N', 'N', now())");
			header('location:?menu=manajemen&submenu=sifatdokumen');
		} else if ($submenu="approvetempsurat") {
			$query_ceknosurat = mysqli_query($koneksi, "Select NoBuku from NoSurat order by idNoSurat DESC limit 1");
			$query_datatemp = mysqli_query($koneksi, "Select * from TempNoSurat where idTempNoSurat = $id");
			$isi= mysqli_fetch_assoc($query_ceknosurat);
			$nobuku = $isi[NoBuku] + 1;
			$isi= mysqli_fetch_assoc($query_datatemp);
			mysqli_query($koneksi, "Insert into NoSurat (TahunBuku, NoBuku, Penerbit, JenisDokumen, SifatDokumen, Approval, KetDelete, IdUserCreator, IdUserApprove, DateCreate) VALUES ('$isi[TahunBuku]', '$nobuku', '$isi[Penerbit]', '$isi[JenisDokumen]','$isi[SifatDokumen]','Y','N','$isi[IdUserCreate]', '$_SESSION[Id]', now())");
			mysqli_query($koneksi, "Delete from TempNoSurat where idTempNoSurat = $id");
			header('location:?menu=approval&submenu=editsurat');
		} else {
			require "template/page_404.html";
		}
	} else if ($menu == "delete"){
		if ($submenu=="satuankerja") {
			$query_deletesatuankerja = mysqli_query($koneksi, "Update SatuanKerja set KetDelete = 'Y', Approval='N', IdUserCreate='$_SESSION[Id]' where idSatuanKerja = $id");
			header('location:?menu=manajemen&submenu=satuankerja');
		} else if ($submenu=="tim") { 
			$query_deletetim = mysqli_query($koneksi, "Update Tim set KetDelete = 'Y', Approval='N', IdUserCreate='$_SESSION[Id]' where idTim = $id");
			header('location:?menu=manajemen&submenu=tim');
		} else if ($submenu=="unitkerja") { 
			$query_deleteunitkerja = mysqli_query($koneksi, "Update UnitKerja set KetDelete = 'Y', Approval='N', IdUserCreate='$_SESSION[Id]' where idUnitKerja = $id");
			header('location:?menu=manajemen&submenu=unitkerja');
		} else if ($submenu=="jenisdokumen") { 
			$query_deletejenisdokumen = mysqli_query($koneksi, "Update JenisDokumen set KetDelete = 'Y', Approval='N', IdUserCreate='$_SESSION[Id]' where idJenisDokumen = $id");
			header('location:?menu=manajemen&submenu=jenisdokumen');
		} else if ($submenu=="sifatdokumen") { 
			$query_deletesifatdokumen = mysqli_query($koneksi, "Update SifatDokumen set KetDelete = 'Y', Approval='N', IdUserCreate='$_SESSION[Id]' where idSifatDokumen = $id");
			header('location:?menu=manajemen&submenu=sifatdokumen');
		} else if ($submenu=="surat"){
			$query_deletesurat = mysqli_query($koneksi, "Update NoSurat set KetDelete = 'Y', Approval='N', IdUserCreator='$_SESSION[Id]' where idNoSurat = $id");
			header('location:admin.php');
		} else if ($submenu=="approvesurat"){
			mysqli_query($koneksi, "Delete from NoSurat where idNoSurat= $id");
			header('location:?menu=approval&submenu=deletesurat');
		} else if ($submenu=="approvesatuankerja"){
			mysqli_query($koneksi, "Delete from SatuanKerja where idSatuanKerja= $id");
			header('location:?menu=approval&submenu=deletemanajemen');
		} else if ($submenu=="approvetim"){
			mysqli_query($koneksi, "Delete from Tim where idTim= $id");
			header('location:?menu=approval&submenu=deletemanajemen');
		} else if ($submenu=="approveunitkerja"){
			mysqli_query($koneksi, "Delete from UnitKerja where idUnitKerja= $id");
			header('location:?menu=approval&submenu=deletemanajemen');
		} else if ($submenu=="approvejenisdokumen"){
			mysqli_query($koneksi, "Delete from JenisDokumen where idJenisDokumen= $id");
			header('location:?menu=approval&submenu=deletemanajemen');
		} else if ($submenu=="approvesifatdokumen"){
			mysqli_query($koneksi, "Delete from SifatDokumen where idSifatDokumen= $id");
			header('location:?menu=approval&submenu=deletemanajemen');
		} else {
			require "template/page_404.html";
		}
	} else if ($menu == "approval"){
		if ($submenu == "deletesurat") { 
			$query_approvalsurat=mysqli_query($koneksi, "Select * from NoSurat where IdUserEditor != '$_SESSION[Id]' and KetDelete = 'Y'"); ?>
			<table id="datatabel" class="hover" cellspacing="0" width="100%">
			<thead>
				<td>No</td>
				<td>No Surat</td>
				<td>Aksi</td>
			</thead>
			<?php
			$no = 1;
			while ($isi = mysqli_fetch_assoc($query_approvalsurat)) {?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $isi[TahunBuku]."/".$isi[NoBuku]."/".$isi[Penerbit]."/".$isi[JenisDokumen]."/".$isi[SifatDokumen]; ?></td>
				<td><a href="?menu=delete&submenu=approvesurat&id=<?php echo $isi[idNoSurat] ?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php
			$no++;
			}
			?>
		</table>	
		<?php } else if ($submenu == "editsurat") { 
			$query_approvalsurat=mysqli_query($koneksi, "Select * from NoSurat where Approval='N' and IdUserEditor != '$_SESSION[Id]' and KetDelete != 'Y'"); 
			$query_tempsurat = mysqli_query($koneksi, "Select * from TempNoSurat order by idTempNoSurat ASC"); ?>
			<table id="datatabel" class="hover" cellspacing="0" width="100%">
			<thead>
				<td>Keterangan</td>
				<td>No Surat</td>
				<td>Aksi</td>
			</thead>
			<?php
			while ($isi = mysqli_fetch_assoc($query_approvalsurat)) {?>
			<tr>
				<td>Edit</td>
				<td><?php echo $isi[TahunBuku]."/".$isi[NoBuku]."/".$isi[Penerbit]."/".$isi[JenisDokumen]."/".$isi[SifatDokumen]; ?></td>
				<td><a href="?menu=simpan&submenu=approval&id=<?php echo $isi[idNoSurat]?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php } ?>
			<?php
			while ($isi = mysqli_fetch_assoc($query_tempsurat)) {?>
			<tr>
				<td>Edit</td>
				<td><?php echo $isi[TahunBuku]."/..../".$isi[Penerbit]."/".$isi[JenisDokumen]."/".$isi[SifatDokumen]; ?></td>
				<td><a href="?menu=simpan&submenu=approvetempsurat&id=<?php echo $isi[idTempNoSurat]?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php } ?>
		</table>	
		<?php } else if($submenu == "deletemanajemen"){
			$query_approvalsatuankerja=mysqli_query($koneksi, "Select * from SatuanKerja where IdUserCreate != '$_SESSION[Id]' and KetDelete = 'Y'"); 
			$query_approvaltim=mysqli_query($koneksi, "Select * from Tim where IdUserCreate != '$_SESSION[Id]' and KetDelete = 'Y'"); 
			$query_approvalunitkerja=mysqli_query($koneksi, "Select * from UnitKerja where IdUserCreate != '$_SESSION[Id]' and KetDelete = 'Y'"); 
			$query_approvaljenisdokumen=mysqli_query($koneksi, "Select * from JenisDokumen where IdUserCreate != '$_SESSION[Id]' and KetDelete = 'Y'"); 
			$query_approvalsifatdokumen=mysqli_query($koneksi, "Select * from SifatDokumen where IdUserCreate != '$_SESSION[Id]' and KetDelete = 'Y'"); 
			?>
			<table id="datatabel" class="hover" cellspacing="0" width="100%">
			<thead>
				<td>Kategori</td>
				<td>Kode</td>
				<td>Keterangan</td>
				<td>Aksi</td>
			</thead>
			<?php
			while ($isi = mysqli_fetch_assoc($query_approvalsatuankerja)) {?>
			<tr>
				<td><?php echo "Satuan Kerja" ?></td>
				<td><?php echo $isi[SatuanKerja]; ?></td>
				<td><?php echo $isi[Keterangan]; ?></td>
				<td><a href="?menu=delete&submenu=approvesatuankerja&id=<?php echo $isi[idSatuanKerja] ?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php } ?>
			<?php
			while ($isi = mysqli_fetch_assoc($query_approvaltim)) {?>
			<tr>
				<td><?php echo "Tim" ?></td>
				<td><?php echo $isi[Tim]; ?></td>
				<td><?php echo $isi[Keterangan]; ?></td>
				<td><a href="?menu=delete&submenu=approvetim&id=<?php echo $isi[idTim] ?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php } ?>
			<?php
			while ($isi = mysqli_fetch_assoc($query_approvalunitkerja)) {?>
			<tr>
				<td><?php echo "Unit Kerja" ?></td>
				<td><?php echo $isi[UnitKerja]; ?></td>
				<td><?php echo $isi[Keterangan]; ?></td>
				<td><a href="?menu=delete&submenu=approveunitkerja&id=<?php echo $isi[idUnitKerja] ?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php } ?>
			<?php
			while ($isi = mysqli_fetch_assoc($query_approvaljenisdokumen)) {?>
			<tr>
				<td><?php echo "Jenis Dokumen" ?></td>
				<td><?php echo $isi[JenisDokumen]; ?></td>
				<td><?php echo $isi[Keterangan]; ?></td>
				<td><a href="?menu=delete&submenu=approvejenisdokumen&id=<?php echo $isi[idJenisDokumen] ?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php } ?>
			<?php
			while ($isi = mysqli_fetch_assoc($query_approvalsifatdokumen)) {?>
			<tr>
				<td><?php echo "Sifat Dokumen" ?></td>
				<td><?php echo $isi[SifatDokumen]; ?></td>
				<td><?php echo $isi[Keterangan]; ?></td>
				<td><a href="?menu=delete&submenu=approvesifatdokumen&id=<?php echo $isi[idSifatDokumen] ?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php } ?>
		</table>	
		<?php } else if ($submenu == "editmanajemen"){
			$query_approvalsatuankerja=mysqli_query($koneksi, "Select * from SatuanKerja where Approval='N' and IdUserCreate != '$_SESSION[Id]' and KetDelete != 'Y'"); 
			$query_approvaltim=mysqli_query($koneksi, "Select * from Tim where Approval='N' and IdUserCreate != '$_SESSION[Id]' and KetDelete != 'Y'"); 
			$query_approvalunitkerja=mysqli_query($koneksi, "Select * from UnitKerja where Approval='N' and IdUserCreate != '$_SESSION[Id]' and KetDelete != 'Y'"); 
			$query_approvaljenisdokumen=mysqli_query($koneksi, "Select * from JenisDokumen where Approval='N' and IdUserCreate != '$_SESSION[Id]' and KetDelete != 'Y'"); 
			$query_approvalsifatdokumen=mysqli_query($koneksi, "Select * from SifatDokumen where Approval='N' and IdUserCreate != '$_SESSION[Id]' and KetDelete != 'Y'"); 
			?>
			<table id="datatabel" class="hover" cellspacing="0" width="100%">
			<thead>
				<td>Kategori</td>
				<td>Kode</td>
				<td>Keterangan</td>
				<td>Aksi</td>
			</thead>
			<?php
			while ($isi = mysqli_fetch_assoc($query_approvalsatuankerja)) {?>
			<tr>
				<td><?php echo "Satuan Kerja" ?></td>
				<td><?php echo $isi[SatuanKerja]; ?></td>
				<td><?php echo $isi[Keterangan]; ?></td>
				<td><a href="?menu=simpan&submenu=approvesatuankerja&id=<?php echo $isi[idSatuanKerja]?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php } ?>
			<?php
			while ($isi = mysqli_fetch_assoc($query_approvaltim)) {?>
			<tr>
				<td><?php echo "Tim" ?></td>
				<td><?php echo $isi[Tim]; ?></td>
				<td><?php echo $isi[Keterangan]; ?></td>
				<td><a href="?menu=simpan&submenu=approvetim&id=<?php echo $isi[idTim]?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php } ?>
			<?php
			while ($isi = mysqli_fetch_assoc($query_approvalunitkerja)) {?>
			<tr>
				<td><?php echo "Unit Kerja" ?></td>
				<td><?php echo $isi[UnitKerja]; ?></td>
				<td><?php echo $isi[Keterangan]; ?></td>
				<td><a href="?menu=simpan&submenu=approveunitkerja&id=<?php echo $isi[idUnitKerja]?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php } ?>
			<?php
			while ($isi = mysqli_fetch_assoc($query_approvaljenisdokumen)) {?>
			<tr>
				<td><?php echo "Jenis Dokumen" ?></td>
				<td><?php echo $isi[JenisDokumen]; ?></td>
				<td><?php echo $isi[Keterangan]; ?></td>
				<td><a href="?menu=simpan&submenu=approvejenisdokumen&id=<?php echo $isi[idJenisDokumen]?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php } ?>
			<?php
			while ($isi = mysqli_fetch_assoc($query_approvalsifatdokumen)) {?>
			<tr>
				<td><?php echo "Sifat Dokumen" ?></td>
				<td><?php echo $isi[SifatDokumen]; ?></td>
				<td><?php echo $isi[Keterangan]; ?></td>
				<td><a href="?menu=simpan&submenu=approvesifatdokumen&id=<?php echo $isi[idSifatDokumen]?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i>  Approverd</a></td>
			</tr>
			<?php } ?>
		</table>
	<?php } else {
		require "template/page_404.html";
	}
	} else if($menu == "create"){ ?>
<!-- Right Coloum -->	
		 <div class="page-title">
              <div class="title_left">
                <h3>Menu Manajemen</h3>
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
                    <h2><?php echo $submenu; ?></h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <!-- End Content Right Coloum -->
		<?php if ($submenu=="satuankerja") {?>
			<form action="?menu=simpan&submenu=createsatuankerja" method="POST" class="form-horizontal form-label-left" novalidate>
				<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Satuan Kerja<span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="satuankerja" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="satuankerja" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
				<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="keterangan" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
					        
			<!-- Begin Button Submit -->
        		<div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="send" type="submit" name="submit" class="btn btn-success">Tambahkan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
			</form>
		<?php } else if ($submenu=="tim") {?>
			<form action="?menu=simpan&submenu=createtim" method="POST" class="form-horizontal form-label-left" novalidate>
				<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Tim <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="tim" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tim" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
	        <!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="keterangan" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
				<!-- Begin Button Submit -->
        		<div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="send" type="submit" name="submit" class="btn btn-success">Tambahkan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
			</form>
		<?php } else if ($submenu=="unitkerja") {?>
			<form action="?menu=simpan&submenu=createunitkerja" method="POST" class="form-horizontal form-label-left" novalidate>
				<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Unit Kerja <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="unitkerja" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="unitkerja" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
				<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="keterangan" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
				<!-- Begin Button Submit -->
        		<div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="send" type="submit" name="submit" class="btn btn-success">Tambahkan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
			</form>
		<?php } else if ($submenu=="jenisdokumen") {?>
			<form action="?menu=simpan&submenu=createjenisdokumen" method="POST" class="form-horizontal form-label-left" novalidate>
				<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Jenis Dokumen <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="jenisdokumen" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="jenisdokumen" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
				<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="keterangan" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
				<!-- Begin Button Submit -->
        		<div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="send" type="submit" name="submit" class="btn btn-success">Tambahkan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
			</form>
		<?php } else if ($submenu=="sifatdokumen") {?>
			<form action="?menu=simpan&submenu=createsifatdokumen" method="POST" class="form-horizontal form-label-left" novalidate>
				<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Sifat Dokumen <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="sifatdokumen" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sifatdokumen" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
				<!-- Begin Item Form -->
				<div class="item form-group">
	                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan <span class="required">*</span>
	                </label>
	                <div class="col-md-6 col-sm-6 col-xs-12">
	                  <input id="keterangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="keterangan" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
	                </div>
	              </div>
	        <!-- End Item Form -->
				<!-- Begin Button Submit -->
        		<div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="send" type="submit" name="submit" class="btn btn-success">Tambahkan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
			</form>
		<?php } else {
			require "template/page_404.html";
		}	
	}
	else { ?>
	<!-- Right Coloum -->	
		 <div class="page-title">
              <div class="title_left">
                <h3>Menu Manajemen</h3>
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
		<?php $query_view = mysqli_query($koneksi, "Select * from NoSurat where Approval='Y' and KetDelete!='Y' order by idNoSurat DESC"); ?>
		<table id="datatabel" class="hover" cellspacing="0" width="100%">
			<thead>
				<td><b>NO</b></td>
				<td><b>TAHUN</b></td>
				<td><b>NO SURAT</b></td>
				<td><b>TANGGAL PEMBUATAN</b></td>
				<td><b>EDIT</b></td>
			</thead>
			<tbody>
			<?php
			$no = 1;
			while ($isi = mysqli_fetch_assoc($query_view)) {?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php $query_showyear= mysqli_query($koneksi, "Select TahunBuku from Tahun Where noTahunBuku = $isi[TahunBuku] Limit 1");
				$tahun= mysqli_fetch_array($query_showyear);
				echo $tahun[TahunBuku]; ?></td>
				<td><?php echo $isi[TahunBuku]."/".$isi[NoBuku]."/".$isi[Penerbit]."/".$isi[JenisDokumen]."/".$isi[SifatDokumen]; ?></td>
				<td><?php echo $isi[DateCreate]?></td>
				<td><a href="?menu=edit&submenu=surat&id=<?php echo $isi[idNoSurat]?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>  Edit</a><a href="?menu=delete&submenu=surat&id=<?php echo $isi[idNoSurat] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>  Delete</a></td>
			</tr>
			<?php
			$no++;
			}
			?>
			</tbody>
		</table>	
		</div>
		</div>
		</div>
		<?php } ?>
<?php
} 
?> 
	</div>
	</div>
</div>
<?php 
require "template/footer.php"
?>
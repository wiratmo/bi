<?php 


$deletebanyaksurat = mysqli_num_rows(mysqli_query($koneksi, "Select * from NoSurat where IdUserEditor != '$_SESSION[Id]' and KetDelete = 'Y'"));


$edit1 = mysqli_num_rows(mysqli_query($koneksi, "Select * from NoSurat where Approval='N' and IdUserEditor != '$_SESSION[Id]' and KetDelete != 'Y'"));
$edit2 = mysqli_num_rows(mysqli_query($koneksi, "Select * from TempNoSurat"));
$editbanyaksurat = $edit1+ $edit2;


$deletebanyaksatuankerja = mysqli_num_rows(mysqli_query($koneksi, "Select * from SatuanKerja where IdUserCreate != '$_SESSION[Id]' and KetDelete = 'Y'")); 
$deletebanyaktim = mysqli_num_rows(mysqli_query($koneksi, "Select * from Tim where IdUserCreate != '$_SESSION[Id]' and KetDelete = 'Y'")); 
$deletebanyakunitkerja = mysqli_num_rows(mysqli_query($koneksi, "Select * from UnitKerja where IdUserCreate != '$_SESSION[Id]' and KetDelete = 'Y'")); 
$deletebanyakjenisdokumen = mysqli_num_rows(mysqli_query($koneksi, "Select * from JenisDokumen where IdUserCreate != '$_SESSION[Id]' and KetDelete = 'Y'")); 
$deletebanyaksifatdokumen = mysqli_num_rows(mysqli_query($koneksi, "Select * from SifatDokumen where IdUserCreate != '$_SESSION[Id]' and KetDelete = 'Y'")); 
$deletebanyakmanajemen = $deletebanyaksatuankerja + $deletebanyaktim + $deletebanyakunitkerja + $deletebanyakjenisdokumen + $deletebanyaksifatdokumen;


$editbanyaksatuankerja = mysqli_num_rows(mysqli_query($koneksi, "Select * from SatuanKerja where Approval='N' and IdUserCreate != '$_SESSION[Id]' and KetDelete != 'Y'")); 
$editbanyaktim = mysqli_num_rows(mysqli_query($koneksi, "Select * from Tim where Approval='N' and IdUserCreate != '$_SESSION[Id]' and KetDelete != 'Y'")); 
$editbanyakunitkerja = mysqli_num_rows(mysqli_query($koneksi, "Select * from UnitKerja where Approval='N' and IdUserCreate != '$_SESSION[Id]' and KetDelete != 'Y'")); 
$editbanyakjenisdokumen = mysqli_num_rows(mysqli_query($koneksi, "Select * from JenisDokumen where Approval='N' and IdUserCreate != '$_SESSION[Id]' and KetDelete != 'Y'")); 
$editbanyaksifatdokumen = mysqli_num_rows(mysqli_query($koneksi, "Select * from SifatDokumen where Approval='N' and IdUserCreate != '$_SESSION[Id]' and KetDelete != 'Y'")); 
$editbanyakmanajemen = $editbanyaksatuankerja + $editbanyaktim + $editbanyakunitkerja +$editbanyakjenisdokumen + $editbanyaksifatdokumen;

$banyakapprove = $deletebanyaksurat + $editbanyaksurat + $deletebanyakmanajemen + $editbanyakmanajemen;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bank Indonesia </title>

    <!-- Bootstrap -->
    <link href="Vendor/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="Vendor/css/font-awesome.min.css" rel="stylesheet">
    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="Vendor/css/jquery.dataTables.css">
    <!-- Custom Theme Style -->
    <link href="Vendor/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="Vendor/image/bi.png" width="20%"><span> Bank Indonesia</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="Vendor/image/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php $user = mysqli_fetch_assoc(mysqli_query($koneksi, "Select Name from Users where idUser = $_SESSION[Id]"));
                echo $user[Name];
                ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <div class="clearfix"></div>
                <ul class="nav side-menu">
                  <li><a href="admin.php"><i class="fa fa-home"></i> Home </span></a>
                  </li>
                  <li class="root_menu"><a><i class="fa fa-edit"></i> Manajemen <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?menu=manajemen&submenu=satuankerja">Satuan Kerja</a>
                      </li>
                      <li><a href="?menu=manajemen&submenu=tim">Tim</a>
                      </li>
                      <li><a href="?menu=manajemen&submenu=unitkerja">Unit Kerja</a>
                      </li>
                      <li><a href="?menu=manajemen&submenu=jenisdokumen">Jenis Dokumen</a>
                      </li>
                      <li><a href="?menu=manajemen&submenu=sifatdokumen">Sifat Dokumen</a>
                    </ul>
                  </li>
                  <li class="root_menu"><a><i class="fa fa-check"></i> Approve <span class="badge badge-success "><?php echo $banyakapprove; ?></span> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?menu=approval&submenu=editsurat">Edit Surat <span class="badge badge-success "><?php echo $editbanyaksurat; ?></span></a> 
                      </li>
                      <li><a href="?menu=approval&submenu=deletesurat">Delete Surat <span class="badge badge-success "><?php echo $deletebanyaksurat; ?></span></a>
                      </li>
                      <li><a href="?menu=approval&submenu=editmanajemen">Edit Manajemen <span class="badge badge-success "><?php echo $editbanyakmanajemen; ?></span></a>
                      </li>
                      <li><a href="?menu=approval&submenu=deletemanajemen">Delete Manajemen <span class="badge badge-success "><?php echo $deletebanyakmanajemen; ?></span></a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="user.php"><i class="fa fa-user"></i>Manajemen Operator</li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
              <li><a href="logout.php"><i class="fa fa-sign-out fa-3x"></i> Log Out</a></li>
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="Vendor/image/user.png" alt=""><?php echo $user[Name]; ?>
                  </a>
                </li>
              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->

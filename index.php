<?php
ob_start();
error_reporting(0);
session_start();
require'koneksi.php';
if (empty($_SESSION[Id])){
  if (isset($_POST['submit'])){
    mysqli_query($koneksi, "insert into Users (Username, Password, Name) VALUES ('$_POST[username]', md5('$_POST[password]'), '$_POST[name]')");
    header('location:index.php');
    }else{?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="Vendor/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="Vendor/css/custom.css">
	<link rel="stylesheet" type="text/css" href="Vendor/css/bootstrap.min.css">
</head>
  <body style="background:#F7F7F7;">
    <div class="">
      <a class="hiddenanchor" id="toregister"></a>
      <a class="hiddenanchor" id="tologin"></a>

      <div id="wrapper">
        <div id="login" class=" form">
          <section class="login_content">
            <form action="login.php" method="POST">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="Username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="Password" />
              </div>
              <div>
                <button type="submit" name="submit" value="Login" class="btn btn-info">LOGIN</button>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <p class="change_link">Operator
                  <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">Buat Baru</button>
                </p>
         
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><img src="Vendor/image/bi.png" width="10%"> BANK INDONESIA </h1>

                  <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Operator</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST" class="form-horizontal" novalidate>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name Anda<span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
              </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label for="password" class="control-label col-md-3">Password</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
              </div>
            </div>
            <!-- Begin Button Submit -->
            <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <button id="submit" type="submit" name="submit" class="btn btn-success">Tambahkan</button>
                    </div>
                  </div>
            <!-- End Button Submit -->
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

    </div>
  </body>
</html>
<?php }} else {
  header("location:beranda.php");
}
?>
    <script type="text/javascript" src="Vendor/js/jquery.dataTables.js"></script>
    <script src="Vendor/js/jquery.min.js"></script>
    <script src="Vendor/js/custom.js"></script>
    <!-- Bootstrap -->
    <script src="Vendor/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="Vendor/js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="Vendor/js/nprogress.js"></script>
    <!-- Dropzone.js -->
    <script src="Vendor/js/validator.min.js"></script>
    <!-- Data Table -->
    <script type="text/javascript" src="Vendor/js/jquery-1.12.0.min.js"></script>
    <!-- validator -->

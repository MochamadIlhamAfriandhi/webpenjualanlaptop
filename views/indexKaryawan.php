<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Penjualan Laptop dan Hardware | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">
   <!-- Morris chart -->
   <link rel="stylesheet" href="../asset/bower_components/morris.js/morris.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="../asset/bower_components/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="../asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>LP</b>HRD</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>KARYAWAN</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <?php include("navbar.php") ?>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../asset/dist/img/Ilham.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Mochamad Ilham Afriandhi</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
    </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard Karyawan
          <small>Transaksi</small>
        </h1>
        
      </section>

      <!-- Main content -->
      <form class="form-horizontal" action="../proses/prosesTransaksi.php" method="post">
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">ID Transaksi</label>

            <div class="col-sm-10">
              <input type="input" class="form-control" id="inputEmail3" name="inputIDTransaksi">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">ID Karyawan</label>

            <div class="col-sm-10">
              <input type="input" class="form-control" id="inputEmail3" name="inputIDKaryawan">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama Pembeli</label>

            <div class="col-sm-10">
              <input type="input" class="form-control" id="inputEmail3" name="inputNamaPembeli">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label>
            <div class="col-sm-10">
              <select class="form-control select" style="width: 100%;" name="Produk">
                <option selected="selected" value="">Pilih Produk</option>
                <?php
                  require '../models/modelProduk.php';
                  $objProduk = new modelProduk();
                  $data = $objProduk->select();
                  foreach ($data as $key) {
                ?>
                  <option value="<?php echo $key['NAMA_PRODUK']; ?>"><?php echo $key['NAMA_PRODUK'] ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Stok yang dibeli</label>

            <div class="col-sm-10">
              <input type="input" class="form-control" id="inputEmail3" name="inputStokdibeli">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Bayar</label>

            <div class="col-sm-10">
              <input type="input" class="form-control" id="inputEmail3" name="inputBayar">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
          <button type="submit" class="btn btn-primary">Update Transaksi</button>
          <button type="submit" class="btn btn-primary">Delete Transaksi</button>
        </div>
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Admin</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Tanggal Lahir</th>
                  <th>No Telepon</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                <?php
                  require '../models/modelAdmin.php';
                  $objAdmin = new modelAdmin();
                  $objAdmin->select();
                  $dataAdmin = $objAdmin->getData();
                  foreach ($dataAdmin as $key) {
                    ?>

                    <tr>
                      <td><?php echo $key['ID_ADMIN'] ?></td>
                      <td><?php echo $key['USERNAME'] ?></td>
                      <td><?php echo $key['PASSWORD'] ?></td>
                      <td><?php echo $key['NAMA'] ?></td>
                      <td><?php echo $key['JENIS_KELAMIN'] ?></td>
                      <td><?php echo $key['ALAMAT'] ?></td>
                      <td><?php echo $key['TANGGAL_LAHIR'] ?></td>
                      <td><?php echo $key['NO_TELP'] ?></td>
                      <td>
                        <a class="btn btn-social-icon" title="Edit"><i class="fa fa-edit" data-toggle="modal" href="#mymodal<?php echo $key['ID_ADMIN']; ?>"></i></a>
                        <a class="btn btn-social-icon" title="Hapus" href="../proses/prosesAdmin.php?aksi=hapus&idadmin=<?php echo $key['ID_ADMIN']; ?>"><i class="fa fa-bitbucket" href=></i></a>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tfoot>
              </table>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Cetak Transaksi</button>
        </div>
        <!-- /.box-body -->
      </form>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">

    </footer>

    <!-- Control Sidebar -->
    
    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 <script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="../asset/bower_components/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../asset/bower_components/raphael/raphael.min.js"></script>
<script src="../asset/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../asset/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../asset/bower_components/moment/min/moment.min.js"></script>
<script src="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../asset/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset/dist/js/demo.js"></script>
</body>
</html>
<!--<div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Jenis Produk</label>
          <div class="col-sm-10">
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                  Laptop
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                  Hardware
              </label>
            </div>
          </div>
        </div>-->
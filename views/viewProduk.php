<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Penjualan Laptop dan Hardware | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>LP</b>HRD</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>ADMIN</b></span>
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
      <?php include("sidebar.php") ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard Admin
          <small>Tabel Produk</small>
        </h1>

      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">

            <!-- /.box -->

            <!-- /.modal-dialog -->
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Produk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id Produk</th>
                    <th>Nama Produk</th>
                    <th>Jenis Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require '../models/modelProduk.php';
                  $objProduk = new modelProduk();
                  $objProduk->select();
                  $dataProduk = $objProduk->getData();
                  foreach ($dataProduk as $key) {
                    ?> 

                    <tr>
                      <td><?php echo $key['ID_PRODUK'] ?></td>
                      <td><?php echo $key['NAMA_PRODUK'] ?></td>
                      <td><?php echo $key['JENIS_PRODUK'] ?></td>
                      <td><?php echo $key['STOK'] ?></td>
                      <td><?php echo $key['HARGA'] ?></td>
                      <td>
                        <a class="btn btn-social-icon" title="Detail"><i class="fa fa-play"></i></a>
                        <a class="btn btn-social-icon" title="Edit"><i class="fa fa-edit" data-toggle="modal" href="#mymodal<?php echo $key['ID_PRODUK']; ?>"></i></a>
                        <a class="btn btn-social-icon" title="Hapus" href="../proses/prosesProduk.php?aksi=hapus&idproduk=<?php echo $key['ID_PRODUK']; ?>"><i class="fa fa-bitbucket" href=></i></a>
                      </td>
                    </tr>

                    <div class="modal fade" id="mymodal<?php echo $key['ID_PRODUK']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Edit Produk</h4>
                            </div>
                            <div class="modal-body">
                              <div class="box box-info">
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal" action="../proses/prosesProduk.php?aksi=edit" method="post">
                                 <div class="box-body">
                                  <div class="form-group">
                                    <label for="inputEmail3">ID Produk</label>
                                    <input type="input" class="form-control" id="inputIDProduk" name="inputIDProduk" value="<?php echo $key['ID_PRODUK']; ?>" enable="false">
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3">ID Admin</label>
                                    <input type="input" class="form-control" id="inputIDAdmin" name="inputIDAdmin" value="<?php echo $key['ID_ADMIN']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3">Nama Produk</label>
                                    <input type="input" class="form-control" id="inputNamaProduk" name="inputNamaProduk" value="<?php echo $key['NAMA_PRODUK']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3">Jenis Produk</label>
                                    <input type="input" class="form-control" id="inputJenisProduk" name="inputJenisProduk" value="<?php echo $key['JENIS_PRODUK']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3">Stok</label>
                                    <input type="input" class="form-control" id="inputStokProduk" name="inputStokProduk" value="<?php echo $key['STOK']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3">Harga</label>
                                    <input type="input" class="form-control" id="inputHargaProduk" name="inputHargaProduk" value="<?php echo $key['HARGA']; ?>">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn btn-primary">Update Produk</button>
                                </div>
                              </div>
                              <!-- /.box-body -->
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>

                    <?php
                  }
                  ?>

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
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
 <!-- Bootstrap 3.3.7 -->
 <script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- DataTables -->
 <script src="../asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="../asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <!-- SlimScroll -->
 <script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="../asset/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="../asset/dist/js/demo.js"></script>
 <!-- page script -->
 <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
<!--<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Produk</label>
                  <div class="col-sm-10">
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
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
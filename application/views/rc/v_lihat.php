<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminDLH | Status</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>DLH</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <b><?php echo $this->session->userdata("nama_user") ?></b>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a  class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url() ?>index.php/dashboard/logout" type="submit" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata("nama_user") ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li>
          <a href="http://localhost/rc/c_rc/c_gmaps">
            <i class="fa fa-map"></i> <span>Map</span>
          </a>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-list"></i> <span>Status Sampah</span>
            <span class="pull-right-container">
              <!--<small class="label pull-right bg-red">
                <?php echo count($data_status); ?></small>-->
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="http://localhost/rc/c_rc/c_status"><i class="fa fa-circle-o"></i> Status Pengambilan</a></li>
            <li><a href="http://localhost/rc/c_rc/c_status/validasi"><i class="fa fa-circle-o"></i> Status Tervalidasi</a></li>
            <li><a href="http://localhost/rc/c_rc/c_status/selesai"><i class="fa fa-circle-o"></i> Status Terselesaikan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-money"></i>
            <span>Pembayaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="http://localhost/rc/c_rc/c_pembayaran"><i class="fa fa-circle-o"></i> Data Pembayaran</a></li>
            <li><a href="http://localhost/rc/c_rc/c_pembayaran/validasi"><i class="fa fa-circle-o"></i> Validasi Pembayaran</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Pengaturan Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=active><a href="http://localhost/rc/c_rc/c_user"><i class="fa fa-circle-o"></i> Data User</a></li>
            <li><a href="http://localhost/rc/c_rc/c_karyawan"><i class="fa fa-circle-o"></i> Data Karyawan</a></li>
            <li><a href="http://localhost/rc/c_rc/c_bs"><i class="fa fa-circle-o"></i> Data Bank Sampah</a></li>
            <li><a href="http://localhost/rc/c_rc/c_armada"><i class="fa fa-circle-o"></i> Data Armada</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-plus"></i>
            <span>Pendaftaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=active><a href="http://localhost/rc/c_rc/c_bs"><i class="fa fa-circle-o"></i> Data Calon Bank Sampah</a></li>
            <li><a href="http://localhost/rc/c_rc/c_calonbs/validasi"><i class="fa fa-circle-o"></i> Data Tervalidasi</a></li>
          </ul>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Status</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/dinasci/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Status</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Status</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="status" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Bank Sampah</th>
                    <th>Tanggal</th>
                    <th>Plastik/kg</th>
                    <th>Besi/kg</th>
                    <th>Kertas/kg</th>
                    <th>Total Sampah/kg</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th>Options</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1; 
                    foreach($data_status as $hasil){ 
                ?>

                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $hasil->nama_bs ?></td>
                    <td><?php echo $hasil->tgl ?></td>
                    <td><?php echo $hasil->plas ?></td>
                    <td><?php echo $hasil->bes ?></td>
                    <td><?php echo $hasil->ker ?></td>
                    <td><?php echo $hasil->tot ?></td>
                    <td><?php echo $hasil->status ?></td>
                    <td><?php echo $hasil->p_status ?></td>
                    <td>
                      <a href="<?php echo base_url() ?>c_rc/c_pembayaran/cetak/<?php echo $hasil->id_map ?>" class="btn btn-sm btn-success">Print</a>
                        <a href="<?php echo base_url() ?>c_rc/c_pembayaran/status/<?php echo $hasil->id_map ?>" class="btn btn-default btn-sm mb">Ubah Status</a>
                    </td>
                  </tr>

                <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th class="bg-navy color-palette">Rincian Pembayaran:</th>
                  <th class="bg-navy color-palette"> Rp. <!-- Plastik -->
                    <?php
                  $sum1 = 3000;
                  foreach($data_status as $row){
                   $sum1 *= $row->plas;
                  }
                  echo number_format($sum1, 0);
                  ?></th>
                  <th class="bg-navy color-palette"> Rp. <!-- Besi -->
                    <?php
                  $sum2 = 5000;
                  foreach($data_status as $row){
                   $sum2 *= $row->bes;
                  }
                  echo number_format($sum2, 0);
                  ?></th>
                  <th class="bg-navy color-palette"> Rp. <!-- Kertas -->
                    <?php
                  $sum3 = 4000;
                  foreach($data_status as $row){
                   $sum3 *= $row->ker;
                  }
                  echo number_format($sum3, 0);
                  ?></th>
                  <th class="bg-navy color-palette">Total Pembayaran:</th>
                  <th class="bg-navy color-palette"> Rp. <!-- Total -->
                    <?php
                  $sum = 0;
                  foreach($data_status as $column){
                   $sum += $sum1+$sum2+$sum3;
                  }

                  echo number_format($sum, 0);
                  ?></th>
                </tr>
                </tfoot>

              </table>
            </div>
          </div>
            <box-body> 
          <div>
        <div class="row">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="callout callout-warning box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Keterangan</h3>
            </div>
             </box-header> 
            <div class="box-body">
              <dl>
                <dt>Keterangan Harga Perkilo Sampah :</dt>
                <dd>Plastik = Rp.3000/Kg</dd>
                <dd>Besi = Rp.5000/Kg</dd>
                <dd>Kertas = Rp.4000/Kg</dd>
              </dl>
            </div>
           </box-body>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong><center>Copyright &copy; 2018 <a href="https://adminlte.io">Dinas Lingkungan Hidup Kabupaten Malang</a>.</center></strong> <center>All rights reserved.</center>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
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
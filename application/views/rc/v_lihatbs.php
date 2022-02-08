<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
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
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
 
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
                  <a href="<?php echo base_url() ?>index.php/c_rc/c_dashboard/logout" type="submit" class="btn btn-default btn-flat">Sign out</a>
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
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li>
          <a href="http://localhost/rc/c_rc/c_gmaps">
            <i class="fa fa-map"></i> <span>Map</span>
            <small class="label pull-right bg-red">
                <?php echo count($data_status); ?></small>
          </a>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-list"></i> <span>Status Sampah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="http://localhost/rc/c_rc/c_status"><i class="fa fa-circle-o text-red"></i>Pengambilan <small class="label pull-right bg-red">
                <?php echo count($data_status); ?></small></a></li>
            <li><a href="http://localhost/rc/c_rc/c_status/validasi"><i class="fa fa-circle-o text-yellow"></i>Terproses <small class="label pull-right bg-yellow">
                <?php echo count($data_status); ?></small></a></li>
            <li><a href="http://localhost/rc/c_rc/c_status/selesai"><i class="fa fa-circle-o text-green"></i>Terselesaikan</a></li>
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
            <li><a href="http://localhost/rc/c_rc/c_pembayaran"><i class="fa fa-circle-o text-aqua"></i> Data Pembayaran <small class="label pull-right bg-aqua">
                <?php echo count($data_pmbyr); ?></small></a></li>
            <li><a href="http://localhost/rc/c_rc/c_pembayaran/validasi"><i class="fa fa-circle-o text-green"></i> Validasi Pembayaran</a></li>
          </ul>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Pengaturan Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="http://localhost/rc/c_rc/c_user"><i class="fa fa-circle-o text-aqua"></i> Data User</a></li>
            <li><a href="http://localhost/rc/c_rc/c_karyawan"><i class="fa fa-circle-o text-aqua"></i> Data Karyawan</a></li>
            <li class="active"><a href="http://localhost/rc/c_rc/c_bs"><i class="fa fa-circle-o text-aqua"></i> Data Bank Sampah</a></li>
            <li><a href="http://localhost/rc/c_rc/c_armada"><i class="fa fa-circle-o text-aqua"></i> Data Armada</a></li>
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
            <li><a href="http://localhost/rc/c_rc/c_calonbs"><i class="fa fa-circle-o text-yellow"></i>Calon Bank Sampah <small class="label pull-right bg-yellow">
                <?php echo count($data_calonbs); ?></small></a></li>
            <li><a href="http://localhost/rc/c_rc/c_calonbs/validasi"><i class="fa fa-circle-o text-green"></i> Data Tervalidasi</a></li>
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
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Bank Sampah</h3>
            </div>
            <div class="box-body">
              <?php foreach($data_bs as $u):?>
            <form class="form-horizontal">
                    <input type="hidden" name="id_dbs" value="<?php echo $u->id_dbs ?>">
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama :</label>
                  <div class="col-sm-10">
                    <label for="nama" class="control-label"><?php echo $u->n_penggurus ?></label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama BS :</label>
                  <div class="col-sm-10">
                    <label for="nama" class="control-label"><?php echo $u->nama_bs ?></label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Alamat :</label>
                  <div class="col-sm-10">
                    <label for="nama" class="control-label"><?php echo $u->alamat ?></label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Email :</label>
                  <div class="col-sm-10">
                    <label for="nama" class="control-label"><?php echo $u->email ?></label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Telephone :</label>
                  <div class="col-sm-10">
                    <label for="nama" class="control-label"><?php echo $u->tlpn ?></label>
                  </div>
                </div>
                <h3 class="box-title">File :</h3>
                <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="20">No.</th>
                    <th width="150">Struktur Organisasi</th>
                    <th width="150">SK Desa</th>
                    <th width="150">Profil</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1; 
                    foreach($data_bs as $hasil){ 
                ?>

                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><img src=<?php echo base_url("assets/images/".$hasil->f_ktp)?>. width="100" height="100"></td>
                    <td><img src=<?php echo base_url("assets/images/".$hasil->f_sk)?>. width="100" height="100"></td>
                    <td><img src=<?php echo base_url("assets/images/".$hasil->f_profil)?>. width="100" height="100"></td>
                  </tr>

                <?php } ?>

                </tbody>
              </table>
            </form>
                <?php endforeach;?>
            </div>
          <!-- /.box -->
          </div>
      </section>
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
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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
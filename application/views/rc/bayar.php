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

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="http://localhost/bs/dashboard/c_dashboardbs" class="logo">
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
              <b><?php echo $this->session->userdata("n_penggurus") ?></b>
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
                  <a href="<?php echo base_url() ?>dashboard/c_dashboardbs/logout" type="submit" class="btn btn-default btn-flat">Sign out</a>
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
            <li><a href="http://localhost/rc/c_rc/c_status"><i class="fa fa-circle-o text-red"></i>Pengambilan</small></a></li>
            <li><a href="http://localhost/rc/c_rc/c_status/validasi"><i class="fa fa-circle-o text-yellow"></i>Terproses</a></li>
            <li><a href="http://localhost/rc/c_rc/c_status/selesai"><i class="fa fa-circle-o text-green"></i>Terselesaikan</a></li>
          </ul>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa  fa-money"></i>
            <span>Pembayaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="http://localhost/rc/c_rc/c_pembayaran"><i class="fa fa-circle-o text-aqua"></i> Data Pembayaran</small></a></li>
            <li><a href="http://localhost/rc/c_rc/c_pembayaran/validasi"><i class="fa fa-circle-o text-green"></i> Validasi Pembayaran</a></li>
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
            <li><a href="http://localhost/rc/c_rc/c_user"><i class="fa fa-circle-o text-aqua"></i> Data User</a></li>
            <li><a href="http://localhost/rc/c_rc/c_karyawan"><i class="fa fa-circle-o text-aqua"></i> Data Karyawan</a></li>
            <li><a href="http://localhost/rc/c_rc/c_bs"><i class="fa fa-circle-o text-aqua"></i> Data Bank Sampah</a></li>
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
            <li><a href="http://localhost/rc/c_rc/c_calonbs"><i class="fa fa-circle-o text-yellow"></i>Calon Bank Sampah</small></a></li>
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
          </div>
            <!-- /.box-header -->
            <div class="col-md-9">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Hasil Perolehan Uang :</a></li>
              </ul>
               <?php foreach($maps as $u){ ?>
                <div class="tab-content">
                <div class="active tab-pane" id="settings">
                <form class="form-horizontal" action="<?php echo base_url('c_rc/c_pembayaran/simpan') ?>" method="POST">
                    <input type="hidden" name="id_map" value="<?php echo $u->id_map ?>">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama BS :</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Nama" name="h_plas" value="<?php echo ($u->nama_bs) ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Plastik :</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Nama" name="h_plas" value="<?php echo ($u->plas*4000) ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kertas :</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Nama" name="h_ker" value="<?php echo ($u->ker*2000) ?>"readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Besi :</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Nama" name="h_bes" value="<?php echo ($u->bes*3700) ?>"readonly>
                    </div>
                  </div>
                  <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
              </div>
            </div>
          </form>
        </div>
                <?php } ?>
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
<script type="text/javascript">
  function cek_l(){
    var s_tot = $('#saldo').val();
    var penarikan = $('#penarikan').val();
// alert()
    if(penarikan<=saldo){
      var x = confirm("Simpan Penarikan?");
      if(x){
        return true;
      }else{
        return false;
      }
    }else{
      alert("Penarikan Melebihi Saldo");
      return false;
    }
    // return false;
  }
</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;?></title>
  <link rel="icon" href="<?php echo base_url(); ?>asset/polsri.png" type="image/x-icon" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/skins/_all-skins.min.css">
  <script src="<?php echo base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js" type="text/javascript"></script>
    
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<?php foreach($pengguna->result_array() as $user)?>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>KJ</b>TS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Konsentrasi Jurusan</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>asset/admin.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><b><?php echo $user['nama'];?></b></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>asset/admin.png" class="img-circle" alt="User Image">

                <p>
                  <b><?php echo $user['nama'];?></b>
                  <small><?php if($user['hak_akses']=='1'){ echo "Login as : Pegawai";}?></small>
                  <small><?php if($user['hak_akses']=='2'){ echo "Login as : Sekretaris Jurusan";}?></small>
                  <small><?php if($user['hak_akses']=='3'){ echo "Login as : Ketua Jurusan";}?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url();?>web/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
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
          <img src="<?php echo base_url();?>asset/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['nama'];?></p>
          <a href="#"><i class="fa fa-circle text-warning"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
      <br>
        <?php if($user['hak_akses']=='1'){?>
        <li class="header">Pegawai NAVIGATION</li>
        <!-- As Admin -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Data Input</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url();?>web/view_data_nilai"><i class="fa fa-circle-o"></i> Data Nilai</a></li>
            <li><a href="<?php echo base_url();?>web/view_data_mahasiswa"><i class="fa fa-circle-o"></i> Data Mahasiswa</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url();?>web/view_data_mk"><i class="fa fa-book"></i> <span>Data Mata Kuliah</span></a></li>
        <li><a href="<?php echo base_url();?>web/view_penilaian"><i class="fa fa-file-archive-o"></i> <span>Data Penilaian</span></a></li>
        <?php } ?>

        <?php if($user['hak_akses']=='2'){?>
        <li class="header">SEKJUR NAVIGATION</li>
        <!-- As Sekjur -->
        <li><a href="<?php echo base_url();?>web/penilaian_mahasiswa"><i class="fa fa-book"></i> <span>Data Penilaian Mahasiswa</span></a></li>
        <li><a href="<?php echo base_url();?>web/penilaian_jurusan"><i class="fa fa-book"></i> <span>Input Nilai Konsentrasi</span></a></li>
        <li><a href="<?php echo base_url();?>web/rekomendasi_sugeno"><i class="fa fa-book"></i> <span>Penilaian (Sugeno)</span></a></li>
        <li><a href="<?php echo base_url();?>web/rekomendasi_tsukamoto"><i class="fa fa-book"></i> <span>Penilaian (Tsukamoto)</span></a></li>
        <li><a href="<?php echo base_url();?>web/error_rate"><i class="fa fa-book"></i> <span>Error Rate</span></a></li>
        <li><a href="<?php echo base_url();?>web/rekomendasi_all"><i class="fa fa-book"></i> <span>Laporan (ALL Rekomendasi)</span></a></li>
        <?php } ?>

        <?php if($user['hak_akses']=='3'){?>
        <li class="header">KAJUR NAVIGATION</li>
        <!-- As Kajur -->
        <li><a href="<?php echo base_url();?>web/rekomendasi_sugeno"><i class="fa fa-book"></i> <span>Penilaian (Sugeno)</span>
        <li><a href="<?php echo base_url();?>web/rekomendasi_tsukamoto"><i class="fa fa-book"></i> <span>Penilaian (Tsukamoto)</span></a></li>
        <li><a href="<?php echo base_url();?>web/error_rate"><i class="fa fa-book"></i> <span>Error Rate</span></a></li>
        <li><a href="<?php echo base_url();?>web/rekomendasi_all"><i class="fa fa-book"></i> <span>Laporan (ALL Rekomendasi)</span></a></li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-bookmark"></i> <?php echo $board;?></a></li>
        <li class="active"><?php echo $page;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Urban Sky</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url()?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url()?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>admin/index">
				<div class="sidebar-brand-icon">
					<img src="<?= base_url()?>assets/images/logo_uicci1.png" width=70 alt="" />
				</div>
			</a>
     

      <!-- Divider -->
      <hr class="sidebar-divider">
       <!-- Heading -->
      <div class="sidebar-heading">
        Selamat Datang, Admin!
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>admin/index">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li><hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>admin/data_sales">
          <i class="fas fa-user"></i>
          <span>Data Sales</span></a>
      </li>
 <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>admin/pendaftar">
          <i class="fas fa-user"></i>
          <span>Data Prospek</span></a>
      </li>
      
 <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>admin/upload">
          <i class="fas fa-user"></i>
          <span>Data Kegiatan Sales</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>admin/absen_datang">
          <i class="fas fa-user"></i>
          <span>Absen Datang</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>admin/absen_pulang">
          <i class="fas fa-user"></i>
          <span>Absen Pulang</span></a>
      </li>


      <!-- Divider -->
      

      <!-- Heading -->
    

      <!-- Nav Item - Pages Collapse Menu -->
     

       

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

           

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

               
               

              

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin </span>
              
                <img class="img-profile rounded-circle" src="<?= base_url()?>assets/images/admin.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
               
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          

<?php
    require 'db.php';
    session_start();
    // require 'db.php';
    // // Mengambil data barang
    $dataBarang = getBarang();
    // Cek apakah pengguna telah login
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit(); // Keluar dari script agar halaman berikutnya tidak ditampilkan
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fotocopy Admis Copy Center</title>

    <link rel="icon" href="img/pencil-case.png" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <img src="img/pencil-case.png" width="50" height="50">
                </div>
                <div class="sidebar-brand-text mx-3">Admis Copy Center</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php if ($_SESSION['level'] == 'pemilik') { ?>
                <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index_pemilik.php">
                    <img src="img/report.png" style="margin-right : 5px;" width="13" height="13" alt="" srcset="">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="data_karyawan.php">
                    <img src="img/teamwork.png" style="margin-right : 5px;" width="15" height="15" alt="" srcset="">
                    <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                    <span>Data Karyawan</span></a>
            </li>

             <!-- Nav Item - Charts -->
             <li class="nav-item">
                <a class="nav-link" href="data_barang.php">
                    <img src="img/stationary.png" style="margin-right : 5px;" width="15" height="15" alt="" srcset="">
                    <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                    <span>Data Barang</span></a>
            </li>
             <!-- <li class="nav-item">
                <a class="nav-link" href="cetak_karyawan.php">
                    <img src="img/printer.png" style="margin-right : 5px;" width="15" height="15" alt="" srcset="">
                    <i class="fas fa-fw fa-chart-area"></i> -->
                    <!-- <span>Cetak Laporan</span></a> -->
            <!-- </li> --> -->
            <?php
            } else if ($_SESSION['level'] == 'admin') {
            ?>
            <!-- Heading -->
            <div style="margin-top: 20px;" class="sidebar-heading">
                Menu
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="data_barang_masuk.php">
                    <img src="img/add-stock.png" style="margin-right : 5px;" width="15" height="15" alt="" srcset="">
                    <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                    <span>Tambah Stok Barang</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_transaksi.php">
                    <img src="img/bag.png" style="margin-right : 5px;" width="15" height="15" alt="" srcset="">
                    <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                    <span>Data Transaksi</span></a>
            </li>
            <!-- <div class="sidebar-heading">
                Laporan
            </div> -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Cetak Laporan</span>
                </a>
                
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cetak Laporan:</h6>
                        <a class="collapse-item" href="#">Data Stok Barang</a>
                        <a class="collapse-item" href="register.html">Data Transaksi</a>
                        <a class="collapse-item" href="forgot-password.html">Barang Harus Direstok</a>
                    </div>
                </div>
            </li> -->
            <?php } ?>
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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                       
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo <?php echo $_SESSION['nama'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

 
<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIM Antrian - RS Muhammadiyah Gresik</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fab fa-algolia"></i>
                </div>
                <div class="sidebar-brand-text mx-2">SIM-Antrian</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="antrian-poli.php">
                    <i class="fas fa-door-open"></i>
                    <span>Antrian Poli</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="antrian-khanza.php">
                    <i class="fas fa-user-friends"></i>
                    <span>Antrian Khanza</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php" target="_blank">
                    <i class="fas fa-desktop"></i>
                    <span>Dashboard</span>
                </a>
            </li>

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

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pilih Poli Antrian</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Isi Disini -->

                        <div class="col">

                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">List Poliklinik</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="10%">Kode Poli</th>
                                                    <th width="28%">Nama Poli</th>
                                                    <th width="40%">Nama Dokter</th>
                                                    <th class="text-center" width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                
                                                $getHari = mysqli_query($conn2, "SELECT DAYNAME('$date')");
                                                $hari = mysqli_fetch_array($getHari);

                                                if($hari[0] == "Sunday"){
                                                    $namahari = "AKHAD";
                                                }else if($hari[0] == "Monday"){
                                                    $namahari = "SENIN";
                                                }else if($hari[0] == "Tuesday"){
                                                       $namahari = "SELASA";
                                                }else if($hari[0] == "Wednesday"){
                                                    $namahari = "RABU";
                                                }else if($hari[0] == "Thursday"){
                                                    $namahari = "KAMIS";
                                                }else if($hari[0] == "Friday"){
                                                    $namahari = "JUMAT";
                                                }else if($hari[0] == "Saturday"){
                                                    $namahari = "SABTU";
                                                }
                                                
                                                $query_Poli = "SELECT dokter.nm_dokter,
                                                                poliklinik.kd_poli, 
                                                                poliklinik.nm_poli, 
                                                                dokter.kd_dokter 
                                                                FROM jadwal INNER JOIN dokter 
                                                                INNER JOIN poliklinik 
                                                                on dokter.kd_dokter=jadwal.kd_dokter 
                                                                AND jadwal.kd_poli=poliklinik.kd_poli 
                                                                WHERE jadwal.hari_kerja='$namahari'";

                                                $getData = mysqli_query($conn2, $query_Poli);

                                                while ($rowData = mysqli_fetch_assoc($getData)) {
                                                ?>

                                                    <tr>
                                                        <td><?= $rowData['kd_poli'] ?></td>
                                                        <td><?= $rowData['nm_poli'] ?></td>
                                                        <td><?= $rowData['nm_dokter']; ?></td>
                                                        <td align="center">
                                                            <a class="btn btn-primary btn-circle btn-sm" href="pages/antrian/poli_khanza.php?poli=<?= $rowData['kd_poli'] ?>&dokter=<?= $rowData['kd_dokter'] ?>">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- end col -->

                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; RS MUHAMMADIYAH GRESIK</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

</body>

</html>
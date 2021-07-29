<?php

include "config.php";

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

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800">Antrian Poli RS Muhammadiyah Gresik</h1>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h4 font-weight-bold text-primary text-uppercase text-center">Poli 1</div>
                                            <?php
                                            $ambilPoli1 = mysqli_query($conn, "SELECT max(a_antrian.no_urut) as nomor_antrian, a_poliklinik.nm_poli 
                                                                                    FROM a_antrian 
                                                                                    LEFT JOIN a_poliklinik ON a_poliklinik.id_poli = a_antrian.id_poli 
                                                                                    WHERE
                                                                                    a_antrian.no_poli = 1 AND a_antrian.status = '-' AND a_antrian.keterangan = 'otomatis' AND a_antrian.tgl_periksa = '$date'");
                                            $output1 = mysqli_fetch_assoc($ambilPoli1);
                                            ?>
                                            <div class="h4 font-weight-bold text-gray-800 text-center mb-1">
                                                <?php
                                                if ($output1['nomor_antrian'] == "") {
                                                    echo "Belum Mulai";
                                                } else {
                                                    echo $output1['nm_poli'];
                                                }
                                                ?>
                                            </div>
                                            <hr>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800 text-center">Antrian Sekarang : <?= $output1['nomor_antrian']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h4 font-weight-bold text-primary text-uppercase text-center">Poli 2</div>
                                            <?php
                                            $ambilPoli2 = mysqli_query($conn, "SELECT max(a_antrian.no_urut) as nomor_antrian, a_poliklinik.nm_poli 
                                                                                    FROM a_antrian 
                                                                                    LEFT JOIN a_poliklinik ON a_poliklinik.id_poli = a_antrian.id_poli 
                                                                                    WHERE
                                                                                    a_antrian.no_poli = 2 AND a_antrian.status = '-' AND a_antrian.keterangan = 'otomatis' AND a_antrian.tgl_periksa = '$date'");
                                            $output2 = mysqli_fetch_assoc($ambilPoli2);
                                            ?>
                                            <div class="h4 font-weight-bold text-gray-800 text-center mb-1">
                                                <?php
                                                if ($output2['nomor_antrian'] == "") {
                                                    echo "Belum Mulai";
                                                } else {
                                                    echo $output2['nm_poli'];
                                                }
                                                ?>
                                            </div>
                                            <hr>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800 text-center">Antrian Sekarang : <?= $output2['nomor_antrian']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h4 font-weight-bold text-primary text-uppercase text-center">Poli 3</div>
                                            <?php
                                            $ambilPoli3 = mysqli_query($conn, "SELECT max(a_antrian.no_urut) as nomor_antrian, a_poliklinik.nm_poli 
                                                                                    FROM a_antrian 
                                                                                    LEFT JOIN a_poliklinik ON a_poliklinik.id_poli = a_antrian.id_poli 
                                                                                    WHERE
                                                                                    a_antrian.no_poli = 3 AND a_antrian.status = '-' AND a_antrian.keterangan = 'otomatis' AND a_antrian.tgl_periksa = '$date'");
                                            $output3 = mysqli_fetch_assoc($ambilPoli3);
                                            ?>
                                            <div class="h4 font-weight-bold text-gray-800 text-center mb-1">
                                                <?php
                                                if ($output3['nomor_antrian'] == "") {
                                                    echo "Belum Mulai";
                                                } else {
                                                    echo $output3['nm_poli'];
                                                }
                                                ?>
                                            </div>
                                            <hr>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800 text-center">Antrian Sekarang : <?= $output3['nomor_antrian']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h4 font-weight-bold text-primary text-uppercase text-center">Poli 4</div>
                                            <?php
                                            $ambilPoli4 = mysqli_query($conn, "SELECT max(a_antrian.no_urut) as nomor_antrian, a_poliklinik.nm_poli 
                                                                                    FROM a_antrian 
                                                                                    LEFT JOIN a_poliklinik ON a_poliklinik.id_poli = a_antrian.id_poli 
                                                                                    WHERE
                                                                                    a_antrian.no_poli = 4 AND a_antrian.status = '-' AND a_antrian.keterangan = 'otomatis' AND a_antrian.tgl_periksa = '$date'");
                                            $output4 = mysqli_fetch_assoc($ambilPoli4);
                                            ?>
                                            <div class="h4 font-weight-bold text-gray-800 text-center mb-1">
                                                <?php
                                                if ($output4['nomor_antrian'] == "") {
                                                    echo "Belum Mulai";
                                                } else {
                                                    echo $output4['nm_poli'];
                                                }
                                                ?>
                                            </div>
                                            <hr>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800 text-center">Antrian Sekarang : <?= $output4['nomor_antrian']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h4 font-weight-bold text-primary text-uppercase text-center">Poli 5</div>
                                            <?php
                                            $ambilPoli5 = mysqli_query($conn, "SELECT max(a_antrian.no_urut) as nomor_antrian, a_poliklinik.nm_poli 
                                                                                    FROM a_antrian 
                                                                                    LEFT JOIN a_poliklinik ON a_poliklinik.id_poli = a_antrian.id_poli 
                                                                                    WHERE
                                                                                    a_antrian.no_poli = 5 AND a_antrian.status = '-' AND a_antrian.keterangan = 'otomatis' AND a_antrian.tgl_periksa = '$date'");
                                            $output5 = mysqli_fetch_assoc($ambilPoli5);
                                            ?>
                                            <div class="h4 font-weight-bold text-gray-800 text-center mb-1">
                                                <?php
                                                if ($output5['nomor_antrian'] == "") {
                                                    echo "Belum Mulai";
                                                } else {
                                                    echo $output5['nm_poli'];
                                                }
                                                ?>
                                            </div>
                                            <hr>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800 text-center">Antrian Sekarang : <?= $output5['nomor_antrian']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h4 font-weight-bold text-primary text-uppercase text-center">Poli 6</div>
                                            <?php
                                            $ambilPoli6 = mysqli_query($conn, "SELECT max(a_antrian.no_urut) as nomor_antrian, a_poliklinik.nm_poli 
                                                                                    FROM a_antrian 
                                                                                    LEFT JOIN a_poliklinik ON a_poliklinik.id_poli = a_antrian.id_poli 
                                                                                    WHERE
                                                                                    a_antrian.no_poli = 6 AND a_antrian.status = '-' AND a_antrian.keterangan = 'otomatis' AND a_antrian.tgl_periksa = '$date'");
                                            $output6 = mysqli_fetch_assoc($ambilPoli6);
                                            ?>
                                            <div class="h4 font-weight-bold text-gray-800 text-center mb-1">
                                                <?php
                                                if ($output6['nomor_antrian'] == "") {
                                                    echo "Belum Mulai";
                                                } else {
                                                    echo $output6['nm_poli'];
                                                }
                                                ?>
                                            </div>
                                            <hr>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800 text-center">Antrian Sekarang : <?= $output6['nomor_antrian']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h4 font-weight-bold text-primary text-uppercase text-center">Poli 7</div>
                                            <?php
                                            $ambilPoli7 = mysqli_query($conn, "SELECT max(a_antrian.no_urut) as nomor_antrian, a_poliklinik.nm_poli 
                                                                                    FROM a_antrian 
                                                                                    LEFT JOIN a_poliklinik ON a_poliklinik.id_poli = a_antrian.id_poli 
                                                                                    WHERE
                                                                                    a_antrian.no_poli = 7 AND a_antrian.status = '-' AND a_antrian.keterangan = 'otomatis' AND a_antrian.tgl_periksa = '$date'");
                                            $output7 = mysqli_fetch_assoc($ambilPoli7);
                                            ?>
                                            <div class="h4 font-weight-bold text-gray-800 text-center mb-1">
                                                <?php
                                                if ($output7['nomor_antrian'] == "") {
                                                    echo "Belum Mulai";
                                                } else {
                                                    echo $output7['nm_poli'];
                                                }
                                                ?>
                                            </div>
                                            <hr>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800 text-center">Antrian Sekarang : <?= $output7['nomor_antrian']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
    <script src="vendor/chart.js/Chart.min.js"></script>

</body>

</html>
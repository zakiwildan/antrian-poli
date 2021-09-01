<?php
require('../../config.php');
$poli = $_GET['poli'];

$queryPemakaian = "SELECT no_poli FROM a_antrian WHERE id_poli = '$poli' AND status = '-' AND tgl_periksa = '$date' LIMIT 1";
$cekPemakaian = mysqli_query($conn, $queryPemakaian);
//Cek Ada Data Atau Tidak
$outputHasil = mysqli_fetch_assoc($cekPemakaian);
$hitungCek = mysqli_num_rows($cekPemakaian);
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
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
        <a class="nav-link" href="../../index.php">
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
        <a class="nav-link" href="../../antrian-poli.php">
          <i class="fas fa-door-open"></i>
          <span>Antrian Poli</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="../../antrian-manual.php">
          <i class="fas fa-drafting-compass"></i>
          <span>Antrian Manual</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="../../antrian-khanza.php">
          <i class="fas fa-user-friends"></i>
          <span>Antrian Khanza</span>
        </a>
      </li> -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="../../dashboard.php" target="_blank">
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

          <!-- Content Row -->
          <div class="row">

            <div class="col">

              <div class="card">
                <div class="card-header py-3">
                  <div class="row">
                    <div class="col-6 float-left">
                      <?php
                      $cekID = mysqli_query($conn, "SELECT nm_poli FROM a_poliklinik WHERE id_poli = '$poli'");
                      while ($nmPoli = mysqli_fetch_assoc($cekID)) {
                      ?>
                        <h6 class="mt-1 font-weight-bold text-primary">Antrian <?= $nmPoli['nm_poli']; ?></h6>

                      <?php }; ?>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <!-- Isian Menu -->
                      <div class="row">
                        <div class="col-6">
                          <div class="jumbotron mt-4">
                            <h3>Nomor Yang Dipanggil :</h3>
                            <hr class="my-4">
                            <h1 class="display-3 text-center" id="nomor-antrian2">
                              Belum Ada
                            </h1>
                          </div>

                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="inputNomor">Masukkan Nomor Antrian</label>
                                <input type="text" class="form-control" id="inputNomor">
                              </div>
                            </div>
                          </div>

                          <!-- Batas Tombol -->
                          <div class="row mb-4 text-center">

                            <div class="col">
                              <!-- Button Next -->
                              <button class="btn btn-primary btn-icon-split btn-lg" id="manual">
                                <span class="icon text-white-50">
                                  <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Panggil Antrian</span>
                              </button>
                            </div>

                          </div>
                        </div>

                        <div class="col-6">
                          <div class="card border-left-primary shadow py-2 mt-4">
                            <div class="card-body">
                              <div class="no-gutters align-items-center">
                                Petunjuk Penggunaan :<br>
                                <ol>
                                  <li>Ketikan Manual Nomor Antrian Pada Kolom <b class="text-danger"><i>Masukkan Nomor Antrian</i></b>.</li>
                                  <li>Jika Sudah Memasukkan Nomor, Tekan Tombol <b class="text-danger"><i>Panggil Antrian</i></b>.</li>
                                </ol>
                              </div>
                            </div>
                          </div>
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
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <script>
    $(document).ready(function() {

      var idPoli = <?= json_encode($poli); ?>;

      $("#manual").click(function() {
        inputNomor = document.getElementById('inputNomor').value;
        $.ajax({
          type: "POST",
          url: "../trigger/tambah_manual.php",
          data: {
            id: idPoli,
            inputNomor: inputNomor
          },
          success: function(html) {
            $("#nomor-antrian2").html(html);
            document.getElementById('inputNomor').value = "";
          }

        })

      });

    })
  </script>

</body>

</html>
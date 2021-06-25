<?php
require_once('../../config.php');
$poli = $_GET['poli'];
$dokter = $_GET['dokter'];
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
          <span>Dashboard</span></a>
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
        <a class="nav-link" href="../../antrian-khanza.php">
          <i class="fas fa-user-friends"></i>
          <span>Antrian Khanza</span>
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
                      $cekID = mysqli_query($conn2, "SELECT nm_poli FROM poliklinik WHERE kd_poli = '$poli'");
                      while ($nmPoli = mysqli_fetch_assoc($cekID)) {
                      ?>
                        <h6 class="mt-1 font-weight-bold text-primary">Antrian <?= $nmPoli['nm_poli']; ?></h6>

                      <?php }; ?>
                  </div>
                </div>
                <div class="card-body">
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Antrian</a>
                    </div>
                  </nav>

                  <!-- Isian Menu -->

                  <div class="tab-content" id="nav-tabContent">
                    <!-- Antrian Otomatis -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="row">
                        <div class="col-6">
                          <div class="jumbotron mt-4">
                            <h3>Nomor Yang Dipanggil :</h3>
                            <hr class="my-4">
                            <h1 class="display-3 text-center" id="nomor-antrian">
                              <?php
                              $qAntrian = mysqli_query($conn, "SELECT max(a_antrian.no_urut) as no_urut FROM a_antrian JOIN a_poliklinik ON a_antrian.id_poli = a_poliklinik.id_poli WHERE a_antrian.id_poli = '$poli' AND a_antrian.keterangan = 'otomatis' AND a_antrian.status = '-'");
                              while ($cekNomor = mysqli_fetch_assoc($qAntrian)) {
                                if ($cekNomor['no_urut'] <= 0) {
                                  echo "Kosong";
                                } else {
                                  echo $cekNomor['no_urut'];
                                }
                              }
                              ?>
                            </h1>
                          </div>

                          <!-- Batas Tombol -->
                          <div class="row mb-4 text-center">
                            <div class="col-6 float-left">
                              <!-- Button Next -->
                              <button class="btn btn-primary btn-icon-split btn-lg" id="next">
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
                                  <li>Pastikan Nomor yang dipanggil <b class="text-danger"><i>"Kosong"</i></b>.</li>
                                  <li>Tekan Tombol <b class="text-danger"><i>"Panggil Antrian"</i></b> Untuk Memanggil Pasien.</li>
                                  <li>Jika Sudah, Jangan Lupa Mengganti Status Pada Menu Registrasi Khanza Menjadi <b class="text-danger"><i>"Sudah"</i></b>.</li>
                                </ol>
                                Note : Antrian Ini Berdasarkan Dari Nomor Urut Terkecil Yang Terdaftar Di SIM RS Khanza.
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
      idPoli = <?= json_encode($poli); ?>;
      kdDokter = <?= json_encode($dokter); ?>;

      $("#next").click(function() {
        $.ajax({
          type: "POST",
          url: "../trigger/panggil_khanza.php",
          data: {
            id: idPoli,
            dokter: kdDokter,
          },
          success: function(html) {
            $("#nomor-antrian").html(html)
          }

        })

      });

    })
  </script>

</body>

</html>
<?php 

//Masukkan Koneksi
include "../../config.php";

//Deklarasi Parameter ID
$poli = $_POST['id'];
$dokter = $_POST['dokter'];
$noreg = $_POST['noreg'];

//Update Status Antrian -> Selesai
$query = mysqli_query($conn2, "UPDATE reg_periksa SET stts = 'Sudah' WHERE kd_poli = '$poli' AND tgl_registrasi = '$date' AND kd_dokter = '$dokter' AND stts != 'Sudah' AND stts != 'Batal' AND stts != 'Dirawat' AND no_reg = '$noreg'");

//Hitung Ulang Antrian
$cekAntrian = mysqli_query($conn2, "SELECT min(no_reg) as no_reg FROM reg_periksa WHERE kd_dokter = '$dokter' AND kd_poli = '$poli' AND tgl_registrasi = '$date' AND stts != 'Sudah' AND stts != 'Batal' AND stts != 'Dirawat'");
$jumlahAntrian = mysqli_fetch_assoc($cekAntrian);
echo $jumlahAntrian['no_reg'];

?>
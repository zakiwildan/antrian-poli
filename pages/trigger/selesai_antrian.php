<?php 

//Masukkan Koneksi
include "../../config.php";

//Deklarasi Parameter ID
$id = $_POST['id'];

//Update Status Antrian -> Selesai
$query = mysqli_query($conn, "UPDATE a_antrian SET status = 'selesai' WHERE nm_poli = '$id' AND tgl_periksa = '$date' AND status != 'selesai'");

//Hitung Ulang Antrian
$cekAntrian = mysqli_query($conn, "SELECT * FROM a_antrian WHERE tgl_periksa = '$date' AND nm_poli = '$id' AND status != 'selesai'");
$jumlahAntrian = mysqli_num_rows($cekAntrian);
echo "$jumlahAntrian";

?>
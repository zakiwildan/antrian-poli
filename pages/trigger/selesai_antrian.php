<?php 

//Masukkan Koneksi
include "../../config.php";

//Deklarasi Parameter ID
$id = $_POST['id'];

//Update Status Antrian -> Selesai
$query = mysqli_query($conn, "UPDATE a_antrian SET status = 'selesai' WHERE id_poli = '$id' AND tgl_periksa = '$date' AND status = '-' AND keterangan = 'otomatis'");

//Hitung Ulang Antrian
$cekAntrian = mysqli_query($conn, "SELECT * FROM a_antrian WHERE tgl_periksa = '$date' AND id_poli = '$id' AND status = '-' AND keterangan = 'otomatis'");
$jumlahAntrian = mysqli_num_rows($cekAntrian);
echo "$jumlahAntrian";

?>
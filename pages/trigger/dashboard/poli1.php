<?php
include "../../../config.php";

$ambilPoli = mysqli_query($conn, "SELECT max(a_antrian.no_urut) as nomor_antrian, a_poliklinik.nm_poli 
                            FROM a_antrian 
                            LEFT JOIN a_poliklinik ON a_poliklinik.id_poli = a_antrian.id_poli 
                            WHERE
                            a_antrian.no_poli = 1 AND a_antrian.status = '-' AND a_antrian.keterangan = 'otomatis' AND a_antrian.tgl_periksa = '$date'");

$output = mysqli_fetch_assoc($ambilPoli);

if ($output['nomor_antrian'] == "") {
?>

<div class="h4 font-weight-bold text-gray-800 text-center mb-1">
    Belum Mulai
</div>
<hr>
<div class="h4 mb-0 font-weight-bold text-gray-800 text-center">-</div>

<?php
} else {
?>

<div class="h4 font-weight-bold text-gray-800 text-center mb-1">
    <?= $output['nm_poli']; ?>
</div>
<hr>
<div class="h4 mb-0 font-weight-bold text-gray-800 text-center">Antrian Sekarang : <?= $output['nomor_antrian']; ?></div>

<?php
}
?>

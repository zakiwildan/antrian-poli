<?php
include "../../../config.php";

$cekPoliAntrian = mysqli_query($conn, "SELECT a_antrian.keterangan FROM a_antrian WHERE a_antrian.status = '-' AND tgl_periksa = '$date' AND no_poli = 13 LIMIT 1");
$hasilCekPoli = mysqli_fetch_assoc($cekPoliAntrian);

if ($hasilCekPoli['keterangan'] == 'otomatis') {
    $ambilPoli = mysqli_query($conn, "SELECT max(a_antrian.no_urut) as nomor_antrian, a_poliklinik.nm_poli 
                    FROM a_antrian 
                    LEFT JOIN a_poliklinik ON a_poliklinik.id_poli = a_antrian.id_poli 
                    WHERE
                    a_antrian.no_poli = 13 AND a_antrian.status = '-' AND a_antrian.keterangan = 'otomatis' AND a_antrian.tgl_periksa = '$date'");
} else if ($hasilCekPoli['keterangan'] == 'manual') {
    $ambilPoli = mysqli_query($conn, "SELECT max(a_antrian.id) as no_id, a_antrian.no_urut as nomor_antrian, a_poliklinik.nm_poli 
    FROM a_antrian 
    LEFT JOIN a_poliklinik ON a_poliklinik.id_poli = a_antrian.id_poli 
    WHERE
    a_antrian.no_poli = 13 AND a_antrian.status = '-' AND a_antrian.keterangan = 'manual' AND a_antrian.tgl_periksa = '$date' GROUP BY a_antrian.id DESC LIMIT 1");
} else {
    $ambilPoli = mysqli_query($conn, "SELECT max(a_antrian.no_urut) as nomor_antrian, a_poliklinik.nm_poli 
                    FROM a_antrian 
                    LEFT JOIN a_poliklinik ON a_poliklinik.id_poli = a_antrian.id_poli 
                    WHERE
                    a_antrian.no_poli = 13 AND a_antrian.status = '-' AND a_antrian.tgl_periksa = '$date'");
}

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
        Sudah Mulai
    </div>
    <hr>
    <div class="h4 mb-0 font-weight-bold text-gray-800 text-center">Antrian Sekarang : <?= $output['nomor_antrian']; ?></div>

<?php
}
?>
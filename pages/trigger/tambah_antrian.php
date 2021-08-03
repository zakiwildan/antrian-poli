<?php

//Masukkan Koneksi
include "../../config.php";

//Deklarasi Parameter ID
$id = $_POST['id'];
$inputPoli = $_POST['inputPoli'];

//Cek Ruang Poli Apakah Dipakai Atau Tidak
$cekRuang = mysqli_query($conn, "SELECT * FROM a_antrian WHERE tgl_periksa = '$date' AND status = '-' AND keterangan = 'otomatis' AND no_poli = '$inputPoli' AND id_poli != '$id'");

//Cek Poli Sudah Dipakai Di Ruang lain atau Tidak
$cekPoli = mysqli_query($conn, "SELECT * FROM a_antrian WHERE tgl_periksa = '$date' AND status = '-' AND keterangan = 'otomatis' AND no_poli != '$inputPoli' AND id_poli = '$id'");

//Hasil Cek Ruang Poli Dipakai atau Tidak
$hasilAntrian = mysqli_num_rows($cekRuang);

//Hasil Cek Poli Sudah Ada atau Belim
$hasilPoli = mysqli_num_rows($cekPoli);

//Ambil Nama Poli
$cekNMPoli = mysqli_fetch_assoc($cekRuang);

if ($hasilAntrian >= 1) {
?>
    <!-- Alert -->
    <script type="text/javascript">
        alert('Ruangan Poli Sudah digunakan Poli Lain, Silahkan Cek Dashboard...');
    </script>
<?php
    //Tampilan Pesan Keluar
    echo "Kosong";
} else if ($hasilPoli >= 1) {

?>
    <!-- Alert -->
    <script type="text/javascript">
        alert('Poliklinik Sudah Dipakai Di Ruangan Poli Lain, Silahkan Cek Dashboard...');
    </script>
<?php
    //Tampilan Pesan Keluar
    echo "Kosong";

} else {

    $jumlahAntrian = 0;
    $cekAntrian = mysqli_query($conn, "SELECT * FROM a_antrian WHERE tgl_periksa = '$date' AND id_poli = '$id' AND status = '-' AND keterangan = 'otomatis' AND no_poli = '$inputPoli'");
    $jumlahAntrian = mysqli_num_rows($cekAntrian);

    $tambahAntrian = $jumlahAntrian + 1;
    $query = mysqli_query($conn, "INSERT INTO a_antrian (no_urut, tgl_periksa, id_poli, keterangan, status, no_poli) VALUES ('$tambahAntrian', '$date', '$id', 'otomatis', '-', '$inputPoli')");
    echo "$tambahAntrian";

    $nomor = (string)$tambahAntrian;
    $panjang = strlen($nomor);
    $antrian = $nomor;
    $adaantrian = 1;

?>
    <audio id="suarabel" src="../record/bell.wav"></audio>

    <audio id="suarabelnomorurut" src="../record/nomor-urut.wav"></audio>
    <audio id="suarabelsuarabelloket" src="../record/loket.wav"></audio>

    <audio id="belas" src="../record/belas.wav"></audio>
    <audio id="sebelas" src="../record/sebelas.wav"></audio>
    <audio id="puluh" src="../record/puluh.wav"></audio>
    <audio id="sepuluh" src="../record/sepuluh.wav"></audio>
    <audio id="ratus" src="../record/ratus.wav"></audio>
    <audio id="seratus" src="../record/seratus.wav"></audio>

    <!-- Suara Bel Poli -->
    <audio id="suarabelpoliumum" src="../record/poli/umum.wav"></audio>
    <audio id="suarabelpolikia" src="../record/poli/kia.wav"></audio>
    <audio id="suarabelpoligeriatri" src="../record/poli/geriatri.wav"></audio>
    <audio id="suarabelpoligigi" src="../record/poli/gigi.wav"></audio>
    <audio id="suarabelpolifisioterapi" src="../record/poli/fisioterapi.wav"></audio>
    <audio id="suarabelpolirehabmedik" src="../record/poli/rehabmedik.wav"></audio>
    <audio id="suarabelpolispanak" src="../record/poli/spanak.wav"></audio>
    <audio id="suarabelpolispanastesi" src="../record/poli/spanastesi.wav"></audio>
    <audio id="suarabelpolispbu" src="../record/poli/spbu.wav"></audio>
    <audio id="suarabelpolispgigi" src="../record/poli/spgigi.wav"></audio>
    <audio id="suarabelpolispgigibu" src="../record/poli/spgigibu.wav"></audio>
    <audio id="suarabelpolispjantung" src="../record/poli/spjantung.wav"></audio>
    <audio id="suarabelpolispkandungan" src="../record/poli/spkandungan.wav"></audio>
    <audio id="suarabelpolispkk" src="../record/poli/spkk.wav"></audio>
    <audio id="suarabelpolispmata" src="../record/poli/spmata.wav"></audio>
    <audio id="suarabelpolisportho" src="../record/poli/sportho.wav"></audio>
    <audio id="suarabelpolispparu" src="../record/poli/spparu.wav"></audio>
    <audio id="suarabelpolisppd" src="../record/poli/sppd.wav"></audio>
    <audio id="suarabelpolispsyaraf" src="../record/poli/spsyaraf.wav"></audio>
    <audio id="suarabelpolisptht" src="../record/poli/sptht.wav"></audio>
    <audio id="suarabelpolispuro" src="../record/poli/spuro.wav"></audio>

    <?php for ($i = 0; $i < $panjang; $i++) { ?>
        <audio id="suarabel<?php echo $i; ?>" src="../record/<?php echo substr($antrian, $i, 1); ?>.wav"></audio>
    <?php } ?>

    <script type="text/javascript">
        function mulai() {
            //MAINKAN SUARA BEL PADA SAAT AWAL
            document.getElementById('suarabel').pause();
            document.getElementById('suarabel').currentTime = 0;
            document.getElementById('suarabel').play();

            //SET DELAY UNTUK MEMAINKAN REKAMAN NOMOR URUT

            //totalwaktu=document.getElementById('suarabel').duration*1000;
            totalwaktu = 3 * 1000;

            //MAINKAN SUARA NOMOR URUT
            setTimeout(function() {
                document.getElementById('suarabelnomorurut').pause();
                document.getElementById('suarabelnomorurut').currentTime = 0;
                document.getElementById('suarabelnomorurut').play();
            }, totalwaktu);
            totalwaktu = totalwaktu + 2000;

            <?php
            //JIKA KURANG DARI 10 MAKA MAIKAN SUARA ANGKA1
            if ($antrian < 10) {
            ?>

                setTimeout(function() {
                    document.getElementById('suarabel0').pause();
                    document.getElementById('suarabel0').currentTime = 0;
                    document.getElementById('suarabel0').play();
                }, totalwaktu);

                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian == 10) {
                //JIKA 10 MAKA MAIKAN SUARA SEPULUH
            ?>
                setTimeout(function() {
                    document.getElementById('sepuluh').pause();
                    document.getElementById('sepuluh').currentTime = 0;
                    document.getElementById('sepuluh').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian == 11) {
                //JIKA 11 MAKA MAIKAN SUARA SEBELAS
            ?>
                setTimeout(function() {
                    document.getElementById('sebelas').pause();
                    document.getElementById('sebelas').currentTime = 0;
                    document.getElementById('sebelas').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian < 20) {
                //JIKA 12-20 MAKA MAIKAN SUARA ANGKA2+"BELAS"
            ?>
                setTimeout(function() {
                    document.getElementById('suarabel1').pause();
                    document.getElementById('suarabel1').currentTime = 0;
                    document.getElementById('suarabel1').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('belas').pause();
                    document.getElementById('belas').currentTime = 0;
                    document.getElementById('belas').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian < 100) {
                //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
            ?>
                setTimeout(function() {
                    document.getElementById('suarabel0').pause();
                    document.getElementById('suarabel0').currentTime = 0;
                    document.getElementById('suarabel0').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('puluh').pause();
                    document.getElementById('puluh').currentTime = 0;
                    document.getElementById('puluh').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('suarabel1').pause();
                    document.getElementById('suarabel1').currentTime = 0;
                    document.getElementById('suarabel1').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian == 100) {
                //JIKA 100 MAKA MAIKAN SUARA SEratus
            ?>
                setTimeout(function() {
                    document.getElementById('seratus').pause();
                    document.getElementById('seratus').currentTime = 0;
                    document.getElementById('seratus').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian < 110) {
                //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
            ?>
                setTimeout(function() {
                    document.getElementById('seratus').pause();
                    document.getElementById('seratus').currentTime = 0;
                    document.getElementById('seratus').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('suarabel2').pause();
                    document.getElementById('suarabel2').currentTime = 0;
                    document.getElementById('suarabel2').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian == 110) {
                //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
            ?>
                setTimeout(function() {
                    document.getElementById('seratus').pause();
                    document.getElementById('seratus').currentTime = 0;
                    document.getElementById('seratus').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('sepuluh').pause();
                    document.getElementById('sepuluh').currentTime = 0;
                    document.getElementById('sepuluh').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
                //JIKA KURANG DARI 10 MAKA MAIKAN SUARA ANGKA1
            } elseif ($antrian == 111) {
            ?>
                setTimeout(function() {
                    document.getElementById('seratus').pause();
                    document.getElementById('seratus').currentTime = 0;
                    document.getElementById('seratus').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('sebelas').pause();
                    document.getElementById('sebelas').currentTime = 0;
                    document.getElementById('sebelas').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian < 120) {
                //JIKA 12-20 MAKA MAIKAN SUARA ANGKA2+"BELAS"
            ?>
                setTimeout(function() {
                    document.getElementById('seratus').pause();
                    document.getElementById('seratus').currentTime = 0;
                    document.getElementById('seratus').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('suarabel2').pause();
                    document.getElementById('suarabel2').currentTime = 0;
                    document.getElementById('suarabel2').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('belas').pause();
                    document.getElementById('belas').currentTime = 0;
                    document.getElementById('belas').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian < 200) {
                //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
            ?>
                setTimeout(function() {
                    document.getElementById('seratus').pause();
                    document.getElementById('seratus').currentTime = 0;
                    document.getElementById('seratus').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('suarabel1').pause();
                    document.getElementById('suarabel1').currentTime = 0;
                    document.getElementById('suarabel1').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('puluh').pause();
                    document.getElementById('puluh').currentTime = 0;
                    document.getElementById('puluh').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('suarabel2').pause();
                    document.getElementById('suarabel2').currentTime = 0;
                    document.getElementById('suarabel2').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian == 200) {
                //JIKA 100 MAKA MAIKAN SUARA SEratus
            ?>
                setTimeout(function() {
                    document.getElementById('suarabel0').pause();
                    document.getElementById('suarabel0').currentTime = 0;
                    document.getElementById('suarabel0').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('ratus').pause();
                    document.getElementById('ratus').currentTime = 0;
                    document.getElementById('ratus').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian < 210) {
                //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
            ?>
                setTimeout(function() {
                    document.getElementById('suarabel0').pause();
                    document.getElementById('suarabel0').currentTime = 0;
                    document.getElementById('suarabel0').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('ratus').pause();
                    document.getElementById('ratus').currentTime = 0;
                    document.getElementById('ratus').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('suarabel2').pause();
                    document.getElementById('suarabel2').currentTime = 0;
                    document.getElementById('suarabel2').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian == 210) {
                //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
            ?>
                setTimeout(function() {
                    document.getElementById('suarabel0').pause();
                    document.getElementById('suarabel0').currentTime = 0;
                    document.getElementById('suarabel0').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('ratus').pause();
                    document.getElementById('ratus').currentTime = 0;
                    document.getElementById('ratus').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('sepuluh').pause();
                    document.getElementById('sepuluh').currentTime = 0;
                    document.getElementById('sepuluh').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
                //JIKA KURANG DARI 10 MAKA MAIKAN SUARA ANGKA1
            } elseif ($antrian == 211) {
            ?>
                setTimeout(function() {
                    document.getElementById('suarabel0').pause();
                    document.getElementById('suarabel0').currentTime = 0;
                    document.getElementById('suarabel0').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('ratus').pause();
                    document.getElementById('ratus').currentTime = 0;
                    document.getElementById('ratus').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('sebelas').pause();
                    document.getElementById('sebelas').currentTime = 0;
                    document.getElementById('sebelas').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian < 220) {
                //JIKA 12-20 MAKA MAIKAN SUARA ANGKA2+"BELAS"
            ?>
                setTimeout(function() {
                    document.getElementById('suarabel0').pause();
                    document.getElementById('suarabel0').currentTime = 0;
                    document.getElementById('suarabel0').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('ratus').pause();
                    document.getElementById('ratus').currentTime = 0;
                    document.getElementById('ratus').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('suarabel2').pause();
                    document.getElementById('suarabel2').currentTime = 0;
                    document.getElementById('suarabel2').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('belas').pause();
                    document.getElementById('belas').currentTime = 0;
                    document.getElementById('belas').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } elseif ($antrian < 1000) {
                //JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
            ?>
                setTimeout(function() {
                    document.getElementById('suarabel0').pause();
                    document.getElementById('suarabel0').currentTime = 0;
                    document.getElementById('suarabel0').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('ratus').pause();
                    document.getElementById('ratus').currentTime = 0;
                    document.getElementById('ratus').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('suarabel1').pause();
                    document.getElementById('suarabel1').currentTime = 0;
                    document.getElementById('suarabel1').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('puluh').pause();
                    document.getElementById('puluh').currentTime = 0;
                    document.getElementById('puluh').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
                setTimeout(function() {
                    document.getElementById('suarabel2').pause();
                    document.getElementById('suarabel2').currentTime = 0;
                    document.getElementById('suarabel2').play();
                }, totalwaktu);
                totalwaktu = totalwaktu + 1000;
            <?php
            } else {
                //JIKA LEBIH DARI 100
                //Karena aplikasi ini masih sederhana maka logina konversi hanya sampai 100
                //Selebihnya akan langsung disebutkan angkanya saja
                //tanpa kata "RATUS", "PULUH", maupun "BELAS"
            ?>

                <?php
                for ($i = 0; $i < $panjang; $i++) {
                ?>

                    totalwaktu = totalwaktu + 1000;
                    setTimeout(function() {
                        document.getElementById('suarabel<?php echo $i; ?>').pause();
                        document.getElementById('suarabel<?php echo $i; ?>').currentTime = 0;
                        document.getElementById('suarabel<?php echo $i; ?>').play();
                    }, totalwaktu);
            <?php
                }
            }
            ?>

            totalwaktu = totalwaktu + 1000;
            setTimeout(function() {
                document.getElementById('suarabelsuarabelloket').pause();
                document.getElementById('suarabelsuarabelloket').currentTime = 0;
                document.getElementById('suarabelsuarabelloket').play();
            }, totalwaktu);

            <?php
            if ($id == 'U001') {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpoliumum').pause();
                    document.getElementById('suarabelpoliumum').currentTime = 0;
                    document.getElementById('suarabelpoliumum').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U002") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolikia').pause();
                    document.getElementById('suarabelpolikia').currentTime = 0;
                    document.getElementById('suarabelpolikia').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U004") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpoligeriatri').pause();
                    document.getElementById('suarabelpoligeriatri').currentTime = 0;
                    document.getElementById('suarabelpoligeriatri').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U005") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpoligigi').pause();
                    document.getElementById('suarabelpoligigi').currentTime = 0;
                    document.getElementById('suarabelpoligigi').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U006") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolirehabmedik').pause();
                    document.getElementById('suarabelpolirehabmedik').currentTime = 0;
                    document.getElementById('suarabelpolirehabmedik').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U003") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolifisioterapi').pause();
                    document.getElementById('suarabelpolifisioterapi').currentTime = 0;
                    document.getElementById('suarabelpolifisioterapi').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U007") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolispanak').pause();
                    document.getElementById('suarabelpolispanak').currentTime = 0;
                    document.getElementById('suarabelpolispanak').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U008") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolispanastesi').pause();
                    document.getElementById('suarabelpolispanastesi').currentTime = 0;
                    document.getElementById('suarabelpolispanastesi').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U009") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolispbu').pause();
                    document.getElementById('suarabelpolispbu').currentTime = 0;
                    document.getElementById('suarabelpolispbu').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U010") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolispgigi').pause();
                    document.getElementById('suarabelpolispgigi').currentTime = 0;
                    document.getElementById('suarabelpolispgigi').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U011") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolispgigibu').pause();
                    document.getElementById('suarabelpolispgigibu').currentTime = 0;
                    document.getElementById('suarabelpolispgigibu').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U012") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolispjantung').pause();
                    document.getElementById('suarabelpolispjantung').currentTime = 0;
                    document.getElementById('suarabelpolispjantung').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U013") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolispkandungan').pause();
                    document.getElementById('suarabelpolispkandungan').currentTime = 0;
                    document.getElementById('suarabelpolispkandungan').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U014") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolispkk').pause();
                    document.getElementById('suarabelpolispkk').currentTime = 0;
                    document.getElementById('suarabelpolispkk').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U015") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolispmata').pause();
                    document.getElementById('suarabelpolispmata').currentTime = 0;
                    document.getElementById('suarabelpolispmata').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U016") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolisportho').pause();
                    document.getElementById('suarabelpolisportho').currentTime = 0;
                    document.getElementById('suarabelpolisportho').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U017") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolispparu').pause();
                    document.getElementById('suarabelpolispparu').currentTime = 0;
                    document.getElementById('suarabelpolispparu').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U018") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolisppd').pause();
                    document.getElementById('suarabelpolisppd').currentTime = 0;
                    document.getElementById('suarabelpolisppd').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U019") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolispsyaraf').pause();
                    document.getElementById('suarabelpolispsyaraf').currentTime = 0;
                    document.getElementById('suarabelpolispsyaraf').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U020") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolisptht').pause();
                    document.getElementById('suarabelpolisptht').currentTime = 0;
                    document.getElementById('suarabelpolisptht').play();
                }, totalwaktu);
            <?php
            } elseif ($id == "U021") {
            ?>
                totalwaktu = totalwaktu + 2700;
                setTimeout(function() {
                    document.getElementById('suarabelpolispuro').pause();
                    document.getElementById('suarabelpolispuro').currentTime = 0;
                    document.getElementById('suarabelpolispuro').play();
                }, totalwaktu);
            <?php
            }
            ?>

        }
    </script>


    <?php
    if ($adaantrian > 0) {
    ?>
        <script type="text/javascript">
            mulai()
        </script>
<?php
    }
    return;
}
?>
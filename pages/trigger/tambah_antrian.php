<?php

//Masukkan Koneksi
include "../../config.php";

//Deklarasi Parameter ID
$id = $_POST['id'];

$jumlahAntrian = 0;
$cekAntrian = mysqli_query($conn, "SELECT * FROM a_antrian WHERE tgl_periksa = '$date' AND nm_poli = '$id' AND status != 'selesai'");
$jumlahAntrian = mysqli_num_rows($cekAntrian);

$tambahAntrian = $jumlahAntrian + 1;
$query = mysqli_query($conn, "INSERT INTO a_antrian (no_urut, tgl_periksa, nm_poli) VALUES ('$tambahAntrian', '$date', '$id')");
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
        if ($id == 'Poli Umum') {
        ?>
            totalwaktu = totalwaktu + 2700;
            setTimeout(function() {
                document.getElementById('suarabelpoliumum').pause();
                document.getElementById('suarabelpoliumum').currentTime = 0;
                document.getElementById('suarabelpoliumum').play();
            }, totalwaktu);
        <?php
        } elseif ($id == "Poli KIA") {
        ?>
            totalwaktu = totalwaktu + 2700;
            setTimeout(function() {
                document.getElementById('suarabelpolikia').pause();
                document.getElementById('suarabelpolikia').currentTime = 0;
                document.getElementById('suarabelpolikia').play();
            }, totalwaktu);
        <?php
        } elseif ($id == "Poli Geriatri") {
        ?>
            totalwaktu = totalwaktu + 2700;
            setTimeout(function() {
                document.getElementById('suarabelpoligeriatri').pause();
                document.getElementById('suarabelpoligeriatri').currentTime = 0;
                document.getElementById('suarabelpoligeriatri').play();
            }, totalwaktu);
        <?php
        } elseif ($id == "Poli Gigi") {
        ?>
            totalwaktu = totalwaktu + 2700;
            setTimeout(function() {
                document.getElementById('suarabelpoligigi').pause();
                document.getElementById('suarabelpoligigi').currentTime = 0;
                document.getElementById('suarabelpoligigi').play();
            }, totalwaktu);
        <?php
        } elseif ($id == "Poli Rehabilitasi Medik") {
        ?>
            totalwaktu = totalwaktu + 2700;
            setTimeout(function() {
                document.getElementById('suarabelpolirehabmedik').pause();
                document.getElementById('suarabelpolirehabmedik').currentTime = 0;
                document.getElementById('suarabelpolirehabmedik').play();
            }, totalwaktu);
        <?php
        } elseif ($id == "Poli Fisioterapi") {
        ?>
            totalwaktu = totalwaktu + 2700;
            setTimeout(function() {
                document.getElementById('suarabelpolifisioterapi').pause();
                document.getElementById('suarabelpolifisioterapi').currentTime = 0;
                document.getElementById('suarabelpolifisioterapi').play();
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
?>
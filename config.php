<?php
if (preg_match ('/config.php/', basename($_SERVER['PHP_SELF']))) die ('Sssssttttt...!!!, Hayoo mau ngapain?? :v');

define ("DB_HOST","localhost");
define ("DB_USER","root");
define ("DB_PASS","");
define ("DB_NAME","antrian_poli");

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if($conn === false){
    die ("Error Connection, " . mysqli_connect_error());
}

// Get date and time
date_default_timezone_set('Asia/Jakarta');
$month      = date('Y-m');
$date       = date('Y-m-d');
$time       = date('H:i:s');
$date_time  = date('Y-m-d H:i:s');
?>
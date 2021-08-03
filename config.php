<?php
if (preg_match ('/config.php/', basename($_SERVER['PHP_SELF']))) die ('Sssssttttt...!!!, Hayoo mau ngapain?? :v');

define ("DB_HOST","192.168.1.104");
define ("DB_USER","server");
define ("DB_PASS","ma3stro@rsmg");
define ("DB_NAME","antrian_poli");

define ("DB_HOST2","192.168.1.104");
define ("DB_USER2","server");
define ("DB_PASS2","ma3stro@rsmg");
define ("DB_NAME2","sik_rsmg");

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$conn2 = mysqli_connect(DB_HOST2,DB_USER2,DB_PASS2,DB_NAME2);

if($conn === false){
    die ("Error Connection, " . mysqli_connect_error());
}

if($conn2 === false){
    die ("Error Connection, " . mysqli_connect_error());
}

// Get date and time
date_default_timezone_set('Asia/Jakarta');
$month      = date('Y-m');
$date       = date('Y-m-d');
$time       = date('H:i:s');
$date_time  = date('Y-m-d H:i:s');
?>
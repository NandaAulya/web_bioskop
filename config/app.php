<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'cinemax');

include_once('connection.php');
$koneksi = new Connection();
$db = $koneksi->getMysqliConnection()
?>
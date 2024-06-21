<?php
include_once 'DataBase.php';

$db = Database::getInstance();

function getTheaters() {
    global $db;
    return $db->query("SELECT * FROM bioskop");
}

function gettheaterByName($name) {
    global $db;
    return $db->query("SELECT * FROM bioskop WHERE nama_Bioskop = ?", [$name]);
}

function getTheatersByKota($kota) {
    $kota_lower = strtolower($kota);
    global $db;
    return $db->query("SELECT * FROM bioskop WHERE kota = ?", [$kota_lower]);
}

function getKota() {
    global $db;
    return $db->query("SELECT kota FROM bioskop GROUP BY kota");
}

?>

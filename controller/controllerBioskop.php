<?php
include 'Database.php';

$db = new Database();

function getTheaters() {
    global $db;
    return $db->query("SELECT * FROM bioskop");
}

function gettheaterByName($name) {
    global $db;
    return $db->query("SELECT * FROM bioskop WHERE nama_Bioskop = ?", [$name]);
}



?>
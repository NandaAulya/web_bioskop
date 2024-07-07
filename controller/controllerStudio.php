<?php
include_once 'Database.php';

$db = Database::getInstance();

// =======CREATE=======
function addStudio($kode_studio, $id_bioskop) {
    global $db;
    $query = "INSERT INTO studio (kode_studio, id_bioskop) VALUES (?, ?)";
    return $db->query($query, [$kode_studio, $id_bioskop]);
}

// =======READ=======
function viewAllStudio($id_bioskop) {
    global $db;
    return $db->query("SELECT * FROM studio WHERE id_bioskop = ?", [$id_bioskop]);
}

function searchStudio($query) {
    global $db;
    return $db->query("SELECT * FROM studio WHERE kode_studio LIKE ?", ["%$query%"]);
}

// =======UPDATE=======
function updateStudio($id, $kode_studio) {
    global $db;
    $query = "UPDATE studio SET kode_studio = ? WHERE id_studio = ?";
    return $db->query($query, [$kode_studio, $id]);
}

// =======DELETE=======
function deleteStudio($id) {
    global $db;
    return $db->query("DELETE FROM studio WHERE id_studio = ?", [$id]);
}

?>
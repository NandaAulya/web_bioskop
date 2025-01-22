<?php
include_once 'DataBase.php';

$db = Database::getInstance();


function handlePosterUpload($poster) {
    $target_file = "assets/images/cinema/" . basename($poster["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($poster["tmp_name"]);
    if ($check === false) {
        return "File bukan gambar";
    }

    if ($poster["size"] > 500000) {
        return "File terlalu besar";
    }

    $allowed_types = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_types)) {
        return "File yang diizinkan hanya JPG, JPEG, PNG & GIF";
    }

    if (!move_uploaded_file($poster["tmp_name"], $target_file)) {
        return "Upload gagal";
    }

    return $target_file;
}

// =======CREATE=======
function createTheater($nama_bioskop, $alamat, $no_telpon, $poster, $kota) {
    global $db;

    $posterlink = handlePosterUpload($poster);
    if (strpos($posterlink, "Sorry") !== false) {
        return $posterlink;
    }

    $slug_bioskop = strtolower(str_replace(' ', '-', $nama_bioskop));
    $query = "INSERT INTO bioskop (nama_bioskop, slug_bioskop, alamat, no_telpon, poster, kota) VALUES (?, ?, ?, ?, ?, ?)";
    $result = $db->query($query, [$nama_bioskop, $slug_bioskop, $alamat, $no_telpon, $posterlink, $kota]);
    
    if ($result) {
        return true;
    } else {
        return "Error: Gagal membuat Theater.";
    }
}

// =======READ=======
function viewAllTheater() {
    global $db;
    return $db->query("SELECT * FROM bioskop");
}
function searchTheater($query) {
    global $db;
    return $db->query("SELECT * FROM bioskop WHERE nama_bioskop LIKE ?", ["%$query%"]);
}

function viewAllTheaterByKota($kota) {
    $kota_lower = strtolower($kota);
    global $db;
    return $db->query("SELECT * FROM bioskop WHERE kota = ?", [$kota_lower]);
}

function getTheaterById($id) {
    global $db;
    return $db->query("SELECT * FROM bioskop WHERE id_bioskop = ?", [$id]);
}

function getKota() {
    global $db;
    return $db->query("SELECT kota FROM bioskop GROUP BY kota");
}

// =======UPDATE=======

function updateTheater($id_bioskop, $nama_bioskop, $alamat, $no_telpon, $poster, $kota) {
    global $db;

    if (!empty($poster['name'])) {
        $posterlink = handlePosterUpload($poster);
        if (strpos($posterlink, "Sorry") !== false) {
            return $posterlink;
        }

        $theater = $db->query("SELECT * FROM bioskop WHERE id_bioskop = ?", [$id_bioskop])->fetch_assoc();
        if ($theater && file_exists("../" . $theater['poster'])) {
            unlink("../" . $theater['poster']);
        }

        $query = "UPDATE bioskop SET nama_bioskop = ?, alamat = ?, no_telpon = ?, poster = ?, kota = ? WHERE id_bioskop = ?";
        $result = $db->query($query, [$nama_bioskop, $alamat, $no_telpon, $posterlink, $kota, $id_bioskop]);
    } else {
        $query = "UPDATE bioskop SET nama_bioskop = ?, alamat = ?, no_telpon = ?, kota = ? WHERE id_bioskop = ?";
        $result = $db->query($query, [$nama_bioskop, $alamat, $no_telpon, $kota, $id_bioskop]);
    }

    if ($result) {
        return true;
    } else {
        return "Error: Gagal melakukan update theater.";
    }
}

// =======DELETE=======
function deleteTheater($id_bioskop) {
    global $db;

    $theater = getTheaterById($id_bioskop)->fetch_assoc();
    if (!$theater) {
        return "Theater tidak ditemukan.";
    }

    if (file_exists("../" . $theater['poster'])) {
        unlink("../" . $theater['poster']);
    }

    $result = $db->query("DELETE FROM bioskop WHERE id_bioskop = ?", [$id_bioskop]);
    return $result ? true : "Error: Gagal menghapus theater.";
}
?>
<?php
include_once 'Database.php';

$db = Database::getInstance();

function handleImageUpload($image, $selector) {
    $folder = $selector == 1 ? "poster" : "banner";
    $target_file = "assets/images/$folder/" . basename($image["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        return "File bukan gambar";
    }

    if ($image["size"] > 500000) {
        return "File terlalu besar";
    }

    $allowed_types = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_types)) {
        return "File yang diizinkan hanya JPG, JPEG, PNG & GIF";
    }

    if (!move_uploaded_file($image["tmp_name"], $target_file)) {
        return "Upload gagal";
    }

    return $target_file;
}

// =======CREATE=======
function createFilm($nama_film, $deskripsi, $tahun_terbit, $sutradara, $poster, $banner, $id_genre, $aktor,  $status_tayang) {
    global $db;

    $posterlink = handleImageUpload($poster, 1);
    if (strpos($posterlink, "Sorry") !== false) {
        return $posterlink;
    }
    
    $bannerlink = handleImageUpload($banner, 2);
    if (strpos($bannerlink, "Sorry") !== false) {
        return $bannerlink;
    }

    $slug = strtolower(str_replace(' ', '-', $nama_film));
    $query = "INSERT INTO FILM (nama_film, slug, deskripsi, tahun_terbit, sutradara, poster, banner, id_genre, aktor, status_tayang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $result = $db->query($query, [$nama_film, $slug, $deskripsi, $tahun_terbit, $sutradara, $posterlink, $bannerlink, $id_genre, $aktor,  $status_tayang]);
    
    if ($result) {
        return true;
    } else {
        return "Error: Gagal membuat Film.";
    }
}

// =======READ=======
function viewAllFilm() {
    global $db;
    return $db->query("SELECT * FROM film");
}

function searchFilm($query) {
    global $db;
    return $db->query("SELECT * FROM film WHERE nama_film LIKE ?", ["%$query%"]);
}

function getFilm($id) {
    global $db;
    return $db->query("SELECT * FROM film WHERE id = ?", [$id]);
}

function getFilms() {
    global $db;
    return $db->query("SELECT * FROM film JOIN genre ON film.id_genre = genre.id_genre WHERE film.status_tayang = 1");
}

function getUpcomingFilms() {
    global $db;
    return $db->query("SELECT * FROM film JOIN genre ON film.id_genre = genre.id_genre WHERE NOT status_tayang = 1  ");
}

function getFilmBySlug($slug) {
    global $db;
    return $db->query("SELECT * FROM film WHERE slug = ?", [$slug]);
}

// =======UPDATE=======
function updateFilm($id, $nama_film, $deskripsi, $tahun_terbit, $sutradara, $poster, $banner, $id_genre, $aktor,  $status_tayang) {
    global $db;
    $query = "UPDATE film SET nama_film = ?, deskripsi = ?, tahun_terbit = ?, sutradara = ?, id_genre = ?, aktor = ?, status_tayang = ?";
    $params = [$nama_film, $deskripsi, $tahun_terbit, $sutradara, $id_genre, $aktor, $status_tayang];

    if (!empty($poster['name'])) {
        $posterlink = handleImageUpload($poster, 1);
        if (strpos($posterlink, "Sorry") !== false) return $posterlink;

        $film = $db->query("SELECT * FROM film WHERE id_film = ?", [$id])->fetch_assoc();
        if ($film && file_exists($film['poster'])) unlink($film['poster']);

        $query .= ", poster = ?";
        $params[] = $posterlink;
    }

    if (!empty($banner['name'])) {
        $bannerlink = handleImageUpload($banner, 2);
        if (strpos($bannerlink, "Sorry") !== false) return $bannerlink;

        $film = $db->query("SELECT * FROM film WHERE id_film = ?", [$id])->fetch_assoc();
        if ($film && file_exists($film['banner'])) unlink($film['banner']);

        $query .= ", banner = ?";
        $params[] = $bannerlink;
    }

    $query .= " WHERE id_film = ?";
    $params[] = $id;

    $result = $db->query($query, $params);
    return $result ? true : "Error: Gagal melakukan update Film.";
}

// =======DELETE=======
function deleteFilm($id) {
    global $db;
    $film = getFilm($id)->fetch_assoc();
    if (!$film) {
        return "Film tidak ditemukan.";
    }

    if (file_exists($film['poster'])) {
        unlink($film['poster']);
    }
    
    if (file_exists($film['banner'])) {
        unlink($film['banner']);
    }
    $result = $db->query("DELETE FROM film WHERE id_film = ?", [$id]);
    return $result ? true : "Error: Gagal menghapus theater.";
}

// function getFilmByKota($kota) {
//     global $db;
//     return $db->query("SELECT * FROM film JOIN bioskop ON film.id = genre.id_genre WHERE NOT status_tayang = 1 ", [$kota]);
// }
?>
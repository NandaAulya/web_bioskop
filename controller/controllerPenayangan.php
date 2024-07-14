<?php
include_once 'Database.php';

$db = Database::getInstance();

function getBioskop(){
    global $db;
    return $db->query("SELECT * FROM bioskop JOIN ON film.id_genre = genre.id_genre WHERE NOT status_tayang = 1  ");
}

function getAllPenayangan() {
    global $db;
    return $db->query("SELECT penayangan.*, film.nama_film, studio.kode_studio, bioskop.nama_bioskop 
                       FROM penayangan 
                       JOIN film ON penayangan.id_film = film.id_film 
                       JOIN studio ON penayangan.id_studio = studio.id_studio 
                       JOIN bioskop ON studio.id_bioskop = bioskop.id_bioskop");
}

function getPenayanganFilm($slug) {
    global $db;
    $film = getFilmBySlug($slug)->fetch_assoc();

    return $db->query("SELECT penayangan.*, film.nama_film, studio.kode_studio, bioskop.nama_bioskop 
                       FROM penayangan 
                       JOIN film ON penayangan.id_film = film.id_film 
                       JOIN studio ON penayangan.id_studio = studio.id_studio 
                       JOIN bioskop ON studio.id_bioskop = bioskop.id_bioskop
                       WHERE penayangan.id_film = ?", [$film['id_film']]);
}

function getPenayanganByFilm($id_film) {
    global $db;
    return $db->query("SELECT penayangan.*, film.nama_film, studio.kode_studio, bioskop.nama_bioskop 
                       FROM penayangan 
                       JOIN film ON penayangan.id_film = film.id_film 
                       JOIN studio ON penayangan.id_studio = studio.id_studio 
                       JOIN bioskop ON studio.id_bioskop = bioskop.id_bioskop
                       WHERE penayangan.id_film = ?", [$id_film]);
}

function getPenayanganByStudio($id_studio) {
    global $db;
    return $db->query("SELECT penayangan.*, film.nama_film, studio.kode_studio, bioskop.nama_bioskop 
                       FROM penayangan 
                       JOIN film ON penayangan.id_film = film.id_film 
                       JOIN studio ON penayangan.id_studio = studio.id_studio 
                       JOIN bioskop ON studio.id_bioskop = bioskop.id_bioskop
                       WHERE penayangan.id_studio = ?", [$id_studio]);
}

function addPenayangan($harga, $tanggal, $id_film, $id_studio, $status_penayangan, $jam) {
    global $db;
    return $db->query("INSERT INTO penayangan (harga, tanggal, id_film, id_studio, status_penayangan, jam) VALUES (?, ?, ?, ?, ?, ?)", 
                      [$harga, $tanggal, $id_film, $id_studio, $status_penayangan, $jam]);
}

function updatePenayangan($id_penayangan, $harga, $tanggal, $id_film, $id_studio, $status_penayangan, $jam) {
    global $db;
    return $db->query("UPDATE penayangan SET harga = ?, tanggal = ?, id_film = ?, id_studio = ?, status_penayangan = ?, jam = ? WHERE id_penayangan = ?", 
                      [$harga, $tanggal, $id_film, $id_studio, $status_penayangan, $jam, $id_penayangan]);
}

function deletePenayangan($id_penayangan) {
    global $db;
    return $db->query("DELETE FROM penayangan WHERE id_penayangan = ?", [$id_penayangan]);
}

// function getKursiStatus($id_penayangan, $id_studio){
//     global $db;
//     return $db->query("SELECT k.nomor_kursi,
//                CASE
//                    WHEN p.id_pemesanan IS NOT NULL THEN 'Terpesan'
//                    ELSE 'Tersedia'
//                END AS status
//         FROM Kursi k
//         LEFT JOIN Pemesanan p ON k.id_kursi = p.id_kursi AND p.id_penayangan = '$id_penayangan'
//         WHERE k.id_studio = '$id_studio'
//         ORDER BY k.nomor_kursi;");
// }



// function getFilmByKota($kota) {
//     global $db;
//     return $db->query("SELECT * FROM film JOIN bioskop ON film.id = genre.id_genre WHERE NOT status_tayang = 1  "", [$kota]);
// }
?>
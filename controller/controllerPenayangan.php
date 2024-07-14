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

function viewAllPenayangan(){
    global $db;
    return $db->query("SELECT penayangan.*, film.nama_film, studio.kode_studio, bioskop.nama_bioskop FROM penayangan
    JOIN studio ON studio.id_studio = penayangan.id_studio
    JOIN bioskop ON studio.id_bioskop = bioskop.id_bioskop
    JOIN film ON film.id_film = penayangan.id_film");
}

function addPenayangan($harga, $tanggal, $id_film, $id_studio, $status_penayangan, $jam) {
    global $db;
    $result = $db->query("INSERT INTO penayangan (harga, tanggal, id_film, id_studio, status_penayangan, jam) VALUES (?, ?, ?, ?, ?, ?)", 
                      [$harga, $tanggal, $id_film, $id_studio, $status_penayangan, $jam]);
    
    if ($result) {
        $idResult = $db->query("SELECT id_penayangan FROM penayangan ORDER BY id_penayangan DESC LIMIT 1");
        if ($idResult) {
                $id_penayangan = $idResult->fetch_assoc()['id_penayangan'];
                // Generate seats for the new screening
                generateSeat($id_penayangan);
                return true;
        } else {
            return "Error: Gagal mendapatkan ID penayangan.";
        }
    } else {
        return "Error: Gagal menambahkan penayangan.";
    }
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

function generateSeat($id_penayangan) {
    global $db;

    $huruf = range('A', 'J');
    $angka = range(1, 20);
    $seatCount = 0;

    foreach ($huruf as $h) {
        foreach ($angka as $a) {
            $kode_kursi = $h . $a;
            $result = $db->query("INSERT INTO pemesanan (id_penayangan, kode_kursi) VALUES (?, ?)", [$id_penayangan, $kode_kursi]);
            if ($result) {
                $seatCount++;
            }
        }
    }
    return $seatCount; //return jumlah kursi yang berhasil ditambahkan
}

function deleteSeat($id_penayangan){
    global $db;
    return $db->query("DELETE FROM pemesanan WHERE id_penayangan = ?", [$id_penayangan]);
}

function getAllSeats($id_penayangan) {
    global $db;
    return $db->query("SELECT * FROM pemesanan WHERE id_penayangan = ?", 
    [$id_penayangan]);
}

function sellSeat($id_seat, $id_user){
    global $db;
    return $db->query("UPDATE pemesanan SET id_user = ?, ketersediaan = 'terjual', WHERE id_pemesanan = ?",
    [$id_user, $id_seat]);
}






?>
<?php
include_once 'Database.php';

$db = Database::getInstance();

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

//ubah jadi like biar bisa dicari di any place
function getFilmBySlug($slug) {
    global $db;
    return $db->query("SELECT * FROM film WHERE slug = ?", [$slug]);
}

// function getFilmByKota($kota) {
//     global $db;
//     return $db->query("SELECT * FROM film JOIN bioskop ON film.id = genre.id_genre WHERE NOT status_tayang = 1 ", [$kota]);
// }
?>
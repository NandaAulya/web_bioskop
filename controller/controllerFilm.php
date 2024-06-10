<?php
include 'Database.php';

$db = new Database();

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
    return $db->query("SELECT * FROM film JOIN genre ON film.id_genre = genre.id_genre WHERE NOT status_tayang = 1");
}

// TODO: ubah jadi like biar bisa dicari di any place
function getFilmByTitle($title) {
    global $db;
    return $db->query("SELECT * FROM film WHERE nama_film = ?", [$title]);
}



?>
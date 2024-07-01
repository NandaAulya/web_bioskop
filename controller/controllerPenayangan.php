<?php
include_once 'Database.php';

$db = Database::getInstance();

function getBioskop(){
    global $db;
    return $db->query("SELECT * FROM bioskop JOIN  ON film.id_genre = genre.id_genre WHERE NOT status_tayang = 1  ");
}

function getPenayangan($slug){
    global $db;
    return $db->query("SELECT film.nama_film, penayangan.*, bioskop.nama_bioskop, studio.kode_studio 
                        FROM penayangan JOIN studio ON penayangan.id_studio = studio.id_studio 
                        JOIN bioskop ON studio.id_bioskop = bioskop.id_bioskop 
                        JOIN film ON penayangan.id_film = film.id_film 
                        WHERE film.slug = '$slug' 
                        order by bioskop.nama_bioskop, studio.kode_studio, penayangan.jam;");
}
// function getFilmByKota($kota) {
//     global $db;
//     return $db->query("SELECT * FROM film JOIN bioskop ON film.id = genre.id_genre WHERE NOT status_tayang = 1  "", [$kota]);
// }
?>
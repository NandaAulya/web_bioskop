<?php
require 'koneksi.php';

// Ambil ID film dari parameter GET
$id_film = $_GET['id'];

// Query basis data untuk mendapatkan informasi film berdasarkan ID
$query = "SELECT * FROM film INNER JOIN genre ON film.id_genre = genre.id_genre WHERE film.id_film = $id_film";
$result = mysqli_query($koneksi, $query);

// Periksa apakah film ditemukan
if (mysqli_num_rows($result) > 0) {
    $movie = mysqli_fetch_assoc($result);
    // Tampilkan informasi film
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $movie['nama_film']; ?> - Detail Film</title>
        <!-- Tambahkan CSS atau file lainnya yang diperlukan -->
    </head>
    <body>
        <h1><?php echo $movie['nama_film']; ?></h1>
        <p>Genre: <?php echo $movie['nama']; ?></p>
        <p>Tahun Terbit: <?php echo $movie['tahun_terbit']; ?></p>
        <!-- Tampilkan informasi lainnya sesuai kebutuhan -->
    </body>
    </html>
    <?php
} else {
    // Jika film tidak ditemukan, tampilkan pesan kesalahan atau redirect ke halaman lain
    echo "Film tidak ditemukan.";
}
?>

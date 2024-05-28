<?php
require 'koneksi.php';
$genre = mysqli_query($koneksi, "SELECT * FROM genre ORDER BY nama ASC");
$film = mysqli_query($koneksi, "SELECT * FROM film INNER JOIN genre ON film.id_genre = genre.id_genre ORDER BY tahun_terbit DESC");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = 'Theater' ?>
    <?php include 'include/meta.php' ?>
</head>

<body>
    <?php include 'include/navbar.php' ?>
    <div class="px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 place-content-start p-10 capitalize">
    <?php while ($movie = mysqli_fetch_assoc($film)) : ?>
            <div class="relative w-[200px] flex flex-col bg-white rounded-lg shadow-md aspect-w-3 aspect-h-4 overflow-hidden">
                <a href="movie_detail.php?id=<?php echo $movie['id_film']; ?>" class="relative block">
                    <div class="h-full overflow-hidden">
                        <img src="assets/img/poster/<?php echo $movie['poster']; ?>.jpg" alt="<?php echo $movie['nama_film']; ?>" loading="lazy" class="object-cover w-full h-full">
                    </div>
                    <div class="px-4 absolute inset-0 flex flex-col justify-center items-center bg-gradient-to-t from-black via-black to-transparent opacity-0 transition duration-500 ease-in-out hover:opacity-100 z-10">
                        <p class="text-white font-bold text-xl mb-2 line-clamp-2 text-center"><?php echo $movie['nama_film']; ?></p>
                        <p class="text-sm text-gray-300 mb-2"><?php echo $movie['nama']; ?></p>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>
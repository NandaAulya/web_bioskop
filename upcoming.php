<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = "Upcoming" ?>
    <?php include "config/config.php" ?>
    <?php
    include "controller/controllerFilm.php";
    $film = getUpcomingFilms();
    ?>
</head>

<body style="background-color: #060614">
    <?php include "includes/navbar.php" ?>
    <!-- Card -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-10 place-content-start p-20 capitalize">
        <?php foreach ($film as $row) : ?>
            <div class="relative w-[200px] flex flex-col bg-white rounded-lg shadow-md aspect-w-3 aspect-h-4 overflow-hidden">
                <div class="h-full overflow-hidden">
                    <img src="<?php echo $row['poster']; ?>" alt="<?php echo $row['nama_film']; ?>" loading="lazy" class="object-cover w-full h-full">
                </div>
                <div class="px-4 absolute inset-0 flex flex-col justify-center items-center bg-gradient-to-t from-black via-black to-transparent opacity-0 transition duration-500 ease-in-out hover:opacity-100 z-10">
                    <p class="text-white font-bold text-xl mb-2 line-clamp-2 text-center"><?php echo $row['nama_film']; ?></p>
                    <p class="text-sm text-gray-300 mb-2"><?php echo $row['nama_genre']; ?></p>
                    <div class="overflow-hidden max-h-[100px]">
                        <p class="text-sm flex text-gray-300 text-ellipsis mb-4"><?php echo $row['deskripsi']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>
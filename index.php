<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = "Playing" ?>
    <?php include "config/config.php" ?>
    <?php
    include "controller/controllerFilm.php";
    $film = getFilms();
    ?>
</head>

<body style="background-color: #060614">
    <?php include "includes/navbar.php" ?>
    <!-- Dropdown -->
    <div class="flex justify-end font-bold mr-10 text-[#9398e0] mt-10 relative z-[5]">
        <div class="dropdown">
            <button id="dropdownButton" class="m-1 btn bg-[#9398e0] text-[#060614] px-4 py-2">Location</button>
            <ul id="dropdownMenu" class="hidden p-2 shadow menu dropdown-content z-[1] bg-white rounded-box w-52 absolute right-0 mt-2">
                <li><a href="?location=Surabaya" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Surabaya</a></li>
                <li><a href="?location=Malang" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Malang</a></li>
                <li><a href="?location=Jakarta" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Jakarta</a></li>
            </ul>
        </div>
    </div>

    <!-- Card -->
    <div class="px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 place-content-start p-10 capitalize">
            <?php foreach ($film as $row) : ?>
                <div class="relative w-[200px] flex flex-col bg-white rounded-lg shadow-md aspect-w-3 aspect-h-4 overflow-hidden">
                    <a href="movie.php?slug=<?php echo $row['slug']; ?>" class="relative block">
                        <div class="h-full overflow-hidden">
                            <img src="assets/images/poster/<?php echo $row['poster']; ?>" alt="<?php echo $row['nama_film']; ?>" loading="lazy" class="object-cover w-full h-full">
                        </div>
                        <div class="px-4 absolute inset-0 flex flex-col justify-center items-center bg-gradient-to-t from-black via-black to-transparent opacity-0 transition duration-500 ease-in-out hover:opacity-100 z-10">
                            <p class="text-white font-bold text-xl mb-2 line-clamp-2 text-center"><?php echo $row['nama_film']; ?></p>
                            <p class="text-sm text-gray-300 mb-2"><?php echo $row['nama_genre']; ?></p>
                            <div class="overflow-hidden max-h-[100px]">    
                                <p class="text-sm flex text-gray-300 text-ellipsis mb-4"><?php echo $row['deskripsi']; ?></p>
                            </div>
                            <a href="movie.php?slug=<?php echo $row['slug']; ?>" class="inline-block bg-white text-gray-800 px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#8f94da] hover:text-white transition z-20">
                            Book Now
                            </a>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
    </div>
    <script src="assets/js/location.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    $title = 'movie bioskop';
    include 'config/config.php';
    include 'controller/controllerBioskop.php';
    include 'controller/controllerFilm.php';
    include 'controller/controllerPenayangan.php';
    ?>
</head>

<body style="background-color: #060614">

    <header>
    <?php include 'includes/navbar.php';
        $slug = $_GET['slug'];
        $film = getFilmBySlug($slug);
        if ($film) {
            $film = mysqli_fetch_assoc($film);
        } else {
            echo "<div style='color: #e4e5f7; text-align: center; padding: 20px;'>Film not found.</div>";
            exit;
        }

        $jadwal = getPenayangan($slug);
        if (!$jadwal) {
            echo "<div style='color: #e4e5f7; text-align: center; padding: 20px;'>Screening schedule not found.</div>";
            exit;
        } else {
            $jadwal = mysqli_fetch_all($jadwal, MYSQLI_ASSOC);
            if (empty($jadwal)) {
                echo "<div style='color: #e4e5f7; text-align: center; padding: 20px;'>No screening schedule available.</div>";
                exit;
            }
        }
        ?>
    </header>
    <div class="flex flex-col items-center pt-10 px-20">
        <div class="flex w-full max-w-screen-lg">
            <img class="w-1/2 h-[300px] mb-8 object-cover rounded-md"
                src="https://dbijapkm3o6fj.cloudfront.net/resources/4759,1004,1,6,4,0,600,450/-4601-/20151230011419/grand-city-mall.jpeg">
            <div class="w-1/2 pl-8">
                <h1 class="text-3xl sm:text-4xl font-bold mb-4 capitalize text-[#9398e0]"><?php echo htmlspecialchars($cinema['nama_bioskop']); ?></h1>
                <div class="ml-10 mr-4 flex items-center text-[#1d1d3f]">
                    <i class="fa-solid fa-clock mb-8 mr-4" style="color :#ffff;"></i>
                    <p class="capitalize text-lg sm:text-xl leading-relaxed mb-8 text-[#e4e5f7]">
                        10.00 - 22.00
                    </p>
                </div>
                <div class="ml-10 mr-4 flex items-center text-[#1d1d3f]">
                    <i class="fa-solid fa-location-dot mb-14 mr-4" style="color :#ffff;"></i>
                    <p class="capitalize text-lg sm:text-xl leading-relaxed mb-8 text-[#e4e5f7]">
                        <?php echo htmlspecialchars($cinema['alamat']); ?>
                    </p>
                </div>
                <div class="ml-10 mr-4 flex items-center text-[#1d1d3f]">
                    <i class="fa-solid fa-clock mb-8 mr-4" style="color :#ffff;"></i>
                    <p class="capitalize text-lg sm:text-xl leading-relaxed mb-8 text-[#e4e5f7]">
                        <?php echo htmlspecialchars($cinema['telepon']); ?>
                    </p>
                </div>
            </div>
        </div>
        <hr class="border-gray-800 mb-8 w-full max-w-screen-lg">

        <div class="w-full max-w-screen-lg">
            <ul class="divide-y divide-gray-800">
                <?php
                $current_movie = '';
                foreach ($movies as $movie) {
                    if ($current_movie !== $movie['nama_film']) {
                        if ($current_movie !== '') {
                            echo '</div></div></li>';
                        }
                        $current_movie = $movie['nama_film'];
                        ?>
                        <li class="py-4">
                            <img class="h-[300px] object-cover overflow-hidden rounded-md mb-4"
                                src="public/assets/img/<?php echo htmlspecialchars($movie['banner']); ?>">
                            <div class="flex justify-between items-center text-[#e4e5f7]">
                                <a href="#" class="text-2xl font-bold capitalize text-[#c63a8d]"><?php echo htmlspecialchars($movie['nama_film']); ?></a>
                                <span class="text-lg font-semibold">Rp.<?php echo htmlspecialchars($movie['harga']); ?></span>
                            </div>
                            <div class="flex py-2 space-x-4 capitalize">
                                <?php
                                $current_studio = '';
                                foreach ($movies as $show) {
                                    if ($show['nama_film'] === $current_movie && $show['kode_studio'] !== $current_studio) {
                                        $current_studio = $show['kode_studio'];
                                        ?>
                                        <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">audi : <?php echo htmlspecialchars($show['kode_studio']); ?></a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="flex py-2 space-x-2">
                                <?php
                                foreach ($movies as $show) {
                                    if ($show['nama_film'] === $current_movie) {
                                        ?>
                                        <a href="movie.php" class="mt-2 text-sm text-[#e4e5f7] px-2 border "><?php echo htmlspecialchars($show['tanggal']); ?></a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="flex py-2 space-x-4">
                                <?php
                                foreach ($movies as $show) {
                                    if ($show['nama_film'] === $current_movie) {
                                        ?>
                                        <a href="#"
                                            class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0]"><?php echo htmlspecialchars($show['jam']); ?></a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>

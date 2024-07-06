<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $title = 'movies';
    include 'config/config.php';
    include 'controller/controllerFilm.php';
    include 'controller/controllerBioskop.php';
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

        $jadwal = getPenayanganByFilm($slug);
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

    <div class="flex flex-col items-center pt-20 px-20">
        <img class="w-full max-w-screen-lg h-[380px] mb-8 object-cover rounded-md"
            src="assets/images/banner/<?php echo $film['banner']; ?>" alt="<?php echo $film['nama_film']; ?>">

        <div class="w-full max-w-screen-lg font-poppins">
            <h1 class="text-5xl font-bold mb-4 capitalize" style="color: #9398e0;">
                <?php echo htmlspecialchars($film['nama_film']); ?>
            </h1>
            <p class="text-lg sm:text-xl leading-relaxed mb-8 font-poppins" style="color: #e4e5f7;">
                <?php echo htmlspecialchars($film['deskripsi']); ?>
            </p>
            <hr class="border-gray-800 mb-8">
        </div>

        <div class="w-full max-w-screen-lg">
            <ul class="divide-y divide-gray-800">
                <?php
                $current_bioskop = '';
                $current_studio = '';
                foreach ($jadwal as $cinema):
                    if ($current_bioskop !== $cinema['nama_bioskop']) {
                        if ($current_bioskop !== '') {
                            echo '</ul><div class="clear"></div></li>';
                        }
                        $current_bioskop = $cinema['nama_bioskop'];
                        $current_studio = '';
                        ?>
                        <li>
                            <div class="flex justify-between items-center text-[#e4e5f7] py-4">
                                <h3 href="#"
                                    class="text-3xl font-semibold capitalize font-poppins"><?php echo htmlspecialchars($cinema['nama_bioskop']); ?></h3>
                                </div>
                                <ul class="divide-y divide-gray-800">
                                    <?php }
                    if ($current_studio !== $cinema['kode_studio']) {
                        if ($current_studio !== '') {
                            echo '</ul><div class="clear"></div></li>';
                        }
                        $current_studio = $cinema['kode_studio'];
                        ?>
                        <li class="schedule-type py-2 text-[#e4e5f7] flex justify-between items-center">
                            <span class="audi-nm font-poppins">Audi <?php echo htmlspecialchars($cinema['kode_studio']); ?></span>
                            <span class="text-lg font-semibold pr-10 font-poppins">Rp.<?php echo htmlspecialchars($cinema['harga']); ?></span>
                        </li>
                        <li>
                            <ul class="showtime-lists flex flex-wrap py-2 space-x-2">
                    <?php } ?>
                    <li class="py-1">
                        <a href="seat.php?book=<?php echo $cinema['id_penayangan']; ?>" class="py-2 px-4 border border-gray-400 bg-gray-100 text-gray-800 hover:bg-[#9398e0] font-poppins">
                            <?php echo htmlspecialchars($cinema['jam']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                            </ul>
                            <div class="clear"></div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</body>
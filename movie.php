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

    <div class="flex flex-col items-center pt-20 px-20">
        <img class="w-full max-w-screen-lg h-[380px] mb-8 object-cover rounded-md"
            src="assets/images/banner/<?php echo $film['banner']; ?>" alt="<?php echo $film['nama_film']; ?>">

        <div class="w-full max-w-screen-lg">
            <h1 class="text-5xl font-bold font-poppins mb-4 capitalize" style="color: #9398e0;">
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
                foreach ($jadwal as $cinema): 
                    if ($current_bioskop !== $cinema['nama_bioskop']) {
                        if ($current_bioskop !== '') {
                            echo '</div></li>';
                        }
                        $current_bioskop = $cinema['nama_bioskop'];
                ?>
                    <li class="py-4">
                        <div class="flex justify-between items-center text-[#e4e5f7]">
                            <a href="#" class="text-3xl font-semibold capitalize"><?php echo htmlspecialchars($cinema['nama_bioskop']); ?></a>
                            <span class="text-lg font-semibold pr-10">Rp.<?php echo htmlspecialchars($cinema['harga']); ?></span>
                        </div>
                        
                        <div class="flex py-2 space-x-4 capitalize">
                            <a href="#" class="mt-2 text-lg text-[#e4e5f7] px-2 border">Audi 
                                <?php echo htmlspecialchars($cinema['kode_studio']); ?></a>
                        </div>
                        <div class="flex py-2 space-x-2">
                            <a href="#" class="mt-2 text-lg text-[#e4e5f7] px-2 border">
                                <?php echo htmlspecialchars($cinema['tanggal']); ?></a>
                        </div>
                        <div class="flex py-2 space-x-2">
                <?php } ?>
                            <a href="seat.php" class="mt-2 text-lg text-[#e4e5f7] px-2 border">
                                <?php echo htmlspecialchars($cinema['jam']); ?></a>
                <?php endforeach; ?>
                        </div>
                    </li>
            </ul>
        </div>
    </div>
    
</body>
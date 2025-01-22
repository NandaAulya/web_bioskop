<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = "Theater" ?>
    <?php include "config/config.php" ?>
    <?php
    include "controller/controllerBioskop.php";
    ?>
</head>

<body style="background-color: #060614">
    <?php include "includes/navbar.php" ?>
    <!-- Dropdown -->
    <?php include "includes/dropKota.php" ?>

    <?php
    if (isset($_POST['kota'])) {
        $kota = $_POST['kota'];
        $theaters = viewAllTheaterByKota($kota);
    } else {
        // Jika tidak ada parameter kota, ambil semua data teater
        $theaters = viewAllTheater();
    }
    ?>
    <!-- Card -->

    <div class="grid grid-cols-4 gap-4 place-content-start p-10">
        <?php foreach ($theaters as $theater): ?>
            <div class="shadow-2xl overflow-hidden rounded-md shadow transition hover:shadow-lg mb-4 ml-6"
                style="width: 300px;">
                <div class="bg-white rounded-md">
                    <a href="tinfo.php?slug=<?php echo $theater['slug_bioskop']; ?>">
                        <img src=<?php echo $theater['poster']; ?>
                            class="h-[150px] w-[300px] object-cover">
                        <h3
                            class="mt-4 ml-4 capitalize text-2xl font-bold font-poppins transition-colors duration-300 text-[#9398e0] hover:text-[#1d1d3f]">
                            <?php echo $theater['nama_bioskop']; ?>
                        </h3>
                    </a>
                    <div class="ml-4 flex items-center text-[#1d1d3f]">
                        <i class="fa-solid fa-location-dot mb-8"></i>
                        <div class="ml-4 mt-3">
                            <p class="capitalize text-sm mb-8"><?php echo $theater['alamat']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>

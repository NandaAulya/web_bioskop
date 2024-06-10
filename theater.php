<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = "Theater" ?>
    <?php include "config/config.php" ?>
    <?php
    $theaters = getTheaters();
    // TODO: kasih param buat nanti soalnya location harus di select
    include "controller/controllerBioskop.php";
    ?>
</head>

<body style="background-color: #060614">
    <?php include "includes/navbar.php"?>
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
    <div class="flex flex-row flex-wrap gap-6 ml-10 mt-10 mx-auto drop-shadow-auto">
        <?php foreach ($theaters as $theater) : ?>
            <div class="shadow-2xl overflow-hidden rounded-md shadow transition hover:shadow-lg mb-4" style="width: 300px;">
                <div class="bg-white rounded-md">
                    <a href="info?=nama<?php echo $theater['']; ?>">
                        <img src="<?php echo $theater['poster']; ?>" class="h-[150px] w-[300px] object-cover">
                        <h3 class="mt-4 ml-4 capitalize text-2xl font-bold font-poppins transition-colors duration-300 text-[#9398e0] hover:text-[#1d1d3f]">
                            <?php echo $theater['title']; ?>
                        </h3>
                    </a>
                    <div class="ml-4 flex items-center text-[#1d1d3f]">
                        <i class="fa-solid fa-location-dot mb-8"></i>
                        <div class="ml-4 mt-3">
                            <p class="capitalize text-sm mb-8"><?php echo $theater['location']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="assets/js/location.js"></script>
</body>

</html>
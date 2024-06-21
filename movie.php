<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $title = 'movies';
    include 'config/config.php';
    // TODO: ubah jadi controllerPenayangan
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
        //tambahkan validasi data ada/t
        if ($film) {
            $film = mysqli_fetch_assoc($film);
        } else {
            echo "Film not found.";
        }

        $jadwal = getPenayangan($slug);
        if (!$jadwal) {
            echo "Screening schedule not found.";
            // Handle this error appropriately, maybe redirect or display a message
        } else {
            // Fetch all rows into an array
            $jadwal = mysqli_fetch_all($jadwal, MYSQLI_ASSOC);
        }
        ?>
    </header>

    <div class="flex flex-col items-center pt-10 px-20">
        <img class="w-full max-w-screen-lg h-[380px] mb-8 object-cover rounded-md"
            src="assets/images/banner/<?php echo $film['banner']; ?>">

        <div class="w-full max-w-screen-lg">
            <h1 class="text-3xl sm:text-4xl font-bold mb-4 capitalize" style="color: #9398e0;">
                <?php echo $film['nama_film']; ?>
            </h1>
            <p class="text-lg sm:text-xl leading-relaxed mb-8" style="color: #e4e5f7;"><?php echo $film['deskripsi']; ?>
            </p>
            <hr class="border-gray-800 mb-8">
        </div>

        <div class="w-full max-w-screen-lg">
            <ul class="divide-y divide-gray-800">

                <!-- Loop through cinemas dynamically -->
                <?php foreach ($jadwal as $cinema): ?>
                    <li class="py-4">
                        <div class="flex justify-between items-center text-[#e4e5f7]">
                            <a href="#" class="text-xl font-semibold capitalize"><?php echo $cinema['nama_bioskop']; ?></a>
                            <span class="text-lg font-semibold">Rp.<?php echo $cinema['harga']; ?></span>
                        </div>
                        <div class="flex py-2 space-x-4 capitalize">
                            <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">Studio :
                                <?php echo $cinema['kode_studio']; ?></a>
                        </div>
                        <div class="flex py-2 space-x-2">
                            <a href="#" class="mt-2 text-sm text-[#e4e5f7] px-2 border">Jam :
                                <?php echo $cinema['tanggal']; ?></a>
                        </div>
                    </li>
                <?php endforeach; ?>



            </ul>
        </div>
    </div>

</body>

</html>
<?php
include_once 'controller/controllerPenayangan.php';
include_once 'controller/controllerBioskop.php';
include_once 'controller/controllerStudio.php';
include_once 'controller/controllerFilm.php';

$error_message = '';
$success_message = '';

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action == 'create') {
        $id_film = $_POST['id_film'] ?? '';
        $id_studio = $_POST['id_studio'] ?? '';
        $harga = $_POST['harga'] ?? '';
        $tanggal = $_POST['tanggal_tayang'] ?? '';;
        $jam = $_POST['jam'] ?? '';;
        $status_tayang = $_POST['status'] ?? '';;
        $result = addPenayangan($harga, $tanggal, $id_film, $id_studio, $status_tayang, $jam);

        if ($result == true) {
            $success_message = "Penayangan berhasil ditambahkan.";
        } else {
            $error_message = $result;
        }
    } elseif ($action == 'update') {
        $id_penayangan = $_POST['id_penayangan'] ?? '';
        $id_film = $_POST['id_film'] ?? '';
        $id_studio = $_POST['id_studio'] ?? '';
        $harga = $_POST['harga'] ?? '';
        $tanggal = $_POST['tanggal_tayang'] ?? '';;
        $jam = $_POST['jam'] ?? '';;
        $status_tayang = $_POST['status'] ?? '';;

        $result = updatePenayangan($id_penayangan, $harga, $tanggal, $id_film, $id_studio, $status_tayang, $jam);

        if ($result == true) {
            $success_message = "Penayangan berhasil diupdate.";
        } else {
            $error_message = $result;
        }
    } elseif ($action == 'delete') {
        $id_penayangan = $_POST['id_penayangan'] ?? '';

        $result = deletePenayangan($id_penayangan);

        if ($result == true) {
            $success_message = "Penayangan berhasil dihapus.";
        } else {
            $error_message = $result;
        }
    }
}

// Fetch films and studios for options
$films = viewAllFilm();
$studios = viewAllStudioS();
$penayangans = viewAllPenayangan();
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-3xl font-bold mb-4">Tambah Penayangan</h1>

    <!-- Error and success messages -->
    <?php if ($error_message) : ?>
        <div class="bg-red-500 text-white p-4 rounded mb-4"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <?php if ($success_message) : ?>
        <div class="bg-green-500 text-white p-4 rounded mb-4"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <!-- Form to add penayangan -->
    <form method="POST" action="" class="space-y-4">
        <input type="hidden" name="action" value="create">
        <!-- Form fields -->
        <div>
            <label for="id_film" class="block text-sm font-medium text-gray-300">Film:</label>
            <select name="id_film" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <?php while ($film = $films->fetch_assoc()) : ?>
                    <option value="<?php echo $film['id_film']; ?>"><?php echo $film['nama_film']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div>
            <label for="id_studio" class="block text-sm font-medium text-gray-300">Studio:</label>
            <select name="id_studio" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <?php while ($studio = $studios->fetch_assoc()) : ?>
                    <option value="<?php echo $studio['id_studio']; ?>"><?php echo $studio['kode_studio'].' | '. $studio['nama_bioskop'] ; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div>
            <label for="harga" class="block text-sm font-medium text-gray-300">Harga:</label>
            <input type="number" name="harga" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <div>
            <label for="tanggal" class="block text-sm font-medium text-gray-300">Tanggal:</label>
            <input type="date" name="tanggal_tayang" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <div>
            <label for="jam" class="block text-sm font-medium text-gray-300">Jam Tayang:</label>
            <input type="time" name="jam" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <div>
            <label for="status" class="block text-sm font-medium text-gray-300">Jam Tayang:</label>
            <select name="status" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <option value="0">Segera</option>
                <option value="1">Tayang</option>
                <option value="2">Selesai</option>
            </select>
        </div>
        <!-- Submit button -->
        <div>
            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tambah</button>
        </div>
    </form>

    <!-- List of penayangan -->
    <h1 class="text-3xl font-bold mt-8 mb-4">Daftar Penayangan</h1>
    <ul class="space-y-4">
        <?php while ($row = $penayangans->fetch_assoc()) : ?>
            <li class="bg-gray-800 p-4 rounded-md flex justify-between items-center">
                <div>
                    <p class="text-lg font-semibold"><?php echo $row['nama_film']; ?></p>
                    <p class="text-lg font-semibold"><?php echo $row['kode_studio'].' | '. $row['nama_bioskop']; ?></p>
                    <p class="text-gray-400"><?php echo $row['harga']; ?></p>
                    <p class="text-gray-400"><?php echo $row['tanggal'] . ' ' . $row['jam']; ?></p>
                </div>
                <div class="flex space-x-2">
                    <button onclick="document.getElementById('update-<?php echo $row['id_penayangan']; ?>').classList.toggle('hidden');" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update</button>
                    <form method="POST" action="" class="inline-block">
                        <input type="hidden" name="id_penayangan" value="<?php echo $row['id_penayangan']; ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
                    </form>
                </div>
            </li>
            <li id="update-<?php echo $row['id_penayangan']; ?>" class="hidden bg-gray-700 p-4 rounded-md">
                <form method="POST" action="" class="space-y-4">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id_penayangan" value="<?php echo $row['id_penayangan']; ?>">
                    <!-- Form fields with current values -->
                    <div>
                        <label for="id_film" class="block text-sm font-medium text-gray-300">Film:</label>
                        <select name="id_film" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <?php while ($film = $films->fetch_assoc()) : ?>
                                <option value="<?php echo $film['id_film']; ?>"><?php echo $film['nama_film']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div>
                        <label for="id_studio" class="block text-sm font-medium text-gray-300">Studio:</label>
                        <select name="id_studio" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <?php while ($studio = $studios->fetch_assoc()) : ?>
                                <option value="<?php echo $studio['id_studio']; ?>"><?php echo $studio['kode_studio'].' | '. $studio['nama_bioskop'] ; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-300">Tanggal:</label>
                        <input type="date" name="tanggal" value="<?php echo $row['tanggal']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>
                    <div>
                        <label for="jam" class="block text-sm font-medium text-gray-300">Jam:</label>
                        <input type="time" name="jam" value="<?php echo $row['jam']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>
                    <!-- Submit button -->
                    <div>
                        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </div>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
<script>
    // Ambil elemen notifikasi
    var errorNotification = document.getElementById('error-message');
    var successNotification = document.getElementById('success-message');

    // Jika ada notifikasi error, tutup setelah 3 detik
    if (errorNotification) {
        setTimeout(function() {
            errorNotification.style.display = 'none';
        }, 3000);
    }

    // Jika ada notifikasi sukses, tutup setelah 3 detik
    if (successNotification) {
        setTimeout(function() {
            successNotification.style.display = 'none';
        }, 3000);
    }
</script>
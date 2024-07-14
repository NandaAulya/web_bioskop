<?php
include_once 'controller/controllerFilm.php';

$error_message = '';
$success_message = '';

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action == 'create') {
        $nama_film = $_POST['nama_film'] ?? '';
        $deskripsi = $_POST['deskripsi'] ?? '';
        $tahun_terbit = $_POST['tahun_terbit'] ?? '';
        $sutradara = $_POST['sutradara'] ?? '';
        $poster = $_FILES['poster'] ?? '';
        $banner = $_FILES['banner'] ?? '';
        $id_genre = $_POST['id_genre'] ?? '';
        $aktor = $_POST['aktor'] ?? '';
        $status_tayang = $_POST['status_tayang'] ?? '';

        $result = createFilm($nama_film, $deskripsi, $tahun_terbit, $sutradara, $poster, $banner, $id_genre, $aktor, $status_tayang);

        if ($result == true) {
            $success_message = "Film berhasil ditambahkan.";
        } else {
            $error_message = $result;
        }
    } elseif ($action == 'update') {
        $id_film = $_POST['id_film'] ?? '';
        $nama_film = $_POST['nama_film'] ?? '';
        $tahun_terbit = $_POST['tahun_terbit'] ?? '';
        $deskripsi = $_POST['deskripsi'] ?? '';
        $sutradara = $_POST['sutradara'] ?? '';
        $id_genre = $_POST['id_genre'] ?? '';
        $poster = $_POST['poster'] ?? '';
        $banner = $_POST['banner'] ?? '';
        $aktor = $_POST['aktor'] ?? '';
        $status_tayang = $_POST['status_tayang'] ?? '';

        $result = updateFilm($id_film, $nama_film, $deskripsi, $tahun_terbit, $sutradara, $poster, $banner, $id_genre, $aktor,  $status_tayang);

        if ($result == true) {
            $success_message = "Film berhasil diupdate.";
        } else {
            $error_message = $result;
        }
    } elseif ($action == 'delete') {
        $id_film = $_POST['id_film'] ?? '';

        $result = deleteFilm($id_film);

        if ($result == true) {
            $success_message = "Film berhasil dihapus.";
        } else {
            $error_message = $result;
        }
    }
}

// Fetch films for listing
$films = viewAllFilm();
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-3xl font-bold mb-4">Tambah Film</h1>

    <!-- Error and success messages -->
    <?php if ($error_message) : ?>
        <div class="bg-red-500 text-white p-4 rounded mb-4"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <?php if ($success_message) : ?>
        <div class="bg-green-500 text-white p-4 rounded mb-4"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <!-- Form to add film -->
    <form method="POST" action="" enctype="multipart/form-data" class="space-y-4">
        <input type="hidden" name="action" value="create">
        <!-- Form fields -->
        <div>
            <label for="nama_film" class="block text-sm font-medium text-gray-300">Nama Film:</label>
            <input type="text" name="nama_film" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-300">Deskripsi:</label>
            <textarea name="deskripsi" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
        </div>
        <div>
            <label for="tahun_terbit" class="block text-sm font-medium text-gray-300">Tahun Terbit:</label>
            <input type="text" name="tahun_terbit" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <div>
            <label for="sutradara" class="block text-sm font-medium text-gray-300">Sutradara:</label>
            <input type="text" name="sutradara" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <div>
            <label for="poster" class="block text-sm font-medium text-gray-300">Poster:</label>
            <input type="file" name="poster" class="mt-1 block w-full text-white" required>
        </div>
        <div>
            <label for="banner" class="block text-sm font-medium text-gray-300">Banner:</label>
            <input type="file" name="banner" class="mt-1 block w-full text-white" required>
        </div>
        <div>
            <label for="id_genre" class="block text-sm font-medium text-gray-300">Genre:</label>
            <input type="text" name="id_genre" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <div>
            <label for="aktor" class="block text-sm font-medium text-gray-300">Aktor:</label>
            <input type="text" name="aktor" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <div>
            <label for="status_tayang" class="block text-sm font-medium text-gray-300">Status Tayang:</label>
            <input type="text" name="status_tayang" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <!-- Submit button -->
        <div>
            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tambah</button>
        </div>
    </form>

    <!-- List of films -->
    <h1 class="text-3xl font-bold mt-8 mb-4">Daftar Film</h1>
    <ul class="space-y-4">
        <?php while ($row = $films->fetch_assoc()) : ?>
            <li class="bg-gray-800 p-4 rounded-md flex justify-between items-center">
                <div>
                    <p class="text-lg font-semibold"><?php echo $row['nama_film']; ?></p>
                    <p class="text-gray-400"><?php echo $row['tahun_terbit']; ?></p>
                </div>
                <div class="flex space-x-2">
                    <button onclick="document.getElementById('update-<?php echo $row['id_film']; ?>').classList.toggle('hidden');" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update</button>
                    <form method="POST" action="" class="inline-block">
                        <input type="hidden" name="id_film" value="<?php echo $row['id_film']; ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
                    </form>
                </div>
            </li>
            <li id="update-<?php echo $row['id_film']; ?>" class="hidden bg-gray-700 p-4 rounded-md">
                <form method="POST" action="" enctype="multipart/form-data" class="space-y-4">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id_film" value="<?php echo $row['id_film']; ?>">
                    <!-- Form fields with current values -->
                    <div>
                        <label for="nama_film" class="block text-sm font-medium text-gray-300">Nama Film:</label>
                        <input type="text" name="nama_film" value="<?php echo $row['nama_film']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        
                        <label for="deskripsi" class="block text-sm font-medium text-gray-300">Deskripsi Film:</label>
                        <input type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                        
                        <label for="tahun_terbit" class="block text-sm font-medium text-gray-300">Tahun Terbit:</label>
                        <input type="text" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                        
                        <label for="sutradara" class="block text-sm font-medium text-gray-300">Sutradara:</label>
                        <input type="text" name="sutradara" value="<?php echo $row['sutradara']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                        
                        <label for="poster" class="block text-sm font-medium text-gray-300">Poster:</label>
                        <input type="file" name="poster" value="<?php echo $row['poster']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                        
                        <label for="banner" class="block text-sm font-medium text-gray-300">Banner:</label>
                        <input type="file" name="banner" value="<?php echo $row['banner']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                        
                        <label for="id_genre" class="block text-sm font-medium text-gray-300">Genre:</label>
                        <input type="text" name="id_genre" value="<?php echo $row['id_genre']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                        
                        <label for="aktor" class="block text-sm font-medium text-gray-300">Aktor:</label>
                        <input type="text" name="aktor" value="<?php echo $row['aktor']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                        
                        <label for="status_tayang" class="block text-sm font-medium text-gray-300">Status Tayang:</label>
                        <input type="text" name="status_tayang" value="<?php echo $row['status_tayang']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>

                    </div>
                    <!-- other fields -->
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
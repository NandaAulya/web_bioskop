<?php
include_once '../controller/controllerBioskop.php';

$error_message = '';
$success_message = '';

// Handle update action if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action == 'create') {
        // Process create action
        $nama_bioskop = $_POST['nama_bioskop'] ?? '';
        $alamat = $_POST['alamat'] ?? '';
        $no_telpon = $_POST['no_telpon'] ?? '';
        $poster = $_FILES['poster'] ?? '';
        $kota = $_POST['kota'] ?? '';

        $result = createTheater($nama_bioskop, $alamat, $no_telpon, $poster, $kota);

        if ($result == true) {
            $success_message = "Bioskop berhasil ditambahkan.";
        } else {
            $error_message = $result;
        }
    } elseif ($action == 'update') {
        // Process update action
        $id_bioskop = $_POST['id_bioskop'] ?? '';
        $nama_bioskop = $_POST['nama_bioskop'] ?? '';
        $alamat = $_POST['alamat'] ?? '';
        $no_telpon = $_POST['no_telpon'] ?? '';
        $poster = $_FILES['poster'] ?? '';
        $kota = $_POST['kota'] ?? '';

        $result = updateTheater($id_bioskop, $nama_bioskop, $alamat, $no_telpon, $poster, $kota);

        if ($result == true) {
            $success_message = "Bioskop berhasil diupdate.";
        } else {
            $error_message = $result;
        }
    } elseif ($action == 'delete') {
        // Process delete action
        $id_bioskop = $_POST['id_bioskop'] ?? '';

        $result = deleteTheater($id_bioskop);

        if ($result == true) {
            $success_message = "Bioskop berhasil dihapus.";
        } else {
            $error_message = $result;
        }
    }
}

// Fetch theaters for listing
$theaters = viewAllTheater();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bioskop</title>
    <?php $title = "Playing" ?>
    <?php include "../config/config.php" ?>
</head>
<body class="bg-gray-900 text-white">
    <?php include "navbar.php" ?>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-3xl font-bold mb-4">Tambah Bioskop</h1>

        <!-- Error and success messages -->
        <?php if ($error_message) : ?>
            <div class="bg-red-500 text-white p-4 rounded mb-4"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <?php if ($success_message) : ?>
            <div class="bg-green-500 text-white p-4 rounded mb-4"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <!-- Form to add theater -->
        <form method="POST" action="crudBioskop.php" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="action" value="create">
            <!-- Form fields -->
            <div>
                <label for="nama_bioskop" class="block text-sm font-medium text-gray-300">Nama Bioskop:</label>
                <input type="text" name="nama_bioskop" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-300">Alamat:</label>
                <textarea name="alamat" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
            </div>
            <div>
                <label for="no_telpon" class="block text-sm font-medium text-gray-300">No Telpon:</label>
                <input type="text" name="no_telpon" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="poster" class="block text-sm font-medium text-gray-300">Poster:</label>
                <input type="file" name="poster" accept="image/*" class="mt-1 block w-full text-gray-300" required>
            </div>
            <div>
                <label for="kota" class="block text-sm font-medium text-gray-300">Kota:</label>
                <input type="text" name="kota" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <!-- Submit button -->
            <div>
                <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tambah</button>
            </div>
        </form>
        
        <!-- List of theaters -->
        <h1 class="text-3xl font-bold mt-8 mb-4">Daftar Bioskop</h1>
        <ul class="space-y-4">
            <?php
            $theaters = viewAllTheater();
            while ($row = $theaters->fetch_assoc()) {
                echo "<li class='bg-gray-800 p-4 rounded-md flex justify-between items-center'>
                    <div>
                        <p class='text-lg font-semibold'>" . $row['nama_bioskop'] . "</p>
                        <p class='text-gray-400'>" . $row['kota'] . "</p>
                    </div>
                    <div class='flex space-x-2'>
                        <!-- Button to trigger modal -->
                        <button onclick='openModal(" . $row['id_bioskop'] . ", \"" . $row['nama_bioskop'] . "\", \"" . $row['alamat'] . "\", \"" . $row['no_telpon'] . "\", \"" . $row['kota'] . "\")' class='px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600'>Update</button>
                        <form method='POST' action='crudBioskop.php' class='inline-block'>
                            <input type='hidden' name='id_bioskop' value='" . $row['id_bioskop'] . "'>
                            <input type='hidden' name='action' value='delete'>
                            <button type='submit' class='px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600'>Delete</button>
                        </form>
                    </div>
                </li>";
            }
            ?>
        </ul>
    </div>

    <!-- Modal for update -->
    <div id="updateModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalTitle">Update Bioskop</h3>
                        <div class="mt-2">
                            <!-- Form inside the modal -->
                            <form id="updateForm" method="POST" action="crudBioskop.php" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" id="modalId" name="id_bioskop" value="">
                                
                                <!-- Existing data fields -->
                                <div>
                                    <label for="modalNama" class="block text-sm font-medium text-gray-700">Nama Bioskop:</label>
                                    <input type="text" id="modalNama" name="nama_bioskop" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="mt-3">
                                    <label for="modalAlamat" class="block text-sm font-medium text-gray-700">Alamat:</label>
                                    <textarea id="modalAlamat" name="alamat" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
                                </div>
                                <div class="mt-3">
                                    <label for="modalNoTelpon" class="block text-sm font-medium text-gray-700">No Telpon:</label>
                                    <input type="text" id="modalNoTelpon" name="no_telpon" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="mt-3">
                                    <label for="modalKota" class="block text-sm font-medium text-gray-700">Kota:</label>
                                    <input type="text" id="modalKota" name="kota" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                
                                <!-- Field for updating poster -->
                                <div class="mt-3">
                                    <label for="modalPoster" class="block text-sm font-medium text-gray-700">Poster:</label>
                                    <input type="file" id="modalPoster" name="poster" accept="image/*" class="mt-1 block w-full text-gray-300">
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk mengontrol modal -->
<script>
    // Function to open modal and fill form fields with current data
    function openModal(id, nama, alamat, noTelpon, kota) {
        document.getElementById('modalId').value = id;
        document.getElementById('modalNama').value = nama;
        document.getElementById('modalAlamat').value = alamat;
        document.getElementById('modalNoTelpon').value = noTelpon;
        document.getElementById('modalKota').value = kota;
        document.getElementById('updateModal').classList.remove('hidden');
    }
</script>
</body>
</html>

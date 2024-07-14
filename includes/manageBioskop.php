<?php
include_once 'controller/controllerBioskop.php';
include_once 'controller/controllerStudio.php';

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
    } elseif ($action == 'addStudio') {
        // Process add studio action
        $kode_studio = $_POST['kode_studio'] ?? '';
        $id_bioskop = $_POST['id_bioskop'] ?? '';

        $result = addStudio($kode_studio, $id_bioskop);

        if ($result == true) {
            $success_message = "Studio berhasil ditambahkan.";
        } else {
            $error_message = $result;
        }
    } elseif ($action == 'updateStudio') {
        // Process update studio action
        $id_studio = $_POST['id_studio'] ?? '';
        $kode_studio = $_POST['kode_studio'] ?? '';

        $result = updateStudio($id_studio, $kode_studio);

        if ($result == true) {
            $success_message = "Studio berhasil diupdate.";
        } else {
            $error_message = $result;
        }
    } elseif ($action == 'deleteStudio') {
        // Process delete studio action
        $id_studio = $_POST['id_studio'] ?? '';

        $result = deleteStudio($id_studio);

        if ($result == true) {
            $success_message = "Studio berhasil dihapus.";
        } else {
            $error_message = $result;
        }
    }
}

// Fetch theaters for listing
$theaters = viewAllTheater();
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-3xl font-bold mb-4">Tambah Bioskop</h1>

    <!-- Error and success messages -->
    <?php if ($error_message) : ?>
        <div id="error-message" class="bg-red-500 text-white p-4 rounded mb-4">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <?php if ($success_message) : ?>
        <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>

    <!-- Form to add theater -->
    <form method="POST" action="" enctype="multipart/form-data" class="space-y-4">
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
        while ($row = $theaters->fetch_assoc()) {
            echo "<li class='bg-gray-800 p-4 rounded-md flex justify-between items-center'>
                <div>
                    <p class='text-lg font-semibold'>" . $row['nama_bioskop'] . "</p>
                    <p class='text-gray-400'>" . $row['kota'] . "</p>
                </div>
                <div class='flex space-x-2'>
                    <button onclick='toggleUpdateForm(" . $row['id_bioskop'] . ")' class='px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600'>Update</button>
                    <form method='POST' action='' class='inline-block'>
                        <input type='hidden' name='id_bioskop' value='" . $row['id_bioskop'] . "'>
                        <input type='hidden' name='action' value='delete'>
                        <button type='submit' class='px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600'>Delete</button>
                    </form>
                    <button onclick='toggleStudioList(" . $row['id_bioskop'] . ")' class='px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600'>Daftar Studio</button>
                </div>
            </li>";

            // Form update bioskop
            echo "<li id='update-" . $row['id_bioskop'] . "' class='hidden bg-gray-700 p-4 rounded-md'>
                <form method='POST' action='' enctype='multipart/form-data' class='space-y-4'>
                    <input type='hidden' name='action' value='update'>
                    <input type='hidden' name='id_bioskop' value='" . $row['id_bioskop'] . "'>
                    <input type='text' name='nama_bioskop' value='" . $row['nama_bioskop'] . "' class='mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' required>
                    <textarea name='alamat' class='mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' required>" . $row['alamat'] . "</textarea>
                    <input type='text' name='no_telpon' value='" . $row['no_telpon'] . "' class='mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' required>
                    <input type='file' name='poster' class='mt-1 block w-full text-gray-300'>
                    <input type='text' name='kota' value='" . $row['kota'] . "' class='mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' required>
                    <button type='submit' class='w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>Update</button>
                </form>
            </li>";

            // Form dan daftar studio
            $studios = viewAllStudio($row['id_bioskop']);
            echo "<li id='studios-" . $row['id_bioskop'] . "' class='hidden bg-gray-700 p-4 rounded-md'>
                <h2 class='text-2xl font-bold mb-4'>Daftar Studio</h2>
                <ul class='space-y-2'>";
            while ($studio = $studios->fetch_assoc()) {
                echo "<li class='bg-gray-800 p-4 rounded-md flex justify-between items-center'>
                    <div>
                        <p class='text-lg font-semibold'>" . $studio['kode_studio'] . "</p>
                    </div>
                    <div class='flex space-x-2'>
                        <button onclick='toggleUpdateStudioForm(" . $studio['id_studio'] . ")' class='px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600'>Update</button>
                        <form method='POST' action='' class='inline-block'>
                            <input type='hidden' name='id_studio' value='" . $studio['id_studio'] . "'>
                            <input type='hidden' name='action' value='deleteStudio'>
                            <button type='submit' class='px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600'>Delete</button>
                        </form>
                    </div>
                </li>";

                // Form update studio
                echo "<li id='update-studio-" . $studio['id_studio'] . "' class='hidden bg-gray-700 p-4 rounded-md'>
                    <form method='POST' action='' enctype='multipart/form-data' class='space-y-4'>
                        <input type='hidden' name='action' value='updateStudio'>
                        <input type='hidden' name='id_studio' value='" . $studio['id_studio'] . "'>
                        <input type='text' name='kode_studio' value='" . $studio['kode_studio'] . "' class='mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' required>
                        <button type='submit' class='w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>Update Studio</button>
                    </form>
                </li>";
            }
            echo "</ul>";

            // Form tambah studio
            echo "<h2 class='text-2xl font-bold mt-8 mb-4'>Tambah Studio</h2>
                <form method='POST' action='' enctype='multipart/form-data' class='space-y-4'>
                    <input type='hidden' name='action' value='addStudio'>
                    <input type='hidden' name='id_bioskop' value='" . $row['id_bioskop'] . "'>
                    <input type='text' name='kode_studio' class='mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' required>
                    <button type='submit' class='w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>Tambah Studio</button>
                </form>
            </li>";
        }
        ?>
    </ul>
</div>

<script>
    function toggleUpdateForm(id) {
        var updateForm = document.getElementById('update-' + id);
        updateForm.classList.toggle('hidden');
    }

    function toggleStudioList(id) {
        var studioList = document.getElementById('studios-' + id);
        studioList.classList.toggle('hidden');
    }

    function toggleUpdateStudioForm(id) {
        var updateStudioForm = document.getElementById('update-studio-' + id);
        updateStudioForm.classList.toggle('hidden');
    }

    // Notification auto-dismiss after 3 seconds
    setTimeout(function() {
        var errorMessage = document.getElementById('error-message');
        var successMessage = document.getElementById('success-message');
        if (errorMessage) errorMessage.style.display = 'none';
        if (successMessage) successMessage.style.display = 'none';
    }, 3000);
</script>

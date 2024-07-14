<?php
include_once 'controller/controllerStudio.php';

$error_message = '';
$success_message = '';

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action == 'create') {
        $nama_studio = $_POST['nama_studio'] ?? '';
        $kapasitas = $_POST['kapasitas'] ?? '';

        $result = createStudio($nama_studio, $kapasitas);

        if ($result === true) {
            $success_message = "Studio berhasil ditambahkan.";
        } else {
            $error_message = $result;
        }
    } elseif ($action == 'delete') {
        $id_studio = $_POST['id_studio'] ?? '';

        $result = deleteStudio($id_studio);

        if ($result === true) {
            $success_message = "Studio berhasil dihapus.";
        } else {
            $error_message = $result;
        }
    }
}

// Fetch studios for listing
$studios = getAllStudio();
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-3xl font-bold mb-4">Tambah Studio</h1>

    <!-- Error and success messages -->
    <?php if ($error_message) : ?>
        <div class="bg-red-500 text-white p-4 rounded mb-4"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <?php if ($success_message) : ?>
        <div class="bg-green-500 text-white p-4 rounded mb-4"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <!-- Form to add studio -->
    <form method="POST" action="" class="space-y-4">
        <input type="hidden" name="action" value="create">
        <!-- Form fields -->
        <div>
            <label for="nama_studio" class="block text-sm font-medium text-gray-300">Nama Studio:</label>
            <input type="text" name="nama_studio" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <div>
            <label for="kapasitas" class="block text-sm font-medium text-gray-300">Kapasitas:</label>
            <input type="text" name="kapasitas" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>
        <!-- Submit button -->
        <div>
            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tambah</button>
        </div>
    </form>

    <!-- List of studios -->
    <h1 class="text-3xl font-bold mt-8 mb-4">Daftar Studio</h1>
    <ul class="space-y-4">
        <?php while ($row = $studios->fetch_assoc()) : ?>
            <li class="bg-gray-800 p-4 rounded-md flex justify-between items-center">
                <div>
                    <p class="text-lg font-semibold"><?php echo $row['nama_studio']; ?></p>
                    <p class="text-gray-400"><?php echo $row['kapasitas']; ?></p>
                </div>
                <div class="flex space-x-2">
                    <form method="POST" action="" class="inline-block">
                        <input type="hidden" name="id_studio" value="<?php echo $row['id_studio']; ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
                    </form>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

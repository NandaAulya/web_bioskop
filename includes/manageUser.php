<?php
include_once 'controller/controllerUser.php';

$error_message = '';
$success_message = '';

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';

if ($action == 'update') {
        $id_user = $_POST['id_user'] ?? '';
        $role = $_POST['role'] ?? '';

        $result = updateUserRole($id_user, $role);

        if ($result == true) {
            $success_message = "Data pengguna berhasil diperbarui.";
        } else {
            $error_message = $result;
        }
    } elseif ($action == 'delete') {
        $id_user = $_POST['id_user'] ?? '';

        $result = deleteUser($id_user);

        if ($result == true) {
            $success_message = "User berhasil dihapus.";
        } else {
            $error_message = $result;
        }
    }
}

// Fetch users for listing
$users = getAllUser();
?>

<!-- HTML code -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <?php if ($error_message) : ?>
        <div class="bg-red-500 text-white p-4 rounded mb-4"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <?php if ($success_message) : ?>
        <div class="bg-green-500 text-white p-4 rounded mb-4"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <!-- List of users -->
    <h1 class="text-3xl font-bold mt-8 mb-4">Daftar Pengguna</h1>
    <ul class="space-y-4">
        <?php while ($row = $users->fetch_assoc()) : ?>
            <li class="bg-gray-800 p-4 rounded-md flex justify-between items-center">
                <div>
                    <p class="text-lg font-semibold"><?php echo $row['username']; ?></p>
                    <p class="text-lg font-semibold"><?php echo $row['email']; ?></p>
                    <p class="text-gray-400"><?php echo $row['role']; ?></p>
                </div>
                <div class="flex space-x-2">
                    <button onclick="document.getElementById('update-<?php echo $row['id_user']; ?>').classList.toggle('hidden');" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update</button>
                    <form method="POST" action="" class="inline-block">
                        <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
                    </form>
                </div>
            </li>
            <li id="update-<?php echo $row['id_user']; ?>" class="hidden bg-gray-700 p-4 rounded-md">
                <form method="POST" action="" class="space-y-4">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                    <!-- Form fields with current values -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-300">Username:</label>
                        <input type="text" name="username" value="<?php echo $row['username']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required readonly>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email:</label>
                        <input type="email" name="email" value="<?php echo $row['email']; ?>" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required readonly>
                    </div>
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-300">Role:</label>
                        <select name="role" class="mt-1 p-2 block w-full bg-gray-800 border border-gray-600 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <option value="admin" <?php echo ($row['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                            <option value="client" <?php echo ($row['role'] == 'client') ? 'selected' : ''; ?>>Client</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                    </div>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <?php $title = "Admin" ?>
    <?php include "config/config.php" ?>
    <?php
    include "controller/controllerUser.php";
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        header("Location: auth/login.php");
        exit();
    }
    ?>
</head>
<body class="bg-gray-200">
    <div class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4 border-b border-gray-700">
                <img class="h-10 w-10 rounded-full mx-auto border-2 border-gray-500" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2o1bk_gkv4AThueOSDDfXY5hkFQNh7vxTvqS_LJvYhTWVA26yhorL5mWb9KfZKe5Eo3g&usqp=CAU" alt="Admin Avatar">
                <h2 class="mt-4 text-center text-xl font-bold">Admin Dashboard</h2>
            </div>
            <nav class="mt-6 space-y-1">
                <a href="?page=includes/manageFilm" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Kelola Film</a>
                <a href="?page=includes/manageBioskop" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Kelola Bioskop</a>
                <a href="?page=includes/manageStudio" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Kelola Penayangan</a>
                <a href="?page=includes/manageUser" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Kelola Pengguna</a>
                <a href="?page=includes/managePenayangan" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Kelola Pengguna</a>
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-gray-900">
                <div class="flex items-center">
                    <h1 class="text-2xl font-semibold text-gray-700">Selamat Datang, <?php echo $_SESSION['full_name']; ?>!</h1>
                </div>
                <div class="flex items-center">
                    <a href="auth/login.php" class="text-gray-700 hover:text-gray-900">
                        <span class="font-medium">Logout</span>
                    </a>
                </div>
            </header>

            <!-- Main content area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-900 text-white p-8">
                <?php
                // Include the content based on the current page
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    include($page . '.php');
                }
                ?>
            </main>
        </div>
    </div>
    <script>
        function setActive(path) {
            const isActive = window.location.pathname.includes(path);
            return isActive ? 'bg-gray-700 text-[#ebebf8] hover:bg-[#c65482] hover:text-white rounded-md px-3 py-2 text-sm font-medium sm:text-base' : 'text-gray-100 hover:text-white rounded-md px-3 py-2 text-sm font-medium sm:text-base';
        }

        const menuLinks = document.querySelectorAll('.menu-link');
        menuLinks.forEach((link) => {
            const path = link.getAttribute('href');
            link.className = setActive(path);
        });
    </script>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <?php include 'config/config.php';?>
</head>

<body class="bg-white">
    <div id="profile-view" class="profile-section">
        <div class="flex flex-col items-center mt-5">
            <h1 class="text-center mb-2">My Profile</h1>
            <div class="relative">
                <img src="Akun.jpeg" id="profile-image" alt=""
                    class="w-36 h-36 rounded-full border-0 border-white shadow-lg object-cover">
                <button class="absolute bottom-0 right-0 bg-white border-0 border-gray-100 rounded-full p-4"
                    onclick="document.getElementById('file-input').click()">
                    <i class="fas fa-camera text-gray-700"></i>
                </button>
                <input type="file" id="file-input" accept="image/*" class="hidden" onchange="uploadProfilePicture()">
            </div>
            <div id="profile-name" class="mt-4 text-center"><?php echo $_SESSION['full_name']; ?></div>
        </div>
        <form class="mt-6 w-80 mx-auto space-y-4">
            <div>
                <label for="username-view" class="block">Username:</label>
                <input type="text" id="username-view" name="username" value="<?php echo $_SESSION['username']; ?>"
                    class="w-full p-2 border border-gray-400 rounded-full" readonly>
            </div>
            <div>
                <label for="email-view" class="block">Email ID:</label>
                <input type="email" id="email-view" name="email" value="<?php echo $_SESSION['email']; ?>"
                    class="w-full p-2 border border-gray-400 rounded-full" readonly>
            </div>
            <div>
                <label for="pass-view" class="block">Password:</label>
                <input type="password" id="pass-view" name="pass" value="******"
                    class="w-full p-2 border border-gray-400 rounded-full" readonly>
            </div>
            <div class="flex justify-between">
                <button type="button" onclick="logout()"
                    class="bg-red-500 text-white py-2 px-4 rounded-full">LOGOUT</button>
                <button type="button" onclick="showUpdateProfile()"
                    class="bg-blue-500 text-white py-2 px-4 rounded-full">UPDATE PROFILE</button>
            </div>
        </form>
    </div>

    <div id="profile-update" class="profile-section hidden mt-5 w-80 mx-auto">
        <h1 class="text-center mb-4">Update Profile</h1>
        <form id="settings-form" class="space-y-4">
            <div>
                <label for="username" class="block">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>"
                    class="w-full p-2 border border-gray-400 rounded-full">
            </div>
            <div>
                <label for="email" class="block">Email ID:</label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>"
                    class="w-full p-2 border border-gray-400 rounded-full">
            </div>
            <div>
                <label for="pass" class="block">Password:</label>
                <input type="password" id="pass" name="pass" value="******"
                    class="w-full p-2 border border-gray-400 rounded-full">
            </div>
            <div class="flex justify-between">
                <button type="button" onclick="saveProfile()"
                    class="bg-blue-500 text-white py-2 px-4 rounded-full">Update</button>
                <button type="button" onclick="cancelUpdate()"
                    class="bg-gray-500 text-white py-2 px-4 rounded-full">Cancel</button>
            </div>
        </form>
    </div>

    <script><?php include 'assets/js/updateProfile.js' ?></script>
</body>

</html>

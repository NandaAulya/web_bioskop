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
            <div id="profile-name" class="mt-4 text-center">masukin nama user nya di sini</div>
        </div>
        <form class="mt-6 w-80 mx-auto space-y-4">
            <div>
                <label for="username-view" class="block">Username:</label>
                <input type="text" id="username-view" name="username" value=""
                    class="w-full p-2 border border-gray-400 rounded-full">
            </div>
            <div>
                <label for="email-view" class="block">Email ID:</label>
                <input type="email" id="email-view" name="email" value=""
                    class="w-full p-2 border border-gray-400 rounded-full">
            </div>
            <div>
                <label for="jk-view" class="block">Jenis Kelamin:</label>
                <input type="text" id="jk-view" name="jk" class="w-full p-2 border border-gray-400 rounded-full">
            </div>
            <div>
                <label for="pass-view" class="block">Password:</label>
                <input type="password" id="pass-view" name="pass" value=""
                    class="w-full p-2 border border-gray-400 rounded-full">
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
                <input type="text" id="username" name="username" value=""
                    class="w-full p-2 border border-gray-400 rounded-full">
            </div>
            <div>
                <label for="email" class="block">Email ID:</label>
                <input type="email" id="email" name="email" value=""
                    class="w-full p-2 border border-gray-400 rounded-full">
            </div>
            <div>
                <label for="jk" class="block">Jenis Kelamin:</label>
                <input type="text" id="jk" name="jk" value="" class="w-full p-2 border border-gray-400 rounded-full">
            </div>
            <div>
                <label for="pass" class="block">Password:</label>
                <input type="password" id="pass" name="pass" value=""
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

    <script>
        window.onload = function () {
            const savedData = JSON.parse(localStorage.getItem('profileData'));
            if (savedData) {
                document.getElementById('username-view').value = savedData.username;
                document.getElementById('email-view').value = savedData.email;
                document.getElementById('jk-view').value = savedData.jk;
                document.getElementById('pass-view').value = savedData.pass;
            }
        };

        function showUpdateProfile() {
            document.getElementById('profile-view').classList.add('hidden');
            document.getElementById('profile-update').classList.remove('hidden');
        }

        function cancelUpdate() {
            document.getElementById('profile-view').classList.remove('hidden');
            document.getElementById('profile-update').classList.add('hidden');
        }

        function saveProfile() {
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const jk = document.getElementById('jk').value;
            const pass = document.getElementById('pass').value;

            const profileData = {
                username: username,
                email: email,
                jk: jk,
                pass: pass
            };

            localStorage.setItem('profileData', JSON.stringify(profileData));
            alert('Profile updated successfully!');

            document.getElementById('username-view').value = username;
            document.getElementById('email-view').value = email;
            document.getElementById('jk-view').value = jk;
            document.getElementById('pass-view').value = pass;

            cancelUpdate();
        }

        function logout() {
            alert('Logged out successfully!');
        }

        function uploadProfilePicture() {
            const fileInput = document.getElementById('file-input');
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('profile-image').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
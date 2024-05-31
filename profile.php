<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#1d3737] text-white flex flex-col justify-center items-center h-screen">
    <div class="profile-picture text-center mb-5">
        <h1 class="capitalize text-center">my profile</h1>
        <img src="upin comel.jpg" id="profile-image" class="w-36 h-36 rounded-full mx-auto mt-5">
        <label for="file-input" class="block mt-5">
            <input type="file" id="file-input" accept="image/*" class="mt-3 block mx-auto"
                onchange="previewImage(event)">
        </label>
    </div>
    <form class="flex flex-col items-center w-80">
        <label for="nama lengkap" class="mt-2 font-bold w-full text-left">nama lengkap:</label>
        <input type="text" id="nama lengkap" name="nama lengkap" class="p-2 border border-gray-300 rounded w-full">

        <label for="username" class="mt-2 font-bold w-full text-left">Username:</label>
        <input type="text" id="username" name="username" class="p-2 border border-gray-300 rounded w-full">

        <label for="email" class="mt-2 font-bold w-full text-left">Email ID:</label>
        <input type="email" id="email" name="email" class="p-2 border border-gray-300 rounded w-full">

        <label for="phone" class="mt-2 font-bold w-full text-left">nomor handpone:</label>
        <input type="tel" id="phone" name="phone" class="p-2 border border-gray-300 rounded w-full">

        <label for="alamat" class="mt-2 font-bold w-full text-left">alamat:</label>
        <input type="text" id="alamat" name="alamat" class="p-2 border border-gray-300 rounded w-full">

        <label for="jk" class="mt-2 font-bold w-full text-left">jenis kelamin:</label>
        <input type="text" id="jk" name="jk" class="p-2 border border-gray-300 rounded w-full">

        <label for="pass" class="mt-2 font-bold w-full text-left">Password:</label>
        <input type="password" id="pass" name="pass" class="p-2 border border-gray-300 rounded w-full">

        <button type="submit"
            class="bg-transparent text-white py-2 px-4 rounded mt-3 hover:bg-[#153d68]">Simpan</button>
    </form>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('profile-image');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
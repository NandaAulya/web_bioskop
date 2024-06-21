<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $title = "Register";
    include "../config/config.php";
    include "../controller/controllerUser.php";

    $error_message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['logout'])){
            session_unset();
            session_destroy();
            header("Location: ../index.php");
        } else{
            $email = $_POST['email'];
            $password = $_POST['password'];

            $result = login($email, $password);

            // Periksa hasil login
            if (is_array($result)) {
                // Jika berhasil, simpan informasi pengguna ke session dan redirect
                $_SESSION['user_id'] = $result['id_user'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['full_name'] = $result['full_name'];
                $_SESSION['role'] = $result['role'];
                if ($result['role'] == 'admin') {
                    header("Location: dasbordAdmin.php");
                } else {
                    header("Location: ../index.php");
                }
                exit();
            } else {
                // Jika gagal, tampilkan pesan kesalahan
                $error_message = $result;
            }
        }
    }
    ?>
</head>

<body class="flex justify-center items-center min-h-screen bg-cover bg-center" style="background-image: url('bg.jpg');">
    <div class="w-96 bg-transparent border-2 border-white/20 backdrop-filter backdrop-blur-lg text-pink-500 rounded-lg p-8">
        <?php if (isset($error_message) && !empty($error_message)) : ?>
            <div class="text-red-500 mb-4 text-center"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form id="loginForm" method="POST">
            <h1 class="text-3xl text-center mb-8">Login</h1>
            <div class="relative mb-6">
                <input id="email" name="email" type="email" placeholder="Email" required class="w-full h-12 bg-transparent border-2 border-black/20 rounded-full text-blue-500 px-4 focus:outline-none placeholder-blue-300">
                <i class='bx bxs-user absolute right-4 top-3 text-blue-300'></i>
            </div>
            <div class="relative mb-6">
                <input id="password" name="password" type="password" placeholder="Password" required class="w-full h-12 bg-transparent border-2 border-black/20 rounded-full text-blue-500 px-4 focus:outline-none placeholder-blue-300">
                <i class='bx bxs-lock-alt absolute right-4 top-3 text-blue-300'></i>
            </div>
            <div class="flex items-center mb-6">
                <input type="checkbox" id="show-password" class="mr-2">
                <label for="show-password" class="text-blue-500">Show Password</label>
            </div>
            <button type="submit" class="w-full h-12 bg-blue-500 text-white rounded-full shadow-md font-semibold">Login</button>
            <div class="text-center mt-6">
                <p>Don't have an account? <a href="regist.php" class="text-blue-500 font-semibold">Register</a></p>
            </div>
        </form>
    </div>

    <!-- Include JavaScript files here -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loginForm = document.getElementById('loginForm');
            const password = document.getElementById('password');
            const showPassword = document.getElementById('show-password');

            loginForm.addEventListener('submit', (event) => {
                // Validasi formulir di sini jika diperlukan

                // Contoh: Memeriksa apakah password sama dengan konfirmasi password
                // if (password.value !== confirmPassword.value) {
                //     event.preventDefault();
                //     alert('Passwords do not match. Please try again.');
                // }
            });

            showPassword.addEventListener('change', (event) => {
                const type = event.target.checked ? 'text' : 'password';
                password.type = type;
            });
        });
    </script>
</body>

</html>
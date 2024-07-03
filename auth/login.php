<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $title = "Login";
    include "../config/config.php";
    include "../controller/controllerUser.php";

    $error_message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['logout'])) {
            session_unset();
            session_destroy();
            header("Location: ../index.php");
        } else {
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

<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-[500px] h-[500px] bg-white text-pink-500 rounded-2xl p-10 shadow-lg">
        <?php if (isset($error_message) && !empty($error_message)) : ?>
            <div class="text-red-500 mb-4 text-center"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form id="loginForm" method="POST">
            <h1 class="text-6xl font-bold font-poppins text-[#9398e0] text-center mt-10">Login</h1>
            <div class="relative mb-8 mt-20">
                <input id="email" name="email" type="email" placeholder="Email" required class="w-full h-14 bg-transparent border-2 border-black/20 rounded-full font-poppins text-xl text-[#9398e0] px-4 focus:outline-none placeholder-blue-300">
                <i class='bx bxs-user absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl text-blue-300'></i>
            </div>
            <div class="relative mb-8">
                <input id="password" name="password" type="password" placeholder="Password" required class="w-full h-14 bg-transparent border-2 border-black/20 rounded-full text-xl text-[#9398e0] font-poppins px-4 focus:outline-none placeholder-blue-300">
                <i class='bx bxs-lock-alt absolute right-4 top-1/2 transform -translate-y-1/2 text-2xl text-blue-300'></i>
            </div>
            <div class="flex items-center mb-8">
                <input type="checkbox" id="show-password" class="mr-2">
                <label for="show-password" class="text-xl text-[#9398e0]">Show Password</label>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="w-[170px] h-12 text-white rounded-full shadow-md font-semibold text-xl" style="background-color: #9398e0">Login</button>
            </div>
            <div class="text-center mt-8">
                <p class="text-lg text-[#9398e0]">Don't have an account? <a href="register.php" class="text-[#c63a8d] font-semibold">Register</a></p>
            </div>
        </form>
    </div>

    <!-- Include JavaScript files here -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const password = document.getElementById('password');
            const showPassword = document.getElementById('show-password');

            showPassword.addEventListener('change', (event) => {
                const type = event.target.checked ? 'text' : 'password';
                password.type = type;
            });
        });
    </script>
</body>

</html>

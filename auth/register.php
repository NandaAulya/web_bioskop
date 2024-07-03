<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $title = "Register" ?>
    <?php include "../config/config.php" ?>
    <?php
    include "../controller/controllerUser.php";
    $error_message = NULL;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["username"];
        $email = $_POST["email"];
        $full_name = $_POST["full_name"];
        $password = $_POST["password"];
        $password_confirm = $_POST["confirm_password"];

        $result = registerUser($name, $email, $full_name, $password, $password_confirm);

        if ($result === true) {
            header("Location: login.php");
            exit();
        } else {
            $error_message = $result;
        }
    }
    ?>
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-[500px] h-[550px] bg-white text-pink-500 rounded-2xl p-10 shadow-lg">
        <?php if (isset($error_message) && !empty($error_message)) : ?>
            <div class="text-red-500 mb-4 text-center"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form id="registerForm" method="POST">
            <h1 class="text-6xl font-bold font-poppins text-[#9398e0] text-center mb-10">Register</h1>
            <div class="relative mb-6">
                <input id="email" name="email" type="email" placeholder="Email" required class="w-full h-12 bg-transparent border-2 border-black/20 rounded-full text-blue-500 px-4 focus:outline-none placeholder-blue-300">
                <i class='bx bxs-user absolute right-4 top-4 text-blue-300'></i>
            </div>
            <div class="relative mb-6">
                <input id="username" name="username" type="text" placeholder="Username" required class="w-full h-12 bg-transparent border-2 border-black/20 rounded-full text-blue-500 px-4 focus:outline-none placeholder-blue-300">
                <i class='bx bxs-user absolute right-4 top-4 text-blue-300'></i>
            </div>
            <div class="relative mb-6">
                <input id="full_name" name="full_name" type="text" placeholder="Full Name" required class="w-full h-12 bg-transparent border-2 border-black/20 rounded-full text-blue-500 px-4 focus:outline-none placeholder-blue-300">
                <i class='bx bxs-user absolute right-4 top-4 text-blue-300'></i>
            </div>
            <div class="relative mb-6">
                <input id="password" name="password" type="password" placeholder="Password" required class="w-full h-12 bg-transparent border-2 border-black/20 rounded-full text-blue-500 px-4 focus:outline-none placeholder-blue-300">
                <i class='bx bxs-lock-alt absolute right-4 top-4 text-blue-300'></i>
            </div>
            <div class="relative mb-6">
                <input id="confirm-password" name="confirm_password" type="password" placeholder="Confirm Password" required class="w-full h-12 bg-transparent border-2 border-black/20 rounded-full text-blue-500 px-4 focus:outline-none placeholder-blue-300">
                <i class='bx bxs-lock-alt absolute right-4 top-4 text-blue-300'></i>
            </div>
            <div class="flex items-center mb-6">
                <input type="checkbox" id="show-password" class="mr-2">
                <label for="show-password" class="text-blue-500">Show Password</label>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="w-[170px] h-12 text-white rounded-full shadow-md font-semibold text-xl" style="background-color: #9398e0">Register</button>
            </div>
            <div class="text-center mt-6">
                <p>Already have an account? <a href="login.php" class="text-blue-500 font-semibold">Login</a></p>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const registerForm = document.getElementById('registerForm');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm-password');
            const showPassword = document.getElementById('show-password');

            registerForm.addEventListener('submit', (event) => {
                if (password.value !== confirmPassword.value) {
                    event.preventDefault();
                    alert('Passwords do not match. Please try again.');
                }
            });

            showPassword.addEventListener('change', (event) => {
                const type = event.target.checked ? 'text' : 'password';
                password.type = type;
                confirmPassword.type = type;
            });
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form id="registerForm">
            <h1>Register</h1>
            <div class="input-box">
                <input id="email" type="email" placeholder="Email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input id="username" type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input id="password" type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Register</button>
            <div class="register-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const registerForm = document.getElementById('registerForm');

            registerForm.addEventListener('submit', (event) => {
                event.preventDefault();

                const email = document.getElementById('email').value;
                const username = document.getElementById('username').value;
                const password = document.getElementById('password').value;

                // Simpan data pengguna baru ke localStorage
                const newUser = {
                    email,
                    username,
                    password
                };
                
                localStorage.setItem('users', JSON.stringify(newUser));

                alert('Registration successful!');
                window.location.href = 'login.php'; // Redirect ke halaman login setelah registrasi sukses
            });
        });
    </script>
</body>

</html>
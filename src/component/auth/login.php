<!-- login.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <div class="wrapper">
        <form id="loginForm">
            <h1>Login</h1>
            <div class="input-box">
                <input id="username" type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input id="password" type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="regist.php">Register</a></p>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loginForm = document.getElementById('loginForm');

            loginForm.addEventListener('submit', (event) => {
                event.preventDefault();

                const username = document.getElementById('username').value;
                const password = document.getElementById('password').value;

                // Ambil data pengguna dari localStorage
                const users = JSON.parse(localStorage.getItem('users')) || [];

                if (users.username == username && users.password == password) {
                    alert('Login successful!');
                    localStorage.setItem('loggedIn', true);
                    localStorage.setItem('username', username);
                    window.location.href = '../../../playing.php'; // Redirect ke halaman dashboard setelah login sukses
                } else {
                    alert('Invalid username or password. Please try again.');
                }
            });
        });
    </script>
</body>

</html>
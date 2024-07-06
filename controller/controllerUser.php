<?php
include_once 'Database.php';

$db = Database::getInstance();

function registerUser($name, $email, $fullname, $password, $password_confirm)
{
    global $db;
    $emailCheck = $db->query("SELECT * FROM user WHERE email = ?" , [$email]);

    if ($emailCheck && $emailCheck->num_rows > 0) {
        return "email telah terdaftar";
    }

    if ($password === $password_confirm) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username, email, full_name, password) VALUES (?, ?, ?, ?)";

        $result = $db->query($query, [$name, $email, $fullname, $hashed_password]);

        if (!$result) {
            return "Error: Unable to register user."; // Tangani kesalahan eksekusi
        }
    } else {
        return "Password dan password konfirmasi tidak sesuai .";
    }
}

function login($email, $password){
    global $db;

    // Persiapkan kueri untuk mendapatkan pengguna berdasarkan username
    $query = "SELECT * FROM user WHERE email = ?";
    $result = $db->query($query, [$email]);

    // Periksa apakah pengguna ditemukan
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi kata sandi
        if (password_verify($password, $user['password'])) {
            // Jika kata sandi cocok, kembalikan data pengguna
            return $user;
        } else {
            // Jika kata sandi tidak cocok, kembalikan pesan kesalahan
            return "Password salah.";
        }
    } else {
        // Jika pengguna tidak ditemukan, kembalikan pesan kesalahan
        return "Pengguna tidak ditemukan.";
    }
}

?>
<?php
include 'Database.php';

$db = new Database();

function registerUser($name, $email, $fullname, $password, $password_confirm)
{
    global $db;
    $conn = $db->connect();
    $emailCheck = $db->query("SELECT * FROM user WHERE email = ?", [$email]);

    if ($emailCheck && $emailCheck->num_rows > 0) {
        return "email telah terdaftar";
    }

    if ($password === $password_confirm) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = 'client';
        $query = "INSERT INTO user (username, email, full_name, password, role) VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query); // Persiapkan statement
        $stmt->bind_param("sssss", $name, $email, $fullname, $hashed_password, $role); // Binding parameter

        if ($stmt->execute()) { // Eksekusi statement
            $stmt->close(); // Tutup statement
            return true;
        } else {
            return "Error: " . $conn->error; // Tangani kesalahan eksekusi
        }
    } else {
        return "Password dan password konfirmasi tidak sesuai .";
    }
}

function login($email, $password){
    global $db;
    $conn = $db->connect();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Persiapkan kueri untuk mendapatkan pengguna berdasarkan username
    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah pengguna ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi kata sandi
        if (password_verify($hashed_password, $user['password'])) {
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
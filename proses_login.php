<?php
session_start(); // Memulai session
include 'koneksi.php'; // Menghubungkan ke database

// Mengambil data dari form
$username = $_POST['username'];
$password = $_POST['password']; // Di sini password adalah NIM

// Mencegah SQL Injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Mencari user di database
$query = "SELECT * FROM users WHERE username='$username' AND nim='$password'";
$result = mysqli_query($conn, $query);

// Cek apakah user ditemukan
if (mysqli_num_rows($result) > 0) {
    // Jika login berhasil
    $user_data = mysqli_fetch_assoc($result);

    // Simpan data ke session
    $_SESSION['username'] = $user_data['username'];
    $_SESSION['nama_lengkap'] = $user_data['nama_lengkap'];
    $_SESSION['login_status'] = true;

    // Cek "Remember Me"
    if (isset($_POST['remember'])) {
        // Buat cookie (contoh: berlaku selama 7 hari)
        setcookie('user_login', $username, time() + (86400 * 7), "/"); // 86400 = 1 hari
    }

    // Arahkan ke halaman portofolio
    header("Location: index.php");
    exit();

} else {
    // Jika login gagal
    // Arahkan kembali ke halaman login dengan pesan error
    header("Location: login.php?error=1");
    exit();
}
?>
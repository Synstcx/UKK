<?php
session_start();
include 'koneksi.php' ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $status   = mysqli_real_escape_string($koneksi, $_POST['status']);

    $query = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password' AND status='$status'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = $status;
        header("Location: input.php");
        exit();
    } else {
        echo "<script>alert('Login gagal! Periksa kembali username, password, atau peran.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="stylesheet" href="loginn.css">
</head>
<body>
    <div class="login-container">
        <form class="login-box" method="POST" action="">
            <img src="LogoRPL.jpeg" alt="Logo RPL" class="logo">
            <p class="subtitle">Mulai Akses Akun User</p>
            <h2>Login User</h2>

            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            <select name="status" required>
                <option value="">-- Pilih Peran --</option>
                <option value="siswa">Siswa</option>
                <option value="guru">Guru</option>
            </select>

            <button type="submit" class="btn-login">Login</button>

            <p class="register-text">Apakah Anda Belum Membuat Akun User?</p>
            <a href="register.php" class="btn-register">Buat Akun User</a>
            <br><br>
            <a href="utama.php">Kembali ke Home</a>
        </form>
    </div>
</body>
</html>
<?php
include 'koneksi.php' ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $status   = $_POST["status"];

  // Upload foto
  $foto = $_FILES["foto"];
  $ext  = strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));
  $size = $foto["size"];
  $tmp  = $foto["tmp_name"];
  $allowed = ["jpg", "jpeg", "png"];

  if (in_array($ext, $allowed) && $size <= 2097152) {
    $namafile = uniqid() . "." . $ext;
    move_uploaded_file($tmp, "uploads/$namafile");

    $query = "INSERT INTO tbl_user (username, password, foto, status) 
              VALUES ('$username', '$password', '$namafile', '$status')";
              
    if (mysqli_query($koneksi, $query)) {
      echo "<script>alert('Berhasil daftar'); window.location='login.php';</script>";
    } else {
      echo "Gagal: " . mysqli_error($koneksi);
    }
  } else {
    echo "<script>alert('File harus JPG/PNG dan maksimal 2MB');</script>";
  }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
</head>
<body>
    <header class="main-header">
        <div class="logo-rpl">
            <img src="LogoRPL.jpeg" alt="">
            <h2>Register User</h2>
        </div>
    <nav><a href="login.php">Home</a></nav>
    </header>

<div class="register-wrapper">
    <form class="register-form" action="" 
    method="POST" enctype="multipart/form-data">
    <h2>Register User</h2>

    <label for="username">Username</label>
    <input type="text" name="username" id="username" placeholder="Username" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Password" required>

    <label for="foto">Foto</label>
    <input type="file" name="foto" id="foto" accept="image/png, image/jpeg">
    <small>PNG, JPEG 2mb</small>

    <label for="status">Status</label>
    <select name="status" id="">
        <option value="">-- Pilih --</option>
        <option value="siswa">Siswa</option>
        <option value="guru">Guru</option>
    </select>

    <button class="register-btn">Register</button>

    </form>
</div>

<footer>
    &copy; UKK Tahun Pelajaran 2024/2025
</footer>

</body>
</html>
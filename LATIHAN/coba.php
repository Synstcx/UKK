<?php
//session_start();
//include 'koneksi.php' ;

//if ($_SERVER("REQUEST_METHOD") == "POST" ) {
  //  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  //  $password = mysqli_real_escape_string($koneksi, $_POST['password']);
  //  $status   = mysqli_real_escape_string($koneksi, $_POST['status']);

    //$query = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password' AND status='$status'";
    //$result = mysqli_query($koneksi, $query);

    //if (mysqli_num_rows($result) == 1 ) {
    //    $_SESSION['username'] = $username;
    //    $_SESSION['password'] = $password;
    //    header("Location: input.php ");
    //    exit();
    //} else {
    //    echo "<script>alert('Login Gagal! Periksa kembali Username, Password, dan Status //kembali!');</script>";
    //}
//}




if ($_SERVER("REQUEST_METHOD") == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);

    $query = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password' AND status='$status'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1 ) {
        $_session = ['username'] = $username;
        $_session = ['password'] = $password;
        $_session = ['status'] = $status;
        header("Location: kodok.php");
        exit();
    } else {
        echo "<script>alert('Login Gagal! Periksa kembali Username, Password atau status kembali!');</script>";
    }
}

?>
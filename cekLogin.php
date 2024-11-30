<?php
session_start();
include 'function/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);


    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $data['password'];
    $_SESSION['no_hp'] = $data['no_hp'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['alamat'] = $data['alamat'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['status'] = $data['status'];

    header("location:pages/dashboard.php");
} else {
    echo "<script>
            alert('Username atau Password salah!');
            window.location.href = 'login.php';
          </script>";
}

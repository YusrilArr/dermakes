<?php
session_start();
include("../function/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_SESSION['id_user'];

    // Ambil data dari form
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $alamat_detail = $_POST['alamat_detail'];

    // Update tabel users
    $query1 = "UPDATE users 
               SET username = '$username', nama = '$nama', no_hp = '$no_hp', email = '$email'
               WHERE id_user = '$id_user'";

    // Mengecek apakah pengguna sudah memiliki alamat
    $query_check = "SELECT id_user FROM alamat_users WHERE id_user = '$id_user'";
    $result_check = mysqli_query($koneksi, $query_check);

    // Cek apakah ada data alamat_user untuk id_user
    if (mysqli_num_rows($result_check) > 0) {
        // Jika alamat sudah ada, lakukan update
        $query2 = "UPDATE alamat_users 
                   SET kota = '$kota', kecamatan = '$kecamatan', alamat_detail = '$alamat_detail'
                   WHERE id_user = '$id_user'";
    } else {
        // Jika alamat belum ada, lakukan insert
        $query2 = "INSERT INTO alamat_users (kota, kecamatan, alamat_detail, id_user) 
                   VALUES ('$kota', '$kecamatan', '$alamat_detail', '$id_user')";
    }

    // Eksekusi kedua query
    if (mysqli_query($koneksi, $query1) && mysqli_query($koneksi, $query2)) {
        // Redirect ke halaman profile dengan pesan sukses
        header("Location: ../pages/profile.php?status=success");
    } else {
        // Redirect ke halaman profile dengan pesan error
        header("Location: ../pages/profile.php?status=error");
    }
}

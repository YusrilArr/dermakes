<?php
include '../function/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $satuan = $_POST['satuan'];
    $stock = $_POST['stock'];
    $pic = $_FILES['pic'];

    $upload_dir = '../images/srcItems/';
    $upload_file = $upload_dir . basename($pic['name']);
    $file_type = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));

    $allowed_types = ['jpg', 'jpeg', 'png'];
    if (!in_array($file_type, $allowed_types)) {
        die('Format file tidak valid. Hanya JPG, JPEG, dan PNG yang diperbolehkan.');
    }

    if ($pic['size'] > 2 * 1024 * 1024) {
        die('Ukuran file terlalu besar. Maksimal 2MB.');
    }

    if (!move_uploaded_file($pic['tmp_name'], $upload_file)) {
        die('Gagal mengunggah gambar.');
    }

    $pic_path = 'images/srcItems/' . basename($pic['name']);

    $query = "INSERT INTO barang (nama_barang, harga, satuan, stock, pic) 
              VALUES ('$nama_barang', '$harga_barang', '$satuan', '$stock', '$pic_path')";

    if (mysqli_query($koneksi, $query)) {
        // Redirect dengan status sukses
        header("Location: ../pages/pageBarang.php?status=success");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}

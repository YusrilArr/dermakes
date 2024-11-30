<?php
session_start();

// Pastikan session keranjang ada
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

if (isset($_POST['barang_id']) && isset($_POST['jumlah'])) {
    $barang_id = $_POST['barang_id'];
    $jumlah = $_POST['jumlah'];

    // Cek apakah barang sudah ada dalam keranjang
    $found = false;
    foreach ($_SESSION['keranjang'] as &$item) {
        if ($item['barang_id'] == $barang_id) {
            $item['jumlah'] += $jumlah; // Jika ada, tambahkan jumlah
            $found = true;
            break;
        }
    }

    // Jika barang belum ada, tambahkan baru
    if (!$found) {
        // Ambil data barang dari database
        include '../function/koneksi.php';
        $query = "SELECT * FROM barang WHERE id_barang = '$barang_id'";
        $result = mysqli_query($koneksi, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $barang = mysqli_fetch_assoc($result);
            $_SESSION['keranjang'][] = [
                'barang_id' => $barang['id_barang'],
                'nama_barang' => $barang['nama_barang'],
                'harga' => $barang['harga'],
                'jumlah' => $jumlah,
                'pic' => $barang['pic']
            ];
        }
    }

    echo 'success'; // Bisa memberikan respons sukses setelah menambahkan ke keranjang
} else {
    echo 'error'; // Error jika tidak ada data yang dikirim
}

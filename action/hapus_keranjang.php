<?php
session_start();

if (isset($_POST['barang_id'])) {
    $barang_id = $_POST['barang_id'];

    // Mencari item dengan barang_id dan menghapusnya
    foreach ($_SESSION['keranjang'] as $key => $item) {
        if ($item['barang_id'] == $barang_id) {
            unset($_SESSION['keranjang'][$key]);
            break;
        }
    }

    // Menyusun ulang array keranjang setelah penghapusan
    $_SESSION['keranjang'] = array_values($_SESSION['keranjang']);

    header("Location: ../pages/keranjang.php"); // Redirect ke halaman keranjang
    exit();
} else {
    echo "Error: Tidak ada barang yang dipilih.";
}

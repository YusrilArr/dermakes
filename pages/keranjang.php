<?php
session_start();

// Pastikan session keranjang ada
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = []; // Jika tidak ada, inisialisasi keranjang kosong
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Keranjang - PT DERMAKES</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php include '../sidebar.php'; ?> <!-- Menyisipkan Sidebar -->

        <!-- Page Content -->
        <div id="content" class="p-4 p-md-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid d-flex justify-content-start align-items-center">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <span class="ms-3 ml-1" style="font-weight:bold;">Keranjang</span>
                </div>
            </nav>
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($_SESSION['keranjang']) == 0) { ?>
                            <!-- Jika keranjang kosong -->
                            <tr>
                                <td colspan="5" class="text-center">Keranjang Anda kosong.</td>
                            </tr>
                            <?php } else {
                            $totalHarga = 0;
                            foreach ($_SESSION['keranjang'] as $item) {
                                $totalItem = $item['harga'] * $item['jumlah'];
                                $totalHarga += $totalItem;
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['nama_barang']); ?></td>
                                    <td>Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                                    <td><?php echo $item['jumlah']; ?></td>
                                    <td>Rp <?php echo number_format($totalItem, 0, ',', '.'); ?></td>
                                    <td>
                                        <!-- Tindakan hapus item dari keranjang -->
                                        <form action="hapus_keranjang.php" method="post" style="display:inline;">
                                            <input type="hidden" name="barang_id" value="<?php echo $item['barang_id']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3"><strong>Total Belanja</strong></td>
                                <td><strong>Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?></strong></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if (count($_SESSION['keranjang']) > 0) { ?>
                    <a href="checkout.php" class="btn btn-success">Checkout</a>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
<!doctype html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit();
}

include '../function/koneksi.php'; // Koneksi database

$query = "SELECT id_barang, nama_barang, harga, pic FROM barang";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Gagal mengambil data: " . mysqli_error($koneksi));
}
?>

<head>
    <title>Katalog - PT DERMAKES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php include '../sidebar.php'; ?> <!-- Menyisipkan Sidebar -->

        <!-- Modal -->
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">Tambah ke Keranjang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addToCartForm">
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah/Qty</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
                            </div>
                            <input type="hidden" id="barang_id" name="barang_id">
                            <button type="submit" class="btn btn-primary">Tambahkan ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Page Content -->
        <div id="content" class="p-4 p-md-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid d-flex justify-content-start align-items-center">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <span class="ms-3 ml-1" style="font-weight:bold;">Katalog</span>
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card h-100 shadow-sm border-0 rounded" data-bs-toggle="modal" data-bs-target="#cartModal" data-id="<?php echo $row['id_barang']; ?>" data-nama="<?php echo htmlspecialchars($row['nama_barang']); ?>" data-harga="<?php echo $row['harga']; ?>" data-pic="<?php echo htmlspecialchars($row['pic']); ?>">
                                <img src="../<?php echo htmlspecialchars($row['pic']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['nama_barang']); ?>" style="height: 200px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['nama_barang']); ?></h5>
                                    <p class="card-text">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Menangani klik pada card dan mengisi modal dengan data
        document.querySelectorAll('.card').forEach(function(card) {
            card.addEventListener('click', function() {
                var barangId = card.getAttribute('data-id');
                var barangNama = card.getAttribute('data-nama');
                var barangHarga = card.getAttribute('data-harga');

                // Mengisi modal dengan data produk
                document.getElementById('barang_id').value = barangId;
                document.getElementById('cartModalLabel').textContent = 'Tambah ' + barangNama + ' ke Keranjang';
            });
        });

        // Menangani pengiriman form untuk menambahkan ke keranjang
        document.getElementById('addToCartForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var jumlah = document.getElementById('jumlah').value;
            var barangId = document.getElementById('barang_id').value;

            if (jumlah < 1) {
                alert('Jumlah harus lebih dari 0.');
                return;
            }

            // Mengirim data ke server untuk menambahkan ke keranjang
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../action/add_to_cart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert('Barang berhasil ditambahkan ke keranjang.');
                    $('#cartModal').modal('hide'); // Menutup modal setelah berhasil
                } else {
                    alert('Gagal menambahkan barang ke keranjang.');
                }
            };
            xhr.send('barang_id=' + barangId + '&jumlah=' + jumlah);
        });
    </script>

    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.05);
            /* Card terangkat dan membesar sedikit */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            /* Shadow lebih kuat */
        }
    </style>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
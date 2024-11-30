<!doctype html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit();
}
?>

<head>
    <title>Dashboard - PT DERMAKES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Menambahkan CDN Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <span class="ms-3 ml-1" style="font-weight:bold;">Tambah Barang</span>
                </div>
            </nav>

            <?php if (isset($_GET['status']) && $_GET['status'] == 'success') { ?>
                <!-- Modal Sukses -->
                <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="successModalLabel">Sukses</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Data barang berhasil disimpan!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Pastikan modal hanya ditampilkan jika status=success
                    document.addEventListener('DOMContentLoaded', function() {
                        const successModal = new bootstrap.Modal(document.getElementById('successModal'), {
                            keyboard: false
                        });
                        successModal.show(); // Menampilkan modal
                    });
                </script>
            <?php } ?>

            <!-- Form input barang -->
            <form action="../action/inputBarang.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" required>
                </div>

                <div class="mb-3">
                    <label for="harga_barang" class="form-label">Harga Barang</label>
                    <input type="text" class="form-control" name="harga_barang" required>
                </div>

                <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <input type="text" class="form-control" name="satuan" required>
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="text" class="form-control" name="stock" required>
                </div>
                <div class="mb-3">
                    <label for="imageUpload" class="form-label">Pilih Gambar</label>
                    <input type="file" class="form-control" id="imageUpload" name="pic" accept="image/*" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mt-2" id="editBtn">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
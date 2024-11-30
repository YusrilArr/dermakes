<!doctype html>
<html lang="en">
<?php
session_start();
include("../function/koneksi.php");
$id_user = $_SESSION['id_user'];
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit();
}

// var_dump($_SESSION);
?>

<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo '<div class="alert alert-success" id="notif">Profil berhasil diperbarui.</div>';
    } else if ($_GET['status'] == 'error') {
        echo '<div class="alert alert-danger" id="notif">Terjadi kesalahan saat memperbarui profil.</div>';
    }
}
?>

<?php
$query = "SELECT username, password, email, nama, no_hp FROM users where id_user = ' $id_user  '";
$obj = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($obj);

$username = $row["username"];
$email = $row["email"];
$nama = $row["nama"];
$no_hp = $row["no_hp"];
$password = $row["password"];


$query2 = "SELECT id_user, kota, kecamatan, alamat_detail FROM alamat_users WHERE id_user = '$id_user'";
$obj2 = mysqli_query($koneksi, $query2);
$res2 = mysqli_num_rows($obj2);
if ($res2 > 0) {
    $row2 = mysqli_fetch_assoc($obj2);

    $kota = $row2["kota"];
    $kecamatan = $row2["kecamatan"];
    $alamat_detail = $row2["alamat_detail"];
} else {
    $kota = '';
    $kecamatan = '';
    $alamat_detail = '';
}

// var_dump($query);
?>

<head>
    <title>Dashboard - PT DERMAKES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <!-- Modal Notifikasi -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Notifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Pesan akan diisi melalui JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


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
                    <span class="ms-3 ml-1" style="font-weight:bold;">Profile</span>
                </div>
            </nav>
            <form action="../action/updateProfile.php" method="post">
                <!-- Username and Name -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" value="<?php echo $username ?>" name="username" id="username" placeholder="Username" disabled>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" value="<?php echo $nama ?>" name="nama" id="name" placeholder="Nama" disabled>
                </div>

                <!-- Phone number and email -->
                <div class="mb-3">
                    <label for="phone" class="form-label">No. Handphone</label>
                    <input type="text" class="form-control" value="<?php echo $no_hp ?>" name="no_hp" id="phone" placeholder="No. Handphone" disabled>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?php echo $email ?>" name="email" id="email" placeholder="Email" disabled>
                </div>
                <div class="mb-5 position-relative">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        value="<?php echo $password ?>"
                        name="password"
                        id="password"
                        placeholder="Password"
                        disabled>
                    <button
                        type="button"
                        id="togglePassword"
                        class="btn btn-link position-absolute"
                        style="right: 5px; top: 75%; transform: translateY(-50%); text-decoration: none;">
                        <i class="fa fa-eye"></i> <!-- Font Awesome Eye Icon -->
                    </button>
                </div>

                <script>
                    const togglePassword = document.getElementById('togglePassword');
                    const passwordField = document.getElementById('password');

                    togglePassword.addEventListener('click', function() {
                        // Toggle type between 'password' and 'text'
                        if (passwordField.type === 'password') {
                            passwordField.type = 'text';
                            this.innerHTML = '<i class="fa fa-eye-slash"></i>'; // Font Awesome Eye Slash Icon
                        } else {
                            passwordField.type = 'password';
                            this.innerHTML = '<i class="fa fa-eye"></i>'; // Font Awesome Eye Icon
                        }
                    });
                </script>




                <!-- Address Label -->
                <div>
                    <h5>Detail Pengiriman</h5>
                </div>

                <!-- City and District -->
                <div class="mb-3">
                    <label for="city" class="form-label">Kota</label>
                    <input type="text" class="form-control" value="<?php echo $kota ?>" name="kota" id="city" placeholder="Kota" disabled>
                </div>

                <div class="mb-3">
                    <label for="district" class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" value="<?php echo $kecamatan ?>" name="kecamatan" id="district" placeholder="Kecamatan" disabled>
                </div>

                <!-- Detailed Address -->
                <div class="mb-3">
                    <label for="detailAddress" class="form-label">Alamat Detail</label>
                    <textarea class="form-control" name="alamat_detail" id="detailAddress" rows="3" placeholder="Masukkan detail alamat anda, seperti patokan, atau nama jalan." disabled><?php echo $alamat_detail ?></textarea>
                </div>

                <!-- Button -->
                <div>
                    <button type="button" class="btn btn-primary mt-3" id="editBtn">Edit</button>
                    <button type="submit" class="btn btn-success mt-3" style="display: none;" id="saveBtn">Save</button>
                </div>
            </form>

            <script>
                // Get the edit and save buttons
                const editBtn = document.getElementById('editBtn');
                const saveBtn = document.getElementById('saveBtn');

                // Toggle between edit and save
                editBtn.addEventListener('click', function() {
                    // Get all input and textarea elements
                    const inputs = document.querySelectorAll('input, textarea');

                    // Enable editing
                    inputs.forEach(input => {
                        input.disabled = false;
                    });

                    // Show save button and hide edit button
                    editBtn.style.display = 'none';
                    saveBtn.style.display = 'inline-block';
                });

                // Cek apakah ada notifikasi
                const notif = document.getElementById('notif');
                if (notif) {
                    // Menghapus notifikasi setelah 5 detik
                    setTimeout(() => {
                        notif.style.display = 'none';
                    }, 5000); // Waktu dalam milidetik (5 detik)
                }
            </script>


        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
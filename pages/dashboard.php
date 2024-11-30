<!doctype html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit();
}

// var_dump($_SESSION);
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

    <div class="wrapper d-flex align-items-stretch">
        <?php include '../sidebar.php'; ?> <!-- Menyisipkan Sidebar -->

        <!-- Page Content -->
        <div id="content" class="p-4 p-md-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
            </nav>

            <h2 class="mb-4">Ini adalah halaman dashboard</h2>
            <p>Selamat datang di halaman dashboard. Anda dapat mengelola data dari sini.</p>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
<?php
include("../function/koneksi.php");

$user_level = isset($_SESSION['level']) ? $_SESSION['level'] : ''; // Ambil level user dari session
?>

<nav id="sidebar">
    <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../images/logo.jpg);"></a>
        <ul class="list-unstyled components mb-5">
            <li class="">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-home"></i> Home
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="katalog.php"><i class="fa fa-book"></i> Katalog</a></li>
                </ul>
            </li>

            <!-- Profile menu dengan logika PHP untuk menambah class active -->
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>">
                <a href="profile.php">
                    <i class="fa fa-user"></i> Profile
                </a>
            </li>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'keranjang.php' ? 'active' : ''; ?>">
                <a href="keranjang.php">
                    <i class="fa fa-shopping-basket"></i> Keranjang
                </a>
            </li>

            <!-- Menu List Order hanya untuk user dengan level 'admin' -->
            <?php if ($user_level == 'user') { ?>
                <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'listOrder.php' ? 'active' : ''; ?>">
                    <a href="listOrder.php">
                        <i class="fa fa-list"></i> List Order
                    </a>
                </li>
            <?php } ?>
            <?php if ($user_level == 'admin') { ?>
                <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'listOrder.php' ? 'active' : ''; ?>">
                    <a href="listOrder.php">
                        <i class="fa fa-list"></i> Order Masuk
                    </a>
                </li>
            <?php } ?>

            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-file"></i> Items
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li><a href="pageBarang.php"><i class="fa fa-edit"></i> Input Barang</a></li>
                    <li><a href="#"><i class="fa fa-desktop"></i> Monitoring Barang</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fa fa-envelope"></i> Contact</a></li>
            <li>
                <a href="logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </li>

            <!-- Modal -->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Yakin ingin keluar?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="../login.php" class="btn btn-danger">Keluar</a>
                        </div>
                    </div>
                </div>
            </div>

        </ul>
        <div class="footer">
            <!-- <p>Copyright &copy; <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a></p> -->
        </div>
    </div>
</nav>
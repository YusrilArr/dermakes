<?php
session_start();

// Menghancurkan semua session yang ada
session_unset(); // Menghapus semua variabel session
session_destroy(); // Menghancurkan session

// Mengarahkan pengguna ke halaman login
header('Location: login.php');
exit();

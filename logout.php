<?php 
// mengaktifkan session php
session_start();
 
// Hapus semua data sesi
session_unset();

// menghapus semua session
session_destroy();
 
// print_r($_SESSION);
// mengalihkan halaman ke halaman login
header("location:login.php");
exit();
?>
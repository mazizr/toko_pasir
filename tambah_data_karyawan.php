<?php 
require 'header.php';
error_reporting(0);
// $roleKaryawan = $_POST['role'];
// echo $roleKaryawan ;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaKaryawan = $_POST['nama_karyawan'];
    $notelpKaryawan = $_POST['no_telp'];
    $alamatKaryawan = $_POST['alamat'];
    $usernameKaryawan = $_POST['username'];
    $passwordKaryawan = $_POST['password'];
    $roleKaryawan = $_POST['role'];
    insertKaryawan($namaKaryawan, $notelpKaryawan, $alamatKaryawan, $usernameKaryawan, $passwordKaryawan, $roleKaryawan);
  }
?>
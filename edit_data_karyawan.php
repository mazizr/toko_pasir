<?php 
  require 'header.php';
  // Sembunyikan semua pesan error
  // error_reporting(0);
  echo "Masuk";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data yang diubah dari form
    $idKaryawan = $_POST['id_karyawan'];
    $namaKaryawan = $_POST['nama_karyawan'];
    $notelpKaryawan = $_POST['no_telp'];
    $alamatKaryawan = $_POST['alamat'];
    $usernameKaryawan = $_POST['username'];
    $passwordKaryawan = $_POST['password'];
    $roleKaryawan = $_POST['edit-role'];
    editKaryawan($idKaryawan,$namaKaryawan, $notelpKaryawan, $alamatKaryawan, $usernameKaryawan, $passwordKaryawan, $roleKaryawan);
  }
?>
<?php 
  require 'header.php';
  // Sembunyikan semua pesan error
  // error_reporting(0);
  echo "Masuk";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data yang diubah dari form
    $id_barang_masuk = $_POST['id_barang_masuk'];
    $id_barang = $_POST['id_barang'];
    $jumlah_pertambahan = $_POST['jumlah_pertambahan'];
    $tanggal_pertambahan = $_POST['tanngal_pertambahan'];
    $id_karyawan = $_POST['id_karyawan'];
    $jumlah_sebelum = $_POST['jumlah_sebelum'];
    editBarangMasuk($id_barang_masuk, $id_barang, $jumlah_pertambahan, $jumlah_sebelum, $tanggal_pertambahan, $id_karyawan);
  }
?>
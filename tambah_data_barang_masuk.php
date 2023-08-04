<?php 
require 'header.php';
// Sembunyikan semua pesan error
error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // updateStokBarang($jumlah_pertambahan);
  $id_barang = $_POST['id_barang'];
  $jumlah_pertambahan = $_POST['jumlah_pertambahan'];
  $tanngal_pertambahan = $_POST['tanngal_pertambahan'];
  $id_karyawan = $_POST['id_karyawan'];
  insertBarangMasuk($id_barang, $jumlah_pertambahan, $tanngal_pertambahan, $id_karyawan);
}
?>
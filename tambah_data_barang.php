<?php 
require 'header.php';
// Sembunyikan semua pesan error
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $namaBarang = $_POST['nama_barang'];
  $jumlahBarang = $_POST['jumlah_barang'];
  $hargaBarang = $_POST['harga_barang'];
  $satuanBarang = $_POST['satuan_barang'];
  insertBarang($namaBarang, $hargaBarang, $jumlahBarang, $satuanBarang);
}
?>
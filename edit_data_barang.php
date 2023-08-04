<?php 
  require 'header.php';
  // Sembunyikan semua pesan error
  // error_reporting(0);
  echo "Masuk";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idBarang = $_POST['id_barang'];
    $namaBarang = $_POST['nama_barang'];
    $jumlahBarang = $_POST['jumlah_barang'];
    $hargaBarang = $_POST['harga_barang'];
    editBarang($idBarang,$namaBarang, $hargaBarang, $jumlahBarang);
  }
?>
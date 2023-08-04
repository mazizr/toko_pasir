<?php
// Mengambil ID data yang akan dihapus dari permintaan POST
$dataId = $_POST['data_id'];
$id_barang = $_POST['data_id_barang'];
$jumlah_pertambahan = $_POST['data_jumlah_pertambahan'];

echo $jumlah_pertambahan;

// Melakukan koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "fotokopi");

// Memeriksa koneksi database
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Membuat query SQL untuk menghapus data
$query1 = "DELETE FROM barang_masuk WHERE id_barang_masuk = '$dataId'";
$query2 = "UPDATE barang SET jumlah_barang = jumlah_barang - $jumlah_pertambahan WHERE id_barang = '$id_barang'";

mysqli_query($koneksi, $query1);
mysqli_query($koneksi, $query2);

mysqli_commit($koneksi);

// Menutup koneksi database
mysqli_close($koneksi);
?>

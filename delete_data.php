<?php
// Mengambil ID data yang akan dihapus dari permintaan POST
$dataId = $_POST['data_id'];

// Melakukan koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "toko_pasir");

// Memeriksa koneksi database
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Membuat query SQL untuk menghapus data
$query = "DELETE FROM barang WHERE kode_barang = '$dataId'";

mysqli_query($koneksi, $query);

// Menutup koneksi database
mysqli_close($koneksi);
?>

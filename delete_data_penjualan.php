<?php
// Mengambil ID data yang akan dihapus dari permintaan POST
$dataId = $_POST['data_id'];

// Melakukan koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "fotokopi");

// Memeriksa koneksi database
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Membuat query SQL untuk menghapus data
$query1 = "DELETE FROM penjualan_detail WHERE id_penjualan = '$dataId'";
$query2 = "DELETE FROM penjualan WHERE id_penjualan = '$dataId'";

mysqli_query($koneksi, $query1);
mysqli_query($koneksi, $query2);

// Menutup koneksi database
mysqli_close($koneksi);
?>

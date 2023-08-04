<?php
require 'header.php';

// Pastikan bahwa request yang diterima adalah melalui metode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Mengambil data yang diubah dari form
    $tanggal_penjualan = $_POST['tanggal_penjualan'];
    $total = $_POST['total'];
    $id_penjualan = insertPenjualan($tanggal_penjualan, $total);

    if ($id_penjualan !== null) {
        // Mengecek apakah data "qty" dan "id_barang" ada di dalam request POST
        if (isset($_POST["qty"]) && isset($_POST["id_barang"])) {
            // Mendapatkan data dari request
            $qtyArray = $_POST["qty"];
            $id_barangArray = $_POST["id_barang"];
    
            // Memastikan bahwa jumlah data "qty" dan "id_barang" sama
            if (count($qtyArray) === count($id_barangArray)) {
                // Melakukan iterasi untuk mengakses nilai setiap input
                for ($i = 0; $i < count($qtyArray); $i++) {
                    $qty = $qtyArray[$i];
                    $id_barang = $id_barangArray[$i];
                    
                    insertPenjualanDetail($id_barang, $id_penjualan, $qty);
                    // Di sini Anda dapat menggunakan $id_penjualan dan $qty serta $id_barang
                    // echo "Qty " . ($i + 1) . ": " . $qty . ", ID Barang: " . $id_barang . ", ID Penjualan: " . $id_penjualan . "<br>";
                }
                echo '<script>window.location.href = "data_transaksi.php";</script>'; // Alihkan ke halaman data_barang.php
            } else {
                // Jika jumlah data "qty" dan "id_barang" tidak sama
                echo "Jumlah data qty dan id_barang tidak sama!";
            }
        } else {
            // Jika data "qty" atau "id_barang" tidak ada dalam request POST
            echo "Tidak ada data qty atau id_barang yang dikirimkan!";
        }
    } else {
        echo "GADAPET!";
    }
} else {
    // Respon jika request bukan metode POST
    echo "Metode request yang diizinkan hanya POST!";
}
?>
<?php
// Ambil id_barang yang dikirimkan melalui AJAX
if (isset($_POST['id_barang'])) {
    $id_barang = $_POST['id_barang'];

    // Lakukan koneksi ke database dan lakukan kueri untuk mendapatkan harga berdasarkan $id_barang
    // Pastikan Anda menggunakan metode yang aman untuk mencegah SQL injection

    // Contoh implementasi koneksi dan kueri (gunakan koneksi sesuai dengan pengaturan server Anda)
    $conn = new mysqli("localhost", "root", "", "fotokopi");

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Lakukan pencegahan SQL injection sebelum melakukan kueri
    $id_barang = $conn->real_escape_string($id_barang);

    // Kueri untuk mendapatkan harga barang berdasarkan id_barang
    $sql = "SELECT harga_barang FROM barang WHERE id_barang = $id_barang";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $harga = $row['harga_barang'];

        // Kembalikan harga sebagai respon AJAX
        echo $harga;
    } else {
        // Jika id_barang tidak ditemukan di tabel barang, berikan respon sesuai kebutuhan Anda
        echo "Harga barang tidak ditemukan";
    }

    // Tutup koneksi ke database
    $conn->close();
} else {
    // Jika tidak ada data yang dikirimkan melalui AJAX
    echo "ID Barang tidak ditemukan";
}
?>

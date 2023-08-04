<?php
if (isset($_GET['bulan'])) {
    $bulan = $_GET['bulan'];

    // Contoh implementasi koneksi dan kueri (gunakan koneksi sesuai dengan pengaturan server Anda)
    $conn = new mysqli("localhost", "root", "", "fotokopi");

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Lakukan pencegahan SQL injection sebelum melakukan kueri
    $bulan = $conn->real_escape_string($bulan);

    // Kueri untuk mendapatkan data laporan barang masuk berdasarkan bulan
    $sql = "SELECT COUNT(p.id_penjualan) AS jumlah_transaksi, b.nama_barang, SUM(pd.qty) AS jumlah_terjual
    FROM penjualan p
    JOIN penjualan_detail pd ON p.id_penjualan = pd.id_penjualan
    JOIN barang b ON pd.id_barang = b.id_barang
    WHERE
        EXTRACT(MONTH FROM p.tanggal_penjualan) = $bulan
        AND EXTRACT(YEAR FROM p.tanggal_penjualan) = (
            SELECT MAX(EXTRACT(YEAR FROM tanggal_penjualan)) FROM penjualan
        )
    GROUP BY
        pd.id_barang
    ORDER BY
        jumlah_transaksi DESC;
    ";

    $result = $conn->query($sql);

    $laporan = array(); // Initialize an empty array to hold the laporan data

    if ($result->num_rows > 0) {
        // Fetch all rows and store them in the $laporan array
        while ($row = $result->fetch_assoc()) {
            $laporan[] = $row;
        }

        // Kembalikan data laporan sebagai respon AJAX dalam format JSON
        echo json_encode($laporan);
    } else {
        // Jika data laporan tidak ditemukan, berikan respon sesuai kebutuhan Anda
        echo "Data laporan tidak ditemukan";
    }

    // Tutup koneksi ke database
    $conn->close();
}
?>

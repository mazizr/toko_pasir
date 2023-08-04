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
    $sql = "SELECT b.nama_barang, bm.jumlah_pertambahan
    FROM barang_masuk bm
    JOIN barang b ON bm.id_barang = b.id_barang
    WHERE DATE_FORMAT(bm.tanngal_pertambahan, '%Y-%m') = (
        SELECT MAX(DATE_FORMAT(tanngal_pertambahan, '%Y-%m'))
        FROM barang_masuk
        WHERE MONTH(tanngal_pertambahan) = $bulan
        AND YEAR(tanngal_pertambahan) = (
            SELECT MAX(YEAR(tanngal_pertambahan))
            FROM barang_masuk
        )
    );";

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

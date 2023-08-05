<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko_pasir";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk mengambil data barang
function cekStokBarang() {
    global $conn;
    
    $query = "SELECT nama_barang, jumlah_barang AS stoknya FROM barang WHERE jumlah_barang < 100";
    $result = $conn->query($query);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Fungsi untuk mengambil data barang
function getBarang() {
    global $conn;
    
    $query = "SELECT * FROM barang ORDER BY kode_barang DESC;";
    $result = $conn->query($query);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Fungsi untuk mengambil data barang
function getKaryawan() {
    global $conn;
    
    $query = "SELECT * FROM karyawan ORDER BY kode_karyawan DESC;";
    $result = $conn->query($query);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Fungsi untuk mengambil data barang
function getBarangMasuk() {
    global $conn;
    
    // $query = "SELECT * FROM barang_masuk";
    $query = "SELECT *
          FROM barang_masuk bm
          INNER JOIN barang b ON bm.id_barang = b.id_barang 
          INNER JOIN karyawan k ON bm.id_karyawan = k.id_karyawan";

    $result = $conn->query($query);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Fungsi untuk mengambil data barang
function getPenjualan() {
    global $conn;
    
    $query = "SELECT * FROM penjualan";
    $result = $conn->query($query);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Fungsi untuk mengambil data barang
function getLaporanBarangMasuk() {
    global $conn;
    
    // $query = "SELECT * FROM barang_masuk";
    $query = "SELECT b.nama_barang, bm.jumlah_pertambahan FROM barang_masuk bm 
    JOIN barang b ON bm.id_barang = b.id_barang 
    WHERE DATE_FORMAT(bm.tanngal_pertambahan, '%Y-%m') = ( SELECT MAX(DATE_FORMAT(tanngal_pertambahan, '%Y-%m')) FROM barang_masuk )";

    $result = $conn->query($query);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Fungsi untuk mengambil data barang
function getLaporanTransaksi() {
    global $conn;
    
    // $query = "SELECT * FROM barang_masuk";
    $query = "SELECT COUNT(p.id_penjualan) AS jumlah_transaksi, b.nama_barang, SUM(pd.qty) AS jumlah_terjual
                FROM penjualan p
                JOIN penjualan_detail pd ON p.id_penjualan = pd.id_penjualan
                JOIN barang b ON pd.id_barang = b.id_barang
                WHERE
                    EXTRACT(YEAR_MONTH FROM p.tanggal_penjualan) = (
                        SELECT
                            MAX(EXTRACT(YEAR_MONTH FROM tanggal_penjualan))
                        FROM
                            penjualan
                    )
                GROUP BY
                    pd.id_barang
                ORDER BY
                    jumlah_transaksi DESC;
                ";

    $result = $conn->query($query);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

// Fungsi untuk mengambil data barang
function getLaporanBanyakTransaksi() {
    global $conn;
    
    // $query = "SELECT * FROM barang_masuk";
    $query = "SELECT COUNT(*) AS banyak_transaksi
            FROM penjualan
            WHERE EXTRACT(YEAR_MONTH FROM tanggal_penjualan) = (
                SELECT MAX(EXTRACT(YEAR_MONTH FROM tanggal_penjualan)) FROM penjualan
            );
            ";

    $result = $conn->query($query);

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

function insertBarang($namaBarang, $hargaBarang, $jumlahBarang, $satuanBarang) {
    global $conn;

    $query = "INSERT INTO barang (nama_barang, harga_barang, jumlah_barang, satuan) VALUES ('$namaBarang', '$hargaBarang', '$jumlahBarang', '$satuanBarang')";
    $result = $conn->query($query);

    if ($result === false) {
        die("Error: " . $conn->error);
    } else {
        echo '<script>
        Swal.fire({
          icon: "success",
          title: "Berhasil!",
          text: "Data barang berhasil ditambahkan.",
        }).then(() => {
          window.location.href = "data_barang.php"; // Alihkan ke halaman data_barang.php setelah menutup SweetAlert
        });
      </script>'; // Alihkan ke halaman data_barang.php
    }

    // Pesan sukses atau tindakan selanjutnya setelah berhasil memasukkan data

    $conn->close();
}

function insertKaryawan($namaKaryawan, $notelpKaryawan, $alamatKaryawan, $usernameKaryawan, $passwordKaryawan, $roleKaryawan) {
    global $conn;

    $query = "INSERT INTO karyawan (nama_karyawan, no_telp, alamat, nama_pengguna, kata_sandi, role) VALUES ('$namaKaryawan', '$notelpKaryawan', '$alamatKaryawan', '$usernameKaryawan', '$passwordKaryawan', '$roleKaryawan')";
    $result = $conn->query($query);

    if ($result === false) {
        die("Error: " . $conn->error);
    } else {
        echo '<script>
        Swal.fire({
          icon: "success",
          title: "Berhasil!",
          text: "Data barang berhasil ditambahkan.",
        }).then(() => {
          window.location.href = "data_karyawan.php"; // Alihkan ke halaman data_barang.php setelah menutup SweetAlert
        });
      </script>'; // Alihkan ke halaman data_barang.php
    }

    // Pesan sukses atau tindakan selanjutnya setelah berhasil memasukkan data

    $conn->close();
}

function insertBarangMasuk($id_barang, $jumlah_pertambahan, $tanngal_pertambahan, $id_karyawan) {
    global $conn;

    $query1 = "INSERT INTO barang_masuk (id_barang, jumlah_pertambahan, tanngal_pertambahan, id_karyawan) VALUES ('$id_barang', '$jumlah_pertambahan', '$tanngal_pertambahan', '$id_karyawan')";
    $query2 = "UPDATE barang SET jumlah_barang = jumlah_barang + $jumlah_pertambahan WHERE id_barang = '$id_barang'";
    
    $result = $conn->multi_query($query1 . ";" . $query2);

    if ($result === false) {
        die("Error: " . $conn->error);
    } else {
        echo '<script>window.location.href = "data_barang_masuk.php";</script>'; // Alihkan ke halaman data_barang.php
    }

    // Pesan sukses atau tindakan selanjutnya setelah berhasil memasukkan data

    $conn->close();
}

function insertPenjualan($tanggal_penjualan, $total) {
    global $conn;

    $query = "INSERT INTO penjualan (tanggal_penjualan, total) VALUES ('$tanggal_penjualan', $total)";
    $result = $conn->query($query);

    if ($result === false) {
        die("Error: " . $conn->error);
    } else {
        // Mendapatkan id_penjualan dari insert terakhir
        $id_penjualan = $conn->insert_id;
        // Mengembalikan id_penjualan
        return $id_penjualan;
    }
    // Pesan sukses atau tindakan selanjutnya setelah berhasil memasukkan data

    // $conn->close();
}

function insertPenjualanDetail($id_barang, $id_penjualan, $qty) {
    global $conn;

    $query1 = "INSERT INTO penjualan_detail (id_barang, id_penjualan, qty) VALUES ($id_barang, $id_penjualan, $qty)";
    $query2 = "UPDATE barang SET jumlah_barang = jumlah_barang - $qty WHERE id_barang = $id_barang;";
    
    $result = $conn->query($query1);
    $result = $conn->query($query2);

    if ($result === false) {
        die("Error: " . $conn->error);
    } 
}

function editBarang($idBarang,$namaBarang, $hargaBarang, $jumlahBarang, $satuanBarang) {
    global $conn;

    // Mengupdate data barang ke database
    $query = "UPDATE barang SET nama_barang = '$namaBarang', jumlah_barang = '$jumlahBarang', harga_barang = '$hargaBarang', satuan = '$satuanBarang' 
    WHERE kode_barang = '$idBarang'";
    $result = $conn->query($query);

    if ($result === false) {
        die("Error: " . $conn->error);
    } else {
        echo '<script>
        Swal.fire({
          icon: "success",
          title: "Berhasil!",
          text: "Data barang berhasil diubah.",
        }).then(() => {
          window.location.href = "data_barang.php"; // Alihkan ke halaman data_barang.php setelah menutup SweetAlert
        });
      </script>'; // Alihkan ke halaman data_barang.php
    }

    // Pesan sukses atau tindakan selanjutnya setelah berhasil memasukkan data

    $conn->close();
}

function editKaryawan($idKaryawan,$namaKaryawan, $notelpKaryawan, $alamatKaryawan, $usernameKaryawan, $passwordKaryawan, $roleKaryawan) {
    global $conn;

    // Mengupdate data barang ke database
    $query = "UPDATE karyawan SET 
    nama_karyawan = '$namaKaryawan', no_telp = '$notelpKaryawan', alamat = '$alamatKaryawan', 
    nama_pengguna = '$usernameKaryawan', kata_sandi = '$passwordKaryawan', role = '$roleKaryawan' 
    WHERE kode_karyawan = '$idKaryawan'";
    $result = $conn->query($query);

    if ($result === false) {
        die("Error: " . $conn->error);
    } else {
        echo '<script>
        Swal.fire({
          icon: "success",
          title: "Berhasil!",
          text: "Data barang berhasil diubah.",
        }).then(() => {
          window.location.href = "data_karyawan.php"; // Alihkan ke halaman data_karyawan.php setelah menutup SweetAlert
        });
      </script>'; // Alihkan ke halaman data_karyawan.php
    }

    // Pesan sukses atau tindakan selanjutnya setelah berhasil memasukkan data

    $conn->close();
}

function editBarangMasuk($id_barang_masuk, $id_barang, $jumlah_pertambahan, $jumlah_sebelum, $tanggal_pertambahan, $id_karyawan) {
    global $conn;

    // Mengupdate data barang ke database
    $query1 = "UPDATE barang_masuk SET id_barang = '$id_barang', jumlah_pertambahan = '$jumlah_pertambahan', tanngal_pertambahan = '$tanggal_pertambahan', id_karyawan = '$id_karyawan' WHERE id_barang_masuk = '$id_barang_masuk'";
    $query2 = "UPDATE barang SET jumlah_barang = jumlah_barang - $jumlah_sebelum + $jumlah_pertambahan WHERE id_barang = '$id_barang'";
    $result = $conn->query($query1);
    $result = $conn->query($query2);

    if ($result === false) {
        die("Error: " . $conn->error);
    } else {
        echo '<script>window.location.href = "data_barang_masuk.php";</script>'; // Alihkan ke halaman data_barang_masuk.php
    }

    // Pesan sukses atau tindakan selanjutnya setelah berhasil memasukkan data

    $conn->close();
}

function updateStokBarang($jumlah_pertambahan) {
    global $conn;

    $query = "UPDATE barang SET jumlah_barang = jumlah_barang + $jumlah_pertambahan";
    $result = $conn->query($query);

    // Pesan sukses atau tindakan selanjutnya setelah berhasil memasukkan data

    $conn->close();
}

?>

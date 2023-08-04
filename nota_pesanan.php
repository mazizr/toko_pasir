<?php
// memanggil library FPDF
require('library/fpdf.php');
include 'db.php';

$id_penjualan = $_GET['id_penjualan'];

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', array(216, 330));
$pdf->AddPage();

// Fungsi untuk header
function headerNota()
{
    global $pdf;
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Fotocopy Admis Copy Center', 0, 1, 'C'); // Judul toko
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 5, 'Jl. Ir. H. Juanda No.234, Dago, Kecamatan Coblong,', 0, 1, 'C'); // Alamat toko (Baris pertama)
    $pdf->Cell(0, 5, 'Kota Bandung, Jawa Barat 40135', 0, 1, 'C'); // Alamat toko (Baris ketiga)
    $pdf->Ln(10); // Spasi antara header dan isi tabel
}

// Fungsi untuk footer
function footerNota()
{
    global $pdf;
    // $pdf->SetY(-40); // Posisi dari bawah halaman
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(0, 10, 'Terima kasih telah berbelanja di Fotocopy Admis Copy Center', 0, 0, 'C');
}

// Tampilkan header
headerNota();

$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(15, 7, 'NO', 1, 0, 'C');
$pdf->Cell(60, 7, 'NAMA BARANG', 1, 0, 'C');
$pdf->Cell(30, 7, 'QTY', 1, 0, 'C');
$pdf->Cell(45, 7, 'TOTAL HARGA', 1, 1, 'C');

$pdf->SetFont('Times', '', 10);
$no = 1;
$data = mysqli_query($conn, "SELECT p.id_penjualan, pd.id_penjualan_detail, pd.qty, b.nama_barang, b.harga_barang
                    FROM penjualan p 
                    INNER JOIN penjualan_detail pd ON p.id_penjualan = pd.id_penjualan
                    INNER JOIN barang b ON pd.id_barang = b.id_barang 
                    WHERE p.id_penjualan = $id_penjualan");

$total_penjualan = 0; // Inisialisasi total penjualan

while ($d = mysqli_fetch_array($data)) {
    $total_barang = $d['harga_barang'] * $d['qty']; // Total harga barang = harga_barang * qty
    $pdf->Cell(15, 6, $no++, 1, 0, 'C');
    $pdf->Cell(60, 6, $d['nama_barang'], 1, 0);
    $pdf->Cell(30, 6, $d['qty'], 1, 0, 'C');
    $pdf->Cell(45, 6, 'Rp ' . number_format($total_barang, 0, ',', '.'), 1, 1, 'R');

    $total_penjualan += $total_barang; // Akumulasi total penjualan
}

$pdf->Cell(105, 6, 'Total Harga', 1, 0, 'R');
$pdf->Cell(45, 6, 'Rp ' . number_format($total_penjualan, 0, ',', '.'), 1, 1, 'R');

// Tampilkan footer
footerNota();

$pdf->Output();
?>

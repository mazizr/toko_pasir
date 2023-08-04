<?php 
require 'header.php';

$id_penjualan = $_GET['id_penjualan'];

global $conn;

// Gantilah "nama_tabel" dengan nama tabel penjualan Anda
$query1 = "SELECT * FROM penjualan WHERE id_penjualan = $id_penjualan";
$query2 = "SELECT pd.id_penjualan_detail, pd.qty, b.nama_barang
            FROM penjualan_detail pd
            JOIN barang b ON pd.id_barang = b.id_barang
            WHERE pd.id_penjualan = $id_penjualan";

// Eksekusi query
$result_penjualan = mysqli_query($conn, $query1); // Ganti $koneksi dengan objek koneksi database Anda
$data_penjualan = mysqli_fetch_assoc($result_penjualan);

$result_penjualan_detail = $conn->query($query2);

$data_penjualan_detail = array();
if ($result_penjualan_detail->num_rows > 0) {
    while ($row = $result_penjualan_detail->fetch_assoc()) {
        $data_penjualan_detail[] = $row;
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Detail Penjualan
        </div>
        <div class="card-body">
            <?php
                echo "Tanggal Penjualan : " . $data_penjualan['tanggal_penjualan'];
                echo "<br>Total Harga   : " . $data_penjualan['total'] . "<br>";
                echo "<hr>Barang Dipesan<hr>";
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $i = 0;
                            foreach ($data_penjualan_detail as $penjualan) {
                                $i += 1;
                                echo "<tr>";
                                echo "<td>$i</td>";
                                echo "<td>" . $penjualan['nama_barang'] ."</td>";
                                echo "<td>" . $penjualan['qty'] ."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>    
                </table>
            </div>
        </div>
    </div>    
</div>

<?php
require 'footer.php';
?>
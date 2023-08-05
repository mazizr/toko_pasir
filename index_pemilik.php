<?php
require 'header.php';
$dataLaporanBarangMasuk = getLaporanBarangMasuk();
$dataLaporanTransaksi = getLaporanTransaksi();
$dataLaporanBanyakTransaksi = getLaporanBanyakTransaksi();
?>
     
     <!-- Begin Page Content -->
               <div class="container-fluid">

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div> -->

<!-- Content Row -->
  <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
            <br>
            <div class="ml-auto">
                <select id="bulanSelectBM" class="form-control input-bulan" onchange="filterLaporanBM()">
                    <option disabled>Pilih Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
        </div>

        <div class="card-body">
            <div id="laporan-bm" class="table-responsive">
                <table class="table table-bordered laporan-bm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // Menampilkan data barang
                            $i = 0;
                            foreach ($dataLaporanBarangMasuk as $laporanbm) {
                                $i += 1;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $laporanbm['nama_barang']; ?></td>
                            <td><?php echo $laporanbm['jumlah_pertambahan']; ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pilih Bulan Laporan Transaksi</h6>
        <br>
        <div class="ml-auto">
            <select id="bulanSelectTransaksi" class="form-control input-bulan" onchange="filterLaporanTrans()">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
        <br>
        <div id="banyak-transaksi">
            <p class="m-0 font-weight-bold text-primary" style="margin-top: 10px;">
            Banyak transaksi : <?php
                    // Menampilkan data barang
                        $i = 0;
                        foreach ($dataLaporanBanyakTransaksi as $banyak_transaksi) {
                            $i += 1;
                            echo $banyak_transaksi['banyak_transaksi'];
                        }
                    ?>
            </p>
        </div>
    </div>

    <div class="card-body">
        <div id="laporan-transaksi" class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Terjual</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Menampilkan data barang
                        $i = 0;
                        foreach ($dataLaporanTransaksi as $transaksi) {
                            $i += 1;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $transaksi['nama_barang']; ?></td>
                        <td><?php echo $transaksi['jumlah_terjual']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

</div>
<!-- End of Main Content -->

<?php
require 'footer.php';
?>

<script>
    function filterLaporanBM() {
            // Ambil nilai bulan yang dipilih dari select
            var bulan = document.getElementById('bulanSelectBM').value;

            // Kirim permintaan AJAX ke server untuk mengambil data yang sesuai dengan bulan yang dipilih
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_laporan_barang_masuk.php?bulan=' + bulan, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Jika permintaan berhasil, update tabel dengan data yang diterima dari server
                    var data = JSON.parse(xhr.responseText);
                    updateTabelBM(data);
                }
            };

            xhr.send();
        }

        function updateTabelBM(data) {
            var tbody = document.querySelector("#laporan-bm tbody");
            tbody.innerHTML = "";

            // Isi tabel dengan data yang diterima dari server
            var i = 1;
            data.forEach(function(item) {
                var row = document.createElement("tr");
                row.innerHTML = "<td>" + i + "</td><td>" + item.nama_barang + "</td><td>" + item.jumlah_pertambahan + "</td>";
                tbody.appendChild(row);
                i++;
            });
        }
</script>

<script>
$(document).ready(function() {
    // Tambahkan event listener onchange pada elemen dengan id "bulanSelectTransaksi"
    $("#bulanSelectTransaksi").on("change", function() {
        // Panggil fungsi atau kode JavaScript lain yang ingin Anda eksekusi saat pilihan bulan berubah
        // Misalnya, panggil fungsi untuk memuat data transaksi berdasarkan bulan yang dipilih
        var bulanSelected = $(this).val();
        loadTransaksiByBulan(bulanSelected);
    });

    // Fungsi contoh untuk memuat data transaksi berdasarkan bulan yang dipilih
    function loadTransaksiByBulan() {
            // Ambil nilai bulan yang dipilih dari select
            var bulan = document.getElementById('bulanSelectTransaksi').value;

            // Kirim permintaan AJAX ke server untuk mengambil data yang sesuai dengan bulan yang dipilih
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_banyak_transaksi.php?bulan=' + bulan, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Jika permintaan berhasil, update tabel dengan data yang diterima dari server
                    var data = JSON.parse(xhr.responseText);
                    updateTransaksiByBulan(data);
                }
            };

            xhr.send();
        }

        function updateTransaksiByBulan(data) {
            var p = document.querySelector("#banyak-transaksi p");
            p.innerHTML = "";

            // Isi tabel dengan data yang diterima dari server
            var i = 1;
            data.forEach(function(item) {
                var row = document.createElement("div");
                row.innerHTML = '<p class="m-0 font-weight-bold text-primary" style="margin-top: 10px;">Banyak Transaksi : '+item.banyak_transaksi+'</p>';
                p.appendChild(row);
                i++;
            });
        }
});
</script>

<script>
    function filterLaporanTrans() {
            // Ambil nilai bulan yang dipilih dari select
            var bulan = document.getElementById('bulanSelectTransaksi').value;

            // Kirim permintaan AJAX ke server untuk mengambil data yang sesuai dengan bulan yang dipilih
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_laporan_transaksi.php?bulan=' + bulan, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Jika permintaan berhasil, update tabel dengan data yang diterima dari server
                    var data = JSON.parse(xhr.responseText);
                    updateTabelTrans(data);
                }
            };

            xhr.send();
        }

        function updateTabelTrans(data) {
            var tbody = document.querySelector("#laporan-transaksi tbody");
            tbody.innerHTML = "";

            // Isi tabel dengan data yang diterima dari server
            var i = 1;
            data.forEach(function(item) {
                var row = document.createElement("tr");
                row.innerHTML = "<td>" + i + "</td><td>" + item.nama_barang + "</td><td>" + item.jumlah_terjual + "</td>";
                tbody.appendChild(row);
                i++;
            });
        }
</script>

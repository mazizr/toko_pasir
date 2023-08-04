<?php 
require 'header.php';

$dataBarang = getBarang();
$dataPenjualan = getPenjualan();
?>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-primary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="tambah_pesanan.php" id="tambah-form" method="POST">   
            <div class="modal-body">    
                <div class="form-floating mb-4">
                    <label for="Nama">Tanggal Pesanan</label>
                    <input type="date" id="tanggal_penjualan" class="form-control" name="tanggal_penjualan" placeholder="">
                </div>
                <div class="form-floating mb-4" style="margin-top: -10px;">
                    <label for="Nama">Total Harga</label>
                    <input type="text" id="total" class="form-control" name="total" placeholder="" readonly>
                </div><hr>
                <div id="dynamicForm">

                </div>
                <center>
                    <a id="btnTambahBarang" class="btn btn-primary btn-icon-split btn-round">
                        <span class="icon text-white-50">
                            <img src="img/add.png" alt="Icon" style="vertical-align: middle; margin-right: 5px;"  width="27" height="27">
                        </span>
                        <span class="text"><b>Tambah Data Barang Dipesan</b></span>
                    </a>
                </center>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnGetValues" class="btn btn-icon-split btn-success btn-round">
                    <span class="icon text-white-50">
                        <img src="img/check.png" alt="Icon" style="vertical-align: middle; margin-right: 5px;"  width="20" height="20">
                    </span>
                    <span class="text"><b>Kirim</b></span>
                </button>
                <button type="reset" onclick="resetForm()" class="btn btn-danger btn-icon-split btn-round">
                    <span class="icon text-white-50">
                        <img src="img/cancel.png" alt="Icon" style="vertical-align: middle; margin-right: 5px;"  width="20" height="20">
                    </span>
                    <span class="text"><b>Ulang</b></span>
                </button> 
            </div>
        </form>
    </div>
  </div>
</div>
<!-- MODAL TAMBAH END -->
<!-- MODAL HAPUS -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-danger">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Menghapus Data Ini?
      </div>
      <div class="modal-footer">
        <button type="button" id="btnHapus" class="btn btn-icon-split btn-round btn-success">
            <span class="icon text-white-50">
                <img src="img/check.png" alt="Icon" style="vertical-align: middle; margin-right: 5px;"  width="20" height="20">
            </span>
            <span class="text"><b>Ya</b></span>
        </button>
        <button type="button" class="btn btn-icon-split btn-round btn-danger" data-dismiss="modal">
            <span class="icon text-white-50">
                <img src="img/cancel.png" alt="Icon" style="vertical-align: middle; margin-right: 5px;"  width="20" height="20">
            </span>
            <span class="text"><b>Tidak</b></span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL HAPUS END -->

<!-- Content Row -->
  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a id="btn-tambah" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary btn-icon-split btn-round">
            <span class="icon text-white-50">
                <img src="img/add.png" alt="Icon" style="vertical-align: middle; margin-right: 5px;"  width="27" height="27">
            </span>
            <span class="text"><b>Tambah Data Barang</b></span>
        </a>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pesanan</th>
                        <th>Total Harga</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>No</th>
                        <th>Tanggal Pesanan</th>
                        <th>Total Harga</th>
                        <th>Detail</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php
                    // Menampilkan data barang
                        $i = 0;
                        foreach ($dataPenjualan as $penjualan) {
                            $i += 1;
                    ?>
                    <tr>
                        <td hidden><?php echo $penjualan['id_penjualan']; ?></td>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $penjualan['tanggal_penjualan']; ?></td>
                        <td><?php echo $penjualan['total']; ?></td>
                        <td>
                            <!-- <a href="nota_pesanan.php?id_penjualan=<?php echo $penjualan['id_penjualan']; ?>" class="btn btn-sm btn-secondary btn-icon-split btn-round cetakbtn">
                                <span class="icon text-white-50">
                                    <img src="img/printer.png" alt="Icon" style="margin-right: 5px;" width="20" height="20">
                                </span>
                                <span class="text"><b>Cetak</b></span>
                            </a> -->
                            <a href="detail_penjualan.php?id_penjualan=<?php echo $penjualan['id_penjualan']; ?>" class="btn btn-sm btn-info btn-icon-split btn-round detailbtn">
                                <span class="icon text-white-50">
                                    <img src="img/detail.png" alt="Icon" style="margin-right: 5px;"  width="20" height="20">
                                </span>
                                <span class="text"><b>Detail</b></span>
                            </a>
                            <!-- <a href="#" id_barang="<?php echo $penjualan['id_barang']; ?>" class="btn btn-sm btn-warning btn-icon-split btn-round editbtn">
                                <span class="icon text-white-50">
                                    <img src="img/editing.png" alt="Icon" style="margin-right: 5px;"  width="20" height="20">
                                </span>
                                <span class="text"><b>Edit</b></span>
                            </a> -->
                            <a href="#" data-toggle="modal" data-target="#hapusModal" isi="<?php echo $penjualan['id_penjualan']; ?>" onclick="hapusData(this);" class="btn btn-sm btn-danger btn-icon-split btn-round">
                                <span class="icon text-white-50">
                                    <img src="img/delete.png" alt="Icon" style="margin-right: 5px;" width="20" height="20">
                                </span>
                                <span class="text"><b>Hapus</b></span>
                            </a>

                        </td>
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


</div>
<!-- End of Main Content -->

<?php
require 'footer.php';

$options = '';
foreach ($dataBarang as $penjualan) {
  $options .= '<option value="' . $penjualan['id_barang'] . '">' . $penjualan['nama_barang'] . '</option>';
}
?>

<script>
    $(document).ready(function() {
        var counter = 1; // Variabel untuk menghitung jumlah form yang telah ditambahkan
        var options = '<?php echo $options; ?>';
        let total = 0; 
        let harga = 0; 

        // Fungsi untuk menambahkan input nama_barang dan harga_barang baru
        function tambahBarangBaru() {
            var html =  '<div class="barang">' +
                            '<div class="form-floating mb-4">' +
                                '<label for="Nama">Nama Barang</label>' +
                                '<select class="form-control input-barang" id_name="id_barang" name="id_barang[]">' +
                                '<option value="">Pilih Barang</option>' +
                                options + // Masukkan options dari PHP ke dalam HTML JavaScript
                                '</select>' +
                            '</div>' +
                            '<input type="text" id="counter'+counter+'" class="form-control" name="counter" hidden>' +
                            '<div class="form-floating mb-4" style="margin-top: -10px;">' +
                                '<label for="Nama">Qty</label>' +
                                '<input type="text" id="qty" class="form-control qty" id_name="qty" name="qty[]" placeholder="">' +
                            '</div>'+
                            '<a class="btn btn-danger btn-icon-split btn-round btn-sm btnHapusBarang">'+
                                '<span class="icon text-white-50">'+
                                    '<img src="img/delete.png" alt="Icon" style="margin-right: 5px;" width="23" height="23">'+
                                '</span>'+
                                '<span class="text"><b>Hapus Form Barang</b></span>'+
                            '</a><hr>'+
                        '</div>';

            $('#dynamicForm').append(html);
            counter++;

            $('.input-barang').on('change', function() {
                const id_barang = $(this).val();

                // Kirim permintaan AJAX ke server untuk mendapatkan harga barang
                $.ajax({
                    url: 'get_harga_barang.php', // Ganti dengan URL file PHP Anda
                    method: 'POST', // Sesuaikan dengan metode yang Anda gunakan di file PHP (POST/GET)
                    data: { id_barang: id_barang },
                    success: function(response) {
                        // Respon dari server berhasil diterima
                        harga = parseInt(response);
                        console.log('Harga Barang:', harga);

                        // Lakukan operasi atau tindakan lain sesuai kebutuhan Anda
                        // Misalnya, tampilkan harga di elemen HTML tertentu
                        // $('#harga-barang').text(response); // Misalnya, ada elemen dengan id "harga-barang"
                    },
                    error: function(error) {
                        console.log('Error:', error);
                        // Tangani error jika diperlukan
                    }
                });
            });

            // Menambahkan event listener menggunakan jQuery untuk input dengan id="qty"
            $('.qty').on('change', function() {
                const value = $(this).val();
                harga = harga*parseInt(value);
                total = total+harga;
                console.log('Harganya:', harga);
                console.log('Totalnya:', total);
                // Lakukan operasi atau tindakan lain sesuai kebutuhan Anda
                // Mengisikan nilai total ke input dengan id "total"
                var ini_counter = '#counter'+counter;
                $(ini_counter).val(counter);
                $('#total').val(total);
            });

            
        }
        // Menambahkan event listener menggunakan jQuery untuk input dengan id="qty"



        // Aksi saat tombol "Tambah Barang" diklik
        $('#btnTambahBarang').on('click', function() {
            tambahBarangBaru();
        });

        // Aksi saat tombol "Hapus" pada setiap form diklik
        $(document).on('click', '.btnHapusBarang', function() {
            parentElement = $(this).parent();
            // Mendapatkan nilai dari input "counter" di dalam elemen parent
            // const counterValue = parseInt(parentElement.find('input[name="counter"]').val());
            // console.log(counterValue);
            parentElement.remove();
            counter--;
        });
    });
    function resetForm() {
        document.getElementById("tambah-form").reset();
    }
    // Event listener untuk tombol "Tambah Data Barang"
    $('#btn-tambah').on('click', function() {
        // Atur nilai total menjadi 0
        total = 0;
        harga = 0;
    });
</script>
<script>
    var dataId = "" 
    $(document).ready(function() {
        $('#btnGetValues').on('click', function() {
            // Mendapatkan semua elemen input dan select di dalam form dengan menggunakan jQuery
            var inputs = $('#tambah-form input, #tambah-form select');

            // Array untuk menyimpan data name dan value
            var data = [];

            // Loop melalui setiap elemen input dan select dan mendapatkan nilai valuenya
            inputs.each(function() {
                var name = $(this).attr('name');
                var value = $(this).val();

                // Menambahkan data name dan value ke dalam array data
                data.push({
                    name: name,
                    value: value
                });

            });
            // Hasil akhir dari array data bisa Anda gunakan sesuai kebutuhan Anda
            console.log(data);
            // Mengirim data ke tambah_penjualan.php menggunakan AJAX
            $.ajax({
                url: 'tambah_pesanan.php',
                method: 'POST', // Sesuaikan dengan method yang ingin Anda gunakan di server
                data: { data: data }, // Kirimkan data dalam bentuk objek
                success: function(response) {
                    // Tanggapan dari server (response) bisa Anda olah sesuai kebutuhan
                    console.log('Ini : ', response);
                },
                error: function(error) {
                    // Jika terjadi error saat mengirim data
                    console.log('Error:', error);
                }
            });
        });
        
        // Mengatur tindakan ketika tombol "Hapus" diklik
        var btnHapus = document.getElementById("btnHapus");
        btnHapus.onclick = function() {
            // Buat objek XMLHttpRequest atau gunakan fetch API jika Anda lebih memilih
            var xhr = new XMLHttpRequest();

            // Tetapkan fungsi callback untuk menangani respons dari server
            xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                //   alert(xhr.responseText); // Tampilkan pesan sukses dari server
                location.reload(); // Memuat ulang halaman setelah berhasil menghapus data
                } else {
                alert('Terjadi kesalahan: ' + xhr.status); // Tampilkan pesan kesalahan dari server
                }
            }
            };

            // Konfigurasi dan kirim permintaan AJAX ke file PHP yang akan menangani penghapusan data
            xhr.open('POST', 'delete_data_penjualan.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('data_id=' + dataId);

            // Menutup modal konfirmasi
            modal.style.display = "none";
        };
    });
    function hapusData(button) {
        dataId = button.getAttribute("isi");

        // Menampilkan modal konfirmasi
        var modal = document.getElementById("konfirmasiModal");
        modal.style.display = "block";

        return false; // Batalkan aksi href default pada hyperlink
    }
</script>
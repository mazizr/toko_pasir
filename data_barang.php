<?php 
require 'header.php';
// require 'db.php';

// Mengambil data barang
$dataBarang = getBarang();
$datacekStokBarang = cekStokBarang();
?>

<input id="stok-barang" type="hidden" value="<?php
                    // Menampilkan data barang
                        $i = 0;
                        foreach ($datacekStokBarang as $stok) {
                            $i += 1;
                            echo $stok['stoknya'];
                        }
                    ?>" name="stok-barang">
<!-- _____________________________________________________________________MODAL_____________________________________________________________________ -->

<!-- MODAL HAPUS -->
<div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="tambah_data_barang.php" id="myForm" method="POST">
            <div class="modal-body">    
                <div class="form-floating mb-4">
                    <label for="Nama">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="">
                </div>

                <input type="number" style="display: none;" class="form-control" name="jumlah_barang" value="0">

                <div class="form-floating mb-4">
                    <label for="Harga">Harga Barang</label>
                    <input type="number" class="form-control" name="harga_barang" placeholder="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-icon-split btn-success btn-round">
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

<!-- MODAL EDIT -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-primary">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="edit_data_barang.php" id="editForm" method="POST">
            <div class="modal-body">    
                <input type="number" style="display: none;" id="id_barang" class="form-control" name="id_barang">
            
                <div class="form-floating mb-4">
                    <label for="Nama">Nama Barang</label>
                    <input type="text" id="nama_barang" class="form-control" name="nama_barang" placeholder="">
                </div>

                <input type="number" style="display: none;" id="jumlah_barang" class="form-control" name="jumlah_barang">

                <div class="form-floating mb-4">
                    <label for="Harga">Harga Barang</label>
                    <input type="number" id="harga_barang" class="form-control" name="harga_barang" placeholder="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-icon-split btn-success btn-round">
                    <span class="icon text-white-50">
                        <img src="img/check.png" alt="Icon" style="vertical-align: middle; margin-right: 5px;"  width="20" height="20">
                    </span>
                    <span class="text"><b>Edit</b></span>
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
<!-- MODAL EDIT END -->

<!-- _____________________________________________________________________MODAL END_____________________________________________________________________ -->

<!-- Content Row -->
  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="tambah_data_barang.php" data-toggle="modal" data-target="#tambahModal" class="btn btn-primary btn-icon-split btn-round">
                <span class="icon text-white-50">
                    <img src="img/add.png" alt="Icon" style="vertical-align: middle; margin-right: 5px;"  width="27" height="27">
                </span>
                <span class="text"><b>Tambah Data Barang</b></span>
            </a>
            <!-- <a href="tambah_data_barang.php">
                <button style="display: flex; align-items: center;" class="btn btn-round btn-primary">
                    <!-- <img src="" style="vertical-align: middle; margin-right : 5px;"> Tambah Data Barang -->
                    <!-- <img src="img/add.png" alt="Icon" style="vertical-align: middle; margin-right: 5px;"  width="27" height="27"> Tambah Data Barang -->
                <!-- </button> -->
            <!-- </a> -->
        </h6>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang></th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th style="width: 250px;">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th style="width: 250px;">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    // Menampilkan data barang
                        $i = 0;
                        foreach ($dataBarang as $barang) {
                            $i += 1;
                    ?>
                    <tr>
                        <td hidden><?php echo $barang['id_barang']; ?></td>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $barang['nama_barang']; ?></td>
                        <td><?php echo $barang['jumlah_barang']; ?></td>
                        <td><?php echo $barang['harga_barang']; ?></td>
                        <td>
                            <a href="#" id_barang="<?php echo $barang['id_barang']; ?>" class="btn btn-warning btn-icon-split btn-round btn-sm editbtn">
                                <span class="icon text-white-50">
                                    <img src="img/editing.png" alt="Icon" style="margin-right: 5px;"  width="23" height="23">
                                </span>
                                <span class="text"><b>Edit</b></span>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#konfirmasiModal" isi="<?php echo $barang['id_barang']; ?>" onclick="hapusData(this);" class="btn btn-danger btn-icon-split btn-round btn-sm">
                                <span class="icon text-white-50">
                                    <img src="img/delete.png" alt="Icon" style="margin-right: 5px;" width="23" height="23">
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
?>

<script>
    $(document).ready(function () {
      var stokValue = document.getElementById("stok-barang").value;
      console.log("Ini stok : ", stokValue)
        $('.editbtn').on('click', function () {
            // alert("Masuk");
            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#id_barang').val(data[0]);
            $('#nama_barang').val(data[2]);
            $('#jumlah_barang').val(data[3]);
            $('#harga_barang').val(data[4]);
        });
    });
</script>

<script>
function resetForm() {
  document.getElementById("myForm").reset();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $namaBarang = $_POST['nama_barang'];
  $jumlahBarang = $_POST['jumlah_barang'];
  $hargaBarang = $_POST['harga_barang'];
  insertBarang($namaBarang, $hargaBarang, $jumlahBarang);
}
function tambahData(button) {
  var dataId = button.getAttribute("isi");

  // Menampilkan modal konfirmasi
  var modal = document.getElementById("konfirmasiModal");
  modal.style.display = "block";

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
    xhr.open('POST', 'delete_data.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('data_id=' + dataId);

    // Menutup modal konfirmasi
    modal.style.display = "none";
  };

  return false; // Batalkan aksi href default pada hyperlink
}
function hapusData(button) {
  var dataId = button.getAttribute("isi");

  // Menampilkan modal konfirmasi
  var modal = document.getElementById("konfirmasiModal");
  modal.style.display = "block";

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
    xhr.open('POST', 'delete_data.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('data_id=' + dataId);

    // Menutup modal konfirmasi
    modal.style.display = "none";
  };

  return false; // Batalkan aksi href default pada hyperlink
}
</script>
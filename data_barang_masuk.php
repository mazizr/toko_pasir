<?php 
require 'header.php';
// require 'db.php';

// Mengambil data barang
$dataBarangMasuk = getBarangMasuk();
$dataBarang = getBarang();
?>

<!-- _____________________________________________________________________MODAL_____________________________________________________________________ -->

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

<!-- MODAL TAMBAH -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-primary">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="tambah_data_barang_masuk.php" id="myForm" method="POST">
            <div class="modal-body"> 
              <div class="form-floating mb-4">
                <label for="Nama">Nama Barang</label>
                <select class="form-control" name="id_barang">;
                  <option value="">Pilih Barang</option>;
                  <?php
                    foreach ($dataBarang as $barang) {
                  ?>
                      <option value="<?php echo $barang['id_barang']; ?>"><?php echo $barang['nama_barang']; ?></option>
                  <?php
                    }
                  ?>
                </select>
              </div> 

              <div class="form-floating mb-4">
                  <label for="Harga">Jumlah Pertambahan</label>
                  <input type="number" class="form-control" name="jumlah_pertambahan" placeholder="">
              </div>

              <div class="form-floating mb-4">
                  <label for="Harga">Tanggal Pertambahan</label>
                  <input type="date" class="form-control" name="tanngal_pertambahan" placeholder="">
              </div>
              <input type="text" style="display: none;" class="form-control" name="id_karyawan" value="<?php echo $_SESSION['id']; ?>">

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
        <form action="edit_data_barang_masuk.php" id="myForm" method="POST">
            <div class="modal-body">    
              <input type="text" style="display: none;" class="form-control" id="id_barang_masuk" name="id_barang_masuk" value="<?php echo $_SESSION['id']; ?>">
              <div class="form-floating mb-4">
                <label for="Nama">Nama Barang</label>
                <select class="form-control" id="id_barang" name="id_barang">;
                  <option value="">Pilih Barang</option>;
                  <?php
                    foreach ($dataBarang as $barang) {
                  ?>
                      <option value="<?php echo $barang['id_barang']; ?>"><?php echo $barang['nama_barang']; ?></option>
                  <?php
                    }
                  ?>
                </select>
              </div> 

              <div class="form-floating mb-4">
                  <label for="Harga">Jumlah Pertambahan</label>
                  <input type="number" class="form-control" id="jumlah_pertambahan" name="jumlah_pertambahan" placeholder="">
              </div>
              <input type="text" style="display: none;" class="form-control" id="jumlah_sebelum" name="jumlah_sebelum">
                    
              <div class="form-floating mb-4">
                  <label for="Harga">Tanggal Pertambahan</label>
                  <input type="date" class="form-control" id="tanngal_pertambahan" name="tanngal_pertambahan" placeholder="">
              </div>
              <input type="text" style="display: none;" class="form-control" id="id_karyawan" name="id_karyawan" value="<?php echo $_SESSION['id']; ?>">
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
                <span class="text"><b>Tambah Data Barang Masuk</b></span>
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
                        <th>Nama Barang</th>
                        <th>Jumlah Pertambahan</th>
                        <th>Tanggal Pertambahan</th>
                        <th>Penanggung Jawab</th>
                        <th style="width: 250px;">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Pertambahan</th>
                        <th>Tanggal Pertambahan</th>
                        <th>Penanggung Jawab</th>
                        <th style="width: 250px;">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    // Menampilkan data barang
                        $i = 0;
                        foreach ($dataBarangMasuk as $barang_masuk) {
                            $i += 1;
                    ?>
                    <tr>
                        <td hidden><?php echo $barang_masuk['id_barang_masuk']; ?></td>
                        <td hidden><?php echo $barang_masuk['id_barang']; ?></td>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $barang_masuk['nama_barang']; ?></td>
                        <td><?php echo $barang_masuk['jumlah_pertambahan']; ?></td>
                        <td><?php echo $barang_masuk['tanngal_pertambahan']; ?></td>
                        <td><?php echo $barang_masuk['nama_karyawan']; ?></td>
                        <td>
                            <!-- <a href="tambah_data_barang.php" class="btn btn-info btn-icon-split btn-round">
                                <span class="icon text-white-50">
                                    <img src="img/file.png" alt="Icon" style="margin-right: 5px;"  width="25" height="25">
                                </span>
                                <span class="text">Detail</span>
                            </a> -->
                            <a href="#" onclick="editBarang(this);" id_barang_masuk="<?php echo $barang_masuk['id_barang_masuk']; ?>" class="btn btn-sm btn-warning btn-icon-split btn-round editbtn">
                                <span class="icon text-white-50">
                                    <img src="img/editing.png" alt="Icon" style="margin-right: 5px;"  width="22" height="22">
                                </span>
                                <span class="text"><b>Edit</b></span>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#hapusModal" isi="<?php echo $barang_masuk['id_barang_masuk']; ?>" id_barang="<?php echo $barang_masuk['id_barang']; ?>" jumlah_pertambahan="<?php echo $barang_masuk['jumlah_pertambahan']; ?>" onclick="hapusData(this);" class="btn btn-danger btn-icon-split btn-round btn-sm">
                                <span class="icon text-white-50">
                                    <img src="img/delete.png" alt="Icon" style="margin-right: 5px;" width="22" height="22">
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

        $('.editbtn').on('click', function () {
            // alert("Masuk");
            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#id_barang_masuk').val(data[0]);
            $('#id_barang').val(data[1]);
            $('#jumlah_pertambahan').val(data[4]);
            $('#jumlah_sebelum').val(data[4]);
            $('#tanngal_pertambahan').val(data[5]);
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
  var modal = document.getElementById("hapusModal");
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
  // alert("masuk");
  var dataId = button.getAttribute("isi");
  var id_barang = button.getAttribute("id_barang");
  var jumlah_pertambahan = button.getAttribute("jumlah_pertambahan");
  // alert(jumlah_pertambahan);

  // Menampilkan modal konfirmasi
  var modal = document.getElementById("hapusModal");
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

    var dataToSend = 'data_id=' + encodeURIComponent(dataId) + '& data_id_barang=' + encodeURIComponent(id_barang) + '& data_jumlah_pertambahan=' + encodeURIComponent(jumlah_pertambahan);

    // Konfigurasi dan kirim permintaan AJAX ke file PHP yang akan menangani penghapusan data
    xhr.open('POST', 'delete_data_barang_masuk.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(dataToSend);

    // Menutup modal konfirmasi
    modal.style.display = "none";
  };

  return false; // Batalkan aksi href default pada hyperlink
}
</script>
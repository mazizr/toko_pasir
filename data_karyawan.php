<?php 
require 'header.php';
// require 'db.php';

// Mengambil data barang
$dataKaryawan = getKaryawan();
?>

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
        <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Data Karyawan</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="tambah_data_karyawan.php" id="myForm" method="POST">
            <div class="modal-body">    
                <div class="form-floating mb-4">
                    <label for="Nama"><strong>Nama Karyawan</strong></label>
                    <input required type="text" class="form-control" name="nama_karyawan" placeholder="" >
                </div>

                <div class="form-floating mb-4">
                    <label for="Harga"><strong>No Telp</strong></label>
                    <input required type="text" class="form-control" name="no_telp" placeholder="" >
                </div>
                
                <div class="form-floating mb-4">
                    <label for="Harga"><strong>Alamat</strong></label>
                    <input required type="text" class="form-control" name="alamat" placeholder="" >
                </div>

                <div class="form-floating mb-4">
                    <label for="Harga"><strong>Nama Pengguna</strong></label>
                    <input required type="text" class="form-control" name="username" placeholder="" >
                </div>

                <div class="form-floating mb-4">
                    <label for="Harga"><strong>Kata Sandi</strong></label>
                    <input required type="text" class="form-control" name="password" placeholder="" >
                </div>
                
                <div class="form-floating mb-4">
                    <label for="Harga"><strong>Role</strong></label><br>
                    <div class="d-inline custom-control custom-radio">
                        <input required type="radio" id="pemilik" name="role" class="custom-control-input" value="pemilik">
                        <label style="margin-right: 5px;" class="custom-control-label" for="pemilik">Pemilik</label>
                    </div>
                    <div class="d-inline custom-control custom-radio">
                        <input required type="radio" id="karyawan" name="role" class="custom-control-input" value="karyawan">
                        <label class="custom-control-label" for="karyawan">Karyawan</label>
                    </div>
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
        <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Data Karyawan</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="edit_data_karyawan.php" id="myForm" method="POST">
            <div class="modal-body">    
                <input required type="number" style="display: none;" id="kode_karyawan" class="form-control" name="kode_karyawan">
                <div class="form-floating mb-4">
                    <label for="Nama"><strong>Nama Karyawan</strong></label>
                    <input required type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="">
                </div>

                <div class="form-floating mb-4">
                    <label for="Harga"><strong>No Telp</strong></label>
                    <input required type="text" class="form-control" id="no_telp" name="no_telp" placeholder="">
                </div>
                
                <div class="form-floating mb-4">
                    <label for="Harga"><strong>Alamat</strong></label>
                    <input required type="text" class="form-control" id="alamat" name="alamat" placeholder="">
                </div>

                <div class="form-floating mb-4">
                    <label for="Harga"><strong>Nama Pengguna</strong></label>
                    <input required type="text" class="form-control" id="username" name="username" placeholder="">
                </div>

                <div class="form-floating mb-4">
                    <label for="Harga"><strong>Kata Sandi</strong></label>
                    <input required type="text" class="form-control" id="password" name="password" placeholder="">
                </div>
                
                <div class="form-floating mb-4">
                    <label for="Harga"><strong>Role</strong></label><br>
                    <div class="d-inline custom-control custom-radio">
                        <input required type="radio" id="edit-pemilik" name="edit-role" class="custom-control-input" value="pemilik">
                        <label style="margin-right: 5px;" class="custom-control-label" for="edit-pemilik">Pemilik</label>
                    </div>
                    <div class="d-inline custom-control custom-radio">
                        <input required type="radio" id="edit-admin" name="edit-role" class="custom-control-input" value="karyawan">
                        <label class="custom-control-label" for="edit-admin">Karyawan</label>
                    </div>
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
            <a data-toggle="modal" data-target="#tambahModal" class="btn btn-primary btn-icon-split btn-round">
                <span class="icon text-white-50">
                    <img src="img/add.png" alt="Icon" style="vertical-align: middle; margin-right: 5px;"  width="27" height="27">
                </span>
                <span class="text"><b>Tambah Data Karyawan</b></span>
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
                        <th>Nama Kayawan</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Nama Pengguna</th>
                        <th>Kata Sandi</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    // Menampilkan data barang
                        $i = 0;
                        foreach ($dataKaryawan as $karyawan) {
                            $i += 1;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $karyawan['nama_karyawan']; ?></td>
                        <td><?php echo $karyawan['no_telp']; ?></td>
                        <td><?php echo $karyawan['alamat']; ?></td>
                        <td><?php echo $karyawan['nama_pengguna']; ?></td>
                        <td><?php echo $karyawan['kata_sandi']; ?></td>
                        <td><?php echo $karyawan['role']; ?></td>
                        <td>
                            <a href="#" kode_karyawan="<?php echo $karyawan['kode_karyawan']; ?>" class="btn btn-sm btn-warning btn-icon-split btn-round btn-sm editbtn">
                                <span class="icon text-white-50">
                                    <img src="img/editing.png" alt="Icon" style="margin-right: 5px;"  width="21" height="21">
                                </span>
                                <span class="text"><b>Edit</b></span>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#konfirmasiModal" isi="<?php echo $karyawan['kode_karyawan']; ?>" onclick="hapusData(this);" class="btn btn-sm btn-danger btn-icon-split btn-round btn-sm">
                                <span class="icon text-white-50">
                                    <img src="img/delete.png" alt="Icon" style="margin-right: 5px;" width="21" height="21">
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

            var kodeKaryawan = $(this).attr("kode_karyawan");

            $('#kode_karyawan').val(kodeKaryawan);
            $('#nama_karyawan').val(data[1]);
            $('#no_telp').val(data[2]);
            $('#alamat').val(data[3]);
            $('#username').val(data[4]);
            $('#password').val(data[5]);

            function setRadioValue(value) {
              // Dapatkan elemen radio berdasarkan atribut name
              var radioButtons = document.getElementsByName("edit-role");

              // Loop melalui elemen radio untuk menemukan yang sesuai dengan nilai yang diinginkan
              for (var i = 0; i < radioButtons.length; i++) {
                if (radioButtons[i].value === value) {
                  // Set properti "checked" menjadi "true" untuk menandai radio button yang sesuai
                  radioButtons[i].checked = true;
                  break; // Keluar dari loop setelah menemukan radio button yang sesuai
                }
              }
            }

            // Contoh penggunaan fungsi untuk mengatur radio button
            setRadioValue(data[6]);
        });
    });
</script>

<script>
function resetForm() {
  document.getElementById("myForm").reset();
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
          Swal.fire({
            icon: 'success', // Ikon SweetAlert success
            title: 'Berhasil!',
            text: 'Hapus Data Berhasil.', // Pesan yang ingin Anda tampilkan
          }).then(() => {
            location.reload();
          });
        } else {
          alert('Terjadi kesalahan: ' + xhr.status); // Tampilkan pesan kesalahan dari server
        }
      }
    };

    // Konfigurasi dan kirim permintaan AJAX ke file PHP yang akan menangani penghapusan data
    xhr.open('POST', 'delete_data_karyawan.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('data_id=' + dataId);

    // Menutup modal konfirmasi
    modal.style.display = "none";
  };

  return false; // Batalkan aksi href default pada hyperlink
}
</script>

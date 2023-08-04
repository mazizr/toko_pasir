<?php 
require 'header.php';
?>

<!-- Content Row -->
  <!-- Begin Page Content -->
  <div class="container-fluid">
                                       
<div class="form-floating mb-4">
  <label for="Kode1">Kode Transaksi</label>
  <input type="text" class="form-control" id="Kode1" placeholder="KOOK12411201" disabled> 
</div>  

<div class="form-floating mb-4">
  <label for="Kode1">Tanggal</label>
  <input type="text" class="form-control" id="Kode1" placeholder="10/02/1002" disabled> 
</div>  

<div class="form-floating mb-4">
  <label for="Nama">Nama Barang</label>
  <input type="text" class="form-control" id="Nama" placeholder="">
</div>

<div class="form-floating mb-4">
  <label for="Jumlah">Jumlah Barang</label>
  <input type="text" class="form-control" id="Jumlah" placeholder="">
</div>

<div class="form-floating mb-4">
  <label for="Harga">Harga Barang</label>
  <input type="number" class="form-control" id="Harga" placeholder="">
</div>

<div class="form-floating mb-4">
  <label for="Harga">Total Harga</label>
  <input type="number" class="form-control" id="Harga" placeholder="">
</div>

<div class="form-floating mb-4">
  <label for="nm">Nama Kasir</label>
  <input type="text" class="form-control" id="nm" placeholder="">
</div>

<button class="btn btn-danger">Hapus</button>
<button class="btn btn-success">Kirim</button>

</div>


<?php
require 'footer.php';
?>
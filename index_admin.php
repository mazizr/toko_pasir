<?php
require 'header.php';
// require 'db.php';
?>
     
     <!-- Begin Page Content -->
               <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Barang Harus Direstok</div>
                        <div class="h2 mb-0 font-weight-bold text-gray-800">6</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Akumulasi Biaya</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800">Rp. 215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Nama</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Nama</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>koo1</td>
                        <td>Pensil</td>
                        <td>27</td>
                        <td>27.000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>koo1</td>
                        <td>Pensil</td>
                        <td>27</td>
                        <td>27.000</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>koo1</td>
                        <td>Pensil</td>
                        <td>27</td>
                        <td>27.000</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>koo1</td>
                        <td>Pensil</td>
                        <td>27</td>
                        <td>27.000</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>koo1</td>
                        <td>Pensil</td>
                        <td>27</td>
                        <td>27.000</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>koo1</td>
                        <td>Pensil</td>
                        <td>27</td>
                        <td>27.000</td>
                    </tr>
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
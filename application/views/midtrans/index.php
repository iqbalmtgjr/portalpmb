<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <?php echo $this->session->flashdata('pesan'); ?>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Transaksi Midtrans</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <input type="hidden" class="form-control input-sm" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Order Id</th>
                                    <th>Nama Siswa</th>
                                    <th>Email</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Status Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- /.control-sidebar -->
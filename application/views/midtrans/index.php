<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <?php echo $this->session->flashdata('pesan'); ?>
        </div>
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Transaksi Midtrans</h3>
                </div>
                <div class="card-body">
                    <div class="float-right">
                        <a href="<?php echo base_url(); ?>midtrans/cekTransaksi" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i> Refresh Transaksi
                        </a>
                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <input type="hidden" class="form-control input-sm" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th></th>
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

<?php echo form_open('midtrans/hapus', 'id="add-row-form"'); ?>
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Hapus Transaksi Midtrans</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="order_id" class="form-control" required>
                <strong>Apakah Anda yakin akan menghapus data transaksi ini?</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-success">Hapus</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
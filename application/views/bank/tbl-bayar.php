<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->session->set_userdata('referred_from', current_url()); ?>
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
                    <h3 class="card-title"><?php if (!empty($jdl)) {
                                                echo $jdl;
                                            } ?></h3>
                    <?php if ($bank == 'index') { ?><a href="<?php echo base_url(); ?>bank/pdfbelum.html" class="btn btn-info float-right" target="_blank">Download PDF</a> <?php } ?>
                    <?php if ($bank == 'valid') { ?><a href="<?php echo base_url(); ?>bank/pdfvalid.html" class="btn btn-info float-right" target="_blank">Download PDF</a> <?php } ?>
                    <?php if ($bank == 'validtes') { ?><a href="<?php echo base_url(); ?>bank/pdfvalidbayartes.html" class="btn btn-info float-right" target="_blank">Download PDF</a> <?php } ?>
                    <?php if ($bank == 'tidak') { ?><a href="<?php echo base_url(); ?>bank/pdftidak.html" class="btn btn-info float-right" target="_blank">Download PDF</a> <?php } ?>
                    <?php if ($bank == 'semua') { ?><a href="<?php echo base_url(); ?>bank/pdfsemua.html" class="btn btn-info float-right" target="_blank">Download PDF</a> <?php } ?>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <input type="hidden" class="form-control input-sm" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th></th>
                                    <th></th>
                                    <th>No. Referensi</th>
                                    <th>Nama Pengirim</th>
                                    <th>Bank Pengirim</th>
                                    <th>Jumlah (Rp.)</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Tindakan</th>
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
<!-- Modal delete-->
<?php echo form_open('bank/hapus', 'id="add-row-form"'); ?>
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Hapus Data Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idall" class="form-control" required>
                <strong>Apakah Anda yakin akan menghapus data ini?</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-success">Hapus</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
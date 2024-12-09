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
                    <h3 class="card-title">Jalur Tes Gelombang 3 Lulus </h3>
                    <a href="<?php echo base_url(); ?>bank/pdfwebtiga" class="btn btn-info float-right mr-1" target="_blank">WEB PENGUMUMAN PDF</a>
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
                                    <th>Nama</th>
                                    <th>Pilihan I</th>
                                    <th>Pilihan II</th>
                                    <th>Status Penerimaan</th>
                                    <th>Status Diumumkan</th>
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
<!-- Modal delete Berita-->
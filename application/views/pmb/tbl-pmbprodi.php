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
                    <h3 class="card-title">Daftar Pendaftar PMB Prodi <?php if (!empty($pmb)) {
                                                                            echo $pmb;
                                                                        } ?></h3>
                    <a href="<?= base_url() ?>masterpmb/exportprodi/<?= $prodi ?>.html" class="btn btn-success float-right ml-2" target="_blank"><i class="fas fa-file-excel pr-2"></i>Export Excel Siakad</a>
                    <a href="<?= base_url() ?>masterpmb/exportlulus/<?= $prodi ?>.html" class="btn btn-success float-right" target="_blank"><i class="fas fa-file-excel pr-2"></i>Export Excel Lulus</a>
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
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Pilihan I</th>
                                    <th>Pilihan II</th>
                                    <th>Jalur</th>
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
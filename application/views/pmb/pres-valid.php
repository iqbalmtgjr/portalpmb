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
                    <?php
                    $gelombang = $this->session->userdata('filter_gel');
                    ?>
                    <h3 class="card-title">Daftar Calon Mahasiswa Jalur Prestasi <?php if (!empty($jdl)) {
                                                                                        echo $jdl;
                                                                                    } ?> dengan Pembayaran Tervalidasi</h3>
                    <a href="<?php echo base_url();
                                ?>masterpmb/pdfpresvalid.html" class="btn btn-danger float-right" target="_blank"><i class="far fa-file-pdf"></i>&nbsp; Export Bukti Bayar PDF</a>
                    <a href="<?php echo base_url(); ?>masterpmb/pdfprestasivalid/<?= $gelombang ?>" class="mr-2 btn btn-success float-right" target="_blank"><i class="far fa-file-pdf"></i>&nbsp; Export PDF</a>
                    <a href="<?php echo base_url(); ?>masterpmb/pdfmetodebayarprestasi/<?= $gelombang ?>" class="mr-2 btn btn-info float-right" target="_blank"><i class="far fa-file-pdf"></i>&nbsp; Export Metode Bayar</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-2">
                            <h4>Filter</h4>
                        </div>
                        <div class="col-4">
                            <form action="<?php echo base_url(); ?>masterpmb/set_gelombang" method="post">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                                <select name="filter_gel" id="" class="form-control">
                                    <option value="">-- Pilih Gelombang --</option>
                                    <option value="1" <?php if ($this->session->userdata('filter_gel') == '1') {
                                                            echo "selected";
                                                        } ?>>Gelombang I</option>
                                    <option value="2" <?php if ($this->session->userdata('filter_gel') == '2') {
                                                            echo "selected";
                                                        } ?>>Gelombang II</option>
                                    <option value="3" <?php if ($this->session->userdata('filter_gel') == '3') {
                                                            echo "selected";
                                                        } ?>>Gelombang III</option>
                                </select>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-md">Pilih</button>
                        </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <input type="hidden" class="form-control input-sm" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th></th>
                                    <th></th>
                                    <th>No. Pendaftaran</th>
                                    <th>Nama</th>
                                    <th>Pilihan I</th>
                                    <th>Pilihan II</th>
                                    <th>Gel</th>
                                    <th>Metode Bayar</th>
                                    <th>Keputusan</th>
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
<?php echo form_open('masterpmb/hapus', 'id="add-row-form"'); ?>
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Hapus Calon Maba</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="maba_id" class="form-control" required>
                <strong>Apakah Anda yakin akan menghapus data calon maba ini?</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-success">Hapus</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
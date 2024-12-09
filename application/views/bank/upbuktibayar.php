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
                    <h4 class="card-title">Nomor Referensi <?php echo ucfirst($gam->nomor_refe); ?></h4>
                </div>
                <?php echo form_open_multipart('bank/ungbukti/' . $gam->id_bukti_bayar, 'class="form-horizontal"'); ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-2 m-t-15"></label>
                        <div class="col-lg-4">
                            <?php if (!empty($gam->bukti_bayar)) { ?>
                                <img src="https://daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/<?php echo $gam->bukti_bayar; ?>" class="img-fluid img-thumbnail">
                            <?php } else { ?>
                                <p>Bukti Transaksi Belum Diupload</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-sm-3 text-right control-label col-form-label">Unggah Foto</label>
                        <div class="col-md-9">
                            <span class="font-italic">Format file jpg/jpeg. Maksimal ukuran file: 5MB</span>
                            <?php if (!empty($error)) {
                                echo $error;
                            } ?>
                            <div class="custom-file">
                                <input type="file" name="userfile" class="custom-file-input" id="customFile">
                                <input type="hidden" name="file_name" />
                                <label class="custom-file-label" for="customFile">Pilih gambar</label>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-info" id="btn-submit"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>



        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
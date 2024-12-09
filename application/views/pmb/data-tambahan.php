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
            <?php echo form_open(current_url(), 'class="form-horizontal"'); ?>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Tambahan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jalur<strong class="text-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select name="jalur" class="form-control" id="">
                                        <option value="prestasi" <?= $siswa->jalur == 'prestasi' ? 'selected' : '' ?>>Prestasi</option>
                                        <option value="test" <?= $siswa->jalur == 'test' ? 'selected' : '' ?>>Tes</option>
                                        <option value="reguler2" <?= $siswa->jalur == 'reguler2' ? 'selected' : '' ?>>Reguler 2</option>
                                    </select>
                                    <?php echo form_error('jalur'); ?>
                                </div>
                            </div>
                            <!-- </div> -->
                            <div class="form-group row align-middle">
                                <label for="inputGelombang" class="col-sm-2 col-form-label">Gelombang<strong class="text-red">*</strong></label>
                                <div class="col-sm-10 ">
                                    <input type="number" class="form-control" id="inputGelombang" name="gelombang" placeholder="Gelombang" value="<?php if (!empty($siswa->gelombang)) {
                                                                                                                                                        echo $siswa->gelombang;
                                                                                                                                                    } else {
                                                                                                                                                        echo set_value('gelombang');
                                                                                                                                                    } ?>">
                                    <?php echo form_error('gelombang'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="metode_bayar" class="col-sm-2 col-form-label">Metode Bayar<strong class="text-red">*</strong></label>
                                <div class="col-sm-10">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="metode_bayar" value="1" <?php if (!empty($siswa->metode_bayar) && $siswa->metode_bayar == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } else {
                                                                                                                            echo  set_radio('metode_bayar', 1);
                                                                                                                        } ?>>Panitia PMB
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="metode_bayar" value="2" <?php if (!empty($siswa->metode_bayar) && $siswa->metode_bayar == 2) {
                                                                                                                            echo "checked";
                                                                                                                        } else {
                                                                                                                            echo  set_radio('metode_bayar', 2);
                                                                                                                        } ?>>Transfer Bank
                                        </label>
                                    </div>
                                    <?php echo form_error('metode_bayar'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?php echo base_url(); ?>masterpmb/lihatsiswa/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-secondary ">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right">SIMPAN</button>
                        </div>
                        <!-- /.card-footer -->

                    </div>
                    <!-- /.card -->

                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <?php echo form_close(); ?>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
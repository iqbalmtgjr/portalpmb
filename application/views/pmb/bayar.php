<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <?php echo $this->session->flashdata('pesan'); ?>
            <?php if (!empty($gam->upload_id_siswa)) {
                $alam = $gam->upload_id_siswa;
            } else {
                $alam = $alamat;
            }

            ?>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Data Anda</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Pendaftaran</label>
                        <div class="col-sm-8">
                            <span class="form-control"><?php echo $dnama->ref; ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Jalur Pendaftaran</label>
                        <div class="col-sm-8">
                            <span class="form-control"><?php echo ucfirst($dnama->jalur); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <span class="form-control"><?php echo $dnama->nama_siswa; ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">NISN</label>
                        <div class="col-sm-8">
                            <span class="form-control"><?php echo $dnama->nis_siswa; ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Program Studi Pilihan I</label>
                        <div class="col-sm-8">
                            <span class="form-control"><?php echo $prodi1->nama_prodi; ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Program Studi Pilihan II</label>
                        <div class="col-sm-8">
                            <span class="form-control"><?php echo $prodi2->nama_prodi; ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Biaya Pendaftaran</label>
                        <div class="col-sm-8">
                            <?php if ($dnama->jalur == 'test') { ?>
                                <span class="form-control">Rp. 250.000</span>
                            <?php } elseif ($dnama->jalur == 'reguler2') { ?>
                                <span class="form-control">Rp. 250.000</span>
                            <?php } else { ?>
                                <span class="form-control">Rp. 200.000</span>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">Metode Pembayaran</label>
                        <div class="col-sm-8">
                            <span class="form-control"><?php if ($dnama->metode_bayar == "1") {
                                                            echo "Panitia PMB";
                                                        } elseif ($dnama->metode_bayar == "2") {
                                                            echo "Transfer Bank";
                                                        } else {
                                                            echo "Belum memilih metode pembayaran";
                                                        } ?></span>
                        </div>
                    </div>
                    <?php if ($dnama->metode_bayar == "1") { ?>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Validasi Pembayaran</label>
                            <div class="col-sm-8">
                                <?php if ($dnama->valid_bayar == "2") { ?>
                                    <span class="form-control text-info">Valid</span>
                                <?php } elseif ($dnama->valid_bayar == "3") { ?>
                                    <span class="form-control text-danger">Tidak Valid</span>
                                <?php } else { ?>
                                    <span class="form-control text-warning">Belum divalidasi</span>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($dnama->metode_bayar == "2") { ?>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Validasi Pembayaran</label>
                            <div class="col-sm-8">
                                <?php if ($dnama->valid_bayar == "2") { ?>
                                    <span class="form-control text-info">Valid</span>
                                <?php } elseif ($dnama->valid_bayar == "3") { ?>
                                    <span class="form-control text-danger">Tidak Valid</span>
                                <?php } else { ?>
                                    <span class="form-control text-warning">Belum divalidasi</span>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (!empty($dnama->metode_bayar)) { ?>
                        <?php echo form_open('masterpmb/validkan/' . $dnama->akun_siswa, 'class="form-horizontal"'); ?>
                        <div class="form-group row">
                            <label for="metod" class="col-sm-2">Validasi Pembayaran</label>
                            <div class="col-sm-10">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sah" value="2">VALID
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="sah" value="3">TIDAK VALID
                                    </label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $dnama->akun_siswa; ?>">
                        <button type="submit" class="btn btn-info">SIMPAN</button>
                        <?php echo form_close(); ?>
                    <?php } ?>
                    <?php if (!empty($sukses)) { ?>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Validasi Pembayaran</label>
                            <div class="col-sm-8">
                                <span class="form-control text-info">Valid</span>
                            </div>
                        </div>
                    <?php } ?>

                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.container-fluid -->


        <div class="container-fluid">
            <?php if (empty($sukses)) { ?>
                <div class="row">

                    <div class="col-md-6">
                        <div class="card bg-gradient-info">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-file-upload"></i>
                                    BUKTI PEMBAYARAN
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pb-0">
                                <span>Format file : .jpg, besar file maksimal 5MB</span>
                                <?php echo form_open_multipart('masterpmb/buktibayartest1/' . $alam, 'class="form-horizontal"'); ?>
                                <div class="form-group">
                                    <?php echo $this->session->flashdata('error_bukti'); ?>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="userfile" class="custom-file-input" id="customFile">
                                            <input type="hidden" name="file_name" />
                                            <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="input-group-text text-info" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                <?php if (!empty($transak)) {
                                    $bukti = $transak->row();
                                    if (!empty($bukti->pembayaran_upload)) { ?>
                                        <img class="img-fluid mb-3" src="https://daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/<?php echo $bukti->pembayaran_upload; ?>" alt="Bukti bayar" style="max-width: 300px;"><br>
                                        <a href="https://daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/<?php echo $bukti->pembayaran_upload; ?>" target="_blank" class="btn btn-warning mb-2">Lihat Bukti Bayar</a>

                                <?php    }
                                } ?>

                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-money-check"></i>
                                    DATA BANK
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-0">
                                <!--The calendar -->
                                <p>BANK KALBAR</p>
                                <p>CABANG SINTANG</p>
                                <p>REKENING :<b> 4 0 1 0 0 0 6 5 1 7</b></p>
                                <p>ATAS NAMA: PRKMPULN BDN PEND KARYA BANGSA</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            <?php  } ?>

        </div><!-- /.container-fluid -->


    </div>
    <!-- /.content -->
</div>
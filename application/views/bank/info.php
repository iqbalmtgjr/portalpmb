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
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Transaksi <?php echo $dnama->nomor_refe; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <?php
                        $jlmfotal = 0;
                        $jlmfotaltes = 0;
                        ?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Pengirim</label>
                                <div class="col-sm-8">
                                    <span class="form-control"><?php echo ucfirst($dnama->nama_pengirim); ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Bank Pengirim</label>
                                <div class="col-sm-8">
                                    <span class="form-control"><?php echo $dnama->bank_pengirim; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                                <div class="col-sm-8">
                                    <span class="form-control"><?php echo $dnama->tgl_trans; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jam Transaksi</label>
                                <div class="col-sm-8">
                                    <span class="form-control"><?php echo $dnama->jam_trans; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Referensi</label>
                                <div class="col-sm-8">
                                    <span class="form-control"><?php echo $dnama->nomor_refe; ?></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jumlah Pembayaran</label>
                                <div class="col-sm-8">
                                    <span class="form-control"><?php echo "Rp " . number_format($dnama->jlh_bayar, 2, ",", "."); ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Item Pembayaran</label>
                                <div class="col-sm-8">
                                    <span>
                                        <?php
                                        $si = 1;
                                        if (!empty($item)) {
                                            if ($dnama->jalur == "prestasi") {
                                                foreach ($item->result() as $item) { ?>
                                                    <p><?php echo $si++; ?>. <?php $fotal = $this->bank->item_rinci($item->jenis_bayar_rinci)->row();
                                                                                echo $fotal->item_biaya;
                                                                                $jlmfotal += $fotal->test_biaya; ?>, Semester <?php echo $item->smt_nama; ?> <?php echo $item->tahun_ajaran; ?> (<?php echo "Rp " . number_format($fotal->test_biaya, 2, ",", ".");  ?>)</p>
                                                <?php } ?>
                                                <?php } elseif ($dnama->jalur == "test") {
                                                foreach ($item->result() as $item) { ?>
                                                    <p><?php echo $si++; ?>. <?php $fotal = $this->bank->item_rincidua($item->jenis_bayar_rinci)->row();
                                                                                echo $fotal->item_biaya;
                                                                                $jlmfotaltes += $fotal->test_biaya; ?>, Semester <?php echo $item->smt_nama; ?> <?php echo $item->tahun_ajaran; ?> (<?php echo "Rp " . number_format($fotal->test_biaya, 2, ",", ".");  ?>)</p>
                                        <?php }
                                            }
                                        }  ?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Tunggakan</label>
                                <div class="col-sm-8">
                                    <span class="form-control"><?php
                                                                if ($dnama->jalur == "prestasi") {
                                                                    $tungg = $jlmfotal - $dnama->jlh_bayar;
                                                                    echo "Rp " . number_format($tungg, 2, ",", ".");
                                                                } elseif ($dnama->jalur == "test") {
                                                                    $tunggtes = $jlmfotaltes - $dnama->jlh_bayar;
                                                                    echo "Rp " . number_format($tunggtes, 2, ",", ".");
                                                                }
                                                                ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Status Validasi</label>
                                <div class="col-sm-8">
                                    <?php if ($dnama->validasi_bukti == "2") { ?>
                                        <span class="form-control text-info">Valid</span>
                                    <?php } elseif ($dnama->validasi_bukti == "3") { ?>
                                        <span class="form-control text-warning">Tidak Valid</span>
                                    <?php } else { ?>
                                        <span class="form-control text-danger">Belum Divalidasi</span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Konfirmasi BAUK</label>
                                <div class="col-sm-8">
                                    <?php if ($dnama->konfirm_bauk == "2") { ?>
                                        <span class="form-control text-info">Terkonfirmasi</span>
                                    <?php } else { ?>
                                        <span class="form-control text-danger">Belum Dikonfirmasi</span>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39") { ?>
                                <hr>
                                <p><a href="<?php echo base_url(); ?>bank/ubh/<?php echo $dnama->id_bukti_bayar; ?>.html" class="btn btn-warning">Ubah Data Transaksi</a></p>
                                <hr>
                                <?php if (!empty($dnama->bukti_bayar)) { ?>
                                    <?php echo form_open('bank/validkan/' . $dnama->id_bukti_bayar, 'class="form-horizontal"'); ?>
                                    <div class="form-group row">
                                        <label for="metod" class="col-sm-4">Validasi Pembayaran</label>
                                        <div class="col-sm-8">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="sah" value="2" <?php if ($dnama->validasi_bukti == "2") {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>VALID
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="sah" value="3" <?php if ($dnama->validasi_bukti == "3") {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>TIDAK VALID
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $dnama->id_bukti_bayar; ?>">
                                    <button type="submit" class="btn btn-info">SIMPAN</button>
                                    <?php echo form_close(); ?>
                                <?php } ?>

                            <?php } ?>

                            <?php if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52") { ?>
                                <?php if (!empty($dnama->bukti_bayar)) { ?>
                                    <br>
                                    <?php echo form_open('bank/konfirmbauk/' . $dnama->id_bukti_bayar, 'class="form-horizontal"'); ?>
                                    <input type="hidden" name="sah" value="2">
                                    <input type="hidden" name="id" value="<?php echo $dnama->id_bukti_bayar; ?>">
                                    <button type="submit" class="btn btn-success">KONFIRMASI BAUK</button>
                                    <?php echo form_close(); ?>
                                <?php } ?>
                            <?php } ?>

                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                    <div class="card bg-gradient-info">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-file-upload"></i>
                                UPLOAD BUKTI PEMBAYARAN <?php echo $dnama->nomor_refe; ?>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pb-0">
                            <?php if (!empty($dnama->bukti_bayar)) {  ?>

                                <img class="img-fluid mb-3" src="https://daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/<?php echo $dnama->bukti_bayar; ?>" alt="Bukti bayar" style="max-width: 300px;"><br>
                                <a href="https://daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/<?php echo $dnama->bukti_bayar; ?>" target="_blank" class="btn btn-warning mb-2">Lihat Bukti Bayar</a>
                                <p><a href="<?php echo base_url(); ?>bank/ungbukti/<?php echo $dnama->id_bukti_bayar; ?>.html" class="btn btn-sm btn-success">Ganti Foto Bukti Bayar</a></p>

                            <?php    } else {    ?>
                                <p class="text-danger">Bukti Pembayaran Belum Diupload</p>
                                <p><a href="<?php echo base_url(); ?>bank/ungbukti/<?php echo $dnama->id_bukti_bayar; ?>.html" class="btn btn-sm btn-success">Upload</a></p>
                            <?php } ?>

                        </div>
                        <!-- /.card-body -->
                    </div>


                </div> <!-- /.col-md-6 -->
                <div class="col-md-6">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <span class="form-control"><?php echo ucfirst($dnama->nama_siswa); ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">No. Pendaftaran</label>
                                <div class="col-sm-8">
                                    <span class="form-control"><?php echo ucfirst($dnama->ref); ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Lulus pada Prodi</label>
                                <div class="col-sm-8">
                                    <span class="form-control" style=" height: auto; "><?php echo $dnama->nama_prodi; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jalur</label>
                                <div class="col-sm-8">
                                    <span class="form-control"><?php echo ucfirst($dnama->jalur); ?></span>
                                </div>
                            </div>


                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                    <div class="card card-info">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                DAFTAR PENGAJUAN VALIDASI TRANSAKSI
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Ref.</th>
                                        <th style="width: 40px">Jumlah (Rp.)</th>
                                        <th>Slip/Struk</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $si = 1;
                                    if (!empty($bay)) {

                                        foreach ($bay->result() as $item) {
                                    ?>
                                            <tr>
                                                <td><?php echo $si++; ?></td>
                                                <td>
                                                    <?php if ($item->id_bukti_bayar != $dnama->id_bukti_bayar) { ?>
                                                        <a href="<?php echo base_url(); ?>bank/lihat/<?php echo $item->id_bukti_bayar; ?>.html"><?php echo $item->nomor_refe; ?></a>
                                                    <?php } else {
                                                        echo $item->nomor_refe;
                                                    } ?>
                                                </td>
                                                <td><?php echo number_format($item->jlh_bayar, 0, ",", "."); ?></td>
                                                <td>
                                                    <?php if (!empty($item->bukti_bayar)) { ?>
                                                        <a href="https://daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/<?php echo $item->bukti_bayar; ?>" target="_blank">Lihat</a>
                                                    <?php } else { ?>
                                                        <span class="text-danger">Belum diupload</span>
                                                    <?php } ?>

                                                </td>
                                                <td><?php if ($item->validasi_bukti == "2") { ?>
                                                        <span class="text-success">Valid</span>
                                                    <?php } elseif ($item->validasi_bukti == "3") { ?>
                                                        <span class="text-danger">Tidak Valid</span>
                                                    <?php } else {  ?>
                                                        <span class="text-warning">Belum Divalidasi</span>
                                                    <?php } ?>
                                                </td>

                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="7" class="text-danger">Belum ada pengajuan validasi transaksi</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Info Pembayaran Total</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Biaya harus bayar</label>
                                <div class="col-sm-8">
                                    <?php if ($dnama->jalur == "prestasi") { ?>
                                        <span class="form-control"><?php echo "Rp " . number_format($biaya_prestasi, 0, ",", "."); ?></span>
                                    <?php } else { ?>
                                        <span class="form-control"><?php echo "Rp " . number_format($biaya_test, 0, ",", "."); ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Biaya Sudah Dibayar</label>
                                <div class="col-sm-8">
                                    <span class="form-control"><?php echo "Rp " . number_format($ygsudah, 0, ",", "."); ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tunggakan Total</label>
                                <div class="col-sm-8">
                                    <span class="form-control">
                                        <?php
                                        if ($dnama->jalur == "prestasi") {
                                            $totalby = $biaya_prestasi;
                                        } else {
                                            $totalby = $biaya_test;
                                        }
                                        $tuggtol = $totalby - $ygsudah;
                                        echo "Rp " . number_format($tuggtol, 0, ",", ".");

                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
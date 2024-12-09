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
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Transaksi</h3>
                        </div>
                        <!-- /.card-header -->
                        <?php echo form_open(current_url()); ?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Pengirim</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="n_pengirim" value="<?php echo $dnama->nama_pengirim; ?>">
                                    <?php echo form_error('n_pengirim'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Bank Pengirim</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="bank_pengirim" value="<?php echo $dnama->bank_pengirim; ?>">
                                    <?php echo form_error('bank_pengirim'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tgl_tran" value="<?php echo $dnama->tgl_trans; ?>">
                                    <?php echo form_error('tgl_tran'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jam Transaksi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="jam_tran" value="<?php echo $dnama->jam_trans; ?>">
                                    <?php echo form_error('jam_tran'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Referensi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="no_ref" value="<?php echo $dnama->nomor_refe; ?>">
                                    <?php echo form_error('no_ref'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jumlah Pembayaran</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="jmh_bayar" value="<?php echo $dnama->jlh_bayar; ?>">
                                    <?php echo form_error('jmh_bayar'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tambah Rincian Pembayaran</label>
                                <select class="select2" multiple="multiple" name="it[]" data-placeholder="Pilih item pembayaran" style="width: 100%;">
                                    <?php if ($dnama->jalur == "prestasi") { ?>
                                        <?php for ($i = 0; $i < 3; $i++) { ?>
                                            <option value="<?= $satuan[$i]->id_biayakuliahpmb ?>"><?= $satuan[$i]->item_biaya . '(Rp. ' . number_format($satuan[$i]->prestasi_biaya, '2', ',', '.') . ')'; ?></option>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php for ($i = 0; $i < 3; $i++) { ?>
                                            <option value="<?= $satuan[$i]->id_biayakuliahpmb ?>"><?= $satuan[$i]->item_biaya . '(Rp. ' . number_format($satuan[$i]->test_biaya, '2', ',', '.') . ')'; ?></option>
                                        <?php } ?>
                                    <?php } ?>

                                </select>
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

                        </div> <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="jalur" value="<?php echo $dnama->jalur; ?>">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div><!-- /.card -->
                </div> <!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Rincian Item Pembayaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            $jlmfotal = 0;
                            $jlmfotaltest = 0;
                            ?>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                <div class="col-sm-8">
                                    <span class="form-control" style=" background-color: #f0f0f5; "><?php echo ucfirst($dnama->nama_siswa); ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Prodi</label>
                                <div class="col-sm-8">
                                    <span class="form-control" style=" height: auto; background-color: #f0f0f5;"><?php echo $dnama->nama_prodi; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jalur Pendaftaran</label>
                                <div class="col-sm-8">
                                    <span class="form-control" style=" height: auto; background-color: #f0f0f5;"><?php echo ucfirst($dnama->jalur); ?></span>
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
                                                                                // echo "<pre>";
                                                                                // print_r($fotal->prestasi_biaya);
                                                                                // die;
                                                                                echo $fotal->item_biaya;
                                                                                $jlmfotal += $fotal->prestasi_biaya; ?>, Semester <?php echo $item->smt_nama; ?> <?php echo $item->tahun_ajaran; ?> (<?php echo "Rp " . number_format($fotal->prestasi_biaya, 2, ",", ".");  ?>) <a href="<?php echo base_url(); ?>bank/pustembay/<?php echo $item->id_pembayaran_rinci; ?>.html"><i class='fas fa-times text-danger'></i></a></p>

                                                <?php }
                                            } elseif ($dnama->jalur == "test") {
                                                foreach ($item->result() as $item) { ?>
                                                    <p><?php echo $si++; ?>. <?php $fotal = $this->bank->item_rincidua($item->jenis_bayar_rinci)->row();
                                                                                echo $fotal->item_biaya;
                                                                                $jlmfotaltest += $fotal->test_biaya; ?>, Semester <?php echo $item->smt_nama; ?> <?php echo $item->tahun_ajaran; ?> (<?php echo "Rp " . number_format($fotal->test_biaya, 2, ",", ".");  ?>) <a href="<?php echo base_url(); ?>bank/pustembay/<?php echo $item->id_pembayaran_rinci; ?>.html"><i class='fas fa-times text-danger'></i></a></p>

                                        <?php   }
                                            }
                                        }  ?>

                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Tunggakan</label>
                                <div class="col-sm-8">
                                    <span class="form-control">
                                        <?php
                                        if ($dnama->jalur == "prestasi") {
                                            $tungg = $jlmfotal - $dnama->jlh_bayar;
                                        } elseif ($dnama->jalur == "test") {
                                            $tungg = $jlmfotaltest - $dnama->jlh_bayar;
                                        }
                                        ?>
                                        <?php echo "Rp " . number_format($tungg, 2, ",", "."); ?>
                                    </span>
                                </div>
                            </div>

                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                </div> <!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container-fluid">




        </div><!-- /.container-fluid -->


    </div>
    <!-- /.content -->
</div>
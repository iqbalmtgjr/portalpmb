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
                            <h3 class="card-title">ISI DATA TRANSAKSI</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label style=" font-style: italic; ">Isi data transaksi di bawah ini sesuai dengan slip atau struk bank yang akan diupload.
                                    Setelah data diisi lalu tekan tombol SIMPAN. Lalu perhatikan pada tabel DAFTAR PENGAJUAN VALIDASI TRANSAKSI. Klik pada kolom <span class="text-success">Upload Bukti Transaksi</span> untuk mengupload file slip/struk transaksi.
                                </label>
                            </div>
                            <?php echo form_open(current_url(), 'class="form-horizontal"'); ?>
                            <div class="form-group row">
                                <label for="nam_ngirim" class="col-sm-4 col-form-label">Nama Pengirim</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nam_ngirim" value="<?php echo set_value('nam_ngirim'); ?>">
                                    <?php echo form_error('nam_ngirim'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bank_ngirim" class="col-sm-4 col-form-label">Bank Pengirim</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="bank_ngirim" value="<?php echo set_value('bank_ngirim'); ?>">
                                    <?php echo form_error('bank_ngirim'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tanggal" value="<?php echo set_value('tanggal'); ?>" placeholder="Contoh : 31/02/2021">
                                    <?php echo form_error('tanggal'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jam" class="col-sm-4 col-form-label">Jam Transaksi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="jam" value="<?php echo set_value('jam'); ?>" placeholder="Contoh : 07:31:27">
                                    <?php echo form_error('jam'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ref" class="col-sm-4 col-form-label">Nomor Referensi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ref" value="<?php echo set_value('ref'); ?>">
                                    <?php echo form_error('ref'); ?>
                                </div>
                            </div>
                            <?php if ($msiswa->jalur == "prestasi") { ?>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Pembayaran</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="jumlah" value="<?php echo set_value('jumlah'); ?>" placeholder="Contoh : 6510000">
                                        <i class="text-warning">Tanpa titik atau koma</i><?php echo form_error('jumlah'); ?>
                                    </div>
                                </div>
                            <?php } elseif ($msiswa->jalur == "test") { ?>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Pembayaran</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="jumlah" value="<?php echo set_value('jumlah'); ?>" placeholder="Contoh : 6760000">
                                        <i class="text-warning">Tanpa titik atau koma</i><?php echo form_error('jumlah'); ?>
                                    </div>
                                </div>
                            <?php } else {
                            } ?>
                            <div class="form-group">
                                <label>Rincian Pembayaran (<small>Pilih item pembayaran sesuai dengan jumlah uang yang dibayar. Item pembayaran dapat dipilih lebih dari satu</small>)</label>
                                <select class="select2" multiple="multiple" name="it[]" data-placeholder="Pilih item pembayaran" style="width: 100%;">
                                    <?php for ($i = 0; $i < 3; $i++) { ?>
                                        <option value="<?= $satuan[$i]->id_biayakuliahpmb ?>"><?= $satuan[$i]->item_biaya . '(Rp. ' . number_format($satuan[$i]->test_biaya, '2', ',', '.') . ')'; ?></option>
                                    <?php } ?>
                                    <?php //foreach ($satuan as $satuan) { 
                                    ?>
                                    <!-- <option value="<?php //echo $satuan->id_biayakuliahpmb; 
                                                        ?>"><?php //echo $satuan->item_biaya . '(Rp. ' . number_format($satuan->jlh_uang, '2', ',', '.') . ')'; 
                                                            ?></option> -->
                                    <?php //} 
                                    ?>

                                </select>
                                <?php echo form_error('it[]'); ?>
                            </div>

                        </div><!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div><!-- /.card -->
                </div> <!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                                <div class="col-sm-8">
                                    <span class="form-control" style=" background-color: #f0f0f5; "><?php echo ucfirst($msiswa->nama_siswa); ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Prodi</label>
                                <div class="col-sm-8">
                                    <span class="form-control" style=" height: auto; background-color: #f0f0f5;"><?php echo $msiswa->nama_prodi; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Jalur Pendaftaran</label>
                                <div class="col-sm-8">
                                    <span class="form-control" style=" height: auto; background-color: #f0f0f5;"><?php echo ucfirst($msiswa->jalur); ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Pendaftaran</label>
                                <div class="col-sm-8">
                                    <span class="form-control" style=" height: auto; background-color: #f0f0f5;"><?php echo ucfirst($msiswa->ref); ?></span>
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
                                        <th>No. Ref.</th>
                                        <th>Bank/Tgl</th>
                                        <th style="width: 40px">Jumlah (Rp.)</th>
                                        <th>Upload Bukti Transaksi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $si = 1;
                                    if (!empty($bay)) {

                                        foreach ($bay->result() as $item) {
                                    ?>
                                            <tr>
                                                <td><?php echo $si++; ?>.</td>
                                                <td><a href="<?php echo base_url(); ?>bank/lihat/<?php echo $item->id_bukti_bayar; ?>.html"><?php echo $item->nomor_refe; ?></a></td>
                                                <td><?php echo $item->bank_pengirim; ?><br><?php echo $item->tgl_trans; ?></td>
                                                <td><?php echo number_format($item->jlh_bayar, 2, ",", "."); ?></td>
                                                <td>
                                                    <?php if (!empty($item->bukti_bayar)) { ?>
                                                        <a href="https://daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/<?php echo $item->bukti_bayar; ?>" target="_blank">Lihat</a>
                                                    <?php } else { ?>
                                                        <span class="text-danger">Silahkan Upload Bukti Pembayaran </span><br><a href="<?php echo base_url(); ?>bank/ungbukti/<?php echo $item->id_bukti_bayar; ?>.html" class="btn btn-sm btn-success">Upload</a>
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
                </div> <!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="container-fluid">




        </div><!-- /.container-fluid -->


    </div>
    <!-- /.content -->
</div>
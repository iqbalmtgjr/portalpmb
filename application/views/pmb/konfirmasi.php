<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        </div>
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
                    <?php echo form_open(current_url(),'class="form-horizontal"'); ?> 
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
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="tanggal" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="tanggal" value="<?php echo set_value('tanggal'); ?>" placeholder="Contoh : 31/02/2021">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="jam" class="col-sm-4 col-form-label">Jam Transaksi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="jam" value="<?php echo set_value('jam'); ?>" placeholder="Contoh : 07:31:27">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="ref" class="col-sm-4 col-form-label">Nomor Referensi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="ref" value="<?php echo set_value('ref'); ?>">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Pembayaran</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="jumlah" value="<?php echo set_value('jumlah'); ?>" placeholder="Contoh : 6510000">
                      <i class="text-warning">Tanpa titik atau koma</i>
                    </div>
                  </div>
                  <div class="form-group">
                  <label>Rincian Pembayaran</label>
                  <select class="select2" multiple="multiple" name="it[]" data-placeholder="Pilih item pembayaran" style="width: 100%;">
                      <?php foreach($satuan as $satuan) { ?>
                    <option value="<?php echo $satuan->id_biayakuliahpmb; ?>"><?php echo $satuan->item_biaya.'(Rp. '.number_format($satuan->jlh_uang,'2',',','.').')'; ?></option>
                    <?php } ?>
                    
                  </select>
                </div>
                  
         </div><!-- /.card-body -->
          <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <?php echo form_close(); ?>
            </div><!-- /.card -->
             </div>
            <div class="col-md-6">
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
                      <th>Nomor Referensi</th>
                       <th>Bank Pengirim</th>
                      <th>Tanggal Transaksi</th>
                      <th style="width: 40px">Jumlah (Rp.)</th>
                      <th>Upload Bukti Transaksi</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $si = 1;
                        if(!empty($bay)) {
                            
                        foreach($bay->result() as $item) {
                    ?>
                    <tr>
                        <td><?php echo $si++; ?></td>
                      <td><?php echo $item->nomor_refe; ?></td>
                       <td><?php echo $item->bank_pengirim; ?></td>
                      <td><?php echo $item->tgl_trans; ?></td>
                      <td><?php echo number_format($item->jlh_bayar, 2, ",", "."); ?></td>
                      <td>
                          <?php if(!empty($item->bukti_bayar)) { ?>
                          <a href="https://persadakhatulistiwa.ac.id/pmb/bayar/<?php echo $item->bukti_bayar; ?>" target="_blank">Lihat</a>
                        <?php }else { ?>
                        <span class="text-danger">Silahkan Upload Bukti Pembayaran </span><br><a href="<?php echo base_url(); ?>masterpmb/ungbukti/<?php echo $item->id_bukti_bayar; ?>.html" class="btn btn-sm btn-success">Upload</a>
                        <?php } ?>
                      
                      </td>
                       <td><?php if($item->validasi_bukti == "2"){ ?>
                       <span class="text-success">Valid</span>
                       <?php } elseif($item->validasi_bukti == "3") { ?> 
                        <span class="text-danger">Tidak Valid</span>
                       <?php } else {  ?>
                        <span class="text-warning">Belum Divalidasi</span>
                       <?php } ?>
                       </td>
                      
                    </tr>
                     <?php } } ?>
                  </tbody>
                </table>
				</div>
                      <!-- /.card-body -->
                </div>
                 </div>
                 </div>
         </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                <h3 class="card-title">Tambah Informasi SMS BANK</h3>
              </div>
              <!-- /.card-header -->
               <?php echo form_open(current_url()); ?>
                <div class="card-body">
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nilai Transaksi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nilai" value="<?php if(!empty($sms->jumlah_sms)){ echo $sms->jumlah_sms; }else {echo set_value('nilai');} ?>">
                        <?php echo form_error('nilai'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="tgl_tran" value="<?php if(!empty($sms->tgl_sms)){echo $sms->tgl_sms;}else{ echo set_value('tgl_tran');} ?>">
                        <?php echo form_error('tgl_tran'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Jam Transaksi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="jam_tran" value="<?php if(!empty($sms->jam_sms)){echo $sms->jam_sms;}else{ echo set_value('jam_tran');} ?>">
                        <?php echo form_error('jam_tran'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Referensi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="no_ref" value="<?php if(!empty($sms->ref_sms)){echo $sms->ref_sms;}else{ echo set_value('no_ref');} ?>">
                        <?php echo form_error('no_ref'); ?>
                    </div>
                  </div>
                  
                </div> <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                 <?php echo form_close(); ?>
            </div><!-- /.card -->
           
            
         </div>    <!-- /.col-md-6 -->
        <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Informasi Transaksi</h3>
              </div>
              <!-- /.card-header -->
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
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Status Validasi</label>
                    <div class="col-sm-8">
                         <?php if($dnama->validasi_bukti == "2") { ?>
                        <span class="form-control text-info">Valid</span>
                         <?php }elseif($dnama->validasi_bukti == "3"){ ?>
                         <span class="form-control text-warning">Tidak Valid</span>
                         <?php }else{ ?>
                         <span class="form-control text-danger">Belum Divalidasi</span>
                         <?php } ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Konfirmasi BAUK</label>
                    <div class="col-sm-8">
                         <?php if($dnama->konfirm_bauk == "2") { ?>
                        <span class="form-control text-info">Terkonfirmasi</span>
                         <?php }else{ ?>
                         <span class="form-control text-danger">Belum Dikonfirmasi</span>
                         <?php } ?>
                    </div>
                  </div>
                </div> <!-- /.card-body -->
            </div><!-- /.card -->
            
       </div> <!-- /.col-md-6 -->
       </div><!-- /.row -->
       <div class="row">
           <div class="col-md-12">
                     <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Data Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <?php
                    $jlmfotal = 0;
                    ?>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                      <span class="form-control"><?php echo ucfirst($dnama->nama_siswa); ?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Prodi</label>
                    <div class="col-sm-8">
                      <span class="form-control"><?php echo $dnama->nama_prodi; ?></span>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Item Pembayaran</label>
                    <div class="col-sm-8">
                        <span>
                            <?php
                            $si = 1;
                            if(!empty($item)) {
                                if($dnama->jalur == "prestasi"){
                            foreach($item->result() as $item) { ?>
                                <p><?php echo $si++; ?>. <?php $fotal = $this->bank->item_rinci($item->jenis_bayar_rinci)->row(); echo $fotal->item_biaya; $jlmfotal +=$fotal->jlh_uang; ?>, Semester <?php echo $item->smt_nama; ?> <?php echo $item->tahun_ajaran; ?> (<?php echo "Rp " . number_format($fotal->jlh_uang, 2, ",", ".");  ?>)</p>
                           <?php } ?>
                            
                            <?php }elseif($dnama->jalur == "test") { 
                             foreach($item->result() as $item) { ?>
                                <p><?php echo $si++; ?>. <?php $fotal = $this->bank->item_rincidua($item->jenis_bayar_rinci)->row(); echo $fotal->item_biaya; $jlmfotal +=$fotal->jlh_uang; ?>, Semester <?php echo $item->smt_nama; ?> <?php echo $item->tahun_ajaran; ?> (<?php echo "Rp " . number_format($fotal->jlh_uang, 2, ",", ".");  ?>)</p>
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
                       $tungg = $jlmfotal - $dnama->jlh_bayar;
                      echo "Rp " . number_format($tungg, 2, ",", ".");
                      
                      ?></span>
                    </div>
                  </div>
                </div> <!-- /.card-body -->
            </div><!-- /.card -->
            </div> <!-- /.col-md-12 -->
       </div>
       
       </div><!-- /.container-fluid -->
      <div class="container-fluid">
       
       
        

      </div><!-- /.container-fluid -->
     
      
    </div>
    <!-- /.content -->
  </div>

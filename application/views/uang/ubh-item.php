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
        
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ubah Item Pembayaran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo form_open(current_url(),'class="form-horizontal"'); ?>
              
                <div class="card-body">
                  <div class="form-group row">
                    <label for="jenis" class="col-sm-2 col-form-label">Jenis Pembayaran</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" value="<?php echo $biaya->keterangan; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $biaya->nama_prodi; ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tahun Masuk</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $biaya->tahun_masuk; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jlh" class="col-sm-2 col-form-label">Jumlah Rp.</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="jlh" id="jlh" value="<?php if(!empty($biaya->jumlah)){ echo rp((int)$biaya->jumlah);} ?>">
					  <?php echo form_error('jlh'); ?>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="col-md-4 col-xs-5 float-right">
					<a href="<?php echo base_url() ?>biaya/index.html" class="btn btn-app">
						<i class="fas fa-reply"></i> Kembali
					</a>
				</div>
				<div class="col-md-6 col-xs-6">
					<button type="submit" class="btn btn-app">
						<i class="fa fa-save"></i> Simpan
					</button>
				</div>                
                </div>
                <!-- /.card-footer -->
              <?php form_close(); ?>
            </div>
            <!-- /.card -->

            
        
      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
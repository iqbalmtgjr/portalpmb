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
            <?php echo form_open(current_url(),'class="form-horizontal"'); ?>
          
        <div class="row">
            <div class="col-md-12">
                 <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                   <h4>Tambah Data Gaji Dosen Tetap</h4>
                <hr>
                 
                  <div class="form-group row">
                    <label for="nidn">NIDN/NIDK</label>
                     <span class="form-control" style="background-color: #f4f6f9;"><?php echo $dosen->nidn; ?></span>
                  </div>
                  
                  <div class="form-group row">
                      <label for="nidn">NamaLengkap</label>
                    <span class="form-control" style="background-color: #f4f6f9;"><?php echo $dosen->name; ?></span>
                  </div>
                 
                  <div class="form-group row">
                    <label>Gaji Pokok</label>
                      <input type="text" class="form-control" name="pokok" value="<?php if(!empty($gaji->gaji_pokok)) { echo $gaji->gaji_pokok;}else{ echo set_value('pokok');} ?>">
					  <?php echo form_error('pokok'); ?>
                  </div>
                   <div class="form-group row">
                    <label>Tunjangan Pasangan</label>
                      <input type="text" class="form-control" name="pasangan" value="<?php if(!empty($gaji->tunj_pasangan)) { echo $gaji->tunj_pasangan;}else{ echo set_value('pasangan');} ?>">
					  <?php echo form_error('pasangan'); ?>
                  </div>
                   <div class="form-group row">
                    <label>Tunjangan Anak</label>
                      <input type="text" class="form-control" name="anak" value="<?php if(!empty($gaji->tunj_anak)) { echo $gaji->tunj_anak;}else{ echo set_value('anak');} ?>">
					  <?php echo form_error('anak'); ?>
                  </div>
                   <div class="form-group row">
                    <label>Tunjangan Fungsional</label>
                      <input type="text" class="form-control" name="fungsional" value="<?php if(!empty($gaji->tunj_fung)) { echo $gaji->tunj_fung;}else{ echo set_value('fungsional');} ?>">
					  <?php echo form_error('fungsional'); ?>
                  </div>
                   <div class="form-group row">
                    <label>Tunjangan Beras</label>
                      <input type="text" class="form-control" name="beras" value="<?php if(!empty($gaji->tunj_beras)) { echo $gaji->tunj_beras;}else{ echo set_value('beras');} ?>">
					  <?php echo form_error('beras'); ?>
                  </div>
                </div><!-- /.card-body box-profile-end -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-app"><i class="fa fa-save"></i>Simpan</button>
                </div><!-- /.card-footer-end -->
                </div><!-- /.card card-primary card-outline -->
            
            </div><!-- /.col-md-12-end -->
            
        </div><!-- /.row-end -->
          
             
         
        <?php echo form_close(); ?>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
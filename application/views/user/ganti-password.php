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
        
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Ganti Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo form_open(current_url(),'class="form-horizontal"'); ?>
             
                <div class="card-body">                  
                  <div class="form-group row">
                    <label for="lama" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="lama" name="lama" value="<?php echo set_value('lama'); ?>">
						<?php echo form_error('lama'); ?>
					</div>
                  </div>
                   <div class="form-group row">
                    <label for="baru" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="baru" name="baru" value="<?php echo set_value('baru'); ?>">
                      <small>(Minimal 8 karakter, maksimal 12 karakter)</small>
						<?php echo form_error('baru'); ?>
					</div>
                  </div>
                   <div class="form-group row">
                    <label for="ulang" class="col-sm-2 col-form-label">Ulangi Password Baru</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="ulang" name="ulang" value="<?php echo set_value('ulang'); ?>">
						<?php echo form_error('ulang'); ?>
					</div>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  
                </div>
                <!-- /.card-footer -->
             <?php echo form_close(); ?>
            </div>
            <!-- /.card -->

            
        
      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
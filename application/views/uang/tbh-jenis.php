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
                <h3 class="card-title">Tambah Jenis Pembayaran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo form_open(current_url(),'class="form-horizontal"'); ?>
              
                <div class="card-body">
                  <div class="form-group row">
                    <label for="jns" class="col-sm-2 col-form-label">Jenis Pembayaran</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="jns" id="jns" value="<?php echo set_value('jns'); ?>">
					  <?php echo form_error('jns'); ?>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-default">Simpan</button>                 
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

  
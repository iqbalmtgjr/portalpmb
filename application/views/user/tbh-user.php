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
                <h3 class="card-title">Tambah Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo form_open(current_url(),'class="form-horizontal"'); ?>              
                <div class="card-body">
                  <div class="form-group row">
                    <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                    <div class="col-sm-10">                      
							<?php
							$options[" "] = "-- PILIH --";
							foreach ($unit as $unit){
							$options[$unit->id_unit] = $unit->unit;	
							}                                        
							echo form_dropdown('unit', $options, set_value('unit'), array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
							<?php echo form_error('unit'); ?>						 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Pengguna</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama') ?>" placeholder="Nama pengguna">
					  <?php echo form_error('nama'); ?>
                    </div>
                  </div>	
								  
				   <div class="form-group row">
                    <label for="mail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="mail" name="mail" value="<?php echo set_value('mail') ?>" placeholder="Email">
					    <?php echo form_error('mail'); ?>
                    </div>
                  </div>
				   
				  <div class="form-group row">
                    <label for="kunci" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="kunci" value="<?php echo set_value('kunci') ?>" placeholder="Password">
                      <small>(Minimal 8 karakter)</small>
					    <?php echo form_error('kunci'); ?>
                    </div>
					<label for="pangkat" class="col-sm-2 col-form-label">Pangkat</label>
                    <div class="col-sm-4">
                     <select class="custom-select" name="pangkat">
                          <option value="user">User</option>
                          <option value="admin">Admin</option>
                        </select>
                         <?php echo form_error('pangkat'); ?>
                    </div>
                  </div>
				 
				   <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-4">
                      <select class="custom-select" name="status">
                          <option value="0">Aktif</option>
                          <option value="1">Tidak Aktif</option>
                        </select>
					  <?php echo form_error('status'); ?>
                    </div>
                     <label for="apli" class="col-sm-2 col-form-label">Aplikasi</label>
                    <div class="col-sm-4">
                      <select class="custom-select" name="apli">
                          <option value="simkeu">SIMKEU</option>
                          <option value="simpek">SIMPEK</option>
                          <option value="dispen">DISPEN</option>
                          <option value="uang">KEUANGAN</option>
                          <option value="mahasiswa">MAHASISWA</option>
                          <option value="pmb">PMB</option>
                           <option value="prodi">PRODI</option>
                        </select>
					  <?php echo form_error('apli'); ?>
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

 
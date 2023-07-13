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
                <h3 class="card-title">Ubah Data Pengguna</h3>
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
							echo form_dropdown('unit', $options, $user->unit_pengguna, array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
							<?php echo form_error('unit'); ?>						 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nma" class="col-sm-2 col-form-label">Nama Pengguna</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nma" name="nma" value="<?php echo $user->nama; ?>" placeholder="Nama pengguna">
					  <?php echo form_error('nma'); ?>
                    </div>
                  </div>	
								  
				   <div class="form-group row">
                    <label for="mail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <span><?php echo $user->email; ?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="pangkat" class="col-sm-2 col-form-label">Pangkat</label>
                    <div class="col-sm-10">
                        	<?php
							$options1[" "] = "-- PILIH --";
							$options1["user"] = "User";
							$options1["admin"] = "Admin";
							                                       
							echo form_dropdown('pangkat', $options1, $user->pangkat, array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
							<?php echo form_error('pangkat'); ?>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-4">
                        <?php
							$options2[" "] = "-- PILIH --";
							$options2["0"] = "Aktif";
							$options2["1"] = "Tidak Aktif";
							                                       
							echo form_dropdown('status', $options2, $user->status, array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
							<?php echo form_error('status'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="aplikasi" class="col-sm-2 col-form-label">Aplikasi</label>
                    <div class="col-sm-4">
                        <?php
							$opti["simkeu"] = "SIMKEU";
							$opti["simpek"] = "SIMPEK";
							$opti["dispen"] = "DISPEN";
							$opti["uang"] = "KEUANGAN";
							$opti["mahasiswa"] = "MAHASISWA";
							$opti["pmb"] = "PMB";
							$opti["prodi"] = "PRODI";
							                                       
							echo form_dropdown('aplikasi', $opti, $user->apli, array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
							<?php echo form_error('aplikasi'); ?>
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

 
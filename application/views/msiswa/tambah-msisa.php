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
               Bagian 1 <span><i class="fa fa-angle-double-right"></i> Tambah Mahasiswa</span>
                <hr>
                  <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama'); ?>">
                      <?php echo form_error('nama'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nim" class="col-sm-4 col-form-label">NIM<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo set_value('nim'); ?>">
                    <?php echo form_error('nim'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="prodi" class="col-sm-4 col-form-label">Prodi<strong class="text-red">*</strong></label>
                     <div class="col-sm-8">                      
							<?php
							$options[" "] = "-- PILIH --";
							foreach ($prodi as $prodi){
							$options[$prodi->id_prodi] = $prodi->nama_prodi;	
							}                                        
							echo form_dropdown('prodi', $options, set_value('prodi'), array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
							<?php echo form_error('prodi'); ?>						 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tahun_masuk" class="col-sm-4 col-form-label">Tahun Masuk<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                     <?php  
				       	/**
				       	 * Form Dropdown Tahun Masi
				       	 *
				       	 * @var string
				       	 **/
				       	$tahun = date('Y') - 10;
				       	$reg_year[" "] = "-- PILIH --";
				       	for($tahun; $tahun <= date('Y'); $tahun++)
				       		$reg_year[$tahun] = $tahun;

				       	echo form_dropdown('tahun_masuk', 
				       		$reg_year, 
				       		set_value('tahun_masuk'),
				       		array('class' => 'form-control')
				       	);
				       	?>
					   <?php echo form_error('tahun_masuk'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="smt" class="col-sm-4 col-form-label">Semester Aktif<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" id="smt" name="smt" value="<?php echo set_value('semester_aktif'); ?>">
                      <?php echo form_error('smt'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="sks" class="col-sm-4 col-form-label">Jumlah SKS Semester Aktif<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" id="sks" name="sks" value="<?php echo set_value('sks'); ?>">
                      <?php echo form_error('sks'); ?>
                    </div>
                  </div>
                   </div>
                   <div class="card-footer">
                       <button type="submit" class="btn btn-info">Simpan</button> 
                       <a class="btn btn-default float-right" style="text-decoration:none;" href="<?php echo site_url('biaya/datakeuangan') ?>">Data Keuangan</a>
                   </div>
                  </div>
              </div>
          </div>
        <?php echo form_close(); ?>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
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
               Bagian 1 <span><i class="fa fa-angle-double-right"></i> Penambahan Data Jumlah SKS Persemester</span>
                <hr>
                  <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                      <span class="form-control"><?php echo $mahasiswa->nama; ?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nim" class="col-sm-4 col-form-label">NIM<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                        <span class="form-control"><?php echo $mahasiswa->nim; ?></span>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="prodi" class="col-sm-4 col-form-label">Prodi<strong class="text-red">*</strong></label>
                     <div class="col-sm-8"> 
                     <span class="form-control"><?php echo $mahasiswa->nama_prodi; ?></span>
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
				       		$mahasiswa->tahun_masuk,
				       		array('class' => 'form-control')
				       	);
				       	?>
					   <?php echo form_error('tahun_masuk'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="smt" class="col-sm-4 col-form-label">Semester Aktif<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" id="smt" name="smt" value="<?php echo $mahasiswa->semester_aktif; ?>">
                      <?php echo form_error('smt'); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group row">
                    <label for="smt" class="col-sm-4 col-form-label">Semester Input<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" id="smt" name="smt_input" value="<?php echo set_value('smt_input'); ?>">
                      <?php echo form_error('smt_input'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="sks" class="col-sm-4 col-form-label">Jumlah SKS Semester Input<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" id="sks" name="sks_input" value="<?php echo set_value('sks_input'); ?>">
                      <?php echo form_error('sks_input'); ?>
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
        <div class="row">
              <div class="col-md-12">
                   <div class="card card-primary card-outline">
              <div class="card-body box-profile">
              
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Semester</th>
                      <th>Jumlah SKS</th>
                       <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                   $si = 1;
                   if(!empty($ambilsks)) {
                   foreach($ambilsks as $ambil) {
                   ?>   
                    <tr>
                      <td><?php echo $si++;  ?></td>
                      <td>Semester <?php echo $ambil->smt_sks; ?></td>
                      <td><?php echo $ambil->sks_jumlah; ?></td>
                      <td>
                        <a href="<?php echo base_url(); ?>mahasiswa/ubhskssem/<?php echo $ambil->sks_mahasiswa_id; ?>"><i class="fas fa-pencil-alt pr-2"></i></a>
                        <a href="<?php echo base_url(); ?>mahasiswa/hapusskssem/<?php echo $ambil->sks_mahasiswa_id; ?>"><i class="fas fa-trash text-danger"></i></a>
                      </td>
                    </tr>
                    <?php } } ?>
                  </tbody>
                </table>
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

 
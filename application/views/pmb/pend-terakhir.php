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
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">PENDIDIKAN TERTINGGI SEBELUMNYA</h3>
              </div>
                <div class="card-body">
                     <div class="form-group row">
                    <label for="sekolah" class="col-sm-2 col-form-label">Asal Sekolah <strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <?php  
                        
                      if (!empty($penakhir->jenis_sekolah)) {
                          $skol = $penakhir->jenis_sekolah;
                      }else {
                          $skol = set_value('sekolah');
                      }
				       	echo form_dropdown('sekolah', 
				       		array(
				       			'' => "-- PILIH --",
				       			'sma' => "SMA",
				       			'smk' => "SMK",
				       			'ma' => "Madrasah Aliyah",
				       			'mak' => "Madrasah Aliyah Kejuruan",
				       		), 
				           	$skol,
				       		array('class' => 'form-control')
				       	);
				       	?>
                     <?php echo form_error('sekolah'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="NamaSekolah" class="col-sm-2 col-form-label">Nama Sekolah <strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="NamaSekolah" name="nama_sklh" placeholder="Nama Sekolah" value="<?php if(!empty($penakhir->	nama_sekolah)) { echo $penakhir->	nama_sekolah; } else {echo set_value('nama_sklh'); }?>">
                       <?php echo form_error('nama_sklh'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="AlamatSKLH" class="col-sm-2 col-form-label">Alamat<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="AlamatSKLH"  name="alamat_sklh" placeholder="Alamat" value="<?php if(!empty($penakhir->alamat_sekolah)) { echo $penakhir->alamat_sekolah; } else {echo set_value('alamat_sklh'); }?>">
                       <?php echo form_error('alamat_sklh'); ?>
                    </div>
                  </div>
				  
                  <div class="form-group row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                       <input type="text" class="form-control" id="jurusan"  name="jurusan" placeholder="Jurusan" value="<?php if(!empty($penakhir->jurusan_sekolah)) { echo $penakhir->jurusan_sekolah; } else {echo set_value('jurusan'); }?>">
					  <?php echo form_error('jurusan'); ?>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputTahunLulus" class="col-sm-2 col-form-label">Tahun Lulus<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputTahunLulus" name="thl" placeholder="Tahun Lulus"  value="<?php if(!empty($penakhir->	tahun_lulus_sekolah)) { echo $penakhir->tahun_lulus_sekolah; } else {echo set_value('thl'); }?>">
                      <?php echo form_error('thl'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNomorSKHUN" class="col-sm-2 col-form-label">Nomor SKHUN </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNomorSKHUN"  name="n_skun" placeholder="Nomor SKHUN" value="<?php if(!empty($penakhir->	skhun_sekolah)) { echo $penakhir->skhun_sekolah; } else {echo set_value('n_skun'); }?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNomorIJAZAH" class="col-sm-2 col-form-label">Nomor IJAZAH </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNomorIJAZAH" name="n_ijazah" placeholder="Nomor IJAZAH" value="<?php if(!empty($penakhir->	ijasah_sekolah)) { echo $penakhir->	ijasah_sekolah; } else {echo set_value('n_ijazah'); }?>">
                    </div>
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">SIMPAN</button>
                   <a href="<?php echo base_url(); ?>pmb/formprodi.html" class="btn btn-info float-right">Selanjutnya</a>
                </div>
            </div>
            <!-- /.card -->
          </div>
         
        <?php echo form_close(); ?>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
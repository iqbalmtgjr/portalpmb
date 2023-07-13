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
              <div class="col-md-6">
                   <div class="card card-primary card-outline">
              <div class="card-body box-profile">
               Bagian 1 <span><i class="fa fa-angle-double-right"></i> Identitas Mahasiswa</span>
                <hr>
                  <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama'); ?>">
					  <?php echo form_error('nama'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jekel" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                      <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jekel" value="pria" <?php echo  set_radio('jekel', 'pria'); ?>>Pria
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jekel" value="wanita" <?php echo  set_radio('jekel', 'wanita'); ?>>Wanita
                      </label>
                    </div>
					 
                    </div>
                  </div>
                    <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-8 row">
                    
                      <div class="col-6">
                        <input type="text" class="form-control" name="tempat" value="<?php echo set_value('tempat'); ?>">
                        
                      </div>
                      <div class="col-6">
                        <div class="input-group date" id="tanggallahir" data-target-input="nearest">
                        <input type="text" name="tgl" class="form-control datetimepicker-input" data-target="#tanggallahir" value="<?php echo set_value('tgl'); ?>"/>
                        <div class="input-group-append" data-target="#tanggallahir" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
							
                      </div>
					  
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="religion" class="col-sm-4 col-form-label">Agama</label>
                    <div class="col-sm-8 row">
                     <div class="col-8">   
                   
                         <?php  
				       	/**
				       	 * Form Dropdown Agama
				       	 *
				       	 * @var string
				       	 **/
				       	echo form_dropdown('religion', 
				       		array(
				       			'' => "-- PILIH --",
				       			'islam' => "Islam",
				       			'kristen' => "Kristen",
				       			'katolik' => "Katolik",
				       			'hindu' => "Hindu",
				       			'buddha' => "Buddha",
				       			'konghucu' => "Konghucu"
				       		), 
				       		set_value('religion'),
				       		array('class' => 'form-control')
				       	);
				       	?>
                     
                      </div>
                      <div class="col-4"></div>
					 
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="kerja" class="col-sm-4 col-form-label">Pekerjaan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="kerja" name="kerja" value="<?php echo set_value('kerja'); ?>">
					  <?php echo form_error('kerja'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                     <textarea class="form-control" rows="3" name="alamat" placeholder=""><?php echo set_value('alamat'); ?></textarea>
					  <?php echo form_error('alamat'); ?>
                    </div>
                  </div>
                   </div>
                  </div>
              </div>
               <div class="col-md-6">
                    <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                   Bagian 2 <span><i class="fa fa-angle-double-right"></i> Informasi Sekolah Asal</span>
                <hr>
                 <div class="form-group row">
                    <label for="sekolah" class="col-sm-4 col-form-label">Nama Sekolah</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?php echo set_value('sekolah'); ?>">
					 
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="jurusan" class="col-sm-4 col-form-label">Jurusan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo set_value('jurusan'); ?>">
					  <?php echo form_error('jurusan'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="alamatsekolah" class="col-sm-4 col-form-label">Alamat Sekolah</label>
                    <div class="col-sm-8">
                     <textarea class="form-control" rows="3" name="alamatsekolah"><?php echo set_value('alamatsekolah'); ?></textarea>
					  <?php echo form_error('alamatsekolah'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="tahunlulus" class="col-sm-4 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="tahunlulus" name="tahunlulus" value="<?php echo set_value('tahunlulus'); ?>">
					  <?php echo form_error('tahunlulus'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="nilai" class="col-sm-4 col-form-label">Nilai Kelulusan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nilai" name="nilai" value="<?php echo set_value('nilai'); ?>">
					  <?php echo form_error('nilai'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="ijasah" class="col-sm-4 col-form-label">Nomor Ijasah</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ijasah" name="ijasah" value="<?php echo set_value('ijasah'); ?>">
					  <?php echo form_error('ijasah'); ?>
                    </div>
                  </div>
                  </div>
                  </div>
              </div>
              
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                  Bagian 3 <span><i class="fa fa-angle-double-right"></i> Identitas Orang Tua</span>
                <hr>
                 <div class="form-group row">
                    <label for="ayah" class="col-sm-4 col-form-label">Nama Ayah</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ayah" name="ayah" value="<?php echo set_value('ayah'); ?>">
					  <?php echo form_error('ayah'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="kerjaayah" class="col-sm-4 col-form-label">Pekerjaan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="kerjaayah" name="kerjaayah" value="<?php echo set_value('kerjaayah'); ?>">
					  <?php echo form_error('kerjaayah'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="ibu" class="col-sm-4 col-form-label">Nama Ibu</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ibu" name="ibu" value="<?php echo set_value('ibu'); ?>">
					  <?php echo form_error('ibu'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="kerjaibu" class="col-sm-4 col-form-label">Pekerjaan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="kerjaibu" name="kerjaibu" value="<?php echo set_value('kerjaibu'); ?>">
					  <?php echo form_error('kerjaibu'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="alamatortu" class="col-sm-4 col-form-label">Alamat Orang Tua</label>
                    <div class="col-sm-8">
                     <textarea class="form-control" rows="3" name="alamatortu"><?php echo set_value('alamatortu'); ?></textarea>
					  <?php echo form_error('alamatortu'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="hportu" class="col-sm-4 col-form-label">HP Orang Tua</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="hportu" name="hportu" value="<?php echo set_value('hportu'); ?>">
					  <?php echo form_error('hportu'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="pendapatan" class="col-sm-4 col-form-label">Kisaran Pendapatan</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="pendapatan" value="Rp. 500.000 - 1.000.000">
                          <label class="form-check-label">Rp. 500.000 - 1.000.000</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="pendapatan" value="Rp. 1.000.000 - 2.000.000">
                          <label class="form-check-label">Rp. 1.000.000 - 2.000.000</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="pendapatan" value="Rp. 2.000.000 - 3.500.000">
                          <label class="form-check-label">Rp. 2.000.000 - 3.500.000</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="pendapatan" value="> Rp. 3.500.000">
                          <label class="form-check-label">> Rp. 3.500.000</label>
                        </div>
                        
                      </div>
					  <?php echo form_error('pendapatan'); ?>
                    </div>
                  </div>
                  </div>
                  </div>
              </div>
              <div class="col-md-6">
                 <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    Bagian 4 <span><i class="fa fa-angle-double-right"></i> Informasi Akademik</span>
                <hr>
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
                    <label for="pa" class="col-sm-4 col-form-label">Dosen PA</label>
                    <div class="col-sm-8">
                      <select name="pa" class="form-control select2" style="width: 100%;">
					 <option value=" ">Pilih...</option>
					 <?php foreach($namadosen as $dosen) { ?>
                    <option value="<?php echo $dosen->lecturer_id; ?>" <?php if(set_value('pa')==$dosen->lecturer_id) echo "selected"; ?>><?php echo $dosen->name; ?></option>
					
					 <?php } ?>
                  </select>
					  
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo set_value('kelas'); ?>">
					  <?php echo form_error('kelas'); ?>
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
                 
                </div>
                </div>
              </div>
               
          </div>
          
              <div class="card col-md-12">
                  
               <div class="card-body">
                   <div class="float-right"> <strong class="text-red">* </strong> : <small>Field wajib diisi!</small> </div>
                  <button type="submit" class="btn btn-info">Simpan</button>                 
                </div>
                </div>
         
        <?php echo form_close(); ?>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
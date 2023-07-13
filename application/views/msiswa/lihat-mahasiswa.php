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
          <div class="row">
              <div class="col-md-6">
                   <div class="card card-primary card-outline">
              <div class="card-body box-profile">
               Bagian 1 <span><i class="fa fa-angle-double-right"></i> Identitas Mahasiswa</span>
                <hr>
                  <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nama" value="<?php echo $mahasiswa->nama; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jekel" class="col-sm-4 col-form-label">Jenis Kelamin<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                      <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="pria" <?php if($mahasiswa->gender == 'pria') { echo 'checked';}else{ echo 'disabled';} ?>>Pria
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="wanita" <?php if($mahasiswa->gender == 'wanita') { echo 'checked';} else{ echo 'disabled';} ?>>Wanita
                      </label>
                    </div>
                    </div>
                  </div>
                    <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tempat, Tanggal Lahir<strong class="text-red">*</strong></label>
                    <div class="col-sm-8 row">
                    
                      <div class="col-6">
                        <input type="text" class="form-control" name="tempat" value="<?php echo $mahasiswa->tempat_lahir; ?>" disabled>
                        <?php echo form_error('tempat'); ?>
                      </div>
                      <div class="col-6">
                        <div class="input-group date" id="tanggallahir" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" value="<?php echo $mahasiswa->tanggal; ?>" disabled/>
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                      </div>
					  
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="religion" class="col-sm-4 col-form-label">Agama<strong class="text-red">*</strong></label>
                    <div class="col-sm-8 row">
                     <div class="col-8">   
                   
                         <?php  
				       	/**
				       	 * Form Dropdown Agama
				       	 *
				       	 * @var string
				       	 **/
				       	echo form_dropdown('', 
				       		array(
				       			'' => "-- PILIH --",
				       			'islam' => "Islam",
				       			'kristen' => "Kristen",
				       			'katolik' => "Katolik",
				       			'hindu' => "Hindu",
				       			'buddha' => "Buddha",
				       			'konghucu' => "Konghucu"
				       		), 
				       		$mahasiswa->agama,
				       		array('class' => 'form-control','disabled'=>'disabled')
				       	);
				       	?>
                    
                      </div>
                      <div class="col-4"></div>
					 
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="kerja" class="col-sm-4 col-form-label">Pekerjaan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="kerja" value="<?php echo $mahasiswa->pekerjaan; ?>" disabled>
					  <?php echo form_error('kerja'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                     <textarea class="form-control" rows="3" disabled><?php echo $mahasiswa->alamat; ?></textarea>
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
                    <label for="sekolah" class="col-sm-4 col-form-label">Nama Sekolah<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="sekolah" value="<?php echo $mahasiswa->school_name; ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="jurusan" class="col-sm-4 col-form-label">Jurusan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="jurusan" value="<?php echo $mahasiswa->school_study; ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="alamatsekolah" class="col-sm-4 col-form-label">Alamat Sekolah</label>
                    <div class="col-sm-8">
                     <textarea class="form-control" rows="3" disabled><?php echo $mahasiswa->school_address; ?></textarea>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="tahunlulus" class="col-sm-4 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="tahunlulus" value="<?php echo $mahasiswa->graduation_year; ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="nilai" class="col-sm-4 col-form-label">Nilai Kelulusan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nilai" value="<?php echo $mahasiswa->grade_value; ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="ijasah" class="col-sm-4 col-form-label">Nomor Ijasah</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ijasah" value="<?php echo $mahasiswa->certificate_number; ?>" disabled>
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
                      <input type="text" class="form-control" id="ayah" value="<?php echo $mahasiswa->father_name; ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="kerjaayah" class="col-sm-4 col-form-label">Pekerjaan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="kerjaayah" value="<?php echo $mahasiswa->father_jobs; ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="ibu" class="col-sm-4 col-form-label">Nama Ibu</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ibu" value="<?php echo $mahasiswa->mother_name; ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="kerjaibu" class="col-sm-4 col-form-label">Pekerjaan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="kerjaibu" value="<?php echo $mahasiswa->mother_jobs; ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="alamatortu" class="col-sm-4 col-form-label">Alamat Orang Tua</label>
                    <div class="col-sm-8">
                     <textarea class="form-control" rows="3" disabled><?php echo $mahasiswa->parent_address; ?></textarea>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="hportu" class="col-sm-4 col-form-label">HP Orang Tua</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="hportu" value="<?php echo $mahasiswa->phone_number; ?>" disabled>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="pendapatan" class="col-sm-4 col-form-label">Kisaran Pendapatan</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="Rp. 500.000 - 1.000.000" <?php if($mahasiswa->revenue == 'Rp. 500.000 - 1.000.000') { echo 'checked';}else{ echo 'disabled';} ?>>
                          <label class="form-check-label">Rp. 500.000 - 1.000.000</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="Rp. 1.000.000 - 2.000.000" <?php if($mahasiswa->revenue == 'Rp. 1.000.000 - 2.000.000') { echo 'checked';}else{ echo 'disabled';} ?>>
                          <label class="form-check-label">Rp. 1.000.000 - 2.000.000</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="Rp. 2.000.000 - 3.500.000" <?php if($mahasiswa->revenue == 'Rp. 2.000.000 - 3.500.000') { echo 'checked';}else{ echo 'disabled';} ?>>
                          <label class="form-check-label">Rp. 2.000.000 - 3.500.000</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="> Rp. 3.500.000" <?php if($mahasiswa->revenue == '> Rp. 3.500.000') { echo 'checked';}else{ echo 'disabled';} ?>>
                          <label class="form-check-label">> Rp. 3.500.000</label>
                        </div>
                      </div>
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
                      <input type="text" class="form-control" id="nim" value="<?php echo $mahasiswa->nim; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="prodi" class="col-sm-4 col-form-label">Prodi<strong class="text-red">*</strong></label>
                     <div class="col-sm-8">                      
					    <input type="text" class="form-control" value="<?php echo $mahasiswa->nama_prodi; ?>" disabled>					 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="pa" class="col-sm-4 col-form-label">Dosen PA<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" value="<?php echo $mahasiswa->nidn; ?> - <?php echo $mahasiswa->name; ?>" disabled>	
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value="<?php echo $mahasiswa->kelas; ?>" disabled>	
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tahun_masuk" class="col-sm-4 col-form-label">Tahun Masuk<strong class="text-red">*</strong></label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $mahasiswa->tahun_masuk; ?>" disabled>	
                    </div>
                  </div>
                 
                </div>
                </div>
              </div>
               
          </div>
          
              <div class="card col-md-12">
                  
               <div class="card-body">
                  <a href="<?php echo base_url(); ?>mahasiswa/ubhmahasiswa/<?php echo $mahasiswa->id_mahasiswa;  ?>.html" class="btn btn-info">Ubah</a>                 
                </div>
                </div>
         
        
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
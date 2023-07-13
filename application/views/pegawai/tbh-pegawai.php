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
                   <h4>Tambah Pegawai</h4>
                <hr>
                 <div class="row">
                <div class="col-md-5">
                
                 <div class="form-group row">
                    <label for="kode">Kode Dosen</label>
                      <input type="text" class="form-control" id="kode" name="kode" value="<?php echo set_value('kode'); ?>">
					  <?php echo form_error('kode'); ?>
                 </div>
                  <div class="form-group row">
                    <label for="nidn">NIDN/NIDK</label>
                      <input type="text" class="form-control" id="nidn" name="nidn" value="<?php echo set_value('nidn'); ?>">
					  <?php echo form_error('nidn'); ?>
                  </div>
                  
                  <div class="form-group row">
                    <label for="nama">Nama Lengkap<strong class="text-red">*</strong></label>
                      <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama'); ?>">
					  <?php echo form_error('nama'); ?>
                  </div>
                  <div class="form-group row">
                    <label for="alamat">Alamat</label>
                     <textarea class="form-control" rows="3" name="alamat" placeholder=""><?php echo set_value('alamat'); ?></textarea>
					  
                  </div>
                  <div class="form-group row">
                    <label for="telpon">Nomor Telpon</label>
                      <input type="text" class="form-control" id="telpon" name="telpon" value="<?php echo set_value('telpon'); ?>">
					 
                  </div>
                   <div class="form-group row">
                    <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat" value="<?php echo set_value('tempat'); ?>">
                       
                  </div>
                   <div class="form-group row">
                    <label>Tanggal Lahir</label>
                        <div class="input-group">
								<input type="text" name="tgl" class="form-control" id="datepicker-autoclose" value="<?php echo set_value('tgl'); ?>">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
								</div>
						</div>
						
                  </div>
                   <div class="form-group row">
                    <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
					  <?php echo form_error('email'); ?>
                  </div>
                   <div class="form-group row">
                    <label for="religion">Agama</label>
                    
                         <?php 
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
                   <div class="form-group">
                    <label for="jekel" style="padding-right: 10px;">Jenis Kelamin</label>
                    
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
					  <?php echo form_error('jekel'); ?>
                    
                  </div>
                  <div class="form-group row">
                        <label>Status Perkawinan</label>
                          <?php 
				       	echo form_dropdown('pasangan', 
				       		array(
				       			'' => "-- PILIH --",
				       			'0' => "Belum Menikah",
				       			'1' => "Menikah",
				       			'2' => "Cerai Hidup",
				       			'3' => "Cerai Mati"
				       		), 
				       		set_value('pasangan'),
				       		array('class' => 'form-control')
				       	);
				       	?>
                     
                    </div>
                  <div class="form-group row">
                        <label>Jumlah Anak</label>
                          <input type="text" class="form-control" name="anak" value="<?php echo set_value('anak'); ?>">
                    </div>
                  </div><!-- /.col-md-6-end -->
                   <div class="col-md-1" style="margin-left:10px; margin-right:10px; background-color: #f4f6f9!important;">
                      
                    </div>    
                 <div class="col-md-5">
                    <div class="form-group row">
                        <label>Jabatan Fungsional</label>
                          <input type="text" class="form-control" name="fungsional" value="<?php echo set_value('fungsional'); ?>">
                    </div>
                    <div class="form-group row">
                        <label>Pangkat/Golongan</label>
                          <input type="text" class="form-control" name="golongan" value="<?php echo set_value('golongan'); ?>">
                    </div>
                    <div class="form-group row">
                    <label>Program Studi</label>
                                         
							<?php
							$options[" "] = "-- PILIH --";
							foreach ($prodi as $prodi){
							$options[$prodi->id_prodi] = $prodi->nama_prodi;	
							}                                        
							echo form_dropdown('prodi', $options, set_value('prodi'), array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
												 
                    
                    </div>
                    <div class="form-group row">
                    <label for="nip">NIP/NIK</label>
                      <input type="text" class="form-control" id="nip" name="nip" value="<?php echo set_value('nip'); ?>">
					  <?php echo form_error('nip'); ?>
                  </div>
                     <div class="form-group row">
                        <label>Status Kepegawaian</label>
                         	<?php
							$opsi[" "] = "-- PILIH --";
							foreach ($stat as $stat){
							$opsi[$stat->kode_status] = $stat->nama_status.' (Rp. '.number_format("$stat->tunj_status",0,",",".").')';	
							}                                        
							echo form_dropdown('status', $opsi, set_value('status'), array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
                     
                    </div>
                    <div class="form-group row">
                        <label>Tanggal Mulai Menjadi Dosen (TMMD)</label>
                          <input type="text" class="form-control" name="tmmd" value="<?php echo set_value('tmmd'); ?>">
                    </div>
                    <div class="form-group row">
                        <label>Pendidikan Tertinggi</label>
                          <input type="text" class="form-control" name="tertinggi" value="<?php echo set_value('tertinggi'); ?>">
                    </div>
                    <div class="form-group row">
                        <label>No Sertifikasi</label>
                          <input type="text" class="form-control" name="sertifikasi" value="<?php echo set_value('sertifikasi'); ?>">
                    </div>
                    <div class="form-group row">
                        <label>Bidang Ilmu</label>
                          <input type="text" class="form-control" name="ilmu" value="<?php echo set_value('ilmu'); ?>">
                    </div>
                     <div class="form-group row">
                        <label>Status Aktif Serdos</label>
                         <?php 
				       	echo form_dropdown('aktif', 
				       		array(
				       			'' => "-- PILIH --",
				       			'aktif' => "Aktif",
				       			'tidak' => "Tidak Aktif"
				       		), 
				       		set_value('aktif'),
				       		array('class' => 'form-control')
				       	);
				       	?>
                    </div>
                     <div class="form-group row">
                        <label>Status Aktif Kerja</label>
                         <?php 
				       	echo form_dropdown('kerja', 
				       		array(
				       			'' => "-- PILIH --",
				       			'1' => "Aktif",
				       			'2' => "Tidak Aktif"
				       		), 
				       		set_value('kerja'),
				       		array('class' => 'form-control')
				       	);
				       	?>
                    </div>
                    <div class="form-group row">
                    <label>Tugas Tambahan</label>
                                         
							<?php
							$items[" "] = "-- PILIH --";
							foreach ($tugas as $tugas){
							$items[$tugas->id_tugas] = $tugas->nama_tugas;	
							}                                        
							echo form_dropdown('tugas', $items, set_value('tugas'), array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
												 
                    
                    </div>
                </div><!-- /.col-md-6-end -->
                  </div><!-- /.row-end -->
                </div><!-- /.card-body box-profile-end -->
                <div class="card-footer">
                    <div class="float-right"> <small><strong class="text-red">* </strong>: Field wajib diisi!</small></div>
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

 
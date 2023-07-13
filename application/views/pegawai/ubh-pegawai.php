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
                   <h4>Tambah Dosen</h4>
                <hr>
                 <div class="row">
                <div class="col-md-5">
                
                 <div class="form-group row">
                    <label for="kode">Kode Dosen</label>
                      <input type="text" class="form-control" id="kode" name="kode" value="<?php if(!empty($dosen->lecturer_code)) { echo $dosen->lecturer_code;}else{ echo set_value('kode');} ?>">
					  <?php echo form_error('kode'); ?>
                 </div>
                  <div class="form-group row">
                    <label for="nidn">NIDN/NIDK</label>
                      <input type="text" class="form-control" id="nidn" name="nidn" value="<?php if(!empty($dosen->nidn)) { echo $dosen->nidn;}else{ echo set_value('nidn');} ?>">
					  <?php echo form_error('nidn'); ?>
                  </div>
                  
                  <div class="form-group row">
                    <label for="nama">Nama Lengkap<strong class="text-red">*</strong></label>
                      <input type="text" class="form-control" id="nama" name="nama" value="<?php if(!empty($dosen->name)) { echo $dosen->name;}else{ echo set_value('nama');} ?>">
					  <?php echo form_error('nama'); ?>
                  </div>
                  <div class="form-group row">
                    <label for="alamat">Alamat</label>
                     <textarea class="form-control" rows="3" name="alamat" placeholder=""><?php if(!empty($dosen->address)) { echo $dosen->address;}else{ echo set_value('alamat');} ?></textarea>
					  
                  </div>
                  <div class="form-group row">
                    <label for="telpon">Nomor Telpon</label>
                      <input type="text" class="form-control" id="telpon" name="telpon" value="<?php if(!empty($dosen->phone)) { echo $dosen->phone;}else{ echo set_value('telpon');} ?>">
					 
                  </div>
                   <div class="form-group row">
                    <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat" value="<?php if(!empty($dosen->place_of_birts)) { echo $dosen->place_of_birts;}else{ echo set_value('tempat');} ?>">
                       
                  </div>
                   <div class="form-group row">
                    <label>Tanggal Lahir</label>
                        <div class="input-group">
								<input type="text" name="tgl" class="form-control" id="datepicker-autoclose" value="<?php if(!empty($dosen->birts)) { echo $dosen->birts;}else{ echo set_value('tgl');} ?>">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
								</div>
						</div>
						
                  </div>
                   <div class="form-group row">
                    <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?php if(!empty($dosen->email)) { echo $dosen->email;}else{ echo set_value('email');} ?>">
                  </div>
                   <div class="form-group row">
                    <label for="religion">Agama</label>
                    
                         <?php 
                         if(!empty($dosen->religion)) { $xx = $dosen->religion;}else{ $xx = set_value('email');}
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
				       		$xx,
				       		array('class' => 'form-control')
				       	);
				       	?>
                    
                     
                  </div>
                   <div class="form-group">
                    <label for="jekel" style="padding-right: 10px;">Jenis Kelamin</label>
                    
                      <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jekel" value="pria" <?php if(!empty($dosen->gender) && $dosen->gender == "pria") { echo "checked";}else{echo  set_radio('jekel', 'pria');} ?>>Pria
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jekel" value="wanita" <?php if(!empty($dosen->gender) && $dosen->gender == "wanita") { echo "checked";}else{echo  set_radio('jekel', 'wanita');} ?>>Wanita
                      </label>
                    </div>
					  <?php echo form_error('jekel'); ?>
                    
                  </div>
                  <div class="form-group row">
                        <label>Status Perkawinan</label>
                          <?php 
                          if(!empty($dosen->pasangan)) { $pasa = $dosen->pasangan;}else{ $pasa = set_value('status');}
				       	echo form_dropdown('pasangan', 
				       		array(
				       			'' => "-- PILIH --",
				       			'0' => "Belum Menikah",
				       			'1' => "Menikah",
				       			'2' => "Cerai Hidup",
				       			'3' => "Cerai Mati"
				       		), 
				       		$pasa,
				       		array('class' => 'form-control')
				       	);
				       	?>
                     
                    </div>
                  <div class="form-group row">
                        <label>Jumlah Anak</label>
                          <input type="text" class="form-control" name="anak" value="<?php if(!empty($dosen->anak)) { echo $dosen->anak;}else{ echo set_value('anak');} ?>">
                    </div>
                  
                  </div><!-- /.col-md-6-end -->
                   <div class="col-md-1" style="margin-left:10px; margin-right:10px; background-color: #f4f6f9!important;">
                      
                    </div>    
                 <div class="col-md-5">
                    <div class="form-group row">
                        <label>Jabatan Fungsional</label>
                          <input type="text" class="form-control" name="fungsional" value="<?php if(!empty($dosen->fungsional)) { echo $dosen->fungsional;}else{ echo set_value('fungsional');} ?>">
                    </div>
                    <div class="form-group row">
                        <label>Pangkat/Golongan</label>
                          <input type="text" class="form-control" name="golongan" value="<?php if(!empty($dosen->golongan)) { echo $dosen->golongan;}else{ echo set_value('golongan');} ?>">
                    </div>
                    <div class="form-group row">
                    <label>Program Studi</label>
                                         
							<?php
							 if(!empty($dosen->base)) { $bb = $dosen->base;}else{ $bb = set_value('prodi');}
							$options[" "] = "-- PILIH --";
							foreach ($prodi as $prodi){
							$options[$prodi->id_prodi] = $prodi->nama_prodi;	
							}                                        
							echo form_dropdown('prodi', $options, $bb, array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
												 
                    
                    </div>
                    <div class="form-group row">
                    <label for="nip">NIP/NIK</label>
                      <input type="text" class="form-control" id="nip" name="nip" value="<?php if(!empty($dosen->nip)) { echo $dosen->nip;}else{ echo set_value('nip');} ?>">
					  <?php echo form_error('nip'); ?>
                  </div>
                     <div class="form-group row">
                        <label>Status Kepegawaian</label>
                         	<?php
                         	 if(!empty($dosen->status)) { $jnu = $dosen->status;}else{ $jnu = set_value('status');}
							$opsi[" "] = "-- PILIH --";
							foreach ($stat as $stat){
							$opsi[$stat->kode_status] = $stat->nama_status.' (Rp. '.number_format("$stat->tunj_status",0,",",".").')';	
							}                                        
							echo form_dropdown('status', $opsi, $jnu, array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
                     
                    </div>
                    <div class="form-group row">
                        <label>Tanggal Mulai Menjadi Dosen (TMMD)</label>
                          <input type="text" class="form-control" name="tmmd" value="<?php if(!empty($dosen->tmmd)) { echo $dosen->tmmd;}else{ echo set_value('tmmd');} ?>">
                    </div>
                    <div class="form-group row">
                        <label>Pendidikan Tertinggi</label>
                          <input type="text" class="form-control" name="tertinggi" value="<?php if(!empty($dosen->tertinggi)) { echo $dosen->tertinggi;}else{ echo set_value('tertinggi');} ?>">
                    </div>
                    <div class="form-group row">
                        <label>No Sertifikasi</label>
                          <input type="text" class="form-control" name="sertifikasi" value="<?php if(!empty($dosen->sertifikasi)) { echo $dosen->sertifikasi;}else{ echo set_value('sertifikasi');} ?>">
                    </div>
                    <div class="form-group row">
                        <label>Bidang Ilmu</label>
                          <input type="text" class="form-control" name="ilmu" value="<?php if(!empty($dosen->ilmu)) { echo $dosen->ilmu;}else{ echo set_value('ilmu');} ?>">
                    </div>
                    <div class="form-group row">
                        <label>Status Aktif Serdos</label>
                         <?php 
                          if(!empty($dosen->aktif_serdos)) { $aser = $dosen->aktif_serdos;}else{ $aser = set_value('aktif');}
				       	echo form_dropdown('aktif', 
				       		array(
				       			'' => "-- PILIH --",
				       			'aktif' => "Aktif",
				       			'tidak' => "Tidak Aktif"
				       		), 
				       		$aser,
				       		array('class' => 'form-control')
				       	);
				       	?>
                    </div>
                     <div class="form-group row">
                        <label>Status Aktif Kerja</label>
                         <?php 
                          if(!empty($dosen->aktif_kerja)) { $aker = $dosen->aktif_kerja;}else{ $aker = set_value('kerja');}
				       	echo form_dropdown('kerja', 
				       		array(
				       			'' => "-- PILIH --",
				       			'1' => "Aktif",
				       			'2' => "Tidak Aktif"
				       		), 
				       		$aker,
				       		array('class' => 'form-control')
				       	);
				       	?>
                    </div>
                     <div class="form-group row">
                    <label>Tugas Tambahan</label>
                                         
							<?php
							if(!empty($dosen->tugas)) { $cc = $dosen->tugas;}else{ $cc = set_value('tugas');}
							$items[" "] = "-- PILIH --";
							foreach ($tugas as $tugas){
							$items[$tugas->id_tugas] = $tugas->nama_tugas;	
							}                                        
							echo form_dropdown('tugas', $items, $cc, array('class' => 'form-control','style' =>'width: 100%;') ); 
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

 
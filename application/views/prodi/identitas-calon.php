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
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Identitas Calon Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                 <div class="form-group row">
                    <label for="inputNIK" class="col-sm-2 col-form-label">NIK<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNIK" name="nik" placeholder="Nomor Induk Kependudukan" value="<?php if(!empty($siswa->nik_siswa)) { echo $siswa->nik_siswa; } else {echo set_value('nik'); }?>">
                      <?php echo form_error('nik'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNISN" class="col-sm-2 col-form-label">NISN<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <span class="form-control" style="background-color: #e9ecef;"><?php echo $siswa->nis_siswa; ?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNamaLengkap" class="col-sm-2 col-form-label">Nama Lengkap<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <span class="form-control" style="background-color: #e9ecef;"><?php echo $siswa->nama_siswa; ?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                        <div class="row">
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php if(!empty($siswa->tmp_lahir_siswa)) { echo $siswa->tmp_lahir_siswa; } else {echo set_value('tempat_lahir'); }?>">
                        <?php echo form_error('tempat_lahir'); ?> 
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group date" id="tanggallahir" data-target-input="nearest">
                            <input type="text" name="tgl" class="form-control datetimepicker-input" data-target="#tanggallahir" value="<?php if(!empty($siswa->tgl_lahir_siswa)) { echo $siswa->tgl_lahir_siswa; } else {echo set_value('tgl'); }?>" placeholder="Tanggal Lahir">
                            
                            <div class="input-group-append" data-target="#tanggallahir" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <?php echo form_error('tgl'); ?>
    				</div>
    				</div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jekel" class="col-sm-2 col-form-label">Jenis Kelamin<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jekel" value="pria" <?php if(!empty($siswa->jekel_siswa) && $siswa->jekel_siswa =="pria") { echo "checked";}else { echo  set_radio('jekel', 'pria');} ?>>Pria
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jekel" value="wanita" <?php if(!empty($siswa->jekel_siswa) && $siswa->jekel_siswa =="wanita") { echo "checked";}else { echo  set_radio('jekel', 'wanita');} ?>>Wanita
                      </label>
                    </div>
					  <?php echo form_error('jekel'); ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <?php  
                      if (!empty($siswa->agama_siswa)) {
                          $agam = $siswa->agama_siswa;
                      }else {
                          $agam = set_value('agama');
                      }
				       	echo form_dropdown('agama', 
				       		array(
				       			'' => "-- PILIH --",
				       			'islam' => "Islam",
				       			'kristen' => "Kristen",
				       			'katolik' => "Katolik",
				       			'hindu' => "Hindu",
				       			'buddha' => "Buddha",
				       			'konghucu' => "Konghucu"
				       		), 
				       		$agam,
				       		array('class' => 'form-control')
				       	);
				       	?>
                     <?php echo form_error('agama'); ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Jalan</label>
                    <div class="col-sm-10">
                     <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"><?php if(!empty($siswa->alamat_siswa)) { echo $siswa->alamat_siswa; } else {echo set_value('alamat'); }?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputDusun" class="col-sm-2 col-form-label">Dusun</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputDusun" name="dusun" placeholder="Dusun" value="<?php if(!empty($siswa->dusun_siswa)) { echo $siswa->dusun_siswa; } else {echo set_value('dusun'); }?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputRT/RW" class="col-sm-2 col-form-label">RT/RW</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputRT/RW" name="rt" placeholder="RT/RW" value="<?php if(!empty($siswa->rtrw_siswa)) { echo $siswa->rtrw_siswa; } else {echo set_value('rt'); }?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputDesa" class="col-sm-2 col-form-label">Desa<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputDesa" name="desa" placeholder="Desa" value="<?php if(!empty($siswa->	desa_siswa)) { echo $siswa->	desa_siswa; } else {echo set_value('desa'); }?>">
                       <?php echo form_error('desa'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputKecamatan" class="col-sm-2 col-form-label">Kecamatan<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputKecamatan" name="kec" placeholder="Kecamatan" value="<?php if(!empty($siswa->kec_siswa)) { echo $siswa->	kec_siswa; } else {echo set_value('kec'); }?>">
                       <?php echo form_error('kec'); ?>
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputKodePos" class="col-sm-2 col-form-label">Kode Pos</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputKodePos" name="pos" placeholder="Kode Pos" value="<?php if(!empty($siswa->pos_siswa)) { echo $siswa->pos_siswa; } else {echo set_value('pos'); }?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNOHP" class="col-sm-2 col-form-label">Nomor HP<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNOHP" name="hp" placeholder="Nomor HP" value="<?php if(!empty($siswa->hp_siswa)) { echo $siswa->hp_siswa; } else {echo set_value('hp'); }?>">
                      <?php echo form_error('hp'); ?>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="lainnya" class="col-sm-4 col-form-label">Jenis Tinggal</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="ortu" name="jenis_tinggal" <?php if(!empty($siswa->jenis_tiggal_siswa) && $siswa->jenis_tiggal_siswa =="ortu") { echo "checked";}else { echo  set_radio('jenis_tinggal', 'ortu');} ?>>
                          <label class="form-check-label">Bersama Orang Tua</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="kontrakan" name="jenis_tinggal" <?php if(!empty($siswa->jenis_tiggal_siswa) && $siswa->jenis_tiggal_siswa =="kontrakan") { echo "checked";}else { echo  set_radio('jenis_tinggal', 'kontrakan');} ?>>
                          <label class="form-check-label">Kost/Kontrakan</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="rumah_sendiri" name="jenis_tinggal"<?php if(!empty($siswa->jenis_tiggal_siswa) && $siswa->jenis_tiggal_siswa =="rumah_sendiri") { echo "checked";}else { echo  set_radio('jenis_tinggal', 'rumah_sendiri');} ?>>
                          <label class="form-check-label">Rumah Keluarga</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="transpot" class="col-sm-4 col-form-label">Transportasi</label>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="transpot" value="jalan kaki" <?php if(!empty($siswa->transpot_siswa) && $siswa->transpot_siswa =="jalan kaki") { echo "checked";}else { echo  set_radio('transpot', 'jalan kaki');} ?>>
                          <label class="form-check-label">Jalan Kaki</label>
                          <div></div>
                          <input class="form-check-input" type="radio" name="transpot" value="sepeda motor" <?php if(!empty($siswa->transpot_siswa) && $siswa->transpot_siswa =="sepeda motor") { echo "checked";}else { echo  set_radio('transpot', 'sepeda motor');} ?>>
                          <label class="form-check-label">Sepeda Motor</label>
                        
                        <div></div>
                          <input class="form-check-input" type="radio" name="transpot" value="angkutan umum" <?php if(!empty($siswa->transpot_siswa) && $siswa->transpot_siswa =="angkutan umum") { echo "checked";}else { echo  set_radio('transpot', 'angkutan umum');} ?>>
                          <label class="form-check-label">angkutan umum</label>
                        
                        <div>
                          <input class="form-check-input" type="radio" name="transpot" value="lainnya" <?php if(!empty($siswa->transpot_siswa) && $siswa->transpot_siswa =="lainnya") { echo "checked";}else { echo  set_radio('transpot', 'lainnya');} ?>>
                          <label class="form-check-label">lainnya</label>
                        </div>
                        </div>    
                      </div>
                    </div>
                  </div>
                  </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="kps" class="col-sm-2 col-form-label">Nomor KPS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputKPS" name="no_kps" placeholder="Nomor Kartu Perlindungan Sosial" value="<?php if(!empty($siswa->kps_siswa)) { echo $siswa->kps_siswa; } else {echo set_value('no_kps'); }?>">
                    </div>
 
                  
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">SIMPAN</button>
                  <a href="<?php echo base_url(); ?>masterpmb/lihatsiswa/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Kembali</a>
                </div>
                <!-- /.card-footer -->
              
            </div>
            <!-- /.card -->

          </div>
          
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
         
        <?php echo form_close(); ?>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
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
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Identitas AYAH</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputNIKAY" class="col-sm-2 col-form-label">NIK<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNIKAY" name="nik_ay" placeholder="NIK" value="<?php if(!empty($ortu->nik_ayah)) { echo $ortu->nik_ayah; } else {echo set_value('nik_ay'); }?>">
                      <?php echo form_error('nik_ay'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNamaAyah" class="col-sm-2 col-form-label">Nama Ayah <strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" id="inputNamaAyah" name="nama_ay" placeholder="Nama" value="<?php if(!empty($ortu->nama_ayah)) { echo $ortu->nama_ayah; } else {echo set_value('nama_ay'); }?>">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                        <div class="row">
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="tempat_lahir_ay" placeholder="Tempat Lahir" value="<?php if(!empty($ortu->tmp_lahir_ayah)) { echo $ortu->tmp_lahir_ayah; } else {echo set_value('tempat_lahir_ay'); }?>">
                        <?php echo form_error('tempat_lahiray'); ?> 
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group date" id="tanggallahir" data-target-input="nearest">
                            <input type="text" name="tglay" class="form-control datetimepicker-input" data-target="#tanggallahir" value="<?php if(!empty($ortu->tgl_lahir_ayah)) { echo date("d-m-Y", strtotime($ortu->tgl_lahir_ayah)); } else {echo set_value('tglay'); }?>" placeholder="Tanggal Lahir">
                            
                            <div class="input-group-append" data-target="#tanggallahir" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                           
                        </div>
                        <?php echo form_error('tglay'); ?>
    				</div>
    				</div>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputAlamatAY" class="col-sm-2 col-form-label">Alamat<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputAlamatAY" name="alamatay" placeholder="Alamat" value="<?php if(!empty($ortu->alamat_ayah)) { echo $ortu->alamat_ayah; } else {echo set_value('alamatay'); }?>">
                    <?php echo form_error('alamatay'); ?>
                  </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPekerjaan" name="pekerjaan_ay"  placeholder="Pekerjaan" value="<?php if(!empty($ortu->pekerjaan_ayah)) { echo $ortu->pekerjaan_ayah; } else {echo set_value('pekerjaan_ay'); }?>">
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPendidikanAY" class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPendidikanAY" name="pendidikan_ay" placeholder="Pendidikan" value="<?php if(!empty($ortu->pendidikan_ayah)) { echo $ortu->pendidikan_ayah; } else {echo set_value('pendidikan_ay'); }?>">
                      <?php echo form_error('pendidikan_ay'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNOHPAY" class="col-sm-2 col-form-label">No HP<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNOHPAY" name="no_ay" placeholder="Nomor HP" value="<?php if(!empty($ortu->hp_ayah)) { echo $ortu->hp_ayah; } else {echo set_value('no_ay'); }?>">
                      <?php echo form_error('no_ay'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNPWPAY" class="col-sm-2 col-form-label">NPWP</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNPWPAY" name="npwp_ay" placeholder="NPWP" value="<?php if(!empty($ortu->npwp_ayah)) { echo $ortu->npwp_ayah; } else {echo set_value('npwp_ay'); }?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="PenghasilanAY" class="col-sm-2 col-form-label">Penghasilan<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="PenghasilanAY" name="pg_ay" placeholder="Penghasilan" value="<?php if(!empty($ortu->penghasilan_ayah)) { echo $ortu->penghasilan_ayah; } else {echo set_value('pg_ay'); }?>">
                      <?php echo form_error('pg_ay'); ?>
                    </div>
                  </div>        
                  </div><!-- /.card-body -->
                </div>
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Identitas IBU</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                     <div class="card-body">
                      <div class="form-group row">
                        <label for="NIKIBU" class="col-sm-2 col-form-label">NIK<strong class="text-red">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="NIKIBU" name="nik_ib" placeholder="NIK" value="<?php if(!empty($ortu->nik_ibu)) { echo $ortu->nik_ibu; } else {echo set_value('nik_ib'); }?>">
                           <?php echo form_error('nik_ib'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="NamaIbu" class="col-sm-2 col-form-label">Nama Ibu<strong class="text-red">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="NamaIbu" name="nama_ib" placeholder="Nama Ibu" value="<?php if(!empty($ortu->nama_ibu)) { echo $ortu->nama_ibu; } else {echo set_value('nama_ib'); }?>">
                           <?php echo form_error('nama_ib'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                        <div class="row">
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="tempat_lahir_ib" placeholder="Tempat Lahir" value="<?php if(!empty($ortu->tmp_lahir_ibu)) { echo $ortu->tmp_lahir_ibu; } else {echo set_value('tempat_lahir_ib'); }?>" >
                        <?php echo form_error('tempat_lahir_ib'); ?> 
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group date" id="tanggallahir1" data-target-input="nearest">
                            <input type="text" name="tgl_ib" class="form-control datetimepicker-input" data-target="#tanggallahir1" value="<?php if(!empty($ortu->tgl_lahir_ibu)) { echo date("d-m-Y", strtotime($ortu->tgl_lahir_ibu)); } else {echo set_value('tgl_ib'); }?>" placeholder="Tanggal Lahir">
                            
                            <div class="input-group-append" data-target="#tanggallahir1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <?php echo form_error('tgl_ib'); ?>
    				</div>
    				</div>
                    </div>
                  </div>
                      
                      <div class="form-group row">
                        <label for="AlamatIBU" class="col-sm-2 col-form-label">Alamat<strong class="text-red">*</strong></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="AlamatIBU" name="alamat_ib" placeholder="Alamat" value="<?php if(!empty($ortu->alamat_ibu)) { echo $ortu->alamat_ibu; } else {echo set_value('alamat_ib'); }?>">
                         <?php echo form_error('alamat_ib'); ?>
                      </div>
                      </div>
    
                      <div class="form-group row">
                        <label for="PekerjaanIBU" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="PekerjaanIBU"  name="pjk_ib" placeholder="Pekerjaan" value="<?php if(!empty($ortu->pekerjaan_ibu)) { echo $ortu->pekerjaan_ibu; } else {echo set_value('pjk_ib'); }?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="PendidikanIBU" class="col-sm-2 col-form-label">Pendidikan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="PendidikanIBU" name="pp_ibu" placeholder="Pendidikan" value="<?php if(!empty($ortu->pendidikan_ibu)) { echo $ortu->pendidikan_ibu; } else {echo set_value('pp_ibu'); }?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="NoHpIbu" class="col-sm-2 col-form-label">No HP<strong class="text-red">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="NoHpIbu" name="no_hpib" placeholder="Nomor Hp" value="<?php if(!empty($ortu->hp_ibu)) { echo $ortu->hp_ibu; } else {echo set_value('no_hpib'); }?>">
                           <?php echo form_error('no_hpib'); ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="NPWPIBU" class="col-sm-2 col-form-label">NPWP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="NPWPIBU" name="npwpib" placeholder="NPWP"  value="<?php if(!empty($ortu->npwp_ibu)) { echo $ortu->npwp_ibu; } else {echo set_value('npwpib'); }?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="PenghasilanIBU" class="col-sm-2 col-form-label">Penghasilan<strong class="text-red">*</strong></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="PenghasilanIBU" name="pg_ib" placeholder="Penghasilan" value="<?php if(!empty($ortu->penghasilan_ibu)) { echo $ortu->penghasilan_ibu; } else {echo set_value('pg_ib'); }?>">
                          <?php echo form_error('pg_ib'); ?>
                        </div>
                      </div>        
                      </div>
                    </div>
                    
                      <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Identitas Wali</h3>
                  </div>
                  <!-- /.card-header -->
                     <div class="card-body">
                      <div class="form-group row">
                        <label for="NIKwali" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="NIKwali" name="nik_wl" placeholder="NIK" value="<?php if(!empty($ortu->	nik_wali)) { echo $ortu->	nik_wali; } else {echo set_value('nik_wl'); }?>">
                          
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="NamaWali" class="col-sm-2 col-form-label">Nama Wali</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="NamaWali" name="nama_wl" placeholder="Nama Wali" value="<?php if(!empty($ortu->nama_wali)) { echo $ortu->nama_wali; } else {echo set_value('nama_wl'); }?>">
                          
                        </div>
                      </div>
                      
                      <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <div class="row">
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="tempat_lahir_wl" placeholder="Tempat Lahir" value="<?php if(!empty($ortu->tmp_lahir_wali)) { echo $ortu->tmp_lahir_wali; } else {echo set_value('tempat_lahir_wl'); }?>" >
                       
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group date" id="tanggallahir2" data-target-input="nearest">
                            <input type="text" name="tgl_wl" class="form-control datetimepicker-input" data-target="#tanggallahir2" value="<?php if(!empty($ortu->tgl_lahir_wali)) { echo date("d-m-Y", strtotime($ortu->tgl_lahir_wali)); } else {echo set_value('tgl_wl'); }?>" placeholder="Tanggal Lahir">
                            <div class="input-group-append" data-target="#tanggallahir2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        
    				</div>
    				</div>
                    </div>
                  </div>
                      <div class="form-group row">
                        <label for="AlamatWALI" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="AlamatWALI" name="alamat_wl" placeholder="Alamat" value="<?php if(!empty($ortu->alamat_wali)) { echo $ortu->alamat_wali; } else {echo set_value('alamat_wl'); }?>">
                        
                      </div>
                      </div>
    
                      <div class="form-group row">
                        <label for="PekerjaanWl" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="PekerjaanWL"  name="pekerjaan_wl" placeholder="Pekerjaan" value="<?php if(!empty($ortu->kerja_wali)) { echo $ortu->kerja_wali; } else {echo set_value('pekerjaan_wl'); }?>">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="NoHpWL" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="NoHpWL" name="hp_wl" placeholder="Nomor Hp"  value="<?php if(!empty($ortu->hp_wali)) { echo $ortu->hp_wali; } else {echo set_value('hp_wl'); }?>">
                         
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="NPWPWL" class="col-sm-2 col-form-label">NPWP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="NPWPWL" name="npwp_wl" placeholder="NPWP" value="<?php if(!empty($ortu->npwp_wali)) { echo $ortu->npwp_wali; } else {echo set_value('npwp_wl'); }?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="PenghasilanWL" class="col-sm-2 col-form-label">Penghasilan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="PenghasilanWL" name="pg_wl" placeholder="Penghasilan" value="<?php if(!empty($ortu->penghasil_wali)) { echo $ortu->penghasil_wali; } else {echo set_value('pg_wl'); }?>">
                          
                        </div>
                      </div>        
                      </div>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">SIMPAN</button>
                   <a href="<?php echo base_url(); ?>masterpmb/lihatsiswa/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Kembali</a>
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

 
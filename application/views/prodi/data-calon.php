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
                    <label for="inputNIK" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                    
                      
                         <span class="form-control"><?php echo $siswa->nik_siswa;	?></span>
                     
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNISN" class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-10">
                       <span class="form-control"><?php echo $siswa->nis_siswa;	?></span>
                        
                      
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputNamaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                         <span class="form-control"><?php echo $siswa->nama_siswa;	?></span>
                    
                    </div>
                  </div>
                 
                  
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-10">
                       
                     
                   <span class="form-control"><?php echo $siswa->tmp_lahir_siswa.', '.$siswa->tgl_lahir_siswa;	?></span>
                     
    			
    				
                    </div>
                  </div>
                  
                  
                 
                 <div class="form-group row">
                    <label for="jenis" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        
                         <span class="form-control"><?php echo $siswa->jekel_siswa;	?></span>
                   
                    </div>
                  </div>
                  
                  
                   
                 <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                     <span class="form-control" ><?php echo ucfirst($siswa->agama_siswa);?></span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                         <span class="form-control"><?php echo $siswa->alamat_siswa;	?></span>
                     </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputDusun" class="col-sm-2 col-form-label">Dusun</label>
                    <div class="col-sm-10">
                         <span class="form-control"><?php echo $siswa->dusun_siswa;	?></span>
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputRT/RW" class="col-sm-2 col-form-label">RT/RW</label>
                    <div class="col-sm-10">
                         <span class="form-control"><?php echo $siswa->rtrw_siswa;	?></span>
                     
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputDesa" class="col-sm-2 col-form-label">Desa</label>
                    <div class="col-sm-10">
                         <span class="form-control"><?php echo $siswa->desa_siswa;	?></span>
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputKecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                         <span class="form-control"><?php echo $siswa->kec_siswa;	?></span>
                      
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputKodePos" class="col-sm-2 col-form-label">Kode Pos</label>
                    <div class="col-sm-10">
                         <span class="form-control"><?php echo $siswa->pos_siswa;	?></span>
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNOHP" class="col-sm-2 col-form-label">Nomor HP</label>
                    <div class="col-sm-10">
                         <span class="form-control"><?php echo $siswa->hp_siswa;	?></span>
                     
                    </div>
                  </div>
                  
                  
                  
                   <div class="form-group row">
                    <label for="jenistgl" class="col-sm-2 col-form-label">Jenis Tinggal</label>
                    <div class="col-sm-10">
                     <span class="form-control"><?php
                     if($siswa->jenis_tiggal_siswa =="ortu") { 
                     echo "Bersama orang tua"; 
                     }else {
                        echo $siswa->jenis_tiggal_siswa;
                     }
                     
                     
                     
                     
                     
                     ?></span>
                    </div>
                  </div>
                  
                  
                   <div class="form-group row">
                    <label for="jenistgl" class="col-sm-2 col-form-label"> Transportasi</label>
                    <div class="col-sm-10">
                      
                      
                        <span class="form-control"><?php echo $siswa->transpot_siswa;	?></span>
                    </div>
                  </div>
                  
                
                  
                  <div class="form-group row">
                    <label for="kps" class="col-sm-2 col-form-label">Nomor KPS</label>
                    <div class="col-sm-10">
                        <span class="form-control"><?php echo $siswa->kps_siswa;	?></span>
                       
                    </div>
 
                  
                  </div>
                  
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php if($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49"){ ?>
                     <a href="<?php echo base_url(); ?>masterpmb/formcalon/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Ubah</a>
                    <?php }  ?>
                 
                  
                </div>
                <!-- /.card-footer -->
              
            </div>
            <!-- /.card -->

          </div>
          </div>
              <!-- /.card-body -->
           
            
            <!-- /.card -->
            </div>
         
         <div class="col-md-12">
               <div class="row">
           <div class="col-sm-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">PENDIDIKAN TERTINGGI SEBELUMNYA</h3>
              </div>
                <div class="card-body">
                     <div class="form-group row">
                         
                    <label for="sekolah" class="col-sm-2 col-form-label">Asal Sekolah </label>
                    <div class="col-sm-10">
                      <span class="form-control"><?php echo ucfirst($siswa->jenis_sekolah);	?></span>
                  
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="NamaSekolah" class="col-sm-2 col-form-label">Nama Sekolah </label>
                    <div class="col-sm-10">
                      <span class="form-control"><?php echo $siswa->nama_sekolah;	?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="AlamatSKLH" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                     <span class="form-control"><?php echo $siswa->alamat_sekolah;	?></span>
                    </div>
                  </div>
				  
                  <div class="form-group row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                      <span class="form-control"><?php echo $siswa->jurusan_sekolah;	?></span>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputTahunLulus" class="col-sm-2 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                      <span class="form-control"><?php echo $siswa->tahun_lulus_sekolah;	?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNomorSKHUN" class="col-sm-2 col-form-label">Nomor SKHUN </label>
                    <div class="col-sm-10">
                      <span class="form-control"><?php echo $siswa->skhun_sekolah;	?></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNomorIJAZAH" class="col-sm-2 col-form-label">Nomor IJAZAH </label>
                    <div class="col-sm-10">
                     <span class="form-control"><?php echo $siswa->ijasah_sekolah;	?></span>
                    </div>
                  </div>
                  </div>
                   <div class="card-footer">
                       <?php if($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49"){ ?>
                        <?php if($siswa->jalur =="test") { ?>
                  <a href="<?php echo base_url(); ?>masterpmb/formpendidikan/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Ubah</a>
                  <?php }else{ ?>
                   <a href="<?php echo base_url(); ?>masterpmb/formpendidikanpmdk/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Ubah</a>
                  <?php } ?>
                    <?php }  ?>
                    
                     
                </div>
                </div>
                <!-- /.card-body -->
                
            </div>
            <!-- /.card -->
          
          <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Program Studi Yang di Pilih</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group row">
                  <label for="inputNP" class="col-sm-2 col-form-label">Program Studi Pilihan I</label>
                  <div class="col-sm-10">
                      <span class="form-control"><?php echo $prodi1->nama_prodi;?></span>
                  </div>
                </div>
                   <div class="form-group row">
                  <label for="inputNP" class="col-sm-2 col-form-label">Program Studi Pilihan II</label>
                  <div class="col-sm-10">
                    <span class="form-control"><?php echo $prodi2->nama_prodi;?></span>
                  </div>
                </div>
                  
                </div>
                <!-- /.card-body -->
                 <div class="card-footer">
                      <?php if($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49"){ ?>
                  <a href="<?php echo base_url(); ?>masterpmb/formprodi/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Ubah</a>
                   <?php }  ?>
                </div>
                <!-- /.card-footer -->
            </div>
             <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Perolehan Informasi PMB STKIP Persada Khatulistiwa Sintang</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                <div class="form-group row">
                  <label for="inputNamainfo" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                        <span class="form-control"><?php echo $siswa->nama_informan;	?></span>
                    </div>
                </div>
                <div class="form-group row">
                  <label for="inputNP" class="col-sm-2 col-form-label">Nomor Hp</label>
                  <div class="col-sm-10">
                        <span class="form-control"><?php echo $siswa->no_hp;	?></span>
                     </div>
                </div>
                 <div class="form-group row">
                  <label for="inputMedia" class="col-sm-2 col-form-label">Media informasi</label>
                  <div class="col-sm-10">
                        <span class="form-control"><?php echo $siswa->media_info;	?></span>
                   </div>
                </div>
            </div>  <!-- /.card-body -->
              <div class="card-footer">
                  <?php if($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49"){ ?>
                    <a href="<?php echo base_url(); ?>masterpmb/formprodi/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Ubah</a>
                    <?php }  ?>
                  
                </div>
            </div>
            <!-- Horizontal Form -->
            
             
              <!-- /.card-body -->
           
            <!-- /.card -->
          </div>
          
          <!--/.col (right) -->
        </div>
        
       </div>
       
        
            
            
       
            <!-- general form elements -->
            <!-- Horizontal Form -->
            
            <div class="col-md-12">
               <div class="row">
           <div class="col-sm-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Identitas AYAH</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputNIKAY" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        
                         <span class="form-control"><?php echo $siswa->nik_ayah;	?></span>
                     
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNamaAyah" class="col-sm-2 col-form-label">Nama Ayah </label>
                    <div class="col-sm-10">
                         <span class="form-control"><?php echo $siswa->nama_ayah;	?></span>
                       </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-10">
                        
                           <span class="form-control"><?php echo $siswa->tmp_lahir_ayah.', '.$siswa->tgl_lahir_ayah;	?></span>
                        
                     
    				
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputAlamatAY" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                          <span class="form-control"><?php echo $siswa->alamat_ayah;?></span>
                   
                  </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <span class="form-control"><?php echo $siswa->pekerjaan_ayah;?></span>
                   
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPendidikanAY" class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                          <span class="form-control"><?php echo $siswa->pendidikan_ayah;?></span>
                     
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNOHPAY" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                         <span class="form-control"><?php echo $siswa->hp_ayah;?></span>
                     
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNPWPAY" class="col-sm-2 col-form-label">NPWP</label>
                    <div class="col-sm-10">
                         <span class="form-control"><?php echo $siswa->npwp_ayah;?></span>
                     </div>
                  </div>
                  <div class="form-group row">
                    <label for="PenghasilanAY" class="col-sm-2 col-form-label">Penghasilan</label>
                    <div class="col-sm-10">
                         <span class="form-control"><?php echo $siswa->penghasilan_ayah;?></span>
                     
                    </div>
                  </div>        
                  </div><!-- /.card-body -->
                  <div class="card-footer">
                      <?php if($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49"){ ?>
                     <a href="<?php echo base_url(); ?>masterpmb/formortu/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Ubah</a>
                    <?php }  ?>
                 
                </div>
                </div>
                </div>
                 <div class="col-sm-6">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Identitas IBU</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                     <div class="card-body">
                      <div class="form-group row">
                        <label for="NIKIBU" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                              <span class="form-control"><?php echo $siswa->nik_ibu;	?></span>
                         
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="NamaIbu" class="col-sm-2 col-form-label">Nama Ibu</label>
                        <div class="col-sm-10">
                              <span class="form-control"><?php echo $siswa->nama_ibu;	?></span>
                         
                        </div>
                      </div>
                      <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-10">
                        
                          <span class="form-control"><?php echo $siswa->tmp_lahir_ibu.', '.$siswa->tgl_lahir_ibu;	?></span>
                        
                       
                    </div>
                  </div>
                      
                      <div class="form-group row">
                        <label for="AlamatIBU" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            
                              <span class="form-control"><?php echo $siswa->alamat_ibu;	?></span>
                       
                      </div>
                      </div>
    
                      <div class="form-group row">
                        <label for="PekerjaanIBU" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                            
                              <span class="form-control"><?php echo $siswa->pekerjaan_ibu;	?></span>
                       
                            
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="PendidikanIBU" class="col-sm-2 col-form-label">Pendidikan</label>
                        <div class="col-sm-10">
                               <span class="form-control"><?php echo $siswa->pendidikan_ibu;	?></span>
                         </div>
                      </div>
                      <div class="form-group row">
                        <label for="NoHpIbu" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-10">
                              <span class="form-control"><?php echo $siswa->hp_ibu;	?></span>
                         
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="NPWPIBU" class="col-sm-2 col-form-label">NPWP</label>
                        <div class="col-sm-10">
                             <span class="form-control"><?php echo $siswa->npwp_ibu;	?></span>
                         </div>
                      </div>
                      <div class="form-group row">
                        <label for="PenghasilanIBU" class="col-sm-2 col-form-label">Penghasilan</label>
                        <div class="col-sm-10">
                            <span class="form-control"><?php echo $siswa->penghasilan_ibu;	?></span>
                        
                        </div>
                      </div> 
                      
                      </div>
                      <div class="card-footer">
                          <?php if($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49"){ ?>
                     <a href="<?php echo base_url(); ?>masterpmb/formortu/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Ubah</a>
                    <?php }  ?>
                 
                </div>
                    </div>
                    </div>
                    <div class="col-md-12">
                      <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Identitas Wali</h3>
                  </div>
                  <!-- /.card-header -->
                     <div class="card-body">
                      <div class="form-group row">
                        <label for="NIKwali" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <span class="form-control"><?php echo $siswa->nik_wali;	?></span>
                          
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="NamaWali" class="col-sm-2 col-form-label">Nama Wali</label>
                        <div class="col-sm-10">
                             <span class="form-control"><?php echo $siswa->nama_wali;	?></span>
                         
                        </div>
                      </div>
                      
                      <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-10">
                        
                        <span class="form-control"><?php echo $siswa->tmp_lahir_wali.', '.$siswa->tgl_lahir_wali;	?></span>
                        
                   
    				
                    </div>
                  </div>
                      <div class="form-group row">
                        <label for="AlamatWALI" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            
                             <span class="form-control"><?php echo $siswa->alamat_wali;	?></span>
                         
                     
                      </div>
                      </div>
    
                      <div class="form-group row">
                        <label for="PekerjaanWl" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                              <span class="form-control"><?php echo $siswa->kerja_wali;	?></span>
                        
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="NoHpWL" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-10">
                            
                              <span class="form-control"><?php echo $siswa->hp_wali;	?></span>
                            
                        
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="NPWPWL" class="col-sm-2 col-form-label">NPWP</label>
                        <div class="col-sm-10">
                                <span class="form-control"><?php echo $siswa->npwp_wali;	?></span>
                         
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="PenghasilanWL" class="col-sm-2 col-form-label">Penghasilan</label>
                        <div class="col-sm-10">
                               <span class="form-control"><?php echo $siswa->penghasil_wali;	?></span>
                        
                        </div>
                      </div>        
                      </div>
                      <div class="card-footer">
                          <?php if($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49"){ ?>
                         <a href="<?php echo base_url(); ?>masterpmb/formortu/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Ubah</a>
                    <?php }  ?>
                 
                </div>
                    </div>
                <!-- /.card-body -->
                
                 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar File yang Diupload</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama File</th>
                      <th style="width: 40px">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Foto 4 x 6</td>
                      <td>
                       <?php if(!empty($siswa->foto_upload)){ ?>
					        <a href="https://persadakhatulistiwa.ac.id/pmb/foto/<?php echo $siswa->foto_upload; ?>" target="_blank"><span class="badge bg-success">Lihat</span></a>
				        <?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Ijasah</td>
                      <td>
                        <?php if(!empty($siswa->ijasah_upload)){ ?>
					        <a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $siswa->ijasah_upload; ?>" target="_blank"><span class="badge bg-success">Lihat</span></a>
				        <?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Surat Keterangan Hasil Ujian (SKHU)</td>
                      <td>
                          <?php if(!empty($siswa->skhu_upload)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $siswa->skhu_upload; ?>" target="_blank"><span class="badge bg-success">Lihat</span></a>
					<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Surat Keterangan Kelakuan Baik (SKKB)</td>
                      <td>
                          <?php if(!empty($siswa->skkb_upload)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $siswa->skkb_upload; ?>" target="_blank"><span class="badge bg-success">Lihat</span></a>
					<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                     <tr>
                      <td>5.</td>
                      <td>Kartu Keluarga</td>
                      <td>
                          <?php if(!empty($siswa->kk_upload)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $siswa->kk_upload; ?>" target="_blank"><span class="badge bg-success">Lihat</span></a>
				<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>6.</td>
                      <td>Surat Keterangan Lulus</td>
                      <td>
                          <?php if(!empty($siswa->ket_lulus_upload)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $siswa->ket_lulus_upload; ?>" target="_blank"><span class="badge bg-success">Lihat</span></a>
					   <?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <?php if($siswa->jalur =="test") { ?>
                     <tr>
                      <td>7.</td>
                      <td>Bukti Pembayaran</td>
                      <td>
                          <?php if(!empty($siswa->pembayaran_upload)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $siswa->pembayaran_upload; ?>" target="_blank"><span class="badge bg-success">Lihat</span></a>
				<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                     <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <?php if($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49"){ ?>
                     <a href="<?php echo base_url(); ?>masterpmb/formupload/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Ubah</a>
                    <?php }  ?>
                 
                </div>
              
            </div> 
            <?php if($siswa->jalur =="prestasi") { ?> 
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar File yang Diupload</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama File</th>
                       <th>Nilai</th>
                      <th style="width: 40px">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Nilai Semester I</td>
                      <td><?php if(!empty($siswa->nilai_satu)) { echo $siswa->nilai_satu; } ?></td>
                      <td>
                       <?php if(!empty($siswa->semes_satu)){ ?>
					        <a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $siswa->semes_satu; ?>" target="_blank"><span class="badge bg-success">Lihat</span></a>
				        <?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Nilai Semester II</td>
                      <td><?php if(!empty($siswa->nilai_dua)) { echo $siswa->nilai_dua; } ?></td>
                      <td>
                        <?php if(!empty($siswa->semes_dua)){ ?>
					        <a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $siswa->semes_dua; ?>" target="_blank"><span class="badge bg-success">Lihat</span></a>
				        <?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Nilai Semester III</td>
                      <td><?php if(!empty($siswa->nilai_tiga)) { echo $siswa->nilai_tiga; } ?></td>
                      <td>
                          <?php if(!empty($siswa->semes_tiga)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $siswa->semes_tiga; ?>" target="_blank"><span class="badge bg-success">Lihat</span></a>
					<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Nilai Semester IV</td>
                      <td><?php if(!empty($siswa->nilai_empat)) { echo $siswa->nilai_empat; } ?></td>
                      <td>
                          <?php if(!empty($siswa->semes_empat)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $siswa->semes_empat; ?>" target="_blank"><span class="badge bg-success">Lihat</span></a>
					<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                     <tr>
                      <td>5.</td>
                      <td>Nilai Semester V</td>
                      <td><?php if(!empty($siswa->nilai_lima)) { echo $siswa->nilai_lima; } ?></td>
                      <td>
                          <?php if(!empty($siswa->semes_lima)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $siswa->semes_lima; ?>" target="_blank"><span class="badge bg-success">Lihat</span></a>
				<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
               <div class="card-footer">
                   <?php if($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49"){ ?>
                     <a href="<?php echo base_url(); ?>masterpmb/datasemester/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Ubah</a>
                    <?php }  ?>
                 
                </div>
              
            </div> 
            
            <?php } ?>
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

 
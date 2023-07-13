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
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Program Studi Yang di Pilih</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group row">
                    <label for="prodi" class="col-sm-2 col-form-label">Pilihan Program Studi 1<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <?php
						$options[" "] = "-- PILIH --";
						foreach ($prodi1 as $prodi){
						$options[$prodi->id_prodi] = $prodi->nama_prodi;	
						}                                        
						echo form_dropdown('prodi1', $options, $anjai->pilihan_satu, array('class' => 'form-control','style' =>'width: 100%;') ); 
						?>
							
                     <?php echo form_error('prodi1'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="prodi" class="col-sm-2 col-form-label">Pilihan Program Studi 2<strong class="text-red">*</strong></label>
                    <div class="col-sm-10">
                      <?php
						$options2[" "] = "-- PILIH --";
						foreach ($prodi2 as $prodi2){
						$options2[$prodi2->id_prodi] = $prodi2->nama_prodi;	
						}                                        
						echo form_dropdown('prodi2', $options2, $anjai->pilihan_dua, array('class' => 'form-control','style' =>'width: 100%;') ); 
						?>
                     <?php echo form_error('prodi2'); ?>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
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
                    <input type="text" class="form-control" id="inputNamainfo" name="nama_ip"  placeholder="Nama" value="<?php if(!empty($info->nama_informan)) { echo $info->nama_informan; } else {echo set_value('nama_ip'); }?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputNP" class="col-sm-2 col-form-label">Nomor Hp</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNP" name="no_hp" placeholder="Nomor Hp" value="<?php if(!empty($info->no_hp)) { echo $info->no_hp; } else {echo set_value('no_hp'); }?>">
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputMedia" class="col-sm-2 col-form-label">Media informasi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputMedia" name="media" placeholder="Media Informasi" value="<?php if(!empty($info->media_info)) { echo $info->media_info; } else {echo set_value('media'); }?>">
                  </div>
                </div>
            </div>  <!-- /.card-body -->
             
            </div>
            <!-- Horizontal Form -->
            
              <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                   <a href="<?php echo base_url(); ?>masterpmb/lihatsiswa/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-info float-right">Kembali</a>
                </div>
                
             
              <!-- /.card-body -->
           
            <!-- /.card -->
          </div>
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
        <?php echo form_close(); ?>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
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
                <h3 class="card-title">Keputusan Penerimaan Calon Siswa</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                     <div class="form-group row">
                  <label for="inputNP" class="col-sm-2 col-form-label">Nomor Pendaftaran</label>
                  <div class="col-sm-10">
                    <span class="form-control"><?php echo $siswa->ref; ?></span>
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputNP" class="col-sm-2 col-form-label">NIS</label>
                  <div class="col-sm-10">
                    <span class="form-control"><?php echo $siswa->nis_siswa; ?></span>
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputNP" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <span class="form-control"><?php echo $siswa->nama_siswa; ?></span>
                  </div>
                </div>
                 <div class="form-group row">
                    <label for="metod" class="col-sm-2">Keputusan</label>
                    <div class="col-sm-10">
                      <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="putus" value="1" <?php if(!empty($kepus->status_penerimaan) && $kepus->status_penerimaan =="1") { echo "checked";}else { echo  set_radio('putus', '1');} ?>>Diterima
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="putus" value="2" <?php if(!empty($kepus->status_penerimaan) && $kepus->status_penerimaan =="2") { echo "checked";}else { echo  set_radio('putus', '2');} ?>>Ditolak
                      </label>
                    </div>
                     <?php echo form_error('putus'); ?>
					 </div>
                  </div>
                <div class="form-group row">
                  <label for="inputNP" class="col-sm-2 col-form-label">Pilihan I</label>
                  <div class="col-sm-10">
                    <span class="form-control"><?php echo $prodi1->nama_prodi; ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputNP" class="col-sm-2 col-form-label">Pilihan II</label>
                  <div class="col-sm-10">
                    <span class="form-control"><?php echo $prodi2->nama_prodi; ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputNP" class="col-sm-2 col-form-label">Prodi Yang Diterima</label>
                  <div class="col-sm-10">
                   <?php
                   if(!empty($kepus->prodi_penerimaan)){
                       $anjai= $kepus->prodi_penerimaan;
                   }else {
                       $anjai = "";
                   }
						$options[" "] = "-- PILIH --";
						$options[$prodi1->id_prodi] = $prodi1->nama_prodi;
						$options[$prodi2->id_prodi] = $prodi2->nama_prodi;
						echo form_dropdown('terima', $options, $anjai, array('class' => 'form-control','style' =>'width: 100%;') ); 
						?>
							
                     <?php echo form_error('terima'); ?>
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="inputMedia" class="col-sm-2 col-form-label">Catatan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="4" name="catat"><?php if(!empty($kepus->note_penerimaan)) { echo $kepus->note_penerimaan;} ?></textarea>
                  </div>
                </div>
                <?php if(!empty($kepus->umumkan) && $kepus->umumkan =="1") { ?>
                     <div class="form-group row">
                      <label for="inputNP" class="col-sm-2 col-form-label">Status Pengumuman</label>
                      <div class="col-sm-10">
                        <span class="form-control">Sudah diumumkan</span>
                      </div>
                    </div>
                <?php } ?>
               
                
            </div>  <!-- /.card-body -->
             
            </div>
            <!-- Horizontal Form -->
            
              <div class="card-footer">
                  <input type="hidden" name="idsiswa" value="<?php echo $siswa->akun_siswa; ?>">
                  <button type="submit" class="btn btn-info">Simpan</button>
                   <a href="<?php echo base_url(); ?>masterpmb/umumkan/<?php echo $siswa->akun_siswa; ?>.html" class="btn btn-warning float-right">Umumkan ke Calon Maba</a>
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

 
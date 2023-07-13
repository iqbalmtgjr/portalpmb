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
<?php if(!empty($gam->upload_id_siswa)) {
    $alam = $gam->upload_id_siswa;
}else{
    $alam = $alamat;
}

?>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
           
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
                      <td><?php if(!empty($nilai->nilai_satu)) { echo $nilai->nilai_satu; } ?></td>
                      <td>
                       <?php if(!empty($gam->semes_satu)){ ?>
					        <a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $gam->semes_satu; ?>" target="_blank"><span class="badge bg-success">Diupload</span></a>
				        <?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Nilai Semester II</td>
                      <td><?php if(!empty($nilai->nilai_dua)) { echo $nilai->nilai_dua; } ?></td>
                      <td>
                        <?php if(!empty($gam->semes_dua)){ ?>
					        <a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $gam->semes_dua; ?>" target="_blank"><span class="badge bg-success">Diupload</span></a>
				        <?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Nilai Semester III</td>
                      <td><?php if(!empty($nilai->nilai_tiga)) { echo $nilai->nilai_tiga; } ?></td>
                      <td>
                          <?php if(!empty($gam->semes_tiga)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $gam->semes_tiga; ?>" target="_blank"><span class="badge bg-success">Diupload</span></a>
					<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Nilai Semester IV</td>
                      <td><?php if(!empty($nilai->nilai_empat)) { echo $nilai->nilai_empat; } ?></td>
                      <td>
                          <?php if(!empty($gam->semes_empat)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $gam->semes_empat; ?>" target="_blank"><span class="badge bg-success">Diupload</span></a>
					<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                     <tr>
                      <td>5.</td>
                      <td>Nilai Semester V</td>
                      <td><?php if(!empty($nilai->nilai_lima)) { echo $nilai->nilai_lima; } ?></td>
                      <td>
                          <?php if(!empty($gam->semes_lima)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $gam->semes_lima; ?>" target="_blank"><span class="badge bg-success">Diupload</span></a>
				<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div> 
          
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            
            <div class="card">
              <div class="card-header" style="background-color: #e9ecef;">
                <h3 class="card-title">Form Upload </h3>
              </div>
                <div class="card-body pb-0">
                    <label>Nilai Semester I</label><span> (Format file : .jpg|pdf, Besar file maksimal 5MB)</span>
                    <?php echo form_open_multipart('masterpmb/semessatu/'.$alam,'class="form-horizontal"'); ?> 
                  <div class="form-group">
                     <?php echo $this->session->flashdata('error_semessatu'); ?>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="userfile" class="custom-file-input" id="customFile">
						<input type="hidden" name="file_name" />
                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                      </div>
                      <div class="input-group-append">
                        <button class="input-group-text text-info" type="submit">Simpan</button>
                      </div>
                    </div>
                  </div>
                    <?php echo form_close(); ?>
                        
				</div>
                <!-- /.card-body -->
             
                <div class="card-body pb-0 pt-0">
                      <label>Nilai Semester II </label><span> (Format file : .jpg|pdf, Besar file maksimal 5MB)</span>
                    <?php echo form_open_multipart('masterpmb/semesdua/'.$alam,'class="form-horizontal"'); ?> 
                  <div class="form-group">
                     <?php echo $this->session->flashdata('error_semesdua'); ?>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="userfile" class="custom-file-input" id="customFile">
						<input type="hidden" name="file_name" />
                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                      </div>
                      <div class="input-group-append">
                        <button class="input-group-text text-info" type="submit">Simpan</button>
                      </div>
                    </div>
                  </div>
                    <?php echo form_close(); ?>
				</div>
                <!-- /.card-body -->
                <div class="card-body pb-0 pt-0">
                     <label>Nilai Semester III </label><span> (Format file : .jpg|pdf, Besar file maksimal 5MB)</span>
                    <?php echo form_open_multipart('masterpmb/semestiga/'.$alam,'class="form-horizontal"'); ?> 
                  <div class="form-group">
                     <?php echo $this->session->flashdata('error_semestiga'); ?>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="userfile" class="custom-file-input" id="customFile">
						<input type="hidden" name="file_name" />
                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                      </div>
                      <div class="input-group-append">
                        <button class="input-group-text text-info" type="submit">Simpan</button>
                      </div>
                    </div>
                  </div>
                    <?php echo form_close(); ?>
				</div>
                <!-- /.card-body -->
                <div class="card-body pb-0 pt-0">
                     <label>Nilai Semester IV </label><span> (Format file : .jpg|pdf, Besar file maksimal 5MB)</span>
                    <?php echo form_open_multipart('masterpmb/semesempat/'.$alam,'class="form-horizontal"'); ?> 
                  <div class="form-group">
                     <?php echo $this->session->flashdata('error_semesempat'); ?>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="userfile" class="custom-file-input" id="customFile">
						<input type="hidden" name="file_name" />
                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                      </div>
                      <div class="input-group-append">
                        <button class="input-group-text text-info" type="submit">Simpan</button>
                      </div>
                    </div>
                  </div>
                    <?php echo form_close(); ?>
				</div>
                <!-- /.card-body -->
                <div class="card-body pb-0 pt-0">
                     <label>Nilai Semester V </label><span> (Format file : .jpg|pdf, Besar file maksimal 5MB)</span>
                    <?php echo form_open_multipart('masterpmb/semeslima/'.$alam,'class="form-horizontal"'); ?> 
                  <div class="form-group">
                     <?php echo $this->session->flashdata('error_semeslima'); ?>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="userfile" class="custom-file-input" id="customFile">
						<input type="hidden" name="file_name" />
                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                      </div>
                      <div class="input-group-append">
                        <button class="input-group-text text-info" type="submit">Simpan</button>
                      </div>
                    </div>
                  </div>
                    <?php echo form_close(); ?>
                     
					</div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="<?php echo base_url(); ?>masterpmb/lihatsiswa/<?php echo $alam; ?>.html" class="btn btn-info float-right">Kembali</a>
                </div>
            </div><!-- /.card -->
              </div><!-- /.col-md-12 -->
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
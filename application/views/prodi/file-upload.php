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
                      <th style="width: 40px">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Foto 4 x 6</td>
                      <td>
                       <?php if(!empty($gam->foto_upload)){ ?>
					        <a href="https://persadakhatulistiwa.ac.id/pmb/foto/<?php echo $gam->foto_upload; ?>" target="_blank"><span class="badge bg-success">Diupload</span></a>
				        <?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Ijasah</td>
                      <td>
                        <?php if(!empty($gam->ijasah_upload)){ ?>
					        <a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $gam->ijasah_upload; ?>" target="_blank"><span class="badge bg-success">Diupload</span></a>
				        <?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Surat Keterangan Hasil Ujian (SKHU)</td>
                      <td>
                          <?php if(!empty($gam->skhu_upload)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $gam->skhu_upload; ?>" target="_blank"><span class="badge bg-success">Diupload</span></a>
					<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Surat Keterangan Kelakuan Baik (SKKB)</td>
                      <td>
                          <?php if(!empty($gam->skkb_upload)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $gam->skkb_upload; ?>" target="_blank"><span class="badge bg-success">Diupload</span></a>
					<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                     <tr>
                      <td>5.</td>
                      <td>Kartu Keluarga</td>
                      <td>
                          <?php if(!empty($gam->kk_upload)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $gam->kk_upload; ?>" target="_blank"><span class="badge bg-success">Diupload</span></a>
				<?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td>6.</td>
                      <td>Surat Keterangan Lulus</td>
                      <td>
                          <?php if(!empty($gam->ket_lulus_upload)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $gam->ket_lulus_upload; ?>" target="_blank"><span class="badge bg-success">Diupload</span></a>
					   <?php }else { ?>
				        <span class="badge bg-danger">Belum Diupload</span>
				        <?php } ?>
                      </td>
                    </tr>
                    <?php if($jalur->jalur =="test") { ?>
                     <tr>
                      <td>7.</td>
                      <td>Bukti Pembayaran</td>
                      <td>
                          <?php if(!empty($gam->pembayaran_upload)){ ?>
						<a href="https://persadakhatulistiwa.ac.id/pmb/pdf/<?php echo $gam->pembayaran_upload; ?>" target="_blank"><span class="badge bg-success">Diupload</span></a>
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
                    <label>Foto 4x6 </label><span> (Format file : .jpg|png, Besar file maksimal 5MB)</span>
                    <?php echo form_open_multipart('masterpmb/foto/'.$alam,'class="form-horizontal"'); ?> 
                  <div class="form-group">
                     <?php echo $this->session->flashdata('error_foto'); ?>
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
                      <label>Ijasah </label><span> (Format file : .jpg|pdf, Besar file maksimal 5MB)</span>
                    <?php echo form_open_multipart('masterpmb/ijasah/'.$alam,'class="form-horizontal"'); ?> 
                  <div class="form-group">
                     <?php echo $this->session->flashdata('error_ijasah'); ?>
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
                     <label>Surat Keterangan Hasil Ujian </label><span> (Format file : .jpg|pdf, Besar file maksimal 5MB)</span>
                    <?php echo form_open_multipart('masterpmb/skhu/'.$alam,'class="form-horizontal"'); ?> 
                  <div class="form-group">
                     <?php echo $this->session->flashdata('error_skhu'); ?>
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
                     <label>Surat Keterangan Kelakuan Baik </label><span> (Format file : .jpg|pdf, Besar file maksimal 5MB)</span>
                    <?php echo form_open_multipart('masterpmb/skkb/'.$alam,'class="form-horizontal"'); ?> 
                  <div class="form-group">
                     <?php echo $this->session->flashdata('error_skkb'); ?>
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
                     <label>Kartu Keluarga </label><span> (Format file : .jpg|pdf, Besar file maksimal 5MB)</span>
                    <?php echo form_open_multipart('masterpmb/kk/'.$alam,'class="form-horizontal"'); ?> 
                  <div class="form-group">
                     <?php echo $this->session->flashdata('error_kk'); ?>
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
                     <label>Keterangan Lulus </label><span> (Format file : .jpg|pdf, Besar file maksimal 5MB)</span>
                    <?php echo form_open_multipart('masterpmb/ketlulus/'.$alam,'class="form-horizontal"'); ?> 
                  <div class="form-group">
                     <?php echo $this->session->flashdata('error_lulus'); ?>
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
                     <label>Bukti Pembayaran </label><span> (Format file : .jpg|pdf, Besar file maksimal 5MB)</span>
                    <?php echo form_open_multipart('masterpmb/buktibayartest/'.$alam,'class="form-horizontal"'); ?> 
                  <div class="form-group">
                     <?php echo $this->session->flashdata('error_buktest'); ?>
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

 
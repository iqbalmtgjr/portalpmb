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
        
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tambah Dokumen Dispensasi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo form_open(current_url(),'class="form-horizontal"'); ?>
              
                <div class="card-body">
                    <div class="callout callout-danger">
                  <h5>Panduan!</h5>

                  <p>Form tambah dispensasi ini digunakan untuk menambah data dispensasi mahasiswa. Apabila nim mahasiswa yang ditambahkan belum ada di dalam database mahasiswa, maka data mahasiswa yang diinput akan ditambahkan ke dalam database mahasiswa, sedangkan apabila nim mahasiswa
                  yang diinput sudah ada maka penambahan nim ke database mahasiswa akan diabaikan. Jika mahasiswa pernah mengurus dispensasi sebelumnya, lebih baik penambahan data dispensasi melalui lambang mata <i class="fas fa-eye text-primary"></i>  di kolom tindakan pada tabel DAFTAR DISPENSASI.</p>
                </div>
                  <div class="form-group row">
                    <label for="no" class="col-sm-2 col-form-label">Nomor Dokumen</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="no" id="no" value="<?php echo set_value('no'); ?>" placeholder="---/B-02/G/---/----">
					  <?php echo form_error('no'); ?>
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama'); ?>" placeholder="Nama Mahasiswa">
					  <?php echo form_error('nama'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nim" id="nim" value="<?php echo set_value('nim'); ?>" placeholder="Nomor Induk Mahasiswa">
					  <?php echo form_error('nim'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                     <div class="col-sm-10">                      
							<?php
							$options[" "] = "-- PILIH --";
							foreach ($prodi as $prodi){
							$options[$prodi->id_prodi] = $prodi->nama_prodi;	
							}                                        
							echo form_dropdown('prodi', $options, set_value('prodi'), array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
							<?php echo form_error('prodi'); ?>						 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="smt" class="col-sm-2 col-form-label">Semester</label>
                     <div class="col-sm-10">                      
							<?php
							$options1[" "] = "-- PILIH --";
							foreach ($semester as $semester){
							$options1[$semester->smt_id] = $semester->smt;	
							}                                        
							echo form_dropdown('smt', $options1, set_value('smt'), array('class' => 'form-control','style' =>'width: 100%;') ); 
							?>
							<?php echo form_error('smt'); ?>						 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="kelas" id="kelas" value="<?php echo set_value('kelas'); ?>" placeholder="Kelas">
					  <?php echo form_error('kelas'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tunggak" class="col-sm-2 col-form-label">Tunggakan (Rp.)</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tunggak" id="tunggak" value="<?php echo set_value('tunggak'); ?>" placeholder="Jumlah Tunggakan">
					  <?php echo form_error('tunggak'); ?>
                    </div>
                  </div>
                 <div class="form-group row">
                    <label for="cicil" class="col-sm-2 col-form-label">Cicilan (Rp.)</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="cicil" id="cicil" value="<?php echo set_value('cicil'); ?>" placeholder="Cicilan Tunggakan">
					  <?php echo form_error('cicil'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tglbuat" class="col-sm-2 col-form-label">Tanggal Dispensasi</label>
                    <div class="col-sm-10">
                      <div class="input-group">
								<input type="text" name="tglbuat" class="form-control" id="datepicker-autoclose" value="<?php $anjai = date("Y/m/d"); echo date('d/m/Y',strtotime($anjai)); ?>">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
							<?php echo form_error('tglbuat'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kadaluarsa" class="col-sm-2 col-form-label">Kadaluarsa Dispensasi</label>
                    <div class="col-sm-10">
                      <div class="input-group">
								<input type="text" name="kadaluarsa" class="form-control" id="datepicker-autoclose1" value="<?php echo date('d/m/Y', strtotime('+2 week', strtotime($anjai))); ?>">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
							<?php echo form_error('kadaluarsa'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="keperluan" class="col-sm-2 col-form-label">Keperluan Dispensasi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="keperluan" id="keperluan" value="<?php echo set_value('keperluan'); ?>" placeholder="Keperluan Dispensasi">
					  <?php echo form_error('keperluan'); ?>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>                 
                </div>
                <!-- /.card-footer -->
              <?php echo form_close(); ?>
            </div>
            <!-- /.card -->

            
        
      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
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
                   <h4>Tambah / Ubah Potongan Pegawai</h4>
                <hr>
                 
                  <div class="form-group row">
                    <label for="nidn">NIDN/NIDK</label>
                     <span class="form-control" style="background-color: #f4f6f9;"><?php echo $dosen->nidn; ?></span>
                  </div>
                  
                  <div class="form-group row">
                      <label for="nidn">NamaLengkap</label>
                    <span class="form-control" style="background-color: #f4f6f9;"><?php echo $dosen->name; ?></span>
                  </div>
                 
                  <div class="form-group row">
                    <label>BPJS Kesehatan</label>
                      <input type="text" class="form-control" name="kesehatan" value="<?php if(!empty($tong->bpjssehat_potong)) { echo $tong->bpjssehat_potong;}else{ echo set_value('kesehatan');} ?>">
					  <?php echo form_error('kesehatan'); ?>
                  </div>
                   <div class="form-group row">
                    <label>BPJS Ketenagakerjaan</label>
                      <input type="text" class="form-control" name="tenagakerja" value="<?php if(!empty($tong->bpjskerja_potong)) { echo $tong->bpjskerja_potong;}else{ echo set_value('tenagakerja');} ?>">
					  <?php echo form_error('tenagakerja'); ?>
                  </div>
                   <div class="form-group row">
                    <label>SIMATU</label>
                      <input type="text" class="form-control" name="simatu" value="<?php if(!empty($tong->simatu_potonggaji)) { echo $tong->simatu_potonggaji;}else{ echo set_value('simatu');} ?>">
					  <?php echo form_error('simatu'); ?>
                  </div>
                   <div class="form-group row">
                    <label>Pinjaman</label>
                      <input type="text" class="form-control" name="pinjaman" value="<?php if(!empty($tong->pinjaman_potonggaji)) { echo $tong->pinjaman_potonggaji;}else{ echo set_value('pinjaman');} ?>">
					  <?php echo form_error('pinjaman'); ?>
                  </div>
                </div><!-- /.card-body box-profile-end -->
                <div class="card-footer">
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

 
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
        
         <div class="card">
		<div class="card-header">
			<h4 class="card-title">Foto dari <?php echo ucfirst($warga->nama); ?></h4>
		</div>
			<?php echo form_open_multipart('pengguna/foto_do','class="form-horizontal"');?>
				<div class="card-body">
				
				
					
					<div class="form-group row">
						<label class="col-md-2 m-t-15"></label>
						<div class="col-lg-4">
							<?php if(!empty($warga->foto)){ ?>
								<img src="<?php echo base_url(); ?>/foto/<?php echo $warga->foto; ?>" class="img-fluid img-thumbnail">
							<?php } else { ?>
								<img src="<?php echo base_url(); ?>/dist/img/avatar5.png" class="img-fluid img-thumbnail">
							<?php } ?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="foto" class="col-sm-3 col-lg-2 text-right control-label col-form-label">Unggah Foto</label>
						<div class="col-md-9">
						<small class="font-italic">Format gambar jpg/jpeg/png. Dimensi: lebar 260 px dan tinggi 265 px. Maksimal ukuran file: 3MB</small>
						<?php if(!empty($error)){ echo $error;}?>
							<div class="custom-file">							
							<input type="file" name="userfile" class="custom-file-input" id="customFile">
							<input type="hidden" name="file_name" />
							<label class="custom-file-label" for="customFile">Pilih gambar</label>
							
							</div>
						</div>
					</div>
				</div>
					<div class="border-top">
						<div class="card-body">
						   <button type="submit" class="btn btn-sm btn-success" id="btn-submit"><i class="fas fa-save"> Simpan</i></button>
						</div>
					</div>
			<?php echo form_close(); ?>
		</div>
            
        
      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
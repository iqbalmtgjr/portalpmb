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
                <h3 class="card-title">Pembuatan Nomor Seri Slip BNI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php echo form_open('biaya/tambahseri','class="form-horizontal"'); ?>
              
                <div class="card-body">
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Nomor Seri</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="seri"  value="<?php echo $nomorseri; ?>">
					  <?php echo form_error('jns'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  value="<?php echo $mhs->nim; ?>" disabled>
					  <?php echo form_error('jns'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  value="<?php echo $mhs->nama; ?>" disabled>
					  <?php echo form_error('jns'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Program Studi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $mhs->nama_prodi; ?>" disabled>
					  <?php echo form_error('jns'); ?>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                     <textarea class="form-control" rows="3" name="ket" placeholder="Tulis item yang dibayar"><?php echo set_value('ket'); ?></textarea>
					  <?php echo form_error('ket'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah (Rp.)</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="jumlah" value="<?php echo set_value('jumlah'); ?>">
                      <strong class="text-red">*</strong>Tanpa titik dan koma
					  <?php echo form_error('jumlah'); ?>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button> 
                  <a class="btn btn-default float-right" style="text-decoration:none;" href="<?php echo site_url('biaya/datakeuangan') ?>">Data Keuangan</a>
                </div>
                <!-- /.card-footer -->
              <?php echo form_close(); ?>
            </div>
            <!-- /.card -->
            
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar No Seri SLIP <?php echo $mhs->nama; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
				<div class="table-responsive">	
				<input type="hidden" class="form-control input-sm" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />						
				<table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
				<thead>
				   <tr>				  
					<th>No.</th>
					<th></th>
					<th></th>
					<th>No. Seri</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Keterangan</th>
					<th>Jumlah Pembayaran</th>				 
					<th style="text-align: center;">Tindakan</th>
				</tr>											
				</thead>
				
				</table>
				</div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->  
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php echo form_open('biaya/hapusseri','id="add-row-form"'); ?> 	
 	<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">Hapus Nomor Seri SLIP</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="seri_id" class="form-control" required>
					<strong>Apakah Anda yakin akan menghapus nomor seri ini?</strong>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-success">Hapus</button>
				</div>
			</div>
		</div>
	</div>
<?php echo form_close(); ?>
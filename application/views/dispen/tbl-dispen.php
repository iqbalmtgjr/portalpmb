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
              <h3 class="card-title">DAFTAR DISPENSASI</h3>
              <a href="<?php echo base_url(); ?>dispensasi/tambahdispensasi.html" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah Dispen</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="callout callout-danger">
                  <h5>Panduan!</h5>

                  <p> Sebelum menambah data dispensasi, periksa terlebih dahulu apakah mahasiswa tersebut sudah ada di dalam sistem atau belum dengan menggunakan nim atau nama pada form pencarian di bawah ini. Apabila hasil pencarian tidak ada, maka klik tombol <b>Tambah Dispen</b> di atas.
                Apabila data mahasiswa ditemukan, maka klik lambang mata <i class="fas fa-eye text-primary"></i>  pada kolom tindakan.</p>
                </div>
               
                
             <div class="table-responsive">	
				<input type="hidden" class="form-control input-sm" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />						
				<table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
				<thead>
				   <tr>				  
					<th>No</th>
					<th></th>						  
					<th>Nomor Surat</th>
					<th>NIM</th>				 
					<th>Keperluan</th>
					<th>Tanggal Berlaku</th>
					<th></th>
					<th>Tindakan</th>
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

 
  <!-- /.control-sidebar -->
  <?php echo form_open('sarana/hapus','id="add-row-form"'); ?> 	
 	<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">Hapus Berita</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id_item" class="form-control" required>
					<strong>Apakah Anda yakin akan menghapus barang ini?</strong>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-success">Hapus</button>
				</div>
			</div>
		</div>
	</div>
<?php echo form_close(); ?>
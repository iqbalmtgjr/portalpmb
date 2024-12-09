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
              <h3 class="card-title">Jenis Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
				<div class="table-responsive">	
				<input type="hidden" class="form-control input-sm" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />						
				<table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
				<thead>
				   <tr>
					<th>No</th>
					<th>Jenis Pembayaran</th>				 
					<th class="text-center">Tindakan</th>
				</tr>											
				</thead>
				<?php  
					/**
					 * Start Loop Data Jenis Pembayaran
					 *
					 * @var string
					 **/
					$number = 1;
					foreach($get as $row) :
					?>
							<tr>
								
								<td><?php echo $number++; ?>.</td>
								<td class="text-capitalize"><?php echo $row->keterangan; ?></td>
								<td class="text-center">
									<a href="<?php echo base_url(); ?>biaya/ubahjenis/<?php echo $row->jenis_bayar_id; ?>" class=" text-primary pr-2" data-toggle="tooltip" data-placement="top" title="Sunting">
										<i class="fas fa-pencil-alt"></i>
									</a>
									<a href="#" class="text-danger get-delete-jenis" data-id="<?php echo $row->jenis_bayar_id; ?>">
										<i class="fas fa-trash"></i>
									</a>
									
								</td>
							</tr>
					<?php  
					// End Loop Jenis Pembayaran
					endforeach;
					?>
				</table>
				</div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                  <a href="<?php echo base_url(); ?>biaya/tambahjenis.html" class="btn btn-default float-right">Tambah</a>
            </div>
          </div>
          <!-- /.card -->  
      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.control-sidebar -->
<?php echo form_open('biaya/hapusjenis','id="add-row-form"'); ?> 	
<div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Jenis Pembayaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin akan menghapus jenis pembayaran ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
            <input type="hidden" name="jenisid" class="form-control" id="productID">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Hapus</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<?php echo form_close(); ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->session->set_userdata('referred_from', current_url()); ?>
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
         
<?php  
// Open Form Search KRS
echo form_open(current_url());
?>
	<div class="card card-primary card-outline">
              <div class="card-body box-profile row">
               <div class="input-group mb-3 col-md-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Tahun Masuk</span>
                  </div>
                  <?php  
				       	/**
				       	 * Form Dropdown Tahun Masi
				       	 *
				       	 * @var string
				       	 **/
				       	$tahun = date('Y') - 10;
				       	if(!empty(set_value('tahun_masuk'))){
				       	$reg_year[set_value('tahun_masuk')] = set_value('tahun_masuk');
				       	}else{
				       	$reg_year["0"] = "-- PILIH --";
				       	}
				       	for($tahun; $tahun <= date('Y'); $tahun++)
				       		$reg_year[$tahun] = $tahun;
				       	echo form_dropdown('tahun_masuk', 
				       		$reg_year, 
				       		NULL,
				       		
				       		array('class' => 'form-control')
				       	);
				       	?>
                </div>
                 <div class="input-group mb-3 col-md-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Prodi</span>
                  </div>
                                      
							<?php
							$options[" "] = "-- PILIH --";
							foreach ($prodi as $prodi){
							$options[$prodi->id_prodi] = $prodi->nama_prodi;	
							}                                        
							echo form_dropdown('prodi', $options, set_value('prodi'), array('class' => 'form-control') ); 
							?>
							<?php echo form_error('prodi'); ?>						 
                   
                </div>

               <button type="submit" name="submit" class="btn btn-default form-control mr-2 col-md-1"><i class="fas fa-search"></i> Cari</button>
                <a href="<?php echo base_url(); ?>biaya/reset" class="btn btn-default form-control mr-2 col-md-1"><i class="fas fa-times"></i> Reset</a>
                 <a href="<?php echo base_url(); ?>biaya/tbhbiayatahun.html" class="btn btn-default form-control col-md-2"><i class="fas fa-plus"></i> Tambah</a>

             


           
              </div>
              <!-- /.card-body -->
            </div>
	
<?php 
echo form_close(); 
?>

		<?php if(!empty($get)){ ?>
			
				<div class="card">
              <div class="card-header">
                <h3 class="card-title">Biaya Kuliah Tahun Masuk <?php echo $this->session->userdata('tahun_mahasiswa_masuk'); ?> Prodi <?php $query = $this->db->get_where('prodi', array('id_prodi' => $this->session->userdata('prodi_mahasiswa'))); echo $query->row()->nama_prodi ; ?></h3>

                <div class="card-tools">
                  <a href="<?php echo site_url(); ?>biaya/add" class="btn btn-app">
						<i class="fa fa-plus"></i> Tambah Item
					</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th>No.</th>
					<th>Jenis Pembayaran</th>
					<th class="text-center">Biaya</th>
					<th class="text-center">Tahun Masuk</th>
					<th class="text-center">Prodi</th>
					<th class="text-center">Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
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
								<td class="text-capitalize">Rp. <?php echo rp((int)$row->jumlah); ?></td>
								<td class="text-capitalize"><?php echo $row->tahun_masuk; ?></td>
								<td class="text-capitalize"><?php echo $row->nama_prodi; ?></td>
								<td class="text-center">
									<a href="<?php echo base_url(); ?>biaya/editbiaya/<?php echo $row->biaya_kuliah_id; ?>" class=" text-primary pr-2" data-toggle="tooltip" data-placement="top" title="Sunting">
										<i class="fas fa-pencil-alt"></i>
									</a>
									<a href="#" class="text-danger get-delete-biaya" data-id="<?php echo $row->biaya_kuliah_id; ?>">
										<i class="fas fa-trash"></i>
									</a>
								</td>
							</tr>
					<?php  
					// End Loop Jenis Pembayaran
					endforeach;
					?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
		<?php } ?>

		
<?php echo form_open('biaya/hapusbiaya','id="add-row-form"'); ?> 	
<div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Item Pembayaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin akan menghapus item pembayaran ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
            <input type="hidden" name="biayaid" class="form-control" id="productID">
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


      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
	<br>
  </div>
  <!-- /.content-wrapper -->

 
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
<?php  
/**
 * Open Form Filter
 *
 * @var string
 **/
echo form_open(current_url(), array('method' => 'get'));
?>
<div class="row">
				<div class="col-md-2">
				    <div class="form-group">
				        <label>Status Dosen :</label>
				        <select name="status" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
				        	
				        </select>	
				    </div>
				</div>
				<div class="col-md-4">
				    <div class="form-group">
				        <label>Kata Kunci :</label>
				        <input type="text" name="query" class="form-control input-sm" value="" placeholder="Kode Dosen / Nama Dosen . . . ">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
                    <button type="submit" class="btn btn-default top"><i class="fa fa-filter"></i> Filter</button>
                    <a href="<?php echo site_url('pengguna/index') ?>" class="btn btn-default top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
				    </div>
				</div>
</div>
<?php  
// Close Form Filter
echo form_close();

// Start Checkbox Table
echo form_open(site_url("pengguna/bulk_action"));
?>
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Pengguna</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                  <div class="col-md-6 row">
					Tampilkan 
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('pengguna?per_page='); ?>' + this.value;">
					<?php  
					/**
					 * Loop 10 to 100
					 * Guna untuk limit data yang ditampilkan
					 * 
					 * @var 10
					 **/
					$start = 20; 
					while($start <= 100) :
						$selected = ($start == $this->input->get('per_page')) ? 'selected' : '';
						echo "<option value='".$start."' " . $selected . ">".$start."</option>";

						$start += 10;
					endwhile;
					?>
					</select>
					per Halaman
				</div>
				
                <table class="table table-hover">
                  <thead>
                    <tr>
                    <th width="40">
				                    <div class="checkbox checkbox-inline">
				                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
				                    </div>
								</th>
                      <th>No.</th>                      
                      <th>Nama</th>
                      <th>Email</th>					  
                      <th>Unit</th>
                      <th>Pangkat</th>
                       <th>Status</th>
                    <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
				 
				   <?php  
					/**
					 * Start Loop Data Mahasiswa
					 *
					 * @var string
					 **/
					$number = ($this->input->get('page') != '') ? $this->input->get('page') : 0;
					$number1 = $number +1;
					foreach($daftar_dispen as $row) :
					?>
					<tr>
					    <td>
				                    <div class="checkbox checkbox-inline">
				                        <input id="checkbox1" type="checkbox" name="lecturer[]" value="<?php echo $row->dis_id; ?>"> <label for="checkbox1"></label>
				                    </div>
								</td>
                      <td><?php echo $number1++; ?></td>                     
                      <td><?php echo $row->nimdis; ?></td>
                     <td><?php echo $row->cicilan; ?></td>
                     <td><?php echo $row->no; ?></td>
                     <td><?php echo $row->keperluan; ?></td>
                     <td><?php echo $row->tunggakan; ?></td>
                      <td>
					   <a href="<?php echo base_url(); ?>pengguna/ubah/<?php echo $row->dis_id; ?>"><i class="fas fa-pencil-alt text-warning mr-2"></i></a>	
					  <a href="<?php echo base_url(); ?>pengguna/hapus/<?php echo $row->dis_id; ?>"><i class="fas fa-trash text-danger"></i></a>
					  </td>
                    </tr>
					<?php  
					// End Loop Data Mahasiswa
					endforeach;
					?>                 
                   
                  </tbody>
                  <tfoot>
							<tr>
								<td colspan="9">
									<label style="font-size: 11px; margin-right: 10px;">Yang terpilih :</label>
									<a class="btn btn-xs btn-round btn-danger get-delete-lecturer-multiple"><i class="fa fa-trash-o"></i> Hapus</a>
									<span class="pull-right"><?php echo count($daftar_dispen) . " dari " . $jumlah_dispen . " data"; ?></span>	
								</td>
							</tr>
						</tfoot>
                </table>
              </div>
			  <div class="card-footer clearfix">
<?php  
// Form Close Checkbox Mahasiswa
echo form_close();
?>		
                <div class="row">
				<div class="col">
				<?php echo $this->pagination->create_links(); ?>
				</div>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
		
		
      
      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
  <!-- /.control-sidebar -->

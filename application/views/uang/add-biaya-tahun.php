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
				      // 	if(!empty(set_value('tahun_masuk'))){
				      // 	$reg_year[set_value('tahun_masuk')] = set_value('tahun_masuk');
				      // 	}else{
				       	$reg_year[" "] = "-- PILIH --";
				     //  	}
				       	for($tahun; $tahun <= date('Y'); $tahun++)
				       		$reg_year[$tahun] = $tahun;
				       	echo form_dropdown('tahun_masuk', $reg_year, NULL, array('class' => 'form-control'));
				       	?>
				       		<?php echo form_error('tahun_masuk'); ?>
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
<div class="col-md-12"><hr>

					<table class="table table-hover table-bordered table-responsive table-black table-bordered-black mailbox-messages">
						<thead class="bg-silver">
							<tr>
								<th width="1%">
				                     <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
								</th>
								<th width="1%">No.</th>
								<th width="100">Jenis Pembayaran</th>								
							</tr>
						</thead>
						<tbody>
				<?php  
				/**
				 * Loop Data KRS
				 *
				 * @return string
				 **/
				$d =1;
				$f =1;
				foreach($jenis as $key => $value) :
				?>
							<tr>
								<td>
				                    <div class="icheck-primary">
				                        <input id="check<?php echo $d++ ?>" type="checkbox" name="jenis[]" value="<?php echo $value->jenis_bayar_id; ?>"> 
				                        <label for="check<?php echo $f++ ?>"></label>
				                    </div>
								</td>
								<td><?php echo ++$key; ?>.</td>
								<td><?php echo $value->keterangan; ?></td>								
							</tr>
				<?php 
					
				// End Loop 
				endforeach;
				?>
				            <tr>
								<td>
				                    <div class="icheck-primary">
				                        <input  type="checkbox" checked disabled> 
				                        <label ></label>
				                    </div>
								</td>
								<td><?php echo ++$key; ?>.</td>
								<td><?php echo $sks->keterangan ?> (<i>otomatis ditambahkan</i>)</td>								
							</tr>
							<tr>
								<td>
				                    <div class="icheck-primary">
				                        <input  type="checkbox" checked disabled> 
				                        <label ></label>
				                    </div>
								</td>
								<td><?php echo ++$key; ?>.</td>
								<td><?php echo $spp->keterangan ?> (<i>otomatis ditambahkan</i>)</td>								
							</tr>
							
						</tbody>
						<tfoot>
							
							<tr>
								<th colspan="6">
									<label style="font-size: 11px; margin-right: 10px;">Yang terpilih :</label>
									<button type="submit" name="submit" class="btn btn-xs btn-round btn-primary"><i class="fa fa-check"></i> Simpan</button>									
								</th>
							</tr>
							<p class="help-block"><?php echo form_error('jenis', '<small class="text-red">', '</small>'); ?></p>
						</tfoot>
					</table>
				</div>
				
             
              </div>
              <!-- /.card-body -->
            </div>
	
<?php 
echo form_close(); 
?>

		
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
	<br>
  </div>
  <!-- /.content-wrapper -->

 
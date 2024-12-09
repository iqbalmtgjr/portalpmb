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
                <h3 class="card-title"><?php if(!empty($jdl)){ echo $jdl; } ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>                      
                      <th>Nama</th>
                      <th>Gaji Pokok</th>
                      <th>Tunj Pasangan</th>
                      <th>Tunj Anak</th>
                      <th>Tunj Fungsional</th>
                      <th>Tunj Beras</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                     <?php if(!empty($tk)) { ?>
    				    <?php 
    				        $i  = 1;
    				        $xxto = 0;
    				    ?>
    				    <?php foreach($tk as $user) { ?>
    					<tr>
                          <td><?php echo $i++; ?></td>                     
                          <td><?php echo $user->name; ?></td>
                          <td class="text-warning"><?php if(!empty($user->gaji_pokok)){ echo "Rp. ".number_format("$user->gaji_pokok",0,",",".");} else { echo "Rp. 0";} ?></td>
                          <td class="text-warning"><?php if(!empty($user->tunj_pasangan)){ echo "Rp. ".number_format("$user->tunj_pasangan",0,",",".");} else { echo "Rp. 0";} ?></td>
                          <td class="text-warning"><?php if(!empty($user->tunj_anak)){ echo "Rp. ".number_format("$user->tunj_anak",0,",",".");} else { echo "Rp. 0";} ?></td>
                          <td class="text-warning"><?php if(!empty($user->tunj_fung)){ echo "Rp. ".number_format("$user->tunj_fung",0,",",".");} else { echo "Rp. 0";} ?></td>
                          <td class="text-warning"><?php if(!empty($user->tunj_beras)){ echo "Rp. ".number_format("$user->tunj_beras",0,",",".");} else { echo "Rp. 0";} ?></td>
                          <td class="text-success"><strong><?php $total = $user->gaji_pokok + $user->tunj_pasangan + $user->tunj_anak + $user->tunj_fung + $user->tunj_beras; echo "Rp. ".number_format("$total",0,",","."); $xxto += $total; ?></strong></td>
                        </tr>
                       
    					<?php  } ?> 
    					 <tr>
    					     <td colspan="7"><strong>Jumlah</strong></td>
                            <td class="text-info"><strong><?php echo "Rp. ".number_format("$xxto",0,",","."); ?></strong></td>
                        </tr>
                   	<?php  } ?>    
                    </tr>
					
                  </tbody>
                </table>
              </div>
			  <div class="card-footer clearfix">
              </div>
              <!-- /.card-body -->
            </div>
      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
  
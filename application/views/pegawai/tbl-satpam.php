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
                      <th>Status</th>
                      <th>Tunjangan</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                     <?php if(!empty($tk)) { ?>
    				    <?php 
    				        $i  = 1;
    				        $xx = 0;
    				        $tunsta = 0;
    				    ?>
    				    <?php foreach($tk as $user) { ?>
    					<tr>
                          <td><?php echo $i++; ?></td>                     
                          <td><?php echo $user->name; ?></td>
                         <td><?php echo $user->nama_status; ?></td>
                          <td class="text-warning"><?php $tunsta += $user->tunj_status; echo "Rp. ".number_format("$user->tunj_status",0,",",".");?></td>
                          <td class="text-success"><strong><?php echo "Rp. ".number_format("$user->tunj_status",0,",","."); ?></strong></td>
                        </tr>
                       
    					<?php  } ?> 
    					<tr>
    					    <td colspan="4"><strong>Jumlah</strong></td>
    					    <td class="text-info"><strong><?php echo "Rp. ".number_format("$tunsta",0,",","."); ?></strong></td>
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

 
  
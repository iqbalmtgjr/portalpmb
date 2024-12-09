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
              <a href="<?php echo base_url(); ?>pegawai/tambahpegawai.html" class="btn btn-info float-right">Dosen Tetap</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
				<div class="table-responsive">	
				<input type="hidden" class="form-control input-sm" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />						
				<table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
				<thead>
				   <tr>				  
					<th>No</th>
					<th></th>
					<th>Nama</th>
					<th>Pendapatan Kotor</th>	
					<th>Potongan</th>	
					<th>Pendapatan Bersih</th>
					<th>Tindakan</th>
				</tr>											
				</thead>
				
				</table>
				</div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->  
       <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Jumlah Gaji Keseluruhan</th>                      
                      <th>Jumlah Potongan Keseluruhan</th>
                      <th class="text-right">Total Pengeluaran</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $pend = 0;
                      $tong = 0;
                      foreach( $toga as $toga) {
                          $pend += $toga->total_penda;
                          $tong += $toga->total_potong;
                      
                      }
                      ?>
                            <tr>
                                <td><?php echo "Rp. ". number_format("$pend",0,",","."); ?></td>                     
                                <td><?php echo "Rp. ". number_format("$tong",0,",","."); ?></td>
                                <td class="text-right"><?php $jlm = $pend - $tong;  echo "Rp. ". number_format("$jlm",0,",","."); ?></td>
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

 

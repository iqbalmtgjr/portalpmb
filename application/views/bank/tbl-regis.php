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
                <h3 class="card-title">MABA Terregistrasi</h3>
                <a href="<?php echo base_url(); ?>bank/pdfregis.html" class="btn btn-info float-right" target="_blank">Download PDF</a>
                 <a href="<?php echo base_url(); ?>bank/gelpdfregis/2/test" class="btn btn-info float-right mr-2" target="_blank">Regis PDF</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>                      
                      <th>Nama</th>
                      <th>Prodi</th>					  
                      <th>Jumlah Setoran</th>
                      <th>Jumlah Harus Bayar</th>
                      <th>Jumlah Tunggakan</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php $i = $this->uri->segment('3') + 1; ?>
				   <?php foreach($user as $user) { ?>
					<tr>
                      <td><?php echo $i++; ?></td>                     
                      <td><?php echo ucfirst($user->nama_siswa); ?></td>
                     <td><?php echo $user->nama_prodi; ?></td>
                     <td>Rp. <?php echo number_format("$user->jlh_bayar",0,",","."); ?></td>
                     <?php if($user->jalur == "prestasi") { ?>
                     <td>Rp. 7.040.000</td>
                     <td><?php $sel = $user->jlh_bayar - 7040000; echo number_format("$sel",0,",","."); ?></td>
                     <?php }else { ?>
                     <td>Rp. 7.290.000</td>
                     <td><?php $sel = $user->jlh_bayar - 7290000; echo number_format("$sel",0,",","."); ?></td>
                     <?php } ?>
                      <td></td>
                      
                    </tr>
					<?php  } ?>                    
                   
                  </tbody>
                </table>
              </div>
			  <div class="card-footer clearfix">
		
                <div class="row">
				<div class="col">
					<?php if(!empty($pagination)) { echo $pagination; } ?>
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

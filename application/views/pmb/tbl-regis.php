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
                <h3 class="card-title">MABA Yang Sudah Membayar Uang Registrasi</h3>
                <a href="<?php echo base_url(); ?>masterpmb/pdfregisxx.html" class="btn btn-info float-right" target="_blank">Download PDF</a>
                <a href="<?php echo base_url(); ?>masterpmb/get_export.html" class="btn btn-info float-right mr-2" target="_blank">Download EXCEL</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>                      
                      <th>Nama</th>
                      <th>Prodi</th>					  
                      <th>PDF</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php $i = $this->uri->segment('3') + 1; ?>
				   <?php foreach($user as $user) { ?>
					<tr>
                      <td><?php echo $i++; ?></td>                     
                      <td><?php echo ucfirst($user->nama_siswa); ?></td>
                     <td><?php echo $user->nama_prodi; ?></td>
                     <td><a href="https://persadakhatulistiwa.ac.id/portal/masterpmb/lihatsiswa/<?php echo $user->akunb_msiswa; ?>.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="https://persadakhatulistiwa.ac.id/portal/masterpmb/pdflihat/<?php echo $user->akunb_msiswa; ?>.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a></td>
                    </tr>
                    <?php } ?>
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

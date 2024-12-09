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
        
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Jalur Tes Gelombang 3 Valid Upload Bukti Bayar </h3>
              
               <a href="<?php echo base_url(); ?>masterpmb/pdfhptiga" class="btn btn-info float-right" target="_blank">HP PDF</a>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
				<div class="table-responsive">	
				<input type="hidden" class="form-control input-sm" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />						
				<table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
				<thead>
				   <tr>				  
					<th>No.</th>
					<th></th>
					<th></th>
					<th>Nama</th>
					<th>Pilihan I</th>
					<th>Pilihan II</th>
					<th>Metode Bayar</th>
					<th>Pembayaran</th>	
					<th>Ujian</th>	
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
              <div class="card-header">
                <h3 class="card-title">Tes Valid Belum Upload Bukti Bayar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>                      
                      <th>Nama</th>
                      <th>Pilihan I</th>					  
                      <th>Pilihan II</th>
                      <th>Metode Bayar</th>
                      <th>Pembayaran</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php if(!empty($user)) { ?>
				  <?php $i = $this->uri->segment('3') + 1; ?>
				   <?php foreach($user->result() as $user) { ?>
					<tr>
                      <td><?php echo $i++; ?></td>                     
                      <td><?php echo ucfirst($user->nama_siswa); ?></td>
                     <td><?php echo $user->nama_prodi; ?></td>
                     <td><?php echo $user->nama_prodi_baru; ?></td>
                     <td><?php if($user->metode_bayar =="1"){ echo "<i class='text-info'>Panitia PMB</i>";}elseif($user->metode_bayar =="2"){ echo "<i class='text-success'>Transfer Bank</i>";}else{ echo "<i class='text-danger'>Tidak Diketahui</i>";} ?></td>
                     <td><?php if($user->valid_bayar =="2") {echo "Valid";}elseif($user->valid_bayar =="3"){echo "Tidak Valid";}else{ echo "Belum Divalidasi";} ?></td>
                    </tr>
					<?php  } ?>                    
                   	<?php  } ?>    
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
 <!-- Modal delete Berita-->
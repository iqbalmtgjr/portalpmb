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
              <h3 class="card-title">Surat Keputusan PMB</h3>
            </div>
            <form action="<?php echo base_url(); ?>masterpmb/pdfsk.html" method="GET" target="_blank">
            <div class="container m-3">
                <div class="row p4">
                    <div class="col-md-3">
                        <h5>Filter Data</h5>
                    </div>
                    <div class="col-md-3">
                        <select name="filter_jalur" class="form-control">
                            <option value="">-- Semua Jalur --</option>
                            <option value="test">Jalur Tes</option>
                            <option value="prestasi">Jalur Prestasi</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="filter_gelombang" class="form-control">
                            <option value="">-- Semua Gelombang --</option>
                            <option value="1">Gelombang I</option>
                            <option value="2">Gelombang II</option>
                            <option value="3">Gelombang III</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success btn-md col-6" type="submit"><i class="fas fa-file-download mr-2"></i>Download</button>
                    </div>
                </div>
            </div>
                    </form>
            
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
    					<th>Nomor Pendaftaran</th>
    					<th>Nama</th>
    					<th>Keputusan</th>
    					<!--<th>Prodi</th>-->
        				</tr>											
        			</thead>
				</table>
				</div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->  
      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
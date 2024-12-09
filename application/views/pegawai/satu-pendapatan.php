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
        <div class="row">
            <div class="col-md-12">
                 <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                   <h4>Data Pegawai</h4>
                <hr>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                     <span class="form-control"><?php echo $row->name; ?></span>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status Pegawai</label>
                    <div class="col-sm-10">
                     <span class="form-control"><?php echo $row->nama_status; ?></span>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tugas Tambahan</label>
                    <div class="col-sm-10">
                     <span class="form-control"><?php if(!empty($row->nama_tugas)) {echo $row->nama_tugas;} else { echo " - ";} ?></span>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Aktif Kerja</label>
                    <div class="col-sm-10">
                     <span class="form-control"><?php if($row->aktif_kerja == "1") { echo "Aktif";}elseif($row->aktif_kerja == "2") {echo "Tidak Aktif";}else{ echo "Tidak Diketahui";} ?></span>
                    </div>
                  </div>
                </div><!-- /.card-body box-profile-end -->
               
                </div><!-- /.card card-primary card-outline -->
            
            </div><!-- /.col-md-12-end -->
            
        </div><!-- /.row-end -->
       
      </div>
      <!-- /.container-fluid -->
      <div class="container-fluid">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Gaji Bulan <strong class="text-success"><?php echo $row->penda_bulan; ?></strong>  Tahun <strong class="text-info"><?php echo $row->penda_tahun; ?></strong> </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>                      
                      <th>Item</th>
                      <th class="text-right">Nilai (Rp.)</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php if($row->kodestatus_penda == "ds_tetap" || $row->kodestatus_penda == "staf_tetap") { ?>
                            <tr>
                                <td>1</td>                     
                                <td>Gaji Pokok</td>
                                <td class="text-right"><?php echo number_format("$row->poko_penda",0,",","."); ?></td>
                            </tr>
        					 <tr>
                                <td>2</td>                     
                                <td>Tunjangan Pasangan</td>
                                <td class="text-right"><?php echo number_format("$row->pasangan_penda",0,",","."); ?></td>
                            </tr>
                             <tr>
                                <td>3</td>                     
                                <td>Tunjangan Anak</td>
                                <td class="text-right"><?php echo number_format("$row->anak_penda",0,",","."); ?></td>
                            </tr>
                             <tr>
                                <td>4</td>                     
                                <td>Tunjangan Fungsional</td>
                                <td class="text-right"><?php echo number_format("$row->fung_penda",0,",","."); ?></td>
                            </tr>
                             <tr>
                                <td>5</td>                     
                                <td>Tunjangan Beras</td>
                                <td class="text-right"><?php echo number_format("$row->beras_penda",0,",","."); ?></td>
                            </tr>
                             <tr>
                                <td>6</td>                     
                                <td>Tugas Tambahan</td>
                                <td class="text-right"><?php echo number_format("$row->tamb_penda",0,",","."); ?></td>
                            </tr>
                            
                    <?php }else { ?>
                            <tr>
                                <td>1</td>                     
                                <td>Tunjangan Pokok</td>
                                <td class="text-right"><?php echo number_format("$row->status_penda",0,",","."); ?></td>
                            </tr>
                             <tr>
                                <td>2</td>                     
                                <td>Tugas Tambahan</td>
                                <td class="text-right"><?php echo number_format("$row->tamb_penda",0,",","."); ?></td>
                            </tr>
                    <?php } ?>
                           <tr style="background: #d2d6de;">
                                <td colspan="2">Jumlah</td>
                                <td class="text-right"><?php echo "Rp. ". number_format("$row->total_penda",0,",","."); ?></td>
                            </tr>
                  </tbody>
                </table>
              </div>
			  <div class="card-footer clearfix">
              </div>
              <!-- /.card-body -->
            </div>
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Potongan Bulan <strong class="text-success"><?php echo $row->penda_bulan; ?></strong>  Tahun <strong class="text-info"><?php echo $row->penda_tahun; ?></strong> </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>                      
                      <th>Item</th>
                      <th class="text-right">Nilai (Rp.)</th>
                    </tr>
                  </thead>
                  <tbody>
                            <tr>
                                <td>1</td>                     
                                <td>BPJS Kesehatan</td>
                                <td class="text-right"><?php echo number_format("$row->bpjs_sehat",0,",","."); ?></td>
                            </tr>
        					 <tr>
                                <td>2</td>  
                                <td>BPJS Ketenagakerjaan</td>
                                <td class="text-right"><?php echo number_format("$row->bpjs_kerja",0,",","."); ?></td>
                            </tr>
                             <tr>
                                <td>3</td>                     
                                <td>Pinjaman</td>
                                <td class="text-right"><?php echo number_format("$row->pinjaman",0,",","."); ?></td>
                            </tr>
                             <tr>
                                <td>4</td>                     
                                 <td>SIMATU</td>
                                <td class="text-right"><?php echo number_format("$row->simatu",0,",","."); ?></td>
                            </tr>
                             
                           <tr style="background: #d2d6de;">
                                <td colspan="2">Jumlah</td>
                                <td class="text-right"><?php echo "Rp. ". number_format("$row->total_potong",0,",","."); ?></td>
                            </tr>
                  </tbody>
                </table>
              </div>
			  <div class="card-footer clearfix">
              </div>
              <!-- /.card-body -->
            </div>
            
            <div class="col-12">
                <div class="info-box bg-info">
                  <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Jumlah Gaji  <?php echo "Rp. ". number_format("$row->total_penda",0,",","."); ?></span>
                    <span class="info-box-number">Jumlah Potongan <?php echo "Rp. ". number_format("$row->total_potong",0,",","."); ?></span>
    
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                      Jumlah Diterima <?php $fsd = $row->total_penda - $row->total_potong; echo "Rp. ". number_format("$fsd",0,",","."); ?>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
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
            <?php echo form_open(current_url(),'class="form-horizontal"'); ?>
          
        <div class="row">
            <div class="col-md-12">
                 <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                   <h4>Pembuatan Penggajian Bulanan</h4>
                   <p class="text-info">Pastikan anda telah memeriksa nominal gaji dan perubahan pegawai sebelum membuat data penggajian bulanan.</p>
                <hr>
                  <div class="form-group row">
                    <label>Gaji Bulan</label>
                     <?php  
				       	$bulan[" "] = "-- PILIH --";
				        $bulan['1'] = 'Januari';
				        $bulan['2'] = 'Februari';
				        $bulan['3'] = 'Maret';
				        $bulan['4'] = 'April';
				        $bulan['5'] = 'Mei';
				        $bulan['6'] = 'Juni';
				        $bulan['7'] = 'Juli';
				        $bulan['8'] = 'Agustus';
				        $bulan['9'] = 'September';
				        $bulan['10'] = 'Oktober';
				        $bulan['11'] = 'November';
				        $bulan['12'] = 'Desember';
				        
				       	echo form_dropdown('bulan_gaji', $bulan, set_value('bulan_gaji'), array('class' => 'form-control'));
				       	?>
				       		<?php echo form_error('bulan_gaji'); ?>
                  </div>
                   <div class="form-group row">
                    <label>Tahun</label>
                     <?php  
				       
				       	$tahun = date('Y') - 6;
				       	$reg_year[" "] = "-- PILIH --";
				    
				       	for($tahun; $tahun <= date('Y') +1; $tahun++)
				       		$reg_year[$tahun] = $tahun;
				       	echo form_dropdown('tahun_gaji', $reg_year, set_value('tahun_gaji'), array('class' => 'form-control'));
				       	?>
				       		<?php echo form_error('tahun_gaji'); ?>
                  </div>
                </div><!-- /.card-body box-profile-end -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-app text-success"><i class="fa fa-save"></i>Buat</button>
                </div><!-- /.card-footer-end -->
                </div><!-- /.card card-primary card-outline -->
            
            </div><!-- /.col-md-12-end -->
            
        </div><!-- /.row-end -->
          
             
         
        <?php echo form_close(); ?>
      </div>
      <!-- /.container-fluid -->
      <div class="container-fluid">
        
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Bulan Gaji</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>                      
                      <th>Bulan</th>
                      <th>Tahun</th>					  
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                     <?php if(!empty($tk)) { ?>
    				    <?php 
    				        $i  = 1;
    				    ?>
    				    <?php foreach($tk as $user) { ?>
    					<tr>
                          <td><?php echo $i++; ?>.</td>                     
                          <td>
                          <?php if($user->penda_bulan == "1") {
                                    echo "Januari";
                                }elseif($user->penda_bulan == "2") {
                                    echo "Februari";
                                }elseif($user->penda_bulan == "3"){
                                     echo "Maret";
                                }elseif($user->penda_bulan == "4"){
                                     echo "April";
                                }elseif($user->penda_bulan == "5"){
                                     echo "Mei";
                                }elseif($user->penda_bulan == "6"){
                                     echo "Juni";
                                }elseif($user->penda_bulan == "7"){
                                     echo "Juli";
                                }elseif($user->penda_bulan == "8"){
                                     echo "Agustus";
                                }elseif($user->penda_bulan == "9"){
                                     echo "September";
                                }elseif($user->penda_bulan == "10"){
                                     echo "Oktober";
                                }elseif($user->penda_bulan == "11"){
                                     echo "November";
                                }elseif($user->penda_bulan == "12"){
                                     echo "Desember";
                                }else{ echo "Terjadi Kesalahan";}         
                        ?>
                          </td>
                         <td><?php echo $user->penda_tahun; ?></td>
                          <td class="text-warning"><a href="<?php echo base_url(); ?>pegawai/setgaji/<?php echo $user->penda_bulan ;?>/<?php echo $user->penda_tahun; ?>"><i class="fas fa-eye pr-2"></i></a></td>
                        </tr>
                       
    					<?php  } ?> 
    					
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
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
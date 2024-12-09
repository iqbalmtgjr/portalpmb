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
          <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> DATA DOSEN STKIP PERSADA KHATULISTIWA
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
               <div class="col-5 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Data Dosen
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo $detil->name; ?></b></h2>
                      <p class="text-muted text-sm"><b>NIDN: </b> <?php echo $detil->nidn; ?> </p>
                       <p class="text-muted text-sm"><b>NIK: </b> <?php echo $detil->nip; ?> </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><?php echo $detil->nama_prodi; ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><?php echo $detil->phone; ?></li>
                         <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span><?php echo $detil->email; ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="<?php echo base_url(); ?>pegawai/ubahpegawai/<?php echo $detil->lecturer_id; ?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-pencil-alt"></i> UBAH
                    </a>
                  </div>
                </div>
              </div>
            </div>
                <!-- /.col -->
                <div class="col-3">
                    <p class="lead">Alamat</p>
                    <p class="lead"><?php echo $detil->address; ?></p>
                </div>
                <!-- /.col -->
                <div class="col-4 invoice-col">
                  <b>Keterangan lainnya</b><br>
                  <br>
                  <b>Status:</b> <?php if($detil->status == 'ds_tetap') {echo 'Dosen Tetap';} else {echo 'Dosen Luar Biasa';} ?><br>
                  <b>Jenis Kelamin:</b> <?php echo ucfirst($detil->gender); ?><br>
                  <b>Tempat/TTL:</b> <?php echo $detil->place_of_birts; ?>, <?php echo $detil->birts; ?><br>
                  <b>Agama:</b> <?php echo ucfirst($detil->religion); ?><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

             <div class="table-responsive">
                 <p>Daftar Gaji</p>
				<table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
				<thead>
				   <tr>
					
					<th>Gaji Pokok</th>				 
					<th>Tunjangan Pasangan</th>
					<th>Tunjangan Anak</th>
					<th>Tunjangan Fungsional</th>
					<th>Tunjangan Beras</th>
					<th>Jumlah Total</th>
				</tr>											
				</thead>
				<?php if(!empty($row)) { ?>
			    <tr>			
					<td><?php echo "Rp. " . number_format($row->gaji_pokok, 0, ",", "."); ?></td>
					<td><?php echo "Rp. " . number_format($row->tunj_pasangan, 0, ",", "."); ?></td>
					<td><?php echo "Rp. " . number_format($row->tunj_anak, 0, ",", "."); ?></td>
					<td><?php echo "Rp. " . number_format($row->tunj_fung, 0, ",", "."); ?></td>
					<td><?php echo "Rp. " . number_format($row->tunj_beras, 0, ",", "."); ?></td>
					<td><?php $jumlah = $row->gaji_pokok + $row->tunj_pasangan + $row->tunj_anak + $row->tunj_fung + $row->tunj_beras; echo "Rp. " . number_format($jumlah, 0, ",", "."); ?></td>
				</tr>
				<tr>
				    <td colspan="6">
				        <?php if(!empty($row)) { ?>
				        <a href="<?php echo base_url(); ?>pegawai/tbhgaji/<?php echo $detil->lecturer_id; ?>" class="btn btn-sm btn-info">
                      <i class="fas fa-pencil-alt"></i> Ubah Gaji
                    </a>
                    <?php }else { ?>
                     <a href="<?php echo base_url(); ?>pegawai/tbhgaji/<?php echo $detil->lecturer_id; ?>" class="btn btn-sm btn-success">
                      <i class="fas fa-pencil-alt"></i> Tambah Gaji
                    </a>
                     
                    <?php } ?>
				    </td>
				</tr>
				<?php }else{ ?>	
				<tr> <td colspan="6" class="text-danger">Data Gaji Belum Diinput <a href="<?php echo base_url(); ?>pegawai/tbhgaji/<?php echo $detil->lecturer_id; ?>" class="btn btn-sm" style="color: #fff; background-color: #dddee0; border-color: #dddee0; box-shadow: none;">INPUT SEKARANG</a></td></tr>
				<?php } ?>
				</table>
				</div>


              <!-- this row will not appear when printing -->
             
            </div>
            

      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
	<br>
  </div>
  <!-- /.content-wrapper -->

 
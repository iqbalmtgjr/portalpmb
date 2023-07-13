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
                    <i class="fas fa-globe"></i> SURAT DISPENSASI KEUANGAN
                    <small class="float-right">Nomor Surat: <?php echo $detildis->no; ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
               <div class="col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Data Mahasiswa/i
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo $detildis->nama; ?></b></h2>
                      <p class="text-muted text-sm"><b>NIM: </b> <?php echo $detildis->nim; ?> </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><?php echo $detildis->nama_prodi; ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Semester: <?php echo $detildis->smt; ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Kelas: <?php echo $detildis->kelas; ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Lihat Profil
                    </a>
                  </div>
                </div>
              </div>
            </div>
                <!-- /.col -->
                <div class="col-4">
                  <p class="lead">Rincian Tunggakan</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Tunggakan</th>
                        <td>Rp.<?php echo $detildis->tunggakan; ?></td>
                      </tr>
                      <tr>
                        <th>Cicilan</th>
                        <td>Rp.<?php echo $detildis->cicilan; ?></td>
                      </tr>
                      
                      <tr>
                        <th>Sisa:</th>
                        <td>Rp.<?php $sisa = $detildis->tunggakan - $detildis->cicilan; echo $sisa; ?></td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4 invoice-col">
                  <b>Keterangan lainnya</b><br>
                  <br>
                  <b>Tanggal Pembuatan:</b><?php echo $detildis->tgl_buat; ?><br>
                  <b>Tanggal Kadaluarsa:</b> <?php echo $detildis->kadaluarsa; ?><br>
                  <?php 
                  $jam1 = strtotime(str_replace('/', '-', $detildis->tgl_buat)); 
                  $jam2 = strtotime(str_replace('/', '-', $detildis->kadaluarsa));
                  date_default_timezone_set('Asia/Jakarta');
                  $pituk = strtotime("now");
                  ?>
                  <b>Status:</b> <?php if($pituk > $jam2) {echo '<span class="text-danger">Kadaluarsa</span>';} else { echo '<span class="text-info">Aktif</span>';}  ?><br>
                  <b>Keperluan:</b> <?php echo $detildis->keperluan; ?><br>
                  <b>Tanggal Lunas:</b> <?php if(!empty($detildis->lunas)){ echo date("d/m/Y",$detildis->lunas);}else {echo "-";} ?><br>
                  <b>Lunas sebelum jatuh tempo:</b> <span class="text-primary">
                    <?php 
                        if(!empty($detildis->lunas)){ 
                            if($detildis->lunas <= $jam2 ){
                                echo "Lunas";
                            }else{
                                echo "Tidak";
                            }
                                
                            }else{
                                echo "-";
                            }
                    ?>
                        </span><br><hr>
                  <b>Jumlah Dispensasi:</b> <?php $jlhd =$this->dispensasi->jlmdispen($detildis->nim)->result(); echo count($jlhd); ?><br>
                  <?php $sis = 3 - count($jlhd);?>
                  <?php
                  if($sis == 0) { ?>
                       <span class="btn btn-danger" style="margin-right: 5px;">
                   <b>Kuota Dispensasi Habis </b>
                  </span> 
               <?php   }elseif($sis == 1){
                       ?>
                      <span class="btn btn-warning" style="margin-right: 5px;">
                   <b>Kuota Dispensasi sisa <?php echo $sis; ?></b>
                  </span> 
                  <?php
                  }else{ ?>
                  
                     <span class="btn btn-info" style="margin-right: 5px;">
                   <b>Kuota Dispensasi sisa <?php echo $sis; ?></b>
                  </span>  <hr> 
                 <?php }
                  ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

             


              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                   <sup class="text-danger">*</sup> <i>Tunggakan wajib dilunasi paling lambat pada tanggal kadaluarsa</i><br>
                   <sup class="text-danger">*</sup> <i>Setiap mahasiswa hanya memiliki <span class="text-danger">tiga</span> kali kesempatan mengajukan dispensasi selama masa pendidikan</i><br>
                  
                   <?php echo form_open('dispensasi/lunas','style="display: inline-block;"'); ?>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $detildis->dis_id; ?>">      
                        <button type="submit" class="btn btn-warning" onclick="return confirm('Apakah benar tunggakan sudah dilunasi?')">
                        Lunas Sebelum Jatuh Tempo</button>
                        <?php echo form_close(); ?>
                        
                    <?php if($sis != 0) { ?>
                  <a href="<?php echo base_url() ?>dispensasi/tbhdispen/<?php echo $detildis->dis_id; ?>.html"  class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah Dispensasi</a>
                <?php } ?>
                </div>
              </div>
            </div>
            

      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
	<br>
  </div>
  <!-- /.content-wrapper -->

 
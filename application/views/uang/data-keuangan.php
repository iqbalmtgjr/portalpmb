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

            <div class="col-md-6">
<?php
/**
 * Open Form Mahasiswa
 *
 * @var string
 **/
echo form_open('biaya/datakeuangan');
?>
                <div class="callout callout-info">
              <table class="table table-bordered">
                 
                  <tbody>
                      <thead>
                    <tr>
                      <td colspan="3">Mahasiswa
                      <a class="btn btn-default btn-sm float-right" style="text-decoration:none;" href="<?php echo site_url('biaya/tambahseri') ?>">Nomor Seri</a>
                      <a class="btn btn-default btn-sm float-right mr-2" style="text-decoration:none;" href="<?php echo site_url('mahasiswa/tamsiswa') ?>">Tambah Mahasiswa</a>
                      <a class="btn btn-default btn-sm float-right mr-2" style="text-decoration:none;" href="<?php echo site_url('mahasiswa/tambahskssem') ?>">SKS Semester</a>
                      </td>
                    </tr>
                    </thead>
                    <tr>
                      <td>NIM</td>
                      <td>
                          <div class="row">
                        <div class="col-md-5">
							<input type="text" name="nim" class="form-control mb-2" placeholder="Ketik Nim">
						</div>
						<div class="col-md-7">
						<button type="submit" name="submit" class="btn btn-default">OK</button> 
						<a href="<?php echo site_url('biaya/reset1') ?>" class="btn btn-default float-right" style="text-decoration:none;">Reset</a> 
						</div>
						</div>
                      </td>
                      <td rowspan="3" class="text-center" style=" max-width: 170px; ">
                      <div class="profile-img">
                        <img style="max-width: 80%;" src="<?php if(!empty($get->foto)){echo base_url("foto/thumb/".$get->foto); }else {echo base_url("dist/img/avatar5.png"); }  ?>">
                       </div>
                      </td>
                      
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>: <?php if(!empty($get->nama)){echo $get->nama; }  ?></td>
                    </tr>
                    <tr>
                      <td>Prodi</td>
                      <td>: <?php if(!empty($get->nama_prodi)){echo $get->nama_prodi; } ?></td>
                    </tr>
                  </tbody>
                </table>
            </div>
<?php  echo form_close(); ?>  
            </div>
          
            <div class="col-md-6">
<?php
/**
 * Open Form Transaksi
 *
 * @var string
 **/
echo form_open('biaya/datakeuangan');
?>
            <div class="callout callout-info">
            <table class="table table-bordered">
                  <tbody>
                      <thead>
                    <tr>
                      <td colspan="3">Form Transaksi</td>
                    </tr>
                    </thead>
                    <tr>
                      <td>Jenis Pembayaran</td>
                      <td>
                          <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">  
    						<select name="jenis" class="custom-select" id="jenis_pembayaran" required="required">
    							<option value="" selected="selected" disabled>--PILIH--</option>											
    							<?php
        							foreach ($jenis_bayar1 as $tabel){
        								echo "<option value=".$tabel->jenis_bayar_id.">".$tabel->keterangan."</option>";
        								}
    							?>
    						</select>
						</div> 
						</div>
						<div class="col-md-6">
						    <select name="semester" id="semester" class="form-control">										
							<?php 
							for($sms=1;$sms<=16;$sms++)
							{
								echo "<option VALUE='$sms'>SEMESTER $sms</option>";
							}
							?>                                   
							</select>
							<select name="semestersks" id="sks" class="form-control">										
							<?php 
							for($sms=1;$sms<=16;$sms++)
							{
								echo "<option VALUE='$sms'>SKS SEMESTER $sms</option>";
							}
							?>                                   
							</select>
						</div>
						</div>
                      </td>
                    </tr>
                    <tr>
                      <td>Jumlah Bayar</td>
                      <td>
                        <div class="row">
                        <div class="col-sm-4">
						<input type="text" name="jumlah" class="form-control" placeholder="Uang ..">
						</div>
						<div class="col-sm-4">
						<input type="text" name="seri" class="form-control" placeholder="No. Seri">
						</div>
						<div class="col-sm-4">
						<div class="form-group pull-right" style="margin-bottom: 0px;"> 
							<button type="submit" name="submit2" class="btn btn-default">Simpan</button> 												
						</div> 
						</div>	
                      	
						</div>
                      </td>
                    </tr>
                   
                  </tbody>
                </table>
            </div>
<?php  echo form_close(); ?>  
            </div>
            
        </div>
<?php if(!empty($nim)) { ?>
		<div class="card card-primary card-outline">
                 <div class="card-body">  
				<div class="table-responsive" >
					<table class="table table-bordered table-hover">
						<thead >
							<tr>								
								<th colspan="7">Riwayat Transaksi</th>								
							</tr>
							<tr class="thead-light">								
								<th width="30">No.</th>
								<th width="100" class="text-center">Jenis Pembayaran</th>
								<th class="text-center">Harus Dibayar</th>
								<th class="text-center">Sudah Dibayar</th>
								<th class="text-center">Sisa</th>
								<th class="text-center">Persentase</th>
								<th width="100">Keterangan</th>
							</tr>
						</thead>
						<tbody>
					<?php  
// tahun akademik ketika masuk
    $tahun_akademik =  $get->tahun_masuk;
    // konsentrasi
    $concentration_id = $get->prodi;
	$biaya_persks   = get_biaya_persks($tahun_akademik, $concentration_id, 'jumlah');
    $no=1;
	$tgk = 0;
	$wajib = 0;
	$udah =0;
        foreach ($jenis_bayar as $jb)
        {
            $jumlah_bayar   =(int) get_biaya_kuliah($tahun_akademik, $jb->jenis_bayar_id, $concentration_id, 'jumlah');
            $sudah_bayar    = (int)get_biaya_sudah_bayar($nim, $jb->jenis_bayar_id);
            $sisa           = $jumlah_bayar-$sudah_bayar;
            $ket           = $sisa<=0?'Lunas':'Tunggakan Rp.'.rp($sisa);
            echo "<tr><td>$no</td>
                <td>".  strtoupper($jb->keterangan)."</td>
                <td>Rp.".rp($jumlah_bayar)."</td>
                <td>Rp.".rp($sudah_bayar)."</td>
                <td>Rp.".rp($sisa)."</td>
                <td>".round(get_persentase_pembayaran($jumlah_bayar, $sudah_bayar),2)." %</td>
                <td>$ket</td>
                </tr>";
            $no++;	
			$tgk += $sisa;
			$wajib += $jumlah_bayar;
			$udah += $sudah_bayar;
        }
		
       // get semester aktif
       $smt_aktif = getField('mahasiswa', 'semester_aktif', 'nim', $nim);
        // looping semester
        for($i=1;$i<=$smt_aktif;$i++)
        {
            $spp            =   (int) get_biaya_kuliah($tahun_akademik, 1, $concentration_id, 'jumlah');
            $spp_udah_bayar =   (int)get_semester_sudah_bayar($nim, $i);
            $sisa           =   $spp-$spp_udah_bayar;
            $keterangan           =   $sisa<=0?'Lunas':'Tunggakan Rp.'.$sisa;
            echo "<tr>
				<td>$no</td>
                <td>SPP SEMESTER $i</td>
                <td>Rp.".rp($spp)."</td>
                <td>Rp.".rp($spp_udah_bayar)."</td>
                <td>Rp.".rp($sisa)."</td>
                <td>".round(get_persentase_pembayaran($spp, $spp_udah_bayar),2)." %</td>
                <td>$keterangan</td>
				</tr>";
            $no++;
			$tgk += $sisa;
			$wajib += $spp;
			$udah += $spp_udah_bayar;
        }
		 // looping sks semester
		
		$student_id = $get->id_mahasiswa;
			$sks1             =   (int) get_biaya_sks($student_id, $concentration_id, 'sks_jumlah',1);
			$sks_harus_bayar1 =	(int) $biaya_persks*$sks1;
            $sks_udah_bayar1  =   (int)get_sks_sudah_bayar($nim, 1);
            $sisa1            =   $sks_harus_bayar1-$sks_udah_bayar1;
            $keterangan1           =   $sisa1<=0?'Lunas':'Tunggakan Rp.'.rp($sisa1);
            echo "<tr>
				<td>$no</td>
                <td>SKS SEMESTER 1</td>
                <td>Rp.".rp($sks_harus_bayar1)."</td>
                <td>Rp.".rp($sks_udah_bayar1)."</td>
                <td>Rp.".rp($sisa1)."</td>
                <td>".round(get_persentase_pembayaran($sks_harus_bayar1, $sks_udah_bayar1),2)." %</td>
                <td>$keterangan1</td>
				</tr>";
            $no++;
			$tgk += $sisa1;
			$wajib += $sks_harus_bayar1;
			$udah += $sks_udah_bayar1;
		for($i=2;$i<=$smt_aktif;$i++)
        {
            $sks            =   (int) get_biaya_sks($student_id, $concentration_id, 'sks_jumlah',$i);
			$sks_harus_bayar			=	(int) $biaya_persks*$sks;
            $sks_udah_bayar =   (int)get_sks_sudah_bayar($nim, $i);
            $sisa           =   $sks_harus_bayar-$sks_udah_bayar;
            $keterangan           =   $sisa<=0?'Lunas':'Tunggakan Rp.'.$sisa;
            echo "<tr>
				<td>$no</td>
                <td>SKS SEMESTER $i</td>
                <td>Rp.".rp($sks_harus_bayar)."</td>
                <td>Rp.".rp($sks_udah_bayar)."</td>
                <td>Rp.".rp($sisa)."</td>
                <td>".round(get_persentase_pembayaran($sks_harus_bayar, $sks_udah_bayar),2)." %</td>
                <td>$keterangan</td>
				</tr>";
            $no++;
			$tgk += $sisa;
			$wajib += $sks_harus_bayar;
			$udah += $sks_udah_bayar;
        }
    ?>    
	
						</tbody>
						<tfoot>
							<tr class="thead-light">
								<th colspan="2"><span class="pull-right">Jumlah :</span></th>
								<th>Rp. <?php echo rp($wajib); ?></th>
								<th>Rp. <?php echo rp($udah); ?></span></th>
								<th>Rp. <?php echo rp($tgk); ?></th>
								<th colspan="2"></th>
							</tr>
						</tfoot>
					</table>
				</div>
				</div>
				</div>
		
<?php } ?> 
<?php // Start Checkbox Table
if ($tung >0) {
?>
                <div class="card card-primary card-outline">
                 <div class="card-body">  
				<div class="table-responsive">
					<table class="table table-bordered table-hover" id="mytable">
						<thead>
							<tr>								
								<th colspan="6">Riwayat Transaksi Detail</th>								
							</tr>
							<tr class="thead-light">								
								<th width="30">No.</th>
								<th width="100" class="text-center">Jenis Pembayaran</th>
								<th class="text-center">Tanggal</th>
								<th class="text-center">Jumlah</th>
								<th class="text-center">Petugas</th>
								<th class="text-center">Operasi</th>
								
							</tr>
						</thead>
						<tbody>
					<?php
    $i=1;
    
    foreach ($transaksi as $r)
    {
        $smt=$r->jenis_bayar_iddetail==1 || $r->jenis_bayar_iddetail==5 ?$r->semester_detail:'';
		$ttg = $r->tgl_detail;
		$ttgl = explode(' ',trim($ttg))[0];
        echo "<tr>
            <td>$i</td>
            <td>".  strtoupper($r->keterangan)." $smt</td>
            <td>".  tgl_indo($ttgl)."</td>
            <td>Rp .".rp((int)$r->jumlah_detail)."</td>
            <td>".  strtoupper($r->nama)."</td>			
            <td align='center'><a href='javascript:void(0);' data-code='$r->pembayara_detail_id' class='delete_record'><i class='fas fa-trash text-danger pr-2'></i></a></td>
			</tr>";
        $i++;
    }
    ?> 
	
						</tbody>						
					</table>
				</div>
				</div>
				</div> 
<?php } ?>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 <?php echo form_open('biaya/hapusrinci','id="add-row-form"'); ?> 	
 	<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">Hapus Berita</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id_rinci" class="form-control" required>
					<strong>Apakah Anda yakin akan menghapus item pembayaran ini?</strong>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-success">Hapus</button>
				</div>
			</div>
		</div>
	</div>
<?php echo form_close(); ?>
  
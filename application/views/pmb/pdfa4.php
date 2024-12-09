<!DOCTYPE html>
<html>
   <head>
      <title><?php echo $title; ?></title>	 
     
      <style>
         body { font-family:'Arial Narrow';  }
         table { font-size:15px; font-family:'Arial Narrow'; }
         .header { width:100%; height:11%; font-weight:500;  }
         .big-title {  font-family:'Arial Narrow'; font-size:x-large; letter-spacing:2px; word-spacing: 7px; font-weight:bold; }
		 .stt-title {  font-family:'Arial Narrow'; font-size:16px; letter-spacing:1px; word-spacing: 3px; font-weight:bold; }
         .small-title {  font-family:'Arial'; font-size:12px; letter-spacing:normal; text-transform: none; }
         .content { font-size:14px; font-family:'Arial Narrow'; margin-top:20px;}
         .upper { text-transform: uppercase;  }
         .underline { text-decoration: underline; }
         .bold { font-weight:bold; }
         .text-center { text-align: center; }
		 .tengah [class*="icon"] { 		 
				text-alidisplay: block;
				height: 100%;
				width: 100%;
				margin: auto; }
         table.mini-font { font-size: 10px; }
         table.gridtable { border-width: 0; border-color: #757572; border-collapse: collapse; }
         table.gridtable th {  border-width: 0.1px; padding: 4px; border-style: solid; border-color: #757572; text-transform: none; }
         table.gridtable td { border-width: 0.1px; border-top: 0px; padding: 4px 3px 5px 3px; border-style: solid; border-color: #757572; }
         table.kop tr { line-height: 50% }
         table.kop { 
				margin-top: -5px;
				margin-left: 70px;
		 }
		 .tg  {border-collapse:collapse;border-color:#ccc;border-spacing:0;}
.tg td{background-color:#fff;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
  font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{background-color:#f0f0f0;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
  font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-tysj{color:#333333;text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
		
         h5 { margin: 10px; }
		 .wrapper {
            background-image: url("./assets/images/pngwing.png");
            background-repeat: no-repeat;
           /*  background-attachment: fixed; */
            background-position: center; 
            page-break-inside: avoid;
            height: 400px;
        }
         @media all {
         .watermark {
         display: none;
         background-image: url("./assets/images/logo.png"); ?>);
         float: right;
         }
         .pagebreak {
         display: none;
         }
         }
         @media print {
         .watermark {
         display: block;
         }
         .pagebreak {
            display: block;
            page-break-after: always;
         }
         }
		
        
      </style>
   </head>
   <body style="margin: 30px;">
        <div class="wrapper">
      <div class="table">
          <div class="header">
            <img height="90" width="90"  style="float: left; padding-right: 10px;" src="./assets/images/logo.png" alt="">
            <div class="stt-title text-center">PERKUMPULAN BADAN PENDIDIKAN KARYA BANGSA</div>
           <div class="stt-title text-center">STKIP PERSADA KHATULISTIWA SINTANG</div>
		   <div class="stt-title text-center">SINTANG - KALIMANTAN BARAT</div>
		   <div class=" small-title text-center"><i>Jln. Pertamina Sengkuang Km 4, Kotak Pos 126 Telp.(0564) 2022386, 2022387</i></div>
		   <div class=" small-title text-center" style="margin-left: 90px;">Email: persada@persadakhatulistiwa.ac.id Website : https://persadakhatulistiwa.ac.id</div>
         </div>
         <hr style="width: 100%;">
      </div>
   
   
      <h4 class="upper text-center">Data Calon Mahasiswa Baru Tahun 2024</h4>
      <p>IDENTITAS CALON MAHASISWA</p>
      <table width="100%" align="center" style="text-align:left">
          <tr>              
              <th width="150" height="15">No. Pendaftaran </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo $warga->ref; ?></td>
          </tr>
          <tr>              
              <th width="150" height="15">Jalur Pendaftaran </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo ucfirst($warga->jalur); ?></td>
          </tr>
           <tr>
              <th width="150" height="15">Tanggal Pendaftaran </th> <td width="10" style="text-align:center;">:</td>
             <td><?php $wak = date('d/m/Y',$warga->daftar_akun); echo tgl_indo1($wak); ?></td>              
          </tr>
          
        <?php if($warga->jalur =="test") { ?>  
          
          <tr>              
              <th width="150" height="15">Metode Pembayaran </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php if($warga->metode_bayar=="1"){echo "Panitia PMB";}elseif($warga->metode_bayar=="2"){ echo "Transfer Bank";}else{ echo " - ";} ?></td>
          </tr>
              
          <tr>              
              <th width="150" height="15">Status Pembayaran </th>  <td width="10" style="text-align:center;">:</td>
              <td>
                  <?php if($warga->valid_bayar =="2") { echo "Valid";}elseif($warga->valid_bayar =="3"){  echo "Tidak Valid"; } else { echo "Belum bayar/Belum divalidasi";} ?>
              </td>
          </tr>
         <?php } ?>   
         <?php if(!empty($warga->status_penerimaan)) { ?>
            <tr>              
              <th width="150" height="15">Status Penerimaan </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo ucfirst($warga->keputusan_text); ?></td>
          </tr>
           <tr>              
              <th width="150" height="15">Lulus pada Prodi </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo ucfirst($warga->nama_prodi); ?></td>
          </tr>
         <?php } ?>
          <tr>
              <th width="150" height="15">Gelombang </th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->gelombang; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">NIS </th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->nis_siswa; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">NIK </th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->nik_siswa; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Nama Lengkap</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->nama_siswa; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Email</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->email_akun_siswa; ?></td>              
          </tr>
          <tr>
              <th width="150" height="15">Tempat, Tanggal Lahir</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->tmp_lahir_siswa.', '.tgl_indo1($warga->tgl_lahir_siswa); ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Jenis Kelamin</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->jekel_siswa; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Agama</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo ucfirst($warga->agama_siswa); ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Alamat</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->alamat_siswa; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Dusun</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->dusun_siswa; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">RT / RW</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->rtrw_siswa; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Desa</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->desa_siswa; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Kecamatan</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->kec_siswa; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Kode Pos</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->pos_siswa; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">No HP</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->hp_siswa; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Tempat Tinggal</th> <td width="10" style="text-align:center;">:</td>
             <td><?php if($warga->jenis_tiggal_siswa =="ortu") { 
                     echo "Bersama orang tua"; 
                     }else {
                        echo $warga->jenis_tiggal_siswa;
                     } ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Transportasi</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->transpot_siswa; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">No KPS</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->kps_siswa; ?></td>              
          </tr>
		
              
          
      </table>
	<p>PENDIDIKAN TERTINGGI SEBELUMNYA</p>
      <table width="100%" align="center" style="text-align:left">
          <tr>              
              <th width="150" height="15">Jenis Sekolah Asal </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo $warga->jenis_sekolah; ?></td>
          </tr>
          <tr>              
              <th width="150" height="15">Nama Sekolah </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo $warga->nama_sekolah; ?></td>
          </tr>
           <tr>
              <th width="150" height="15">Alamat </th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->alamat_sekolah; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Jurusan </th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->jurusan_sekolah; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Tahun Lulus</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->tahun_lulus_sekolah; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Nomor IJAZAH</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->ijasah_sekolah; ?></td>              
          </tr>
      </table>
      <p>PROGRAM STUDI YANG DIPILIH</p>
      <table width="100%" align="center" style="text-align:left">
          <tr>              
              <th width="150" height="15">Program Studi Pilihan I </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo $prodi1->nama_prodi;?></td>
          </tr>
          <tr>              
              <th width="150" height="15">Program Studi Pilihan II </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo $prodi2->nama_prodi;?></td>
          </tr>
      </table>
       <p>ASAL INFORMASI PMB</p>
      <table width="100%" align="center" style="text-align:left">
         <tr>
              <th width="150" height="15">Nama</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->nama_informan; ?></td>              
          </tr>
          <tr>
              <th width="150" height="15">Nomor Hp</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->no_hp; ?></td>              
          </tr>
          <tr>
              <th width="150" height="15">Media informasi</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->media_info; ?></td>              
          </tr>
      </table>
      <p>IDENTITAS AYAH</p>
      <table width="100%" align="center" style="text-align:left">
          <tr>              
              <th width="150" height="15">NIK </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo $warga->nik_ayah; ?></td>
          </tr>
          <tr>              
              <th width="150" height="15">Nama Ayah </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo $warga->nama_ayah; ?></td>
          </tr>
           <tr>
              <th width="150" height="15">Tempat, Tanggal Lahir </th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->tmp_lahir_ayah.', '.tgl_indo1($warga->tgl_lahir_ayah); ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Alamat </th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->alamat_ayah; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Pekerjaan</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->pekerjaan_ayah; ?></td>              
          </tr>
          <tr>
              <th width="150" height="15">Pendidikan</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->pendidikan_ayah; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">No HP</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->hp_ayah; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">NPWP</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->npwp_ayah; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Penghasilan</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->penghasilan_ayah; ?></td>              
          </tr>
      </table>
      <p>IDENTITAS IBU</p>
      <table width="100%" align="center" style="text-align:left">
          <tr>              
              <th width="150" height="15">NIK </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo $warga->nik_ibu; ?></td>
          </tr>
          <tr>              
              <th width="150" height="15">Nama Ibu </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo $warga->nama_ibu; ?></td>
          </tr>
           <tr>
              <th width="150" height="15">Tempat, Tanggal Lahir </th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->tmp_lahir_ibu.', '.tgl_indo1($warga->tgl_lahir_ibu); ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Alamat </th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->alamat_ibu; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Pekerjaan</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->pekerjaan_ibu; ?></td>              
          </tr>
          <tr>
              <th width="150" height="15">Pendidikan</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->pendidikan_ibu; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">No HP</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->hp_ibu; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">NPWP</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->npwp_ibu; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Penghasilan</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->penghasilan_ibu; ?></td>              
          </tr>
      </table>
      <p>IDENTITAS WALI</p>
      <table width="100%" align="center" style="text-align:left">
          <tr>              
              <th width="150" height="15">NIK </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo $warga->nik_wali; ?></td>
          </tr>
          <tr>              
              <th width="150" height="15">Nama Wali </th>  <td width="10" style="text-align:center;">:</td>
              <td><?php echo $warga->nama_wali; ?></td>
          </tr>
           <tr>
              <th width="150" height="15">Tempat, Tanggal Lahir </th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->tmp_lahir_wali.', '.tgl_indo1($warga->tgl_lahir_wali); ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Alamat </th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->alamat_wali; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Pekerjaan</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->kerja_wali; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">No HP</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->hp_wali; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">NPWP</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->npwp_wali; ?></td>              
          </tr>
           <tr>
              <th width="150" height="15">Penghasilan</th> <td width="10" style="text-align:center;">:</td>
             <td><?php echo $warga->penghasil_wali; ?></td>              
          </tr>
      </table>
       <p>DAFTAR FILE YANG DIUPLOAD</p>
      <table class="tg">
<thead>
  <tr>
    <th class="tg-tysj">Nomor</th>
    <th class="tg-0lax">Nama File</th>
    <th class="tg-0lax">Status</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0lax">1</td>
    <td class="tg-0lax">Foto 4 x 6</td>
    <td class="tg-0lax">
        <?php if(!empty($warga->foto_upload)){ ?>
			<span>Diupload</span>
		<?php }else { ?>
			<span>Belum Diupload</span>
		<?php } ?>
    </td>
  </tr>
  <tr>
    <td class="tg-0lax">2</td>
    <td class="tg-0lax">Ijasah</td>
    <td class="tg-0lax">
         <?php if(!empty($warga->ijasah_upload)){ ?>
			<span>Diupload</span>
		<?php }else { ?>
			<span>Belum Diupload</span>
		<?php } ?>
    </td>
  </tr>
  <tr>
    <td class="tg-0lax">3</td>
    <td class="tg-0lax">Surat Keterangan Hasil Ujian (SKHU)</td>
    <td class="tg-0lax">
         <?php if(!empty($warga->skhu_upload)){ ?>
			<span>Diupload</span>
		<?php }else { ?>
			<span>Belum Diupload</span>
		<?php } ?>
    </td>
  </tr>
  <tr>
    <td class="tg-0lax">4</td>
    <td class="tg-0lax">Surat Keterangan Kelakuan Baik (SKKB)</td>
    <td class="tg-0lax">
         <?php if(!empty($warga->skkb_upload)){ ?>
			<span>Diupload</span>
		<?php }else { ?>
			<span>Belum Diupload</span>
		<?php } ?>
    </td>
  </tr>
  <tr>
    <td class="tg-0lax">5</td>
    <td class="tg-0lax">Kartu Keluarga</td>
    <td class="tg-0lax">
         <?php if(!empty($warga->kk_upload)){ ?>
			<span>Diupload</span>
		<?php }else { ?>
			<span>Belum Diupload</span>
		<?php } ?>
    </td>
  </tr>
  <tr>
    <td class="tg-0lax">6</td>
    <td class="tg-0lax">Surat Keterangan Lulus</td>
    <td class="tg-0lax">
         <?php if(!empty($warga->ket_lulus_upload)){ ?>
			<span>Diupload</span>
		<?php }else { ?>
			<span>Belum Diupload</span>
		<?php } ?>
    </td>
  </tr>
   <?php if($warga->jalur =="test") { ?>
  <tr>
    <td class="tg-0lax">7</td>
    <td class="tg-0lax">Bukti Pembayaran</td>
    <td class="tg-0lax">
         <?php if(!empty($warga->pembayaran_upload)){ ?>
			<span>Diupload</span>
		<?php }else { ?>
			<span>Belum Diupload</span>
		<?php } ?>
    </td>
  </tr>
   <?php } ?>
</tbody>
</table>
<?php if($warga->jalur =="prestasi") { ?>
 <p>DAFTAR FILE NILAI SEMESTER YANG DIUPLOAD</p>
      <table class="tg">
<thead>
  <tr>
    <th class="tg-tysj">Nomor</th>
    <th class="tg-0lax">Nama File</th>
    <th class="tg-0lax">Nilai</th>
    <th class="tg-0lax">Status</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0lax">1</td>
    <td class="tg-0lax">Nilai Semester I</td>
    <td class="tg-0lax"><?php if(!empty($warga->nilai_satu)) { echo $warga->nilai_satu; } ?></td>
    <td class="tg-0lax">
        <?php if(!empty($warga->semes_satu)){ ?>
			<span>Diupload</span>
		<?php }else { ?>
			<span>Belum Diupload</span>
		<?php } ?>
    </td>
  </tr>
   <tr>
    <td class="tg-0lax">2</td>
    <td class="tg-0lax">Nilai Semester II</td>
    <td class="tg-0lax"><?php if(!empty($warga->nilai_dua)) { echo $warga->nilai_dua; } ?></td>
    <td class="tg-0lax">
        <?php if(!empty($warga->semes_dua)){ ?>
			<span>Diupload</span>
		<?php }else { ?>
			<span>Belum Diupload</span>
		<?php } ?>
    </td>
  </tr>
   <tr>
    <td class="tg-0lax">3</td>
    <td class="tg-0lax">Nilai Semester III</td>
    <td class="tg-0lax"><?php if(!empty($warga->nilai_tiga)) { echo $warga->nilai_tiga; } ?></td>
    <td class="tg-0lax">
        <?php if(!empty($warga->semes_tiga)){ ?>
			<span>Diupload</span>
		<?php }else { ?>
			<span>Belum Diupload</span>
		<?php } ?>
    </td>
  </tr>
   <tr>
    <td class="tg-0lax">4</td>
    <td class="tg-0lax">Nilai Semester IV</td>
    <td class="tg-0lax"><?php if(!empty($warga->nilai_empat)) { echo $warga->nilai_empat; } ?></td>
    <td class="tg-0lax">
        <?php if(!empty($warga->semes_empat)){ ?>
			<span>Diupload</span>
		<?php }else { ?>
			<span>Belum Diupload</span>
		<?php } ?>
    </td>
  </tr>
   <tr>
    <td class="tg-0lax">5</td>
    <td class="tg-0lax">Nilai Semester V</td>
    <td class="tg-0lax"><?php if(!empty($warga->nilai_lima)) { echo $warga->nilai_lima; } ?></td>
    <td class="tg-0lax">
        <?php if(!empty($warga->semes_lima)){ ?>
			<span>Diupload</span>
		<?php }else { ?>
			<span>Belum Diupload</span>
		<?php } ?>
    </td>
  </tr>
  
</tbody>
</table>
 <?php } ?>
       </div>
   </body>
</html>
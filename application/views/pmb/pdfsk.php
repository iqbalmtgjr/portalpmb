<!DOCTYPE html>
<html>
   <head>
      <title><?php echo $title; ?></title>	 
     
      <style>
         body { font-family:'Times New Roman';  }
         table { font-size:12px; font-family:'Times New Roman'; }
         .header { width:100%; height:10%; font-weight:500;  }
         .big-title {  font-family:'Times New Roman'; font-size:12px letter-spacing:2px; word-spacing: 7px; font-weight:bold; }
		 .stt-title {  font-family:'Times New Roman'; font-size:12px; letter-spacing:1px; word-spacing: 3px; font-weight:bold; }
         .small-title {  font-family:'Times New Roman'; font-size:12px; letter-spacing:normal; text-transform: none; }
         .content { font-size:12px; font-family:'Times New Roman'; margin-top:20px;}
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
  font-family:Arial, sans-serif;font-size:12px;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{background-color:#f0f0f0;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
  font-family:Arial, sans-serif;font-size:12px;font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
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
		ol.k {list-style-type: lower-alpha;}
      </style>
   </head>
   <body style="margin: 30px;">
        <div class="wrapper">
      <div class="table">
          <div class="header" style="margin-bottom:-20px;">
            <img height="90" width="90"  style="float: left; padding-left: 30px; padding-top:-10px;" src="./assets/images/STKIP.jpg" alt="">
            <div class="stt-title text-center" style="padding-left: 10px;">PERKUMPULAN BADAN PENDIDIKAN KARYA BANGSA</div>
           <div class="stt-title text-center" style="padding-left: 10px;">STKIP PERSADA KHATULISTIWA SINTANG</div>
		   <div class="stt-title text-center" style="padding-left: 10px;">SINTANG - KALIMANTAN BARAT</div>
		   <div class=" small-title text-center"><i>Jln. Pertamina Sengkuang Km 4, Kotak Pos 126 Telp.(0564) 2022386, 2022387</i></div>
		   <div class=" small-title text-center" style="padding-left: 10px;">Email: persadakhatulistiwa.ac.id Website : https://persadakhatulistiwa.ac.id</div>
         </div>
         <hr style="width: 100%;">
      </div>
      <h5 class="stt-title text-center"><?php echo $title; ?></h5>
      <h5 class="stt-title text-center">Tentang</h5>
      <h5 class="stt-title text-center upper">
            PENETAPAN PENERIMAAN MAHASISWA BARU (PMB) <br>
            JALUR <?php if($this->input->get('filter_jalur') == 'test'){
                echo 'TES';
            }elseif($this->input->get('filter_jalur') == 'prestasi'){
                echo 'PRESTASI';
            }else{
                echo 'TES DAN PRESTASI';
            }
            ?> GELOMBANG 
        <?php 
        if($this->input->get('filter_gelombang') == '1'){
            echo 'I';
        } elseif($this->input->get('filter_gelombang') == '2'){
            echo 'II';
        } elseif($this->input->get('filter_gelombang') == '3') {
            echo 'III';
        } else{
            echo 'I, II, dan III';
        }
        ?> <br>
            PROGRAM STRATA SATU (S1)<br>
            SEKOLAH TINGGI ILMU KEGURUAN DAN ILMU PENDIDIKAN<br>
            PERSADA KHATULISTIWA SINTANG<br>
            TAHUN AKADEMIK <?= $tahun_akademik ?>
      </h5>
      <h5 class="stt-title text-center">KETUA STKIP PERSADA KHATULISTIWA SINTANG</h5>
      
<style type="text/css">
.tgg  {border-collapse:collapse;border-spacing:0;}
.tgg td{border-color:black;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tgg th{border-color:black;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tgg .tg-zp53{border-color:inherit;font-family:"Times New Roman", Times, serif !important;font-size:12px;text-align:justify;
  vertical-align:top}
</style>
<table class="tgg" style="undefined;table-layout: fixed; width: 100%">
<tbody>
  <tr>
    <th class="tg-zp53" style="width:20%">Menimbang</th>
    <th class="tg-zp53" style="width:4%">:</th>
    <th class="tg-zp53 text-justify" style="width:4%">1. </th>
    <th class="tg-zp53">Bahwa dengan berakhirnya pelaksanaan seleksi Penerimaan Mahasiswa Baru (PMB) Jalur <?php if($this->input->get('filter_jalur') == 'test'){
                echo 'Tes';
            }elseif($this->input->get('filter_jalur') == 'prestasi'){
                echo 'Prestasi';
            }else{echo 'Tes dan Prestasi';}?> Gelombang <?php 
        if($this->input->get('filter_gelombang') == '1'){
            echo 'I';
        } elseif($this->input->get('filter_gelombang') == '2'){
            echo 'II';
        } elseif($this->input->get('filter_gelombang') == '3') {
            echo 'III';
        } else {echo 'I, II, dan III';} ?> Program Strata Satu (S1) pada Sekolah Tinggi Keguruan dan Ilmu Pendidikan Persada Khatulistiwa Sintang Tahun Akademik  <?= $tahun_akademik ?>, maka dipandang perlu menetapkan hasil seleksi tersebut;</th>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">2.</td>
    <td class="tg-zp53">Bahwa peserta dengan nomor test sebagaimana tercantum dalam lampiran Surat Keputusan ini memenuhi syarat sebagai calon mahasiswa dan sudah mengikuti tes masuk maka dinyatakan LULUS Seleksi Penerimaan Mahasiswa Baru (PMB) Jalur Tes Gelombang I Program Strata Satu (S1) pada Sekolah Tinggi Keguruan dan Ilmu Pendidikan Persada Khatulistiwa Sintang Tahun Akademik <?= $tahun_akademik ?>;</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">3.</td>
    <td class="tg-zp53">Bahwa hasil seleksi tersebut, perlu ditetapkan dengan Surat Keputusan Ketua STKIP Persada Khatulistiwa Sintang.</td>
  </tr>
  <tr>
    <td class="tg-zp53">Mengingat</td>
    <td class="tg-zp53">:</td>
    <td class="tg-zp53">1.</td>
    <td class="tg-zp53">Undang-Undang Republik Indonesia Nomor 20 tahun 2003 tentang Sistem Pendidikan Nasional.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">2.</td>
    <td class="tg-zp53">Undang-Undang Republik Indonesia Nomor 12 Tahun 2012 tentang Pendidikan Tinggi.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">3.</td>
    <td class="tg-zp53">Peraturan Pemerintah Nomor 4 Tahun 2014 tentang Penyelenggaraan Pendidikan Tinggi dan Pengelolaan Perguruan Tinggi.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">4.</td>
    <td class="tg-zp53">Peraturan Menteri Pendidikan dan Kebudayaan Nomor 73 Tahun 2013 tentang Penyelenggaraan KKNI di Perguruan Tinggi.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">5.</td>
    <td class="tg-zp53">Peraturan Menteri Pendidikan dan Kebudayaan Republik Indonesia Nomor 3 Tahun 2020 tentang Standar Nasional Pendidikan Tinggi.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">6.</td>
    <td class="tg-zp53">Surat Keputusan Menteri Pendidikan Nasional&nbsp;&nbsp;Nomor:&nbsp;&nbsp;189/D/O/2006 tentang&nbsp;&nbsp;Ijin Penyelenggaraan Program-Program Studi&nbsp;&nbsp;dan Pendirian STKIP Persada Khatulistiwa Sintang Kalimantan Barat.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">7.</td>
    <td class="tg-zp53">Surat Keputusan Menteri Pendidikan Nasional&nbsp;&nbsp;Nomor:&nbsp;&nbsp;2455/D/T/2004 tentang&nbsp;&nbsp;Ijin Penyelenggaraan Program Studi&nbsp;&nbsp;Pendidikan Pancasila dan Kewarganegaraan pada STKIP Persada Khatulistiwa Sintang.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">8.</td>
    <td class="tg-zp53">Buku Pedoman Akademik STKIP Persada Khatulistiwa Sintang Tahun 2020.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">9.</td>
    <td class="tg-zp53">Statuta&nbsp;&nbsp;STKIP Persada Khatulistiwa Sintang Tahun 2020.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">a. Surat Keputusan BAN-PT Nomor: 1392/SK/BAN-PT/Akred/S/V/2019 tanggal 07 Mei 2019 tentang Akreditasi Program Studi Pendidikan Biologi pada STKIP Persada Khatulistiwa Sintang.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">b. Surat Keputusan BAN-PT Nomor : 3086/SK/BAN-PT/Akred/S/XII/2016 tanggal 20 Desember 2016 tentang Akreditasi Program Studi Pendidikan Bahasa dan Sastra Indonesia pada STKIP Persada Khatulistiwa Sintang.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">c. Surat Keputusan BAN-PT Nomor : 13052/SK/BAN-PT/Ak-PPJ/S/XII/2021 tanggal 14 Desember  2021 tentang Akreditasi Program Studi Pendidikan Ekonomi pada STKIP Persada Khatulistiwa Sintang.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">d. Surat Keputusan BAN-PT Nomor : 5556/SK/BAN-PT/Ak-PPJ/S/IX/2020 tanggal 15 September 2020  tentang Akreditasi Program Studi Pendidikan Pancasila dan Kewarganegaraan pada STKIP Persada Khatulistiwa Sintang.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">e. Surat Keputusan BAN-PT Nomor : 1405/SK/BAN-PT/Akred/S/V/2018 tanggal 30 Mei 2018 tentang Akreditasi Program Studi Pendidikan Guru Sekolah Dasar pada STKIP Persada Khatulistiwa Sintang.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">f. Surat Keputusan BAN-PT Nomor : 788/SK/BAN-PT/Akred/S/II/2021 tanggal 10 Februari 2021 tentang Akreditasi Program Studi Pendidikan Guru Pendidikan Anak Usia Dini pada STKIP Persada Khatulistiwa Sintang.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">g. Surat Keputusan BAN-PT BAN-PT No. 240/SK/BAN-PT/Akred/S/II/2019,tanggal 26 Februari 2019 tentang Akreditasi Program Studi Pendidikan Bahasa Inggris pada STKIP Persada Khatulistiwa Sintang.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">h. Surat Keputusan KEMENRISTEK DIKTI Nomor 659/KPT/I/2018 tanggal 14 Agustus 2018 tentang Izin Operasional Program Studi Pendidikan Matematika  pada STKIP Persada Khatulistiwa Sintang Terakreditasi BAN-PT.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">i. Surat Keputusan KEMENRISTEK DIKTI Nomor 659/KPT/I/2018 tanggal 14 Agustus 2018 tentang Izin Operasional Program Studi Pendidikan Komputer  pada STKIP Persada Khatulistiwa Sintang Terakreditasi BAN-PT.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">10.</td>
    <td class="tg-zp53">Buku Pedoman Akademik STKIP Persada Khatulistiwa Sintang Tahun Akademik 2021/2022.</td>
  </tr>
  <tr>
    <td class="tg-zp53"></td>
    <td class="tg-zp53"></td>
    <td class="tg-zp53">11.</td>
    <td class="tg-zp53">Statuta  STKIP Persada Khatulistiwa Sintang Tahun 2020</td>
  </tr>
  <tr>
    <td class="tg-zp53">Memperhatikan</td>
    <td class="tg-zp53">:</td>
    <td class="tg-zp53" colspan="2">Keputusan  hasil  rapat  Pimpinan dan Panitia Penerimaan Mahasiswa Baru (PMB) di lingkungan STKIP Persada Khatulistiwa Sintang yang dilaksanakan pada tanggal 5 September <?= $tahun_skrng ?>.</td>
  </tr>
</tbody>
</table>

<h5 class="stt-title text-center" style="padding-top: 300px">MEMUTUSKAN</h5>
<style type="text/css">
.tggg  {border-collapse:collapse;border-spacing:0;}
.tggg td{border-color:black;font-family:"Times New Roman", sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tggg th{border-color:black;font-family:"Times New Roman", sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tggg .tg-0lax{text-align:left;vertical-align:top; font-family:"Times New Roman", Times, serif !important;font-size:12px;text-align:justify;
  vertical-align:top}
</style>
<table class="tggg">
<!--<thead>-->
  <tr>
    <th class="tg-0lax">Menetapkan</th>
    <th class="tg-0lax">:</th>
    <th class="tg-0lax"></th>
  </tr>
<!--</thead>-->
<tbody>
  <tr>
    <td class="tg-0lax">Pertama</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax">Penerimaan Mahasiswa Baru (PMB) Jalur <?php if($this->input->get('filter_jalur') == 'test'){
                echo 'Tes';
            }elseif($this->input->get('filter_jalur') == 'prestasi'){
                echo 'Prestasi';
            }else{echo 'Tes dan Prestasi';}?> Gelombang <?php 
        if($this->input->get('filter_gelombang') == '1'){
            echo 'I';
        } elseif($this->input->get('filter_gelombang') == '2'){
            echo 'II';
        } elseif($this->input->get('filter_gelombang') == '3') {
            echo 'III';
        } else {echo 'I, II, dan III';} ?> Program Strata Satu (S1) pada Sekolah Tinggi Keguruan dan Ilmu Pendidikan Persada Khatulistiwa Sintang Tahun Akademik <?= $tahun_akademik ?>.</td>
  </tr>
  <tr>
    <td class="tg-0lax">Kedua</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax">Peserta dengan nomor Prestasit sebagaimana tercantum pada lampiran Surat Keputusan ini, yang dinyatakan LULUS Jalur <?php if($this->input->get('filter_jalur') == 'test'){
                echo 'Tes';
            }elseif($this->input->get('filter_jalur') == 'prestasi'){
                echo 'Prestasi';
            }else{echo 'Tes dan Prestasi';}?> Gelombang <?php 
        if($this->input->get('filter_gelombang') == '1'){
            echo 'I';
        } elseif($this->input->get('filter_gelombang') == '2'){
            echo 'II';
        } elseif($this->input->get('filter_gelombang') == '3') {
            echo 'III';
        } else{echo 'I, II, dan III';} ?>, 
        
        diwajibkan melakukan daftar ulang terdiri dari Biaya Registrasi (Rp. 1.580.000,00), 
        <?php if($this->input->get('filter_jalur') == 'prestasi') {?>
        Biaya Pengembangan Kampus (Rp. 3.600.000,00), 
        <?php }else{; ?>
        Biaya Pengembangan Kampus (Rp. 3.600.000,00), 
        <?php } ?>
        dan Biaya Kuliah (SPP Tetap Rp. 2.320.000,00/Semester) Biaya  waktu pembayaran mulai tanggal 
        <?php if($this->input->get('filter_gelombang') == '1'){ ?>
        <?= $jadwal_regis_gel1 ?>.</td> 
        <?php } elseif($this->input->get('filter_gelombang') == '2'){ ?>
        <?= $jadwal_regis_gel2 ?>.</td> 
        <?php } elseif($this->input->get('filter_gelombang') == '3'){ ?>
        <?= $jadwal_regis_gel3 ?>.</td> 
        <?php } else { ?>
        11 April - 7 September 2024
        <?php } ?>
  </tr>
  <tr>
    <td class="tg-0lax">Ketiga</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax">Peserta seleksi Penerimaan Mahasiswa Baru (PMB) Jalur <?php if($this->input->get('filter_jalur') == 'test'){
                echo 'Tes';
            }elseif($this->input->get('filter_jalur') == 'prestasi'){
                echo 'Prestasi';
            }else{echo 'Tes dan Prestasi';}?> Gelombang <?php 
        if($this->input->get('filter_gelombang') == '1'){
            echo 'I';
        } elseif($this->input->get('filter_gelombang') == '2'){
            echo 'II';
        } elseif($this->input->get('filter_gelombang') == '3') {
            echo 'III';
        } else{echo 'I, II, dan III';} ?> Program Strata Satu (S1) pada Sekolah Tinggi Keguruan dan Ilmu Pendidikan Persada Khatulistiwa Sintang Tahun Akademik <?= $tahun_akademik ?> yang dinyatakan LULUS dan telah melakukan daftar ulang diberi hak untuk mengikuti kegiatan perkuliahan pada program Strata Satu (S1) Tahun Akademik <?= $tahun_akademik ?>.</td>
  </tr>
  <tr>
    <td class="tg-0lax">Keempat</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax">Surat Keputusan ini mulai berlaku sejak tanggal ditetapkan dan apabila di kemudian hari terjadi kekeliruan akan diperbaiki dan disempurnakan sebagaimana mestinya.</td>
  </tr>
</tbody>
</table>

<table class="tggg" style="undefined;table-layout: fixed; width: 100%; padding-top: 40px">
  <tr>
    <td class="tg-0lax" style="width:60%"></td>
    <td class="tg-0lax">Ditetapkan di            :<br>Pada Tanggal           :<br>Ketua STKIP Persada Khatulistiwa Sintang<br><br><br><br><br><span style="font-weight:bold;text-decoration:underline">Didin Syafruddin., S.P., M.Si.</span><br>NIDN. 1102066603<br></td>
  </tr>
</table>

<p style="padding-top: 80px;text-align:left;vertical-align:top; font-family:'Times New Roman', Times, serif !important;font-size:8px;text-align:justify;
  vertical-align:top">
    <u><i>TEMBUSAN DISAMPAIKAN KEPADA YTH :</i></u> <br>
    <i>1.	Kepala LLDIKTI Wilayah XI  Kalimantan di Banjarmasin</i> <br>
    <i>2.	Ketua Perkumpulan Badan Pendidikan Karya Bangsa Sintang di Sintang</i><br>
    <i>3.	Wakil  Ketua Bidang Akademik STKIP Persada Khatulistiwa Sintang di Sintang</i><br>
    <i>4.	Wakil  Ketua Bidang Non-Akademik STKIP Persada Khatulistiwa Sintang di Sintang</i><br>
   <i> 5.	Ketua Program Studi di STKIP Persada Khatulistiwa Sintang</i><br>
   <i> 6.	Arsip</i>
</p>

<table class="tggg" style="undefined;table-layout: fixed; width: 100%; padding-top: 300px">
  <tr>
    <th class="tg-0lax" width=12%>Lampiran</th>
    <th class="tg-0lax" width=2%>:<br></th>
    <th class="tg-0lax">Surat Keputusan Ketua STKIP Persada Khatulistiwa Sintang</th>
  </tr>
<tbody>
  <tr>
    <td class="tg-0lax">Nomor</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">Tanggal</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">Tentang</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax">Penetapan Penerimaan Mahasiswa Baru (PMB) Jalur <?php if($this->input->get('filter_jalur') == 'test'){
                echo 'Tes';
            }elseif($this->input->get('filter_jalur') == 'prestasi'){
                echo 'Prestasi';
            }?> Gelombang <?php 
        if($this->input->get('filter_gelombang') == '1'){
            echo 'I';
        } elseif($this->input->get('filter_gelombang') == '2'){
            echo 'II';
        } elseif($this->input->get('filter_gelombang') == '3') {
            echo 'III';
        } else {echo 'I, II, dan III';} ?> Program Strata Satu (S1) pada Sekolah Tinggi Keguruan dan Ilmu Pendidikan Persada Khatulistiwa Sintang Tahun Akademik <?= $tahun_akademik ?>.</td>
  </tr>
</tbody>
</table>

<h5 class="stt-title text-center upper">
    PENETAPAN PENERIMAAN MAHASISWA BARU (PMB) <br>
    JALUR <?php if($this->input->get('filter_jalur') == 'test'){
                echo 'Tes';
            }elseif($this->input->get('filter_jalur') == 'test'){
                echo 'Prestasi';
            }else {echo 'Tes dan Prestasi';}?> Gelombang <?php 
        if($this->input->get('filter_gelombang') == '1'){
            echo 'I';
        } elseif($this->input->get('filter_gelombang') == '2'){
            echo 'II';
        } elseif($this->input->get('filter_gelombang') == '3') {
            echo 'III';
        } else {echo 'I, II, dan III';} ?> <br>
    PROGRAM STRATA SATU (S1) <br>
    SEKOLAH TINGGI ILMU KEGURUAN DAN ILMU PENDIDIKAN <br>
    PERSADA KHATULISTIWA SINTANG <br>
    TAHUN AKADEMIK <?= $tahun_akademik ?> <br><br>

KETUA STKIP PERSADA KHATULISTIWA SINTANG
</h5>

<!--Bhs Indonesia-->
<h5 class="stt-title">a.  Program Studi Pendidikan Bahasa dan Sastra Indonesia</h5>
<?php $si = 1; ?>
<table class="tg" style="margin-left:auto;margin-right:auto" border="1">>
<thead>
  <tr>
    <th style="text-align: center;">No.</th>
    <th style="text-align: center;">Nomor Pendaftaran</th>
    <th style="text-align: center;">Nama</th>
    <th style="text-align: center;">Status Penerimaan</th>
    <th style="text-align: center;">Lulus Pada Prodi</th>
  </tr>
</thead>
<tbody>
<?php    
    if(is_array($pbsi)){
    foreach($pbsi as $pbsi){ 
  echo "<tr>";
   echo '<td class="tg-0lax">'.$si++.'</td>';
   echo '<td class="tg-0lax">'.$pbsi->ref.'</td>';
   $kata="$pbsi->nama_siswa";
   $kecil=strtolower($kata);
   echo '<td class="tg-0lax">'.ucwords($kecil).'</td>';
   echo '<td class="tg-0lax">'.$pbsi->keputusan_text.'</td>';
   echo '<td class="tg-0lax">'.$pbsi->nama_prodi.'</td>';
  echo "</tr>";
   } 
    }  else {
    echo "<tr>";
    echo '<td colspan="5" class="tg-0lax" style="text-align: center;">Tidak Ada Data Mahasiswa</td>';
    echo "</tr>";
    }
?>
</tbody>
</table>

<!--Matematika-->
<h5 class="stt-title">b.  Program Studi Pendidikan Matematika</h5>
<?php $si = 1; ?>
<table class="tg" style="margin-left:auto;margin-right:auto" border="1">>
<thead>
  <tr>
    <th style="text-align: center;">No.</th>
    <th style="text-align: center;">Nomor Pendaftaran</th>
    <th style="text-align: center;">Nama</th>
    <th style="text-align: center;">Status Penerimaan</th>
    <th style="text-align: center;">Lulus Pada Prodi</th>
  </tr>
</thead>
<tbody>
<?php    
    if(is_array($mat)){
    foreach($mat as $mat){ 
  echo "<tr>";
   echo '<td class="tg-0lax">'.$si++.'</td>';
   echo '<td class="tg-0lax">'.$mat->ref.'</td>';
   $kata="$mat->nama_siswa";
   $kecil=strtolower($kata);
   echo '<td class="tg-0lax">'.ucwords($kecil).'</td>';
   echo '<td class="tg-0lax">'.$mat->keputusan_text.'</td>';
   echo '<td class="tg-0lax">'.$mat->nama_prodi.'</td>';
  echo "</tr>";
   } 
    } else {
    echo "<tr>";
    echo '<td colspan="5" class="tg-0lax" style="text-align: center;">Tidak Ada Data Mahasiswa</td>';
    echo "</tr>";
    }
?>
</tbody>
</table>

<!--Ekonomi-->
<h5 class="stt-title">c.  Program Studi Pendidikan Ekonomi</h5>
<?php $si = 1; ?>
<table class="tg" style="margin-left:auto;margin-right:auto" border="1">>
<thead>
  <tr>
    <th style="text-align: center;">No.</th>
    <th style="text-align: center;">Nomor Pendaftaran</th>
    <th style="text-align: center;">Nama</th>
    <th style="text-align: center;">Status Penerimaan</th>
    <th style="text-align: center;">Lulus Pada Prodi</th>
  </tr>
</thead>
<tbody>
<?php    
    if(is_array($ekonomi)){
    foreach($ekonomi as $ekonomi){ 
  echo "<tr>";
   echo '<td class="tg-0lax">'.$si++.'</td>';
   echo '<td class="tg-0lax">'.$ekonomi->ref.'</td>';
   $kata="$ekonomi->nama_siswa";
   $kecil=strtolower($kata);
   echo '<td class="tg-0lax">'.ucwords($kecil).'</td>';
   echo '<td class="tg-0lax">'.$ekonomi->keputusan_text.'</td>';
   echo '<td class="tg-0lax">'.$ekonomi->nama_prodi.'</td>';
  echo "</tr>";
   } 
    }  else {
    echo "<tr>";
    echo '<td colspan="5" class="tg-0lax" style="text-align: center;">Tidak Ada Data Mahasiswa</td>';
    echo "</tr>";
    }
?>
</tbody>
</table>

<!--PPKN-->
<h5 class="stt-title">d.  Program Studi Pendidikan Pancasila dan Kewarganegaraan</h5>
<?php $si = 1; ?>
<table class="tg" style="margin-left:auto;margin-right:auto" border="1">>
<thead>
  <tr>
    <th style="text-align: center;">No.</th>
    <th style="text-align: center;">Nomor Pendaftaran</th>
    <th style="text-align: center;">Nama</th>
    <th style="text-align: center;">Status Penerimaan</th>
    <th style="text-align: center;">Lulus Pada Prodi</th>
  </tr>
</thead>
<tbody>
    <?php    
    if(is_array($ppkn)){
    foreach($ppkn as $ppkn){ 
  echo "<tr>";
   echo '<td class="tg-0lax">'.$si++.'</td>';
   echo '<td class="tg-0lax">'.$ppkn->ref.'</td>';
   $kata="$ppkn->nama_siswa";
   $kecil=strtolower($kata);
   echo '<td class="tg-0lax">'.ucwords($kecil).'</td>';
   echo '<td class="tg-0lax">'.$ppkn->keputusan_text.'</td>';
   echo '<td class="tg-0lax">'.$ppkn->nama_prodi.'</td>';
  echo "</tr>";
   } 
    }  else {
    echo "<tr>";
    echo '<td colspan="5" class="tg-0lax" style="text-align: center;">Tidak Ada Data Mahasiswa</td>';
    echo "</tr>";
    }
?>
</tbody>
</table>

<!--Komputer-->
<h5 class="stt-title">e.  Program Studi Pendidikan Komputer</h5>
<?php $si = 1; ?>
<table class="tg" style="margin-left:auto;margin-right:auto" border="1">>
<thead>
  <tr>
    <th style="text-align: center;">No.</th>
    <th style="text-align: center;">Nomor Pendaftaran</th>
    <th style="text-align: center;">Nama</th>
    <th style="text-align: center;">Status Penerimaan</th>
    <th style="text-align: center;">Lulus Pada Prodi</th>
  </tr>
</thead>
<tbody>
    <?php    
    if(is_array($komputer)){
    foreach($komputer as $komputer){ 
  echo "<tr>";
   echo '<td class="tg-0lax">'.$si++.'</td>';
   echo '<td class="tg-0lax">'.$komputer->ref.'</td>';
   $kata="$komputer->nama_siswa";
   $kecil=strtolower($kata);
   echo '<td class="tg-0lax">'.ucwords($kecil).'</td>';
   echo '<td class="tg-0lax">'.$komputer->keputusan_text.'</td>';
   echo '<td class="tg-0lax">'.$komputer->nama_prodi.'</td>';
  echo "</tr>";
   } 
    }  else {
    echo "<tr>";
    echo '<td colspan="5" class="tg-0lax" style="text-align: center;">Tidak Ada Data Mahasiswa</td>';
    echo "</tr>";
    }
?>
</tbody>
</table>

<!--Biologi-->
<h5 class="stt-title">f.  Program Studi Pendidikan Biologi</h5>
<?php $si = 1; ?>
<table class="tg" style="margin-left:auto;margin-right:auto" border="1">>
<thead>
  <tr>
    <th style="text-align: center;">No.</th>
    <th style="text-align: center;">Nomor Pendaftaran</th>
    <th style="text-align: center;">Nama</th>
    <th style="text-align: center;">Status Penerimaan</th>
    <th style="text-align: center;">Lulus Pada Prodi</th>
  </tr>
</thead>
<tbody>
    <?php    
    if(is_array($biologi)){
    foreach($biologi as $biologi){ 
  echo "<tr>";
   echo '<td class="tg-0lax">'.$si++.'</td>';
   echo '<td class="tg-0lax">'.$biologi->ref.'</td>';
   $kata="$biologi->nama_siswa";
   $kecil=strtolower($kata);
   echo '<td class="tg-0lax">'.ucwords($kecil).'</td>';
   echo '<td class="tg-0lax">'.$biologi->keputusan_text.'</td>';
   echo '<td class="tg-0lax">'.$biologi->nama_prodi.'</td>';
  echo "</tr>";
   } 
    }  else {
    echo "<tr>";
    echo '<td colspan="5" class="tg-0lax" style="text-align: center;">Tidak Ada Data Mahasiswa</td>';
    echo "</tr>";
    }
?>
</tbody>
</table>

<!--Paud-->
<h5 class="stt-title">g.  Program Studi Pendidikan Anak Usia Dini</h5>
<?php $si = 1; ?>
<table class="tg" style="margin-left:auto;margin-right:auto" border="1">>
<thead>
  <tr>
    <th style="text-align: center;">No.</th>
    <th style="text-align: center;">Nomor Pendaftaran</th>
    <th style="text-align: center;">Nama</th>
    <th style="text-align: center;">Status Penerimaan</th>
    <th style="text-align: center;">Lulus Pada Prodi</th>
  </tr>
</thead>
<tbody>
    <?php    
    if(is_array($paud)){
    foreach($paud as $paud){ 
  echo "<tr>";
   echo '<td class="tg-0lax">'.$si++.'</td>';
   echo '<td class="tg-0lax">'.$paud->ref.'</td>';
   $kata="$paud->nama_siswa";
   $kecil=strtolower($kata);
   echo '<td class="tg-0lax">'.ucwords($kecil).'</td>';
   echo '<td class="tg-0lax">'.$paud->keputusan_text.'</td>';
   echo '<td class="tg-0lax">'.$paud->nama_prodi.'</td>';
  echo "</tr>";
   } 
    }  else {
    echo "<tr>";
    echo '<td colspan="5" class="tg-0lax" style="text-align: center;">Tidak Ada Data Mahasiswa</td>';
    echo "</tr>";
    }
?>
</tbody>
</table>

<!--Bhs Inggris-->
<h5 class="stt-title">H.  Program Studi Pendidikan Bahasa Inggris</h5>
<?php $si = 1; ?>
<table class="tg" style="margin-left:auto;margin-right:auto" border="1">>
<thead>
  <tr>
    <th style="text-align: center;">No.</th>
    <th style="text-align: center;">Nomor Pendaftaran</th>
    <th style="text-align: center;">Nama</th>
    <th style="text-align: center;">Status Penerimaan</th>
    <th style="text-align: center;">Lulus Pada Prodi</th>
  </tr>
</thead>
<tbody>
    <?php    
    if(is_array($inggris)){
    foreach($inggris as $inggris){ 
  echo "<tr>";
   echo '<td class="tg-0lax">'.$si++.'</td>';
   echo '<td class="tg-0lax">'.$inggris->ref.'</td>';
   $kata="$inggris->nama_siswa";
   $kecil=strtolower($kata);
   echo '<td class="tg-0lax">'.ucwords($kecil).'</td>';
   echo '<td class="tg-0lax">'.$inggris->keputusan_text.'</td>';
   echo '<td class="tg-0lax">'.$inggris->nama_prodi.'</td>';
  echo "</tr>";
   } 
    }  else {
    echo "<tr>";
    echo '<td colspan="5" class="tg-0lax" style="text-align: center;">Tidak Ada Data Mahasiswa</td>';
    echo "</tr>";
    }
?>
</tbody>
</table>

<!--PGSD-->
<h5 class="stt-title">i.  Program Studi Pendidikan Guru Sekolah Dasar</h5>
<?php $si = 1; ?>
<table class="tg" style="margin-left:auto;margin-right:auto" border="1">>
<thead>
  <tr>
    <th style="text-align: center;">No.</th>
    <th style="text-align: center;">Nomor Pendaftaran</th>
    <th style="text-align: center;">Nama</th>
    <th style="text-align: center;">Status Penerimaan</th>
    <th style="text-align: center;">Lulus Pada Prodi</th>
  </tr>
</thead>
<tbody>
    <?php    
    if(is_array($pgsd)){
    foreach($pgsd as $pgsd){ 
  echo "<tr>";
   echo '<td class="tg-0lax">'.$si++.'</td>';
   echo '<td class="tg-0lax">'.$pgsd->ref.'</td>';
   $kata="$pgsd->nama_siswa";
   $kecil=strtolower($kata);
   echo '<td class="tg-0lax">'.ucwords($kecil).'</td>';
   echo '<td class="tg-0lax">'.$pgsd->keputusan_text.'</td>';
   echo '<td class="tg-0lax">'.$pgsd->nama_prodi.'</td>';
  echo "</tr>";
   } 
    }  else {
    echo "<tr>";
    echo '<td colspan="5" class="tg-0lax" style="text-align: center;">Tidak Ada Data Mahasiswa</td>';
    echo "</tr>";
    }
?>
</tbody>
</table>

<table class="tggg" style="undefined;table-layout: fixed; width: 100%; padding-top: 40px">
  <tr>
    <td class="tg-0lax" style="width:60%"></td>
    <td class="tg-0lax">Ditetapkan di            :<br>Pada Tanggal           :<br>Ketua STKIP Persada Khatulistiwa Sintang<br><br><br><br><br><span style="font-weight:bold;text-decoration:underline">Didin Syafruddin., S.P., M.Si.</span><br>NIDN. 1102066603<br></td>
  </tr>
</table>

<p style="padding-top: 80px;text-align:left;vertical-align:top; font-family:'Times New Roman', Times, serif !important;font-size:8px;text-align:justify;
  vertical-align:top">
    <u><i>TEMBUSAN DISAMPAIKAN KEPADA YTH :</i></u> <br>
    <i>1.	Kepala LLDIKTI Wilayah XI  Kalimantan di Banjarmasin</i> <br>
    <i>2.	Ketua Perkumpulan Badan Pendidikan Karya Bangsa Sintang di Sintang</i><br>
    <i>3.	Wakil  Ketua Bidang Akademik STKIP Persada Khatulistiwa Sintang di Sintang</i><br>
    <i>4.	Wakil  Ketua Bidang Non-Akademik STKIP Persada Khatulistiwa Sintang di Sintang</i><br>
   <i> 5.	Ketua Program Studi di STKIP Persada Khatulistiwa Sintang</i><br>
   <i> 6.	Arsip</i>
</p>
       </div>
   </body>
</html>
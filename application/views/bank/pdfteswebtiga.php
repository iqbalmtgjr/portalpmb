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
		   <div class=" small-title text-center" style="margin-left: 90px;">Email: stkippersada@gmail.com Website : https://persadakhatulistiwa.ac.id</div>
         </div>
         <hr style="width: 100%;">
      </div>
   
   
      <h4 class="upper text-center"><?php echo $title; ?></h4>
      
<?php $si = 1; ?>
      
      <table class="tg">
<thead>
  <tr>
    <th class="tg-tysj">Nomor</th>
    <th class="tg-0lax">No. Pendaftaran</th>
    <th class="tg-0lax">Nama</th>
    <th class="tg-0lax">Status Penerimaan</th>
    <th class="tg-0lax">Prodi</th>
  </tr>
</thead>
<tbody>
    <?php foreach($warga as $warga){ ?>
  <tr>
    <td class="tg-0lax"><?php echo $si++; ?>.</td>
    <td class="tg-0lax"><?php echo $warga->ref; ?></td>
    <td class="tg-0lax"><?php echo $warga->nama_siswa; ?></td>
    <td class="tg-0lax"><?php if($warga->status_penerimaan == "1") {echo "LULUS"; }else {echo "TIDAK LULUS";} ?></td>
    <td class="tg-0lax"><?php echo $warga->nama_prodip; ?></td>
  </tr>
  <?php } ?>
</tbody>
</table>

       </div>
   </body>
</html>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Wrapper. Contains page content -->
<script src="https://code.highcharts.com/es5/highcharts.js"></script>
<script src="https://code.highcharts.com/es5/modules/exporting.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
           
<div class="breadcrumb float-sm-right">
               <?php
date_default_timezone_set("Asia/Jakarta");


?>
<script>
function display_ct7() {
    var x = new Date()
    
    // date part ///
var month=x.getMonth()+1;
var day=x.getDate();
var year=x.getFullYear();
if (month <10 ){month='0' + month;}
if (day <10 ){day='0' + day;}
var x3= day+'-'+month+'-'+year;

// time part //
var hour=x.getHours();
var minute=x.getMinutes();
var second=x.getSeconds();
if(hour <10 ){hour='0'+hour;}
if(minute <10 ) {minute='0' + minute; }
if(second<10){second='0' + second;}
var x3 ='Sintang, '+ x3 + ' Jam ' +  hour+':'+minute+':'+second
    
    document.getElementById('ct7').innerHTML = x3;
    display_c7();
 }
 function display_c7(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct7()',refresh)
}
display_c7()
</script>
<span id='ct7' class="text-cyan"></span>  
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
            <?php echo $this->session->flashdata('pesan'); ?>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $valtes ?></h3>

                <p>Jalur Tes Valid</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="<?= base_url() ?>masterpmb/testvalid.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $valpres ?></h3>

                <p>Jalur Prestasi Valid</p>
              </div>
              <div class="icon">
                <i class="ion ion-trophy"></i>
              </div>
              <a href="<?= base_url() ?>masterpmb/prestasivalid.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $valdua ?></h3>

                <p>Jalur Reguler 2 Valid</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url() ?>masterpmb/reguler2valid.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $regis ?></h3>

                <p>Maba Teregistrasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url() ?>bank/regis.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="card">
                <div class="card-header">
                    <p class="card-title">PMB 2023</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                              <th scope="col" class="text-center">No.</th>
                              <th scope="col">Program Studi</th>
                              <th scope="col" class="text-center">Tes dan Prestasi Valid</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $jum = 0;
                            $no = 1;
                            foreach($prod as $hita) {
                            ?>  
                            <tr>
                              <th scope="row" class="text-center"><?= $no ?></th>
                              <td><?= $hita->nama_prodi ?></td>
                              <td class="text-center"><?php $jum += $hita->babu; echo $hita->babu; ?></td>
                            </tr>
                             <?php
                             $no ++;
                             } ?> 
                             <tr>
                                 <td colspan="2"><strong>Jumlah</strong></td>
                                 <td class="text-center"><strong><?php $tol1 = $jum; echo $jum; ?></strong></td>
                             </tr>
                          </tbody>
                        </table>
                   </div>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                              <th scope="col" class="text-center">No.</th>
                              <th scope="col">Program Studi</th>
                              <th scope="col" class="text-center">Reguler 2 Valid</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $jum = 0;
                            $no = 1;
                            foreach($prod2 as $hita) {
                            ?>  
                            <tr>
                              <th scope="row" class="text-center"><?= $no ?></th>
                              <td><?= $hita->nama_prodi ?></td>
                              <td class="text-center"><?php $jum += $hita->babu; echo $hita->babu; ?></td>
                            </tr>
                             <?php
                             $no ++;
                             } ?> 
                             <tr>
                                 <td colspan="2"><strong>Jumlah</strong></td>
                                 <td class="text-center"><strong><?php $tol2 = $jum; echo $jum; ?></strong></td>
                             </tr>
                          </tbody>
                        </table>
                   </div>
                   <h3 class="text-danger">Total Pendaftar Valid PMB 2023 : <?= $tol1 + $tol2 ?></h3>
                   
                 <div class="card-body">
                    <div class="row">
                        <div id="lingkaran" style="width:100%; height:400px;"></div>
                    </div>
                 </div>
             
                   
                   <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                      <tr>
                        <th class="text-center">Nomor</th>
                        <th>Prodi</th>
                        <th>MABA Regis</th>
                        <th>Target Kelas</th>
                        <th>MABA/Kelas</th>
                        <th>Total</th>
                        <th>Kekurangan</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $so = 1; ?>
                        <tr>
                            <td class="text-center"><?php echo $so++; ?></td>
                            <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                            <td><?php echo $pbsi; ?></td>
                            <td><?php $kelas1 = 1; echo $kelas1; ?></td>
                            <td>40</td>
                            <td>40</td>
                            <td><?php $pbsi_kurang = 40 - $pbsi; echo $pbsi_kurang;  ?></td>
                        </tr>
                        <tr>
                            <td class="text-center"><?php echo $so++; ?></td>
                            <td>Pendidikan Matematika</td>
                            <td><?php echo $pmat; ?></td>
                            <td><?php $kelas2 = 1; echo $kelas2; ?></td>
                            <td>40</td>
                            <td>40</td>
                            <td><?php $pmat_kurang = 40 - $pmat; echo $pmat_kurang;  ?></td>
                        </tr>
                        <tr>
                            <td class="text-center"><?php echo $so++; ?></td>
                            <td class="tg-0lax">Pendidikan Ekonomi</td>
                            <td class="tg-0lax"><?php echo $pek; ?></td>
                            <td class="tg-0lax"><?php $kelas3 = 1; echo $kelas3; ?></td>
                            <td class="tg-0lax">40</td>
                            <td class="tg-0lax">40</td>
                            <td class="tg-0lax"><?php $pek_kurang = 40 - $pek; echo $pek_kurang;  ?></td>
                         </tr>
                          <tr>
                             <td class="text-center"><?php echo $so++; ?></td>
                              <td class="tg-0lax">Pendidikan Pancasila dan Kewarganegaraan</td>
                               <td class="tg-0lax"><?php echo $pkn; ?></td>
                                <td class="tg-0lax"><?php $kelas4 = 1; echo $kelas4; ?></td>
                                 <td class="tg-0lax">40</td>
                                 <td class="tg-0lax">40</td>
                                 <td class="tg-0lax"><?php $pkn_kurang = 40 - $pkn; echo $pkn_kurang;  ?></td>
                         </tr>
                          <tr>
                             <td class="text-center"><?php echo $so++; ?></td>
                              <td class="tg-0lax">Pendidikan Komputer</td>
                               <td class="tg-0lax"><?php echo $pkom; ?></td>
                                <td class="tg-0lax"><?php $kelas5 = 1; echo $kelas5; ?></td>
                                 <td class="tg-0lax">40</td>
                                 <td class="tg-0lax">40</td>
                                 <td class="tg-0lax"><?php $pkom_kurang = 40 - $pkom; echo $pkom_kurang;  ?></td>
                         </tr>
                          <tr>
                             <td class="text-center"><?php echo $so++; ?></td>
                              <td class="tg-0lax">Pendidikan Biologi</td>
                               <td class="tg-0lax"><?php echo $pbio; ?></td>
                                <td class="tg-0lax"><?php $kelas6 = 1; echo $kelas6; ?></td>
                                 <td class="tg-0lax">40</td>
                                 <td class="tg-0lax">40</td>
                                 <td class="tg-0lax"><?php $pbio_kurang = 40 - $pbio; echo $pbio_kurang;  ?></td>
                         </tr>
                          <tr>
                             <td class="text-center"><?php echo $so++; ?></td>
                              <td class="tg-0lax">Pendidikan Anak Usia Dini</td>
                               <td class="tg-0lax"><?php echo $paud; ?></td>
                                <td class="tg-0lax"><?php $kelas7 = 1; echo $kelas7; ?></td>
                                 <td class="tg-0lax">40</td>
                                 <td class="tg-0lax">40</td>
                                 <td class="tg-0lax"><?php $paud_kurang = 40 - $paud; echo $paud_kurang;  ?></td>
                         </tr>
                          <tr>
                             <td class="text-center"><?php echo $so++; ?></td>
                              <td class="tg-0lax">Pendidikan Bahasa Inggris</td>
                               <td class="tg-0lax"><?php echo $pbi; ?></td>
                                <td class="tg-0lax"><?php $kelas8 = 1; echo $kelas8; ?></td>
                                 <td class="tg-0lax">40</td>
                                 <td class="tg-0lax">40</td>
                                 <td class="tg-0lax"><?php $pbi_kurang = 40 - $pbi; echo $pbi_kurang;  ?></td>
                         </tr>
                          <tr>
                             <td class="text-center"><?php echo $so++; ?></td>
                              <td class="tg-0lax">Pendidikan Guru Sekolah Dasar</td>
                               <td class="tg-0lax"><?php echo $pgsd; ?></td>
                                <td class="tg-0lax"><?php $kelas9 = 6; echo $kelas9; ?></td>
                                 <td class="tg-0lax">40</td>
                                 <td class="tg-0lax">240</td>
                                 <td class="tg-0lax"><?php $pgsd_kurang = 240 - $pgsd; echo $pgsd_kurang;  ?></td>
                         </tr>
                         <tr>
                            <td class="tg-0lax" colspan="2">Jumlah Total</td>
                            <td class="tg-0lax"><?php $total_maba = $pgsd + $pbi + $paud + $pbio + $pkom + $pkn + $pek + $pmat + $pbsi; echo $total_maba; ?></td>
                            <td class="tg-0lax"><?php $totalkelas = $kelas1 + $kelas2 + $kelas3 + $kelas4 + $kelas5 + $kelas6 + $kelas7 + $kelas8 + $kelas9; echo $totalkelas;  ?></td>
                            <td class="tg-0lax"></td>
                            <td class="tg-0lax">560</td>
                            <td class="tg-0lax"><?php $total_kurang = $pgsd_kurang + $pbi_kurang + $paud_kurang + $pbio_kurang + $pkom_kurang + $pkn_kurang + $pek_kurang + $pmat_kurang + $pbsi_kurang; echo $total_kurang; ?></td>
                      </tr>
                    </tbody>
                    </table>
                     </div>
                </div>
        </div>
            <div class="card">
                <div class="card-header">
                    <p class="card-title">PMB 2023</p>
                </div>
                <div class="card-body">
                    <div class="row">
                <div id="container1" style="width:100%; height:400px;"></div>
            </div>
                </div>
            </div>
            
            
        </div>
        
        <div class="container-fluid">
             <div class="card">
                 <div class="card-header">
                    <p class="card-title">PMB 2022</p>
                </div>
                 <div class="card-body">
                    <div class="row">
                        <div id="container2" style="width:100%; height:400px;"></div>
                    </div>
                 </div>
             </div>
        </div>
        <div class="container-fluid">
             <div class="card">
                 <div class="card-header">
                    <p class="card-title">PMB 2021</p>
                </div>
                 <div class="card-body">
            <div class="row">
                <div id="container3" style="width:100%; height:400px;"></div>
            </div>
            </div>
        </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    // Data retrieved https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature
    Highcharts.chart('container1', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Pendaftar PMB 2023'
        },
        xAxis: {
            categories: <?= $bul3 ?>
        },
        yAxis: {
            title: {
                text: 'Pendaftar PMB'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Tahun 2023',
            data: <?= $ang3 ?>
        }]
    });
    Highcharts.chart('container2', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Pendaftar PMB 2022'
        },
        xAxis: {
            categories: <?= $bul2 ?>
        },
        yAxis: {
            title: {
                text: 'Pendaftar PMB'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Tahun 2022',
            data: <?= $ang2 ?>
        }]
    });
    Highcharts.chart('container3', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Pendaftar PMB 2021'
        },
        xAxis: {
            categories: <?= $bul1 ?>
        },
        yAxis: {
            title: {
                text: 'Pendaftar PMB'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Tahun 2021',
            data: <?= $ang1 ?>
        }]
    });
    // Data retrieved from https://netmarketshare.com/
// Build the chart
Highcharts.chart('lingkaran', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Pendaftar Valid Per Gelombang PMB 2023',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y} orang</b>'
    },
    accessibility: {
        point: {
            valueSuffix: 'orang'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Pendaftar Valid',
        colorByPoint: true,
        data: [{
            name: 'Gelombang I',
            y: <?= $gel1 ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Gelombang II',
            y: <?= $gel2 ?>
        },  {
            name: 'Gelombang III',
            y: <?= $gel3 ?>
        }]
    }]
});
</script>
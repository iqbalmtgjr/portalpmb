<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Angket | Mahasiswa</title>

  
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?php echo base_url(); ?>index3.html" class="navbar-brand">
        <img src="<?php echo base_url(); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">STKIP Persada Khatulistiwa</span>
      </a>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark text-center"> Angket Visi & Misi Semester Ganjil 2021/2022</h1>
             <h2 class="m-0 text-dark text-center"> Untuk Mahasiswa</h2>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
           <div class="row">
                <div class="col-sm-12">
               <div class="card">
                   <?php echo form_open(current_url(),'class="form-horizontal"'); ?>
              <div class="card-body">
               <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th rowspan="2" class="align-middle text-center" style="width: 10px">No</th>
                      <th rowspan="2" class="align-middle text-center" >Komponen Yang Dinilai</th>
                      <th colspan="4" class="align-middle text-center">Skala</th>
                    </tr>
                    <tr>
                      <th style="width: 40px">SS</th>
                      <th style="width: 40px">S</th>
                      <th style="width: 40px">TS</th>
                      <th style="width: 40px">STS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Saya mengetahui Visi dan Misi STKIP Persada Khatulistiwa Sintang <?php echo form_error('r1'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary1" name="r1" value="4"><label for="radioPrimary1"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary2" name="r1" value="3"><label for="radioPrimary2"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary3" name="r1" value="2"><label for="radioPrimary3"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary4" name="r1" value="1"><label for="radioPrimary4"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>2.</td>
                      <td>Saya memahami makna  Visi dan Misi STKIP Persada Khatulistiwa Sintang <?php echo form_error('r2'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary5" name="r2" value="4"><label for="radioPrimary5"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary6" name="r2" value="3"><label for="radioPrimary6"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary7" name="r2" value="2"><label for="radioPrimary7"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary8" name="r2" value="1"><label for="radioPrimary8"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>3.</td>
                      <td>Saya memahami bahwa Visi dan Misi STKIP Persada Khatulistiwa Sintang menjadi cita-cita seluruh warga kampus <?php echo form_error('r3'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary9" name="r3" value="4"><label for="radioPrimary9"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary10" name="r3" value="3"><label for="radioPrimary10"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary11" name="r3" value="2"><label for="radioPrimary11"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary12" name="r3" value="1"><label for="radioPrimary12"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>4.</td>
                      <td>Visi dan Misi STKIP Persada Khatulistiwa Sintang sudah realistis <?php echo form_error('r4'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary13" name="r4" value="4"><label for="radioPrimary13"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary14" name="r4" value="3"><label for="radioPrimary14"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary15" name="r4" value="2"><label for="radioPrimary15"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary16" name="r4" value="1"><label for="radioPrimary16"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>5.</td>
                      <td>Visi dan Misi STKIP Persada Khatulistiwa Sintang disosialisasikan dengan baik <?php echo form_error('r5'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary17" name="r5" value="4"><label for="radioPrimary17"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary18" name="r5" value="3"><label for="radioPrimary18"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary19" name="r5" value="2"><label for="radioPrimary19"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary20" name="r5" value="1"><label for="radioPrimary20"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>6.</td>
                      <td>Visi dan Misi STKIP Persada Khatulistiwa Sintang  mudah dipahami <?php echo form_error('r6'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary21" name="r6" value="4"><label for="radioPrimary21"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary22" name="r6" value="3"><label for="radioPrimary22"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary23" name="r6" value="2"><label for="radioPrimary23"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary24" name="r6" value="1"><label for="radioPrimary24"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>7.</td>
                      <td>Visi dan Misi STKIP Persada Khatulistiwa Sintang  menjadi motivasi saya untuk mengikuti program-program yang diselenggarakan kampus <?php echo form_error('r7'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary25" name="r7" value="4"><label for="radioPrimary25"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary26" name="r7" value="3"><label for="radioPrimary26"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary27" name="r7" value="2"><label for="radioPrimary27"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary28" name="r7" value="1"><label for="radioPrimary28"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>8.</td>
                      <td>Visi dan Misi STKIP Persada Khatulistiwa Sintang  disusun dengan melibatkan pihak-pihak yang berkepentingan <?php echo form_error('r8'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary29" name="r8" value="4"><label for="radioPrimary29"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary30" name="r8" value="3"><label for="radioPrimary30"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary31" name="r8" value="2"><label for="radioPrimary31"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary32" name="r8" value="1"><label for="radioPrimary32"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>9.</td>
                      <td>Saya mengetahui Visi dan Misi STKIP Persada Khatulistiwa Sintang berfungsi sebagai arahan bagi saya dalam bekerja/belajar <?php echo form_error('r9'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary33" name="r9" value="4"><label for="radioPrimary33"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary34" name="r9" value="3"><label for="radioPrimary34"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary35" name="r9" value="2"><label for="radioPrimary35"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary36" name="r9" value="1"><label for="radioPrimary36"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>10.</td>
                      <td>Saya memahami bahwa Visi dan Misi STKIP Persada Khatulistiwa Sintang  harus dilaksanakan oleh semua anggota sivitas akademika <?php echo form_error('r10'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary37" name="r10" value="4"><label for="radioPrimary37"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary38" name="r10" value="3"><label for="radioPrimary38"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary39" name="r10" value="2"><label for="radioPrimary39"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary40" name="r10" value="1"><label for="radioPrimary40"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>11.</td>
                      <td>Sesuai dengan Visi dan Misi STKIP Persada Khatulistiwa Sintang, saya harus menjadi pribadi yang memiliki keempat kompetensi yaitu kompetensi pedagogik, profesional, individu dan sosial <?php echo form_error('r11'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary41" name="r11" value="4"><label for="radioPrimary41"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary42" name="r11" value="3"><label for="radioPrimary42"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary43" name="r11" value="2"><label for="radioPrimary43"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary44" name="r11" value="1"><label for="radioPrimary44"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>12.</td>
                      <td>Jika saya menjadi guru, saya siap ditempatkan di daerah manapun <?php echo form_error('r12'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary45" name="r12" value="4"><label for="radioPrimary45"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary46" name="r12" value="3"><label for="radioPrimary46"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary47" name="r12" value="2"><label for="radioPrimary47"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary48" name="r12" value="1"><label for="radioPrimary48"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>13.</td>
                      <td>Jika saya menjadi guru, saya akan menjalin relasi yang baik dengan atasan saya <?php echo form_error('r13'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary49" name="r13" value="4"><label for="radioPrimary49"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary50" name="r13" value="3"><label for="radioPrimary50"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary51" name="r13" value="2"><label for="radioPrimary51"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary52" name="r13" value="1"><label for="radioPrimary52"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>14.</td>
                      <td>Jika saya menjadi guru, saya akan menjalin relasi yang baik dengan sesama rekan guru <?php echo form_error('r14'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary53" name="r14" value="4"><label for="radioPrimary53"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary54" name="r14" value="3"><label for="radioPrimary54"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary55" name="r14" value="2"><label for="radioPrimary55"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary56" name="r14" value="1"><label for="radioPrimary56"></label></div>
                      </td>
                    </tr>
                     <tr>
                      <td>15.</td>
                      <td>Jika saya menjadi guru, saya akan memperlakukan semua siswa sebagai anak-anak saya <?php echo form_error('r15'); ?></td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary57" name="r15" value="4"><label for="radioPrimary57"></label></div>
                      </td>
                      
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary58" name="r15" value="3"><label for="radioPrimary58"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary59" name="r15" value="2"><label for="radioPrimary59"></label></div>
                      </td>
                      <td>
                        <div class="icheck-primary d-inline"><input type="radio" id="radioPrimary60" name="r15" value="1"><label for="radioPrimary60"></label></div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <strong class="text-danger">Keterangan:</strong> <strong>SS</strong>(<i>Sangat Setuju</i>), <strong>S</strong>(<i>Setuju</i>), <strong>TS</strong>(<i>Tidak Setuju</i>), <strong>STS</strong>(<i>Sangat Tidak Setuju</i>)
                
                <div class="row mt-3">
                    <div class="col-sm-2 mb-2">
                        <div id="text-captcha">
                            <?php echo $cap['image']; ?>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" name="captcha" class="form-control form-control-lg"value="" placeholder="Ketik angka...">
                    </div>
                </div>
                <a href="#" id="reload-captcha"><small><i>Reload captcha ...</i></small></a><br>
                <?php echo form_error('captcha', '<small style="color: #e88f8f;">', '</small>'); ?><?php echo $this->session->flashdata('salah'); ?>
                 </div>
                 <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                 <?php echo form_close(); ?>
                  </div>
                  </div>
            </div>
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
     
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="https://persadakhatulistiwa.ac.id/">STKIP Persada Khatulistiwa</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("a#reload-captcha").click(function() {
      $.get("<?php echo base_url("angket/captcha_refresh_karyawan"); ?>", function( data ) 
      {
        $('#text-captcha').html(data);
      });
    });
  });
</script>
</body>
</html>

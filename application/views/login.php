<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>STKIP Persada Khatulistiwa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
 
 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page" style="background: #17a2b8!important;">
<div class="register-box">
  <div class="register-logo mb-0">
    <a href="https://persadakhatulistiwa.ac.id/"><b>STKIP PK </b>2024</a>
  </div>
   <p class="login-box-msg">PORTAL PMB PERSADA</p>

  <div class="card">
    <div class="card-body register-card-body">
        <div class="text-center mb-3">
        <img src="<?php echo base_url(); ?>assets/images/logo.png">
        </div>
     
 <?php echo $this->session->flashdata('pesan'); ?>
     <?php echo form_open('main/index','class="form-horizontal" id="loginform"'); ?>
         <?php echo form_error('email'); ?>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
         <?php echo form_error('password'); ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
                   <?php echo form_error('captcha', '<small style="color: #e88f8f;">', '</small>'); ?><?php echo $this->session->flashdata('salah'); ?> 
                                <div class="row">
                                    <div class="col-5">
                                        <div id="text-captcha">
                                            <?php echo $cap['image']; ?>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <input type="text" name="captcha" class="form-control form-control-lg"value="" placeholder="Ketik angka...">
                                    </div>
                                </div>
                               
                                <a href="#" id="reload-captcha"><small><i>Reload captcha ...</i></small></a>
      
        <button type="submit" class="btn btn-block btn-primary mt-3">LOGIN</button>
     <?php echo form_close(); ?>

      

    
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("a#reload-captcha").click(function() {
      $.get("<?php echo base_url("main/captcha_refresh"); ?>", function( data ) 
      {
        $('#text-captcha').html(data);
      });
    });
  });
</script>
</body>
</html>

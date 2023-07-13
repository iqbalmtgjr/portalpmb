<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/favicon.png">
    <title>Humas dan IT - Login</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
           
            <div class="auth-box bg-dark border-top border-secondary">
                
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <h2>Sistem Informasi Manajemen Keuangan</h2>
                    </div>
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" /></span>
                    </div>
                    <?php echo $this->session->flashdata('pesan'); ?>
                    <!-- Form -->
                    <?php echo form_open(current_url(),'class="form-horizontal m-t-20" id="loginform"'); ?>
                        <div class="row p-b-30">
                            <div class="col-12">
                                 <?php echo form_error('email', '<small style="color: #e88f8f;">', '</small>'); ?> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="text" name="email" class="form-control form-control-lg" placeholder="Email" value="<?php echo set_value('email'); ?>" aria-label="Wmail" aria-describedby="basic-addon1">
                                </div>
                                <?php echo form_error('password', '<small style="color: #e88f8f;">', '</small>'); ?> 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg" value="<?php echo set_value('password'); ?>" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
                                <?php echo form_error('captcha', '<small style="color: #e88f8f;">', '</small>'); ?><?php echo $this->session->flashdata('salah'); ?> 
                                <div class="input-group mb-3">
                                   <div id="text-captcha">
                                        <?php echo $cap['image']; ?>
                                    </div>
                                    <input type="text" name="captcha" class="form-control form-control-lg" style="margin-left: 10px;" value="" placeholder="Ketik angka di samping" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
                                <a href="#" id="reload-captcha"><small><i>Reload captcha ...</i></small></a>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">                                       
                                        <button class="btn btn-success float-right" type="submit">Masuk</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php echo form_close(); ?>
                </div>
                
            </div>
        </div>
        
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
   
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>
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
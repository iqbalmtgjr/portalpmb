<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>STKIP PK | Portal</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <?php if(!empty($css)) { foreach($css as $file1) {  ?>
         <link rel="stylesheet" type="text/css" href="<?php echo base_url();?><?php echo $file1; ?>">
    <?php } } ?>
    <?php if(!empty($css2)) { foreach($css2 as $file1) {  ?>
         <link rel="stylesheet" type="text/css" href="<?php echo $file1; ?>">
    <?php } } ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
  <script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3500);
</script>
<!--<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">-->
</head>
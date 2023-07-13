<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2010-2024 Pusat IT & Humas STKIP PK.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<?php   
   if(isset($js) ==! FALSE) : foreach($js as $file) :  ?>
         <script src="<?php echo base_url(); ?><?php echo $file; ?>"></script>
<?php endforeach; endif; ?>
<script src="<?php echo base_url(); ?>dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->

</body>
</html>
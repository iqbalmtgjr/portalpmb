<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2010-2024 Pusat IT & Humas STKIP PK.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 4.0.0
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
<?php   
   if(isset($js2) ==! FALSE) : foreach($js2 as $file) :  ?>
         <script src="<?php echo $file; ?>"></script>
<?php endforeach; endif; ?>
<script src="<?php echo base_url(); ?>dist/js/adminlte.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.0/lazysizes.min.js" async></script>
<!--<script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>-->
<script>
    $(document).ready(function() {
        let tabel = new DataTable('#tableKu', {
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json"
            },
            ordering: false,
        });
    });
</script>



<!-- OPTIONAL SCRIPTS -->

</body>
</html>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <?php echo $this->session->flashdata('pesan'); ?>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Pengguna</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <table id="tableKu" class="table table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Unit</th>
                <th>Pangkat</th>
                <th>Status</th>
                <th>Aplikasi</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = $this->uri->segment('3') + 1; ?>
              <?php foreach ($user as $user) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo ucfirst($user->nama); ?></td>
                  <td><?php echo $user->email; ?></td>
                  <td><?php echo $user->unit; ?></td>
                  <td><?php echo ucfirst($user->pangkat); ?></td>
                  <td><?php if ($user->status == '1') { ?><span class="text-danger">Tidak Aktif</span> <?php } else { ?><span class="text-info">Aktif</span><?php } ?></td>
                  <td><?php echo $user->apli; ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>pengguna/ubah/<?php echo $user->pengguna_id; ?>"><i class="fas fa-pencil-alt text-warning mr-2"></i></a>
                    <a href="<?php echo base_url(); ?>pengguna/hapus/<?php echo $user->pengguna_id; ?>"><i class="fas fa-trash text-danger"></i></a>
                  </td>
                </tr>
              <?php  } ?>

            </tbody>
          </table>
        </div>
        <div class="card-footer clearfix">

          <div class="row">
            <div class="col">
              <?php if (!empty($pagination)) {
                echo $pagination;
              } ?>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>




    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- /.control-sidebar -->
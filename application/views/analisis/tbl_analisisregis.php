<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->session->set_userdata('referred_from', current_url()); ?>
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
                    <h3 class="card-title">Analisis Maba Registrasi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-2">
                            <h4>Filter</h4>
                        </div>
                        <div class="col-4">
                        <form action="<?php echo base_url(); ?>masterpmb/set_sudah_regis" method="post">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                                <select name="filter_gel" id="" class="form-control">
                                    <option value="">-- Pilih Gelombang --</option>
                                    <option value="1" <?php if ($this->session->userdata('filter_gel_regis') == '1') {
                                                            echo "selected";
                                                        } ?>>Gelombang I</option>
                                    <option value="2" <?php if ($this->session->userdata('filter_gel_regis') == '2') {
                                                            echo "selected";
                                                        } ?>>Gelombang II</option>
                                    <option value="3" <?php if ($this->session->userdata('filter_gel_regis') == '3') {
                                                            echo "selected";
                                                        } ?>>Gelombang III</option>
                                </select>
                        </div>
                        <div class="col-4">
                            <select name="filter_jal" id="" class="form-control">
                                    <option value="">-- Pilih Jalur --</option>
                                    <option value="test" <?php if ($this->session->userdata('filter_jal_regis') == 'test') {
                                                            echo "selected";
                                                        } ?>>Tes</option>
                                    <option value="prestasi" <?php if ($this->session->userdata('filter_jal_regis') == 'prestasi') {
                                                            echo "selected";
                                                        } ?>>Prestasi</option>
                                </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary btn-md">Pilih</button>
                        </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <input type="hidden" class="form-control input-sm" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th></th>
                                    <th></th>
                                    <th>No Daftar</th>
                                    <th>Nama</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Nama Pengirim</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Ket</th>
                                    <th>Slip</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<div class="modal fade" id="ket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Keterangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('Analisis/keterangan'); ?>
          <div class="form-group">
              <input type="hidden" name="akun" id="akunInput">
            <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan...">
            <?php echo form_error('keterangan'); ?>
          </div>
      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Simpan</button> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function() {
    // Ketika modal ditampilkan
    $('#ket').on('show.bs.modal', function(event) {
      // Mendapatkan tombol yang memicu modal
      var button = $(event.relatedTarget); 
      // Mengambil nilai dari atribut data-akun
      var akun = button.data('akun'); 
      
      // Menampilkan nilai di dalam input
      var modal = $(this);
      modal.find('#akunInput').val(akun);
    });
  });
</script>
<!-- /.content-wrapper -->
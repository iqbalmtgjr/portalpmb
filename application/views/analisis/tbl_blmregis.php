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
                    <h3 class="card-title">Analisis Maba Belum Registrasi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-2">
                            <h4>Filter</h4>
                        </div>
                        <div class="col-4">
                        <form action="<?php echo base_url(); ?>masterpmb/set_blm_regis" method="post">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                                <select name="filter_gel" id="" class="form-control">
                                    <option value="">-- Pilih Gelombang --</option>
                                    <option value="1" <?php if ($this->session->userdata('filter_gel_regis2') == '1') {
                                                            echo "selected";
                                                        } ?>>Gelombang I</option>
                                    <option value="2" <?php if ($this->session->userdata('filter_gel_regis2') == '2') {
                                                            echo "selected";
                                                        } ?>>Gelombang II</option>
                                    <option value="3" <?php if ($this->session->userdata('filter_gel_regis2') == '3') {
                                                            echo "selected";
                                                        } ?>>Gelombang III</option>
                                </select>
                        </div>
                        <div class="col-4">
                            <select name="filter_jal" id="" class="form-control">
                                    <option value="">-- Pilih Jalur --</option>
                                    <option value="test" <?php if ($this->session->userdata('filter_jal_regis2') == 'test') {
                                                            echo "selected";
                                                        } ?>>Tes</option>
                                    <option value="prestasi" <?php if ($this->session->userdata('filter_jal_regis2') == 'prestasi') {
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
                                    <th>No Pendaftaran</th>
                                    <th>Nama</th>
                                    <th>Gelombang</th>
                                    <th>Prodi</th>
                                    <th>Ket</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $item) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item->ref ?></td>
                                        <td><?= $item->nama_siswa ?></td>
                                        <td><?= $item->gelombang ?></td>
                                        <?php if ($item->prodi_penerimaan == '1') : ?>
                                            <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                                        <?php elseif ($item->prodi_penerimaan == '2') : ?>
                                            <td>Pendidikan Matematika</td>
                                        <?php elseif ($item->prodi_penerimaan == '3') : ?>
                                            <td>Pendidikan Ekonomi</td>
                                        <?php elseif ($item->prodi_penerimaan == '4') : ?>
                                            <td>Pendidikan Pancasila dan Kewarganegaraan</td>
                                        <?php elseif ($item->prodi_penerimaan == '5') : ?>
                                            <td>Pendidikan Komputer</td>
                                        <?php elseif ($item->prodi_penerimaan == '6') : ?>
                                            <td>Pendidikan Biologi</td>
                                        <?php elseif ($item->prodi_penerimaan == '7') : ?>
                                            <td>Pendidikan Anak Usia Dini</td>
                                        <?php elseif ($item->prodi_penerimaan == '8') : ?>
                                            <td>Pendidikan Bahasa Inggris</td>
                                        <?php else : ?>
                                            <td>Pendidikan Guru Sekolah Dasar</td>
                                        <?php endif; ?>
                                        <td>
                                           <?php if($item->keterangan == null){ ?>
                                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-akun="<?= $item->akun_siswa ?>" data-target="#ket">Tambah Keterangan<a>
                                            <?php }else{ ?>
                                                <?= $item->keterangan; ?> <br>
                                                <a href="#" class="text-success" data-toggle="modal" data-akun="<?= $item->akun_siswa ?>" data-ket="<?= $item->keterangan ?>" data-target="#edit"><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;
                                                <a href="javascript:void(0);" class="text-danger delete" akun="<?= $item->akun_siswa ?>" nama="<?= $item->nama_siswa ?>"><i class="fas fa-times"></i></a>
                                           <?php } ?>
                                        </td>
                                        <td>
                                            <a target="_blank" href="https://portalpmb.persadakhatulistiwa.ac.id/bank/tambahpembayaran/<?= $item->akun_siswa ?>" class="btn btn-info btn-md">Regis</a>
                                            <a target="_blank" href="https://wa.me/62<?= $item->hp_siswa ?>" class="btn btn-success btn-sm text-center"><img width="30px" src="<?= base_url('assets/images/wa_icon.png') ?>" alt=""></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
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
<!-- /.content-wrapper -->

<!--Modal tambah keterangan-->
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

<!--Modal edit keterangan-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Keterangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('Analisis/keterangan'); ?>
          <div class="form-group">
              <input type="hidden" name="akun" id="akunId">
            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan...">
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

<!--sweet alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#ket').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget); 
          var akun = button.data('akun'); 
          
          var modal = $(this);
          modal.find('#akunInput').val(akun);
        });
    
        $('#edit').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget); 
          var akun = button.data('akun'); 
          var ket = button.data('ket'); 
          
          var modal = $(this);
          modal.find('#akunId').val(akun);
          modal.find('#keterangan').val(ket);
        });
    });
    
    $('.delete').click(function() {
        var Id = $(this).attr('akun');
        var Nama = $(this).attr('nama');
        
        Swal.fire({
            title: 'Yakin?',
            text: "Mau Hapus Keterangan "+Nama+"?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
        })
        .then((result) => {
            console.log(result);
            if (result.value) {
                window.location = "/analisis/hapusketerangan/" + Id + "";
            }
        });
    });
</script>
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
                    <h3 class="card-title">Sudah Daftar PKKMB</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <input type="hidden" class="form-control input-sm" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Pendaftaran</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>Gelombang</th>
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
                                        <td><?= $item->gelombang ?></td>
                                        <td><a target="_blank" href="https://wa.me/62<?= $item->hp_siswa ?>" class="btn btn-success btn-sm text-center"><img width="30px" src="https://portalpmb.persadakhatulistiwa.ac.id/assets/images/wa_icon.png" alt=""></a></td>
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
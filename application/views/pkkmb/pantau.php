<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Data PKKMB - STKIP Persada Khatulistiwa</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <!--<link type="text/css" rel="stylesheet" href="<?php echo base_url('asset_pkkmb/css/bootstrap.min.css'); ?>" />-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>asset_pkkmb/css/style.css" />

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
</head>

<body style="background-color: #0c4f92;">
    <div class="container-fluid">
        <div class="row text-white text-center mt-5">
            <center>
                <?php //echo $this->session->flashdata('pesan'); 
                ?>
                <img loading="lazy" style="width:100px" src="https://daftar.persadakhatulistiwa.ac.id/assets/img/logo.png">
                <h1>Data Pendaftaran PKKMB <br> STKIP Persada Khatulistiwa</h1>
            </center>
        </div>
        <!--<div class="row">-->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="mb-2">
                            <!--<a href="<?php //echo base_url(); ?>/pkkmb/logout" class="btn btn-danger float-end"><i class="fas fa-sign-out-alt"></i> Log-out</a>-->
                            <a href="<?php echo base_url(); ?>panitiapkkmb/export" target="_blank" class="btn btn-success float-end me-2"><i class="fas fa-regular fa-file-excel "></i> Export Excel</a>
                        </div>
                        <!--<div></div>-->
                    </div>
                    <div class="row">
                        <div class="table-responsive">  
                            <table id="myTable" class="table table-striped table-bordered mt-2" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No Pendaftaran</th>
                                        <th>Pas Foto</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No Hp</th>
                                        <th>Jalur Masuk</th>
                                        <th>Gelombang</th>
                                        <th>Prodi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pkkmb as $maba) : ?>
                                        <tr>
                                            <th><?= $no++; ?></th>
                                            <td><?= $maba->no_daftar ?></td>
                                            <td><a loading="lazy" href="http://daftar.persadakhatulistiwa.ac.id/assets/berkas/foto/<?= $maba->foto_upload ?>" download><img class="card-img-top" style="height: 180px; width: 150px; object-fit: cover; object-position: center;" src="http://daftar.persadakhatulistiwa.ac.id/assets/berkas/foto/<?= $maba->foto_upload ?>" alt=""></a></td>
                                            <td><?= $maba->nama_siswa ?></td>
                                            <td><?= $maba->email_akun_siswa ?></td>
                                            <td><?= $maba->jekel_siswa ?></td>
                                            <td><?= $maba->hp_siswa ?></td>
                                            <?php if ($maba->jalur == 'test') : ?>
                                                <td>Tes</td>
                                            <?php else : ?>
                                                <td>Prestasi</td>
                                            <?php endif; ?>
                                            <td>Gelombang <?= $maba->gelombang ?></td>
                                            <?php if($maba->prodi_penerimaan == 1): ?>
                                                <td>Pendidikan Bahasa dan Sastra Indonesia</td>
                                            <?php elseif($maba->prodi_penerimaan == 2): ?>
                                                <td>Pendidikan Matematika</td>
                                            <?php elseif($maba->prodi_penerimaan == 3): ?>
                                                <td>Pendidikan Ekonomi</td>
                                            <?php elseif($maba->prodi_penerimaan == 4): ?>
                                                <td>Pendidikan Pancasila dan Kewarganegaraan</td>
                                            <?php elseif($maba->prodi_penerimaan == 5): ?>
                                                <td>Pendidikan Komputer</td>
                                            <?php elseif($maba->prodi_penerimaan == 6): ?>
                                                <td>Pendidikan Biologi</td>
                                            <?php elseif($maba->prodi_penerimaan == 7): ?>
                                                <td>Pendidikan Anak Usia Dini</td>
                                            <?php elseif($maba->prodi_penerimaan == 8): ?>
                                                <td>Pendidikan Bahasa Inggris</td>
                                            <?php else: ?>
                                                <td>Pendidikan Guru Sekolah Dasar</td>
                                            <?php endif; ?>
                                            <!-- <td>
                                                <button class="btn btn-success btn-md" onclick="" data-toggle="modal" data-target="#edit">Edit</button>
                                                <a href="#" class="btn btn-danger btn-md hapus" id="{{ $datas->user_id }}">Hapus</a>
                                            </td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!--</div>-->
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');

        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>
</body>

</html>
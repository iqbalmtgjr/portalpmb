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
                    <h3 class="card-title">Analisis Sekolah</h3>
                </div>
                <!-- /.card-header -->
                <div class="flex p-5" style="display: flex; align-items: center;">
                    <div>
                        <span class="text-primary">Total Sekolah : <?= $total ?></span><br>
                        <span class="text-warning">Total Mahasiswa : <?= $total_mhs ?></span>
                    </div>
                    <!-- Tambahkan margin-left: auto untuk mendorong tombol ke kanan -->
                    <button class="btn btn-primary" id="downloadButton" style="margin-left: auto;">Download Grafik</button> 
                </div>

                <div class="card-body">
                    <canvas id="barChart" width="400" height="400"></canvas>
                    <hr>
                    <h3 class="mt-5 text-center">Daftar Sekolah Yang Mendaftar</h3>
                    <a href="<?= site_url('analisis/export_excel'); ?>" class="btn btn-success m-3">Download Excel</a>
                    <table id="tableKu" class="table table-hover display">
                        <thead>
                            <tr>
                                <th>Nama Sekolah</th>
                                <th>Jumlah Siswa</th>
                                <th>Persentase Siswa (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($schoolPercentageurut as $data): ?>
                                <tr>
                                    <td><?= $data['nama_sekolah']; ?></td>
                                    <td><?= $data['jumlah_siswa']; ?></td>
                                    <td><?= number_format($data['persentase'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!--sweet alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('barChart').getContext('2d');
    var data = {
        labels: [<?php foreach ($schoolPercentage as $data) { echo '"' . $data['nama_sekolah'] . '",'; } ?>],
        datasets: [{
            label: 'Jumlah Siswa per Sekolah',
            // label: 'Persentase Siswa per Sekolah',
            data: [<?php foreach ($schoolPercentage as $data) { echo $data['persentase'] . ','; } ?>],
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
            borderColor: '#333333',
            borderWidth: 1
        }]
    };

    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        // text: 'Persentase (%)'
                        text: 'Jumlah'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Nama Sekolah'
                    }
                }
            }
        }
    });
    
    document.getElementById('downloadButton').addEventListener('click', function () {
        var link = document.createElement('a');
        link.href = document.getElementById('barChart').toDataURL('image/png');
        link.download = 'Analisis Grafik Sekolah.png';
        link.click();
    });
</script>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title; ?></title>

    <style>
        body {
            font-family: 'Arial Narrow';
        }

        table {
            font-size: 15px;
            font-family: 'Arial Narrow';
        }

        .header {
            width: 100%;
            height: 11%;
            font-weight: 500;
        }

        .big-title {
            font-family: 'Arial Narrow';
            font-size: x-large;
            letter-spacing: 2px;
            word-spacing: 7px;
            font-weight: bold;
        }

        .stt-title {
            font-family: 'Arial Narrow';
            font-size: 16px;
            letter-spacing: 1px;
            word-spacing: 3px;
            font-weight: bold;
        }

        .small-title {
            font-family: 'Arial';
            font-size: 12px;
            letter-spacing: normal;
            text-transform: none;
        }

        .content {
            font-size: 14px;
            font-family: 'Arial Narrow';
            margin-top: 20px;
        }

        .upper {
            text-transform: uppercase;
        }

        .underline {
            text-decoration: underline;
        }

        .bold {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .tengah [class*="icon"] {
            text-alidisplay: block;
            height: 100%;
            width: 100%;
            margin: auto;
        }

        table.mini-font {
            font-size: 10px;
        }

        table.gridtable {
            border-width: 0;
            border-color: #757572;
            border-collapse: collapse;
        }

        table.gridtable th {
            border-width: 0.1px;
            padding: 4px;
            border-style: solid;
            border-color: #757572;
            text-transform: none;
        }

        table.gridtable td {
            border-width: 0.1px;
            border-top: 0px;
            padding: 4px 3px 5px 3px;
            border-style: solid;
            border-color: #757572;
        }

        table.kop tr {
            line-height: 50%
        }

        table.kop {
            margin-top: -5px;
            margin-left: 70px;
        }

        .tg {
            border-collapse: collapse;
            border-color: #ccc;
            border-spacing: 0;
        }

        .tg td {
            background-color: #fff;
            border-color: #ccc;
            border-style: solid;
            border-width: 1px;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            background-color: #f0f0f0;
            border-color: #ccc;
            border-style: solid;
            border-width: 1px;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-tysj {
            color: #333333;
            text-align: left;
            vertical-align: top
        }

        .tg .tg-0lax {
            text-align: left;
            vertical-align: top
        }

        h5 {
            margin: 10px;
        }

        .wrapper {
            background-image: url("./assets/images/pngwing.png");
            background-repeat: no-repeat;
            /*  background-attachment: fixed; */
            background-position: center;
            page-break-inside: avoid;
            height: 400px;
        }

        @media all {
            .watermark {
                display: none;
                background-image: url("./assets/images/logo.png");
                ?>);
                float: right;
            }

            .pagebreak {
                display: none;
            }
        }

        @media print {
            .watermark {
                display: block;
            }

            .pagebreak {
                display: block;
                page-break-after: always;
            }
        }
    </style>
</head>

<body style="margin: 30px;">
    <div class="wrapper">
        <div class="table">
            <div class="header">
                <img height="90" width="90" style="float: left; padding-right: 10px;" src="./assets/images/STKIP.jpg" alt="">
                <div class="stt-title text-center">PERKUMPULAN BADAN PENDIDIKAN KARYA BANGSA</div>
                <div class="stt-title text-center">STKIP PERSADA KHATULISTIWA SINTANG</div>
                <div class="stt-title text-center">SINTANG - KALIMANTAN BARAT</div>
                <div class=" small-title text-center"><i>Jln. Pertamina Sengkuang Km 4, Kotak Pos 126 Telp.(0564) 2022386, 2022387</i></div>
                <div class=" small-title text-center" style="margin-left: 90px;">Email: persada@persadakhatulistiwa.ac.id Website : https://persadakhatulistiwa.ac.id</div>
            </div>
            <hr style="width: 100%;">
        </div>


        <h4 class="upper text-center"><?php echo $title; ?></h4>

        <?php $si = 1;
        $so = 1;
        ?>

        <table class="tg">
            <thead>
                <tr>
                    <th class="tg-tysj">Nomor</th>
                    <th class="tg-0lax">Nama</th>
                    <th class="tg-0lax">Prodi</th>
                    <th class="tg-0lax">Jlh Setoran</th>
                    <th class="tg-0lax">Jlh Harus Bayar</th>
                    <th class="tg-0lax">Jlh Tunggakan</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($warga)) {
                    $sum = 0;
                    $harus = 0;
                    $tung = 0;
                    foreach ($warga->result() as $warga) { ?>
                        <tr>
                            <td class="tg-0lax"><?php echo $si++; ?></td>
                            <td class="tg-0lax"><?php echo ucfirst($warga->nama_siswa); ?></td>
                            <td class="tg-0lax"><?php echo $warga->nama_prodi; ?></td>
                            <td class="tg-0lax">Rp. <?php echo number_format($warga->jlh_bayar, 0, ",", ".");
                                                    $sum += $warga->jlh_bayar; ?></td>
                            <?php if ($warga->jalur == "prestasi") { ?>
                                <td class="tg-0lax">Rp. <?php echo number_format($biaya_prestasi, 0, ",", ".") ?> <?php $harus += $biaya_prestasi; ?></td>

                                <td class="tg-0lax">Rp. <?php $sel = $warga->jlh_bayar - $biaya_prestasi;
                                                        echo number_format("$sel", 0, ",", ".");
                                                        $tung += $sel; ?></td>
                            <?php } else { ?>
                                <td class="tg-0lax">Rp. <?php echo number_format($biaya_test, 0, ",", ".") ?> <?php $harus += $biaya_test; ?></td>

                                <td class="tg-0lax">Rp. <?php $sel = $warga->jlh_bayar - $biaya_test;
                                                        echo number_format("$sel", 0, ",", ".");
                                                        $tung += $sel; ?></td>
                            <?php } ?>
                        </tr>

                    <?php } ?>
                    <tr>
                        <td class="tg-0lax" colspan="3">Jumlah Total</td>
                        <td class="tg-0lax"><?php echo "Rp " . number_format($sum, 2, ",", "."); ?></td>
                        <td class="tg-0lax"><?php echo "Rp " . number_format($harus, 2, ",", "."); ?></td>
                        <td class="tg-0lax"><?php echo "Rp " . number_format($tung, 2, ",", "."); ?></td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
        <br>
        <p>TARGET DAN DISTRIBUSI MABA 2024</p>
        <table class="tg">
            <thead>
                <tr>
                    <th class="tg-tysj">Nomor</th>
                    <th class="tg-0lax">Prodi</th>
                    <th class="tg-0lax">MABA Regis</th>
                    <th class="tg-0lax">Target Kelas</th>
                    <th class="tg-0lax">MABA/Kelas</th>
                    <th class="tg-0lax">Total</th>
                    <th class="tg-0lax">Kekurangan</th>


                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="tg-0lax"><?php echo $so++; ?></td>
                    <td class="tg-0lax">Pendidikan Bahasa dan Sastra Indonesia</td>
                    <td class="tg-0lax"><?php echo $pbsi; ?></td>
                    <td class="tg-0lax"><?php $kelas1 = 1;
                                        echo $kelas1; ?></td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax"><?php $pbsi_kurang = 40 - $pbsi;
                                        echo $pbsi_kurang;  ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo $so++; ?></td>
                    <td class="tg-0lax">Pendidikan Matematika</td>
                    <td class="tg-0lax"><?php echo $pmat; ?></td>
                    <td class="tg-0lax"><?php $kelas2 = 1;
                                        echo $kelas2; ?></td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax"><?php $pmat_kurang = 40 - $pmat;
                                        echo $pmat_kurang;  ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo $so++; ?></td>
                    <td class="tg-0lax">Pendidikan Ekonomi</td>
                    <td class="tg-0lax"><?php echo $pek; ?></td>
                    <td class="tg-0lax"><?php $kelas3 = 1;
                                        echo $kelas3; ?></td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax"><?php $pek_kurang = 40 - $pek;
                                        echo $pek_kurang;  ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo $so++; ?></td>
                    <td class="tg-0lax">Pendidikan Pancasila dan Kewarganegaraan</td>
                    <td class="tg-0lax"><?php echo $pkn; ?></td>
                    <td class="tg-0lax"><?php $kelas4 = 1;
                                        echo $kelas4; ?></td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax"><?php $pkn_kurang = 40 - $pkn;
                                        echo $pkn_kurang;  ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo $so++; ?></td>
                    <td class="tg-0lax">Pendidikan Komputer</td>
                    <td class="tg-0lax"><?php echo $pkom; ?></td>
                    <td class="tg-0lax"><?php $kelas5 = 1;
                                        echo $kelas5; ?></td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax"><?php $pkom_kurang = 40 - $pkom;
                                        echo $pkom_kurang;  ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo $so++; ?></td>
                    <td class="tg-0lax">Pendidikan Biologi</td>
                    <td class="tg-0lax"><?php echo $pbio; ?></td>
                    <td class="tg-0lax"><?php $kelas6 = 1;
                                        echo $kelas6; ?></td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax"><?php $pbio_kurang = 40 - $pbio;
                                        echo $pbio_kurang;  ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo $so++; ?></td>
                    <td class="tg-0lax">Pendidikan Anak Usia Dini</td>
                    <td class="tg-0lax"><?php echo $paud; ?></td>
                    <td class="tg-0lax"><?php $kelas7 = 1;
                                        echo $kelas7; ?></td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax"><?php $paud_kurang = 40 - $paud;
                                        echo $paud_kurang;  ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo $so++; ?></td>
                    <td class="tg-0lax">Pendidikan Bahasa Inggris</td>
                    <td class="tg-0lax"><?php echo $pbi; ?></td>
                    <td class="tg-0lax"><?php $kelas8 = 1;
                                        echo $kelas8; ?></td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax"><?php $pbi_kurang = 40 - $pbi;
                                        echo $pbi_kurang;  ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo $so++; ?></td>
                    <td class="tg-0lax">Pendidikan Guru Sekolah Dasar</td>
                    <td class="tg-0lax"><?php echo $pgsd; ?></td>
                    <td class="tg-0lax"><?php $kelas9 = 6;
                                        echo $kelas9; ?></td>
                    <td class="tg-0lax">40</td>
                    <td class="tg-0lax">240</td>
                    <td class="tg-0lax"><?php $pgsd_kurang = 240 - $pgsd;
                                        echo $pgsd_kurang;  ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax" colspan="2">Jumlah Total</td>
                    <td class="tg-0lax"><?php $total_maba = $pgsd + $pbi + $paud + $pbio + $pkom + $pkn + $pek + $pmat + $pbsi;
                                        echo $total_maba; ?></td>
                    <td class="tg-0lax"><?php $totalkelas = $kelas1 + $kelas2 + $kelas3 + $kelas4 + $kelas5 + $kelas6 + $kelas7 + $kelas8 + $kelas9;
                                        echo $totalkelas;  ?></td>
                    <td class="tg-0lax"></td>
                    <td class="tg-0lax">560</td>
                    <td class="tg-0lax"><?php $total_kurang = $pgsd_kurang + $pbi_kurang + $paud_kurang + $pbio_kurang + $pkom_kurang + $pkn_kurang + $pek_kurang + $pmat_kurang + $pbsi_kurang;
                                        echo $total_kurang; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
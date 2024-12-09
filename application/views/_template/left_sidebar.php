<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">

        <span class="brand-text font-weight-light">Portal Persada</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if (!empty($this->session->userdata('foto_simkeu'))) { ?>
                    <img src="<?php echo base_url(); ?>foto/<?php echo $this->session->userdata('foto_simkeu'); ?>" class="img-circle elevation-2 direct-chat-img" alt="User Image">
                <?php } else { ?>
                    <img src="<?php echo base_url(); ?>dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                <?php } ?>
            </div>
            <div class="info">
                <a href="<?= base_url(); ?>pengguna/profil.html" class="d-block"><?php echo ucfirst($this->session->userdata('nama_simkeu')); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



                <?php if ($this->session->userdata('apli') == "pmb") { ?>
                    <!-- pmb -->
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>beranda/index.html" class="nav-link <?php if (!empty($beranda)) {
                                                                                                    echo 'active';
                                                                                                } ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview <?php if (!empty($pmbo)) {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if (!empty($pmbo)) {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>
                                PMB
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/index.html" class="nav-link <?php if (!empty($pmbo) && $pmbo == 'index') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pendaftar Login</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/no.html" class="nav-link <?php if (!empty($pmbo) && $pmbo == 'no') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pendaftar Tidak Login</p>
                                </a>
                            </li>
                        </ul>
                    </li><!-- /.PMB -->

                    <li class="nav-item has-treeview <?php if (!empty($pmb1)) {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if (!empty($pmb1)) {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fa fa-trophy"></i>
                            <p>
                                JALUR PRESTASI
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/prestasi.html" class="nav-link <?php if (!empty($pmb1) && $pmb1 == 'pres') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="fa fa-check nav-icon"></i>
                                    <p>Prestasi All</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/prestasiinvalid.html" class="nav-link <?php if (!empty($pmb1) && $pmb1 == 'presinvalid') {
                                                                                                                        echo 'active';
                                                                                                                    } ?>">
                                    <i class="fa fa-check nav-icon"></i>
                                    <p>Prestasi InValid</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/prestasivalid.html" class="nav-link <?php if (!empty($pmb1) && $pmb1 == 'presvalid') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">
                                    <i class="fa fa-check nav-icon"></i>
                                    <p>Prestasi Valid</p>
                                </a>
                            </li>
                        </ul>
                    </li><!-- /.PMB -->
                    <li class="nav-item has-treeview <?php if (!empty($pmb2)) {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if (!empty($pmb2)) {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fa fa-question-circle"></i>
                            <p>
                                JALUR TES
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/test.html" class="nav-link <?php if (!empty($pmb2) && $pmb2 == 'tes') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tes All</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/testinvalid.html" class="nav-link <?php if (!empty($pmb2) && $pmb2 == 'invalid') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tes InValid</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                <a href="<?php echo base_url(); ?>masterpmb/test1.html" class="nav-link <?php if (!empty($pmb2) && $pmb2 == 'tes1') {
                                                                                            echo 'active';
                                                                                        } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Test Gel 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>masterpmb/test2.html" class="nav-link <?php if (!empty($pmb2) && $pmb2 == 'tes2') {
                                                                                            echo 'active';
                                                                                        } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Test Gel 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>masterpmb/test3.html" class="nav-link <?php if (!empty($pmb2) && $pmb2 == 'tes3') {
                                                                                            echo 'active';
                                                                                        } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Test Gel 3</p>
                </a>
              </li> -->
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/testvalid.html" class="nav-link <?php if (!empty($pmb2) && $pmb2 == 'valid') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tes Valid</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                <a href="<?php echo base_url(); ?>masterpmb/testvalid1.html" class="nav-link <?php if (!empty($pmb2) && $pmb2 == 'valid1') {
                                                                                                    echo 'active';
                                                                                                } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tes Valid Gel 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>masterpmb/testvalid2.html" class="nav-link <?php if (!empty($pmb2) && $pmb2 == 'valid2') {
                                                                                                    echo 'active';
                                                                                                } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tes Valid Gel 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>masterpmb/testvalid3.html" class="nav-link <?php if (!empty($pmb2) && $pmb2 == 'valid3') {
                                                                                                    echo 'active';
                                                                                                } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tes Valid Gel 3</p>
                </a>
              </li> -->
                        </ul>
                    </li><!-- /.PMB -->
                    <li class="nav-item has-treeview <?php if (!empty($reg)) {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if (!empty($reg)) {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Reguler II
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/reguler2.html" class="nav-link <?php if (!empty($reg) && $reg == 'reg2') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="nav-icon fab fa-black-tie"></i>
                                    <p>
                                        Reguler II All
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/reguler2invalid.html" class="nav-link <?php if (!empty(!empty($reg) && $reg == 'inreg22')) {
                                                                                                                        echo 'active';
                                                                                                                    } ?>">
                                    <i class="nav-icon fab fa-black-tie"></i>
                                    <p>
                                        Reguler II InValid
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/reguler2valid.html" class="nav-link <?php if (!empty(!empty($reg) && $reg == 'reg22')) {
                                                                                                                    echo 'active';
                                                                                                                } ?>">
                                    <i class="nav-icon fab fa-black-tie"></i>
                                    <p>
                                        Reguler II Valid
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?php if (!empty($pmb3)) {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if (!empty($pmb3)) {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fa fa-university"></i>
                            <p>
                                PRODI LULUS
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/pgsd.html" class="nav-link <?php if (!empty($pmb3) && $pmb3 == 'pgsd') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>PGSD</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/pgpaud.html" class="nav-link <?php if (!empty($pmb3) && $pmb3 == 'pgpaud') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>PG-PAUD</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/pbsi.html" class="nav-link <?php if (!empty($pmb3) && $pmb3 == 'pbsi') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>PBSI</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/pbi.html" class="nav-link <?php if (!empty($pmb3) && $pmb3 == 'pbi') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>PBI</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/pbio.html" class="nav-link <?php if (!empty($pmb3) && $pmb3 == 'pbio') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>P BIOLOGI</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/pmat.html" class="nav-link <?php if (!empty($pmb3) && $pmb3 == 'pmat') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>P MATEMATIKA</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/ppkn.html" class="nav-link <?php if (!empty($pmb3) && $pmb3 == 'ppkn') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>PPKN</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/komputer.html" class="nav-link <?php if (!empty($pmb3) && $pmb3 == 'komputer') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>P KOMPUTER</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/ekonomi.html" class="nav-link <?php if (!empty($pmb3) && $pmb3 == 'ekonomi') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>P EKONOMI</p>
                                </a>
                            </li>
                        </ul>
                    </li><!-- /.PMB -->
                    <li class="nav-item has-treeview <?php if (!empty($pmbregis)) {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if (!empty($pmbregis)) {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                PRODI REGIS
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/pgsdregis.html" class="nav-link <?php if (!empty($pmbregis) && $pmbregis == 'pgsdregis') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>PGSD</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/pgpaudregis.html" class="nav-link <?php if (!empty($pmbregis) && $pmbregis == 'pgpaudregis') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>PG-PAUD</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/pbsiregis.html" class="nav-link <?php if (!empty($pmbregis) && $pmbregis == 'pbsiregis') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>PBSI</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/pbiregis.html" class="nav-link <?php if (!empty($pmbregis) && $pmbregis == 'pbiregis') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>PBI</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/pbioregis.html" class="nav-link <?php if (!empty($pmbregis) && $pmbregis == 'pbioregis') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>P BIOLOGI</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/pmatregis.html" class="nav-link <?php if (!empty($pmbregis) && $pmbregis == 'pmatregis') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>P MATEMATIKA</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/ppknregis.html" class="nav-link <?php if (!empty($pmbregis) && $pmbregis == 'ppknregis') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>PPKN</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/komputerregis.html" class="nav-link <?php if (!empty($pmbregis) && $pmbregis == 'komputerregis') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>P KOMPUTER</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>masterpmb/ekonomiregis.html" class="nav-link <?php if (!empty($pmbregis) && $pmbregis == 'ekonomiregis') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">
                                    <i class="fa fa-minus nav-icon"></i>
                                    <p>P EKONOMI</p>
                                </a>
                            </li>
                        </ul>
                    </li><!-- /.PMB -->
                <?php } ?>

                <?php if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") { ?>
                    <li class="nav-item has-treeview <?php if (!empty($pmbx)) {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if (!empty($pmbx)) {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>
                                TES ONLINE
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/testbank.html" class="nav-link <?php if (!empty($pmbx) && $pmbx == 'testbank1') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jalur Tes Gel 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/testbank2.html" class="nav-link <?php if (!empty($pmbx) && $pmbx == 'testbank2') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jalur Tes Gel 2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/testbank3.html" class="nav-link <?php if (!empty($pmbx) && $pmbx == 'testbank3') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jalur Tes Gel 3</p>
                                </a>
                            </li>
                        </ul>
                    </li><!-- /.PMB -->

                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>midtrans/index.html" class="nav-link <?php if (!empty($midtrans)) {
                                                                                                    echo 'active';
                                                                                                } ?>">
                            <i class="fas fa-credit-card nav-icon"></i>
                            <p>
                                Midtrans
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview <?php if (!empty($bank)) {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if (!empty($bank)) {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fa fa-industry"></i>
                            <p>
                                PEMBAYARAN BANK
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/index.html" class="nav-link <?php if (!empty($bank) && $bank == 'index') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Belum Divalidasi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/valid.html" class="nav-link <?php if (!empty($bank) && $bank == 'valid') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Valid Jalur Prestasi 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/validtes.html" class="nav-link <?php if (!empty($bank) && $bank == 'validtes') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Valid Jalur Tes 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/valid2.html" class="nav-link <?php if (!empty($bank) && $bank == 'valid2') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Valid Jalur Prestasi 2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/validtes2.html" class="nav-link <?php if (!empty($bank) && $bank == 'validtes2') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Valid Jalur Tes 2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/regis.html" class="nav-link <?php if (!empty($bank) && $bank == 'regis') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Maba Regis</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/tidak.html" class="nav-link <?php if (!empty($bank) && $bank == 'tidak') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tidak Valid</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/semua.html" class="nav-link <?php if (!empty($bank) && $bank == 'semua') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/testbanktiga.html" class="nav-link <?php if (!empty($bank) && $bank == 'testbanktiga') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jalur Tes 3</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/testbanktigabelum.html" class="nav-link <?php if (!empty($bank) && $bank == 'testbanktigabelum') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tes 3 Belum Putus</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>bank/testbanktigaputus.html" class="nav-link <?php if (!empty($bank) && $bank == 'testbanktigaputus') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jalur Tes 3 putus</p>
                                </a>
                            </li>
                        </ul>
                    </li><!-- /.PMB -->

                <?php } ?>

                <li class="nav-item has-treeview <?php if (!empty($pguna)) {
                                                        echo 'menu-open';
                                                    } ?>">
                    <a href="#" class="nav-link <?php if (!empty($pguna)) {
                                                    echo 'active';
                                                } ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            PENGGUNA
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "46") { ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>pengguna/index.html" class="nav-link <?php if (!empty($pguna) && $pguna == 'index') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Pengguna</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>pengguna/tambah.html" class="nav-link <?php if (!empty($pguna) && $pguna == 'tambah') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tambah Pengguna</p>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>pengguna/profil.html" class="nav-link <?php if (!empty($pguna) && $pguna == 'profil') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit Profil</p>
                            </a>
                        </li>
                    </ul>
                </li><!-- /.akhir pengguna -->

                <?php if ($this->session->userdata('pangkat_simkeu') == "admin") { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>masterpmb/sk.html" class="nav-link <?php if (!empty($sk)) {
                                                                                                    echo 'active';
                                                                                                } ?>">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Surat Keputusan
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <li class="nav-item has-treeview <?php if (!empty($pkkmb)) {
                                                        echo 'menu-open';
                                                    } ?>">
                    <a href="#" class="nav-link <?php if (!empty($pkkmb)) {
                                                    echo 'active';
                                                } ?>">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>
                            PKKMB
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>pkkmb/semua.html" class="nav-link <?php if (!empty($semua)) {
                                                                                                    echo 'active';
                                                                                                } ?>">
                                <i class="fas fa-check"></i>
                                <p>
                                    Sudah Daftar PKKMB
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>pkkmb/lulus.html" class="nav-link <?php if (!empty($lulus)) {
                                                                                                    echo 'active';
                                                                                                } ?>">
                                <i class="fas fa-check"></i>
                                <p>
                                    Lulus, Belum Daftar PKKMB
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>pkkmb/index.html" class="nav-link <?php if (!empty($regiss)) {
                                                                                                    echo 'active';
                                                                                                } ?>">
                                <i class="fas fa-check"></i>
                                <p>
                                    Regis, Belum Daftar PKKMB
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "54" || $this->session->userdata('pengguna_id_simkeu') == "46") { ?>
                    <li class="nav-item has-treeview <?php if (!empty($analisis)) {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if (!empty($analisis)) {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fas fa-glasses"></i>
                            <p>
                                Analisis Registrasi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>analisis/index.html" class="nav-link <?php if (!empty($analisregis)) {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Sudah Registrasi
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>analisis/belumbayar.html" class="nav-link <?php if (!empty($blmbayarregis)) {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Belum Registrasi
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('pangkat_simkeu') == "admin") { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>analisis/sekolah.html" class="nav-link <?php if (!empty($sk)) {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                            <i class="nav-icon fas fa-school"></i>
                            <p>
                                Analisis Asal Sekolah
                            </p>
                        </a>
                    </li>
                <?php } ?>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
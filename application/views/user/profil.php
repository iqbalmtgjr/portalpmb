<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
        <div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <?php if(!empty($user->foto)) { ?>
                            <img src="<?php echo base_url(); ?>foto/<?php echo $user->foto; ?>" alt=""/>
                            <?php }else{ ?>
                            <img src="<?php echo base_url(); ?>dist/img/avatar5.png" alt=""/>
                            <?php } ?>
                            <a href="<?php echo base_url(); ?>pengguna/foto.html" class="file btn btn-lg btn-primary">
                               Ubah Foto
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo ucfirst($user->nama); ?>
                                    </h5>
                                    <h6>
                                       <?php echo ucfirst($user->unit); ?>
                                    </h6>
                                     <h6 class="text-danger">
                                       <?php echo ucfirst($user->apli); ?>
                                    </h6>
                                    <p class="proile-rating"><?php echo $user->email; ?></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                               
                            </ul>
                             <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Pangkat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo ucfirst($user->pangkat); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($user->status == '0') { echo 'Aktif';} else{ echo 'Tidak Aktif';} ?></p>
                                            </div>
                                        </div>
                                       
                            </div>
                            
                            
                        </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url(); ?>pengguna/ganti.html" class="btn btn-sm btn-secondary">Ganti Password</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                       
                    </div>
                </div>
                     
        </div>
      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
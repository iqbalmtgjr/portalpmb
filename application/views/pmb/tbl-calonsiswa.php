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
					<h3 class="card-title">Daftar Pendaftar PMB <?php if (!empty($jdl)) {
																	echo $jdl;
																} ?></h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="table-responsive">
						<input type="hidden" class="form-control input-sm" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
						<table id="mytable" class="table table-striped table-bordered" style="width: 100%;">
							<thead>
								<tr>
									<th>No.</th>
									<th></th>
									<th></th>
									<th>Nomor Pendaftaran</th>
									<th>Nama</th>
									<th>Pilihan I</th>
									<th>Pilihan II</th>
									<th>Jalur</th>
									<th>Tanggal Daftar</th>
									<th>Tindakan</th>
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
<!-- /.content-wrapper -->
<!-- Modal delete Berita-->
<?php echo form_open('masterpmb/hapus', 'id="add-row-form"'); ?>
<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Hapus Calon Maba</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="maba_id" class="form-control" required>
				<strong>Apakah Anda yakin akan menghapus data calon maba ini?</strong>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<button type="submit" class="btn btn-success">Hapus</button>
			</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
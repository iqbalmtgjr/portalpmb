<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dispensasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('mdispensasi', 'dispensasi');
		if (empty($this->session->userdata('email_simkeu'))) {
			redirect('main/index');
		}
		if ($this->session->userdata('apli') != "uang") {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
		}
	}
	public function index()
	{
		if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52") {
			$data = array(
				'js' => array(
					'plugins/datatables/jquery.dataTables.js',
					'plugins/datatables-bs4/js/dataTables.bootstrap4.js',
					'assets/daftar_item.js',
					'assets/button/dataTables.buttons.min.js',
					'assets/button/buttons.bootstrap4.min.js',
					'assets/button/jszip.min.js',
					'assets/button/pdfmake.min.js',
					'assets/button/vfs_fonts.js',
					'assets/button/buttons.html5.min.js'
				),
				'css' => array(
					'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
					'assets/button/buttons.bootstrap4.min.css',
					'assets/button/buttontable.css'
				),
				'menu' => 'ditem'
			);
			$this->template->view('dispen/tbl-dispen', $data);
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
		}
	}
	function get_item_json()
	{
		if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52") {
			$dutu = $this->dispensasi->get_all_item();
			$array_data = json_decode($dutu, true);
			$extra = array(
				$this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
			);
			$array_data[] = $extra;
			$final_data = json_encode($array_data);
			echo $final_data;
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
		}
	}
	public function tambahdispensasi()
	{
		if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52") {
			$this->load->library('form_validation');
			$this->form_validation->set_rules(
				'no',
				'Nomor Dokumen',
				'trim|required|is_unique[dispen.no]',
				array(
					'required'      => '%s tidak boleh kosong!',
					'is_unique'      => '%s sudah terdaftar!'
				)
			);
			$this->form_validation->set_rules(
				'nama',
				'Nama',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'nim',
				'NIM',
				'trim|required|numeric',
				array(
					'required'      => '%s tidak boleh kosong!',
					'numeric'      => '%s harus angka!'
				)
			);
			$this->form_validation->set_rules(
				'prodi',
				'Prodi',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'smt',
				'Semester',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'kelas',
				'Kelas',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'tunggak',
				'Tunggakan',
				'trim|required|numeric',
				array(
					'required'      => '%s tidak boleh kosong!',
					'numeric'      => '%s harus angka!'
				)
			);
			$this->form_validation->set_rules(
				'cicil',
				'Cicilan Tunggakan',
				'trim|required|numeric',
				array(
					'required'      => '%s tidak boleh kosong!',
					'numeric'      => '%s harus angka!'
				)
			);
			$this->form_validation->set_rules(
				'tglbuat',
				'Tanggal Dispensasi',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'kadaluarsa',
				'Kadaluarsa Dispensasi',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'keperluan',
				'Keperluan Dispensasi',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'menu' => 'unit',
					'prodi' => $this->dispensasi->ambil_prodi()->result(),
					'js' => array('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', 'assets/tglambil.js'),
					'css' => array('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'),
					'semester' => $this->dispensasi->ambil_smt()->result()
				);
				$this->template->view('dispen/tbh-dispen', $data);
			} else {


				$input = $this->input->post(NULL, TRUE);
				$cek = $this->dispensasi->cek_mhs($input['nim']);

				if (empty($cek)) {
					$mhs = array();
					$mhs['nim'] = $input['nim'];
					$mhs['nama'] = $input['nama'];
					$mhs['prodi'] = $input['prodi'];
					$mhs['kelas'] = $input['kelas'];
					$idmsis = $this->dispensasi->MasukData('mahasiswa', $mhs);
				} else {
					$idmsis = $cek->row()->id_mahasiswa;
				}
				$jdis = $this->dispensasi->jlmdispen($input['nim'])->result();
				$tung = count($jdis);
				if ($tung == 3) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Kuota Dispen Habis.</div>');
					redirect('dispensasi/tambahdispensasi');
				}
				$tung = str_replace('.', '', $input['tunggak']);
				$cil = str_replace('.', '', $input['cicil']);
				$dis = array();
				$dis['no'] = $input['no'];
				$dis['semester'] = $input['smt'];
				$dis['tunggakan'] = $tung;
				$dis['cicilan'] = $cil;
				$dis['tgl_buat'] = $input['tglbuat'];
				$dis['kadaluarsa'] = $input['kadaluarsa'];
				$dis['nimdis'] = $input['nim'];
				$dis['id_msiswa_dispen'] = $idmsis;
				$dis['prodis'] = $input['prodi'];
				$dis['keperluan'] = $input['keperluan'];
				$res = $this->dispensasi->InsertData('dispen', $dis);

				if (!$res) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Tambah data gagal.</div>');
					redirect('dispensasi/index');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Tambah data berhasil.</div>');
					redirect('dispensasi/index');
				}
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
		}
	}
	public function tbhdispen($id)
	{
		if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52") {
			$cuk = $this->dispensasi->amdatamas($id);
			if (empty($cuk)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data Tidak ditemukan.</div>');
				redirect('dispensasi/tambahdispensasi');
			}
			$this->load->library('form_validation');
			$this->form_validation->set_rules(
				'no',
				'Nomor Dokumen',
				'trim|required|is_unique[dispen.no]',
				array(
					'required'      => '%s tidak boleh kosong!',
					'is_unique'      => '%s sudah terdaftar!'
				)
			);
			$this->form_validation->set_rules(
				'nama',
				'Nama',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'nim',
				'NIM',
				'trim|required|numeric',
				array(
					'required'      => '%s tidak boleh kosong!',
					'numeric'      => '%s harus angka!'
				)
			);
			$this->form_validation->set_rules(
				'prodi',
				'Prodi',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'smt',
				'Semester',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'kelas',
				'Kelas',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'tunggak',
				'Tunggakan',
				'trim|required|numeric',
				array(
					'required'      => '%s tidak boleh kosong!',
					'numeric'      => '%s harus angka!'
				)
			);
			$this->form_validation->set_rules(
				'cicil',
				'Cicilan Tunggakan',
				'trim|required|numeric',
				array(
					'required'      => '%s tidak boleh kosong!',
					'numeric'      => '%s harus angka!'
				)
			);
			$this->form_validation->set_rules(
				'tglbuat',
				'Tanggal Dispensasi',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'kadaluarsa',
				'Kadaluarsa Dispensasi',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'keperluan',
				'Keperluan Dispensasi',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'menu' => 'unit',
					'prodi' => $this->dispensasi->ambil_prodi()->result(),
					'js' => array('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', 'assets/tglambil.js'),
					'css' => array('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'),
					'semester' => $this->dispensasi->ambil_smt()->result(),
					'datamas' => $cuk
				);
				$this->template->view('dispen/tbh-dispen2', $data);
			} else {


				$input = $this->input->post(NULL, TRUE);
				$jdis = $this->dispensasi->jlmdispen($input['nim'])->result();
				$tung = count($jdis);
				if ($tung == 3) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Kuota Dispen Habis.</div>');
					redirect('dispensasi/tambahdispensasi');
				}
				$tung = str_replace('.', '', $input['tunggak']);
				$cil = str_replace('.', '', $input['cicil']);
				$dis = array();
				$dis['no'] = $input['no'];
				$dis['semester'] = $input['smt'];
				$dis['tunggakan'] = $tung;
				$dis['cicilan'] = $cil;
				$dis['tgl_buat'] = $input['tglbuat'];
				$dis['kadaluarsa'] = $input['kadaluarsa'];
				$dis['nimdis'] = $input['nim'];
				$dis['prodis'] = $input['prodi'];
				$dis['keperluan'] = $input['keperluan'];
				$res = $this->dispensasi->InsertData('dispen', $dis);
				if (!$res) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Tambah data gagal.</div>');
					redirect('dispensasi/index');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Tambah data berhasil.</div>');
					redirect('dispensasi/index');
				}
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
		}
	}

	public function lihatdispen($id = 0)
	{
		if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52") {
			$cek = $this->dispensasi->ambil_all_dispen($id);
			if (empty($cek)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Data Tidak ditemukan.</div>');
				redirect('dispensasi/index');
			}
			$data = array(
				'menu' => 'ditem',
				'detildis' => $cek
			);
			$this->template->view('dispen/lihatdispensasi', $data);
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
		}
	}
	public function lunas()
	{
		if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52") {
			$id = $this->input->post('id');
			$dat = $this->dispensasi->amdis($id)->row();
			$cek = $dat->kadaluarsa;
			$cekstor = strtotime(str_replace('/', '-', $cek));
			date_default_timezone_set('Asia/Jakarta');
			$pit = strtotime("now");
			if (empty($dat->lunas)) {
				if ($cekstor >= $pit) {
					$input_data = array();
					$input_data['lunas'] = $pit;
					$where = array('dis_id' => $id);
					$res = $this->db->update('dispen', $input_data, $where);
					if ($res >= 1) {
						$this->session->set_flashdata('pesan', '<p class="text-success">Update Data Sukses</p>');
						$referred_from = $this->session->userdata('referred_from');
						redirect($referred_from, 'refresh');
					} else {
						$this->session->set_flashdata('pesan', '<p class="text-danger">Update Data Gagal</p>');
						$referred_from = $this->session->userdata('referred_from');
						redirect($referred_from, 'refresh');
					}
				} else {
					$this->session->set_flashdata('pesan', '<p class="text-danger">Dispensasi ini telah kadaluarsa</p>');
					$referred_from = $this->session->userdata('referred_from');
					redirect($referred_from, 'refresh');
				}
			} else {
				$this->session->set_flashdata('pesan', '<p class="text-danger">Dispensasi ini telah diupdate</p>');
				$referred_from = $this->session->userdata('referred_from');
				redirect($referred_from, 'refresh');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
		}
	}
}

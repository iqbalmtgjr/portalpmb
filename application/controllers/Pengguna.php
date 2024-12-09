<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengguna extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mpengguna', 'pengguna');
		if (empty($this->session->userdata('email_simkeu'))) {
			redirect('main/index');
		}
	}

	//public function index(){
	//	$field = array(
	//		$this->input->get('per_page'),
	//		$this->input->get('status'),
	//		$this->input->get('query')
	//		);
	// set pagination
	//		$config = $this->template->pagination_list();

	//		$config['base_url'] = site_url("pengguna/index?per_page=".$field[0]."&status=".$field[1]."&query=".$field[2]);

	//		$config['per_page'] = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');
	//		$config['total_rows'] = $this->pengguna->get_all(null, null, 'num');

	//		$this->pagination->initialize($config);
	//			$data = array(
	//  		'pguna' => 'index',
	//   		'daftar_dispen' => $this->pengguna->get_all($config['per_page'], $this->input->get('page')),
	//   		'jumlah_dispen' => $config['total_rows']
	//   		);
	//		$this->template->view('user/dispen', $data);

	//   }
	public function index()
	{

		if (($this->session->userdata('pengguna_id_simkeu') == "45") || ($this->session->userdata('pengguna_id_simkeu') == "46")) {
			$data = array(
				'user' => $this->pengguna->get_all_user(),
				'js2' => array('https://cdn.datatables.net/2.1.4/js/dataTables.min.js', 'https://code.jquery.com/jquery-3.7.1.min.js'),
				'css2' => array('https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css'),
				'pguna' => 'index',
			);
			// $this->load->library('pagination');
			//      $config['base_url'] = base_url('pengguna/index/');
			//             $config['total_rows'] = $this->pengguna->total_user();
			//             $config['per_page'] = 10;
			//             $config["num_links"] = 1;
			//             $config['first_link']       = '<<';
			//             $config['last_link']        = '>>';
			//             $config['next_link']        = '>';
			//             $config['prev_link']        = '<';
			//             $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center pagination-sm">';
			//             $config['full_tag_close']   = '</ul></nav></div>';
			//             $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			//             $config['num_tag_close']    = '</span></li>';
			//             $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			//             $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			//             $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			//             $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			//             $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			//             $config['prev_tagl_close']  = '</span>Next</li>';
			//             $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			//             $config['first_tagl_close'] = '</span></li>';
			//             $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			//             $config['last_tagl_close']  = '</span></li>';
			//             $this->pagination->initialize($config);
			//             $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
			// $data['user'] = $this->pengguna->ambil_usertotal($config["per_page"], $data['page'])->result(); 
			// $data['pagination'] = $this->pagination->create_links();
			// $data['hasil'] = $this->pengguna->total_user();
			// print_r($data['user']); die;

			$this->template->view('user/tbl-user', $data);
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
			redirect('pengguna/profil');
		}
	}
	public function tambah()
	{

		if (($this->session->userdata('pengguna_id_simkeu') == "45") || ($this->session->userdata('pengguna_id_simkeu') == "46")) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules(
				'unit',
				'Unit',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!',
				)
			);
			$this->form_validation->set_rules(
				'nama',
				'Nama Pengguna',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!',
				)
			);
			$this->form_validation->set_rules(
				'mail',
				'Email',
				'trim|required|is_unique[pengguna.email]',
				array(
					'required'      => '%s tidak boleh kosong!',
					'is_unique'      => '%s sudah digunakan!'
				)
			);
			$this->form_validation->set_rules(
				'kunci',
				'Password',
				'trim|required|min_length[8]',
				array(
					'required'      => '%s tidak boleh kosong!',
				)
			);
			$this->form_validation->set_rules(
				'pangkat',
				'Pangkat',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'status',
				'Status',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!',
				)
			);
			$this->form_validation->set_rules(
				'apli',
				'Aplikasi',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!',
				)
			);
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'pguna' => 'tambah',
					'unit' => $this->pengguna->ambil_unit()->result()
				);
				$this->template->view('user/tbh-user', $data);
			} else {
				$input = $this->input->post(NULL, TRUE);
				$dat = array();
				$dat['unit_pengguna'] = $input['unit'];
				$dat['email'] = $input['mail'];
				$dat['nama'] = $input['nama'];
				$dat['password'] = password_hash($input['kunci'], PASSWORD_DEFAULT);
				$dat['pangkat'] = $input['pangkat'];
				$dat['status'] = $input['status'];
				$dat['apli'] = $input['apli'];

				$res = $this->pengguna->InsertData('pengguna', $dat);
				if (!$res) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Tambah pengguna gagal.</div>');
					redirect('pengguna/tambah');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Tambah pengguna berhasil.</div>');
					redirect('pengguna/tambah');
				}
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
			redirect('pengguna/profil');
		}
	}
	public function ubah($id)
	{
		if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "46") {
			$this->load->library('form_validation');
			$this->form_validation->set_rules(
				'unit',
				'Unit',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!',
				)
			);
			$this->form_validation->set_rules(
				'nma',
				'Nama Pengguna',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!',
				)
			);

			$this->form_validation->set_rules(
				'pangkat',
				'Pangkat',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!'
				)
			);
			$this->form_validation->set_rules(
				'status',
				'Status',
				'trim|required',
				array(
					'required'      => '%s tidak boleh kosong!',
				)
			);
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ($this->form_validation->run() == FALSE) {


				$data = array(
					'pguna' => 'tambah',
					'unit' => $this->pengguna->ambil_unit()->result(),
					'user' => $this->pengguna->get_orang($id)->row()
				);
				$this->template->view('user/ubh-user', $data);
			} else {
				$input = $this->input->post(NULL, TRUE);
				$dat = array();
				$dat['unit_pengguna'] = $input['unit'];
				$dat['nama'] = $input['nma'];
				$dat['pangkat'] = $input['pangkat'];
				$dat['status'] = $input['status'];
				$dat['apli'] = $input['aplikasi'];
				$where = array(
					'pengguna_id' => $id
				);
				$this->pengguna->update_user($dat, $where);
				if ($id == "45") {
					$account_session = array(
						'apli' => $input['aplikasi']
					);
					$this->session->set_userdata($account_session);
				}
				redirect(current_url());
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
			redirect('pengguna/profil');
		}
	}
	public function ganti()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('lama', 'Password Lama', 'trim|required|callback_validate_password');
		$this->form_validation->set_rules(
			'baru',
			'Password Baru',
			'trim|required|min_length[8]|max_length[12]',
			array(
				'min_length'      => '%s minimal 8 karakter!',
				'max_length'      => '%s maksimal 12 karakter!',
				'required'      => '%s tidak boleh kosong!',
			)
		);
		$this->form_validation->set_rules(
			'ulang',
			'Pengulangan Password',
			'trim|required|matches[baru]',
			array(
				'matches'      => '%s tidak cocok!',
				'required'      => '%s tidak boleh kosong!',
			)
		);

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'pguna' => 'profil'
			);
			$this->template->view('user/ganti-password', $data);
		} else {
			$input = $this->input->post(NULL, TRUE);
			$dat = array();
			$dat['password'] = password_hash($input['baru'], PASSWORD_DEFAULT);
			$where = array(
				'pengguna_id' => $this->session->userdata('pengguna_id_simkeu')
			);
			$this->pengguna->login_update($dat, $where);
			redirect(current_url(), 'refresh');
		}
	}
	public function validate_password()
	{
		$get = $this->pengguna->get_user($this->session->userdata('pengguna_id_simkeu'));

		if (password_verify($this->input->post('lama'), $get->password)) {
			return true;
		} else {
			$this->form_validation->set_message('validate_password', 'Password lama anda tidak cocok!');
			return false;
		}
	}
	public function profil()
	{
		$idsaya = $this->session->userdata('pengguna_id_simkeu');
		$data = array(
			'pguna' => 'profil',
			'user' => $this->pengguna->saya($idsaya)->row(),
			'css' => array('assets/profil.css')
		);

		$this->template->view('user/profil', $data);
	}
	public function foto()
	{
		$id = $this->session->userdata('pengguna_id_simkeu');
		$data = $this->pengguna->get_orang($id);
		if (empty($data)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Data tidak ditemukan.</div>');
			redirect('pengguna/index');
		} else {
			$pdk = $data->row();
			$data = array(
				'pguna' => 'profil',
				'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
				'warga' => $pdk,
			);
			$this->template->view('user/foto-profil', $data);
		}
	}
	public function foto_do()
	{
		$id = $this->session->userdata('pengguna_id_simkeu');
		$data = $this->pengguna->get_orang($id);
		if (empty($data)) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Data tidak ditemukan.</div>');
			redirect('pengguna/index');
		} else {
			$pdk = $data->row();
			$data = array(
				'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
				'warga' => $pdk,
				'pguna' => 'profil'
			);

			$config['upload_path'] = '../portalpmb.persadakhatulistiwa.ac.id/foto/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '3048';
			//$config['max_width']            = 300;
			//$config['max_height']           = 300;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('userfile')) {
				$data['error'] = $this->upload->display_errors('<p class="text-danger">', '</p>');
				$this->template->view('user/foto-profil', $data);
			} else {
				$inputan = $this->input->post(NULL, TRUE);
				$namafile = $this->upload->data('file_name');
				$input_data = array();
				$gam = $pdk->foto;
				if (!empty($gam)) {
					$path = '../portalpmb.persadakhatulistiwa.ac.id/foto/' . $gam;
					$res = @unlink($path);
				}
				$input_data['foto'] = $namafile;
				$where = array('pengguna_id' => $id);
				$this->pengguna->update_user($input_data, $where);
				$account_session = array(
					'foto_simkeu' => $input_data['foto']
				);
				$this->session->set_userdata($account_session);
				redirect('pengguna/profil');
			}
		}
	}
	function hapus($id)
	{
		if ($this->session->userdata('pengguna_id_simkeu') == '45' || $this->session->userdata('pengguna_id_simkeu') == "46") {
			$data = $this->pengguna->get_orang($id)->row();
			if (!empty($data->foto)) {
				$path = '../portalpmb.persadakhatulistiwa.ac.id/foto/' . $data->foto;
				$res = @unlink($path);
			}
			$this->pengguna->delete_user($id);
			redirect('pengguna/index');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
			redirect('pengguna/index');
		}
	}
	public function signout()
	{
		$this->session->sess_destroy();
		redirect('main/index');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();	
		$this->load->library('datatables');
		$this->load->model('mmahasiswa','mahasiswa');
		if(empty($this->session->userdata('email_simkeu'))) {
			redirect('main/index');
		}
		 if($this->session->userdata('apli') !="uang") {
		     $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
		}
	}

	public function index()
	{
		$data = array(
		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js','assets/daftar_msiswa.js'),
		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
		'msiswa' => 'index'		
		);
		$this->template->view('msiswa/tbl-mahasiswa', $data);
	}
	
	function get_msiswa_json() {
	  $dutu = $this->mahasiswa->get_all_msiswa();	
	 // print_r($dutu); die;
	  $array_data = json_decode($dutu, true);  
                $extra = array(					
                     $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()        
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data); 			
    echo $final_data;	 
	}
	public function lihatmahasiswa($id = 0)
	{
	    $dada=$this->mahasiswa->ambil_mahasiswa($id);
	    if(!empty($dada)) {
	        $mhs = $dada->row();
	    }else{
	        $mhs = '';
	    }
		$data = array(
		'mahasiswa' => $mhs,
		'msiswa' => 'index'		
		);
		$this->template->view('msiswa/lihat-mahasiswa', $data);
	}
	public function tambahmahasiswa()
	{	
	   
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('nim', 'NIM','trim|required|is_unique[mahasiswa.nim]',
			array(
					'required'      => '%s tidak boleh kosong!',
					'is_unique'      => '%s sudah ada!'
			)
        );
		$this->form_validation->set_rules('nama', 'Nama','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
		$this->form_validation->set_rules('prodi', 'Prodi','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
        $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
		
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
            
			$data = array(
			'namadosen' => $this->mahasiswa->ambil_nama_dosen(),
			'msiswa' => 'tbh',
			'js' => array('plugins/daterangepicker/daterangepicker.js','plugins/moment/moment.min.js','plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js','assets/pickertgl.js','plugins/select2/js/select2.full.min.js','assets/select.js'),
			'css' => array('plugins/daterangepicker/daterangepicker.css','plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css','plugins/select2/css/select2.min.css'),
			'prodi' => $this->mahasiswa->ambil_prodi()->result()
			);
			$this->template->view('msiswa/tbh-mahasiswa', $data);
		}
		else
		 {
			$input = $this->input->post(NULL, TRUE);
			$mahasiswa = array();
			$mahasiswa['nim'] = $input['nim'];
			$mahasiswa['nama'] = $input['nama'];
			$mahasiswa['genders'] = $input['jekel'];
			$mahasiswa['tempat_lahir'] = $input['tempat'];
			$mahasiswa['tanggal'] = $input['tgl'];
			$mahasiswa['kota_id'] = 0;
			$mahasiswa['provinsi_id'] = 0;
			$mahasiswa['alamat'] = $input['alamat'];
			$mahasiswa['foto'] = "";
			$mahasiswa['agama'] = $input['religion'];
			$mahasiswa['pekerjaan'] = $input['kerja'];
			$mahasiswa['prodi'] = $input['prodi'];
			$mahasiswa['kelas'] = $input['kelas'];
			$mahasiswa['tahun_masuk'] = $input['tahun_masuk'];
			$mahasiswa['semester_masuk'] = "";
			$mahasiswa['tahun_ajaran'] = "";
			$mahasiswa['status'] = "active";
			$mahasiswa['dosen_pa'] = $input['pa'];
			$mahasiswa['semester_aktif'] = "";
			
			$this->db->insert('mahasiswa', $mahasiswa);
			
		    $student_id = $this->db->insert_id();
		    
			$parents = array();
			$parents['student_id'] = $student_id;
			$parents['father_name'] =  $input['ayah'];
			$parents['mother_name'] =  $input['ibu'];
			$parents['parent_address'] =  $input['alamatortu'];
			$parents['city_id'] =  0;
			$parents['province_id'] =  0;
			$parents['phone_number'] =  $input['hportu'];
			$parents['father_jobs'] =  $input['kerjaayah'];
			$parents['mother_jobs' ] =  $input['kerjaibu'];
			$parents['revenue'] =  $input['pendapatan'];
		    $this->db->insert('students_parent', $parents);
		    
		    $school = array();
			$school['school_student_id'] = $student_id;
			$school['school_name'] =  $input['sekolah'];
			$school['school_study'] =  $input['jurusan'];
			$school['school_address'] =  $input['alamatsekolah'];
			$school['school_city_id'] =  0;
			$school['school_province_id'] =  0;
			$school['certificate_number'] =  $input['ijasah'];
			$school['graduation_year'] =  $input['tahunlulus'];
			$school['grade_value'] =  $input['nilai'];

		$this->db->insert('students_origin_school', $school);

		$account = array();
			$account['account_student_id'] = $student_id;
			$account['email'] =  '';
			$account['password'] =  password_hash($input['nim'], PASSWORD_DEFAULT);
			$account['forgot_key'] =  0;
			$account['maha'] =  '';
		
		$this->db->insert('students_accounts', $account);
		if($this->db->affected_rows())
		{
		    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Tambah data berhasil.</div>');
			redirect('mahasiswa/index');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Tambah data gagal.</div>');
			redirect('mahasiswa/index');
		}
		 }		
	}	
	public function ubhmahasiswa($id = 0)
	{	
	   
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama', 'Nama','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
		$this->form_validation->set_rules('prodi', 'Prodi','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
		
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
            $dada=$this->mahasiswa->ambil_mahasiswa($id);
    	    if(!empty($dada)) {
    	        $mhs = $dada->row();
    	    }else{
    	        $mhs = '';
    	    }
			$data = array(
			'mahasiswa' => $mhs,
			'namadosen' => $this->mahasiswa->ambil_nama_dosen(),
			'msiswa' => 'index',
			'js' => array('plugins/daterangepicker/daterangepicker.js','plugins/moment/moment.min.js','plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js','assets/pickertgl.js','plugins/select2/js/select2.full.min.js','assets/select.js'),
			'css' => array('plugins/daterangepicker/daterangepicker.css','plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css','plugins/select2/css/select2.min.css'),
			'prodi' => $this->mahasiswa->ambil_prodi()->result()
			);
			$this->template->view('msiswa/ubh-mahasiswa', $data);
		}
		else
		 {
			$input = $this->input->post(NULL, TRUE);
			$mahasiswa = array();
			$mahasiswa['nama'] = $input['nama'];
			$mahasiswa['genders'] = $input['jekel'];
			$mahasiswa['tempat_lahir'] = $input['tempat'];
			$mahasiswa['tanggal'] = $input['tgl'];
			$mahasiswa['alamat'] = $input['alamat'];
			$mahasiswa['agama'] = $input['religion'];
			$mahasiswa['pekerjaan'] = $input['kerja'];
			$mahasiswa['prodi'] = $input['prodi'];
			$mahasiswa['kelas'] = $input['kelas'];
			$mahasiswa['tahun_masuk'] = $input['tahun_masuk'];
			$mahasiswa['dosen_pa'] = $input['pa'];
			$where =array('id_mahasiswa' => $id);
			
			$res = $this->db->update('mahasiswa', $mahasiswa, $where);
		    
		    $cekortu = $this->mahasiswa->cekortu($id);
		    
			$parents = array();
			$parents['father_name'] =  $input['ayah'];
			$parents['mother_name'] =  $input['ibu'];
			$parents['parent_address'] =  $input['alamatortu'];
			$parents['phone_number'] =  $input['hportu'];
			$parents['father_jobs'] =  $input['kerjaayah'];
			$parents['mother_jobs' ] =  $input['kerjaibu'];
			$parents['revenue'] =  $input['pendapatan'];
			
			if(!empty($cekortu)) {
			    $where =array('student_id' => $id);
			    $res += $this->db->update('students_parent', $parents, $where);
			}else {
			    $parents['student_id'] = $id;
			    $res += $this->db->insert('students_parent', $parents);
			}
		    
		    $ceksekolah = $this->mahasiswa->ceksekolah($id);
		    
		    $school = array();
			$school['school_name'] =  $input['sekolah'];
			$school['school_study'] =  $input['jurusan'];
			$school['school_address'] =  $input['alamatsekolah'];
			$school['certificate_number'] =  $input['ijasah'];
			$school['graduation_year'] =  $input['tahunlulus'];
			$school['grade_value'] =  $input['nilai'];
			
			if(!empty($ceksekolah)) {
                $where =array('school_student_id' => $id);
    			$res += $this->db->update('students_origin_school', $school, $where);
			}else {
			    $school['school_student_id'] = $id;
			    $res += $this->db->insert('students_origin_school', $school);
			}
		    
		if($res > 0)
		{
		    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Tambah data berhasil.</div>');
			redirect('mahasiswa/ubhmahasiswa/'.$id);
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Tambah data gagal.</div>');
			redirect('mahasiswa/ubhmahasiswa/'.$id);
		}
		 }		
	}
   
	// Ini untuk tambah data kilat dari keuangan
	public function tamsiswa()
	{	
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama', 'Nama Mahasiswa','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
        $this->form_validation->set_rules('nim', 'NIM','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
        $this->form_validation->set_rules('prodi', 'Program Studi','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
        $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
        $this->form_validation->set_rules('smt', 'Semester Aktif','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
        
		$this->form_validation->set_rules('sks', 'Jumlah SKS','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
		
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
            
			$data = array(
			'msiswa' => 'tbh',
			'prodi' => $this->mahasiswa->ambil_prodi()->result()
			);
			$this->template->view('msiswa/tambah-msisa', $data);
		}
		else
		 {
			$input = $this->input->post(NULL, TRUE);
			$nimnya = $input['nim'];
			$priksa = $this->mahasiswa->ceknimnya($nimnya);
			if(!empty($priksa)) {
			    $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> GAGAL !!! Mahasiswa dengan NIM: ".$nimnya." Sudah Ada</div>"); 
			    redirect(current_url());
			}
			$mahasiswa = array();
			$mahasiswa['nama'] = $input['nama'];
			$mahasiswa['nim'] = $input['nim'];
			$mahasiswa['prodi'] = $input['prodi'];
			$mahasiswa['tahun_masuk'] = $input['tahun_masuk'];
			$mahasiswa['semester_aktif'] = $input['smt'];
			
			$idm = $this->mahasiswa->MasukData('mahasiswa', $mahasiswa);
			$sksbayar = array();
			$sksbayar['nim_msiswasks'] =  $input['nim'];
			$sksbayar['id_msiswasks'] =  $idm;
			$sksbayar['prodi_sks'] =  $input['prodi'];
			$sksbayar['smt_sks'] =  $input['smt'];
			$sksbayar['sks_jumlah'] =  $input['sks'];
			
		    $res = $this->mahasiswa->InsertData('sks_mahasiswa', $sksbayar);
		    
		    if($res) {
		        $this->session->unset_userdata('pembayaran_mahasiswa_nim');
				$this->session->unset_userdata('student_prodi');
				$this->session->set_userdata('pembayaran_mahasiswa_nim',$input['nim']);
                $this->session->set_userdata('student_prodi',$input['prodi']);
			    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Tambah data berhasil.</div>');
		        redirect('biaya/datakeuangan'); 
			}else {
			    $this->session->unset_userdata('pembayaran_mahasiswa_nim');
				$this->session->unset_userdata('student_prodi');
			    $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> Gagal Menyimpan Data</div>"); 
			    redirect(current_url());
			}
		   
			
		 }		
	}
	 public function tambahskssem()
	{	
	    if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){  
	   $idnim=$this->session->userdata('pembayaran_mahasiswa_nim');
        if(empty($idnim)){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Mahasiswa Belum Dipilih.</div>');
			redirect('biaya/datakeuangan'); 
        }
	   $mhs=$this->mahasiswa->ambil_sksnim($idnim);
    	 
    	 if(empty($mhs)){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Data Tidak Ditemukan.</div>');
			redirect('biaya/datakeuangan'); 
        }
		$this->load->library('form_validation');
	
		
		$this->form_validation->set_rules('smt', 'Semester Aktif','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
        $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
		$this->form_validation->set_rules('sks_input', 'Jumlah SKS Input','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
		$this->form_validation->set_rules('smt_input', 'Semester Input','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
            
			$data = array(
			'mahasiswa' => $mhs,
			'ambilsks' => $this->mahasiswa->ambiltosks($mhs->id_mahasiswa),
			'msiswa' => 'index'
			);
			$this->template->view('msiswa/tambah-semester', $data);
		}
		else
		 {
			$input = $this->input->post(NULL, TRUE);
			$mahasiswa = array();
			
			$mahasiswa['tahun_masuk'] = $input['tahun_masuk'];
			$mahasiswa['semester_aktif'] = $input['smt'];
			$where =array('id_mahasiswa' => $mhs->id_mahasiswa);
			$res = $this->db->update('mahasiswa', $mahasiswa, $where);
		    
		    $ceksks = $this->mahasiswa->ceksks($mhs->nim,$mhs->prodi,$input['smt_input']);
		    
			$sksbayar = array();
			$sksbayar['nim_msiswasks'] =  $mhs->nim;
			$sksbayar['id_msiswasks'] =  $mhs->id_mahasiswa;
			$sksbayar['prodi_sks'] =  $mhs->prodi;
			$sksbayar['smt_sks'] =  $input['smt_input'];
			$sksbayar['sks_jumlah'] =  $input['sks_input'];
			//print_r($sksbayar); die;
			if(!empty($ceksks)) {
			     $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> SKS Semester Sudah Ada</div>"); 
			     redirect('mahasiswa/tambahskssem');
			}else {
			    
			    $res =$this->db->insert('sks_mahasiswa', $sksbayar);
			    if(!$res) {
            			     $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> Gagal input data!!!</div>"); 
            			     redirect('mahasiswa/tambahskssem');
        			}else {
        			    $this->session->set_flashdata('pesan', "<div class='alert alert-success'><i class='fa fa-check'></i> Berhasil input data!!!</div>"); 
        			    redirect('mahasiswa/tambahskssem');
        			}
			}
		 }
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
    		redirect('pengguna/profil');
	     } 
	}
	 public function ubhskssem($id=0)
	{	
	    if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){  
	   $idnim=$this->session->userdata('pembayaran_mahasiswa_nim');
        if(empty($idnim)){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Mahasiswa Belum Dipilih.</div>');
			redirect('biaya/datakeuangan'); 
        }
	   $dada=$this->mahasiswa->ambil_sksid($id);
	   //print_r($dada); die;
    	    if(empty($dada)) {
    	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Data Tidak Ditemukan.</div>');
			    redirect('biaya/datakeuangan'); 
    	    }
		$this->load->library('form_validation');
	
		
		$this->form_validation->set_rules('smt', 'Semester Aktif','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
        $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
		$this->form_validation->set_rules('sks', 'Jumlah SKS','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
		$this->form_validation->set_rules('smt_input', 'Semester Input','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
            
			$data = array(
			'mahasiswa' => $dada,
			'msiswa' => 'index'
			);
			$this->template->view('msiswa/ubh-smt', $data);
		}
		else
		 {
			$input = $this->input->post(NULL, TRUE);
			$mahasiswa = array();
			$mahasiswa['tahun_masuk'] = $input['tahun_masuk'];
			$mahasiswa['semester_aktif'] = $input['smt'];
			$where =array('id_mahasiswa' => $dada->id_mahasiswa);
			$res = $this->db->update('mahasiswa', $mahasiswa, $where);
			$sksbayar = array();
			$sksbayar['smt_sks'] =  $input['smt_input'];
			$sksbayar['sks_jumlah'] =  $input['sks'];
			$where1 =array('sks_mahasiswa_id' => $id);
			$res = $this->db->update('sks_mahasiswa', $sksbayar, $where1);
			if(!$res) {
			     $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> Gagal input data!!!</div>"); 
			     redirect('mahasiswa/tambahskssem');
			}else {
			    $this->session->set_flashdata('pesan', "<div class='alert alert-success'><i class='fa fa-check'></i> Berhasil input data!!!</div>"); 
			    redirect('mahasiswa/tambahskssem');
			}
		 }
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
    		redirect('pengguna/profil');
	     } 
	}
	public function hapusskssem($id=0){ 
	     if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48"){
    	    $idnim=$this->session->userdata('pembayaran_mahasiswa_nim');
            $res = $this->db->delete('sks_mahasiswa',array('sks_mahasiswa_id' =>$id,'nim_msiswasks' => $idnim ));
            
           	if($res >= 1){
    				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Hapus data berhasil.</div>');
    				redirect('mahasiswa/tambahskssem');
    			}else{
    				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Hapus data gagal.</div>');
    				redirect('mahasiswa/tambahskssem');
    			}
	     }else {
	         
	     $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>'); 
			redirect('pengguna/profil');
         }
	}
	 public function hapusmahasiswa(){ 
	     if($this->session->userdata('pengguna_id_simkeu') == "45"){
    	    $tampung = $this->input->post(NULL, TRUE);
    	    $minyak = $tampung['id_mahasiswa'];
    	    
    	    $unduh = $this->mahasiswa->ambil_foto($minyak);
    	    
    	    if(!empty($unduh)) {
    			    if(!empty($unduh->foto)) {
					$path = '../portal/foto/'.$unduh->foto;							
					$res = @unlink($path);
					$path1 = '../portal/foto/thumb/'.$unduh->foto;							
					$res = @unlink($path1);
				    }
    			}
            $res = $this->mahasiswa->hapussiswa($minyak,$unduh->nim);
            
           	if($res >= 1){
    				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Hapus data berhasil.</div>');
    				redirect('mahasiswa/index');
    			}else{
    				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Hapus data gagal.</div>');
    				redirect('mahasiswa/index');
    			}
	     }else {
	         
	     $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>'); 
			redirect('pengguna/profil');
         }
	}
}

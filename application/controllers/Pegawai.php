<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();	
		$this->load->library('datatables');
		$this->load->model('mpegawai','pegawai');
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
		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js','assets/pegawai/daftar_pegawai.js'),
		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
		'mdos' => 'index',
		'jdl' => 'Daftar Pegawai di Lingkungan STKIP Persada Khatulistiwa'
		);
		$this->template->view('pegawai/tbl-pegawai', $data);
	}
	public function get_pegawai_json() {
	    $dutu = $this->pegawai->get_all_pegawai();
	    $array_data = json_decode($dutu, true);  
            $extra = array(					
                 $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()        
            );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data); 			
        echo $final_data;	 
	}
	public function poton_gaji()
	{
		$data = array(
		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js','assets/pegawai/daftar_potong.js'),
		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
		'mdos' => 'potong',
		'jdl' => 'Daftar Pemotongan Gaji Pegawai'
		);
		$this->template->view('pegawai/tbl-potong', $data);
	}
	public function get_potong_json() {
	    $dutu = $this->pegawai->get_potong_pegawai();
	    $array_data = json_decode($dutu, true);  
            $extra = array(					
                 $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()        
            );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data); 			
        echo $final_data;	 
	}
	public function ubahpotong($id=0)
	{	
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){ 
	    $dos = $this->pegawai->ambil_all_dosen($id);
	   if(empty($dos)) {
	       $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data tidak ditemukan</div>');
		   redirect('pegawai/index');
	   }
	   
	    $tongga = $this->pegawai->ambil_potong_satu($id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kesehatan', 'BPJS Kesehatan','trim|integer');
		$this->form_validation->set_rules('tenagakerja', 'BPJS Ketenagakerjaan','trim|integer');
		$this->form_validation->set_rules('simatu', 'SIMATU','trim|integer');
        $this->form_validation->set_rules('pinjaman', 'Pinjaman','trim|integer');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
			$data = array(
			    'mdos' => 'tbh',
			    'dosen' =>$dos,
			    'tong' => $tongga
			);
			$this->template->view('pegawai/tbh-potong', $data);
		}
		else
		 {
		    
			$input = $this->input->post();
			$dosen = array();
			$dosen['idpege_potonggaji'] = $id;
			$dosen['bpjssehat_potong'] = $input['kesehatan'];
			$dosen['bpjskerja_potong'] = $input['tenagakerja'];
			$dosen['simatu_potonggaji'] = $input['simatu'];
			$dosen['pinjaman_potonggaji'] = $input['pinjaman'];
			$dosen['user_potonggaji'] = $this->session->userdata('pengguna_id_simkeu');
			if(!empty($tongga)) {
			    $where = array(
			        'idpege_potonggaji' => $id
			        );
			     $res = $this->pegawai->UpdateData('potong_gaji', $dosen, $where);   
			}else{
			    $dosen['idpege_potonggaji'] = $id;
			    $res = $this->pegawai->InsertData('potong_gaji', $dosen);
			}
			
		if($res >= 1)
		{
		    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Simpan data berhasil.</div>');
			redirect('pegawai/ubahpotong/'.$id);
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan data gagal.</div>');
			redirect('pegawai/ubahpotong/'.$id);
		}
		 }	
	     }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	public function lihatpegawai($id=0)
	{	
		$cek = $this->pegawai->ambil_all_dosen($id);
		if(empty($cek)){
		    $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Data Tidak ditemukan.</div>');
			redirect('pegawai/index');
		}
		$data = array(
		    'mdos' => 'index',
		    'detil' => $cek,
		    'row' => $this->pegawai->ambil_gaji_tetap($id)
		);
		$this->template->view('pegawai/lihatpegawai', $data);
	
	}
	public function setgaji($id=0, $thn=0)
	{	
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
    	    $array_items = array('bulangaji', 'tahungaji');
            $this->session->unset_userdata($array_items);
    		$newdata = array(
                'bulangaji'  => $id,
                'tahungaji'     => $thn,
            );
    	    $this->session->set_userdata($newdata);
    	    redirect('pegawai/lihatgaji');
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function lihatsatupendapatan($id=0)
	{	
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
    	    $data = array(
    		    'mdos' => 'gajibulan',
    		    'row' => $this->pegawai->pendapatansatu($id)
    		);
    		$this->template->view('pegawai/satu-pendapatan', $data);
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function lihatgaji()
	{
	    $blan = $this->session->userdata('bulangaji');
	    $thun = $this->session->userdata('tahungaji');
	    if(empty($blan) || empty($thun)) {
	        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Bulan dan Tahun Gaji belum diset.</div>');
			redirect('pegawai/gajibulan');
	    }
		$data = array(
    		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js','assets/pegawai/daftar_lihatgaji.js'),
    		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
    		'mdos' => 'gajibulan',
    		'toga' => $this->pegawai->get_tolgaji(),
    		'jdl' => 'Daftar Gaji Pegawai Bulan '.$blan.' Tahun '.$thun
		);
		$this->template->view('pegawai/tbl-lihatgaji', $data);
	}
	public function get_lihatgaji_json() {
	    $dutu = $this->pegawai->get_lihatgaji();
	    $array_data = json_decode($dutu, true);  
            $extra = array(					
                 $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()        
            );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data); 			
        echo $final_data;	 
	}
	public function gajibulan()
	{	
		if($this->session->userdata('pengguna_id_simkeu') == "45"){
        		$this->load->library('form_validation');
        		$this->form_validation->set_rules('bulan_gaji', 'Bulan Gaji','trim|required',
        			array(
        					'required'      => '%s tidak boleh kosong!'
        			)
                );
        		$this->form_validation->set_rules('tahun_gaji', 'Tahun Gaji','trim|required',
        			array(
        					'required'      => '%s tidak boleh kosong!'
        			)
                );
                $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        		if ($this->form_validation->run() == FALSE)
                {
            		$data = array(
            		    'mdos' => 'gajibulan',
            		    'tk' =>$this->pegawai->bulangaji()
            		);
            		$this->template->view('pegawai/tbh-gajibulan', $data);
                }
        		else
        		 {
        		    $input = $this->input->post();
        			$cekbulan = $this->pegawai->cekbulantahun($input['bulan_gaji'],$input['tahun_gaji']);
        			if(!empty($cekbulan)) {
        			    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Gaji bulan '.$input['bulan_gaji'].' Tahun '.$input['tahun_gaji'].' sudah dibuat</div>');
			            redirect('pegawai/gajibulan');
        			}
        			$datapege = $this->pegawai->ambilbuat_gaji();
        			foreach($datapege as $item){
        			    $dat['idpenda_dosen'] = $item->lecturer_id;
        			    $dat['user_buat'] = $this->session->userdata('pengguna_id_simkeu');
        			    $dat['penda_bulan'] = $input['bulan_gaji'];
        			    $dat['penda_tahun'] = $input['tahun_gaji'];
        			    $dat['poko_penda'] = $item->gaji_pokok;
        			    $dat['pasangan_penda'] = $item->tunj_pasangan;
        			    $dat['anak_penda'] = $item->tunj_anak;
        			    $dat['fung_penda'] = $item->tunj_fung;
        			    $dat['beras_penda'] = $item->tunj_beras;
        			    if(!empty($item->tunj_status)) {
        			        $dat['status_penda'] = $item->tunj_status;
        			    }else{
        			        $dat['status_penda'] = 0;
        			    }
        			    if(!empty($item->tunj_tambahan)) {
        			        $dat['tamb_penda'] = $item->tunj_tambahan;
        			    }else{
        			        $dat['tamb_penda'] = 0;
        			    }
        			    $tolpen = $item->gaji_pokok + $item->tunj_pasangan + $item->tunj_anak + $item->tunj_fung + $item->tunj_beras + $item->tunj_status + $item->tunj_tambahan;
        			    $dat['total_penda'] = $tolpen;
        			    $dat['kodestatus_penda'] = $item->kode_status;
        			    $dat['idtugas_penda'] = $item->id_tugas;
        			    
        			    $idinsd = $this->pegawai->MasukData('pendapatan',$dat);
        			    
        			    $ambilpot = $this->pegawai->ambilpotonggaji($item->lecturer_id);
        			    $kat['idpotong_dosen'] = $item->lecturer_id;
        			    $kat['idpenda_potong'] = $idinsd;
        			    $kat['bpjs_sehat'] = $ambilpot->bpjssehat_potong;
        			    $kat['bpjs_kerja'] = $ambilpot->bpjskerja_potong;
        			    $kat['simatu'] = $ambilpot->simatu_potonggaji;
        			    $kat['pinjaman'] = $ambilpot->pinjaman_potonggaji;
        			    $kat['total_potong'] = $ambilpot->bpjssehat_potong + $ambilpot->bpjskerja_potong + $ambilpot->simatu_potonggaji + $ambilpot->pinjaman_potonggaji;
        			    $kat['user_potong'] = $this->session->userdata('pengguna_id_simkeu');
        			   
        			    $this->pegawai->InsertData('potongan', $kat);
        			   
        			}
        			 redirect('pegawai/gajibulan');
        		 }
		}else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function tambahpegawai()
	{	
	     if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "41" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
	   
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('kode', 'Kode dosen','trim|is_unique[lecturer.lecturer_code]',
			array(
					'required'      => '%s tidak boleh kosong!',
					'is_unique'      => '%s sudah ada!'
			)
        );
		$this->form_validation->set_rules('nidn', 'NIDN','trim|is_unique[lecturer.nidn]',
			array(
				'is_unique'      => '%s sudah ada!'
			)
        );
		$this->form_validation->set_rules('nip', 'NIP','trim|is_unique[lecturer.nip]',
			array(
					'is_unique'      => '%s sudah ada!'
			)
        );
        $this->form_validation->set_rules('nama', 'Nama lengkap','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
        
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
			$data = array(
			    'mdos' => 'index',
			    'js' => array('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js','assets/tglambil.js'),
			    'css' => array('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'),
			    'prodi' => $this->pegawai->ambil_prodi()->result(),
			    'tugas' => $this->pegawai->ambil_tugas()->result(),
			    'stat' => $this->pegawai->ambil_status()->result()
			);
			$this->template->view('pegawai/tbh-pegawai', $data);
		}
		else
		 {
			$input = $this->input->post();
			$dosen = array();
			$dosen['lecturer_code'] = $input['kode'];
			$dosen['nidn'] = $input['nidn'];
			$dosen['name'] = $input['nama'];
			$dosen['address'] = $input['alamat'];
			$dosen['phone'] = $input['telpon'];
			$dosen['status'] = $input['status'];
		    $dosen['photo'] = '';
			$dosen['gender'] = $input['jekel'];
			$dosen['pasangan'] = $input['pasangan'];
			$dosen['anak'] = $input['anak'];
			$dosen['place_of_birts'] = $input['tempat'];
			$dosen['religion'] = $input['religion'];
			$dosen['birts'] = $input['tgl'];
			$dosen['nip'] = $input['nip'];
			$dosen['base'] = $input['prodi'];
			$dosen['fungsional'] = $input['fungsional'];
			$dosen['golongan'] = $input['golongan'];
			$dosen['tmmd'] = $input['tmmd'];
			$dosen['tertinggi'] = $input['tertinggi'];
			$dosen['sertifikasi'] = $input['sertifikasi'];
			$dosen['ilmu'] = $input['ilmu'];
			$dosen['aktif_serdos'] = $input['aktif'];
			$dosen['aktif_kerja'] = $input['kerja'];
			$dosen['tugas'] = $input['tugas'];
			
			$this->db->insert('lecturer', $dosen);
			
		    $dosen_id = $this->db->insert_id();
		    
			$akun = array();
			$akun['lecturer_id'] = $dosen_id;
			$akun['email'] =  $input['email'];
			$akun['password'] =  password_hash($input['tgl'], PASSWORD_DEFAULT);
			$akun['penanda'] =  'malaykat';
		
		   $this->db->insert('lecturer_accounts', $akun);
		
		if($this->db->affected_rows())
		{
		    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Tambah data berhasil.</div>');
			redirect('pegawai/index');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Tambah data gagal.</div>');
			redirect('pegawai/index');
		}
		 }	
	     }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	public function ubahpegawai($id=0)
	{	
	     if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "41" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
	    $dos = $this->pegawai->ambil_all_dosen($id);
	   if(empty($dos)) {
	       $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data tidak ditemukan</div>');
		    redirect('pegawai/index');
	   }
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode', 'Kode dosen','trim');
		$this->form_validation->set_rules('nidn', 'NIDN','trim');
		$this->form_validation->set_rules('nip', 'NIP','trim');
        $this->form_validation->set_rules('nama', 'Nama lengkap','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!',
			)
        );
        
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
			$data = array(
			    'mdos' => 'tbh',
			    'dosen' =>$dos,
			    'js' => array('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js','assets/tglambil.js'),
			    'css' => array('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'),
			    'prodi' => $this->pegawai->ambil_prodi()->result(),
			    'tugas' => $this->pegawai->ambil_tugas()->result(),
			    'stat' => $this->pegawai->ambil_status()->result()
			);
			$this->template->view('pegawai/ubh-pegawai', $data);
		}
		else
		 {
		     $res = 0;
			$input = $this->input->post();
			$dosen = array();
			$dosen['lecturer_code'] = $input['kode'];
			$dosen['nidn'] = $input['nidn'];
			$dosen['name'] = $input['nama'];
			$dosen['address'] = $input['alamat'];
			$dosen['phone'] = $input['telpon'];
			$dosen['status'] = $input['status'];
		    $dosen['photo'] = '';
			$dosen['gender'] = $input['jekel'];
			$dosen['pasangan'] = $input['pasangan'];
			$dosen['anak'] = $input['anak'];
			$dosen['place_of_birts'] = $input['tempat'];
			$dosen['religion'] = $input['religion'];
			$dosen['birts'] = $input['tgl'];
			$dosen['nip'] = $input['nip'];
			$dosen['base'] = $input['prodi'];
			$dosen['fungsional'] = $input['fungsional'];
			$dosen['golongan'] = $input['golongan'];
			$dosen['tmmd'] = $input['tmmd'];
			$dosen['tertinggi'] = $input['tertinggi'];
			$dosen['sertifikasi'] = $input['sertifikasi'];
			$dosen['ilmu'] = $input['ilmu'];
			$dosen['aktif_serdos'] = $input['aktif'];
			$dosen['aktif_kerja'] = $input['kerja'];
			$dosen['tugas'] = $input['tugas'];
			$where = array(
			    'lecturer_id' => $id
			    );
			
			$res = $this->pegawai->UpdateData('lecturer', $dosen, $where);
			$akun = array();
			$akun['email'] =  $input['email'];
		    $res += $this->pegawai->UpdateData('lecturer_accounts', $akun, $where);
		
		if($res >= 1)
		{
		    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Ubah data berhasil.</div>');
			redirect('pegawai/ubahpegawai/'.$id);
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Ubah data gagal.</div>');
			redirect('pegawai/ubahpegawai/'.$id);
		}
		 }	
	     }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	public function tbhgaji($id=0)
	{	
	    if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "41" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
	    $dos = $this->pegawai->ambil_all_dosen($id);
	   if(empty($dos)) {
	       $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data tidak ditemukan</div>');
		    redirect('pegawai/index');
	   }
	   $gjj = $this->pegawai->ambil_gaji_tetap($id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pokok', 'Gaji Pokok','trim|integer');
		$this->form_validation->set_rules('pasangan', 'Tunjangan Pasangan','trim|integer');
		$this->form_validation->set_rules('anak', 'Tunjangan Anak','trim|integer');
        $this->form_validation->set_rules('fungsional', 'Tunjangan Fungsional','trim|integer');
        $this->form_validation->set_rules('beras', 'Tunjangan Beras','trim|integer');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
			$data = array(
			    'mdos' => 'tbh',
			    'dosen' =>$dos,
			    'gaji' => $gjj
			);
			$this->template->view('pegawai/tbh-gajidosentetap', $data);
		}
		else
		 {
		    
			$input = $this->input->post();
			$dosen = array();
			$dosen['gaji_pokok'] = $input['pokok'];
			$dosen['tunj_pasangan'] = $input['pasangan'];
			$dosen['tunj_anak'] = $input['anak'];
			$dosen['tunj_fung'] = $input['fungsional'];
			$dosen['tunj_beras'] = $input['beras'];
			if(!empty($gjj)) {
			    $where = array(
			        'id_gadotetap' => $gjj->id_gadotetap
			        );
			     $res = $this->pegawai->UpdateData('gaji_dosen_tetap', $dosen, $where);   
			}else{
			    $dosen['id_dosen'] = $id;
			    $res = $this->pegawai->InsertData('gaji_dosen_tetap', $dosen);
			}
			
		
		if($res >= 1)
		{
		    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Simpan data berhasil.</div>');
			redirect('pegawai/lihatpegawai/'.$id);
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan data gagal.</div>');
			redirect('pegawai/lihatpegawai/'.$id);
		}
		 }	
	     }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
    public function hapus(){ 
         if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "41" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
    	    $tampung = $this->input->post();
            $this->pegawai->deldos($tampung);
            redirect('dosen/index');
         }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	public function dosen_tetap(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	       	$data = array(
        		'mdos' => 'dstetap',
        		'jdl' => 'Daftar Dosen Tetap STKIP Persada Khatulistiwa',
        		'tk' => $this->pegawai->all_tetap_dosen()
    		);
		$this->template->view('pegawai/tbl-pegawai2', $data);
	        
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function dosen_nidk(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	       	$data = array(
        		'mdos' => 'dsnidk',
        		'jdl' => 'Daftar Dosen NIDK STKIP Persada Khatulistiwa',
        		'tk' => $this->pegawai->get_all_nidk()
    		);
		$this->template->view('pegawai/tbl-gurutk', $data);
	        
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function staf_tetap(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	        $data = array(
        		'mdos' => 'staftetap',
        		'jdl' => 'Daftar Staf Tetap STKIP Persada Khatulistiwa',
        		'tk' => $this->pegawai->get_staf_tetap()
    		);
    	//print_r($data['tk']); die;
		$this->template->view('pegawai/tbl-pegawai2', $data);
	        
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	
	public function staf_kontrak(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	       $data = array(
        		'mdos' => 'stafkontrak',
        		'jdl' => 'Daftar Staf Kontrak STKIP Persada Khatulistiwa',
        		'tk' => $this->pegawai->get_staf_kontrak()
        		
    		);
		$this->template->view('pegawai/tbl-gurutk', $data);
	        
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function satpam(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	         $data = array(
        		'mdos' => 'satpam',
        		'jdl' => 'Daftar Satpam STKIP Persada Khatulistiwa',
        		'tk' => $this->pegawai->get_satpam()
    		);
		$this->template->view('pegawai/tbl-gurutk', $data);
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function kebersihan(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	        $data = array(
        		'mdos' => 'cleaning',
        		'jdl' => 'Daftar Cleaning Service dan Tukang Kebun STKIP Persada Khatulistiwa',
        		'tk' => $this->pegawai->get_kebersihan()
    		);
		$this->template->view('pegawai/tbl-gurutk', $data);
	        
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	
	public function kontrak_khusus(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	        $data = array(
        		'mdos' => 'kontrakkhusus',
        		'jdl' => 'Daftar Kontrak Khusus STKIP Persada Khatulistiwa',
        		'tk' => $this->pegawai->get_kontrak_khusus()
    		);
    	
		$this->template->view('pegawai/tbl-gurutk', $data);
	        
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function guru_tk(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	         $data = array(
        		'mdos' => 'gurutk',
        		'jdl' => 'Daftar Guru TK dan PAUD',
        		'tk' => $this->pegawai->get_guru_tk()
    		);
    	//print_r($data['tk']); die;
		$this->template->view('pegawai/tbl-gurutk', $data);
	        
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	
	public function jabatan_pimpinan(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	        $data = array(
        		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js'),
        		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
        		'mdos' => 'pimpinan',
        		'jdl' => 'Tunjangan Jabatan Pimpinan',
        		'tugas' => $this->pegawai->get_pimpinan()
    		);
		$this->template->view('pegawai/tbl-pimpinan', $data);
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function ketua_prodi(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	        $data = array(
        		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js'),
        		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
        		'mdos' => 'prodi',
        		'jdl' => 'Daftar Tunjangan Ketua Prodi',
        		'tugas' => $this->pegawai->get_ketua_prodi()
    		);
		$this->template->view('pegawai/tbl-pimpinan', $data);
	        
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function kepala_lembaga(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	         $data = array(
        		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js'),
        		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
        		'mdos' => 'bagian',
        		'jdl' => 'Daftar Tunjangan Kepala Lembaga/Unit/Koordinator',
        		'tugas' => $this->pegawai->get_ketua_lembaga()
    		);
		$this->template->view('pegawai/tbl-pimpinan', $data);
	        
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function sekretaris(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	         $data = array(
        		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js'),
        		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
        		'mdos' => 'sekre',
        		'jdl' => 'Daftar Tunjangan Sekretaris',
        		'tugas' => $this->pegawai->get_sekretaris()
    		);
		$this->template->view('pegawai/tbl-pimpinan', $data);
	        
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function tenaga_administrasi(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	         $data = array(
        		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js'),
        		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
        		'mdos' => 'adm',
        		'jdl' => 'Daftar Tunjangan Tenaga Administrasi',
        		'tugas' => $this->pegawai->get_administrasi()
    		);
		$this->template->view('pegawai/tbl-pimpinan', $data);
	        
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
	public function student_staff(){ 
	    if($this->session->userdata('pengguna_id_simkeu') == "45"){
	       $data = array(
        		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js'),
        		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
        		'mdos' => 'student',
        		'jdl' => 'Daftar Gaji Student Staff',
        		'tugas' => $this->pegawai->get_student()
    		);
		$this->template->view('pegawai/tbl-staf', $data);
	        
	    }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
	    }
	}
}

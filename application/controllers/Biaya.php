<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya extends CI_Controller {
	public function __construct()
	{
		parent::__construct();	
		$this->load->library('datatables');
		$this->load->model('mbiaya','biaya');
		$this->load->helper(array('pecahanuang','tgl'));	
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
	     if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
	    
		if(isset($_POST['submit']))
        {
            $input = $this->input->post(NULL, TRUE);
            $thnmasuk    =  $input['tahun_masuk'];
            $prodi    =  $input['prodi'];
			if(($thnmasuk != 0) && (!empty($prodi))){
				$chek   = $this->db->get_where('biaya_kuliah',array('tahun_masuk'=>$thnmasuk, 'prodi_id1'=>$prodi))->num_rows();			
				if($chek > 0)
				{
				$this->session->unset_userdata('tahun_mahasiswa_masuk');
				$this->session->unset_userdata('prodi_mahasiswa');
				$this->session->set_userdata('tahun_mahasiswa_masuk',$thnmasuk);
				$this->session->set_userdata('prodi_mahasiswa',$prodi);
				}
				else
				{
					$this->session->unset_userdata('tahun_mahasiswa_masuk');
					$this->session->unset_userdata('prodi_mahasiswa');
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data tidak ditemukan.</div>');
					redirect('biaya/index');
				}
			}else{
				$this->session->unset_userdata('tahun_mahasiswa_masuk');
				$this->session->unset_userdata('prodi_mahasiswa');
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Tahun masuk atau konsentrasi tidak boleh kosong.</div>');
				redirect('biaya/index');
			}
        }
		$this->data = array(
		    'muang' => 'biaya',
		    'js' => array('assets/hapusjenis.js'),
		    'prodi' => $this->biaya->ambil_prodi()->result(),
			'get' => $this->biaya->get_all()
		);
		

		$this->template->view('uang/data-biaya', $this->data);
	     }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	public function reset()
	{
	     if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
		$this->session->unset_userdata('tahun_mahasiswa_masuk');
		$this->session->unset_userdata('prodi_mahasiswa');
        redirect('biaya/index');
	     }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
    }
    function jenisbayar(){
        if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
        $data = array(
		'muang' => 'jenis',
		'js' => array('assets/hapusjenis.js'),
		'get' => $this->db->get('jenis_bayar')->result()
		);
		$this->template->view('uang/tbl-jenis', $data);
        }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
        }
    public function tbhbiayatahun()
	{
	     if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
	    $this->load->library('form_validation');
        $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!'
			)
        );
        $this->form_validation->set_rules('prodi', 'Program Studi','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!'
			)
        );
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
			$data = array(
			    'jenis' => $this->biaya->get_jenisAll(),
			    'sks' => $this->biaya->get_jenisSKS(),
			    'spp' => $this->biaya->get_jenisSPP(),
    			'js' => array('assets/checkall.js'),
    			'css' => array('plugins/icheck-bootstrap/icheck-bootstrap.min.css'),
    			'muang' => 'biaya',
    		    'prodi' => $this->biaya->ambil_prodi()->result()
			);
		$this->template->view('uang/add-biaya-tahun', $data);
		}
		else
		 {
	    	$input = $this->input->post(NULL, TRUE);
	    	$tahunmasuk = $input['tahun_masuk'];
        	$chek_tahun = $this->biaya->check_tahun($input['tahun_masuk'], $input['prodi']);
    	    if($chek_tahun == 0){
        			if(is_array($this->input->post('jenis')))
        			{	
        				foreach ($input['jenis'] as $key => $value) 
        				{				
        						$jenis = array(
        							'jenis_bayar_id1' => $value,
        							'tahun_masuk' => $input['tahun_masuk'],
        							'prodi_id1' => $input['prodi']
        						);
        						$this->db->insert('biaya_kuliah', $jenis);
        						
        				}
        				$spp = array(
        							'jenis_bayar_id1' => 1,
        							'tahun_masuk' => $input['tahun_masuk'],
        							'prodi_id1' => $input['prodi']
        						);
        						$this->db->insert('biaya_kuliah', $spp);
        				$spp = array(
        							'jenis_bayar_id1' => 5,
        							'tahun_masuk' => $input['tahun_masuk'],
        							'prodi_id1' => $input['prodi']
        						);
        						$this->db->insert('biaya_kuliah', $spp);
        						
        				$this->session->unset_userdata('tahun_mahasiswa_masuk');
        				$this->session->unset_userdata('prodi_mahasiswa');
        				$this->session->set_userdata('tahun_mahasiswa_masuk',$input['tahun_masuk']);
        				$this->session->set_userdata('prodi_mahasiswa',$input['prodi']);
        				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Tambah data berhasil.</div>');
        				redirect('biaya/index');
        			} else {
        				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Gagal menyimpan data, tidak ada jenis pembayaran yang dipilih.</div>');
        				redirect('biaya/tbhbiayatahun');
        			}
		}else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data jenis pembayaran pada tahun '.$tahunmasuk.' sudah ada.</div>');
			redirect('biaya/tbhbiayatahun');
		}
    
    		
	    }
	     }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	public function tambahjenis()
	    {	
	    if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
		$this->load->library('form_validation');
        $this->form_validation->set_rules('jns', 'Jenis Pembayaran','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!'
			)
        );
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
			$data = array(
			'muang' => 'jenis'
			);
			$this->template->view('uang/tbh-jenis', $data);
		}
		else
		 {
		    
		    
			$input = $this->input->post(NULL, TRUE);
			
			$datin = array();
			$datin['keterangan'] = $input['jns'];
			$res = $this->biaya->InsertData('jenis_bayar',$datin);
			
			if(!$res){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Tambah data gagal.</div>');
				redirect('biaya/jenisbayar');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Tambah data berhasil.</div>');
				redirect('biaya/jenisbayar');
			}
		 }		
	    }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	public function ubahjenis($id=0)
	    {		
	   if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
		$this->load->library('form_validation');
        $this->form_validation->set_rules('jns', 'Jenis Pembayaran','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!'
			)
        );
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
			$data = array(
			'muang' => 'jenis',
			'js' => array('assets/hapusjenis.js'),
			'jenis' => $this->biaya->getjenis($id)
			);
			$this->template->view('uang/ubh-jenis', $data);
		}
		else
		 {
			$input = $this->input->post(NULL, TRUE);
			
			$datin = array();
			$datin['keterangan'] = $input['jns'];
			$where = array(
			 'jenis_bayar_id' => $id
			 );
			$res = $this->biaya->updatejenis($datin, $where);
			
			if(!$res){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Ubah data gagal.</div>');
				redirect('biaya/jenisbayar');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Ubah data berhasil.</div>');
				redirect('biaya/jenisbayar');
			}
		 }	
	   }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	public function hapusjenis()
	{
	     if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
    	    $input = $this->input->post(NULL, TRUE);
    	    $param = $input['jenisid'];
    		$res = $this->biaya->deletejenis($param);
    
    		if(!$res){
    				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Hapus data gagal.</div>');
    				redirect('biaya/jenisbayar');
    			}else{
    				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Hapus data berhasil.</div>');
    				redirect('biaya/jenisbayar');
    			}
	     }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	public function add()
	{
		 if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
		if(isset($_POST['submit']))
			{   
			    $this->load->library('form_validation');
				$this->form_validation->set_rules('jenis', 'Jenis Pembayaran','trim|required',
        			array(
        					'required'      => '%s tidak boleh kosong!'
        			)
                );
				
	            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
				if($this->form_validation->run() == TRUE)
				{
				    $input = $this->input->post(NULL, TRUE);
				    $biaya = array();
        			$biaya['jenis_bayar_id1'] = $input['jenis'];
        			$biaya['prodi_id1'] = $this->session->userdata('prodi_mahasiswa');
        			$biaya['tahun_masuk'] = $this->session->userdata('tahun_mahasiswa_masuk');
        			$biaya['jumlah'] = $input['jlh'];
				    $res = $this->biaya->InsertData('biaya_kuliah',$biaya);
			
        			if(!$res){
        				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Tambah data gagal.</div>');
        				redirect('biaya/index');
        			}else{
        				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Tambah data berhasil.</div>');
        				redirect('biaya/index');
        			}
				}
			}
		$data = array(
		    'muang' => 'biaya',
			'jenis' => $this->biaya->get_jenisadd()
		);

		$this->template->view('uang/tbh-item', $data);
		 }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	public function editbiaya($id=0)
	    {
	    if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){     
	    $ambilbiaya = $this->biaya->ambilbiaya($id);
	    if(!empty($ambilbiaya)) {
		$this->load->library('form_validation');
        $this->form_validation->set_rules('jlh', 'Jumlah Pembayaran','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!'
			)
        );
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
			$data = array(
			'muang' => 'biaya',
			'biaya' => $ambilbiaya
			);
			$this->template->view('uang/ubh-item', $data);
		}
		else
		 {
			$input = $this->input->post(NULL, TRUE);
			$bkul = array();
			$bkul['jumlah'] = $input['jlh'];
			$where = array(
			 'biaya_kuliah_id' => $id
			 );
			$res = $this->biaya->updatebiaya($bkul, $where);
			
			if(!$res){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Ubah data gagal.</div>');
				redirect('biaya/index');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Ubah data berhasil.</div>');
				redirect('biaya/index');
			}
		 }
	    }else{
	       $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data tidak ditemukan.</div>');
		    redirect('biaya/index'); 
	    }
	    }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	public function hapusbiaya()
	{
	      if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){     
	    $input = $this->input->post(NULL, TRUE);
	    $param = $input['biayaid'];
		$res = $this->biaya->deletebiaya($param);

		if(!$res){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Hapus data gagal.</div>');
				redirect('biaya/index');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Hapus data berhasil.</div>');
				redirect('biaya/index');
			}
	      }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	public function datakeuangan()
	{
	     if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){   
	    if(isset($_POST['submit']))
        {
            $input = $this->input->post(NULL, TRUE);
            $nim    =  $input['nim'];			
            $chek   = $this->db->get_where('mahasiswa',array('nim'=>$nim))->row();
            if(!empty($chek))
            {
            $this->session->set_userdata('pembayaran_mahasiswa_nim',$nim);
            $this->session->set_userdata('student_prodi',$chek->prodi);
            }
            else
            {
				$this->session->unset_userdata('pembayaran_mahasiswa_nim');
				$this->session->unset_userdata('student_prodi');
                 $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> NIM YANG ANDA MASUKAN TIDAK DITEMUKAN DI DATABASE</div>");
				redirect('biaya/datakeuangan');
            }
			
        } elseif(isset($_POST['submit2'])) {
            $input = $this->input->post(NULL, TRUE);
            $jenis  =   $input['jenis'];
            $jumlah =   $input['jumlah'];
            $noseri =   $input['seri'];
            $semester= "";
			if($jenis == 1) {
				$semester=  $input['semester'];
			}
            if($jenis == 5) {
				$semester=  $input['semestersks'];
			}
			// chek dulu udah lunas belum jenis bayarnya, jika sudah berikan pesan
            $idnim=$this->session->userdata('pembayaran_mahasiswa_nim');
            $tahun_akademik = getField('mahasiswa', 'tahun_masuk', 'nim', $idnim);
            $konsentrasi_id = getField('mahasiswa', 'prodi', 'nim', $idnim);
            $semester_aktif = getField('mahasiswa', 'semester_aktif', 'nim', $idnim);
            $jumlah_bayar   = get_biaya_kuliah($tahun_akademik, $jenis, $konsentrasi_id, 'jumlah');
			$biaya_persks   = get_biaya_persks($tahun_akademik, $konsentrasi_id, 'jumlah');
            $sudah_bayar    = get_biaya_sudah_bayar($idnim, $jenis);
            $sisa           = $jumlah_bayar-$sudah_bayar;
            // end chek
            $stu_id			= $this->biaya->stu_id($idnim)->id_mahasiswa;
            //$jumlah_sks 	= $skspersmt;
            //$jumlah_sks 	= $this->keuangan->cekskstotal($stu_id, $konsentrasi_id,$semester);
			$jumlah_sks 	= (int)get_biaya_sks($stu_id, $konsentrasi_id,'sks_jumlah',$semester);
			
			$jumlah_bayar_sks =	(int) $biaya_persks * $jumlah_sks;
            // chek jenis inputan
            // jika spp maka chek dia semetter berapa dan apakah dia sudah lunas untuk semester itu
            // jika selain spp, chek sudah lunas atau belum
            //print_r( $input); die;
            if($jenis == 1)
             {				 
                 if($semester > $semester_aktif)
                 {  					
					 // semester yang dipilih lebih tinggi daripada semeser aktif
                    $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> SEMESTER YANG ANDA INPUTKAN TIDAK SESUAI DENGAN DATA MAHASISWA</div>");
                 }
                 else
                 {
                     // chek spp semester itu udah lunas belum
                    $sdh_bayar_semester = $this->chek_sudah_bayar_semester($idnim, $semester);
                    if($jumlah_bayar <= $sdh_bayar_semester)
                    {                       
						 $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> PEMBAYARAN UNTUK SEMESTER $semester <B>SUDAH LUNAS</B></div>");                      
                    }
                    elseif($jumlah_bayar < ($jumlah + $sdh_bayar_semester))
                    {                       
						 $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> PEMBAYARAN LEBIH</div>");                      
                    }
                    else
                    {
                        // save bayar semester
                    $data   =   array(  'jenis_bayar_iddetail'=>$jenis,
                                        'jumlah_detail'=>$jumlah,
                                        'user_id_detail'=> $this->session->userdata('pengguna_id_simkeu'),                                       
                                        'semester_detail'=>$semester,
                                        'noseri_detail'=>$noseri,
                                        'nim_detail'=>$this->session->userdata('pembayaran_mahasiswa_nim')
                                    );
                                        
                    $this->db->insert('pembayaran_detail',$data);
					$this->session->set_flashdata('pesan', "<div class='alert alert-success'><i class='fa fa-check'></i> DATA DISIMPAN</div>"); 
                    }
                 }
             }
             elseif($jenis == 5)
             {				 
                 if($semester > $semester_aktif)
                 {  					
					 // semester yang dipilih lebih tinggi daripada semeser aktif
                    $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> SEMESTER YANG ANDA INPUTKAN TIDAK SESUAI DENGAN DATA MAHASISWA</div>");
                 }
                 else
                 {
                     // chek sks semester itu udah lunas belum
                    $sdh_bayar_semester= $this->chek_sudah_bayar_sks($idnim, $semester);
                    if($jumlah_bayar_sks <= $sdh_bayar_semester)
                    {                       
						 $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> PEMBAYARAN SKS UNTUK SEMESTER $semester <B>SUDAH LUNAS</B></div>");                      
                    }
                    elseif($jumlah_bayar_sks < ($sdh_bayar_semester + $jumlah))
                    {                       
						 $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> PEMBAYARAN LEBIH</div>");                      
                    }
                    else						
                    {
                        // save bayar sks
                    $data   =   array(  'jenis_bayar_iddetail'=>$jenis,
                                        'jumlah_detail'=>$jumlah,
                                        'user_id_detail'=> $this->session->userdata('pengguna_id_simkeu'),                                       
                                        'semester_detail'=>$semester,
                                        'noseri_detail'=>$noseri,
                                        'nim_detail'=>$this->session->userdata('pembayaran_mahasiswa_nim'));
                    $this->db->insert('pembayaran_detail',$data);
					$this->session->set_flashdata('pesan', "<div class='alert alert-success'><i class='fa fa-check'></i> DATA DISIMPAN</div>"); 
                    }
                 }
             }
             else
             {
                 // chek udah lunas belum
                 // kalau udah lunas tampilkan pesan udah lunas
                 // kalau belum lunas save
                 
                if($sisa <= 0)
                {
                    // sudah lunas
                     $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> PEMBAYARAN <b> ".  strtoupper(getField('jenis_bayar', 'keterangan', 'jenis_bayar_id', $jenis))." </b> SUDAH LUNAS</div>");
                }
                elseif($jumlah > $sisa)
                {
                    $this->session->set_flashdata('pesan', "<div class='alert alert-danger'><i class='fa fa-bullhorn'></i> PEMBAYARAN LEBIH !! </div>");
                }
                else
                {
                    // save pembayaran perjenis 
                    $data   =   array(  'jenis_bayar_iddetail'=>$jenis,
                                        'jumlah_detail'=>$jumlah,
                                        'user_id_detail'=> $this->session->userdata('pengguna_id_simkeu'),                                       
                                        'semester_detail'=>$semester,
                                        'noseri_detail'=>$noseri,
                                        'nim_detail'=>$this->session->userdata('pembayaran_mahasiswa_nim'));
                    $this->db->insert('pembayaran_detail',$data);
					$this->session->set_flashdata('pesan', "<div class='alert alert-success'><i class='fa fa-check'></i> DATA DISIMPAN</div>"); 
                    
                }
             }
            redirect('biaya/datakeuangan');
            
        }
	    $data = array(
			'muang' => 'uang',
			'get' => $this->biaya->getmhs(),
			'jenis_bayar1' => $this->biaya->get_jenisTahun(), //untuk form transaksi
			'uang' => $this->biaya->uang(),
			'js' => array('assets/form_tran.js','assets/hapusjenis.js'),
			'jenis_bayar' => $this->biaya->get_jebaTahun(), // riwayat transaksi kecuali spp dan sks
			'nim' => $this->session->userdata('pembayaran_mahasiswa_nim')
			);
		$nim_session=$this->session->userdata('pembayaran_mahasiswa_nim');
           $query2="   SELECT au.nama,kj.keterangan,kd.tgl_detail,kd.jumlah_detail,kd.pembayara_detail_id,kd.jenis_bayar_iddetail,kd.semester_detail
                        FROM  pembayaran_detail  as kd,jenis_bayar as kj,pengguna as au
                        WHERE kd.jenis_bayar_iddetail = kj.jenis_bayar_id and kd.user_id_detail=au.pengguna_id and kd.nim_detail='$nim_session'";

		$data['transaksi'] = $this->db->query($query2)->result();	
		$data['tung'] = count ($data['transaksi']);
	    $this->template->view('uang/data-keuangan', $data);
	     }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
	}
	function chek_sudah_bayar_semester($idnim,$semester)
    {
         if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){   
        $sql=   "SELECT sum(jumlah_detail) as jumlah 
                FROM pembayaran_detail
                WHERE jenis_bayar_iddetail=1 and nim_detail='$idnim' and semester_detail='$semester'";
        $data=  $this->db->query($sql)->row_array();
        if($data['jumlah']==null)
        {
            return 0;
        }
        else
        {
            return $data['jumlah'];
        }
         }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
    }
    function chek_sudah_bayar_sks($idnim,$semester)
    {
          if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){  
        $sql=   "SELECT sum(jumlah_detail) as jumlah 
                FROM pembayaran_detail
                WHERE jenis_bayar_iddetail = 5 and nim_detail='$idnim' and semester_detail='$semester'";
        $data=  $this->db->query($sql)->row_array();
        if($data['jumlah']==null)
        {
            return 0;
        }
        else
        {
            return $data['jumlah'];
        }
          }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
    }
	public function reset1()
    {
         if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){   
		$this->session->unset_userdata('pembayaran_mahasiswa_nim');
		$this->session->unset_userdata('student_prodi');
        redirect('biaya/datakeuangan');
         }else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			    redirect('pengguna/profil');
            }
    }
    public function hapusrinci()
	{
	     if($this->session->userdata('pengguna_id_simkeu') == "45") {
    	    $input = $this->input->post(NULL, TRUE);
    	   
    	    $param = $input['id_rinci'];
    		$res = $this->biaya->deleteRinci($param);
           
    		if(!$res){
    				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Hapus data gagal.</div>');
    				redirect('biaya/datakeuangan');
    			}else{
    				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Hapus data berhasil.</div>');
    				redirect('biaya/datakeuangan');
    			}
	     }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
    		redirect('biaya/datakeuangan'); 
	     }
	}
	public function seri()
    {
         if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){
             $data = array(
        		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js','assets/daftar_seri.js'),
        		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
        		'muang' => 'seri',
    		);
		$this->template->view('uang/tbl-seri', $data);

         }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
    		redirect('biaya/datakeuangan'); 
	     }
    }
    public function get_seri_json() {
           if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){
        	    $dutu = $this->biaya->getSeri();
        	    //print_r($dutu); die;
        	    $array_data = json_decode($dutu, true);  
                    $extra = array(					
                         $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()        
                    );  
                    $array_data[] = $extra;  
                    $final_data = json_encode($array_data); 			
                echo $final_data;
           }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
    		redirect('biaya/datakeuangan'); 
	     }
	}
	public function nim_seri_json() {
           if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){
        	    $dutu = $this->biaya->getSeriNim();
        	    //print_r($dutu); die;
        	    $array_data = json_decode($dutu, true);  
                    $extra = array(					
                         $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()        
                    );  
                    $array_data[] = $extra;  
                    $final_data = json_encode($array_data); 			
                echo $final_data;
           }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
    		redirect('biaya/datakeuangan'); 
	     }
	}
    public function tambahseri()
    {
        if($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52"){ 
        $idnim=$this->session->userdata('pembayaran_mahasiswa_nim');
        if(empty($idnim)){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Mahasiswa Belum Dipilih.</div>');
			redirect('biaya/datakeuangan'); 
        }
        
        $random_number = mt_rand(100000,999999);
            $cekseri = $this->biaya->cekSeri($random_number);
            if(empty($cekseri)){
                $noseri = $random_number;
            }else{
                $noseri =" ";
            }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ket', 'Keterangan','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!'
			)
        );
        $this->form_validation->set_rules('jumlah', 'Jumlah Bayar','trim|required',
			array(
					'required'      => '%s tidak boleh kosong!'
			)
        );
       
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
        {
            
			$data = array(
			'muang' => 'seri',
			'nomorseri' => $noseri,
			'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js','assets/daftar_serinim.js'),
        	'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
			'mhs'=>$this->biaya->getmhs()
			);
		$this->template->view('uang/tbh-seri', $data);
		}
		else
		 {
			$input = $this->input->post(NULL, TRUE);
			$datin = array();
			$datin['no_seri'] = $input['seri'];
			$datin['id_mhs_seri'] = $this->biaya->stu_id($idnim)->id_mahasiswa;
			$datin['nim_mhs_seri'] = $idnim;
			$datin['jumlah_seri'] = $input['jumlah'];
			$datin['ket_seri'] = $input['ket'];
			$datin['user_seri_buat	'] = $idnim;
			//print_r($datin); die;
			$res = $this->biaya->InsertData('seri',$datin);
			
			if(!$res){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Tambah data gagal.</div>');
			redirect('biaya/tambahseri');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Tambah data berhasil.</div>');
				redirect('biaya/tambahseri');
			}
		 }
          }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
    		redirect('biaya/datakeuangan'); 
	     }  
		
    }
    public function hapusseri()
    {
         if($this->session->userdata('pengguna_id_simkeu') == "45") {
    	    $input = $this->input->post(NULL, TRUE);
    	   
    	    $param = $input['seri_id'];
    		$res = $this->biaya->deleteSeri($param);
    		if($res >= 1){
    				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Hapus data berhasil.</div>');
    				redirect('biaya/tambahseri');
    			}else{
    				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Hapus data gagal.</div>');
    				redirect('biaya/tambahseri');
    			}
	     }else{
	        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('biaya/datakeuangan'); 
	     }
    }
}

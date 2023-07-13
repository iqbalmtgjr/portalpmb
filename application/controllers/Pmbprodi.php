<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pmbprodi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();	
		$this->load->library('datatables');
		$this->load->model('mprodi','prodi');
		if(empty($this->session->userdata('email_simkeu'))) {
			redirect('main/index');
		}
		if($this->session->userdata('apli') !="prodi") {
		     $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
			redirect('pengguna/profil');
		}
	}
	// Daftar semua pendaftar
	public function index()
    	{   
    	 $data = array(
    		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js','assets/prodi/daftar_calonsiswa.js'),
    		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
    		'pmb' => 'index'		
		);
    	   $this->template->view('prodi/tbl-calonsiswa', $data);
    	}
    function get_siswa_json() {
	    $dutu = $this->prodi->get_all_siswa();
	    $array_data = json_decode($dutu, true);  
            $extra = array(					
                 $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()        
            );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data); 			
        echo $final_data;	 
	}
	public function prestasi1()
    	{   
    	 $data = array(
    		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js','assets/prodi/daftar_prestasi1.js'),
    		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
    		'pmb' => 'pres1',
    		
		);
    	   $this->template->view('prodi/tbl-prestasi1', $data);
    	}
    function prestasi1_siswa_json() {
	    $dutu = $this->prodi->prestasi1_all_siswa();
	    //print_r($dutu); die;
	    $array_data = json_decode($dutu, true);  
            $extra = array(					
                 $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()        
            );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data); 			
        echo $final_data;	 
	}
     public function testvalid()
    	{   
    	 $data = array(
    		'js' => array('plugins/datatables/jquery.dataTables.js','plugins/datatables-bs4/js/dataTables.bootstrap4.js','assets/prodi/daftar_testvalid.js'),
    		'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
    		'pmb' => 'valid'		
		);
    	   $this->template->view('prodi/tbl-testvalid', $data);
    	}
    function testvalid_siswa_json() {
	    $dutu = $this->prodi->testvalid_all_siswa();
	    //print_r($dutu); die;
	    $array_data = json_decode($dutu, true);  
            $extra = array(					
                 $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()        
            );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data); 			
        echo $final_data;	 
	}
   
}

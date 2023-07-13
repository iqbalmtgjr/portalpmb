<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angket extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mangket','angket');
		$this->load->library('form_validation');
		$this->load->helper('captcha');	
	}
	
	public function index()
    	{  
    	    
    	}
    public function karyawan()
    	{  
            $this->form_validation->set_rules('r1', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r2', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r3', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r4', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r5', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r6', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r7', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r8', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r9', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r10', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r11', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r12', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r13', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r14', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r15', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_error_delimiters('<div class="text-danger"><i>', '</i></div>');
    		$values = array(			
    			'word_length' => 4, 
    			'img_path' => './angke/captcha/',
    			'img_url' => base_url() .'angke/captcha/',
    			'font_path' => FCPATH . 'system/fonts/texb.ttf',
    			'img_width' => '120',  
    			'img_height' => 50,  
    			'expiration' => 720,
    			'pool'          => '0123456789'				
    		);
    		
    		$data['cap'] = create_captcha($values);
    		
    		$data1 = array(
            'captcha_time'  => $data['cap']['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $data['cap']['word'],
    		'file'          => $data['cap']['filename']
    		);
    
    		$query = $this->db->insert_string('captcha_angke', $data1);
    		$this->db->query($query);
    		
            if ($this->form_validation->run() == FALSE)
            {
    			$this->load->view('angket/karyawan', $data);
            } 
            else 
            {
    			// First, delete old captchas
    			$expiration = time() - 720; // Two hour limit
    			$quer = $this->db->get_where('captcha_angke', array('captcha_time < ' => $expiration))->result();
    			foreach ($quer as $bah){
    				@unlink('angke/captcha/'.$bah->file);  
    			}	
    			
    			$this->db->where('captcha_time < ', $expiration)
    					->delete('captcha');
    
    			// Then see if a captcha exists:
    			$sql = 'SELECT COUNT(*) AS count FROM captcha_angke WHERE word = ? AND ip_address = ? AND captcha_time > ?';
    			$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
    			$query = $this->db->query($sql, $binds);
    			$row = $query->row();
    
    			if ($row->count == 0)
    			{
    					// set error alert
    					$this->session->set_flashdata('salah', '<small class="text-danger">Angka yang anda masukkan salah.</small>'); 
    				redirect(current_url());
    				
    			}
    			$inputan = $this->input->post();
    			$data = array();
    			$data['semester_karya'] = 'ganjil';
    			$data['tahun_ajaran_karya'] = '2021/2022';
    			$data['1b'] = $inputan['r1'];
    			$data['2b'] = $inputan['r2'];
    			$data['3b'] = $inputan['r3'];
    			$data['4b'] = $inputan['r4'];
    			$data['5b'] = $inputan['r5'];
    			$data['6b'] = $inputan['r6'];
    			$data['7b'] = $inputan['r7'];
    			$data['8b'] = $inputan['r8'];
    			$data['9b'] = $inputan['r9'];
    			$data['10b'] = $inputan['r10'];
    			$data['11b'] = $inputan['r11'];
    			$data['12b'] = $inputan['r12'];
    			$data['13b'] = $inputan['r13'];
    			$data['14b'] = $inputan['r14'];
    			$data['15b'] = $inputan['r15'];
    			$data['ip_address'] = $this->input->ip_address();
    			$this->angket->TambahData('angket_karyawan', $data);
    			redirect(current_url());
    			
            }
    	}
    	public function mahasiswa()
    	{  
            $this->form_validation->set_rules('r1', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r2', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r3', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r4', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r5', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r6', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r7', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r8', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r9', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r10', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r11', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r12', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r13', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r14', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r15', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_error_delimiters('<div class="text-danger"><i>', '</i></div>');
    		$values = array(			
    			'word_length' => 4, 
    			'img_path' => './angke/captcha/',
    			'img_url' => base_url() .'angke/captcha/',
    			'font_path' => FCPATH . 'system/fonts/texb.ttf',
    			'img_width' => '120',  
    			'img_height' => 50,  
    			'expiration' => 720,
    			'pool'          => '0123456789'				
    		);
    		
    		$data['cap'] = create_captcha($values);
    		
    		$data1 = array(
            'captcha_time'  => $data['cap']['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $data['cap']['word'],
    		'file'          => $data['cap']['filename']
    		);
    
    		$query = $this->db->insert_string('captcha_angke', $data1);
    		$this->db->query($query);
    		
            if ($this->form_validation->run() == FALSE)
            {
    			$this->load->view('angket/mahasiswa', $data);
            } 
            else 
            {
    			// First, delete old captchas
    			$expiration = time() - 720; // Two hour limit
    			$quer = $this->db->get_where('captcha_angke', array('captcha_time < ' => $expiration))->result();
    			foreach ($quer as $bah){
    				@unlink('angke/captcha/'.$bah->file);  
    			}	
    			
    			$this->db->where('captcha_time < ', $expiration)
    					->delete('captcha');
    
    			// Then see if a captcha exists:
    			$sql = 'SELECT COUNT(*) AS count FROM captcha_angke WHERE word = ? AND ip_address = ? AND captcha_time > ?';
    			$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
    			$query = $this->db->query($sql, $binds);
    			$row = $query->row();
    
    			if ($row->count == 0)
    			{
    					// set error alert
    					$this->session->set_flashdata('salah', '<small class="text-danger">Angka yang anda masukkan salah.</small>'); 
    				redirect(current_url());
    				
    			}
    			$inputan = $this->input->post();
    			$data = array();
    			$data['semester_maha'] = 'ganjil';
    			$data['tahun_ajaran_maha'] = '2021/2022';
    			$data['1c'] = $inputan['r1'];
    			$data['2c'] = $inputan['r2'];
    			$data['3c'] = $inputan['r3'];
    			$data['4c'] = $inputan['r4'];
    			$data['5c'] = $inputan['r5'];
    			$data['6c'] = $inputan['r6'];
    			$data['7c'] = $inputan['r7'];
    			$data['8c'] = $inputan['r8'];
    			$data['9c'] = $inputan['r9'];
    			$data['10c'] = $inputan['r10'];
    			$data['11c'] = $inputan['r11'];
    			$data['12c'] = $inputan['r12'];
    			$data['13c'] = $inputan['r13'];
    			$data['14c'] = $inputan['r14'];
    			$data['15c'] = $inputan['r15'];
    			$data['ip_address'] = $this->input->ip_address();
    			$this->angket->TambahData('angket_mahasiswa', $data);
    			redirect(current_url());
            }
    	}
    public function dosen()
    	{  
            $this->form_validation->set_rules('r1', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r2', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r3', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r4', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r5', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r6', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r7', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r8', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r9', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r10', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r11', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r12', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r13', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r14', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('r15', 'Komponen ini','trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required',array('required' => '%s tidak boleh kosong!'));
            $this->form_validation->set_error_delimiters('<div class="text-danger"><i>', '</i></div>');
    		$values = array(			
    			'word_length' => 4, 
    			'img_path' => './angke/captcha/',
    			'img_url' => base_url() .'angke/captcha/',
    			'font_path' => FCPATH . 'system/fonts/texb.ttf',
    			'img_width' => '120',  
    			'img_height' => 50,  
    			'expiration' => 720,
    			'pool'          => '0123456789'				
    		);
    		
    		$data['cap'] = create_captcha($values);
    		
    		$data1 = array(
            'captcha_time'  => $data['cap']['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $data['cap']['word'],
    		'file'          => $data['cap']['filename']
    		);
    
    		$query = $this->db->insert_string('captcha_angke', $data1);
    		$this->db->query($query);
    		
            if ($this->form_validation->run() == FALSE)
            {
    			$this->load->view('angket/dosen', $data);
            } 
            else 
            {
    			// First, delete old captchas
    			$expiration = time() - 720; // Two hour limit
    			$quer = $this->db->get_where('captcha_angke', array('captcha_time < ' => $expiration))->result();
    			foreach ($quer as $bah){
    				@unlink('angke/captcha/'.$bah->file);  
    			}	
    			
    			$this->db->where('captcha_time < ', $expiration)
    					->delete('captcha');
    
    			// Then see if a captcha exists:
    			$sql = 'SELECT COUNT(*) AS count FROM captcha_angke WHERE word = ? AND ip_address = ? AND captcha_time > ?';
    			$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
    			$query = $this->db->query($sql, $binds);
    			$row = $query->row();
    
    			if ($row->count == 0)
    			{
    					// set error alert
    					$this->session->set_flashdata('salah', '<small class="text-danger">Angka yang anda masukkan salah.</small>'); 
    				redirect(current_url());
    				
    			}
    			$inputan = $this->input->post();
    			$data = array();
    			$data['semester_dosen'] = 'ganjil';
    			$data['tahun_ajaran_dosen'] = '2021/2022';
    			$data['1a'] = (int)$inputan['r1'];
    			$data['2a'] = (int)$inputan['r2'];
    			$data['3a'] = (int)$inputan['r3'];
    			$data['4a'] = (int)$inputan['r4'];
    			$data['5a'] = (int)$inputan['r5'];
    			$data['6a'] = (int)$inputan['r6'];
    			$data['7a'] = (int)$inputan['r7'];
    			$data['8a'] = (int)$inputan['r8'];
    			$data['9a'] = (int)$inputan['r9'];
    			$data['10a'] = (int)$inputan['r10'];
    			$data['11a'] = (int)$inputan['r11'];
    			$data['12a'] = (int)$inputan['r12'];
    			$data['13a'] = (int)$inputan['r13'];
    			$data['14a'] = (int)$inputan['r14'];
    			$data['15a'] = (int)$inputan['r15'];
    			$data['ip_address'] = $this->input->ip_address();
    			$res = $this->angket->TambahData('angket_dosen', $data);
    			redirect(current_url());
            }
    	}
    public function captcha_refresh_karyawan()
	{
		
		 $values = array(
			
			'word_length' => 4, 
			'img_path' => './angke/captcha/',
			'img_url' => base_url() .'angke/captcha/',
			'font_path' => FCPATH . 'system/fonts/texb.ttf',
			'img_width' => '120',  
			'img_height' => 50,  
			'expiration' => 720,
			'pool'          => '0123456789'			
		);

		$data['cap'] = create_captcha($values);		
		$data1 = array(
        'captcha_time'  => $data['cap']['time'],
        'ip_address'    => $this->input->ip_address(),
        'word'          => $data['cap']['word'],
        'file'          => $data['cap']['filename']
		);

		$query = $this->db->insert_string('captcha_angke', $data1);
		$this->db->query($query);
		

		echo $data['cap']['image'];
	}
}
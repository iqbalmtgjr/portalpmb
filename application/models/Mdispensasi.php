<?php
class Mdispensasi extends CI_Model {

    function __construct(){
       
        parent::__construct();        
          
    }    
   
    public function InsertData($tableName, $data){
        $res = $this->db->insert($tableName, $data);
        return $res;
    }
    public function MasukData($tableName, $data){
                $this->db->insert($tableName, $data);
                return $this->db->insert_id();
            }  
	public function cek_mhs($param){
	    $this->db->from('mahasiswa');
	    $this->db->where('nim', $param);     
        $result =	$this->db->get();
		if($this->db->affected_rows()){
			return $result;
		}else{
			return false;
		}
	}
	
	public function amdatamas($param){
	    $this->db->from('dispen');
	    $this->db->join('mahasiswa','nimdis = nim','left');
	    $this->db->where('dis_id', $param);     
        $result =	$this->db->get();
		if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
    	
	public function jlmdispen($param){
	    $this->db->from('dispen');
	    $this->db->where('nimdis', $param);     
        $result =	$this->db->get();
	    return $result;
	}
	
  	public function get_all_item() {
	    $alamat = base_url();
        $this->datatables->select('dis_id,no,nim,nama,tgl_buat,kadaluarsa,keperluan');
        $this->datatables->from('dispen');
        $this->datatables->join('mahasiswa', 'nimdis = nim','left');
        $this->datatables->add_column('view', '<a href="'.$alamat.'dispensasi/lihatdispen/$1" data-toggle="tooltip" title="Rincian!"><i class="fas fa-eye pr-2"></i></a>','dis_id,no,nim,nama,tgl_buat,kadaluarsa,keperluan');  
	    return $this->datatables->generate();
  }
  
    public function ambil_prodi(){
        $result=$this->db->get('prodi');
        return $result;
	}

	public function ambil_smt(){
        $result=$this->db->get('semester');
        return $result;
	}
	
	public function ambil_all_dispen($id){
    	$this->db->join('mahasiswa', 'nimdis = nim', 'left');
    	$this->db->join('prodi', 'prodis = id_prodi', 'left');
    	$this->db->join('semester', 'semester = smt_id', 'left');
    	$this->db->where('dis_id', $id);     
        $result = $this->db->get('dispen');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
	
	public function amdis($param){
	  $this->db->from('dispen');
	  $this->db->where('dis_id', $param);     
      $result =	$this->db->get();
	  return $result;
	}
}

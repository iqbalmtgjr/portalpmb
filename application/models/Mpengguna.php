<?php
class Mpengguna extends CI_Model {

    function __construct(){
       
        parent::__construct();        
          
    }    
    
    public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('status') != '')
			$this->db->where('status', $this->input->get('status'));

		if($this->input->get('query') != '')
			$this->db->like('no', $this->input->get('query'))
					 ->or_like('nimdis', $this->input->get('query'));

		$this->db->order_by('dis_id', 'desc');

		if($type == 'result')
		{
			return $this->db->get('dispen', $limit, $offset)->result();
		} else {
			return $this->db->get('dispen')->num_rows();
		}
	}
    public function InsertData($tableName, $data){
                $res = $this->db->insert($tableName, $data);
                return $res;
            }
	
	 public function ambil_unit(){
      $result=$this->db->get('unit');
      return $result;
	}
	public function total_user() {
		$this->db->from('pengguna');		
        return $this->db->count_all_results();
    }
    public function get_all_user() {
        $this->db->join('unit', 'unit_pengguna = id_unit', 'left');
		$this->db->from('pengguna');		
        return $this->db->get()->result();
    }
     public function ambil_usertotal($limit,$start){
        $this->db->select('pengguna_id, unit, email, nama, pangkat, status, apli');
        $this->db->join('unit','unit_pengguna = id_unit','left');
        $this->db->limit($limit,$start);
        $this->db->order_by('nama','ASC');
        $data = $this->db->get('pengguna');
        return $data;
    }
     public function saya($idsaya){
        $this->db->select('pengguna_id, unit, email, nama, pangkat, status, foto, apli');
        $this->db->join('unit','unit_pengguna = id_unit','left');
        $this->db->where('pengguna_id',$idsaya);
        $data = $this->db->get('pengguna');
        return $data;
    }
     public function get_user($param){
        $this->db->where('pengguna_id',$param);
        $data = $this->db->get('pengguna');
        return $data->row();
    }
    public function login_update($cleanPost, $where)
	{			
		$this->db->update('pengguna', $cleanPost, $where);
		$res = $this->db->affected_rows();
		
		if(!$res)
		{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Ganti password gagal.</div>');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Ganti password sukses.</div>'); 
		}
	}
	public function get_orang($id) {	  
	    $this->db->select('pengguna_id,unit_pengguna, unit, email, nama, pangkat, status, foto, apli');
        $this->db->join('unit','unit_pengguna = id_unit','left');
        $this->db->where('pengguna_id',$id);
	    $result = $this->db->get('pengguna');
	    if($this->db->affected_rows()){
			return $result;
		}else{
			return false;
		}
	}
	public function update_user($cleanPost, $where)
	{			
		$this->db->update('pengguna', $cleanPost, $where);
		$res = $this->db->affected_rows();
		
		if(!$res)
		{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Ubah data gagal.</div>');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Ubah data sukses.</div>'); 
		}
	}
	public function delete_user($param){      
        $this->db->delete('pengguna', array('pengguna_id' => $param));
        if($this->db->affected_rows())
		{
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Hapus data sukses.</div>');
		
		} else {
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Hapus data gagal.</div>');
		}
  }
}

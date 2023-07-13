<?php
class Mmahasiswa extends CI_Model {

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
	//mahasiswa
	public function ambil_nama_dosen(){
        $this->db->select('name,nidn, lecturer_id');    	
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
	}
	
	//mahasiswa
  	public function get_all_msiswa() {
	    $alamat = base_url();
        $this->datatables->select('id_mahasiswa,nim,nama,tanggal,nama_prodi');
        $this->datatables->from('mahasiswa');
        $this->datatables->join('prodi', 'prodi = id_prodi','left');
        $this->datatables->add_column('view', '<a href="'.$alamat.'mahasiswa/lihatmahasiswa/$1"><i class="fas fa-eye pr-2"></i></a><a href="'.$alamat.'mahasiswa/ubhmahasiswa/$1"><i class="fas fa-pencil-alt pr-2"></i></a>
	    <a href="javascript:void(0);" data-code="$1" class="delete_record"><i class="fas fa-trash text-danger"></i></a>','id_mahasiswa,nim,nama,tanggal,nama_prodi');      
	    return $this->datatables->generate();
    }

  //mahasiswa
   public function ambil_prodi(){
        $result=$this->db->get('prodi');
        return $result;
	}
	
	//mahasiswa by id
	public function ambil_mahasiswa($id){
	  	$this->db->join('students_parent', 'id_mahasiswa = student_id', 'left');
    	$this->db->join('students_origin_school', 'id_mahasiswa = school_student_id', 'left');
    	$this->db->join('lecturer', 'dosen_pa = lecturer_id', 'left');
    	$this->db->join('prodi', 'prodi = id_prodi', 'left');
    	$this->db->where('id_mahasiswa', $id);     
        $result = $this->db->get('mahasiswa');
    	if($this->db->affected_rows()){
			return $result;
		}else{
			return false;
		}
	}
	//untuk hapus foto
		public function ambil_foto($id){
    	$this->db->where('id_mahasiswa', $id);     
        $result = $this->db->get('mahasiswa');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
	 public function hapussiswa($tampung,$nim=0){
        $this->db->delete('students_parent', array('student_id' => $tampung));
        $this->db->delete('students_origin_school', array('school_student_id' => $tampung));
        $this->db->delete('students_accounts', array('account_student_id' => $tampung));
        $this->db->delete('sks_mahasiswa', array('id_msiswasks' => $tampung));
        $this->db->delete('seri', array('id_mhs_seri' => $tampung));
        $this->db->delete('dispen', array('nimdis' => $nim));
        $this->db->delete('pembayaran_detail', array('nim_detail' => $nim));
        $this->db->delete('mahasiswa', array('id_mahasiswa' => $tampung));
        if($this->db->affected_rows()){
			return 1;
		}else{
			return false;
		}
		
      }
	//mahasiswa by nim
	public function ambil_mahasiswanim($id){
	  	$this->db->join('students_parent', 'id_mahasiswa = student_id', 'left');
    	$this->db->join('students_origin_school', 'id_mahasiswa = school_student_id', 'left');
    	$this->db->join('lecturer', 'dosen_pa = lecturer_id', 'left');
    	$this->db->join('prodi', 'prodi = id_prodi', 'left');
    	$this->db->where('nim', $id);     
        $result = $this->db->get('mahasiswa');
    	if($this->db->affected_rows()){
			return $result;
		}else{
			return false;
		}
	}
	public function ambil_sksnim($nim){
    	$this->db->join('prodi', 'prodi = id_prodi', 'left');
    	$this->db->where('nim', $nim); 
        $result = $this->db->get('mahasiswa');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
	public function ambil_sksid($id){
    	$this->db->join('prodi', 'prodi = id_prodi', 'left');
    	$this->db->join('sks_mahasiswa', 'id_mahasiswa = id_msiswasks', 'left');
    	$this->db->where('sks_mahasiswa_id', $id); 
        $result = $this->db->get('mahasiswa');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
	//mahasiswa
	public function cekortu($id){
    	$this->db->where('student_id', $id);     
        $result = $this->db->get('students_parent');
    	if($this->db->affected_rows()){
			return $result;
		}else{
			return false;
		}
	}
	public function ceksks($nim,$prodi,$smt){
    	$this->db->where('nim_msiswasks', $nim); 
    	$this->db->where('prodi_sks', $prodi);
    	$this->db->where('smt_sks', $smt);
        $result = $this->db->get('sks_mahasiswa');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
	public function ambiltosks($id){
    	$this->db->where('id_msiswasks', $id);
        $result = $this->db->get('sks_mahasiswa');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
	}
	//mahasiswa
	public function ceksekolah($id){
    	$this->db->where('school_student_id', $id);     
        $result = $this->db->get('students_origin_school');
    	if($this->db->affected_rows()){
			return $result;
		}else{
			return false;
		}
	}
	public function ceknimnya($nim){
    	$this->db->where('nim', $nim); 
        $result = $this->db->get('mahasiswa');
    	if($this->db->affected_rows()){
			return 1;
		}else{
			return false;
		}
	}
}

<?php
class Mbiaya extends CI_Model {

    function __construct(){
       
        parent::__construct();        
          
    }    
    
    public function InsertData($tableName, $data){
                $res = $this->db->insert($tableName, $data);
                return $res;
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
	public function get_all()
	{
		$param = $this->session->userdata('tahun_mahasiswa_masuk');
		$prodi = $this->session->userdata('prodi_mahasiswa');
		
		$this->db->join('jenis_bayar', 'jenis_bayar_id1 = jenis_bayar_id', 'left');
		$this->db->join('prodi', 'prodi_id1 = id_prodi', 'left');
		$this->db->where('tahun_masuk', $param);
		$this->db->where('prodi_id1', $prodi);
		return $this->db->get('biaya_kuliah')->result();
		
	}
	public function get_jenisadd()
	{		
		$dat = $this->get_all();
		
		foreach($dat as $dat) {
			$this->db->where('jenis_bayar_id !=', $dat->jenis_bayar_id);		
		}		
	//	$this->db->where('jenis_bayar_id !=', 26);
		return $this->db->get('jenis_bayar')->result();
		
	}
	public function get_jenisAll()
	{		
		$this->db->where('jenis_bayar_id !=', 1);
		$this->db->where('jenis_bayar_id !=', 5);
		return $this->db->get('jenis_bayar')->result();
		
	}
	public function get_jenisSKS()
	{
		$this->db->where('jenis_bayar_id', 5);
		return $this->db->get('jenis_bayar')->row();
	}
	public function get_jenisSPP()
	{
		$this->db->where('jenis_bayar_id', 1);
		return $this->db->get('jenis_bayar')->row();
	}
	public function deletejenis($param = 0)
	{		
	$hasil = $this->db->delete('jenis_bayar', array('jenis_bayar_id' => $param));
	if($this->db->affected_rows()){
			return $hasil;
		}else{
			return false;
		}	
	}
	public function deletebiaya($param = 0)
	{		
	$hasil = $this->db->delete('biaya_kuliah', array('biaya_kuliah_id' => $param));
	if($this->db->affected_rows()){
			return $hasil;
		}else{
			return false;
		}	
	}
	public function deleteRinci($param = 0)
	{		
	$hasil = $this->db->delete('pembayaran_detail', array('pembayara_detail_id' => $param));
	if($this->db->affected_rows()){
			return $hasil;
		}else{
			return false;
		}	
	}
	public function deleteSeri($param = 0)
	{		
	$hasil = $this->db->delete('seri', array('id_seri' => $param));
	if($this->db->affected_rows()){
			return $hasil;
		}else{
			return false;
		}	
	}
	public function ambilbiaya($id=0){
	    $this->db->join('jenis_bayar', 'jenis_bayar_id1 = jenis_bayar_id', 'left');
		$this->db->join('prodi', 'prodi_id1 = id_prodi', 'left');
	    $this->db->where('biaya_kuliah_id', $id);
        $result = $this->db->get('biaya_kuliah');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
	public function updatebiaya($bkul = 0, $where=0)
	    {
		$this->db->update('biaya_kuliah',$bkul, $where);
		
		if($this->db->affected_rows())
		{
			return 1;
		} else {
			return false;
		}
	}
	public function getjenis($id=0){
	    $this->db->where('jenis_bayar_id', $id);
        $result = $this->db->get('jenis_bayar');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
	public function updatejenis($datin = 0, $where=0)
	    {
		$this->db->update('jenis_bayar', $datin, $where);
		
		if($this->db->affected_rows())
		{
			return 1;
		} else {
			return false;
		}
	}
	public function check_tahun($tahun, $prodi)
	{		
		$this->db->where('tahun_masuk', $tahun);
		$this->db->where('prodi_id1', $prodi);
		$tahun = $this->db->get('biaya_kuliah')->row();
		if(!empty($tahun)){
			return 1;
		}else {
			return 0;
		}
	}
	public function getmhs()
	{
		$nim_session=$this->session->userdata('pembayaran_mahasiswa_nim');
		$this->db->join('prodi', 'mahasiswa.prodi = prodi.id_prodi', 'left');
		$this->db->where('mahasiswa.nim', $nim_session);
		return $this->db->get('mahasiswa')->row();
	}
	
	public function get_jenisTahun()
	{
		$idnim = $this->session->userdata('pembayaran_mahasiswa_nim');
		$prodi = $this->session->userdata('student_prodi');
        $tahun_akademik = getField('mahasiswa', 'tahun_masuk', 'nim', $idnim);
		$this->db->join('jenis_bayar', 'jenis_bayar_id1 = jenis_bayar_id', 'left');
		$this->db->where('tahun_masuk', $tahun_akademik);
		$this->db->where('prodi_id1', $prodi);
		return $this->db->get('biaya_kuliah')->result();
		
	}
	public function get_jebaTahun()
	{
		$idnim=$this->session->userdata('pembayaran_mahasiswa_nim');
		$prodi = $this->session->userdata('student_prodi');
        $tahun_akademik = getField('mahasiswa', 'tahun_masuk', 'nim', $idnim);
		$this->db->join('jenis_bayar', 'biaya_kuliah.jenis_bayar_id1 = jenis_bayar.jenis_bayar_id', 'left');
		$this->db->where('biaya_kuliah.jenis_bayar_id1 !=', 5);
		$this->db->where('biaya_kuliah.jenis_bayar_id1 !=', 1);
		$this->db->where('biaya_kuliah.tahun_masuk', $tahun_akademik);
		$this->db->where('biaya_kuliah.prodi_id1', $prodi);
		return $this->db->get('biaya_kuliah')->result();
		
	}
	public function uang()
	{
		$nim_session=$this->session->userdata('pembayaran_mahasiswa_nim');
		$this->db->join('prodi', 'mahasiswa.prodi = prodi.id_prodi', 'left');
		$this->db->where('mahasiswa.nim', $nim_session);
		return $this->db->get('mahasiswa')->row();
	}
	public function stu_id($param = 0)
	{
		$query = $this->db->query("SELECT id_mahasiswa FROM mahasiswa WHERE nim = ?", $param);
		return $query->row();
	}
	public function cekskstotal($id,$prodi,$smt){
    	$this->db->where('id_msiswasks', $id); 
    	$this->db->where('prodi_sks', $prodi);
    	$this->db->where('smt_sks', $smt);
        $result = $this->db->get('sks_mahasiswa');
    	if($this->db->affected_rows()){
			return $result->row()->sks_jumlah;
		}else{
			return 0;
		}
	}
	public function cekSeri($serino=0){
	    $this->db->where('no_seri', $serino);
        $result = $this->db->get('seri');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
	public function getSeri() {
	    $alamat = base_url();
        $this->datatables->select('id_seri,no_seri,id_mhs_seri,nim_mhs_seri,tgl_seri,jumlah_seri,ket_seri,nama');
        $this->datatables->from('seri');
        $this->datatables->join('mahasiswa', 'id_mhs_seri = id_mahasiswa','left');
        $this->datatables->add_column('view', '<a href="'.$alamat.'biaya/lihatseri/$1.html"><i class="fas fa-eye pr-2"></i></a>','id_seri,no_seri,id_mhs_seri,nim_mhs_seri,tgl_seri,jumlah_seri,ket_seri,nama');      
        return $this->datatables->generate();
    }
    public function getSeriNim() {
	    $alamat = base_url();
	    $nims = $this->session->userdata('pembayaran_mahasiswa_nim');
        $this->datatables->select('id_seri,no_seri,id_mhs_seri,nim_mhs_seri,tgl_seri,jumlah_seri,ket_seri,nama,nim');
        $this->datatables->from('seri');
        $this->datatables->join('mahasiswa', 'id_mhs_seri = id_mahasiswa','left');
        $this->datatables->where('nim', $nims);
        $this->datatables->add_column('view', '<a href="javascript:void(0);" data-code="$1" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a>','id_seri,no_seri,id_mhs_seri,nim_mhs_seri,tgl_seri,jumlah_seri,ket_seri,nama,nim');      
        return $this->datatables->generate();
    }
	
}

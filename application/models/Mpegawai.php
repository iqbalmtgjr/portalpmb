<?php
class Mpegawai extends CI_Model {

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
	
	 public function UpdateData($tableName, $data, $where){
                $res = $this->db->update($tableName, $data, $where);
                return $res;
            }
	
	public function get_all_pegawai() {
	    $alamat = base_url();
        $this->datatables->select('lecturer_id,name,status,aktif_kerja,nama_status');
        $this->datatables->join('gaji_pegawai', 'status = kode_status', 'left');
        $this->datatables->from('lecturer');
        $this->datatables->add_column('view', '<a href="'.$alamat.'pegawai/lihatpegawai/$1"><i class="fas fa-eye pr-2"></i></a><a href="'.$alamat.'pegawai/ubahpegawai/$1"><i class="fa fa-pencil-alt text-success pr-2"></i></a>
        <a href="javascript:void(0);" data-code="$1" class="delete_record"><i class="fas fa-trash text-danger"></i></a>','lecturer_id,name,status,aktif_kerja,nama_status');      
	    return $this->datatables->generate();
     }
     public function get_potong_pegawai() {
	    $alamat = base_url();
        $this->datatables->select('lecturer_id,name,aktif_kerja,id_potonggaji,bpjssehat_potong,bpjskerja_potong,simatu_potonggaji,pinjaman_potonggaji');
        $this->datatables->join('potong_gaji', 'lecturer_id = idpege_potonggaji', 'left');
        $this->datatables->where('aktif_kerja', '1');
        $this->datatables->from('lecturer');
        $this->datatables->add_column('view', '<a href="'.$alamat.'pegawai/ubahpotong/$1"><i class="fa fa-pencil-alt text-success pr-2"></i></a>','lecturer_id,name,aktif_kerja,id_potonggaji,bpjssehat_potong,bpjskerja_potong,simatu_potonggaji,pinjaman_potonggaji');      
	    return $this->datatables->generate();
     }
     public function get_lihatgaji() {
        $blan = $this->session->userdata('bulangaji');
	    $thun = $this->session->userdata('tahungaji');
	    $alamat = base_url();
        $this->datatables->select('lecturer_id,name,aktif_kerja,id_potong,id_penda,penda_bulan,penda_tahun,total_penda,total_potong');
        $this->datatables->join('pendapatan', 'idpenda_dosen = lecturer_id', 'left');
        $this->datatables->join('potongan', 'id_penda = idpenda_potong', 'left');
        $this->datatables->where('penda_bulan', $blan);
        $this->datatables->where('penda_tahun', $thun);
        $this->datatables->from('lecturer');
        $this->datatables->add_column('view', '<a href="'.$alamat.'pegawai/lihatsatupendapatan/$1"><i class="fas fa-eye text-success pr-2"></i>','id_penda');      
	    return $this->datatables->generate();
     }
    public function get_tolgaji() {
        $blan = $this->session->userdata('bulangaji');
	    $thun = $this->session->userdata('tahungaji');
	    $this->db->select('total_penda,total_potong');
        $this->db->join('potongan', 'id_penda = idpenda_potong', 'left');
	    $this->db->where('penda_bulan', $blan);
	    $this->db->where('penda_tahun', $thun);
        $result = $this->db->get('pendapatan');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
    public function pendapatansatu($id){
        $this->db->join('potongan', 'id_penda = idpenda_potong', 'left');
        $this->db->join('lecturer', 'idpenda_dosen = lecturer_id', 'left');
        $this->db->join('gaji_pegawai', 'kode_status = kodestatus_penda', 'left');
        $this->db->join('tugas_tambahan', 'id_tugas = idtugas_penda', 'left');
    	$this->db->where('id_penda', $id);     
        $result = $this->db->get('pendapatan');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
    public function ambilpotonggaji($id){
    	$this->db->where('idpege_potonggaji', $id);     
        $result = $this->db->get('potong_gaji');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
    public function all_tetap_dosen() {
	    $this->db->select('lecturer_id,name,aktif_kerja,gaji_pokok,tunj_pasangan,tunj_anak,tunj_fung,tunj_beras');
        $this->db->join('gaji_dosen_tetap', 'id_dosen = lecturer_id', 'left');
        $this->db->where('status', 'ds_tetap');
        $this->db->where('aktif_kerja', '1');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     public function ambilbuat_gaji() {
	    $this->db->select('lecturer_id,name,aktif_kerja,gaji_pokok,tunj_pasangan,tunj_anak,tunj_fung,tunj_beras,tunj_tambahan,tunj_status,kode_status,id_tugas');
        $this->db->join('gaji_dosen_tetap', 'id_dosen = lecturer_id', 'left');
        $this->db->join('tugas_tambahan', 'tugas = id_tugas', 'left');
        $this->db->join('gaji_pegawai', 'status = kode_status', 'left');
        $this->db->where('aktif_kerja', '1');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     public function bulangaji() {
	    $this->db->group_by('penda_tahun');
	    $this->db->group_by('penda_bulan');
        $result = $this->db->get('pendapatan');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     
 	public function get_all_nidk() {
	    $kcl = array('ds_nidk', 'ds_nidk_khusus');
	    $this->db->select('lecturer_id,name,aktif_kerja,nama_status, tunj_status');
        $this->db->join('gaji_pegawai', 'status = kode_status', 'left');
        $this->db->where_in('status', $kcl);
        $this->db->where('aktif_kerja', '1');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     // Tabel Staf Tetap
     public function get_staf_tetap() {
	    $this->db->select('lecturer_id,name,aktif_kerja,gaji_pokok,tunj_pasangan,tunj_anak,tunj_fung,tunj_beras');
        $this->db->join('gaji_dosen_tetap', 'id_dosen = lecturer_id', 'left');
        $this->db->where('status', 'staf_tetap');
        $this->db->where('aktif_kerja', '1');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     public function get_staf_kontrak() {
        $kcl = array('staf_kontrak', 'staf_kontrak_s2');
	    $this->db->select('lecturer_id,name,aktif_kerja,nama_status, tunj_status');
        $this->db->join('gaji_pegawai', 'status = kode_status', 'left');
        $this->db->where_in('status', $kcl);
        $this->db->where('aktif_kerja', '1');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     public function get_satpam() {
	    $this->db->select('lecturer_id,name,aktif_kerja,nama_status,tunj_status');
        $this->db->join('gaji_pegawai', 'status = kode_status', 'left');
        $this->db->where('status', 'satpam');
        $this->db->where('aktif_kerja', '1');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     public function get_kebersihan() {
        $kcl = array('cleaning', 'cleaning_part');
        $this->db->select('lecturer_id,name,aktif_kerja,nama_status, tunj_status');
        $this->db->join('gaji_pegawai', 'status = kode_status', 'left');
        $this->db->where_in('status', $kcl);
        $this->db->where('aktif_kerja', '1');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     public function get_kontrak_khusus() {
         $kcl = array('kontrak_khusus','kontrak_spesial');
        $this->db->select('lecturer_id,name,aktif_kerja,nama_status, tunj_status');
        $this->db->join('gaji_pegawai', 'status = kode_status', 'left');
        $this->db->where_in('status', $kcl);
        $this->db->where('aktif_kerja', '1');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     public function get_guru_tk() {
        $this->db->select('lecturer_id,name,aktif_kerja,nama_status, tunj_status');
        $this->db->join('gaji_pegawai', 'status = kode_status', 'left');
        $this->db->where('status', 'guru_tk');
        $this->db->where('aktif_kerja', '1');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
	    
     }
     public function get_pimpinan() {
	    $ada = array('1', '2', '3');
        $this->db->select('lecturer_id,name,nama_tugas,tunj_tambahan,aktif_kerja,id_tugas');
        $this->db->join('tugas_tambahan', 'tugas = id_tugas', 'left');
        $this->db->where_in('tugas', $ada);
        $this->db->where('aktif_kerja', '1');
        $this->db->order_by('id_tugas','ASC');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     public function get_ketua_prodi() {
        $this->db->select('lecturer_id,name,nama_tugas,tunj_tambahan,aktif_kerja,id_tugas');
        $this->db->join('tugas_tambahan', 'tugas = id_tugas', 'left');
        $this->db->where('tugas', '4');
        $this->db->where('aktif_kerja', '1');
        $this->db->order_by('id_tugas','ASC');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     public function get_ketua_lembaga() {
        $dalam = array('5', '9', '10');
        $this->db->select('lecturer_id,name,nama_tugas,tunj_tambahan,aktif_kerja,id_tugas');
        $this->db->join('tugas_tambahan', 'tugas = id_tugas', 'left');
        $this->db->where_in('tugas', $dalam);
        $this->db->where('aktif_kerja', '1');
        $this->db->order_by('id_tugas','ASC');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     public function get_sekretaris() {
        $this->db->select('lecturer_id,name,nama_tugas,tunj_tambahan,aktif_kerja,id_tugas');
        $this->db->join('tugas_tambahan', 'tugas = id_tugas', 'left');
        $this->db->where('tugas', '6');
        $this->db->where('aktif_kerja', '1');
        $this->db->order_by('id_tugas','ASC');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     public function get_administrasi() {
        $this->db->select('lecturer_id,name,nama_tugas,tunj_tambahan,aktif_kerja,id_tugas');
        $this->db->join('tugas_tambahan', 'tugas = id_tugas', 'left');
        $this->db->where('tugas', '7');
        $this->db->where('aktif_kerja', '1');
        $this->db->order_by('id_tugas','ASC');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
     public function get_student() {
        $ada = array('student_staff', 'student_khusus', 'student_spesial');
        $this->db->select('lecturer_id,name,nama_status,tunj_status,aktif_kerja');
        $this->db->join('gaji_pegawai', 'status = kode_status', 'left');
        $this->db->where_in('status', $ada);
        $this->db->where('aktif_kerja', '1');
        $this->db->order_by('tunj_status','ASC');
        $result = $this->db->get('lecturer');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
     }
    public function ambil_all_dosen($id){
        $this->db->select('c.lecturer_id,c.lecturer_code,c.nidn,c.name,c.address,c.phone,c.status,c.photo,c.gender,c.tugas,c.pasangan,c.anak,c.place_of_birts,c.religion,c.birts,c.nip,c.base, c.fungsional,c.golongan,c.tmmd,c.tertinggi,c.sertifikasi,c.ilmu,c.aktif_serdos,c.aktif_kerja,a.email,b.nama_prodi');
    	$this->db->join('lecturer_accounts as a', 'c.lecturer_id = a.lecturer_id', 'left');
    	$this->db->join('prodi as b', 'c.base = b.id_prodi', 'left');
    	$this->db->where('c.lecturer_id', $id);     
        $result = $this->db->get('lecturer as c');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
    public function ambil_gaji_tetap($id){
    	$this->db->where('id_dosen', $id);     
        $result = $this->db->get('gaji_dosen_tetap');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
	public function ambil_potong_satu($id){
    	$this->db->where('idpege_potonggaji', $id);     
        $result = $this->db->get('potong_gaji');
    	if($this->db->affected_rows()){
			return $result->row();
		}else{
			return false;
		}
	}
	public function cekbulantahun($bulan,$thaun){
    	$this->db->where('penda_bulan', $bulan); 
    	$this->db->where('penda_tahun', $thaun);
        $result = $this->db->get('pendapatan');
    	if($this->db->affected_rows()){
			return $result->result();
		}else{
			return false;
		}
	}
   public function ambil_prodi(){
        $result=$this->db->get('prodi');
        return $result;
	}
	public function ambil_status(){
        $result=$this->db->get('gaji_pegawai');
        return $result;
	}
    public function ambil_tugas(){
        $result=$this->db->get('tugas_tambahan');
        return $result;
	}
    public function deldos($tampung){  
        $param = $tampung['lecturer_id'];
        $this->db->delete('lecturer', array('lecturer_id' => $param));
		$this->db->delete('lecturer_accounts', array('lecturer_id' => $param));
      }
}

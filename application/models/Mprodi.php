<?php
class Mprodi extends CI_Model {

    function __construct(){
       
        parent::__construct();        
          
    }    
    	// Daftar semua pendaftar
    public function get_all_siswa() {
	    $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,ref,nis_siswa,nama_siswa,gelombang,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun','left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa','left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi','left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru','left');
        $this->datatables->where('last_login_siswa !=', '');
	    return $this->datatables->generate();
    }
   
    //daftar prestasi valid Registrasi
    public function prestasi1_all_siswa() {
	   $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,ref,nis_siswa,nama_siswa,jalur,prodi_penerimaan,nama_prodi,gelombang,keputusan_text,(SELECT SUM(jlh_bayar) from  bukti_bayar where akunb_msiswa = akun_siswa AND validasi_bukti = "2") as bayar');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun','left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa','left');
         $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan','left');
        $this->datatables->join('prodi', 'prodi_penerimaan = id_prodi','left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan','left');
        $this->datatables->where('last_login_siswa !=', '');
        $this->datatables->where('jalur', 'prestasi');
	    return $this->datatables->generate();
    }
   
    public function testvalid_all_siswa() {
	  
	    $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,ref,nis_siswa,nama_siswa,pilihan_satu,gelombang,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,keputusan_text,valid_bayar');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun','left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa','left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa','left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi','left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru','left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan','left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan','left');
        $this->datatables->where('last_login_siswa !=', '');
        $this->datatables->where('jalur ', 'test');
	    return $this->datatables->generate();
    }
    
}

<?php
class Mpkkmb extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    public function dmaba()
    {
        $this->db->join('pmb_akun', 'pengenal_akun_pkkmb = pengenal_akun', 'left');
        $this->db->join('pmb_siswa', 'pengenal_akun_pkkmb = akun_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'pengenal_akun_pkkmb = siswa_penerimaan', 'left');
        $this->db->join('pmb_prodi', 'pengenal_akun_pkkmb = prodi_id_siswa', 'left');
        $this->db->join('pmb_upload', 'pengenal_akun_pkkmb = upload_id_siswa', 'left');
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('pkkmb');
        return $result;
    }
    
    public function allpkkmb()
    {
        $this->db->from('pkkmb');
        $this->db->join('pmb_akun', 'pengenal_akun_pkkmb = pengenal_akun', 'left');
        $this->db->join('pmb_siswa', 'pengenal_akun_pkkmb = akun_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'pengenal_akun_pkkmb = siswa_penerimaan', 'left');
        $this->db->join('pmb_prodi', 'pengenal_akun_pkkmb = prodi_id_siswa', 'left');
        $this->db->join('pmb_upload', 'pengenal_akun_pkkmb = upload_id_siswa', 'left');
        $this->db->group_by('no_daftar');

        $pkkmb = $this->db->get()->result();
        
        return $pkkmb;
    }

    public function pkkmb()
    {
        $this->db->from('pkkmb');
        $this->db->group_by('no_daftar');

        $blmpkkmb = $this->db->get()->result();
        $anjay = array();
        foreach ($blmpkkmb as $key) {
            $anjay[] = $key->pengenal_akun_pkkmb;
        }

        return $anjay;
    }

    public function blmpkkmb()
    {
        $this->db->where_not_in('akunb_msiswa', $this->pkkmb());
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->db->where('jalur !=', 'reguler2');
        $this->db->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->db->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->group_by('akunb_msiswa');

        $blmregisx = $this->db->get()->result();
        return $blmregisx;
    }
    
    public function lulusblmpkkmb()
    {
        $this->db->where_not_in('akun_siswa', $this->pkkmb());
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->where('jalur !=', 'reguler2');
        // $this->db->join('pmb_siswa', 'akun_siswa = akun_siswa', 'left');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->where('status_penerimaan', '1');
        $this->db->group_by('akun_siswa');

        $blmregisx = $this->db->get()->result();
        return $blmregisx;
    }
}

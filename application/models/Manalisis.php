<?php
class Manalisis extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function mabaregis()
    {
        $this->datatables->select('id_siswa, akun_siswa, ref, nama_siswa, tgl_trans, jam_trans, nama_pengirim, jlh_bayar, bukti_bayar');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->datatables->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        // $this->datatables->where('gelombang', '3');
        // $this->datatables->where('validasi_bukti', 2);
        // $this->datatables->group_by('akunb_msiswa');
        return $this->datatables->generate();
    }

    public function belumregis()
    {
        // $this->db->select('id_siswa, akun_siswa, ref, nama_siswa, gelombang, prodi_penerimaan');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        // $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        // $this->db->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        // $this->db->join('bukti_bayar', 'akun_siswa = akunb_msiswa', 'right');
        $this->db->where('gelombang', '3');
        // $this->db->where('jalur !=', 'reguler2');
        // $this->db->where('valid_bayar', 2);
        $this->db->where('validasi_bukti', 2);
        $this->db->group_by('akunb_msiswa');

        $blmregis = $this->db->get()->result();
        // return $blmregis;
        $anjay = array();
        foreach ($blmregis as $key) {
            $anjay[] = $key->akunb_msiswa;
        }

        return $anjay;
    }

    public function tdk()
    {


        // $this->db->select('id_siswa, akun_siswa, ref, nama_siswa, gelombang, prodi_penerimaan');
        // $this->db->from();
        // $this->db->join('bukti_bayar', 'akun_siswa = akunb_msiswa', 'left');
        // $this->db->where('validasi_bukti', 2);
        // $this->db->group_by('akunb_msiswa');
        $this->db->where_not_in('akun_siswa', $this->belumregis());
        $this->db->where('valid_bayar', 2);
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->where('gelombang', '3');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->where('jalur !=', 'reguler2');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->where('status_penerimaan', '1');

        $blmregisx = $this->db->get('pmb_siswa')->result();
        return $blmregisx;
    }
}

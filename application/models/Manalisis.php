<?php
class Manalisis extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function mabaregis()
    {
        $this->datatables->select('id_siswa, akun_siswa, ref, nama_siswa, tgl_trans, jam_trans, nama_pengirim, jlh_bayar, bukti_bayar, id_bukti_bayar, keterangan');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->datatables->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->datatables->where('validasi_bukti', 2);
        
        $tangkap_gel = $this->session->userdata('filter_gel_regis');
        $tangkap_jal = $this->session->userdata('filter_jal_regis');
        if (empty($tangkap_gel)) {
        } elseif($tangkap_gel == "" && $tangkap_jal == "prestasi") {
            $this->datatables->where('jalur', 'prestasi');
        } elseif($tangkap_gel == "" && $tangkap_jal == "test") {
            $this->datatables->where('jalur', 'test');
        } elseif($tangkap_gel == "1" && $tangkap_jal == "") {
            $this->datatables->where('gelombang ', '1');
        } elseif ($tangkap_gel == "2" && $tangkap_jal == "") {
            $this->datatables->where('gelombang ', '2');
        } elseif($tangkap_gel == "3" && $tangkap_jal == "") {
            $this->datatables->where('gelombang ', '3');
        } elseif($tangkap_gel == "1" && $tangkap_jal == "test") {
            $this->datatables->where('gelombang ', '1');
            $this->datatables->where('jalur', 'test');
        } elseif($tangkap_gel == "2" && $tangkap_jal == "test") {
            $this->datatables->where('gelombang ', '2');
            $this->datatables->where('jalur', 'test');
        } elseif($tangkap_gel == "3" && $tangkap_jal == "test") {
            $this->datatables->where('gelombang ', '3');
            $this->datatables->where('jalur', 'test');
        } elseif($tangkap_gel == "1" && $tangkap_jal == "prestasi") {
            $this->datatables->where('gelombang ', '1');
            $this->datatables->where('jalur', 'prestasi');
        } elseif($tangkap_gel == "2" && $tangkap_jal == "prestasi") {
            $this->datatables->where('gelombang ', '2');
            $this->datatables->where('jalur', 'prestasi');
        } elseif($tangkap_gel == "3" && $tangkap_jal == "prestasi") {
            $this->datatables->where('gelombang ', '3');
            $this->datatables->where('jalur', 'prestasi');
        } else {
        }
        
        // $this->datatables->order_by('id_bukti_bayar');
        $this->datatables->group_by('akunb_msiswa');
        return $this->datatables->generate();
    }

    public function belumregis()
    {
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        // $this->db->where('gelombang', '3');
        $this->db->where('validasi_bukti', 2);
        $this->db->group_by('akunb_msiswa');

        $blmregis = $this->db->get()->result();
        $anjay = array();
        foreach ($blmregis as $key) {
            $anjay[] = $key->akunb_msiswa;
        }

        return $anjay;
    }

    public function tdk()
    {
        $this->db->where_not_in('akun_siswa', $this->belumregis());
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->where('valid_bayar', '2');
        $this->db->where('jalur !=', 'reguler2');
        $this->db->where('status_penerimaan', '1');
        
        $tangkap_gel = $this->session->userdata('filter_gel_regis2');
        $tangkap_jal = $this->session->userdata('filter_jal_regis2');
        if (empty($tangkap_gel)) {
        } elseif ($tangkap_gel == "1" && $tangkap_jal == "") {
            $this->db->where('gelombang ', '1');
        } elseif ($tangkap_gel == "2" && $tangkap_jal == "") {
            $this->db->where('gelombang ', '2');
        } elseif($tangkap_gel == "3" && $tangkap_jal == "") {
            $this->db->where('gelombang ', '3');
        } elseif($tangkap_gel == "1" && $tangkap_jal == "test") {
            $this->db->where('gelombang ', '1');
            $this->db->where('jalur ', 'test');
        } elseif($tangkap_gel == "2" && $tangkap_jal == "test") {
            $this->db->where('gelombang', '2');
            $this->db->where('jalur ', 'test');
        } elseif($tangkap_gel == "3" && $tangkap_jal == "test") {
            $this->db->where('gelombang', '3');
            $this->db->where('jalur ', 'test');
        } elseif($tangkap_gel == "1" && $tangkap_jal == "prestasi") {
            $this->db->where('gelombang', '1');
            $this->db->where('jalur ', 'prestasi');
        } elseif($tangkap_gel == "2" && $tangkap_jal == "prestasi") {
            $this->db->where('gelombang', '2');
            $this->db->where('jalur', 'prestasi');
        } elseif($tangkap_gel == "3" && $tangkap_jal == "prestasi") {
            $this->db->where('gelombang', '3');
            $this->db->where('jalur', 'prestasi');
        } elseif($tangkap_gel == "" && $tangkap_jal == "prestasi") {
            $this->db->where('jalur', 'prestasi');
        } elseif($tangkap_gel == "" && $tangkap_jal == "test") {
            $this->db->where('jalur', 'test');
        }

        $blmregisx = $this->db->get('pmb_siswa')->result();
        return $blmregisx;
    }
    
    public function sekolah()
    {
        $this->db->join('pmb_sekolah', 'siswa_penerimaan = sekolah_id_siswa', 'left');
        $this->db->where('status_penerimaan', '1');
        $sekolah = $this->db->get('pmb_penerimaan')->result();
        return $sekolah;
    }
    
    public function getSchoolData()
    {
        $this->db->select('data_sekolah.nama_sekolah, COUNT(*) as jumlah_siswa');
        $this->db->from('pmb_sekolah');
        $this->db->join('data_sekolah', 'pmb_sekolah.data_sekolah_id = data_sekolah.id_data_sekolah', 'left');
        $this->db->join('pmb_penerimaan', 'sekolah_id_siswa = siswa_penerimaan', 'left');
        $this->db->join('pmb_siswa', 'sekolah_id_siswa = akun_siswa', 'left');
        $this->db->where('keterangan', null);
        $this->db->where('status_penerimaan', '1');
        $this->db->group_by('data_sekolah.nama_sekolah');
        $query = $this->db->get();
        
        return $query->result();
    }

    public function getSchoolPercentage()
    {
        $schoolData = $this->getSchoolData();
        $totalSiswa = 0;

        foreach ($schoolData as $data) {
            $totalSiswa += $data->jumlah_siswa;
        }
        
        // print_r($totalSiswa);die;

        $schoolPercentage = [];
        foreach ($schoolData as $data) {
            $percentage = ($data->jumlah_siswa / $totalSiswa) * 100;
            $jumlah_siswa = $data->jumlah_siswa;
            $schoolPercentage[] = [
                'nama_sekolah' => $data->nama_sekolah,
                'persentase' => $percentage,
                'jumlah_siswa' => $jumlah_siswa,
                'total_mhs' => $totalSiswa
            ];
        }

        return $schoolPercentage;
    }
}

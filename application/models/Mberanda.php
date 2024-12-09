<?php
class Mberanda extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    public function prodi()
    {
        $this->db->select('count(id_siswa) as babu, pilihan_satu, nama_prodi');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('prodi_penerimaan');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('gelombang ', 1);
        $this->db->where('valid_bayar ', 2);
        $this->db->where('jalur !=', 'reguler2');
        $this->db->where('status_penerimaan', 1);
        $res = $this->db->get();
        return $res->result();
    }
    public function prodig2()
    {
        $this->db->select('count(id_siswa) as babu, pilihan_satu, nama_prodi');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('prodi_penerimaan');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('gelombang ', 2);
        $this->db->where('valid_bayar ', 2);
        $this->db->where('jalur !=', 'reguler2');
        $this->db->where('status_penerimaan', 1);
        $res = $this->db->get();
        return $res->result();
    }
    public function prodig3()
    {
        $this->db->select('count(id_siswa) as babu, pilihan_satu, nama_prodi');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('prodi_penerimaan');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('gelombang ', 3);
        $this->db->where('valid_bayar ', 2);
        $this->db->where('jalur !=', 'reguler2');
        $this->db->where('status_penerimaan', 1);
        $res = $this->db->get();
        return $res->result();
    }
    public function prodig123()
    {
        $this->db->select('count(id_siswa) as babu, pilihan_satu, nama_prodi');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('prodi_penerimaan');
        $this->db->where('last_login_siswa !=', '');
        // $this->db->where('gelombang ', 3);
        $this->db->where('valid_bayar ', 2);
        $this->db->where('jalur !=', 'reguler2');
        $this->db->where('status_penerimaan', 1);
        $res = $this->db->get();
        return $res->result();
    }
    public function prodijalurtest()
    {
        $this->db->select('count(id_siswa) as babu, pilihan_satu, nama_prodi');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('prodi_penerimaan');
        // $this->db->where('last_login_siswa !=', '');
        $this->db->where('valid_bayar ', 2);
        $this->db->where('jalur', 'test');
        $this->db->where('status_penerimaan', 1);
        $res = $this->db->get();
        return $res->result();
    }
    public function prodijalurpres()
    {
        $this->db->select('count(id_siswa) as babu, pilihan_satu, nama_prodi');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('prodi_penerimaan');
        // $this->db->where('last_login_siswa !=', '');
        $this->db->where('valid_bayar ', 2);
        $this->db->where('jalur', 'prestasi');
        $this->db->where('status_penerimaan', 1);
        $res = $this->db->get();
        return $res->result();
    }
    public function prodireg2()
    {
        $this->db->select('count(id_siswa) as babu, pilihan_satu, nama_prodi');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->group_by('pilihan_satu', 'asc');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('valid_bayar ', 2);
        $this->db->where('jalur', 'reguler2');
        $res = $this->db->get();
        return $res->result();
    }
    public function gel_valid($gel)
    {
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('valid_bayar', '2');
        $this->db->where('pembayaran_upload !=', '');
        $this->db->where('gelombang', $gel);
        $res = $this->db->count_all_results();

        return $res;
    }
    public function tes_valid()
    {
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'test');
        $this->db->where('valid_bayar ', 2);
        $res = $this->db->count_all_results();

        return $res;
    }
    public function pres_valid()
    {
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'prestasi');
        $this->db->where('valid_bayar ', 2);
        $res = $this->db->count_all_results();

        return $res;
    }
    public function dua_valid()
    {
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'reguler2');
        $this->db->where('valid_bayar ', 2);
        $res = $this->db->count_all_results();

        return $res;
    }
    public function get_regis_bayar()
    {
        $this->db->select('akunb_msiswa,nama_siswa,nama_prodi,jalur');
        $this->db->select_sum('jlh_bayar');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->where('validasi_bukti', 2);
        $this->db->where('nama_siswa !=', null);
        $res = $this->db->count_all_results();
        return $res;
    }
    public function get_penvalido()
    {
        $query = $this->db->query('SELECT COUNT(FROM_UNIXTIME(daftar_akun, "%Y")) as total, FROM_UNIXTIME(daftar_akun, "%m") as bulan, FROM_UNIXTIME(daftar_akun, "%M") as bula, FROM_UNIXTIME(daftar_akun, "%Y") as tahun FROM pmb_akun LEFT JOIN pmb_siswa ON akun_siswa = pengenal_akun WHERE valid_bayar = 2 GROUP BY FROM_UNIXTIME(daftar_akun, "%M"),FROM_UNIXTIME(daftar_akun, "%Y") ORDER BY tahun, bulan ASC');
        $arr = [];
        if (!empty($query)) {
            foreach ($query->result() as $d => $v) {
                // $arr[] = ['label' => $v->bula . ' ' . $v->tahun, 'lok' => $v->bula, 'pret' => $v->tahun, 'y' => $v->total];
                $arr[] = $v->bula . ' ' . $v->tahun;
            }
            return $arr;
        } else {
            return false;
        }
    }
    public function get_penvalido2()
    {
        $query = $this->db->query('SELECT COUNT(FROM_UNIXTIME(daftar_akun, "%Y")) as total, FROM_UNIXTIME(daftar_akun, "%m") as bulan, FROM_UNIXTIME(daftar_akun, "%M") as bula, FROM_UNIXTIME(daftar_akun, "%Y") as tahun FROM pmb_akun LEFT JOIN pmb_siswa ON akun_siswa = pengenal_akun WHERE valid_bayar = 2 GROUP BY FROM_UNIXTIME(daftar_akun, "%M"),FROM_UNIXTIME(daftar_akun, "%Y") ORDER BY tahun, bulan ASC');
        $arr = [];
        if (!empty($query)) {
            foreach ($query->result() as $d => $v) {
                // $arr[] = ['label' => $v->bula . ' ' . $v->tahun, 'lok' => $v->bula, 'pret' => $v->tahun, 'y' => $v->total];
                $arr[] = $v->total;
            }
            return $arr;
        } else {
            return false;
        }
    }
    public function get_penvalido22()
    {
        $DB3 = $this->load->database('db3', TRUE);
        $query = $DB3->query('SELECT COUNT(FROM_UNIXTIME(daftar_akun, "%Y")) as total, FROM_UNIXTIME(daftar_akun, "%m") as bulan, FROM_UNIXTIME(daftar_akun, "%M") as bula, FROM_UNIXTIME(daftar_akun, "%Y") as tahun FROM pmb_akun LEFT JOIN pmb_siswa ON akun_siswa = pengenal_akun WHERE valid_bayar = 2 GROUP BY FROM_UNIXTIME(daftar_akun, "%M"),FROM_UNIXTIME(daftar_akun, "%Y") ORDER BY tahun, bulan ASC');
        if (!empty($query)) {
            foreach ($query->result() as $d => $v) {
                // $arr[] = ['label' => $v->bula . ' ' . $v->tahun, 'lok' => $v->bula, 'pret' => $v->tahun, 'y' => $v->total];
                $arr[] = $v->bula . ' ' . $v->tahun;
            }
            return $arr;
        } else {
            return false;
        }
    }
    public function get_penvalido222()
    {
        $DB3 = $this->load->database('db3', TRUE);
        $query = $DB3->query('SELECT COUNT(FROM_UNIXTIME(daftar_akun, "%Y")) as total, FROM_UNIXTIME(daftar_akun, "%m") as bulan, FROM_UNIXTIME(daftar_akun, "%M") as bula, FROM_UNIXTIME(daftar_akun, "%Y") as tahun FROM pmb_akun LEFT JOIN pmb_siswa ON akun_siswa = pengenal_akun WHERE valid_bayar = 2 GROUP BY FROM_UNIXTIME(daftar_akun, "%M"),FROM_UNIXTIME(daftar_akun, "%Y") ORDER BY tahun, bulan ASC');
        if (!empty($query)) {
            foreach ($query->result() as $d => $v) {
                // $arr[] = ['label' => $v->bula . ' ' . $v->tahun, 'lok' => $v->bula, 'pret' => $v->tahun, 'y' => $v->total];
                $arr[] = $v->total;
            }
            return $arr;
        } else {
            return false;
        }
    }
    public function get_penvalido222p()
    {
        $DB3 = $this->load->database('db3', TRUE);
        $query = $DB3->query('
        SELECT COUNT(FROM_UNIXTIME(daftar_akun, "%Y")) as total, 
        FROM_UNIXTIME(daftar_akun, "%m") as bulan, 
        FROM_UNIXTIME(daftar_akun, "%M") as bula, 
        FROM_UNIXTIME(daftar_akun, "%Y") as tahun FROM pmb_akun 
        LEFT JOIN pmb_prodi ON prodi_id_siswa = pengenal_akun 
        LEFT JOIN pmb_penerimaan ON siswa_penerimaan = pengenal_akun
        WHERE jalur = "prestasi" AND 
        status_penerimaan = "1"
        GROUP BY FROM_UNIXTIME(daftar_akun, "%M"),FROM_UNIXTIME(daftar_akun, "%Y") 
        ORDER BY tahun, bulan ASC');
        if (!empty($query)) {
            foreach ($query->result() as $d => $v) {
                // $arr[] = ['label' => $v->bula . ' ' . $v->tahun, 'lok' => $v->bula, 'pret' => $v->tahun, 'y' => $v->total];
                $arr[] = $v->total;
            }
            return $arr;
        } else {
            return false;
        }
    }
    public function get_penvalido21()
    {
        $DB4 = $this->load->database('db4', TRUE);
        $query = $DB4->query('SELECT COUNT(FROM_UNIXTIME(daftar_akun, "%Y")) as total, FROM_UNIXTIME(daftar_akun, "%m") as bulan, FROM_UNIXTIME(daftar_akun, "%M") as bula, FROM_UNIXTIME(daftar_akun, "%Y") as tahun FROM pmb_akun LEFT JOIN pmb_siswa ON akun_siswa = pengenal_akun WHERE valid_bayar = 2 GROUP BY FROM_UNIXTIME(daftar_akun, "%M"),FROM_UNIXTIME(daftar_akun, "%Y") ORDER BY tahun, bulan ASC');
        if (!empty($query)) {
            foreach ($query->result() as $d => $v) {
                // $arr[] = ['label' => $v->bula . ' ' . $v->tahun, 'lok' => $v->bula, 'pret' => $v->tahun, 'y' => $v->total];
                $arr[] = $v->bula . ' ' . $v->tahun;
            }
            return $arr;
        } else {
            return false;
        }
    }
    public function get_penvalido221()
    {
        $DB4 = $this->load->database('db4', TRUE);
        $query = $DB4->query('SELECT COUNT(FROM_UNIXTIME(daftar_akun, "%Y")) as total, FROM_UNIXTIME(daftar_akun, "%m") as bulan, FROM_UNIXTIME(daftar_akun, "%M") as bula, FROM_UNIXTIME(daftar_akun, "%Y") as tahun FROM pmb_akun LEFT JOIN pmb_siswa ON akun_siswa = pengenal_akun WHERE valid_bayar = 2 GROUP BY FROM_UNIXTIME(daftar_akun, "%M"),FROM_UNIXTIME(daftar_akun, "%Y") ORDER BY tahun, bulan ASC');
        if (!empty($query)) {
            foreach ($query->result() as $d => $v) {
                // $arr[] = ['label' => $v->bula . ' ' . $v->tahun, 'lok' => $v->bula, 'pret' => $v->tahun, 'y' => $v->total];
                $arr[] = $v->total;
            }
            return $arr;
        } else {
            return false;
        }
    }
    public function get_penvalido221p()
    {
        $DB4 = $this->load->database('db4', TRUE);
        $query = $DB4->query('
        SELECT COUNT(FROM_UNIXTIME(daftar_akun, "%Y")) as total, 
        FROM_UNIXTIME(daftar_akun, "%m") as bulan, 
        FROM_UNIXTIME(daftar_akun, "%M") as bula, 
        FROM_UNIXTIME(daftar_akun, "%Y") as tahun FROM pmb_akun 
        LEFT JOIN pmb_prodi ON prodi_id_siswa = pengenal_akun 
        LEFT JOIN pmb_penerimaan ON siswa_penerimaan = pengenal_akun
        WHERE jalur = "prestasi" AND 
        status_penerimaan = "1"
        GROUP BY FROM_UNIXTIME(daftar_akun, "%M"),FROM_UNIXTIME(daftar_akun, "%Y") 
        ORDER BY tahun, bulan ASC');
        if (!empty($query)) {
            foreach ($query->result() as $d => $v) {
                // $arr[] = ['label' => $v->bula . ' ' . $v->tahun, 'lok' => $v->bula, 'pret' => $v->tahun, 'y' => $v->total];
                $arr[] = $v->total;
            }
            return $arr;
        } else {
            return false;
        }
    }
    public function get_penvalido23()
    {
        $DB5 = $this->load->database('db5', TRUE);
        $query = $DB5->query('SELECT COUNT(FROM_UNIXTIME(daftar_akun, "%Y")) as total, FROM_UNIXTIME(daftar_akun, "%m") as bulan, FROM_UNIXTIME(daftar_akun, "%M") as bula, FROM_UNIXTIME(daftar_akun, "%Y") as tahun FROM pmb_akun LEFT JOIN pmb_siswa ON akun_siswa = pengenal_akun WHERE valid_bayar = 2 GROUP BY FROM_UNIXTIME(daftar_akun, "%M"),FROM_UNIXTIME(daftar_akun, "%Y") ORDER BY tahun, bulan ASC');
        if (!empty($query)) {
            foreach ($query->result() as $d => $v) {
                // $arr[] = ['label' => $v->bula . ' ' . $v->tahun, 'lok' => $v->bula, 'pret' => $v->tahun, 'y' => $v->total];
                $arr[] = $v->bula . ' ' . $v->tahun;
            }
            return $arr;
        } else {
            return false;
        }
    }
    public function get_penvalido223()
    {
        $DB5 = $this->load->database('db5', TRUE);
        $query = $DB5->query('SELECT COUNT(FROM_UNIXTIME(daftar_akun, "%Y")) as total, FROM_UNIXTIME(daftar_akun, "%m") as bulan, FROM_UNIXTIME(daftar_akun, "%M") as bula, FROM_UNIXTIME(daftar_akun, "%Y") as tahun FROM pmb_akun LEFT JOIN pmb_siswa ON akun_siswa = pengenal_akun WHERE valid_bayar = 2 GROUP BY FROM_UNIXTIME(daftar_akun, "%M"),FROM_UNIXTIME(daftar_akun, "%Y") ORDER BY tahun, bulan ASC');
        if (!empty($query)) {
            foreach ($query->result() as $d => $v) {
                // $arr[] = ['label' => $v->bula . ' ' . $v->tahun, 'lok' => $v->bula, 'pret' => $v->tahun, 'y' => $v->total];
                $arr[] = $v->total;
            }
            return $arr;
        } else {
            return false;
        }
    }
    public function get_penvalido24()
    {
        $DB5 = $this->load->database('db6', TRUE);
        $query = $DB5->query('SELECT COUNT(FROM_UNIXTIME(daftar_akun, "%Y")) as total, FROM_UNIXTIME(daftar_akun, "%m") as bulan, FROM_UNIXTIME(daftar_akun, "%M") as bula, FROM_UNIXTIME(daftar_akun, "%Y") as tahun FROM pmb_akun LEFT JOIN pmb_siswa ON akun_siswa = pengenal_akun WHERE valid_bayar = 2 GROUP BY FROM_UNIXTIME(daftar_akun, "%M"),FROM_UNIXTIME(daftar_akun, "%Y") ORDER BY tahun, bulan ASC');
        if (!empty($query)) {
            foreach ($query->result() as $d => $v) {
                // $arr[] = ['label' => $v->bula . ' ' . $v->tahun, 'lok' => $v->bula, 'pret' => $v->tahun, 'y' => $v->total];
                $arr[] = $v->bula . ' ' . $v->tahun;
            }
            return $arr;
        } else {
            return false;
        }
    }
    public function get_penvalido224()
    {
        $DB5 = $this->load->database('db6', TRUE);
        $query = $DB5->query('SELECT COUNT(FROM_UNIXTIME(daftar_akun, "%Y")) as total, FROM_UNIXTIME(daftar_akun, "%m") as bulan, FROM_UNIXTIME(daftar_akun, "%M") as bula, FROM_UNIXTIME(daftar_akun, "%Y") as tahun FROM pmb_akun LEFT JOIN pmb_siswa ON akun_siswa = pengenal_akun WHERE valid_bayar = 2 GROUP BY FROM_UNIXTIME(daftar_akun, "%M"),FROM_UNIXTIME(daftar_akun, "%Y") ORDER BY tahun, bulan ASC');
        if (!empty($query)) {
            foreach ($query->result() as $d => $v) {
                // $arr[] = ['label' => $v->bula . ' ' . $v->tahun, 'lok' => $v->bula, 'pret' => $v->tahun, 'y' => $v->total];
                $arr[] = $v->total;
            }
            return $arr;
        } else {
            return false;
        }
    }
    public function pdf_regis_pbsi()
    {
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->where('prodi_penerimaan', '1');
        $this->db->where('validasi_bukti', 2);
        return $this->db->count_all_results('bukti_bayar');
    }
    public function pdf_regis_pmat()
    {
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->where('prodi_penerimaan', '2');
        $this->db->where('validasi_bukti', 2);
        return $this->db->count_all_results('bukti_bayar');
    }
    public function pdf_regis_pek()
    {
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->where('prodi_penerimaan', '3');
        $this->db->where('validasi_bukti', 2);
        return $this->db->count_all_results('bukti_bayar');
    }
    public function pdf_regis_pkn()
    {
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->where('prodi_penerimaan', '4');
        $this->db->where('validasi_bukti', 2);
        return $this->db->count_all_results('bukti_bayar');
    }
    public function pdf_regis_pkom()
    {
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->where('prodi_penerimaan', '5');
        $this->db->where('validasi_bukti', 2);
        return $this->db->count_all_results('bukti_bayar');
    }
    public function pdf_regis_pbio()
    {
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->where('prodi_penerimaan', '6');
        $this->db->where('validasi_bukti', 2);
        return $this->db->count_all_results('bukti_bayar');
    }
    public function pdf_regis_paud()
    {
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->where('prodi_penerimaan', '7');
        $this->db->where('validasi_bukti', 2);
        return $this->db->count_all_results('bukti_bayar');
    }
    public function pdf_regis_pbi()
    {
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->where('prodi_penerimaan', '8');
        $this->db->where('validasi_bukti', 2);
        return $this->db->count_all_results('bukti_bayar');
    }
    public function pdf_regis_pgsd()
    {
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->where('prodi_penerimaan', '9');
        $this->db->where('validasi_bukti', 2);
        return $this->db->count_all_results('bukti_bayar');
    }

    public function valid_prestasi($prodi)
    {
        $alamat = base_url();
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', null);
        $this->db->where('jalur', 'prestasi');
        $this->db->where('pilihan_satu', $prodi);
        $this->db->where('valid_bayar', '2');

        return $this->db->count_all_results('pmb_siswa');
    }

    public function valid_test($prodi)
    {
        $alamat = base_url();
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', null);
        $this->db->where('jalur', 'test');
        $this->db->where('pilihan_satu', $prodi);
        $this->db->where('valid_bayar', '2');

        return $this->db->count_all_results('pmb_siswa');
    }

    public function regis_prestasi($prodi)
    {
        $alamat = base_url();
        $this->db->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', null);
        $this->db->where('jalur', 'prestasi');
        $this->db->where('prodi_penerimaan', $prodi);
        $this->db->where('validasi_bukti', 2);
        $this->db->group_by('akunb_msiswa');

        return $this->db->count_all_results('bukti_bayar');
    }

    public function regis_test($prodi)
    {
        $alamat = base_url();
        $this->db->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', null);
        $this->db->where('jalur', 'test');
        $this->db->where('prodi_penerimaan', $prodi);
        $this->db->where('validasi_bukti', 2);
        $this->db->group_by('akunb_msiswa');

        return $this->db->count_all_results('bukti_bayar');
    }
}

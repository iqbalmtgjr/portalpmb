<?php
class Mbank extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    public function get_all_bayar()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'bank/lihat/$3.html"><i class="fas fa-eye pr-2"></i></a>', 'id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        return $this->datatables->generate();
    }
    public function get_valid_bayar()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,id_bukti_bayar,(SELECT ref_sms FROM pmb_sms where id_buktibayar = id_bukti_bayar) as smsref,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,jalur,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->datatables->join('pmb_akun', 'pengenal_akun = akunb_msiswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->where('jalur', 'prestasi');
        $this->datatables->where('gelombang', '1');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'bank/lihat/$3.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'bank/tambahsms/$3"><i class="fas fa-plus pr-2"></i></a>', 'id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        return $this->datatables->generate();
    }
    public function get_valid2_bayar()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,id_bukti_bayar,(SELECT ref_sms FROM pmb_sms where id_buktibayar = id_bukti_bayar) as smsref,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,jalur,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->datatables->join('pmb_akun', 'pengenal_akun = akunb_msiswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->where('jalur', 'prestasi');
        $this->datatables->where('gelombang', '2');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'bank/lihat/$3.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'bank/tambahsms/$3"><i class="fas fa-plus pr-2"></i></a>', 'id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        return $this->datatables->generate();
    }
    public function get_valid_bayartes()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,id_bukti_bayar,(SELECT ref_sms FROM pmb_sms where id_buktibayar = id_bukti_bayar) as smsref,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,jalur,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->datatables->join('pmb_akun', 'pengenal_akun = akun_siswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->where('jalur', 'test');
        $this->datatables->where('gelombang', '1');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'bank/lihat/$3.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'bank/tambahsms/$3"><i class="fas fa-plus pr-2"></i></a>', 'id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        return $this->datatables->generate();
    }
    public function get_valid_bayartes2()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,id_bukti_bayar,(SELECT ref_sms FROM pmb_sms where id_buktibayar = id_bukti_bayar) as smsref,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,jalur,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->datatables->join('pmb_akun', 'pengenal_akun = akun_siswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->where('jalur', 'test');
        $this->datatables->where('gelombang', '2');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'bank/lihat/$3.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'bank/tambahsms/$3"><i class="fas fa-plus pr-2"></i></a>', 'id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        return $this->datatables->generate();
    }
    public function get_regis_bayar($limit, $start)
    {
        $this->db->select('akunb_msiswa,nama_siswa,nama_prodi,jalur,ref');
        $this->db->select_sum('jlh_bayar');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->limit($limit, $start);
        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->where('validasi_bukti', 2);
        $this->db->where('nama_siswa !=', null);
        return $this->db->get();
    }

    public function biaya_kuliah_test()
    {
        $this->db->select('test_biaya');
        $this->db->from('biaya_kuliah_pmb');

        $result = $this->db->get();

        $total_sum_test = 0;
        foreach ($result->result() as $key => $row) {
            if ($key >= 0 && $key <= 2) {
                $total_sum_test += $row->test_biaya;
            }
        }
        return $total_sum_test;
    }
    public function biaya_kuliah_prestasi()
    {
        $this->db->select('prestasi_biaya');
        $this->db->from('biaya_kuliah_pmb');

        $result = $this->db->get();

        $total_sum_prestasi = 0;
        foreach ($result->result() as $key => $row) {
            if ($key >= 0 && $key <= 2) {
                $total_sum_prestasi += $row->prestasi_biaya;
            }
        }
        return $total_sum_prestasi;
    }
    public function gel_regis($gel, $jalur, $prod)
    {
        $this->db->select('akunb_msiswa,nama_siswa,nama_prodi,jalur, gelombang');
        $this->db->select_sum('jlh_bayar');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->order_by('nama_prodi', 'ASC');
        if (!empty($prod)) {
            $this->db->where('prodi_penerimaan', $prod);
        }
        $this->db->where('validasi_bukti', 2);
        $this->db->where('nama_siswa !=', null);
        $this->db->where('gelombang', $gel);
        $this->db->where('jalur', $jalur);
        return $this->db->get();
    }
    public function gelreg($gel, $jalur, $prod)
    {
        $this->db->select('nama_siswa,prodi_penerimaan,jalur, gelombang');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', '');
        if (!empty($prod)) {
            $this->db->where('prodi_penerimaan', $prod);
        }
        $this->db->where('status_penerimaan', '1');
        $this->db->where('jalur ', $jalur);
        $this->db->where('gelombang', $gel);
        return $this->db->count_all_results();
    }
    public function total_userregis()
    {
        $this->db->from('bukti_bayar');
        $this->db->group_by('akunb_msiswa');
        $this->db->where('validasi_bukti', 2);
        return $this->db->count_all_results();
    }
    public function pdf_regis()
    {
        $this->db->select('akunb_msiswa,nama_siswa,nama_prodi,jalur');
        $this->db->select_sum('jlh_bayar');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_akun', 'pengenal_akun = akunb_msiswa', 'left');
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->where('validasi_bukti', 2);
        //  $this->db->where('prodi_penerimaan', '9');

        return $this->db->get();
    }

    public function pdf_tidak_regis()
    {
        echo '<pre>';
        print_r($this->pdf_regis()->result_array());
        die;
        $this->db->select('akun_siswa,nama_siswa,nama_prodi,jalur');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'pengenal_akun = akun_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('akun_siswa');
        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->where('valid_bayar', 2);

        // $result = $this->list_bayar_regis()->result_array();
        // $akunb_msiswa = array_column($result, 'akunb_msiswa');
        // $this->db->where_not_in('akunb_msiswa', $akunb_msiswa);
        //  $this->db->where('prodi_penerimaan', '9');

        return $this->db->get();
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
    public function hitung_regis($id = 0)
    {
        $this->db->select('akunb_msiswa,nama_siswa,nama_prodi');
        $this->db->select_sum('jlh_bayar');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->where('akunb_msiswa', $id);
        $this->db->where('validasi_bukti', 2);
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result;
        } else {
            return false;
        }
    }

    public function tidak_valid_bayar()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->datatables->where('validasi_bukti', 3);
        $this->datatables->add_column('view', '<a href="' . $alamat . 'bank/lihat/$3.html"><i class="fas fa-eye pr-2"></i></a>', 'id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        return $this->datatables->generate();
    }
    public function belum_bayar()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->datatables->where('validasi_bukti', 1);
        $this->datatables->add_column('view', '<a href="' . $alamat . 'bank/lihat/$3.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'bank/ubh/$3"><i class="fas fa-pencil-alt pr-2"></i></a><a href="javascript:void(0);" data-code="$3" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a>', 'id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        return $this->datatables->generate();
    }
    public function get_bayar($id)
    {
        $this->db->select('id_siswa,akun_siswa,id_bukti_bayar,ref,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk,jalur');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->where('id_bukti_bayar', $id);
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result;
        } else {
            return false;
        }
    }
    public function ambuktiBayar($id = 0)
    {
        $this->db->where('id_bukti_bayar', $id);
        $result = $this->db->get('bukti_bayar');
        if ($this->db->affected_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function item_bayarsemua($id)
    {
        $this->db->select('jalur,jlh_uang,jumlah_rinci,jlh_bayar');
        $this->db->from('pembayaran_rinci');
        $this->db->join('bukti_bayar', 'akun_pembayaran = akunb_msiswa', 'left');
        $this->db->join('pmb_prodi', 'akun_pembayaran = prodi_id_siswa', 'left');
        $this->db->join('biaya_kuliah_pmb', 'jenis_bayar_rinci = id_biayakuliahpmb', 'left');
        $this->db->where('akun_pembayaran', $id);
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result;
        } else {
            return false;
        }
    }
    public function ambilSms($id)
    {
        $this->db->where('id_buktibayar', $id);
        $result = $this->db->get('pmb_sms');
        if ($this->db->affected_rows()) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function item_bayar($id)
    {
        $this->db->where('bukti_id_bayar', $id);
        $result = $this->db->get('pembayaran_rinci');
        if ($this->db->affected_rows()) {
            return $result;
        } else {
            return false;
        }
    }
    public function item_bayarxx($id)
    {
        $this->db->select('	jenis_bayar_rinci');
        $this->db->where('bukti_id_bayar', $id);
        $result = $this->db->get('pembayaran_rinci');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function percoxxx($names)
    {
        $this->db->where_not_in('id_biayakuliahpmb', $names);
        $data = $this->db->get('biaya_kuliah_pmb');
        return $data->result();
    }
    public function item_rinci($id)
    {
        $this->db->where('id_biayakuliahpmb', $id);
        $result = $this->db->get('biaya_kuliah_pmb');
        if ($this->db->affected_rows()) {
            return $result;
        } else {
            return false;
        }
    }
    public function item_rincidua($id)
    {
        $this->db->where('id_biayakuliahpmb', $id);
        $result = $this->db->get('biaya_kuliah_pmb');
        if ($this->db->affected_rows()) {
            return $result;
        } else {
            return false;
        }
    }
    public function cekValidbayar($id)
    {
        $this->db->where('id_bukti_bayar', $id);
        $result = $this->db->get('bukti_bayar');
        if ($this->db->affected_rows()) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function pdfSemua()
    {
        $this->db->select('id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $result = $this->db->get();
        return $result;
    }
    public function pdfValid()
    {
        $this->db->select('id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->where('validasi_bukti', 2);
        $this->db->where('jalur', 'prestasi');
        $result = $this->db->get();
        return $result;
    }
    public function pdfValidbayartes()
    {
        $this->db->select('id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->where('validasi_bukti', 2);
        $this->db->where('jalur', 'test');
        $result = $this->db->get();
        return $result;
    }
    public function pdfTidak()
    {
        $this->db->select('id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->where('validasi_bukti', 3);
        $result = $this->db->get();
        return $result;
    }
    public function pdfBelum()
    {
        $this->db->select('id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->where('validasi_bukti', 1);
        $result = $this->db->get();
        return $result;
    }
    //jalur tes gel 1 
    public function test_bank_bayar()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,ref,nama_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar,umumkan');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', '');
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('gelombang =', '1');
        $this->datatables->where('valid_bayar !=', '3');
        // $this->datatables->where('ujian ', '');
        $this->datatables->where('pembayaran_upload !=', '');
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "49") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN  </a><a href="' . $alamat . 'bank/ujianpindah/$2.html"><i class="fab fa-quinscape text-warning"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    //jalur tes gel 2 
    public function test_bank2_bayar()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,ref,nama_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar,umumkan');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', '');
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('gelombang =', '2');
        $this->datatables->where('valid_bayar !=', '3');
        $this->datatables->where('pembayaran_upload !=', '');
        if ($this->session->userdata('pengguna_id_simkeu') == "45"  || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "49") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN  </a><a href="' . $alamat . 'bank/ujianpindah/$2.html"><i class="fab fa-quinscape text-warning"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    //jalur tes gel 3 
    public function test_bank3_bayar()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,ref,nama_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar,umumkan');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', '');
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('gelombang =', '3');
        $this->datatables->where('valid_bayar !=', '3');
        $this->datatables->where('pembayaran_upload !=', '');
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "53") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN  </a><a href="' . $alamat . 'bank/ujianpindah/$2.html"><i class="fab fa-quinscape text-warning"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function siaparegistes12()
    {
        $this->db->select('id_siswa,akun_siswa,nama_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar,validasi_bukti');
        $this->db->select_sum('jlh_bayar');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('bukti_bayar', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'test');
        $this->db->where('gelombang', '2');
        $this->db->where('status_penerimaan', '1');
        $this->db->where('pembayaran_upload !=', '');
        $this->db->where('valid_bayar', '2');
        $this->db->where('validasi_bukti', '2');
        $this->db->group_by('akunb_msiswa');
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function siaparegismisteri12()
    {
        $this->db->select('validasi_bukti');
        $this->db->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->db->where('validasi_bukti', '2');
        //    $this->db->where('gelombang', '2');
        $this->db->where('jalur ', 'prestasi');
        $this->db->group_by('akunb_msiswa');
        $result = $this->db->get('bukti_bayar');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function lihatujiansatu()
    {
        $this->db->select('ref,nama_siswa,nama_prodi,nama_prodi_baru,nama_prodilain,keputusan_text');
        $this->db->join('pmb_sekolah', 'akun_siswa = sekolah_id_siswa', 'left');
        $this->db->join('pmb_info', 'akun_siswa = info_siswa_akun', 'left');
        $this->db->join('pmb_ortu', 'akun_siswa = ortu_pengenal_siswa', 'left');
        $this->db->join('pmb_transaksi', 'akun_siswa = akun_siswa_tran', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_wali', 'akun_siswa = wali_akun_siswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodilain', 'prodi_penerimaan = id_prodilain', 'left');
        $this->db->join('penerimaan', 'kode_penerimaan = status_penerimaan', 'left');
        $this->db->where('jalur', 'test');
        $this->db->where('ujian', '1');
        $this->db->where('umumkan', '1');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('pembayaran_upload !=', '');
        $this->db->order_by('nama_prodi', 'asc');
        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function lihatujiantiga()
    {
        $this->db->select('id_siswa,ref,akun_siswa,nama_siswa,hp_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'test');
        $this->db->where('gelombang', '3');
        $this->db->where('pembayaran_upload !=', '');
        $this->db->order_by('nama_prodi', 'ASC');
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function hpinfo1($gel)
    {
        $this->db->select('id_siswa,ref,akun_siswa,nama_siswa,hp_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,lulus_prodi,keputusan_text,metode_bayar');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->join('prodlulus', 'prodi_penerimaan = id_prodi_lulus', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('status_penerimaan', '1');
        //  $this->db->where('prodi_penerimaan', '1');
        $this->db->where('jalur ', 'test');
        $this->db->where('gelombang', $gel);
        $this->db->where('pembayaran_upload !=', '');
        $this->db->order_by('lulus_prodi', 'ASC');
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function hpresinfo1($gel)
    {
        $this->db->select('id_siswa,ref,akun_siswa,nama_siswa,hp_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,lulus_prodi,keputusan_text,metode_bayar');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->join('prodlulus', 'prodi_penerimaan = id_prodi_lulus', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('status_penerimaan', '1');
        //  $this->db->where('prodi_penerimaan', '1');
        $this->db->where('jalur ', 'prestasi');
        $this->db->where('gelombang', $gel);
        $this->db->order_by('lulus_prodi', 'ASC');
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function testonlinesatu()
    {
        $this->db->select('id_siswa,ref,akun_siswa,nama_siswa,hp_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'test');
        $this->db->where('gelombang', '1');
        $this->db->where('pembayaran_upload !=', '');
        $this->db->order_by('pilihan_satu', 'ASC');
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function testonlinedua()
    {
        $this->db->select('id_siswa,ref,akun_siswa,nama_siswa,hp_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'test');
        $this->db->where('gelombang', '2');
        $this->db->where('pembayaran_upload !=', '');
        $this->db->order_by('pilihan_satu', 'ASC');
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function testonlinetiga()
    {
        $this->db->select('id_siswa,ref,akun_siswa,nama_siswa,hp_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'test');
        $this->db->where('gelombang', '3');
        $this->db->where('pembayaran_upload !=', '');
        $this->db->order_by('pilihan_satu', 'ASC');
        $this->db->order_by('pilihan_dua', 'ASC');
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function lihatujiantigaputus()
    {

        $this->db->select('id_siswa, ref, akun_siswa,nama_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar,status_penerimaan,nama_prodip,umumkan');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->join('prodiputus', 'prodi_penerimaan = id_prodip', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'test');
        $this->db->where('gelombang', '3');
        $this->db->where('status_penerimaan !=', null);
        $this->db->where('pembayaran_upload !=', '');
        $this->db->order_by('nama_prodip', 'ASC');
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function test_bank_bayar3()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nama_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', '');
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('gelombang', '3');
        $this->datatables->where('pembayaran_upload !=', '');
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN  </a><a href="' . $alamat . 'bank/ujianpindah/$2.html"><i class="fab fa-quinscape text-warning"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function test_bank_bayar3belum()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nama_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', '');
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('gelombang', '3');
        $this->datatables->where('pembayaran_upload !=', '');
        $this->datatables->where('status_penerimaan', null);
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN  </a><a href="' . $alamat . 'bank/ujianpindah/$2.html"><i class="fab fa-quinscape text-warning"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function test_bank_bayar3putus()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nama_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,metode_bayar,umumkan,status_penerimaan');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        // $this->datatables->join('prodiputus', 'prodi_penerimaan = id_prodip', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('gelombang', '3');
        $this->datatables->where('status_penerimaan !=', null);
        $this->datatables->where('pembayaran_upload !=', null);
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN  </a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function belumupload1()
    {
        $this->db->select('id_siswa,akun_siswa,nama_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'test');
        $this->db->where('gelombang', '1');
        $this->db->where('valid_bayar', '2');
        $this->db->where('pembayaran_upload', '');
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result;
        } else {
            return false;
        }
    }
    public function belumupload2()
    {

        $this->db->select('id_siswa,akun_siswa,nama_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'test');
        $this->db->where('gelombang', '2');
        $this->db->where('valid_bayar', '2');
        $this->db->where('pembayaran_upload', '');
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result;
        } else {
            return false;
        }
    }
    public function belumupload3()
    {

        $this->db->select('id_siswa,akun_siswa,nama_siswa,ujian,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,keputusan_text,metode_bayar');
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'test');
        $this->db->where('gelombang', '3');
        $this->db->where('valid_bayar', '2');
        $this->db->where('pembayaran_upload', '');
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result;
        } else {
            return false;
        }
    }

    public function misteri3($id)
    {
        $this->db->where('upload_id_siswa', $id);
        $result = $this->db->get('pmb_upload');
        if ($this->db->affected_rows()) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function ujianAkun($where = 0)
    {
        $DB2 = $this->load->database('db2', TRUE);
        $DB2->select('email');
        $DB2->from('mdl_user');
        $DB2->where('email', $where);
        $data = $DB2->get();
        if ($DB2->affected_rows() > 0) {
            return $data->row();
        } else {
            return false;
        }
    }
    public function tambah_data_tes($input_data)
    {
        $DB2 = $this->load->database('db2', TRUE);
        $do = $DB2->insert('mdl_user', $input_data);
        if ($do) {
            return $do;
        } else {
            return false;
        }
    }
    public function ambcalmhs($id = 0)
    {
        $this->db->join('pmb_sekolah', 'akun_siswa = sekolah_id_siswa', 'left');
        $this->db->join('pmb_info', 'akun_siswa = info_siswa_akun', 'left');
        $this->db->join('pmb_ortu', 'akun_siswa = ortu_pengenal_siswa', 'left');
        $this->db->join('pmb_transaksi', 'akun_siswa = akun_siswa_tran', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_wali', 'akun_siswa = wali_akun_siswa', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('akun_siswa', $id);
        $this->db->where('last_login_siswa !=', '');
        $this->db->where('jalur ', 'test');
        $this->db->where('pembayaran_upload !=', '');
        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function ambilBayarbukti($param = 0)
    {

        $this->db->where('akunb_msiswa', $param);
        $data = $this->db->get('bukti_bayar');
        if ($this->db->affected_rows() > 0) {
            return $data;
        } else {

            return false;
        }
    }
    public function itemBiayabaru()
    {
        $data = $this->db->get('biaya_kuliah_pmb');
        return $data->result();
    }
    public function itemBiaya()
    {
        $data = $this->db->get('biaya_kuliah_pmb');
        return $data->result();
    }
    public function cobaCoba($item)
    {
        $this->db->where_in('id_biayakuliahpmb', $item);
        return $this->db->get('biaya_kuliah_pmb')->result();
    }
    public function priksaPutuskan1($param = 0)
    {
        $this->db->select('siswa_penerimaan, jalur, nama_prodi, nama_siswa, ref');
        $this->db->join('pmb_siswa', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left'); // ambil prodi yg lulus
        $this->db->join('pmb_prodi', 'siswa_penerimaan = prodi_id_siswa', 'left'); // ambil jalur
        $this->db->where('siswa_penerimaan', $param);
        $this->db->where('status_penerimaan', 1);
        $this->db->where('umumkan', 1);
        $data = $this->db->get('pmb_penerimaan');
        if ($this->db->affected_rows() > 0) {
            return $data->row();
        } else {

            return false;
        }
    }
    public function MasukData($tableName, $data)
    {
        $this->db->insert($tableName, $data);
        return $this->db->insert_id();
    }
    public function lht_byr_rinci($id)
    {
        $this->db->select('bukti_id_bayar');
        $this->db->from('pembayaran_rinci');
        $this->db->where('id_pembayaran_rinci', $id);
        $result = $this->db->get();
        if ($this->db->affected_rows()) {
            return $result;
        } else {
            return false;
        }
    }
}

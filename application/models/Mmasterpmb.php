<?php
class Mmasterpmb extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }
    //Daftar pendaftar yang login
    public function get_all_siswa()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,ref,daftar_akun,email_akun_siswa,kuncigudang,gelombang,hp_siswa');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$8" target="_blank"><i class="fas fa-comment pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,hp_siswa');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i classs="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$8" target="_blank"><i class="fas fa-comment pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,hp_siswa');
        }
        return $this->datatables->generate();
    }
    public function test_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,metode_bayar,keputusan_text,ref,daftar_akun,email_akun_siswa,kuncigudang,gelombang');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur ', 'test');

        $tangkap = $this->session->userdata('filter_gel_test1');
        if (empty($tangkap)) {
        } elseif ($tangkap == "1") {
            $this->datatables->where('gelombang ', '1');
        } elseif ($tangkap == "2") {
            $this->datatables->where('gelombang ', '2');
        } else {
            $this->datatables->where('gelombang ', '3');
        }
        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function test1_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,metode_bayar,keputusan_text');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('gelombang', '1');
        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function test2_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,metode_bayar,keputusan_text');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('gelombang', '2');
        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function test3_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,pembayaran_upload,valid_bayar,metode_bayar,keputusan_text');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('gelombang', '3');
        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function invalidtest_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,keputusan_text,pembayaran_upload,valid_bayar,metode_bayar,ref,daftar_akun,email_akun_siswa,kuncigudang,gelombang');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur', 'test');
        $this->datatables->where('valid_bayar !=', '2');

        $tangkap = $this->session->userdata('filter_gel_test1');
        if (empty($tangkap)) {
        } elseif ($tangkap == "1") {
            $this->datatables->where('gelombang ', '1');
        } elseif ($tangkap == "2") {
            $this->datatables->where('gelombang ', '2');
        } else {
            $this->datatables->where('gelombang ', '3');
        }

        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function testvalid_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,gelombang,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,keputusan_text,umumkan,ref,metode_bayar');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('valid_bayar ', 2);

        $tangkap = $this->session->userdata('filter_gel_test');
        if (empty($tangkap)) {
        } elseif ($tangkap == "1") {
            $this->datatables->where('gelombang ', '1');
        } elseif ($tangkap == "2") {
            $this->datatables->where('gelombang ', '2');
        } else {
            $this->datatables->where('gelombang ', '3');
        }

        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function testvalid1_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,keputusan_text');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('valid_bayar ', 2);
        $this->datatables->where('gelombang', '1');
        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function testvalid2_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,keputusan_text');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('valid_bayar ', 2);
        $this->datatables->where('gelombang', '2');
        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function testvalid3_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,keputusan_text');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur ', 'test');
        $this->datatables->where('valid_bayar ', '2');
        $this->datatables->where('gelombang', '3');
        //    $this->datatables->where('upload_id_siswa !=', null);
        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function no_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,ref,daftar_akun,email_akun_siswa,kuncigudang,gelombang,hp_siswa');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->where('last_login_siswa', null);
        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function reguler_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,keputusan_text,pembayaran_upload,valid_bayar,metode_bayar,hp_siswa,ref');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur', 'reguler2');
        // $this->datatables->where('valid_bayar ', '2');

        $tangkap = $this->session->userdata('filter_gel_reg');
        if (empty($tangkap)) {
        } elseif ($tangkap == "1") {
            $this->datatables->where('gelombang ', '1');
        } elseif ($tangkap == "2") {
            $this->datatables->where('gelombang ', '2');
        } else {
            $this->datatables->where('gelombang ', '3');
        }

        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }

    public function reguler_siswainvalid()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,keputusan_text,pembayaran_upload,valid_bayar,metode_bayar,hp_siswa,ref');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur', 'reguler2');
        $this->datatables->where('valid_bayar !=', '2');

        $tangkap = $this->session->userdata('filter_gel_reg2');
        if (empty($tangkap)) {
        } elseif ($tangkap == "1") {
            $this->datatables->where('gelombang ', '1');
        } elseif ($tangkap == "2") {
            $this->datatables->where('gelombang ', '2');
        } else {
            $this->datatables->where('gelombang ', '3');
        }

        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }

    public function reguler_siswavalid()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,keputusan_text,hp_siswa,ref');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur', 'reguler2');
        $this->datatables->where('valid_bayar ', '2');

        $tangkap = $this->session->userdata('filter_gel_reg1');
        if (empty($tangkap)) {
        } elseif ($tangkap == "1") {
            $this->datatables->where('gelombang ', '1');
        } elseif ($tangkap == "2") {
            $this->datatables->where('gelombang ', '2');
        } else {
            $this->datatables->where('gelombang ', '3');
        }

        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function prestasi_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,keputusan_text,pembayaran_upload,valid_bayar,metode_bayar,ref,daftar_akun,email_akun_siswa,kuncigudang,gelombang');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur', 'prestasi');

        $tangkap = $this->session->userdata('filter_gel1');
        if (empty($tangkap)) {
        } elseif ($tangkap == "1") {
            $this->datatables->where('gelombang ', '1');
        } elseif ($tangkap == "2") {
            $this->datatables->where('gelombang ', '2');
        } else {
            $this->datatables->where('gelombang ', '3');
        }

        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function invalidprestasi_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,keputusan_text,pembayaran_upload,valid_bayar,metode_bayar,ref,daftar_akun,email_akun_siswa,kuncigudang,gelombang');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', NULL);
        $this->datatables->where('jalur', 'prestasi');
        $this->datatables->where('valid_bayar !=', '2');

        $tangkap = $this->session->userdata('filter_gel1');
        if (empty($tangkap)) {
        } elseif ($tangkap == "1") {
            $this->datatables->where('gelombang ', '1');
        } elseif ($tangkap == "2") {
            $this->datatables->where('gelombang ', '2');
        } else {
            $this->datatables->where('gelombang ', '3');
        }

        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }

    public function prestasi_valid_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('gelombang,metode_bayar,id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,keputusan_text,ref,umumkan');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur', 'prestasi');
        $this->datatables->where('valid_bayar', '2');
        // $this->datatables->where('gelombang ', '1');
        $tangkap = $this->session->userdata('filter_gel');
        if (empty($tangkap)) {
        } elseif ($tangkap == "1") {
            $this->datatables->where('gelombang ', '1');
        } elseif ($tangkap == "2") {
            $this->datatables->where('gelombang ', '2');
        } else {
            $this->datatables->where('gelombang ', '3');
        }

        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>
            <a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>
            <a href="https://wa.me/62$5" target="_blank"><i class="fas fa-comment pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,hp_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }
    public function prestasi1_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,status_penerimaan,keputusan_text');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur', 'prestasi');
        $this->datatables->where('gelombang', 1);
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,status_penerimaan');
        } elseif ($this->session->userdata('pengguna_id_simkeu') == "47") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,status_penerimaan');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,status_penerimaan');
        }
        return $this->datatables->generate();
    }
    public function prestasi2_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,status_penerimaan,keputusan_text,umumkan');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur', 'prestasi');
        $this->datatables->where('gelombang', 2);
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,status_penerimaan');
        } elseif ($this->session->userdata('pengguna_id_simkeu') == "47") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,status_penerimaan');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,status_penerimaan');
        }
        return $this->datatables->generate();
    }
    public function sk()
    {

        $alamat = base_url();

        $this->datatables->select('prodi_penerimaan,nik_siswa,id_siswa,akun_siswa,ref,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi_baru,status_penerimaan,keputusan_text,umumkan');

        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        // $this->datatables->join('prodi', 'pilihan_satu = id_prodi','left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        // $this->datatables->where('jalur', 'prestasi');
        // $this->datatables->where('gelombang', 2);

        // if($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') == NULL ) {

        // } elseif($this->input->get('filter_jalur') == '1' && $this->input->get('filter_gelombang') == NULL) {
        // $this->datatables->where('prodi_penerimaan', 1);
        // } elseif($this->input->get('filter_jalur') == '1' && $this->input->get('filter_gelombang') == NULL) {
        // $this->datatables->where('jalur', 'prestasi');
        // $this->datatables->where('gelombang', 2);
        // }

        return $this->datatables->generate();
    }
    public function prestasi3_all_siswa()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru,status_penerimaan,keputusan_text,umumkan');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->where('jalur', 'prestasi');
        $this->datatables->where('gelombang', 3);
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id') == "46") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a><a href="' . $alamat . 'masterpmb/bayar/$2.html"><i class="fas fa-dollar-sign pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        } elseif ($this->session->userdata('pengguna_id_simkeu') == "47") {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a>
            <a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a><a href="' . $alamat . 'masterpmb/keputusan/$2.html">PUTUSAN</a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,status_penerimaan');
        } else {
            $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2.html"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        }
        return $this->datatables->generate();
    }

    public function get_all_pgsd()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        // $this->datatables->where('last_login_siswa !=', null);
        // $this->datatables->where('pilihan_satu', 9);
        $this->datatables->group_by('id_penerimaan');
        $this->datatables->where('prodi_penerimaan', 9);
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        return $this->datatables->generate();
    }

    public function get_all_pgsdregis()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa, akunb_msiswa, ref, nama_siswa, gelombang, jalur, status_penerimaan');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->datatables->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->where('prodi_penerimaan', 9);
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->group_by('akunb_msiswa');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a>', 'id_siswa,akunb_msiswa');
        return $this->datatables->generate();
    }

    public function get_all_pgpaud()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->group_by('id_penerimaan');
        $this->datatables->where('prodi_penerimaan', 7);
        $this->datatables->where('status_penerimaan', 1);
        // $this->datatables->where('last_login_siswa !=', null);
        // $this->datatables->where('pilihan_satu', 7);
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        return $this->datatables->generate();
    }

    public function get_all_pgpaudregis()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa, akunb_msiswa, ref, nama_siswa, gelombang, jalur, status_penerimaan');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->datatables->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->where('prodi_penerimaan', 7);
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->group_by('akunb_msiswa');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a>', 'id_siswa,akunb_msiswa');
        return $this->datatables->generate();
    }

    public function get_all_pbsi()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        // $this->datatables->where('last_login_siswa !=', null);
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->where('valid_bayar', 2);
        $this->datatables->where('jalur !=', 'reguler2');
        $this->datatables->group_by('akun_siswa');
        $this->datatables->where('prodi_penerimaan', 1);
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        return $this->datatables->generate();
    }

    public function get_all_pbsiregis()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa, akunb_msiswa, ref, nama_siswa, gelombang, jalur, status_penerimaan');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->datatables->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->where('prodi_penerimaan', 1);
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->group_by('akunb_msiswa');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a>', 'id_siswa,akunb_msiswa');
        return $this->datatables->generate();
    }

    public function get_all_pbsi2()
    {

        $alamat = base_url();
        // $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru');
        $this->datatables->from('pmb_penerimaan');
        // $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');


        // $this->datatables->where('last_login_siswa !=', null);
        // $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        // $this->datatables->where('valid_bayar', 2);
        $this->datatables->group_by('siswa_penerimaan');
        $this->datatables->where('prodi_penerimaan', 1);
        $this->datatables->where('status_penerimaan', 1);
        // $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        return $this->datatables->generate();
    }
    public function get_all_pbi()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        // $this->datatables->where('last_login_siswa !=', null);
        // $this->datatables->where('pilihan_satu', 8);
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->group_by('id_penerimaan');
        $this->datatables->where('prodi_penerimaan', 8);
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        return $this->datatables->generate();
    }

    public function get_all_pbiregis()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa, akunb_msiswa, ref, nama_siswa, gelombang, jalur, status_penerimaan');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->datatables->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->where('prodi_penerimaan', 8);
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->group_by('akunb_msiswa');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a>', 'id_siswa,akunb_msiswa');
        return $this->datatables->generate();
    }

    public function get_all_pbio()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        // $this->datatables->where('last_login_siswa !=', null);
        // $this->datatables->where('pilihan_satu', 6);
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->group_by('id_penerimaan');
        $this->datatables->where('prodi_penerimaan', 6);
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        return $this->datatables->generate();
    }

    public function get_all_pbioregis()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa, akunb_msiswa, ref, nama_siswa, gelombang, jalur, status_penerimaan');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->datatables->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->where('prodi_penerimaan', 6);
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->group_by('akunb_msiswa');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a>', 'id_siswa,akunb_msiswa');
        return $this->datatables->generate();
    }

    public function get_all_pmat()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        // $this->datatables->where('last_login_siswa !=', null);
        // $this->datatables->where('pilihan_satu', 2);
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->group_by('id_penerimaan');
        $this->datatables->where('prodi_penerimaan', 2);
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        return $this->datatables->generate();
    }

    public function get_all_pmatregis()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa, akunb_msiswa, ref, nama_siswa, gelombang, jalur, status_penerimaan');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->datatables->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->where('prodi_penerimaan', 2);
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->group_by('akunb_msiswa');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a>', 'id_siswa,akunb_msiswa');
        return $this->datatables->generate();
    }

    public function get_all_ppkn()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        // $this->datatables->where('last_login_siswa !=', null);
        // $this->datatables->where('pilihan_satu', 4);
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->group_by('id_penerimaan');
        $this->datatables->where('prodi_penerimaan', 4);
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        return $this->datatables->generate();
    }

    public function get_all_ppknregis()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa, akunb_msiswa, ref, nama_siswa, gelombang, jalur, status_penerimaan');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->datatables->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->where('prodi_penerimaan', 4);
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->group_by('akunb_msiswa');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a>', 'id_siswa,akunb_msiswa');
        return $this->datatables->generate();
    }

    public function get_all_komputer()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        // $this->datatables->where('last_login_siswa !=', null);
        // $this->datatables->where('pilihan_satu', 5);
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->group_by('id_penerimaan');
        $this->datatables->where('prodi_penerimaan', 5);
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        return $this->datatables->generate();
    }

    public function get_all_komputerregis()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa, akunb_msiswa, ref, nama_siswa, gelombang, jalur, status_penerimaan');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->datatables->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->where('prodi_penerimaan', 5);
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->group_by('akunb_msiswa');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a>', 'id_siswa,akunb_msiswa');
        return $this->datatables->generate();
    }

    public function get_all_ekonomi()
    {

        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur,nama_prodi,nama_prodi_baru');
        $this->datatables->from('pmb_siswa');
        $this->datatables->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->datatables->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        // $this->datatables->where('last_login_siswa !=', null);
        // $this->datatables->where('pilihan_satu', 3);
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->group_by('id_penerimaan');
        $this->datatables->where('prodi_penerimaan', 3);
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a><a href="' . $alamat . 'masterpmb/pdflihat/$2.html" target="_blank"><i class="fas fa-file-pdf pr-2"></i></a>', 'id_siswa,akun_siswa,nis_siswa,nama_siswa,pilihan_satu,pilihan_dua,jalur');
        return $this->datatables->generate();
    }

    public function get_all_ekonomiregis()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa, akunb_msiswa, ref, nama_siswa, gelombang, jalur, status_penerimaan');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->datatables->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->datatables->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->datatables->where('status_penerimaan', 1);
        $this->datatables->where('prodi_penerimaan', 3);
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->group_by('akunb_msiswa');
        $this->datatables->add_column('view', '<a href="' . $alamat . 'masterpmb/lihatsiswa/$2"><i class="fas fa-eye pr-2"></i></a>', 'id_siswa,akunb_msiswa');
        return $this->datatables->generate();
    }

    public function hapussiswa($tampung)
    {
        $this->db->delete('pmb_akun', array('pengenal_akun' => $tampung));
        $this->db->delete('pmb_info', array('info_siswa_akun' => $tampung));
        $this->db->delete('pmb_ortu', array('ortu_pengenal_siswa' => $tampung));
        $this->db->delete('pmb_prodi', array('prodi_id_siswa' => $tampung));
        $this->db->delete('pmb_sekolah', array('sekolah_id_siswa' => $tampung));
        $this->db->delete('pmb_siswa', array('akun_siswa' => $tampung));
        $this->db->delete('pmb_transaksi', array('akun_siswa_tran' => $tampung));
        $this->db->delete('pmb_upload', array('upload_id_siswa' => $tampung));
        $this->db->delete('pmb_wali', array('wali_akun_siswa' => $tampung));
    }
    public function lihat($id = 0)
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
        $this->db->join('data_sekolah', 'data_sekolah_id = id_data_sekolah', 'left');
        $this->db->where('akun_siswa', $id);
        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function lihatprestasi1()
    {
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
        $this->db->where('jalur', 'prestasi');
        $this->db->where('last_login_siswa !=', null);
        $this->db->where('gelombang', 1);
        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function lihatprestasi2()
    {
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
        $this->db->where('jalur', 'prestasi');
        $this->db->where('last_login_siswa !=', null);
        $this->db->where('gelombang', 2);
        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function lihatprestasi()
    {
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
        $this->db->where('jalur', 'prestasi');
        $this->db->where('last_login_siswa !=', null);
        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function putusprestasi()
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
        $this->db->where('jalur', 'prestasi');
        $this->db->where('last_login_siswa !=', null);
        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function pdfsk($jalur = "", $gelombang = "")
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
        $this->db->where('last_login_siswa !=', null);
        // 	$this->db->where('status_penerimaan', '1');
        // 	$this->db->where('prodi_penerimaan', '9');

        //bhs indonesia
        if ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') == NULL) {
        } elseif ($this->input->get('filter_jalur') != NULL && $this->input->get('filter_gelombang') == NULL) {
            $this->db->where('prodi_penerimaan', 1);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
        } elseif ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') != NULL) {
            $this->db->where('prodi_penerimaan', 1);
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        } else {
            $this->db->where('prodi_penerimaan', 1);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        }

        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->order_by('ref', 'ASC');

        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function pdfsk_mat($jalur = "", $gelombang = "")
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
        $this->db->where('last_login_siswa !=', null);
        // 	$this->db->where('status_penerimaan', '1');

        if ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') == NULL) {
        } elseif ($this->input->get('filter_jalur') != NULL && $this->input->get('filter_gelombang') == NULL) {
            $this->db->where('prodi_penerimaan', 2);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
        } elseif ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') != NULL) {
            $this->db->where('prodi_penerimaan', 2);
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        } else {
            $this->db->where('prodi_penerimaan', 2);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        }

        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->order_by('ref', 'ASC');

        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function pdfsk_ekonomi($jalur = "", $gelombang = "")
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
        $this->db->where('last_login_siswa !=', null);
        // 	$this->db->where('status_penerimaan', '1');

        if ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') == NULL) {
        } elseif ($this->input->get('filter_jalur') != NULL && $this->input->get('filter_gelombang') == NULL) {
            $this->db->where('prodi_penerimaan', 3);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
        } elseif ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') != NULL) {
            $this->db->where('prodi_penerimaan', 3);
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        } else {
            $this->db->where('prodi_penerimaan', 3);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        }

        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->order_by('ref', 'ASC');

        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function pdfsk_ppkn($jalur = "", $gelombang = "")
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
        $this->db->where('last_login_siswa !=', null);
        // 	$this->db->where('status_penerimaan', '1');

        if ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') == NULL) {
        } elseif ($this->input->get('filter_jalur') != NULL && $this->input->get('filter_gelombang') == NULL) {
            $this->db->where('prodi_penerimaan', 4);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
        } elseif ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') != NULL) {
            $this->db->where('prodi_penerimaan', 4);
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        } else {
            $this->db->where('prodi_penerimaan', 4);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        }

        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->order_by('ref', 'ASC');

        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function pdfsk_komputer($jalur = "", $gelombang = "")
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
        $this->db->where('last_login_siswa !=', null);
        // 	$this->db->where('status_penerimaan', '1');

        if ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') == NULL) {
        } elseif ($this->input->get('filter_jalur') != NULL && $this->input->get('filter_gelombang') == NULL) {
            $this->db->where('prodi_penerimaan', 5);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
        } elseif ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') != NULL) {
            $this->db->where('prodi_penerimaan', 5);
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        } else {
            $this->db->where('prodi_penerimaan', 5);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        }

        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->order_by('ref', 'ASC');

        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function pdfsk_biologi($jalur = "", $gelombang = "")
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
        $this->db->where('last_login_siswa !=', null);
        // 	$this->db->where('status_penerimaan', '1');

        if ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') == NULL) {
        } elseif ($this->input->get('filter_jalur') != NULL && $this->input->get('filter_gelombang') == NULL) {
            $this->db->where('prodi_penerimaan', 6);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
        } elseif ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') != NULL) {
            $this->db->where('prodi_penerimaan', 6);
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        } else {
            $this->db->where('prodi_penerimaan', 6);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        }

        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->order_by('ref', 'ASC');

        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function pdfsk_paud($jalur = "", $gelombang = "")
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
        $this->db->where('last_login_siswa !=', null);
        // 	$this->db->where('status_penerimaan', '1');

        if ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') == NULL) {
        } elseif ($this->input->get('filter_jalur') != NULL && $this->input->get('filter_gelombang') == NULL) {
            $this->db->where('prodi_penerimaan', 7);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
        } elseif ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') != NULL) {
            $this->db->where('prodi_penerimaan', 7);
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        } else {
            $this->db->where('prodi_penerimaan', 7);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        }

        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->order_by('ref', 'ASC');

        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function pdfsk_inggris($jalur = "", $gelombang = "")
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
        $this->db->where('last_login_siswa !=', null);
        // 	$this->db->where('status_penerimaan', '1');

        if ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') == NULL) {
        } elseif ($this->input->get('filter_jalur') != NULL && $this->input->get('filter_gelombang') == NULL) {
            $this->db->where('prodi_penerimaan', 8);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
        } elseif ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') != NULL) {
            $this->db->where('prodi_penerimaan', 8);
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        } else {
            $this->db->where('prodi_penerimaan', 8);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        }

        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->order_by('ref', 'ASC');

        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function pdfsk_pgsd($jalur = "", $gelombang = "")
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
        $this->db->where('last_login_siswa !=', null);
        // 	$this->db->where('status_penerimaan', '1');

        if ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') == NULL) {
        } elseif ($this->input->get('filter_jalur') != NULL && $this->input->get('filter_gelombang') == NULL) {
            $this->db->where('prodi_penerimaan', 9);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
        } elseif ($this->input->get('filter_jalur') == NULL && $this->input->get('filter_gelombang') != NULL) {
            $this->db->where('prodi_penerimaan', 9);
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        } else {
            $this->db->where('prodi_penerimaan', 9);
            $this->db->where('jalur', $this->input->get('filter_jalur'));
            $this->db->where('gelombang', $this->input->get('filter_gelombang'));
        }

        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->order_by('ref', 'ASC');

        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function putusprestasi1()
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
        $this->db->where('jalur', 'prestasi');
        // $this->db->where('jalur', 'test');
        $this->db->where('last_login_siswa !=', null);
        //  	$this->db->where('status_penerimaan', '1');
        $this->db->where('prodi_penerimaan', '9');
        //	$this->db->where('gelombang', '3');
        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->order_by('ref', 'ASC');

        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function putusprestasi2()
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
        $this->db->where('jalur', 'prestasi');
        $this->db->where('last_login_siswa !=', null);
        $this->db->where('gelombang', 2);
        $this->db->order_by('prodi_penerimaan', 'ASC');
        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function putustest()
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
        $this->db->where('jalur', 'test');
        $this->db->where('last_login_siswa !=', null);
        $this->db->where('ujian', '1');
        $this->db->where('gelombang', 1);
        $this->db->where('status_penerimaan', '1');
        $this->db->where('valid_bayar', 2);
        $this->db->order_by('prodi_penerimaan', 'Desc');
        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function lihattest()
    {
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
        $this->db->where('jalur', 'test');
        $this->db->where('last_login_siswa !=', null);
        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function lihattestvalid($gel = '')
    {
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->where('last_login_siswa !=', null);
        $this->db->where('jalur ', 'test');
        if (!empty($gel)) {
            $this->db->where('gelombang ', $gel);
        }
        $this->db->where('valid_bayar ', 2);
        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function lihatpresvalid($gel = '')
    {
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('prodi', 'pilihan_satu = id_prodi', 'left');
        $this->db->join('prod', 'pilihan_dua = id_prodi_baru', 'left');
        $this->db->join('pmb_upload', 'akun_siswa = upload_id_siswa', 'left');
        $this->db->join('pmb_sekolah', 'akun_siswa = sekolah_id_siswa', 'left');
        $this->db->where('last_login_siswa !=', null);
        $this->db->where('jalur ', 'prestasi');
        if (!empty($gel)) {
            $this->db->where('gelombang ', $gel);
        }
        $this->db->where('valid_bayar ', 2);
        $result = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows()) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function getUpload($minyak)
    {
        $this->db->where('upload_id_siswa', $minyak);
        $result = $this->db->get('pmb_upload');
        if ($this->db->affected_rows()) {
            return $result->row();
        } else {
            return false;
        }
    }
    function ambilsiswa($param = 0)
    {

        $this->db->join('pmb_prodi', 'prodi_id_siswa = pengenal_akun');
        $this->db->join('pmb_siswa', 'akun_siswa = pengenal_akun');
        $this->db->join('pmb_upload', 'upload_id_siswa =  pengenal_akun', 'left');
        $this->db->where('pengenal_akun', $param);
        $data = $this->db->get('pmb_akun');
        if ($this->db->affected_rows() > 0) {
            return $data->row();
        } else {

            return false;
        }
    }
    function ambilumumkan($param = 0)
    {
        $this->db->select('ref, pengenal_akun, email_akun_siswa, nama_siswa, nis_siswa, status_penerimaan, keputusan_text, note_penerimaan, prodi_penerimaan, umumkan, nama_prodi,jalur');
        $this->db->join('pmb_prodi', 'prodi_id_siswa = pengenal_akun');
        $this->db->join('pmb_siswa', 'akun_siswa = pengenal_akun');
        $this->db->join('pmb_penerimaan', 'pengenal_akun = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('pengenal_akun', $param);
        $data = $this->db->get('pmb_akun');
        if ($this->db->affected_rows() > 0) {
            return $data->row();
        } else {

            return false;
        }
    }
    function priksaPutuskan($param = 0)
    {
        $this->db->where('siswa_penerimaan', $param);
        $data = $this->db->get('pmb_penerimaan');
        if ($this->db->affected_rows() > 0) {
            return $data->row();
        } else {

            return false;
        }
    }
    public function priksaPutuskan1($param)
    {
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->join('pmb_prodi', 'siswa_penerimaan = prodi_id_siswa', 'left');
        $this->db->where('siswa_penerimaan', $param);
        $this->db->where('umumkan', 1);
        $data = $this->db->get('pmb_penerimaan');
        if ($this->db->affected_rows() > 0) {
            return $data->row();
        } else {

            return false;
        }
    }
    public function itemBiayabaru()
    {
        $data = $this->db->get('biaya_kuliah_pmb');
        return $data->result();
    }
    public function MasukData($tableName, $data)
    {
        $this->db->insert($tableName, $data);
        return $this->db->insert_id();
    }
    public function cobaCoba($item)
    {
        $this->db->where_in('id_biayakuliahpmb', $item);
        return $this->db->get('biaya_kuliah_pmb')->result();
    }
    public function ambuktiBayar($id)
    {
        $this->db->where('id_bukti_bayar', $id);
        $result = $this->db->get('bukti_bayar');
        if ($this->db->affected_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function cekkeputusan($param)
    {
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->join('penerimaan', 'status_penerimaan = kode_penerimaan', 'left');
        $this->db->where('siswa_penerimaan', $param);
        $this->db->where('umumkan', 1);
        $data = $this->db->get('pmb_penerimaan');
        if ($this->db->affected_rows() > 0) {
            return $data->row();
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
    public function ambil_satuprodi($param)
    {
        $this->db->where('id_prodi', $param);
        $result = $this->db->get('prodi');
        return $result;
    }
    public function ambiltransaksi($param)
    {
        $this->db->where('upload_id_siswa', $param);
        $result = $this->db->get('pmb_upload');
        if ($this->db->affected_rows() > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function ambilbyid($param = 0)
    {

        $this->db->where('akun_siswa', $param);
        $data = $this->db->get('pmb_siswa');
        if ($this->db->affected_rows() > 0) {
            return $data->row();
        } else {

            return false;
        }
    }
    public function ambilkepus($param = 0)
    {

        $this->db->where('siswa_penerimaan', $param);
        $data = $this->db->get('pmb_penerimaan');
        if ($this->db->affected_rows() > 0) {
            return $data->row();
        } else {

            return false;
        }
    }
    public function ambilprod($param = 0)
    {

        $this->db->where('prodi_id_siswa', $param);
        $data = $this->db->get('pmb_prodi');
        if ($this->db->affected_rows() > 0) {
            return $data->row();
        } else {

            return false;
        }
    }
    public function ambilpendidik($param = 0)
    {

        $this->db->where('sekolah_id_siswa', $param);
        $data = $this->db->get('pmb_sekolah');
        if ($this->db->affected_rows() > 0) {
            return $data->row();
        } else {

            return false;
        }
    }
    public function ambilinfo($param = 0)
    {

        $this->db->where('info_siswa_akun', $param);
        $data = $this->db->get('pmb_info');
        if ($this->db->affected_rows() > 0) {
            return $data->row();
        } else {

            return false;
        }
    }
    public function ambil_prodi()
    {
        $result = $this->db->get('prodi');
        return $result;
    }
    public function ambilortu($param = 0)
    {
        $this->db->join('pmb_wali', 'ortu_pengenal_siswa = wali_akun_siswa', 'left');
        $this->db->where('ortu_pengenal_siswa', $param);
        $data = $this->db->get('pmb_ortu');
        if ($this->db->affected_rows() > 0) {
            return $data->row();
        } else {

            return false;
        }
    }
    public function bilgam($param)
    {
        $this->db->where('upload_id_siswa', $param);
        $result = $this->db->get('pmb_upload');
        if ($this->db->affected_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function get_regvalid_bayar()
    {
        $alamat = base_url();
        $this->datatables->select('id_siswa,akun_siswa,id_bukti_bayar,nis_siswa,nama_siswa,nama_prodi,nama_pengirim,bank_pengirim,tgl_trans,jam_trans,nomor_refe,jlh_bayar,bukti_bayar,validasi_bukti,tgl_validbukti,yg_validasi,konfirm_bauk');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->datatables->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->datatables->where('validasi_bukti', 2);
        return $this->datatables->generate();
    }
    public function ambilMood($where = 0)
    {
        $DB2 = $this->load->database('db2', TRUE);
        $DB2->select('id');
        $DB2->from('mdl_user');
        $DB2->where('email', $where);
        $data = $DB2->get();
        if ($DB2->affected_rows() > 0) {
            return $data->row();
        } else {
            return false;
        }
    }
    public function ambilGrade($where = 0)
    {
        $DB2 = $this->load->database('db2', TRUE);
        $DB2->select('itemid,rawgrade,rawgrademax,finalgrade,itemname');
        $DB2->join('mdl_grade_items', 'mdl_grade_items.id = mdl_grade_grades.itemid');
        $DB2->where('userid', $where);
        $DB2->where('rawgrade !=', NULL);
        $data = $DB2->get('mdl_grade_grades');
        if ($DB2->affected_rows() > 0) {
            return $data->result();
        } else {
            return false;
        }
    }
    public function ambilEssay($where = 0)
    {
        $DB2 = $this->load->database('db2', TRUE);
        $DB2->select('questionsummary,responsesummary');
        $DB2->join('mdl_question_attempts', 'mdl_question_attempts.id = mdl_question_attempt_steps.questionattemptid', 'left');
        $DB2->join('mdl_question', 'mdl_question.id = mdl_question_attempts.questionid', 'left');
        $DB2->where('userid', $where);
        $DB2->where('qtype =', 'essay');
        $DB2->where('state =', 'complete');
        $data = $DB2->get('mdl_question_attempt_steps');
        if ($DB2->affected_rows() > 0) {
            return $data->result();
        } else {
            return false;
        }
    }
    public function cekuploadmisteri($id)
    {
        $this->db->where('upload_id_siswa', $id);
        $result = $this->db->get('pmb_upload');
        if ($this->db->affected_rows()) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function camaba_getall()
    {
        $this->db->select('nis_siswa,nik_siswa,nama_sekolah,nama_siswa,tmp_lahir_siswa,tgl_lahir_siswa,agama_siswa,jekel_siswa,alamat_siswa,email_akun_siswa,hp_siswa,jalur,gelombang,nama_prodi');
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_sekolah', 'akun_siswa = sekolah_id_siswa', 'left');
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->order_by('nama_prodi', 'ASC');
        $this->db->where('validasi_bukti', 2);
        return $this->db->get()->result();
    }

    public function jadwal_regis_gel1()
    {
        $this->db->where('id_pmb_jadwal', 1);
        $result = $this->db->get('pmb_jadwal');
        return $result->row();
    }

    public function jadwal_regis_gel2()
    {
        $this->db->where('id_pmb_jadwal', 2);
        $result = $this->db->get('pmb_jadwal');
        return $result->row();
    }

    public function jadwal_regis_gel3()
    {
        $this->db->where('id_pmb_jadwal', 3);
        $result = $this->db->get('pmb_jadwal');
        return $result->row();
    }
}

<?php
class Manalisis extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function mabaregis()
    {
        $this->datatables->select('id_siswa,akun_siswa, ref, nama_siswa, tgl_trans, jam_trans, nama_pengirim, jlh_bayar, bukti_bayar');
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        $this->datatables->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->datatables->where('validasi_bukti', 2);
        return $this->datatables->generate();
    }
}

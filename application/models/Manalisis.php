<?php
class Manalisis extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function mabaregis()
    {
        $this->datatables->from('bukti_bayar');
        $this->datatables->join('pmb_siswa', 'akun_siswa = akunb_msiswa', 'left');
        $this->datatables->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->datatables->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->datatables->join('prodi', 'prodi_penerimaan = id_prodi', 'left');
        $this->datatables->where('validasi_bukti', 2);
        $this->datatables->where('nama_siswa !=', null);
        return $this->datatables->generate();
    }
}

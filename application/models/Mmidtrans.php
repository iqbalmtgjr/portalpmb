<?php
class Mmidtrans extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $this->datatables->select('id, order_id, email, nama_siswa, jmlh_pembayaran, transaction_status, tgl_transaksi');
        $this->datatables->join('pmb_siswa', 'midtrans_akun_siswa = akun_siswa', 'left');
        $this->datatables->from('midtrans');

        $alamat = base_url();
        $this->datatables->add_column('action', '<a href="' . $alamat . 'midtrans/view/$1.html"><i class="fas fa-eye pr-2"></i></a>
        <a href="javascript:void(0);" data-code="$1" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a>', 'order_id');

        return $this->datatables->generate();
    }
}

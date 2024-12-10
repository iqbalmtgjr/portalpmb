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
        $this->datatables->add_column('action', '<a href="javascript:void(0);" data-code="$2" class="delete_record"><i class="fas fa-trash text-danger pr-2"></i></a>', 'id, order_id');

        return $this->datatables->generate();
    }

    public function hapus($order_id)
    {
        $this->db->delete('midtrans', array('order_id' => $order_id));
    }
}

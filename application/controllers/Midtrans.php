<?php

use Midtrans\Transaction;

defined('BASEPATH') or exit('No direct script access allowed');
require_once dirname(__FILE__) . '/../../vendor/midtrans/midtrans-php/Midtrans.php';
class Midtrans extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        \Midtrans\Config::$serverKey = 'SB-Mid-server-kQeOsueI5Pe8FTN9YNM9FM9X';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('datatables');
        $this->load->model('Mmidtrans', 'midtrans');
        if (empty($this->session->userdata('email_simkeu'))) {
            redirect('main/index');
        }
    }

    public function index()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "54" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->session->set_userdata('previous_url', current_url());
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/js_midtrans/index.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'midtrans' => 'midtrans',
                'analisregis' => 'analisregis',
                'jdl' => 'midtrans'
            );
            $this->template->view('midtrans/index', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('beranda/index');
        }
    }
    public function index_json()
    {
        $dutu = $this->midtrans->all();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function cekTransaksi()
    {
        $this->db->where('transaction_status', 'pending');
        $data_siswa = $this->db->get('midtrans')->result_array();
        // print_r($data_siswa);
        foreach ($data_siswa as $midtrans) {
            $status = \Midtrans\Transaction::status($midtrans['order_id']);
            if ($status) {
                $this->db->where('order_id', $midtrans['order_id']);
                $this->db->update('midtrans', array('transaction_status' => $status->transaction_status));

                if ($status->transaction_status == "settlement") {
                    $this->db->where('akun_siswa', $midtrans['midtrans_akun_siswa']);
                    $this->db->update('pmb_siswa', array('valid_bayar' => 2));
                }
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Error!</h5>' . $this->db->_error_message() . '</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Sukses!</h5>Refresh data transaksi berhasil.</div>');
        }
        redirect('midtrans/index');
    }

    public function hapus()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "49") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Peringatan!</h5>Anda tidak punya hak akses.</div>');
                redirect('beranda/index');
            }
            $tampung = $this->input->post(NULL, TRUE);

            $order_id = $tampung['order_id'];
            // print_r($order_id);
            // die;

            $this->midtrans->hapus($order_id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Sukses!</h5>Hapus data transaksi berhasil.</div>');
            redirect('midtrans/index');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Peringatan!</h5>Anda tidak punya hak akses.</div>');
            redirect('beranda/index');
        }
    }
}

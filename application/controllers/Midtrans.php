<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Midtrans extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
}

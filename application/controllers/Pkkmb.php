<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pkkmb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->model('mpkkmb', 'pkkmb');
        if (empty($this->session->userdata('email_simkeu'))) {
            redirect('main/index');
        }
    }
    
    public function semua()
    {
        $dutu = $this->pkkmb->allpkkmb();
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "54" || $this->session->userdata('pengguna_id_simkeu') == "53") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/blmpkkmb.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'data' => $dutu,
                'pkkmb' => 'pkkmb',
                'semua' => 'semua',
                'jdl' => 'PKKMB'
            );
            $this->template->view('pkkmb/tbl_pkkmb', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('beranda/index');
        }
    }

    public function index()
    {
        $dutu = $this->pkkmb->blmpkkmb();
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "54" || $this->session->userdata('pengguna_id_simkeu') == "53") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/blmpkkmb.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'data' => $dutu,
                'pkkmb' => 'pkkmb',
                'regiss' => 'regis',
                'jdl' => 'PKKMB'
            );
            $this->template->view('pkkmb/tbl_blmpkkmb', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('beranda/index');
        }
    }
    
    public function lulus()
    {
        $dutu = $this->pkkmb->lulusblmpkkmb();
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "54" || $this->session->userdata('pengguna_id_simkeu') == "53") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/blmpkkmb.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'data' => $dutu,
                'pkkmb' => 'pkkmb',
                'lulus' => 'lulus',
                'jdl' => 'PKKMB'
            );
            $this->template->view('pkkmb/tbl_lulusblmpkkmb', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('beranda/index');
        }
    }
}

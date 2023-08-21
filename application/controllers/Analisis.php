<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        // $this->load->model('mmasterpmb', 'pmb');
        $this->load->model('mbank', 'bank');
        $this->load->model('manalisis', 'analisis');
        if (empty($this->session->userdata('email_simkeu'))) {
            redirect('main/index');
        }
    }

    public function index()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/analisisregis.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'analisis' => 'analisis',
                'analisregis' => 'analisregis',
                'jdl' => 'Analisis'
            );
            $this->template->view('analisis/tbl_analisisregis', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('beranda/index');
        }
    }
    public function index_json()
    {
        $dutu = $this->analisis->mabaregis();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function belumbayar()
    {
        $dutu = $this->analisis->belumregis();
        echo '<pre>';
        print_r($dutu);
        die;
        // if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "39") {
        //     $data = array(
        //         'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/analisisblmregis.js'),
        //         'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
        //         'analisis' => 'analisis',
        //         'blmbayarregis' => 'blmbayarregis',
        //         'jdl' => 'Analisis'
        //     );
        //     $this->template->view('analisis/tbl_blmregis', $data);
        // } else {
        //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
        //     redirect('beranda/index');
        // }
    }
    public function penomayar()
    {
        $dutu = $this->analisis->tdk();
        echo '<pre>';
        print_r($dutu);
        // $executedQuery = $this->db->last_query();
        // print_r($executedQuery);
        die;
        // $array_data = json_decode($dutu, true);
        // $extra = array(
        //     $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        // );
        // $array_data[] = $extra;
        // $final_data = json_encode($array_data);
        // echo $final_data;

    }
}

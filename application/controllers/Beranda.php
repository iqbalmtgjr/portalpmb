<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->model('mberanda', 'beranda');
        if (empty($this->session->userdata('email_simkeu'))) {
            redirect('main/index');
        }
        if ($this->session->userdata('apli') != "pmb") {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function index()
    {
        // $baba = $this->beranda->gel_valid('3');
        // echo "<pre>";
        // print_r($baba); die;
        $bulan = $this->beranda->get_penvalido();
        $jumlah = $this->beranda->get_penvalido2();
        $jumlahs = json_encode($jumlah);
        $bulans = json_encode($bulan);
        $res = str_replace('"', '', $jumlahs);

        $bulan2 = $this->beranda->get_penvalido22();
        $jumlah2 = $this->beranda->get_penvalido222();
        $jumlahs2 = json_encode($jumlah2);
        $bulans2 = json_encode($bulan2);
        $res2 = str_replace('"', '', $jumlahs2);

        $bulan1 = $this->beranda->get_penvalido21();
        $jumlah1 = $this->beranda->get_penvalido221();
        $jumlahs1 = json_encode($jumlah1);
        $bulans1 = json_encode($bulan1);
        $res1 = str_replace('"', '', $jumlahs1);

        $data = array(
            'bul3' => $bulans,
            'ang3' => $res,
            'bul2' => $bulans2,
            'ang2' => $res2,
            'bul1' => $bulans1,
            'ang1' => $res1,
            'valtes' => $this->beranda->tes_valid(),
            'valpres' => $this->beranda->pres_valid(),
            'valdua' => $this->beranda->dua_valid(),
            'regis' => $this->beranda->get_regis_bayar(),
            'prod' => $this->beranda->prodi(),
            'prod2' => $this->beranda->prodireg2(),
            'pbsi' => $this->beranda->pdf_regis_pbsi(),
            'pmat' => $this->beranda->pdf_regis_pmat(),
            'pek' => $this->beranda->pdf_regis_pek(),
            'pkn' => $this->beranda->pdf_regis_pkn(),
            'pkom' => $this->beranda->pdf_regis_pkom(),
            'pbio' => $this->beranda->pdf_regis_pbio(),
            'paud' => $this->beranda->pdf_regis_paud(),
            'pbi' => $this->beranda->pdf_regis_pbi(),
            'pgsd' => $this->beranda->pdf_regis_pgsd(),
            'gel1' => $this->beranda->gel_valid(1),
            'gel2' => $this->beranda->gel_valid(2),
            'gel3' => $this->beranda->gel_valid(3),

        );
        $this->template->view('beranda/index', $data);
    }
}

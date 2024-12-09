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
        $a = $this->beranda->get_penvalido222p();
        $b = $this->beranda->get_penvalido222();
        $c = $this->beranda->get_penvalido221p();
        $d = $this->beranda->get_penvalido221();
        // echo "<pre>";
        // print_r($d);
        // die;

        //pmb 2025
        $bulan = $this->beranda->get_penvalido();
        $jumlah = $this->beranda->get_penvalido2();
        $jumlahs = json_encode($jumlah);
        $bulans = json_encode($bulan);
        $res = str_replace('"', '', $jumlahs);

        //pmb 2024
        $bulan4 = $this->beranda->get_penvalido24();
        $jumlah4 = $this->beranda->get_penvalido224();
        $jumlahs4 = json_encode($jumlah4);
        $bulans4 = json_encode($bulan4);
        $res4 = str_replace('"', '', $jumlahs4);

        //pmb 2023
        $bulan3 = $this->beranda->get_penvalido23();
        $jumlah3 = $this->beranda->get_penvalido223();
        $jumlahs3 = json_encode($jumlah3);
        $bulans3 = json_encode($bulan3);
        $res3 = str_replace('"', '', $jumlahs3);
        // echo "<pre>";
        // print_r($jumlah3);
        // die;

        //pmb 2022
        $bulan2 = $this->beranda->get_penvalido22();
        $jumlah2 =  $this->sum_arrays($b, $a);
        $jumlahs2 = json_encode($jumlah2);
        $bulans2 = json_encode($bulan2);
        $res2 = str_replace('"', '', $jumlahs2);
        // echo "<pre>";
        // print_r($b);
        // die;

        //pmb 2021
        $bulan1 = $this->beranda->get_penvalido21();
        $jumlah1 = $this->sum_arrays($d, $c);
        $jumlahs1 = json_encode($jumlah1);
        $bulans1 = json_encode($bulan1);
        $res1 = str_replace('"', '', $jumlahs1);
        // echo "<pre>";
        // print_r($jumlah1);
        // die;

        // valid perprodi

        //pbsi
        $v_pbsi_pres = $this->beranda->valid_prestasi(1);
        $v_pbsi_test = $this->beranda->valid_test(1);

        //mtk
        $v_mtk_pres = $this->beranda->valid_prestasi(2);
        $v_mtk_test = $this->beranda->valid_test(2);

        //ekonomi
        $v_eko_pres = $this->beranda->valid_prestasi(3);
        $v_eko_test = $this->beranda->valid_test(3);

        //pkn
        $v_pkn_pres = $this->beranda->valid_prestasi(4);
        $v_pkn_test = $this->beranda->valid_test(4);

        //komputer
        $v_kom_pres = $this->beranda->valid_prestasi(5);
        $v_kom_test = $this->beranda->valid_test(5);

        //biologi
        $v_bio_pres = $this->beranda->valid_prestasi(6);
        $v_bio_test = $this->beranda->valid_test(6);

        //paud
        $v_paud_pres = $this->beranda->valid_prestasi(7);
        $v_paud_test = $this->beranda->valid_test(7);

        //pbi
        $v_pbi_pres = $this->beranda->valid_prestasi(8);
        $v_pbi_test = $this->beranda->valid_test(8);

        //pgsd
        $v_pgsd_pres = $this->beranda->valid_prestasi(9);
        $v_pgsd_test = $this->beranda->valid_test(9);

        //regis_pergelombang

        //pbsi
        $r_pbsi_pres = $this->beranda->regis_prestasi(1);
        $r_pbsi_test = $this->beranda->regis_test(1);

        //mtk
        $r_mtk_pres = $this->beranda->regis_prestasi(2);
        $r_mtk_test = $this->beranda->regis_test(2);

        //ekonomi
        $r_eko_pres = $this->beranda->regis_prestasi(3);
        $r_eko_test = $this->beranda->regis_test(3);

        //pkn
        $r_pkn_pres = $this->beranda->regis_prestasi(4);
        $r_pkn_test = $this->beranda->regis_test(4);

        //komputer
        $r_kom_pres = $this->beranda->regis_prestasi(5);
        $r_kom_test = $this->beranda->regis_test(5);

        //biologi
        $r_bio_pres = $this->beranda->regis_prestasi(6);
        $r_bio_test = $this->beranda->regis_test(6);

        //paud
        $r_paud_pres = $this->beranda->regis_prestasi(7);
        $r_paud_test = $this->beranda->regis_test(7);

        //pbi
        $r_pbi_pres = $this->beranda->regis_prestasi(8);
        $r_pbi_test = $this->beranda->regis_test(8);

        //pgsd
        $r_pgsd_pres = $this->beranda->regis_prestasi(9);
        $r_pgsd_test = $this->beranda->regis_test(9);


        $data = array(
            'bul25' => $bulans,
            'ang25' => $res,
            'bul24' => $bulans4,
            'ang24' => $res4,
            'bul23' => $bulans3,
            'ang23' => $res3,
            'bul22' => $bulans2,
            'ang22' => $res2,
            'bul21' => $bulans1,
            'ang21' => $res1,
            'valtes' => $this->beranda->tes_valid(),
            'valpres' => $this->beranda->pres_valid(),
            'valdua' => $this->beranda->dua_valid(),
            'regis' => $this->beranda->get_regis_bayar(),
            'prod' => $this->beranda->prodi(),
            'prodg2' => $this->beranda->prodig2(),
            'prodg3' => $this->beranda->prodig3(),
            'prodg123' => $this->beranda->prodig123(),
            'prodjalurtest' => $this->beranda->prodijalurtest(),
            'prodjalurpres' => $this->beranda->prodijalurpres(),
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
            'v_pbsi_pres' => $v_pbsi_pres,
            'v_pbsi_test' => $v_pbsi_test,
            'v_mtk_pres' => $v_mtk_pres,
            'v_mtk_test' => $v_mtk_test,
            'v_eko_pres' => $v_eko_pres,
            'v_eko_test' => $v_eko_test,
            'v_pkn_pres' => $v_pkn_pres,
            'v_pkn_test' => $v_pkn_test,
            'v_kom_pres' => $v_kom_pres,
            'v_kom_test' => $v_kom_test,
            'v_bio_pres' => $v_bio_pres,
            'v_bio_test' => $v_bio_test,
            'v_paud_pres' => $v_paud_pres,
            'v_paud_test' => $v_paud_test,
            'v_pbi_pres' => $v_pbi_pres,
            'v_pbi_test' => $v_pbi_test,
            'v_pgsd_pres' => $v_pgsd_pres,
            'v_pgsd_test' => $v_pgsd_test,
            'r_pbsi_pres' => $r_pbsi_pres,
            'r_pbsi_test' => $r_pbsi_test,
            'r_mtk_pres' => $r_mtk_pres,
            'r_mtk_test' => $r_mtk_test,
            'r_eko_pres' => $r_eko_pres,
            'r_eko_test' => $r_eko_test,
            'r_pkn_pres' => $r_pkn_pres,
            'r_pkn_test' => $r_pkn_test,
            'r_kom_pres' => $r_kom_pres,
            'r_kom_test' => $r_kom_test,
            'r_bio_pres' => $r_bio_pres,
            'r_bio_test' => $r_bio_test,
            'r_paud_pres' => $r_paud_pres,
            'r_paud_test' => $r_paud_test,
            'r_pbi_pres' => $r_pbi_pres,
            'r_pbi_test' => $r_pbi_test,
            'r_pgsd_pres' => $r_pgsd_pres,
            'r_pgsd_test' => $r_pgsd_test,

        );
        $this->template->view('beranda/index', $data);
    }

    function sum_arrays($array1, $array2)
    {
        $array = array();
        foreach ($array1 as $index => $value) {
            $array[$index] = isset($array2[$index]) ? $array2[$index] + $value : $value;
        }
        return $array;
    }
}

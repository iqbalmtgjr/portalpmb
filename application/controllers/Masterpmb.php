<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Masterpmb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->model('mmasterpmb', 'pmb');
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
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_calonsiswa.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmbo' => 'index',
            'jdl' => 'Berhasil Login Akun'
        );
        $this->template->view('pmb/tbl-calonsiswa', $data);
    }
    public function get_siswa_json()
    {
        $dutu = $this->pmb->get_all_siswa();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    // Daftar pendaftar yang tidak pernah login
    public function penvalido()
    {
    }
    public function no()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_no.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmbo' => 'no',
            'jdl' => 'Tidak Pernah Login'
        );
        $this->template->view('pmb/tbl-calonsiswa', $data);
    }

    public function no_siswa_json()
    {
        $dutu = $this->pmb->no_all_siswa();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    //filter analisis registrasi
    public function set_sudah_regis()
    {
        $tangkap_gel = $this->input->post('filter_gel');
        $tangkap_jal = $this->input->post('filter_jal');
        // print_r($tangkap);die;
        $anjai_session = array(
            'filter_gel_regis' => $tangkap_gel,
            'filter_jal_regis' => $tangkap_jal,
        );
        $this->session->set_userdata($anjai_session);
        redirect('analisis/index');
    }

    public function set_blm_regis()
    {
        $tangkap_gel = $this->input->post('filter_gel');
        $tangkap_jal = $this->input->post('filter_jal');
        // print_r($tangkap);die;
        $anjai_session = array(
            'filter_gel_regis2' => $tangkap_gel,
            'filter_jal_regis2' => $tangkap_jal,
        );
        $this->session->set_userdata($anjai_session);
        redirect('analisis/belumbayar');
    }

    //Tes Valid Pembayaran Semua gelombang
    public function set_reguler_valid()
    {
        $tangkap = $this->input->post('filter_gel');
        // print_r($tangkap);die;
        $anjai_session = array(
            'filter_gel_reg' => $tangkap
        );
        $this->session->set_userdata($anjai_session);
        redirect('masterpmb/reguler2');
    }
    public function set_reguler_valid1()
    {
        $tangkap = $this->input->post('filter_gel');
        // print_r($tangkap);die;
        $anjai_session = array(
            'filter_gel_reg1' => $tangkap
        );
        $this->session->set_userdata($anjai_session);
        redirect('masterpmb/reguler2valid');
    }
    public function set_reguler_valid2()
    {
        $tangkap = $this->input->post('filter_gel');
        // print_r($tangkap);die;
        $anjai_session = array(
            'filter_gel_reg2' => $tangkap
        );
        $this->session->set_userdata($anjai_session);
        redirect('masterpmb/reguler2invalid');
    }

    public function set_gelombang_test()
    {
        $tangkap = $this->input->post('filter_gel');
        // print_r($tangkap);die;
        $anjai_session = array(
            'filter_gel_test' => $tangkap
        );
        $this->session->set_userdata($anjai_session);
        redirect('masterpmb/testvalid');
    }

    public function set_gelombang_test1()
    {
        $tangkap = $this->input->post('filter_gel');
        // print_r($tangkap);die;
        $anjai_session = array(
            'filter_gel_test1' => $tangkap
        );
        $this->session->set_userdata($anjai_session);
        redirect('masterpmb/test');
    }

    public function set_gelombang_test2()
    {
        $tangkap = $this->input->post('filter_gel');
        // print_r($tangkap);die;
        $anjai_session = array(
            'filter_gel_test1' => $tangkap
        );
        $this->session->set_userdata($anjai_session);
        redirect('masterpmb/testinvalid');
    }

    public function testinvalid()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_invalidtest.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb2' => 'invalid',
            'gelom' => ''
        );
        $this->template->view('pmb/tbl-testinvalid', $data);
    }
    public function invalidtest_siswa_json()
    {
        $dutu = $this->pmb->invalidtest_all_siswa();
        // print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function testvalid()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_testvalid.js', 'plugins/datatables-buttons/js/buttons.html5.min.js', 'plugins/datatables-buttons/js/dataTables.buttons.min.js', 'plugins/datatables-buttons/js/buttons.bootstrap4.min.js', 'assets/button/pdfmake.min.js', 'plugins/datatables-buttons/js/buttons.print.min.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css', 'plugins/datatables-buttons/css/buttons.bootstrap4.min.css'),
            'pmb2' => 'valid'
        );
        $this->template->view('pmb/tbl-testvalid', $data);
    }
    public function testvalid_siswa_json()
    {
        $dutu = $this->pmb->testvalid_all_siswa();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    //Tes Valid Pembayaran gelombang 1
    public function testvalid1()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_testvalid1.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb2' => 'valid1',
            'jdl' => 'Gelombang 1'
        );
        $this->template->view('pmb/tbl-testvalid', $data);
    }
    public function testvalid1_siswa_json()
    {
        $dutu = $this->pmb->testvalid1_all_siswa();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    //Tes Valid Pembayaran gelombang 2
    public function testvalid2()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_testvalid2.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb2' => 'valid2',
            'jdl' => 'Gelombang 2'
        );
        $this->template->view('pmb/tbl-testvalid', $data);
    }
    public function testvalid2_siswa_json()
    {
        $dutu = $this->pmb->testvalid2_all_siswa();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    //Tes Valid Pembayaran gelombang 3
    public function testvalid3()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_testvalid3.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb2' => 'valid3',
            'jdl' => 'Gelombang 3'
        );
        $this->template->view('pmb/tbl-testvalid', $data);
    }
    public function testvalid3_siswa_json()
    {
        $dutu = $this->pmb->testvalid3_all_siswa();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    //Pendaftar PMB jalur tes
    public function test()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_test.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb2' => 'tes'
        );
        $this->template->view('pmb/tbl-test', $data);
    }
    public function test_siswa_json()
    {
        $dutu = $this->pmb->test_all_siswa();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    //Pendaftar PMB jalur tes gelombang 1
    public function test1()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_test1.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb2' => 'tes1',
            'jdl' => 'Gelombang 1'
        );
        $this->template->view('pmb/tbl-test', $data);
    }
    public function test1_siswa_json()
    {
        $dutu = $this->pmb->test1_all_siswa();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    //Pendaftar PMB jalur tes gelombang 2
    public function test2()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_test2.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb2' => 'tes2',
            'jdl' => 'Gelombang 2'
        );
        $this->template->view('pmb/tbl-test', $data);
    }
    public function test2_siswa_json()
    {
        $dutu = $this->pmb->test2_all_siswa();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    //Pendaftar PMB jalur tes gelombang 3
    public function test3()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_test3.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb2' => 'tes3',
            'jdl' => 'Gelombang 3'
        );
        $this->template->view('pmb/tbl-test', $data);
    }
    public function test3_siswa_json()
    {
        $dutu = $this->pmb->test3_all_siswa();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    // PMB Reguler 2
    public function reguler2()
    {
        // die;
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_reguler2.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'reg' => 'reg2',
            'gelom' => ''
        );
        $this->template->view('pmb/tbl-reguler2', $data);
    }
    public function reguler_siswa_json()
    {
        $dutu = $this->pmb->reguler_siswa();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function reguler2invalid()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_reguler2invalid.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'reg' => 'inreg22',
            'gelom' => ''
        );
        $this->template->view('pmb/tbl-reguler2invalid', $data);
    }
    public function invalidreguler_siswa_json()
    {
        $dutu = $this->pmb->reguler_siswainvalid();
        // print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function reguler2valid()
    {
        // die;
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_reguler2valid.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'reg' => 'reg22',
            'gelom' => ''
        );
        $this->template->view('pmb/tbl-reguler2valid', $data);
    }
    public function reguler_siswa_json1()
    {
        $dutu = $this->pmb->reguler_siswavalid();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    // PMB prestasi semua gelombang
    public function prestasi()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_prestasi.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb1' => 'pres',
            'gelom' => ''
        );
        $this->template->view('pmb/tbl-prestasi', $data);
    }

    public function prestasi_siswa_json()
    {
        $dutu = $this->pmb->prestasi_all_siswa();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    public function prestasiinvalid()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_invalidprestasi.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb1' => 'presinvalid',
            'gelom' => ''
        );
        $this->template->view('pmb/pres-invalid', $data);
        //    $this->template->view('pmb/tbl-prestasi', $data);
    }
    public function invalidprestasi_siswa_json()
    {
        $dutu = $this->pmb->invalidprestasi_all_siswa();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function set1_gelombang()
    {
        $tangkap = $this->input->post('filter_gel');
        // print_r($tangkap);die;
        $anjai_session = array(
            'filter_gel1' => $tangkap
        );
        $this->session->set_userdata($anjai_session);
        redirect('masterpmb/prestasi');
    }
    public function set2_gelombang()
    {
        $tangkap = $this->input->post('filter_gel');
        // print_r($tangkap);die;
        $anjai_session = array(
            'filter_gel1' => $tangkap
        );
        $this->session->set_userdata($anjai_session);
        redirect('masterpmb/prestasiinvalid');
    }
    public function set_gelombang()
    {
        $tangkap = $this->input->post('filter_gel');
        // print_r($tangkap);die;
        $anjai_session = array(
            'filter_gel' => $tangkap
        );
        $this->session->set_userdata($anjai_session);
        redirect('masterpmb/prestasivalid');
    }
    public function prestasivalid()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/pres_valid.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb1' => 'presvalid',
            'gelom' => ''
        );
        // print_r($this->input->get('filter_gel')); die;
        $this->template->view('pmb/pres-valid', $data);
    }

    public function prestasi_valid_json()
    {
        $dutu = $this->pmb->prestasi_valid_siswa();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    // PMB prestasi gelombang 1
    public function prestasi1()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_prestasi1.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb1' => 'pres1',
            'gelom' => '1'
        );
        $this->template->view('pmb/tbl-prestasi', $data);
    }
    public function prestasi1_siswa_json()
    {
        $dutu = $this->pmb->prestasi1_all_siswa();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    // PMB prestasi gelombang 2
    public function prestasi2()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_prestasi2.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb1' => 'pres2',
            'gelom' => '2'
        );
        $this->template->view('pmb/tbl-prestasi', $data);
    }
    public function prestasi2_siswa_json()
    {
        $dutu = $this->pmb->prestasi2_all_siswa();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    // PMB jalur Prestasi Gelombang 3	
    public function prestasi3()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_prestasitiga.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb1' => 'pres3',
            'gelom' => '3'
        );
        $this->template->view('pmb/tbl-prestasi', $data);
    }
    public function prestasi3_siswa_json()
    {
        $dutu = $this->pmb->prestasi3_all_siswa();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }



    public function pgsd()
    {
        $data = array(
            'js' => array(
                'plugins/datatables/jquery.dataTables.js',
                'plugins/datatables-bs4/js/dataTables.bootstrap4.js',
                'assets/daftar_calonpgsd.js',
                'assets/button/dataTables.buttons.min.js',
                'assets/button/buttons.bootstrap4.min.js',
                'assets/button/jszip.min.js',
                'assets/button/pdfmake.min.js',
                'assets/button/vfs_fonts.js',
                'assets/button/buttons.html5.min.js'
            ),
            'css' => array(
                'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
                'assets/button/buttons.bootstrap4.min.css',
                'assets/button/buttontable.css'
            ),
            'pmb3' => 'pgsd',
            'pmb' => 'Pendidikan Guru Sekolah Dasar',
            'prodi' => '9'
        );
        $this->template->view('pmb/tbl-pmbprodi', $data);
    }
    function get_pgsd_json()
    {
        $dutu = $this->pmb->get_all_pgsd();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    
    public function pgsdregis()
    {
        $data = array(
            'js' => array(
                'plugins/datatables/jquery.dataTables.js',
                'plugins/datatables-bs4/js/dataTables.bootstrap4.js',
                'assets/daftar_pgsdregis.js',
                'assets/button/dataTables.buttons.min.js',
                'assets/button/buttons.bootstrap4.min.js',
                'assets/button/jszip.min.js',
                'assets/button/pdfmake.min.js',
                'assets/button/vfs_fonts.js',
                'assets/button/buttons.html5.min.js'
            ),
            'css' => array(
                'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
                'assets/button/buttons.bootstrap4.min.css',
                'assets/button/buttontable.css'
            ),
            'pmbregis' => 'pgsdregis',
            'pmb' => 'Pendidikan Guru Sekolah Dasar',
            'prodi' => '9'
        );
        $this->template->view('pmb/tbl-prodiregis', $data);
    }
    
    function get_pgsdregis_json()
    {
        $dutu = $this->pmb->get_all_pgsdregis();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }


    public function pgpaud()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_calonpgpaud.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb3' => 'pgpaud',
            'pmb' => 'Pendidikan Guru Pendidikan Anak Usia Dini',
            'prodi' => '7'
        );
        $this->template->view('pmb/tbl-pmbprodi', $data);
    }
    function get_pgpaud_json()
    {
        $dutu = $this->pmb->get_all_pgpaud();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function pgpaudregis()
    {
        $data = array(
            'js' => array(
                'plugins/datatables/jquery.dataTables.js',
                'plugins/datatables-bs4/js/dataTables.bootstrap4.js',
                'assets/daftar_pgpaudregis.js',
                'assets/button/dataTables.buttons.min.js',
                'assets/button/buttons.bootstrap4.min.js',
                'assets/button/jszip.min.js',
                'assets/button/pdfmake.min.js',
                'assets/button/vfs_fonts.js',
                'assets/button/buttons.html5.min.js'
            ),
            'css' => array(
                'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
                'assets/button/buttons.bootstrap4.min.css',
                'assets/button/buttontable.css'
            ),
            'pmbregis' => 'pgpaudregis',
            'pmb' => 'Pendidikan Anak Usia Dini',
            'prodi' => '7'
        );
        $this->template->view('pmb/tbl-prodiregis', $data);
    }
    
    function get_pgpaudregis_json()
    {
        $dutu = $this->pmb->get_all_pgpaudregis();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function pbsi()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_calonpbsi.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb3' => 'pbsi',
            'pmb' => 'Pendidikan Bahasa dan Sastra Indonesia',
            'prodi' => '1'
        );
        $this->template->view('pmb/tbl-pmbprodi', $data);
    }
    
    function get_pbsi_json()
    {
        $dutu = $this->pmb->get_all_pbsi();
        // print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    
    public function pbsiregis()
    {
        $data = array(
            'js' => array(
                'plugins/datatables/jquery.dataTables.js',
                'plugins/datatables-bs4/js/dataTables.bootstrap4.js',
                'assets/daftar_pbsiregis.js',
                'assets/button/dataTables.buttons.min.js',
                'assets/button/buttons.bootstrap4.min.js',
                'assets/button/jszip.min.js',
                'assets/button/pdfmake.min.js',
                'assets/button/vfs_fonts.js',
                'assets/button/buttons.html5.min.js'
            ),
            'css' => array(
                'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
                'assets/button/buttons.bootstrap4.min.css',
                'assets/button/buttontable.css'
            ),
            'pmbregis' => 'pbsiregis',
            'pmb' => 'Pendidikan Bahasa dan Sastra Indonesia',
            'prodi' => '1'
        );
        $this->template->view('pmb/tbl-prodiregis', $data);
    }
    
    function get_pbsiregis_json()
    {
        $dutu = $this->pmb->get_all_pbsiregis();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function pbi()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_calonpbi.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb3' => 'pbi',
            'pmb' => 'Pendidikan Bahasa Inggris',
            'prodi' => '8'
        );
        $this->template->view('pmb/tbl-pmbprodi', $data);
    }
    
    function get_pbi_json()
    {
        $dutu = $this->pmb->get_all_pbi();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    
    public function pbiregis()
    {
        $data = array(
            'js' => array(
                'plugins/datatables/jquery.dataTables.js',
                'plugins/datatables-bs4/js/dataTables.bootstrap4.js',
                'assets/daftar_pbiregis.js',
                'assets/button/dataTables.buttons.min.js',
                'assets/button/buttons.bootstrap4.min.js',
                'assets/button/jszip.min.js',
                'assets/button/pdfmake.min.js',
                'assets/button/vfs_fonts.js',
                'assets/button/buttons.html5.min.js'
            ),
            'css' => array(
                'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
                'assets/button/buttons.bootstrap4.min.css',
                'assets/button/buttontable.css'
            ),
            'pmbregis' => 'pbiregis',
            'pmb' => 'Pendidikan Bahasa Inggris',
            'prodi' => '8'
        );
        $this->template->view('pmb/tbl-prodiregis', $data);
    }
    
    function get_pbiregis_json()
    {
        $dutu = $this->pmb->get_all_pbiregis();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function pbio()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_calonpbio.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb3' => 'pbio',
            'pmb' => 'Pendidikan Biologi',
            'prodi' => '6'
        );
        $this->template->view('pmb/tbl-pmbprodi', $data);
    }
    
    function get_pbio_json()
    {
        $dutu = $this->pmb->get_all_pbio();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function pbioregis()
    {
        $data = array(
            'js' => array(
                'plugins/datatables/jquery.dataTables.js',
                'plugins/datatables-bs4/js/dataTables.bootstrap4.js',
                'assets/daftar_pbioregis.js',
                'assets/button/dataTables.buttons.min.js',
                'assets/button/buttons.bootstrap4.min.js',
                'assets/button/jszip.min.js',
                'assets/button/pdfmake.min.js',
                'assets/button/vfs_fonts.js',
                'assets/button/buttons.html5.min.js'
            ),
            'css' => array(
                'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
                'assets/button/buttons.bootstrap4.min.css',
                'assets/button/buttontable.css'
            ),
            'pmbregis' => 'pbioregis',
            'pmb' => 'Pendidikan Biologi',
            'prodi' => '6'
        );
        $this->template->view('pmb/tbl-prodiregis', $data);
    }
    
    function get_pbioregis_json()
    {
        $dutu = $this->pmb->get_all_pbioregis();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function pmat()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_calonpmat.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb3' => 'pmat',
            'pmb' => 'Pendidikan Matematika',
            'prodi' => '2'
        );
        $this->template->view('pmb/tbl-pmbprodi', $data);
    }
    function get_pmat_json()
    {
        $dutu = $this->pmb->get_all_pmat();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    
    public function pmatregis()
    {
        $data = array(
            'js' => array(
                'plugins/datatables/jquery.dataTables.js',
                'plugins/datatables-bs4/js/dataTables.bootstrap4.js',
                'assets/daftar_pmatregis.js',
                'assets/button/dataTables.buttons.min.js',
                'assets/button/buttons.bootstrap4.min.js',
                'assets/button/jszip.min.js',
                'assets/button/pdfmake.min.js',
                'assets/button/vfs_fonts.js',
                'assets/button/buttons.html5.min.js'
            ),
            'css' => array(
                'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
                'assets/button/buttons.bootstrap4.min.css',
                'assets/button/buttontable.css'
            ),
            'pmbregis' => 'pmatregis',
            'pmb' => 'Pendidikan Matematika',
            'prodi' => '2'
        );
        $this->template->view('pmb/tbl-prodiregis', $data);
    }
    
    function get_pmatregis_json()
    {
        $dutu = $this->pmb->get_all_pmatregis();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function ppkn()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_calonppkn.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb3' => 'ppkn',
            'pmb' => 'Pendidikan Pancasila dan Kewarganegaraan',
            'prodi' => '4'
        );
        $this->template->view('pmb/tbl-pmbprodi', $data);
    }
    
    function get_ppkn_json()
    {
        $dutu = $this->pmb->get_all_ppkn();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    
    public function ppknregis()
    {
        $data = array(
            'js' => array(
                'plugins/datatables/jquery.dataTables.js',
                'plugins/datatables-bs4/js/dataTables.bootstrap4.js',
                'assets/daftar_ppknregis.js',
                'assets/button/dataTables.buttons.min.js',
                'assets/button/buttons.bootstrap4.min.js',
                'assets/button/jszip.min.js',
                'assets/button/pdfmake.min.js',
                'assets/button/vfs_fonts.js',
                'assets/button/buttons.html5.min.js'
            ),
            'css' => array(
                'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
                'assets/button/buttons.bootstrap4.min.css',
                'assets/button/buttontable.css'
            ),
            'pmbregis' => 'ppknregis',
            'pmb' => 'Pendidikan Pancasila dan Kewarganegaraan',
            'prodi' => '4'
        );
        $this->template->view('pmb/tbl-prodiregis', $data);
    }
    
    function get_ppknregis_json()
    {
        $dutu = $this->pmb->get_all_ppknregis();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function komputer()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_calonkomputer.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb3' => 'komputer',
            'pmb' => 'Pendidikan Komputer',
            'prodi' => '5'
        );
        $this->template->view('pmb/tbl-pmbprodi', $data);
    }
    
    function get_komputer_json()
    {
        $dutu = $this->pmb->get_all_komputer();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    
    public function komputerregis()
    {
        $data = array(
            'js' => array(
                'plugins/datatables/jquery.dataTables.js',
                'plugins/datatables-bs4/js/dataTables.bootstrap4.js',
                'assets/daftar_komputerregis.js',
                'assets/button/dataTables.buttons.min.js',
                'assets/button/buttons.bootstrap4.min.js',
                'assets/button/jszip.min.js',
                'assets/button/pdfmake.min.js',
                'assets/button/vfs_fonts.js',
                'assets/button/buttons.html5.min.js'
            ),
            'css' => array(
                'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
                'assets/button/buttons.bootstrap4.min.css',
                'assets/button/buttontable.css'
            ),
            'pmbregis' => 'komputerregis',
            'pmb' => 'Pendidikan Komputer',
            'prodi' => '5'
        );
        $this->template->view('pmb/tbl-prodiregis', $data);
    }
    
    function get_komputerregis_json()
    {
        $dutu = $this->pmb->get_all_komputerregis();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function ekonomi()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_calonekonomi.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'pmb3' => 'ekonomi',
            'pmb' => 'Pendidikan Ekonomi',
            'prodi' => '3'
        );
        $this->template->view('pmb/tbl-pmbprodi', $data);
    }
    
    function get_ekonomi_json()
    {
        $dutu = $this->pmb->get_all_ekonomi();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }
    
    public function ekonomiregis()
    {
        $data = array(
            'js' => array(
                'plugins/datatables/jquery.dataTables.js',
                'plugins/datatables-bs4/js/dataTables.bootstrap4.js',
                'assets/daftar_ekonomiregis.js',
                'assets/button/dataTables.buttons.min.js',
                'assets/button/buttons.bootstrap4.min.js',
                'assets/button/jszip.min.js',
                'assets/button/pdfmake.min.js',
                'assets/button/vfs_fonts.js',
                'assets/button/buttons.html5.min.js'
            ),
            'css' => array(
                'plugins/datatables-bs4/css/dataTables.bootstrap4.css',
                'assets/button/buttons.bootstrap4.min.css',
                'assets/button/buttontable.css'
            ),
            'pmbregis' => 'ekonomiregis',
            'pmb' => 'Pendidikan Ekonomi',
            'prodi' => '3'
        );
        $this->template->view('pmb/tbl-prodiregis', $data);
    }
    
    function get_ekonomiregis_json()
    {
        $dutu = $this->pmb->get_all_ekonomiregis();
        //print_r($dutu); die;
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function umumkan($id = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49") {
            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $cek = $this->pmb->ambilumumkan($id);
            // print_r($cek); die();

            // Priksa apakah camaba sudah diputuskan penerimaannya
            $periksa = $this->pmb->priksaPutuskan($id);
            if (empty($periksa)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Status penerimaan belum ditentukan.</div>');
                redirect('masterpmb/keputusan/' . $cek->pengenal_akun);
            }

            // Periksa apakah keputusan camaba sudah diumukan atau belum
            if ($cek->umumkan == "1") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Status penerimaan telah diumumkan.</div>');
                redirect('masterpmb/keputusan/' . $cek->pengenal_akun);
            }

            // Menandai camaba kalau sudah diumumkan
            $where = array('siswa_penerimaan' => $cek->pengenal_akun);
            $masuk['umumkan'] = "1";
            $this->db->update('pmb_penerimaan', $masuk, $where);

            // Pengiriman pengumuman ke email
            // jika jalur test
            if ($cek->jalur == "test") {
                $url = 'https://daftar.persadakhatulistiwa.ac.id/login';
                $link = '<a href="' . $url . '">' . $url . '</a>';
                $message = '';
                $message .= '<strong>Pengumuman Penerimaan Calon Mahasiswa Baru STKIP Persada Khatulistiwa Tahun 2024 Jalur Tes Gelombang 3</strong><br><br>';
                $message .= '<strong> Nomor Pendaftaran : </strong>' . $cek->ref . '<br>';
                $message .= '<strong> Nama : </strong>' . $cek->nama_siswa . '<br>';
                $message .= '<strong> Status Penerimaan : </strong>' . $cek->keputusan_text . '<br>';
                $message .= '<strong> Ket. : </strong>' . $cek->note_penerimaan . '<br>';
                if ($periksa->status_penerimaan == "1") {
                    $message .= '<strong> Diterima pada Prodi : </strong>' . $cek->nama_prodi . '<br>';
                    $message .= '<strong> Catatan : </strong> Silahkan melakukan registrasi mulai dari dinyatakan lulus sampai dengan 30 Agustus 2024<br><br>';
                    // $message .= '<strong> Catatan : </strong> Silahkan melakukan registrasi mulai dari dinyatakan lulus sampai dengan 07 September 2024<br><br>';
                    $message .= '<strong> Biaya yang harus dibayar pada saat registrasi sebesar Rp. 7.500.000 dengan rincian:</strong><br>';
                    $message .= '<strong> 1. Uang Registrasi Rp.1.580.000</strong><br>';
                    $message .= '<strong> 2. Uang Pengembangan Kampus Rp.3.600.000</strong><br>';
                    $message .= '<strong> 3. SPP Tetap Per Semester Rp.2.320.000</strong><br><br>';
                    $message .= 'Pembayaran Registrasi  melalui Teller Bank KALBAR ke Nomor Rekening 4010006517 (BANK KALBAR) Atas Nama PRKMPULN BDN PEND KARYA BANGSA. 
                                        Tuliskan <strong>' . $cek->ref . '</strong> pada kolom berita di slip transfer bank. 
                                        Setelah Melakukan Pembayaran Upload Bukti Transaksi (Slip Bank / Struk ATM) ke Akun PMB serta melakukan 
                                        konfirmasi pembayaran via WA/SMS ke Nomor 082155964080 <strong>paling lama 2 x 24 jam setelah transaksi pembayaran dilakukan</strong>.<br>';
                    $message .= '<strong>Panitia hanya menerima pembayaran yang dilakukan melalui BANK KALBAR.</strong><br><br>';
                    $message .= '<strong>TIDAK DIPERKENANKAN TRANSAKSI MELALUI PIHAK KETIGA SEPERTI E-WALLET DAN LAIN SEBAGAINYA.</strong><br><br>';
                }
                $message .= '<strong>Untuk Login Silahkan klik: </strong> ' . $link;
            } else {
                $url = 'https://daftar.persadakhatulistiwa.ac.id/login';
                $link = '<a href="' . $url . '">' . $url . '</a>';
                $message = '';
                $message .= '<strong>Pengumuman Penerimaan Calon Mahasiswa Baru STKIP Persada Khatulistiwa Tahun 2024 Jalur Prestasi Gelombang 3</strong><br><br>';
                $message .= '<strong> Nomor Pendaftaran : </strong>' . $cek->ref . '<br>';
                $message .= '<strong> Nama : </strong>' . $cek->nama_siswa . '<br>';
                $message .= '<strong> Status Penerimaan : </strong>' . $cek->keputusan_text . '<br>';
                $message .= '<strong> Ket. : </strong>' . $cek->note_penerimaan . '<br>';
                if ($periksa->status_penerimaan == "1") {
                    $message .= '<strong> Diterima pada Prodi : </strong>' . $cek->nama_prodi . '<br>';
                    // $message .= '<strong> Catatan : </strong> Silahkan melakukan registrasi mulai dari dinyatakan lulus sampai dengan 07 September 2024<br><br>';
                    $message .= '<strong> Catatan : </strong> Silahkan melakukan registrasi mulai dari dinyatakan lulus sampai dengan 14 Agustus 2024<br><br>';
                    $message .= '<strong> Biaya yang harus dibayar pada saat registrasi sebesar Rp. 7.500.000 dengan rincian:</strong><br>';
                    $message .= '<strong> 1. Uang Registrasi Rp.1.580.000</strong><br>';
                    $message .= '<strong> 2. Uang Pengembangan Kampus Rp.3.600.000</strong><br>';
                    $message .= '<strong> 3. SPP Tetap Per Semester Rp.2.320.000</strong><br><br>';
                    $message .= 'Pembayaran Registrasi  melalui Teller Bank KALBAR ke Nomor Rekening 4010006517 (BANK KALBAR) Atas Nama PRKMPULN BDN PEND KARYA BANGSA. 
                                        Tuliskan <strong>' . $cek->ref . '</strong> pada kolom berita di slip transfer bank. 
                                        Setelah Melakukan Pembayaran Upload Bukti Transaksi (Slip Bank / Struk ATM) ke Akun 
                                        PMB serta melakukan konfirmasi pembayaran via WA/SMS ke Nomor 082155964080 <strong> paling lama 2 x 24 jam setelah transaksi pembayaran dilakukan</strong>.<br>';
                    $message .= '<strong>Panitia hanya menerima pembayaran yang dilakukan melalui BANK KALBAR.</strong><br><br>';
                    $message .= '<strong>TIDAK DIPERKENANKAN TRANSAKSI MELALUI PIHAK KETIGA SEPERTI E-WALLET DAN LAIN SEBAGAINYA.</strong><br><br>';
                }
                $message .= '<strong>Untuk Login Silahkan klik: </strong> ' . $link;
            }
            //	echo ($message); die();

            $this->load->library('email');
            $ci = get_instance();
            $config['protocol'] = "smtp";
            $config['smtp_host'] = "ssl://mail.stkippersada.ac.id";
            $config['smtp_port'] = "465";
            $config['smtp_user'] = "umum@stkippersada.ac.id";
            $config['smtp_pass'] = "S4mp4h53mua";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";
            $ci->email->initialize($config);
            $ci->email->from('umum@stkippersada.ac.id', 'Panitia PMB');
            $list = $cek->email_akun_siswa;
            // $list = 'herpanus2003@yahoo.co.id';
            // $list = 'iqbalmtgjr@gmail.com';
            $ci->email->to($list);
            $ci->email->subject('Pengumuman PMB STKIP Persada Khatulistiwa 2024');
            $ci->email->message($message);
            if (!$this->email->send()) {
                // $pesanerror = $this->email->print_debugger();
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Pengumuman gagal dikirim melalui email.</div>');
                // $this->session->set_flashdata('pesan', '<div class=""><button type="button" class="close" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>' . $pesanerror . '</div>');
                redirect('masterpmb/keputusan/' . $cek->pengenal_akun);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Pengumuman berhasil dikirim melalui email.</div>');
                redirect('masterpmb/testvalid');
            }
        } else {

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('beranda/index');
        }
    }

    public function lihatsiswa($id = 0)
    {
        $cek = $this->pmb->lihat($id);
        $data = array(
            'siswa' => $cek,
            'pmb' => 'index'
        );
        $prodiid = $cek->pilihan_satu;
        $data['prodi1'] = $this->pmb->ambil_satuprodi($prodiid)->row();
        $prodiid2 = $cek->pilihan_dua;
        $data['prodi2'] = $this->pmb->ambil_satuprodi($prodiid2)->row();
        $this->template->view('pmb/data-calon', $data);
    }
    
    public function bayar($id = 0)
    {
        $cekputus = $this->pmb->cekkeputusan($id);
        $data = array(
            'dnama' => $this->pmb->ambilsiswa($id),
            'alamat' => $id,
            'putus' => $cekputus,
            'gam' =>  $this->pmb->bilgam($id),
            'transak' => $this->pmb->ambiltransaksi($id),
            'bay' => $this->pmb->ambilBayarbukti($id),
            'pmb' => 'index',
            'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js')
        );
        $prodiid = $data['dnama']->pilihan_satu;
        $data['prodi1'] = $this->pmb->ambil_satuprodi($prodiid)->row();
        $prodiid2 = $data['dnama']->pilihan_dua;
        $data['prodi2'] = $this->pmb->ambil_satuprodi($prodiid2)->row();
        $this->template->view('pmb/bayar', $data);
    }
    public function validkan($das)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('beranda/index');
            }
            $tampung = $this->input->post(NULL, TRUE);
            $where1 = array('akun_siswa' => $tampung['id']);
            $datainputxx['valid_bayar'] = $tampung['sah'];
            $this->db->update('pmb_siswa', $datainputxx, $where1);
            $ccek = $this->pmb->cekuploadmisteri($das);
            if (empty($ccek)) {
                $gah = array();
                $gah['upload_id_siswa'] = $das;
                $this->db->insert('pmb_upload', $gah);
            }
            redirect('masterpmb/bayar/' . $das);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }

    public function hapus()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "46") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $tampung = $this->input->post(NULL, TRUE);
            $minyak = $tampung['maba_id'];
            //print_r($minyak); die;
            $unduh = $this->pmb->getUpload($minyak);

            if (!empty($unduh)) {
                if (!empty($unduh->foto_upload)) {
                    $path = '../pmb/pdf/' . $unduh->foto_upload;
                    $res = @unlink($path);
                }

                if (!empty($unduh->ijasah_upload)) {
                    $path = '../pmb/pdf/' . $unduh->ijasah_upload;
                    $res = @unlink($path);
                }

                if (!empty($unduh->skhu_upload)) {
                    $path = '../pmb/pdf/' . $unduh->skhu_upload;
                    $res = @unlink($path);
                }

                if (!empty($unduh->skkb_upload)) {
                    $path = '../pmb/pdf/' . $unduh->skkb_upload;
                    $res = @unlink($path);
                }

                if (!empty($unduh->kk_upload)) {
                    $path = '../pmb/pdf/' . $unduh->kk_upload;
                    $res = @unlink($path);
                }

                if (!empty($unduh->ket_lulus_upload)) {
                    $path = '../pmb/pdf/' . $unduh->ket_lulus_upload;
                    $res = @unlink($path);
                }

                if (!empty($unduh->pembayaran_upload)) {
                    $path = '../pmb/pdf/' . $unduh->pembayaran_upload;
                    $res = @unlink($path);
                }

                if (!empty($unduh->semes_satu)) {
                    $path = '../pmb/pdf/' . $unduh->semes_satu;
                    $res = @unlink($path);
                }

                if (!empty($unduh->semes_dua)) {
                    $path = '../pmb/pdf/' . $unduh->semes_dua;
                    $res = @unlink($path);
                }

                if (!empty($unduh->semes_tiga)) {
                    $path = '../pmb/pdf/' . $unduh->semes_tiga;
                    $res = @unlink($path);
                }

                if (!empty($unduh->semes_empat)) {
                    $path = '../pmb/pdf/' . $unduh->semes_empat;
                    $res = @unlink($path);
                }

                if (!empty($unduh->semes_lima)) {
                    $path = '../pmb/pdf/' . $unduh->semes_lima;
                    $res = @unlink($path);
                }
            }
            $this->pmb->hapussiswa($minyak);
            $referred_from = $this->session->userdata('referred_from');
            redirect($referred_from, 'refresh');
        } else {

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function pdflihat($id = 0)
    {
        $this->load->helper('tgl');

        //$dat = $this->session->userdata();
        //print_r($dat); die;
        $pdk = $this->pmb->lihat($id);
        //print_r($pdk); die;
        $data = array(
            'title' => "Data Pendaftaran Calon Mahasiswa",
            'warga' => $pdk
        );
        $prodiid = $pdk->pilihan_satu;
        $data['prodi1'] = $this->pmb->ambil_satuprodi($prodiid)->row();
        $prodiid2 = $pdk->pilihan_dua;
        $data['prodi2'] = $this->pmb->ambil_satuprodi($prodiid2)->row();

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfa4', $data, true);
        $filename = $pdk->ref . '-' . $pdk->jalur;
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfprestasi1()
    {
        $this->load->helper('tgl');

        //$dat = $this->session->userdata();
        //print_r($dat); die;
        $pdk = $this->pmb->lihatprestasi1();
        //print_r($pdk); die;
        $data = array(
            'title' => "Calon Mahasiswa Jalur Prestasi Gelombang I",
            'warga' => $pdk,
            'gelom' => "1"
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfprestasi', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Prestasi';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfprestasi2()
    {
        $this->load->helper('tgl');

        //$dat = $this->session->userdata();
        //print_r($dat); die;
        $pdk = $this->pmb->lihatprestasi2();
        //print_r($pdk); die;
        $data = array(
            'title' => "Calon Mahasiswa Jalur Prestasi Gelombang II",
            'warga' => $pdk,
            'gelom' => "2"
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfprestasi', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Prestasi';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfprestasi()
    {
        $this->load->helper('tgl');

        //$dat = $this->session->userdata();
        //print_r($dat); die;
        $pdk = $this->pmb->lihatprestasi();
        //print_r($pdk); die;
        $data = array(
            'title' => "Data Pendaftaran Calon Mahasiswa Jalur Prestasi",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfprestasi', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Prestasi';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfkeputusan()
    {
        $this->load->helper('tgl');

        //$dat = $this->session->userdata();
        //print_r($dat); die;
        $pdk = $this->pmb->putusprestasi();
        //print_r($pdk); die;
        $data = array(
            'title' => "Data Pendaftaran Calon Mahasiswa Jalur Prestasi",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfkeputusan', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Prestasi';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfsk($jalur = "", $gelombang = "")
    {
        $this->load->helper('tgl');

        //$dat = $this->session->userdata();
        //print_r($dat); die;
        $pbsi = $this->pmb->pdfsk();
        $mat = $this->pmb->pdfsk_mat();
        $ekonomi = $this->pmb->pdfsk_ekonomi();
        $ppkn = $this->pmb->pdfsk_ppkn();
        $komputer = $this->pmb->pdfsk_komputer();
        $biologi = $this->pmb->pdfsk_biologi();
        $paud = $this->pmb->pdfsk_paud();
        $inggris = $this->pmb->pdfsk_inggris();
        $pgsd = $this->pmb->pdfsk_pgsd();

        $tahun_skrng = date("Y", time());
        $tahuntambah1 = $tahun_skrng + 1;
        $tahun_akademik = "$tahun_skrng/$tahuntambah1";

        $jadwal_regis_gel1 = $this->pmb->jadwal_regis_gel1()->regi;
        $jadwal_regis_gel2 = $this->pmb->jadwal_regis_gel2()->regi;
        $jadwal_regis_gel3 = $this->pmb->jadwal_regis_gel3()->regi;

        $data = array(
            'title' => "SURAT KEPUTUSAN <br> KETUA STKIP PERSADA KHATULISTIWA SINTANG <br> Nomor : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",
            'pbsi' => $pbsi,
            'mat' => $mat,
            'ekonomi' => $ekonomi,
            'ppkn' => $ppkn,
            'komputer' => $komputer,
            'biologi' => $biologi,
            'paud' => $paud,
            'inggris' => $inggris,
            'pgsd' => $pgsd,
            'tahun_skrng' => $tahun_skrng,
            'tahun_akademik' => $tahun_akademik,
            'jadwal_regis_gel1' => $jadwal_regis_gel1,
            'jadwal_regis_gel2' => $jadwal_regis_gel2,
            'jadwal_regis_gel3' => $jadwal_regis_gel3,
        );


        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfsk', $data, true);
        $filename = 'Surat Keputusan PMB ' . $tahun_skrng;
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfkeputusan1()
    {
        $this->load->helper('tgl');

        //$dat = $this->session->userdata();
        //print_r($dat); die;
        $pdk = $this->pmb->putusprestasi1();
        //print_r($pdk); die;
        $data = array(
            'title' => "Keputusan Penerimaan PMB Jalur Prestasi Tahun 2022 <br> program studi Pendidikan
Guru Sekolah
Dasar
",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfkeputusan', $data, true);
        $filename = 'Keputusan PMB 2022 Jalur Prestasi Gel I';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfkeputusan2()
    {
        $this->load->helper('tgl');

        //$dat = $this->session->userdata();
        //print_r($dat); die;
        $pdk = $this->pmb->putusprestasi2();
        //print_r($pdk); die;
        $data = array(
            'title' => "Keputusan Penerimaan Jalur Prestasi Gelombang II",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfkeputusan', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Prestasi';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfkeputusanweb2()
    {
        $this->load->helper('tgl');
        $pdk = $this->pmb->putusprestasi2();
        $data = array(
            'title' => "Keputusan Penerimaan Jalur Prestasi Gelombang II",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfweb', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Prestasi';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfkeputusanhp2()
    {
        $this->load->helper('tgl');
        $pdk = $this->pmb->putusprestasi2();
        $data = array(
            'title' => "Keputusan Penerimaan Jalur Prestasi Gelombang II",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfhpkep2', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Prestasi';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfkeputusanweb1()
    {
        $this->load->helper('tgl');
        $pdk = $this->pmb->putusprestasi1();
        $data = array(
            'title' => "Keputusan Penerimaan Jalur Prestasi Gelombang I",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfweb', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Prestasi';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfkeputusanhp1()
    {
        $this->load->helper('tgl');
        $pdk = $this->pmb->putusprestasi1();
        $data = array(
            'title' => "Keputusan Penerimaan Jalur Prestasi Gelombang I",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfhpkep2', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Prestasi';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfputustest()
    {
        $this->load->helper('tgl');

        //$dat = $this->session->userdata();
        //print_r($dat); die;
        $pdk = $this->pmb->putustest();
        //print_r($pdk); die;
        $data = array(
            'title' => "Keputusan Penerimaan MABA Jalur Tes Gelobang 1",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdf-keputusan-test', $data, true);
        $filename = 'Keputusan Penerimaan MABA Jalur Tes Gelombang 1';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdftest()
    {
        $this->load->helper('tgl');

        //$dat = $this->session->userdata();
        //print_r($dat); die;
        $pdk = $this->pmb->lihattest();
        //print_r($pdk); die;
        $data = array(
            'title' => "Data Pendaftaran Calon Mahasiswa Jalur Tes",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdftest', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Tes';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function pdftestvalid()
    {
        $this->load->helper('tgl');

        $pdk = $this->pmb->lihattestvalid();
        $data = array(
            'title' => "Data Pendaftaran Calon Mahasiswa Jalur Tes Valid",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdftest', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Tes Valid';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function pdfpresvalid()
    {
        $this->load->helper('tgl');

        $pdk = $this->pmb->lihatpresvalid();
        $data = array(
            'title' => "Data Pendaftaran Calon Mahasiswa Jalur Prestasi Valid",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdftest', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Prestasi Valid';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function pdfmetodebayarprestasi($gel = '')
    {
        $this->load->helper('tgl');

        $pdk = $this->pmb->lihatpresvalid($gel);
        $data = array(
            'title' => "Data Metode Bayar Pendaftaran CAMABA Jalur Prestasi Valid",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfmetodebayar', $data, true);
        $filename = 'Data Metode Bayar Pendaftaran CAMABA Jalur Prestasi Valid';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function pdfprestasivalid($gel = '')
    {
        $this->load->helper('tgl');

        $pdk = $this->pmb->lihatpresvalid($gel);
        $data = array(
            'title' => "Data Pendaftaran Calon Mahasiswa Jalur Prestasi Valid",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfpresvalid', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Prestasi Valid';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }


    public function pdfmetodebayartest($gel = '')
    {
        $this->load->helper('tgl');

        $pdk = $this->pmb->lihattestvalid($gel);
        $data = array(
            'title' => "Data Metode Bayar Pendaftaran CAMABA Jalur Tes Valid",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdfmetodebayar', $data, true);
        $filename = 'Data Metode Bayar Pendaftaran CAMABA Jalur Tes Valid';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function pdftesvalid($gel = '')
    {
        $this->load->helper('tgl');

        $pdk = $this->pmb->lihattestvalid($gel);
        $data = array(
            'title' => "Data Pendaftaran Calon Mahasiswa Jalur Tes Valid",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('pmb/pdftesvalid', $data, true);
        $filename = 'Data Pendaftaran Calon Mahasiswa Jalur Tes Valid';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function formtambahan($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "54" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            // if ($this->session->userdata('pangkat_simkeu') == "user") {
            //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            //     redirect('pengguna/profil');
            // }

            $sis = $this->pmb->ambilsiswa($byid);
            $jalur = $this->pmb->ambilprod($byid);

            $this->load->library('form_validation');

            $this->form_validation->set_rules(
                'gelombang',
                'Gelombang',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'jalur',
                'Jalur',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'metode_bayar',
                'Metode Bayar',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );

            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if ($this->form_validation->run() == FALSE) {

                $data = array(
                    'siswa' => $sis,
                    'calon' => 'formcalon',
                    'js' => array('plugins/daterangepicker/daterangepicker.js', 'plugins/moment/moment.min.js', 'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', 'assets/pickertgl.js', 'plugins/select2/js/select2.full.min.js', 'assets/select.js'),
                    'css' => array('plugins/daterangepicker/daterangepicker.css', 'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css', 'plugins/select2/css/select2.min.css'),
                );
                $this->template->view('pmb/data-tambahan', $data);
            } else {
                $datacalon = $this->input->post(NULL, TRUE);
                $datasis = array(
                    'metode_bayar' => $datacalon['metode_bayar'],
                );
                $datagel = array(
                    'gelombang' => $datacalon['gelombang'],
                );
                $datajal = array(
                    'jalur' => $datacalon['jalur'],
                );

                // $where = array(
                //     'akun_siswa' => $byid
                // );

                $metbay = $this->db->update('pmb_siswa', $datasis, ['akun_siswa' => $byid]);
                $gel = $this->db->update('pmb_akun', $datagel, ['pengenal_akun' => $byid]);
                $jal = $this->db->update('pmb_prodi', $datajal, ['prodi_id_siswa' => $byid]);

                if ($metbay || $gel || $jal) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Simpan data berhasil.</div>');
                    redirect('masterpmb/formtambahan/' . $byid);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan data gagal.</div>');
                    redirect('masterpmb/formtambahan/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('beranda/index');
        }
    }

    public function formcalon($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }

            $sis = $this->pmb->ambilbyid($byid);
            $jalur = $this->pmb->ambilprod($byid);

            $this->load->library('form_validation');

            $this->form_validation->set_rules(
                'nik',
                'NIK',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!'
                )
            );

            $this->form_validation->set_rules(
                'nis',
                'NISN',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!'
                )
            );

            $this->form_validation->set_rules(
                'jekel',
                'Jenis Kelamin',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'tempat_lahir',
                'Tempat Lahir',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'tgl',
                'Tanggal Lahir',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'agama',
                'Agama',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'desa',
                'Desa',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'kec',
                'Kecamatan',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'kab',
                'Kabupaten',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'hp',
                'No HP',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );

            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if ($this->form_validation->run() == FALSE) {

                $data = array(
                    'siswa' => $sis,
                    'calon' => 'formcalon',
                    'js' => array('plugins/daterangepicker/daterangepicker.js', 'plugins/moment/moment.min.js', 'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', 'assets/pickertgl.js', 'plugins/select2/js/select2.full.min.js', 'assets/select.js'),
                    'css' => array('plugins/daterangepicker/daterangepicker.css', 'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css', 'plugins/select2/css/select2.min.css'),
                );
                $this->template->view('pmb/identitas-calon', $data);
            } else {
                $datacalon = $this->input->post(NULL, TRUE);
                $tgl_lahir = $datacalon['tgl'];
                $dateParts = explode('/', $tgl_lahir); // Pisahkan menjadi array [dd, mm, yyyy]
                $format_tgl_lahir = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];
                // print_r($format_tgl_lahir);die;
                
                $datamasuk = array(
                    'nik_siswa' => $datacalon['nik'],
                    'nis_siswa' => $datacalon['nis'],
                    'tmp_lahir_siswa' => $datacalon['tempat_lahir'],
                    'tgl_lahir_siswa' => $format_tgl_lahir,
                    'jekel_siswa' => $datacalon['jekel'],
                    'agama_siswa' => $datacalon['agama'],
                    'alamat_siswa' => $datacalon['alamat'],
                    'dusun_siswa' => $datacalon['dusun'],
                    'rtrw_siswa' => $datacalon['rt'],
                    'desa_siswa' => $datacalon['desa'],
                    'kec_siswa' => $datacalon['kec'],
                    'kab_siswa' => $datacalon['kab'],
                    'pos_siswa' => $datacalon['pos'],
                    'hp_siswa' => $datacalon['hp'],
                    'jenis_tiggal_siswa' => $datacalon['jenis_tinggal'],
                    'transpot_siswa' => $datacalon['transpot'],
                    'kps_siswa' => $datacalon['no_kps'],
                );

                $where = array(
                    'akun_siswa' => $byid
                );
                $res = $this->db->update('pmb_siswa', $datamasuk, $where);
                if ($res) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Simpan data berhasil.</div>');
                    redirect('masterpmb/formcalon/' . $byid);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan data gagal.</div>');
                    redirect('masterpmb/formcalon/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('beranda/index');
        }
    }
    function formpendidikan($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "53") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('beranda/index');
            }

            $penakhir = $this->pmb->ambilpendidik($byid);
            $sis = $this->pmb->ambilbyid($byid);
            $jalur = $this->pmb->ambilprod($byid);


            if ($jalur->jalur != "test") {
                redirect('masterpmb/formpendidikanpmdk/' . $byid);
            }


            $this->load->library('form_validation');

            $this->form_validation->set_rules(
                'sekolah',
                'Sekolah Asal',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!'
                )
            );
            $this->form_validation->set_rules(
                'nama_sklh',
                'Nama Sekolah',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'alamat_sklh',
                'Alamat Sekolah',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'jurusan',
                'Jurusan',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'thl',
                'Tahun Lulus',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );


            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'siswa' => $sis,
                    'penakhir' => $penakhir,
                    'calon' => 'formpendidikan'
                );
                $this->template->view('pmb/pend-terakhir', $data);
            } else {
                $datapen = $this->input->post(NULL, TRUE);
                //print_r($datapen); die;
                $pendidikan = array(
                    'jenis_sekolah' =>  $datapen['sekolah'],
                    'nama_sekolah' =>  $datapen['nama_sklh'],
                    'alamat_sekolah' =>  $datapen['alamat_sklh'],
                    'jurusan_sekolah' =>  $datapen['jurusan'],
                    'tahun_lulus_sekolah' =>  $datapen['thl'],
                    'skhun_sekolah' =>  $datapen['n_skun'],
                    'ijasah_sekolah' =>  $datapen['n_ijazah']
                );

                $where = array(
                    'sekolah_id_siswa' => $byid
                );
                $res = $this->db->update('pmb_sekolah', $pendidikan, $where);

                if ($res) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Simpan data berhasil.</div>');
                    redirect('masterpmb/formpendidikan/' . $byid);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan data gagal.</div>');
                    redirect('masterpmb/formpendidikan/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    function formpendidikanpmdk($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "53") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }

            $penakhir = $this->pmb->ambilpendidik($byid);

            $sis = $this->pmb->ambilbyid($byid);
            $jalur = $this->pmb->ambilprod($byid);

            if ($jalur->jalur != "prestasi") {
                redirect('masterpmb/formpendidikan/' . $byid);
            }

            $this->load->library('form_validation');

            $this->form_validation->set_rules(
                'sekolah',
                'Sekolah Asal',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!'
                )
            );
            $this->form_validation->set_rules(
                'nama_sklh',
                'Nama Sekolah',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'alamat_sklh',
                'Alamat Sekolah',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'jurusan',
                'Jurusan',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'thl',
                'Tahun Lulus',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );


            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'siswa' => $sis,
                    'penakhir' => $penakhir,
                    'calon' => 'formpendidikanpmdk'
                );
                $this->template->view('pmb/pendidikan-pmdk', $data);
            } else {
                $datapen = $this->input->post(NULL, TRUE);
                $pendidikan = array(
                    'jenis_sekolah' =>  $datapen['sekolah'],
                    'nama_sekolah' =>  $datapen['nama_sklh'],
                    'alamat_sekolah' =>  $datapen['alamat_sklh'],
                    'jurusan_sekolah' =>  $datapen['jurusan'],
                    'tahun_lulus_sekolah' =>  $datapen['thl'],
                    'skhun_sekolah' =>  $datapen['n_skun'],
                    'ijasah_sekolah' =>  $datapen['n_ijazah'],
                    'nilai_satu' =>  $datapen['smt1'],
                    'nilai_dua' =>  $datapen['smt2'],
                    'nilai_tiga' =>  $datapen['smt3'],
                    'nilai_empat' =>  $datapen['smt4'],
                    'nilai_lima' =>  $datapen['smt5'],
                );

                if (!empty($penakhir)) {
                    $where = array(
                        'sekolah_id_siswa' => $byid
                    );
                    $res = $this->db->update('pmb_sekolah', $pendidikan, $where);
                } else {
                    $pendidikan['sekolah_id_siswa'] = $byid;
                    $res = $this->db->insert('pmb_sekolah', $pendidikan);
                }

                if ($res) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Simpan data berhasil.</div>');
                    redirect('masterpmb/formpendidikanpmdk/' . $byid);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan data gagal.</div>');
                    redirect('masterpmb/formpendidikanpmdk/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function formprodi($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "54") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }

            $penakhir = $this->pmb->ambilprod($byid);
            $info = $this->pmb->ambilinfo($byid);
            $sis = $this->pmb->ambilbyid($byid);

            $this->load->library('form_validation');

            $this->form_validation->set_rules(
                'prodi1',
                'Pilihan Prodi 1',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!'
                )
            );
            $this->form_validation->set_rules(
                'prodi2',
                'Pilihan Prodi 2',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );


            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'siswa' => $sis,
                    'calon' => 'formprodi',
                    'info' => $info,
                    'anjai' => $penakhir,
                    'prodi1' => $this->pmb->ambil_prodi()->result(),
                    'prodi2' => $this->pmb->ambil_prodi()->result()
                );
                $this->template->view('pmb/pilihan-prodi', $data);
            } else {
                $data = $this->input->post(NULL, TRUE);
                $prodidata = array(
                    'pilihan_satu' =>  $data['prodi1'],
                    'pilihan_dua' => $data['prodi2']
                );
                $datainfo = array(
                    'nama_informan' => $data['nama_ip'],
                    'no_hp' => $data['no_hp'],
                    'media_info' => $data['media']
                );
                $res = 0;
                $where = array(
                    'prodi_id_siswa' => $byid
                );
                $res += $this->db->update('pmb_prodi', $prodidata, $where);

                if (!empty($info->info_siswa_akun)) {
                    $where1 = array(
                        'info_siswa_akun' => $byid
                    );
                    $res += $this->db->update('pmb_info', $datainfo, $where1);
                } else {
                    $datainfo['info_siswa_akun'] = $byid;
                    $res += $this->db->insert('pmb_info', $datainfo);
                }

                if ($res > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Simpan data berhasil.</div>');
                    redirect('masterpmb/formprodi/' . $byid);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan data gagal.</div>');
                    redirect('masterpmb/formprodi/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function keputusan($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "47" || $this->session->userdata('pengguna_id_simkeu') == "49") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }

            $kepus = $this->pmb->ambilkepus($byid);
            $sis = $this->pmb->ambilsiswa($byid);


            $this->load->library('form_validation');

            $this->form_validation->set_rules(
                'putus',
                'Keputusan',
                'trim|required',
                array(
                    'required'      => '%s belum ditentukan!'
                )
            );
            $this->form_validation->set_rules(
                'terima',
                'Prodi',
                'trim|required',
                array(
                    'required'      => '%s yang diterima belum dipilih!',
                )
            );


            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if ($this->form_validation->run() == FALSE) {
                $useridmood = $this->pmb->ambilMood($sis->email_akun_siswa);
                if (!empty($useridmood)) {
                    $nilaicalon = $this->pmb->ambilGrade($useridmood->id);
                    $tanya = $this->pmb->ambilEssay($useridmood->id);
                } else {
                    $nilaicalon = '';
                    $tanya = '';
                }

                $data = array(
                    'siswa' => $sis,
                    'kepus' => $kepus,
                    'nilai' => $nilaicalon,
                    'essay' => $tanya,
                    'bank' => 'testbank',
                    'prodi1' => $this->pmb->ambil_satuprodi($sis->pilihan_satu)->row(),
                    'prodi2' => $this->pmb->ambil_satuprodi($sis->pilihan_dua)->row()

                );

                $this->template->view('pmb/keputusan', $data);
            } else {

                $data = $this->input->post();
                $gudang = array(
                    'status_penerimaan' => $data['putus'],
                    'prodi_penerimaan' => $data['terima'],
                    'note_penerimaan' => $data['catat']
                );
                if (!empty($kepus->siswa_penerimaan)) {
                    $where = array(
                        'siswa_penerimaan' => $data['idsiswa']
                    );
                    $res = $this->db->update('pmb_penerimaan', $gudang, $where);
                } else {
                    $gudang['siswa_penerimaan'] = $data['idsiswa'];
                    $res = $this->db->insert('pmb_penerimaan', $gudang);
                }

                if ($res > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Simpan data berhasil.</div>');
                    redirect('masterpmb/keputusan/' . $byid);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan data gagal.</div>');
                    redirect('masterpmb/keputusan/' . $byid);
                }
            }
        } else {

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function formortu($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }


            $ortu = $this->pmb->ambilortu($byid);
            $sis = $this->pmb->ambilbyid($byid);

            $this->load->library('form_validation');

            $this->form_validation->set_rules(
                'nik_ay',
                'NIK',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!'
                )
            );

            $this->form_validation->set_rules(
                'nama_ay',
                'Nama',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );

            $this->form_validation->set_rules(
                'tempat_lahir_ay',
                'Tempat Lahir',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'tglay',
                'Tanggal Lahir',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'alamatay',
                'Alamat ',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'no_ay',
                'Nomor HP',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'pg_ay',
                'Penghasilan',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'nik_ib',
                'NIK',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!'
                )
            );

            $this->form_validation->set_rules(
                'nama_ib',
                'Nama',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );

            $this->form_validation->set_rules(
                'tempat_lahir_ib',
                'Tempat Lahir',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'tgl_ib',
                'Tanggal Lahir',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'alamat_ib',
                'Alamat ',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'no_hpib',
                'Nomor HP',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );
            $this->form_validation->set_rules(
                'pg_ib',
                'Penghasilan',
                'trim|required',
                array(
                    'required'      => '%s tidak boleh kosong!',
                )
            );


            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'siswa' => $sis,
                    'ortu' => $ortu,
                    'calon' => 'formortu',
                    'js' => array('plugins/daterangepicker/daterangepicker.js', 'plugins/moment/moment.min.js', 'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', 'assets/pickertgl.js', 'plugins/select2/js/select2.full.min.js', 'assets/select.js'),
                    'css' => array('plugins/daterangepicker/daterangepicker.css', 'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css', 'plugins/select2/css/select2.min.css'),
                );
                // echo '<pre>';print_r($byid);die;
                $this->template->view('pmb/identitas-ortu', $data);
            } else {
                $dataibu = $this->input->post(NULL, TRUE);
                $datamasuk = array(
                    'nik_ayah' => $dataibu['nik_ay'],
                    'nama_ayah' => $dataibu['nama_ay'],
                    'tmp_lahir_ayah' => $dataibu['tempat_lahir_ay'],
                    'tgl_lahir_ayah' => $dataibu['tglay'],
                    'alamat_ayah' => $dataibu['alamatay'],
                    'pekerjaan_ayah' => $dataibu['pekerjaan_ay'],
                    'pendidikan_ayah' => $dataibu['pendidikan_ay'],
                    'hp_ayah' => $dataibu['no_ay'],
                    'npwp_ayah' => $dataibu['npwp_ay'],
                    'penghasilan_ayah' => $dataibu['pg_ay'],

                    'nik_ibu' => $dataibu['nik_ib'],
                    'nama_ibu' => $dataibu['nama_ib'],
                    'tmp_lahir_ibu' => $dataibu['tempat_lahir_ib'],
                    'tgl_lahir_ibu' => $dataibu['tgl_ib'],
                    'alamat_ibu' => $dataibu['alamat_ib'],
                    'pekerjaan_ibu' => $dataibu['pjk_ib'],
                    'pendidikan_ibu' => $dataibu['pp_ibu'],
                    'hp_ibu' => $dataibu['no_hpib'],
                    'npwp_ibu' => $dataibu['npwpib'],
                    'penghasilan_ibu' => $dataibu['pg_ib']
                );
                $datawali = array(
                    'nik_wali' => $dataibu['nik_wl'],
                    'nama_wali' => $dataibu['nama_wl'],
                    'tmp_lahir_wali' => $dataibu['tempat_lahir_wl'],
                    'tgl_lahir_wali' => $dataibu['tgl_wl'],
                    'alamat_wali' => $dataibu['alamat_wl'],
                    'kerja_wali' => $dataibu['pekerjaan_wl'],
                    'hp_wali' => $dataibu['hp_wl'],
                    'npwp_wali' => $dataibu['npwp_wl'],
                    'penghasil_wali' => $dataibu['pg_wl']
                );
                $res = 0;
                if (!empty($ortu->ortu_pengenal_siswa)) {
                    $where = array(
                        'ortu_pengenal_siswa' => $byid
                    );
                    $res += $this->db->update('pmb_ortu', $datamasuk, $where);
                } else {
                    $datamasuk['ortu_pengenal_siswa'] = $byid;
                    $res += $this->db->insert('pmb_ortu', $datamasuk);
                }



                if (!empty($ortu->wali_akun_siswa)) {
                    $where = array(
                        'wali_akun_siswa' => $byid
                    );
                    $res += $this->db->update('pmb_wali', $datawali, $where);
                } else {
                    $datawali['wali_akun_siswa'] = $byid;
                    $res += $this->db->insert('pmb_wali', $datawali);
                }
                if ($res > 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Simpan data berhasil.</div>');
                    redirect('masterpmb/formortu/' . $byid);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan data gagal.</div>');
                    redirect('masterpmb/formortu/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function formupload($byid = 0)
    {


        $jalur = $this->pmb->ambilprod($byid);
        $bilgam =  $this->pmb->bilgam($byid);

        $data = array(
            'gam'   => $bilgam,
            'alamat' => $byid,
            'jalur' => $jalur,
            'calon' => 'formupload',
            'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
        );
        $this->template->view('pmb/file-upload', $data);
    }
    public function foto($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }

            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'formupload',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/foto/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '3048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_foto', $error);
                redirect('masterpmb/formupload/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->foto_upload)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/foto/' . $bilgam->foto_upload;
                        $res = @unlink($path);
                    }
                    $input_data['foto_upload'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/formupload/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['foto_upload'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/formupload/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function ijasah($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }

            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'formupload',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_ijasah', $error);
                redirect('masterpmb/formupload/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->ijasah_upload)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $bilgam->ijasah_upload;
                        $res = @unlink($path);
                    }
                    $input_data['ijasah_upload'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/formupload/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['ijasah_upload'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/formupload/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function skhu($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'formupload',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_skhu', $error);
                redirect('masterpmb/formupload/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->skhu_upload)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $bilgam->skhu_upload;
                        $res = @unlink($path);
                    }
                    $input_data['skhu_upload'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/formupload/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['skhu_upload'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/formupload/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function skkb($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'formupload',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_skkb', $error);
                redirect('masterpmb/formupload/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->skkb_upload)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $bilgam->skkb_upload;
                        $res = @unlink($path);
                    }
                    $input_data['skkb_upload'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/formupload/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['skkb_upload'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/formupload/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function kk($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'formupload',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_kk', $error);
                redirect('masterpmb/formupload/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->kk_upload)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $bilgam->kk_upload;
                        $res = @unlink($path);
                    }
                    $input_data['kk_upload'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/formupload/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['kk_upload'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/formupload/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function ktp($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'formupload',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_ktp', $error);
                redirect('masterpmb/formupload/' . $byid);
            } else {
                $inputan = $this->input->post();
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->ktp_upload)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $bilgam->ktp_upload;
                        $res = @unlink($path);
                    }
                    $input_data['ktp_upload'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/formupload/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['ktp_upload'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/formupload/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function akta_lahir($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'formupload',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_akta', $error);
                redirect('masterpmb/formupload/' . $byid);
            } else {
                $inputan = $this->input->post();
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->akta_lahir_upload)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $bilgam->akta_lahir_upload;
                        $res = @unlink($path);
                    }
                    $input_data['akta_lahir_upload'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/formupload/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['akta_lahir_upload'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/formupload/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function ketlulus($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'formupload',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_lulus', $error);
                redirect('masterpmb/formupload/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->ket_lulus_upload)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $bilgam->ket_lulus_upload;
                        $res = @unlink($path);
                    }
                    $input_data['ket_lulus_upload'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/formupload/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['ket_lulus_upload'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/formupload/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function buktibayartest($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'formupload',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_lulus', $error);
                redirect('masterpmb/formupload/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->pembayaran_upload)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/' . $bilgam->pembayaran_upload;
                        $res = @unlink($path);
                    }
                    $input_data['pembayaran_upload'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/formupload/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['pembayaran_upload'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/formupload/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function buktibayartest1($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'formupload',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js')
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_bukti', $error);
                redirect('masterpmb/bayar/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->pembayaran_upload)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/' . $bilgam->pembayaran_upload;
                        $res = @unlink($path);
                    }
                    $input_data['pembayaran_upload'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/bayar/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['pembayaran_upload'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/bayar/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function datasemester($byid = 0)
    {


        $sis = $this->pmb->ambilbyid($byid);
        $jalur = $this->pmb->ambilprod($byid);

        $bilgam =  $this->pmb->bilgam($byid);
        $penakhir = $this->pmb->ambilpendidik($byid);
        $data = array(
            'nilai' => $penakhir,
            'alamat' => $byid,
            'gam'   => $bilgam,
            'calon' => 'datacalon',
            'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js')
        );
        $this->template->view('pmb/upload-smester', $data);
    }

    public function semessatu($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'datacalon',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_semessatu', $error);
                redirect('masterpmb/datasemester/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->semes_satu)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/' . $bilgam->semes_satu;
                        $res = @unlink($path);
                    }
                    $input_data['semes_satu'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/datasemester/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['semes_satu'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/datasemester/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }

    public function semesdua($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'datacalon',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_semesdua', $error);
                redirect('masterpmb/datasemester/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->semes_dua)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/' . $bilgam->semes_dua;
                        $res = @unlink($path);
                    }
                    $input_data['semes_dua'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/datasemester/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['semes_dua'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/datasemester/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function semestiga($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'datacalon',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_semestiga', $error);
                redirect('masterpmb/datasemester/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->semes_tiga)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/' . $bilgam->semes_tiga;
                        $res = @unlink($path);
                    }
                    $input_data['semes_tiga'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/datasemester/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['semes_tiga'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/datasemester/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function semesempat($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'datacalon',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_semesempat', $error);
                redirect('masterpmb/datasemester/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->semes_empat)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/' . $bilgam->semes_empat;
                        $res = @unlink($path);
                    }
                    $input_data['semes_empat'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/datasemester/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['semes_empat'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/datasemester/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function semeslima($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('pengguna/profil');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'datacalon',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_semeslima', $error);
                redirect('masterpmb/datasemester/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->semes_lima)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/rapor/' . $bilgam->semes_lima;
                        $res = @unlink($path);
                    }
                    $input_data['semes_lima'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/datasemester/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['semes_lima'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/datasemester/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function piagam($byid = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "55" || $this->session->userdata('pengguna_id_simkeu') == "56" || $this->session->userdata('pengguna_id_simkeu') == "57" || $this->session->userdata('pengguna_id_simkeu') == "58" || $this->session->userdata('pengguna_id_simkeu') == "59") {

            if ($this->session->userdata('pangkat_simkeu') == "user") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
                redirect('beranda/index');
            }
            $bilgam =  $this->pmb->bilgam($byid);
            $data = array(
                'calon' => 'datacalon',
                'gam'   => $bilgam,
                'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
            );
            $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/';
            $config['allowed_types'] = 'jpg|jpeg|pdf';
            $config['max_size'] = '5048';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors('<p class="text-danger">', '</p>');
                $this->session->set_flashdata('error_piagam', $error);
                redirect('masterpmb/datasemester/' . $byid);
            } else {
                $inputan = $this->input->post(NULL, TRUE);
                $namafile = $this->upload->data('file_name');
                $input_data = array();
                if (!empty($bilgam)) {
                    if (!empty($bilgam->semes_lima)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/file_berkas/' . $bilgam->piagam;
                        $res = @unlink($path);
                    }
                    $input_data['piagam'] = $namafile;
                    $where = array('upload_id_siswa' => $byid);
                    $this->db->update('pmb_upload', $input_data, $where);
                    redirect('masterpmb/datasemester/' . $byid);
                } else {
                    $input_data['upload_id_siswa'] = $byid;
                    $input_data['piagam'] = $namafile;
                    $this->db->insert('pmb_upload', $input_data);
                    redirect('masterpmb/datasemester/' . $byid);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Anda tidak punya hak akses.</div>');
            redirect('beranda/index');
        }
    }
    public function regvalid()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "51") {
            $this->load->model('mbank', 'bank');
            $this->load->library('pagination');
            $config['base_url'] = base_url('masterpmb/regvalid/');
            $config['total_rows'] = $this->bank->total_userregis();
            $config['per_page'] = 10;
            $config["num_links"] = 1;
            $config['first_link']       = '<<';
            $config['last_link']        = '>>';
            $config['next_link']        = '>';
            $config['prev_link']        = '<';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center pagination-sm">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';
            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['user'] = $this->bank->get_regis_bayar($config["per_page"], $data['page'])->result();
            $data['pagination'] = $this->pagination->create_links();
            $data['hasil'] = $this->bank->total_userregis();
            $data['pmb'] = 'regisval';
            //print_r($data['hasil']); die;

            $this->template->view('pmb/tbl-regis', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function pdfregisxx()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "51") {
            $this->load->helper('tgl');
            $this->load->model('mbank', 'bank');
            $pdk = $this->bank->pdf_regis();
            $data = array(
                'title' => "Daftar Registrasi Mahasiswa",
                'warga' => $pdk,
                'pbsi' => $this->bank->pdf_regis_pbsi(),
                'pmat' => $this->bank->pdf_regis_pmat(),
                'pek' => $this->bank->pdf_regis_pek(),
                'pkn' => $this->bank->pdf_regis_pkn(),
                'pkom' => $this->bank->pdf_regis_pkom(),
                'pbio' => $this->bank->pdf_regis_pbio(),
                'paud' => $this->bank->pdf_regis_paud(),
                'pbi' => $this->bank->pdf_regis_pbi(),
                'pgsd' => $this->bank->pdf_regis_pgsd()
            );
            $this->load->library('pdfgenerator1');
            $html = $this->load->view('pmb/pdfregis', $data, true);
            $filename = 'daftar-transaksi-valid';
            $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function testbank()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "51") {
            $this->load->model('mbank', 'bank');
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/test_bank.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'pmb' => 'testbank'
            );
            $this->template->view('pmb/tbl-testbank', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function test_bank_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "51") {
            $this->load->model('mbank', 'bank');
            $dutu = $this->bank->test_bank_bayar();
            //print_r($dutu); die;
            $array_data = json_decode($dutu, true);
            $extra = array(
                $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            echo $final_data;
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function pdfujiansatu()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "51") {
            $this->load->model('mbank', 'bank');
            $pdk = $this->bank->lihatujiansatu();
            //print_r($pdk); die;
            $data = array(
                'title' => "Daftar Calon Mahasiswa Jalur Tes Gelombang I/II",
                'warga' => $pdk
            );

            $this->load->library('pdfgenerator1');
            $html = $this->load->view('bank/pdfujian', $data, true);
            $filename = 'Daftar Calon Jalur Tes Telah 2 Ujian';
            $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function testbanktiga()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "51") {
            $this->load->model('mbank', 'bank');
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/test_banktiga.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'pmb' => 'testbanktiga'
            );
            $data['user'] = $this->bank->belumupload3();
            $this->template->view('pmb/tbl-testbankfull', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function test_banktiga_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "51") {
            $this->load->model('mbank', 'bank');
            $dutu = $this->bank->test_bank_bayar3();
            //print_r($dutu); die;
            $array_data = json_decode($dutu, true);
            $extra = array(
                $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            echo $final_data;
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }

    public function pdfhptiga()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "51") {
            $this->load->model('mbank', 'bank');
            $pdk = $this->bank->lihatujiantiga();
            //print_r($pdk); die;
            $data = array(
                'title' => "Daftar Calon Mahasiswa Jalur Tes Gelombang III",
                'warga' => $pdk
            );

            $this->load->library('pdfgenerator1');
            $html = $this->load->view('bank/pdfteshptiga', $data, true);
            $filename = 'Daftar Calon Jalur Tes Telah 2 Ujian';
            $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function konfirbayar($ida = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49") {
            $cekkk = $this->pmb->priksaPutuskan1($ida);
            if ($cekkk->jalur == "prestasi" && $cekkk->status_penerimaan == "1" && $cekkk->umumkan == "1") {
                $this->load->library('form_validation');
                $this->form_validation->set_rules(
                    'nam_ngirim',
                    'Nama Pengirim',
                    'trim|required',
                    array(
                        'required'      => '%s tidak boleh kosong!',
                    )
                );
                $this->form_validation->set_rules(
                    'bank_ngirim',
                    'Bank Pengirim',
                    'trim|required',
                    array(
                        'required'      => '%s tidak boleh kosong!',
                    )
                );
                $this->form_validation->set_rules(
                    'tanggal',
                    'Tanggal Transaksi',
                    'trim|required',
                    array(
                        'required'      => '%s tidak boleh kosong!',
                    )
                );
                $this->form_validation->set_rules(
                    'jam',
                    'Jam Transaksi',
                    'trim|required',
                    array(
                        'required'      => '%s tidak boleh kosong!',
                    )
                );
                $this->form_validation->set_rules(
                    'ref',
                    'Nomor Referensi',
                    'trim|required',
                    array(
                        'required'      => '%s tidak boleh kosong!',
                    )
                );
                $this->form_validation->set_rules(
                    'jumlah',
                    'Jumlah Pembayaran',
                    'trim|required',
                    array(
                        'required'      => '%s tidak boleh kosong!',
                    )
                );
                $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
                if ($this->form_validation->run() == FALSE) {
                    $dafbayar = $this->pmb->ambilBayarbukti($ida);
                    $data = array(
                        'calon' => 'bayar',
                        'satuan' => $this->pmb->itemBiayabaru(),
                        'bay' => $dafbayar,
                        'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js', 'plugins/select2/js/select2.full.min.js', 'assets/select.js'),
                        'css' => array('plugins/select2/css/select2.min.css'),
                    );
                    $this->template->view('pmb/konfirmasi', $data);
                } else {
                    $databa = $this->input->post(NULL, TRUE);
                    $datamasuk = array(
                        'akunb_msiswa' => $ida,
                        'nama_pengirim' => $databa['nam_ngirim'],
                        'bank_pengirim' => $databa['bank_ngirim'],
                        'tgl_trans' => $databa['tanggal'],
                        'jam_trans' => $databa['jam'],
                        'nomor_refe' => $databa['ref'],
                        'jlh_bayar' => $databa['jumlah'],
                        'validasi_bukti' => 1,
                        'konfirm_bauk' => 1
                    );
                    $resid = $this->pmb->MasukData('bukti_bayar', $datamasuk);
                    $item = $this->input->post('it');
                    $df = $this->pmb->cobaCoba($item);
                    $point = array();
                    foreach ($df as $row) {
                        $point[] = array(
                            'bukti_id_bayar' => $resid,
                            'akun_pembayaran' => $ida,
                            'jenis_bayar_rinci' => $row->id_biayakuliahpmb,
                            'jumlah_rinci' => $row->jlh_uang,
                            'semester_rinci' => 1,
                            'smt_nama' => "ganjil",
                            'tahun_ajaran' => "2021/2022"
                        );
                    }

                    $this->db->insert_batch('pembayaran_rinci', $point);
                    //print_r($df); die;  

                    redirect(current_url());
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Terjadi Kesalahan!.</div>');
                redirect('master/index');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function ungbukti($id = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49") {
            $ambilakun = $this->db->get_where('bukti_bayar', array('id_bukti_bayar' => $id))->row()->akunb_msiswa;
            $cekkk = $this->pmb->priksaPutuskan1($ambilakun);
            //print_r($cekkk); die;
            if ($cekkk->jalur == "prestasi" && $cekkk->status_penerimaan == "1" && $cekkk->umumkan == "1") {
                $bilgam =  $this->pmb->ambuktiBayar($id);
                if (empty($bilgam)) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data tidak ditemukan!.</div>');
                    redirect('masterpmb/konfirbayar/' . $ambilakun);
                }
                $data = array(
                    'calon' => 'formupload',
                    'gam'   => $bilgam,
                    'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js'),
                );
                $config['upload_path'] = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/';
                $config['allowed_types'] = 'jpg|jpeg';
                $config['max_size'] = '5048';
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('userfile')) {
                    $data['error'] = $this->upload->display_errors('<p class="text-danger">', '</p>');
                    $this->template->view('pmb/upload-bukti', $data);
                } else {
                    $inputan = $this->input->post(NULL, TRUE);
                    $namafile = $this->upload->data('file_name');
                    $input_data = array();

                    if (!empty($bilgam->bukti_bayar)) {
                        $path = '../daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/' . $bilgam->bukti_bayar;
                        $res = @unlink($path);
                    }
                    $input_data['bukti_bayar'] = $namafile;
                    $where = array(
                        'id_bukti_bayar' => $id
                    );
                    $this->db->update('bukti_bayar', $input_data, $where);
                    redirect('masterpmb/konfirbayar/' . $ambilakun);
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Terjadi Kesalahan!.</div>');
                redirect('masterpmb/index/' . $ambilakun);
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function get_export()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "51" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $this->load->model('excamaba');
            $data = $this->pmb->camaba_getall();
            $this->excamaba->get_maba($data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }

    // Surat Keputusan
    public function sk()
    {
        $data = array(
            'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/sk.js'),
            'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
            'sk' => 'sk',
            'gelom' => ''
        );
        $this->template->view('pmb/sk', $data);
    }
    public function sk_json()
    {
        $dutu = $this->pmb->sk();
        $array_data = json_decode($dutu, true);
        $extra = array(
            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash()
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        echo $final_data;
    }

    public function exportprodi($id)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach (range('A', 'L') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

        $sheet->setCellValue('A1', 'NIM');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tempat Lahir');
        $sheet->setCellValue('D1', 'Tanggal Lahir');
        $sheet->setCellValue('E1', 'Agama');
        $sheet->setCellValue('F1', 'Jenis Kelamin');
        $sheet->setCellValue('G1', 'Semester');
        $sheet->setCellValue('H1', 'Alamat');
        $sheet->setCellValue('I1', 'Email');
        $sheet->setCellValue('J1', 'No. Telepon');
        $sheet->setCellValue('K1', 'Jalur Masuk (TES-1/PMDK-0)');
        $sheet->setCellValue('L1', 'Gelombang(1,2,3)');

        // maba regis
        $this->db->from('bukti_bayar');
        $this->db->join('pmb_akun', 'akunb_msiswa = pengenal_akun', 'left');
        $this->db->join('pmb_penerimaan', 'akunb_msiswa = siswa_penerimaan', 'left');
        $this->db->join('pmb_prodi', 'akunb_msiswa = prodi_id_siswa', 'left');
        $this->db->join('pmb_siswa', 'akunb_msiswa = akun_siswa', 'left');
        // $this->db->join('data_sekolah', 'id_sekolah = id_data_sekolah', 'left');
        $this->db->group_by('akunb_msiswa');
        $this->db->where('prodi_penerimaan', $id);
        $this->db->where('validasi_bukti', 2);

        $query = $this->db->get()->result_array();
        $baris_data = 2;

        foreach ($query as $data) {
            $low_nama = strtolower($data['nama_siswa']);
            $final_nama = ucwords($low_nama);
            $sheet->setCellValue('B' . $baris_data, $final_nama);
            $sheet->setCellValue('C' . $baris_data, $data['tmp_lahir_siswa']);
            $datak = str_replace('/', '-', $data['tgl_lahir_siswa']);
            if (!empty($data['tgl_lahir_siswa'])) {
                $sheet->setCellValue('D' . $baris_data, date("d-m-Y", strtotime($datak)));
            } else {
                $sheet->setCellValue('D' . $baris_data, '');
            }
            $low_agama = strtolower($data['agama_siswa']);
            $final_agama = ucwords($low_agama);
            $sheet->setCellValue('E' . $baris_data, $final_agama);
            if ($data['jekel_siswa'] == 'wanita') {
                $sheet->setCellValue('F' . $baris_data, 'P');
            } else {
                $sheet->setCellValue('F' . $baris_data, 'L');
            }
            $sheet->setCellValue('G' . $baris_data, '1');
            $sheet->setCellValue('H' . $baris_data, $data['alamat_siswa']);
            $sheet->setCellValue('I' . $baris_data, $data['email_akun_siswa']);
            $sheet->setCellValue('J' . $baris_data, $data['hp_siswa']);
            if ($data['jalur'] == 'test') {
                $sheet->setCellValue('K' . $baris_data, '1');
            } else {
                $sheet->setCellValue('K' . $baris_data, '0');
            }
            $sheet->setCellValue('L' . $baris_data, $data['gelombang']);
            $baris_data++;
        }

        $writer = new Xlsx($spreadsheet);

        if ($id == 1) {
            $fileName = 'Data Mahasiswa Prodi PBSI.xlsx';
        } elseif ($id == 2) {
            $fileName = 'Data Mahasiswa Prodi PMAT.xlsx';
        } elseif ($id == 3) {
            $fileName = 'Data Mahasiswa Prodi PEK.xlsx';
        } elseif ($id == 4) {
            $fileName = 'Data Mahasiswa Prodi PKN.xlsx';
        } elseif ($id == 5) {
            $fileName = 'Data Mahasiswa Prodi PKOM.xlsx';
        } elseif ($id == 6) {
            $fileName = 'Data Mahasiswa Prodi PBIO.xlsx';
        } elseif ($id == 7) {
            $fileName = 'Data Mahasiswa Prodi PAUD.xlsx';
        } elseif ($id == 8) {
            $fileName = 'Data Mahasiswa Prodi PBI.xlsx';
        } else {
            $fileName = 'Data Mahasiswa Prodi PGSD.xlsx';
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: filename="' . $fileName . '"');
        $writer->save('php://output');
    }

    public function exportlulus($id)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach (range('A', 'L') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tempat Lahir');
        $sheet->setCellValue('D1', 'Tanggal Lahir');
        $sheet->setCellValue('E1', 'Asal Sekolah');
        $sheet->setCellValue('F1', 'Agama');
        $sheet->setCellValue('G1', 'Jenis Kelamin');
        $sheet->setCellValue('H1', 'Semester');
        $sheet->setCellValue('I1', 'Alamat');
        $sheet->setCellValue('J1', 'Email');
        $sheet->setCellValue('K1', 'No. Telepon');
        $sheet->setCellValue('L1', 'Jalur Masuk (TES-1/PMDK-0)');
        $sheet->setCellValue('M1', 'Gelombang(1,2,3)');

        // maba lulus
        $this->db->from('pmb_siswa');
        $this->db->join('pmb_akun', 'akun_siswa = pengenal_akun', 'left');
        $this->db->join('pmb_penerimaan', 'akun_siswa = siswa_penerimaan', 'left');
        $this->db->join('pmb_prodi', 'akun_siswa = prodi_id_siswa', 'left');
        $this->db->join('bukti_bayar', 'akun_siswa = akunb_msiswa', 'left');
        $this->db->join('pmb_sekolah', 'akun_siswa = sekolah_id_siswa', 'left');
        $this->db->join('data_sekolah', 'id_sekolah = id_data_sekolah', 'left');
        $this->db->group_by('id_penerimaan');
        //bisa diganti jalu
        // $this->db->where('jalur', 'prestasi');
        //
        $this->db->where('status_penerimaan', 1);
        $this->db->where('prodi_penerimaan', $id);

        $query = $this->db->get()->result_array();


        $baris_data = 2;
        $no = 1;
        foreach ($query as $data) {
            $sheet->setCellValue('A' . $baris_data, $no++);
            $low_nama = strtolower($data['nama_siswa']);
            $final_nama = ucwords($low_nama);
            $sheet->setCellValue('B' . $baris_data, $final_nama);
            $sheet->setCellValue('C' . $baris_data, $data['tmp_lahir_siswa']);
            $datak = str_replace('/', '-', $data['tgl_lahir_siswa']);
            if (!empty($data['tgl_lahir_siswa'])) {
                $sheet->setCellValue('D' . $baris_data, date("d-m-Y", strtotime($datak)));
            } else {
                $sheet->setCellValue('D' . $baris_data, '');
            }
            $sheet->setCellValue('E' . $baris_data, $data['nama_sekolah']);
            $low_agama = strtolower($data['agama_siswa']);
            $final_agama = ucwords($low_agama);
            $sheet->setCellValue('F' . $baris_data, $final_agama);
            if ($data['jekel_siswa'] == 'wanita') {
                $sheet->setCellValue('G' . $baris_data, 'P');
            } else {
                $sheet->setCellValue('G' . $baris_data, 'L');
            }
            $sheet->setCellValue('H' . $baris_data, '1');
            $sheet->setCellValue('I' . $baris_data, $data['alamat_siswa']);
            $sheet->setCellValue('J' . $baris_data, $data['email_akun_siswa']);
            $sheet->setCellValue('K' . $baris_data, $data['hp_siswa']);
            if ($data['jalur'] == 'test') {
                $sheet->setCellValue('L' . $baris_data, '1');
            } else {
                $sheet->setCellValue('L' . $baris_data, '0');
            }
            $sheet->setCellValue('M' . $baris_data, $data['gelombang']);
            $baris_data++;
        }

        $writer = new Xlsx($spreadsheet);

        if ($id == 1) {
            $fileName = 'Data Mahasiswa Prodi PBSI.xlsx';
        } elseif ($id == 2) {
            $fileName = 'Data Mahasiswa Prodi PMAT.xlsx';
        } elseif ($id == 3) {
            $fileName = 'Data Mahasiswa Prodi PEK.xlsx';
        } elseif ($id == 4) {
            $fileName = 'Data Mahasiswa Prodi PKN.xlsx';
        } elseif ($id == 5) {
            $fileName = 'Data Mahasiswa Prodi PKOM.xlsx';
        } elseif ($id == 6) {
            $fileName = 'Data Mahasiswa Prodi PBIO.xlsx';
        } elseif ($id == 7) {
            $fileName = 'Data Mahasiswa Prodi PAUD.xlsx';
        } elseif ($id == 8) {
            $fileName = 'Data Mahasiswa Prodi PBI.xlsx';
        } else {
            $fileName = 'Data Mahasiswa Prodi PGSD.xlsx';
        }

        // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        // ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: filename="' . $fileName . '"');
        $writer->save('php://output');

        // header('Content-type: application/vnd.ms-excel');
        // header('Content-Disposition: attachment; filename="payroll.xlsx"');
        // $objWriter->save('php://output');
    }
}

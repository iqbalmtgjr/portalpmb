<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->model('mmasterpmb', 'pmb');
        $this->load->model('mbank', 'bank');
        if (empty($this->session->userdata('email_simkeu'))) {
            redirect('main/index');
        }
    }

    public function index()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/belum_bayar.js', 'assets/hapus.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'bank' => 'index',
                'jdl' => 'Daftar Pengajuan Validasi Pembayaran'
            );
            $this->template->view('bank/tbl-bayar', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function valid()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/valid_bayar.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'bank' => 'valid',
                'jdl' => 'Daftar Pembayaran Valid Jalur Prestasi Gelombang 1'
            );
            $this->template->view('bank/tbl-bayar', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function valid_bayar_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $dutu = $this->bank->get_valid_bayar();
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
    public function valid2()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/valid2_bayar.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'bank' => 'valid2',
                'jdl' => 'Daftar Pembayaran Valid Jalur Prestasi Gelombang 2'
            );
            $this->template->view('bank/tbl-bayar', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function valid2_bayar_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $dutu = $this->bank->get_valid2_bayar();
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
    public function validtes()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/valid_bayartes.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'bank' => 'validtes',
                'jdl' => 'Daftar Pembayaran Valid Jalur Tes Gelombang 1'
            );
            $this->template->view('bank/tbl-bayar', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function valid_bayartes_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $dutu = $this->bank->get_valid_bayartes();
            // print_r($dutu);
            // die;
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
    public function validtes2()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/valid_bayartes2.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'bank' => 'validtes2',
                'jdl' => 'Daftar Pembayaran Valid Jalur Tes Gelombang 2'
            );
            $this->template->view('bank/tbl-bayar', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function valid_bayartes2_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $dutu = $this->bank->get_valid_bayartes2();
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

    public function regis()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->load->library('pagination');
            $config['base_url'] = base_url('bank/regis/');
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
            $data['biaya_test'] = $this->bank->biaya_kuliah_test();
            $data['biaya_prestasi'] = $this->bank->biaya_kuliah_prestasi();
            $data['pagination'] = $this->pagination->create_links();
            $data['hasil'] = $this->bank->total_userregis();
            $data['bank'] = 'regis';

            // echo "<pre>";
            // print_r($data['biaya']);
            // die;

            $this->template->view('bank/tbl-regis', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function pdfregis()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $this->load->helper('tgl');
            // $pdk = $this->bank->pdf_tidak_regis();
            $pdk = $this->bank->pdf_regis();
            //  echo '<pre>';
            // echo '<pre>';
            // var_dump($pdk->result_array());
            // die();
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
                'pgsd' => $this->bank->pdf_regis_pgsd(),
                'biaya_test' => $this->bank->biaya_kuliah_test(),
                'biaya_prestasi' => $this->bank->biaya_kuliah_prestasi(),
            );
            $this->load->library('pdfgenerator1');
            $html = $this->load->view('bank/pdfregis', $data, true);
            $filename = 'daftar-transaksi-valid';
            $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function gelpdfregis($gel = 0, $jalur = "", $prod = 0)
    {
        $pdk = $this->bank->gel_regis($gel, $jalur, $prod);
        $tilu = count($pdk->result());
        $tuo = $this->bank->gelreg($gel, $jalur, $prod);
        $data = array(
            'title' => "Registrasi Gel. " . $gel . " Jalur " . $jalur . "",
            'warga' => $pdk,
            'tole' => $tuo,
            'til' =>  $tilu
        );
        $this->load->library('pdfgenerator1');
        $html = $this->load->view('bank/gelpdfregis', $data, true);
        $filename = 'daftar-transaksi-valid';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function tidak()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/tidak_bayar.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'bank' => 'tidak',
                'jdl' => 'Daftar Pengajuan Pembayaran Tidak Valid'
            );
            $this->template->view('bank/tbl-bayar', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function semua()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/daftar_bayar.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'bank' => 'semua',
                'jdl' => 'Daftar Keseluruhan Pengajuan Validasi Pembayaran'
            );
            $this->template->view('bank/tbl-bayar', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }

    public function belum_bayar_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $dutu = $this->bank->belum_bayar();
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
    public function get_bayar_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $dutu = $this->bank->get_all_bayar();
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


    public function tidak_bayar_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $dutu = $this->bank->tidak_valid_bayar();
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
    public function pdfbelum()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->load->helper('tgl');
            $pdk = $this->bank->pdfBelum();
            $data = array(
                'title' => "Daftar Transaksi Yang Belum Divalidasi",
                'warga' => $pdk
            );
            $this->load->library('pdfgenerator1');
            $html = $this->load->view('bank/pdfa4', $data, true);
            $filename = 'daftar-transaksi-belum-validasi';
            $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function pdfvalid()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->load->helper('tgl');
            $pdk = $this->bank->pdfValid();
            $data = array(
                'title' => "Transaksi Valid Jalur Prestasi Gelombang 1 & 2",
                'warga' => $pdk
            );
            $this->load->library('pdfgenerator1');
            $html = $this->load->view('bank/pdfa4', $data, true);
            $filename = 'daftar-transaksi-valid';
            $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function pdfvalidbayartes()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->load->helper('tgl');
            $pdk = $this->bank->pdfValidbayartes();
            $data = array(
                'title' => "Transaksi Valid Jalur Tes Gelombang 1",
                'warga' => $pdk
            );
            $this->load->library('pdfgenerator1');
            $html = $this->load->view('bank/pdfa4', $data, true);
            $filename = 'daftar-transaksi-valid';
            $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function pdftidak()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->load->helper('tgl');
            $pdk = $this->bank->pdfTidak();
            $data = array(
                'title' => "Daftar Transaksi Yang Tidak Valid",
                'warga' => $pdk
            );
            $this->load->library('pdfgenerator1');
            $html = $this->load->view('bank/pdfa4', $data, true);
            $filename = 'daftar-transaksi-tidak-valid';
            $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function pdfsemua()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $this->load->helper('tgl');
            $pdk = $this->bank->pdfSemua();
            $data = array(
                'title' => "Daftar Semua Transaksi ",
                'warga' => $pdk
            );
            $this->load->library('pdfgenerator1');
            $html = $this->load->view('bank/pdfa4', $data, true);
            $filename = 'daftar-semua-transaksi';
            $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function lihat($id = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $ss = $this->bank->cekValidbayar($id);
            if (empty($ss)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data Tidak Ditemukan.</div>');
                redirect('bank/index');
            } else {
                $dutu = $this->bank->get_bayar($id)->row();
                $bayarsemua = $this->bank->hitung_regis($dutu->akun_siswa);
                $dafbayar = $this->bank->ambilBayarbukti($dutu->akun_siswa);
                if (!empty($bayarsemua)) {
                    $bauayy = $bayarsemua->row();
                    $trfg = $bauayy->jlh_bayar;
                } else {
                    $trfg = 0;
                }
                $item_b = $this->bank->item_bayar($dutu->id_bukti_bayar);
                $biaya_test = $this->bank->biaya_kuliah_test();
                $biaya_prestasi = $this->bank->biaya_kuliah_prestasi();
                //  $item_semua =$this->bank->item_bayarsemua($dutu->akun_siswa);
                $data = array(
                    'bank' => 'lihat',
                    'pmb' => "",
                    'bay' => $dafbayar,
                    'ygsudah' => $trfg,
                    'dnama' => $dutu,
                    'item' => $item_b,
                    'biaya_test' => $biaya_test,
                    'biaya_prestasi' => $biaya_prestasi,
                );
                $this->template->view('bank/info', $data);
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function ungbukti($id = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $bilgam =  $this->bank->ambuktiBayar($id);
            if (empty($bilgam)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data tidak ditemukan!.</div>');
                redirect('bank/lihat/' . $id);
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
                $this->template->view('bank/upbuktibayar', $data);
            } else {
                $inputan = $this->input->post();
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
                redirect('bank/lihat/' . $id);
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function validkan($das = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49"  || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $ss = $this->bank->cekValidbayar($das);
            if (empty($ss)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data Tidak Ditemukan.</div>');
                redirect('bank/index');
            } else {
                $tampung = $this->input->post(NULL, TRUE);
                $where1 = array('id_bukti_bayar' => $tampung['id']);
                $datainputxx['validasi_bukti'] = $tampung['sah'];
                date_default_timezone_set('Asia/Jakarta');
                $harini = date('Y-m-d H:i:s');
                $datainputxx['tgl_validbukti'] = $harini;
                $datainputxx['yg_validasi'] = $this->session->userdata('pengguna_id_simkeu');
                $this->db->update('bukti_bayar', $datainputxx, $where1);
                redirect('bank/lihat/' . $das);
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function konfirmbauk($das = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $ss = $this->bank->cekValidbayar($das);
            if (empty($ss)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data Tidak Ditemukan.</div>');
                redirect('bank/index');
            } else {
                if ($ss->validasi_bukti != "2") {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Bukti Bayar Belum Divalidasi / Tidak Valid.</div>');
                    redirect('bank/lihat/' . $das);
                } else {
                    $tampung = $this->input->post(NULL, TRUE);
                    $where1 = array('id_bukti_bayar' => $tampung['id']);
                    $datainputxx['konfirm_bauk'] = $tampung['sah'];
                    date_default_timezone_set('Asia/Jakarta');
                    $harini = date('Y-m-d H:i:s');
                    $datainputxx['yg_validasibauk'] = $this->session->userdata('pengguna_id_simkeu');
                    $datainputxx['tgl_konfirmbauk'] = $harini;
                    $this->db->update('bukti_bayar', $datainputxx, $where1);
                    redirect('bank/lihat/' . $das);
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }

    public function ubh($id = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {
            $ss = $this->bank->cekValidbayar($id);
            if (empty($ss)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data Tidak Ditemukan.</div>');
                redirect('bank/index');
            } else {
                $dutu = $this->bank->get_bayar($id)->row();
                $this->load->library('form_validation');
                $this->form_validation->set_rules('n_pengirim', 'Nama Pengirim', 'required');
                $this->form_validation->set_rules('bank_pengirim', 'Bank Pengirim', 'required');
                $this->form_validation->set_rules('tgl_tran', 'Tanggal Transaksi', 'required');
                $this->form_validation->set_rules('jam_tran', 'Jam Transaksi', 'required');
                $this->form_validation->set_rules('no_ref', 'Nomor Referensi', 'required');
                $this->form_validation->set_rules('jmh_bayar', 'Jumlah Pembayaran', 'required');
                $this->form_validation->set_error_delimiters('<div class="text-danger"><i>', '</i></div>');
                if ($this->form_validation->run() == FALSE) {

                    $mbah[] = "";
                    $item_b = $this->bank->item_bayar($dutu->id_bukti_bayar);
                    $xx = $this->bank->item_bayarxx($dutu->id_bukti_bayar);
                    if (!empty($xx)) {
                        foreach ($xx as $v => $k) {
                            $mbah[] = $k->jenis_bayar_rinci;
                        }
                    }
                    $fggggg = $this->bank->percoxxx($mbah);

                    // if ($dutu->jalur == "prestasi") {
                    //     $billitem = $this->bank->itemBiayabaru();
                    // } else {
                    $billitem = $this->bank->itemBiaya();
                    // }
                    $data = array(
                        'bank' => 'lihat',
                        'pmb' => "",
                        'satuan' => $billitem,
                        'dnama' => $dutu,
                        'js' => array('plugins/select2/js/select2.full.min.js', 'assets/select.js'),
                        'css' => array('plugins/select2/css/select2.min.css'),
                        'item' => $item_b,
                        'belum' => $fggggg
                    );
                    $this->template->view('bank/edite', $data);
                } else {
                    $tampung = $this->input->post();
                    $item = $this->input->post('it');
                    if (!empty($item)) {
                        // if ($tampung['jalur'] == "prestasi") {
                        $df = $this->bank->cobaCoba($item);
                        // } else {
                        // $df = $this->bank->cobaCoba($item);
                        // }

                        date_default_timezone_set("Asia/Jakarta");
                        $tahun_skrng = date('Y');
                        $tahun_skrngtambah1 = date('Y') + 1;

                        $point = array();
                        if ($tampung['jalur'] == "prestasi") {
                            foreach ($df as $row) {
                                $point[] = array(
                                    'bukti_id_bayar' => $id,
                                    'akun_pembayaran' => $dutu->akun_siswa,
                                    'jenis_bayar_rinci' => $row->id_biayakuliahpmb,
                                    'jumlah_rinci' => $row->prestasi_biaya,
                                    'semester_rinci' => 1,
                                    'smt_nama' => "ganjil",
                                    'tahun_ajaran' => $tahun_skrng . '/' . $tahun_skrngtambah1
                                );
                            }
                        } else {
                            foreach ($df as $row) {
                                $point[] = array(
                                    'bukti_id_bayar' => $id,
                                    'akun_pembayaran' => $dutu->akun_siswa,
                                    'jenis_bayar_rinci' => $row->id_biayakuliahpmb,
                                    'jumlah_rinci' => $row->test_biaya,
                                    'semester_rinci' => 1,
                                    'smt_nama' => "ganjil",
                                    'tahun_ajaran' => $tahun_skrng . '/' . $tahun_skrngtambah1
                                );
                            }
                        }

                        $this->db->insert_batch('pembayaran_rinci', $point);
                    }
                    //print_r($point); die;

                    $datam = array();
                    $datam['nama_pengirim'] = $tampung['n_pengirim'];
                    $datam['bank_pengirim'] = $tampung['bank_pengirim'];
                    $datam['tgl_trans'] = $tampung['tgl_tran'];
                    $datam['jam_trans'] = $tampung['jam_tran'];
                    $datam['nomor_refe'] = $tampung['no_ref'];
                    $datam['jlh_bayar'] = $tampung['jmh_bayar'];
                    $where = array(
                        'id_bukti_bayar' => $id
                    );
                    $res = $this->db->update('bukti_bayar', $datam, $where);



                    if ($res >= 1) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan Data Berhasil.</div>');
                        redirect(current_url());
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan Data Gagal.</div>');
                        redirect(current_url());
                    }
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function tambahpembayaran($param = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "53") {
            $cekkk = $this->bank->priksaPutuskan1($param);

            if (!empty($cekkk)) {
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
                $this->form_validation->set_rules(
                    'it[]',
                    'Item Pembayaran',
                    'trim|required',
                    array(
                        'required'      => '%s tidak boleh kosong!',
                    )
                );
                $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
                if ($this->form_validation->run() == FALSE) {
                    $dafbayar = $this->bank->ambilBayarbukti($param);
                    // if ($cekkk->jalur == "prestasi") {
                    //     // $bayyy = $this->bank->itemBiayabaru();
                    //     $bayyy = $this->bank->itemBiayabarutest();
                    // } else {
                    $bayyy = $this->bank->itemBiaya();
                    // }

                    //print_r($dafbayar->result()); die;  
                    $data = array(
                        'msiswa' => $cekkk,
                        'calon' => 'bayar',
                        'satuan' => $bayyy,
                        'bay' => $dafbayar,
                        'js' => array('plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'assets/muatgam.js', 'plugins/select2/js/select2.full.min.js', 'assets/select.js'),
                        'css' => array('plugins/select2/css/select2.min.css'),
                    );
                    $this->template->view('bank/tbh-pembayaran', $data);
                } else {
                    $databa = $this->input->post();
                    $datamasuk = array(
                        'akunb_msiswa' => $param,
                        'nama_pengirim' => $databa['nam_ngirim'],
                        'bank_pengirim' => $databa['bank_ngirim'],
                        'tgl_trans' => $databa['tanggal'],
                        'jam_trans' => $databa['jam'],
                        'nomor_refe' => $databa['ref'],
                        'jlh_bayar' => $databa['jumlah'],
                        'validasi_bukti' => 1,
                        'konfirm_bauk' => 1
                    );
                    $resid = $this->bank->MasukData('bukti_bayar', $datamasuk);
                    $item = $this->input->post('it');
                    if (!empty($item)) {
                        // if ($cekkk->jalur == "prestasi") {
                        $df = $this->bank->cobaCoba($item);
                        // } else {
                        // $df = $this->bank->cobaCobatest($item);
                        // }
                        date_default_timezone_set("Asia/Jakarta");
                        $tahun_skrng = date('Y');
                        $tahun_skrngtambah1 = date('Y') + 1;

                        $point = array();
                        if ($cekkk->jalur == "prestasi") {
                            foreach ($df as $row) {
                                $point[] = array(
                                    'bukti_id_bayar' => $resid,
                                    'akun_pembayaran' => $param,
                                    'jenis_bayar_rinci' => $row->id_biayakuliahpmb,
                                    'jumlah_rinci' => $row->prestasi_biaya,
                                    'user_id_rinci' => $this->session->userdata('pengguna_id_simkeu'),
                                    'semester_rinci' => 1,
                                    'smt_nama' => "ganjil",
                                    'tahun_ajaran' => $tahun_skrng . '/' . $tahun_skrngtambah1
                                );
                            }
                        } else {
                            foreach ($df as $row) {
                                $point[] = array(
                                    'bukti_id_bayar' => $resid,
                                    'akun_pembayaran' => $param,
                                    'jenis_bayar_rinci' => $row->id_biayakuliahpmb,
                                    'jumlah_rinci' => $row->test_biaya,
                                    'user_id_rinci' => $this->session->userdata('pengguna_id_simkeu'),
                                    'semester_rinci' => 1,
                                    'smt_nama' => "ganjil",
                                    'tahun_ajaran' => $tahun_skrng . '/' . $tahun_skrngtambah1
                                );
                            }
                        }
                        $this->db->insert_batch('pembayaran_rinci', $point);
                    }

                    redirect(current_url());
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Calon mahasiswa belum dinyatakan lulus! Setiap calon mahasiswa harus mengikuti proses seleksi!!!.</div>');
                redirect('bank/index');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }

    public function pustembay($id = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "53") {
            $where = array(
                'id_pembayaran_rinci' => $id
            );
            $byr_rinci = $this->bank->lht_byr_rinci($id)->row();
            // print_r($byr_rinci->bukti_id_bayar);
            // die;
            $whoro = array(
                'id_bukti_bayar' => $byr_rinci->bukti_id_bayar
            );
            $res = $this->db->delete('pembayaran_rinci', $where);
            // $hapus_buktibayar = $this->db->delete('bukti_bayar', $whoro);
            if ($res >= 1) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Hapus Data Berhasil.</div>');
                $referred_from = $this->session->userdata('referred_from');
                redirect($referred_from, 'refresh');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Hapus Data Gagal.</div>');
                $referred_from = $this->session->userdata('referred_from');
                redirect($referred_from, 'refresh');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function hapus()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39") {

            $tampung = $this->input->post();
            $ss = $this->bank->cekValidbayar($tampung['idall']);
            $where = array(
                'id_bukti_bayar' => $tampung['idall']
            );
            $where1 = array(
                'bukti_id_bayar' => $tampung['idall']
            );

            if (!empty($ss)) {
                if ($ss->validasi_bukti !== 2) {
                    if (!empty($ss->bukti_bayar)) {
                        $path = '../pmb/bayar/' . $ss->bukti_bayar;
                        $res = @unlink($path);
                    }
                    $res = $this->db->delete('bukti_bayar', $where);
                    $res1 = $this->db->delete('pembayaran_rinci', $where1);
                    if ($res >= 1) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan Data Berhasil.</div>');
                        redirect('bank/index');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan Data Gagal.</div>');
                        redirect('bank/index');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Pembayaran yang telah divalidasi tidak bisa dihapus.</div>');
                    redirect('bank/index');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data Tidak Ditemukan.</div>');
                redirect('bank/index');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function tambahsms($id = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $ss = $this->bank->cekValidbayar($id);
            if (empty($ss)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data Tidak Ditemukan.</div>');
                redirect('bank/index');
            } else {
                $dutu = $this->bank->get_bayar($id)->row();
                $ceksms = $this->bank->ambilSms($dutu->id_bukti_bayar);
                $this->load->library('form_validation');
                $this->form_validation->set_rules('nilai', 'Nilai Transaksi', 'required');
                $this->form_validation->set_rules('tgl_tran', 'Tanggal Transaksi', 'required');
                $this->form_validation->set_rules('jam_tran', 'Jam Transaksi', 'required');
                $this->form_validation->set_rules('no_ref', 'Nomor Referensi', 'required');
                $this->form_validation->set_error_delimiters('<div class="text-danger"><i>', '</i></div>');
                if ($this->form_validation->run() == FALSE) {

                    $item_b = $this->bank->item_bayar($dutu->id_bukti_bayar);
                    $data = array(
                        'bank' => 'lihat',
                        'pmb' => "",
                        'dnama' => $dutu,
                        'item' => $item_b,
                        'sms' =>  $ceksms
                    );
                    $this->template->view('bank/sms', $data);
                } else {
                    $tampung = $this->input->post(NULL, TRUE);
                    //print_r($tampung); die;
                    $datam = array();
                    $datam['jumlah_sms'] = $tampung['nilai'];
                    $datam['tgl_sms'] = $tampung['tgl_tran'];
                    $datam['jam_sms'] = $tampung['jam_tran'];
                    $datam['ref_sms'] = $tampung['no_ref'];
                    $datam['akun_sms'] = $dutu->akun_siswa;


                    if (!empty($ceksms)) {
                        $where = array('id_buktibayar' => $dutu->id_bukti_bayar);
                        $res = $this->db->update('pmb_sms', $datam, $where);
                    } else {
                        $datam['id_buktibayar'] = $dutu->id_bukti_bayar;
                        $res = $this->db->insert('pmb_sms', $datam);
                    }

                    if ($res >= 1) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan Data Berhasil.</div>');
                        redirect(current_url());
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Simpan Data Gagal.</div>');
                        redirect(current_url());
                    }
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }

    //jalur tes gel 1
    public function testbank()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "53" ||  $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/test_bank.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'pmbx' => 'testbank1'
            );
            $data['user'] = $this->bank->belumupload1();
            $this->template->view('bank/tbl-testbankfull', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function test_bank_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "46") {
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
    public function testbank2()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45"  || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/test_bank2.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'pmbx' => 'testbank2'
            );
            $data['user'] = $this->bank->belumupload2();
            $this->template->view('bank/tbl-testbankfull', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function test_bank2_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45"  || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $dutu = $this->bank->test_bank2_bayar();
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
    public function testbank3()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "53") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/test_bank3.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'pmbx' => 'testbank3'
            );
            $data['user'] = $this->bank->belumupload3();
            $this->template->view('bank/tbl-testbankfull', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function test_bank3_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "53") {
            $dutu = $this->bank->test_bank3_bayar();
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
    public function testbanktiga()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/test_banktiga.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'bank' => 'testbanktiga'
            );
            $data['user'] = $this->bank->belumupload3();
            $this->template->view('bank/tbl-testbankfull', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function test_banktiga_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
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
    public function testbanktigabelum()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/test_banktigabelum.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'bank' => 'testbanktigabelum'
            );
            $data['user'] = $this->bank->belumupload3();
            $this->template->view('bank/tbl-testbankfull', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function test_banktigabelum_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $dutu = $this->bank->test_bank_bayar3belum();
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
    public function testbanktigaputus()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/test_banktigaputus.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'bank' => 'testbanktigaputus'
            );
            $data['user'] = $this->bank->belumupload3();
            $this->template->view('bank/tbl-tesbank3putus', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function test_banktigaputus_json()
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $dutu = $this->bank->test_bank_bayar3putus();
            // print_r($dutu);
            // die;
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
    public function ujianpindah($id = 0)
    {
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "46" || $this->session->userdata('pengguna_id_simkeu') == "49") {
            $cek = $this->bank->ambcalmhs($id);
            if (!empty($cek)) {
                $dum = $this->bank->ujianAkun($cek->email_akun_siswa);

                if (!empty($dum)) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Akun sudah terdaftar di sistem tes.</div>');
                    redirect('bank/testbank3');
                } else {
                    $masuk = array(
                        'auth' => 'manual',
                        'confirmed' => '1',
                        'mnethostid' => '1',
                        'username' => $cek->email_akun_siswa,
                        'password' => $cek->kunci_akun_siswa,
                        'firstname' => $cek->nama_siswa,
                        'lastname' => $cek->nama_siswa,
                        'email' => $cek->email_akun_siswa,
                        'lang' => 'en',
                        'calendartype' => 'gregorian',
                        'timezone' => 'Asia/Jakarta',
                        'descriptionformat' => '1',
                        'mailformat' => '1',
                        'maildisplay' => '2',
                        'autosubscribe' => '1',
                    );
                    $dd = $this->bank->tambah_data_tes($masuk);

                    if ($dd >= 1) {
                        $mask = array(
                            'ujian' => '1'
                        );
                        $where = array(
                            'pengenal_akun' => $id
                        );
                        $this->db->update('pmb_akun', $mask, $where);

                        $url = 'https://tespmb.persadakhatulistiwa.ac.id/';
                        $link = '<a href="' . $url . '">Link </a>';
                        $message = '';
                        $message .= 'Hallo <strong>' . $cek->nama_siswa . ',</strong><br>';
                        $message .= 'Terima kasih telah mendaftar di STKIP Persada Khatulistiwa Sintang.<br><br>';
                        $message .= 'Kami menyampaikan informasi mengenai pelaksanaan tes tertulis.<br>';
                        $message .= 'Tes tertulis PMB dilaksanakan secara online, dimulai pada tanggal 20 sampai 21 Agustus 2024.<br><br>';
                        // $message .= 'Tes tertulis PMB dilaksanakan secara online, pada tanggal 9 Agustus 2024 pukul 08:00 s/d 10:00 wib.<br><br>';
                        $message .= 'Tes Wawancara PMB dilakukan melalui telpon/WhatsApp.<br><br>';
                        $message .= '<strong>Keterangan Tes Tertulis: </strong><br>';
                        $message .= 'Silahkan masuk ke ' . $link . ' untuk melakukan Tes Calon Mahasiswa Baru STKIP Persada Khatulistiwa Tahun 2024';
                        $message .= '<strong> Link : </strong>' . $url . '<br>';
                        $message .= 'Gunakan email : ' . $cek->email_akun_siswa . ' dan password: <strong> ' . $cek->kuncigudang . '</strong><br><br>';
                        $message .= 'Calon mahasiswa bisa memilih sendiri waktu tes selama tes masih dibuka (20 - 21 Agustus 2024)<br>';
                        $message .= 'Tes bisa dilakukan melalui komputer / laptop / HP yang terkoneksi dengan internet<br>';
                        $message .= 'Pengerjaan tes yang telah dimulai memiliki batas waktu. Calon mahasiswa memiliki kesempatan sebanyak 2 kali untuk mengerjakan setiap mata pelajaran yang dites. Nilai yang digunakan adalah nilai tertinggi. <br>';
                        $message .= 'Pastikan koneksi internet lancar, agar pengerjaan tes tidak terganggu.<br><br>';
                        $message .= '<strong>Salam hangat,</strong><br>';
                        $message .= '<strong>Panitia PMB</strong><br>';
                        $this->load->library('email');
                        $ci = get_instance();
                        $config['protocol'] = "smtp";
                        $config['smtp_host'] = "ssl://sipema.stkippersada.ac.id";
                        $config['smtp_port'] = "465";
                        $config['smtp_user'] = "admin@sipema.stkippersada.ac.id";
                        $config['smtp_pass'] = "S4mp4h53mua";
                        $config['charset'] = "utf-8";
                        $config['mailtype'] = "html";
                        $config['newline'] = "\r\n";
                        $ci->email->initialize($config);
                        $ci->email->from('admin@sipema.stkippersada.ac.id', 'Panitia PMB');
                        $list = $cek->email_akun_siswa;
                        $ci->email->to($list);
                        $ci->email->subject('Tes PMB STKIP Persada Khatulistiwa');
                        $ci->email->message($message);
                        if ($this->email->send()) {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Pendaftaran ke sistem test berhasil.</div>');
                            redirect('bank/testbank3');
                        } else {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>Pendaftaran ke sistem test berhasil. Email gagal dikirim</div>');
                            redirect('bank/testbank3');
                        }

                        redirect('bank/testbank3');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Pendaftaran ke sistem test gagal.</div>');
                        redirect('bank/testbank3');
                    }
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Terjadi Kesalahan.</div>');
                redirect('bank/testbank3');
            }
            die;
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('pengguna/profil');
        }
    }
    public function pdfujiansatu()
    {
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
    }
    public function pdfujiantiga()
    {
        $pdk = $this->bank->lihatujiantiga();
        //print_r($pdk); die;
        $data = array(
            'title' => "Daftar Calon Mahasiswa Jalur Tes Gelombang III",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('bank/pdftestiga', $data, true);
        $filename = 'Daftar Calon Jalur Tes Telah 2 Ujian';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdftest1()
    {
        $pdk = $this->bank->testonlinesatu();
        //print_r($pdk); die;
        $data = array(
            'title' => "Daftar Calon Mahasiswa Jalur Tes Gelombang I",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('bank/pdftest2', $data, true);
        $filename = 'Daftar Calon Jalur Tes Telah 2 Ujian';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdftest2()
    {
        $pdk = $this->bank->testonlinedua();
        //print_r($pdk); die;
        $data = array(
            'title' => "Daftar Calon Mahasiswa Jalur Tes Gelombang II",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('bank/pdftest2', $data, true);
        $filename = 'Daftar Calon Jalur Tes Telah 2 Ujian';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdftest3()
    {
        $pdk = $this->bank->testonlinetiga();
        //print_r($pdk); die;
        $data = array(
            'title' => "Daftar Calon Mahasiswa Jalur Tes Gelombang III",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('bank/pdftest2', $data, true);
        $filename = 'Daftar Calon Jalur Tes Gel 3';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfhpsatu()
    {
        $pdk = $this->bank->hpinfo1(1);
        //	print_r($pdk); die;
        $data = array(
            'title' => "Daftar Calon Mahasiswa Jalur Tes Gelombang I",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('bank/pdfhptest1', $data, true);
        $filename = 'Camaba Tes 1 Lulus';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfhpresatu($gelm = 0)
    {
        $pdk = $this->bank->hpresinfo1($gelm);
        //	print_r($pdk); die;
        $data = array(
            'title' => "Daftar Calon Mahasiswa Jalur Prestasi Gelombang " . $gelm,
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('bank/pdfhptest1', $data, true);
        $filename = 'Camaba Prestasi' . $gelm . ' Lulus';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfhpdua()
    {
        $pdk = $this->bank->hpinfo1(2);
        //print_r($pdk); die;
        $data = array(
            'title' => "Daftar Calon Mahasiswa Jalur Tes Gelombang II",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('bank/pdfhptest1', $data, true);
        $filename = 'Camaba Tes 2 Lulus';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfhptiga()
    {
        $pdk = $this->bank->hpinfo1(3);
        //print_r($pdk); die;
        $data = array(
            'title' => "Daftar Calon Mahasiswa Jalur Tes Gelombang III",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('bank/pdfhptest1', $data, true);
        $filename = 'Camaba Tes 3 Lulus';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
    public function pdfwebtiga()
    {
        $pdk = $this->bank->lihatujiantigaputus();
        //print_r($pdk); die;
        $data = array(
            'title' => "Pengumuman Penerimaan Mahasiswa Baru Jalur Tes Gelombang 3 Tahap I Tahun Akademik 2021/2021",
            'warga' => $pdk
        );

        $this->load->library('pdfgenerator1');
        $html = $this->load->view('bank/pdfteswebtiga', $data, true);
        $filename = 'Maba_lulus_test_3';
        $this->pdfgenerator1->generate($html, $filename, true, 'A4', 'portrait');
    }
}

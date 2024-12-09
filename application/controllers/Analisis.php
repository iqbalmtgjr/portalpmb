<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Analisis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
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
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "54" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $this->session->set_userdata('previous_url', current_url());
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
        $this->session->set_userdata('previous_url', current_url());
        $dutu = $this->analisis->tdk();
        // echo '<pre>';
        // print_r($dutu);
        // die;
        if ($this->session->userdata('pengguna_id_simkeu') == "45" || $this->session->userdata('pengguna_id_simkeu') == "49" || $this->session->userdata('pengguna_id_simkeu') == "48" || $this->session->userdata('pengguna_id_simkeu') == "52" || $this->session->userdata('pengguna_id_simkeu') == "39" || $this->session->userdata('pengguna_id_simkeu') == "53" || $this->session->userdata('pengguna_id_simkeu') == "54" || $this->session->userdata('pengguna_id_simkeu') == "46") {
            $data = array(
                'js' => array('plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'assets/analisisblmregis.js'),
                'css' => array('plugins/datatables-bs4/css/dataTables.bootstrap4.css'),
                'analisis' => 'analisis',
                'blmbayarregis' => 'blmbayarregis',
                'jdl' => 'Analisis',
                'data' => $dutu
            );
            $this->template->view('analisis/tbl_blmregis', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Anda tidak memiliki hak akses.</div>');
            redirect('beranda/index');
        }
    }
    
    public function keterangan()
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $previous_url = $this->session->userdata('previous_url');
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Gagal!</h5>Keterangan wajib diisi.</div>');
            redirect($previous_url);
        } else {
            $previous_url = $this->session->userdata('previous_url');
            
            $datacalon = $this->input->post(NULL, TRUE);
            $datasis = array(
                'keterangan' => $datacalon['keterangan'],
            );
            $byid = $datacalon['akun'];
            // print_r($byid);die;
            $data = $this->db->update('pmb_siswa', $datasis, ['akun_siswa' => $byid]);
            
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Sukses!</h5>Keterangan berhasil ditambahkan.</div>');
            redirect($previous_url);
        }
    }
    
    public function hapusketerangan($id)
    {
        $previous_url = $this->session->userdata('previous_url');
        
        $datasis = array(
            'keterangan' => null,
        );
        $data = $this->db->update('pmb_siswa', $datasis, ['akun_siswa' => $id]);
        
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Sukses!</h5>Keterangan berhasil Dihapus.</div>');
        redirect($previous_url);
    }
    
    public function sekolah()
    {
        $data['schoolPercentage'] = $this->analisis->getSchoolPercentage(); // Data asli tanpa urutan
        $data['schoolPercentageurut'] = $data['schoolPercentage']; // Buat salinan untuk diurutkan
        
        // Urutkan berdasarkan persentase terbesar
        usort($data['schoolPercentageurut'], function($a, $b) {
            return $b['persentase'] <=> $a['persentase'];
        });
        
        $data['js2'] = array(
            'https://cdn.datatables.net/2.1.4/js/dataTables.min.js', 
            'https://code.jquery.com/jquery-3.7.1.min.js',
            'https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js',
            // 'https://cdn.datatables.net/buttons/1.7.2/js/dataTables.buttons.min.js',
            // 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
            // 'https://cdn.datatables.net/buttons/1.7.2/js/buttons.html5.min.js',
            // 'https://cdn.datatables.net/buttons/1.7.2/js/buttons.print.min.js',
        );
        $data['css2'] = array(
            'https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css',
            // 'https://cdn.datatables.net/buttons/1.7.2/css/buttons.dataTables.min.css',
            // 'https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css',
        );
        $data['total'] = count($this->analisis->getSchoolData());
        
        $data['total_mhs'] = $data['schoolPercentageurut'][0]['total_mhs']; 
        
        $this->template->view('analisis/sekolah', $data);
    }
    
    public function export_excel()
    {
        $data = $this->analisis->getSchoolPercentage();
        usort($data, function($a, $b) {
            return $b['persentase'] <=> $a['persentase'];
        });

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header
        $sheet->setCellValue('A1', 'Nama Sekolah');
        $sheet->setCellValue('B1', 'Jumlah Siswa');
        $sheet->setCellValue('C1', 'Persentase Siswa (%)');

        // Fill data
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['nama_sekolah']);
            $sheet->setCellValue('B' . $row, $item['jumlah_siswa']);
            $sheet->setCellValue('C' . $row, number_format($item['persentase'], 2));
            $row++;
        }
        
        foreach (range('A', 'C') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        $filename = 'Data_Sekolah_' . date('YmdHis') . '.xlsx';

        // Set header to force download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        // exit;
    }
}

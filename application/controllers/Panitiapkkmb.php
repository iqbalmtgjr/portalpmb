<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class Panitiapkkmb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        // $this->load->model('mmasterpmb', 'pmb');
        $this->load->model('mpkkmb', 'pkkmb');
        // if (empty($this->session->userdata('email_simkeu'))) {
        //     redirect('main/index');
        // }
    }
    
    public function index()
    {
        $dutu = $this->pkkmb->allpkkmb();
       
        $data = array(
            'pkkmb' => $dutu,
        );
        $this->load->view('pkkmb/pantau', $data);
       
    }
    
    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach (range('A', 'I') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'No Pendaftaran');
        // $sheet->setCellValue('C1', 'Pas Foto');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Email');
        $sheet->setCellValue('E1', 'Jenis Kelamin');
        $sheet->setCellValue('F1', 'No Hp');
        $sheet->setCellValue('G1', 'Jalur Masuk');
        $sheet->setCellValue('H1', 'Gelombang');
        $sheet->setCellValue('I1', 'Program Studi');

        $data['pkkmb'] = $this->pkkmb->dmaba()->result_array();
        $baris_data = 2;
        // var_dump($data);
        // die;
        $no = 1;
        foreach ($data['pkkmb'] as $pkkmb) {
            $sheet->setCellValue('A' . $baris_data, $no++);
            $sheet->setCellValue('B' . $baris_data, $pkkmb['no_daftar']);
            $sheet->setCellValue('C' . $baris_data, $pkkmb['nama_siswa']);
            $sheet->setCellValue('D' . $baris_data, $pkkmb['email_akun_siswa']);
            $sheet->setCellValue('E' . $baris_data, $pkkmb['jekel_siswa']);
            $sheet->setCellValue('F' . $baris_data, $pkkmb['hp_siswa']);
            $sheet->setCellValue('G' . $baris_data, $pkkmb['jalur']);
            $sheet->setCellValue('H' . $baris_data, $pkkmb['gelombang']);
            if ($pkkmb['prodi_penerimaan'] == 1) {
                $sheet->setCellValue('I' . $baris_data, 'Pendidikan Bahasa dan Sastra Indonesia');
            } elseif ($pkkmb['prodi_penerimaan'] == 2) {
                $sheet->setCellValue('I' . $baris_data, 'Pendidikan Matematika');
            } elseif ($pkkmb['prodi_penerimaan'] == 3) {
                $sheet->setCellValue('I' . $baris_data, 'Pendidikan Ekonomi');
            } elseif ($pkkmb['prodi_penerimaan'] == 4) {
                $sheet->setCellValue('I' . $baris_data, 'Pendidikan Pancasila dan Kewarganegaraan');
            } elseif ($pkkmb['prodi_penerimaan'] == 5) {
                $sheet->setCellValue('I' . $baris_data, 'Pendidikan Komputer');
            } elseif ($pkkmb['prodi_penerimaan'] == 6) {
                $sheet->setCellValue('I' . $baris_data, 'Pendidikan Biologi');
            } elseif ($pkkmb['prodi_penerimaan'] == 7) {
                $sheet->setCellValue('I' . $baris_data, 'Pendidikan Anak Usia Dini');
            } elseif ($pkkmb['prodi_penerimaan'] == 8) {
                $sheet->setCellValue('I' . $baris_data, 'Pendidikan Bahasa Inggris');
            } else {
                $sheet->setCellValue('I' . $baris_data, 'Pendidikan Guru Sekolah Dasar');
            }
            $baris_data++;
        }

        $writer = new Xlsx($spreadsheet);

        $fileName = 'Data Pendaftaran Mahasiswa Baru PKKMB.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: filename="' . $fileName . '"');
        $writer->save('php://output');
    }
    
    public function export2()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        foreach (range('A', 'I') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
    
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'No Pendaftaran');
        $sheet->setCellValue('C1', 'Pas Foto');
        $sheet->setCellValue('D1', 'Nama');
        $sheet->setCellValue('E1', 'Email');
        $sheet->setCellValue('F1', 'No Hp');
        $sheet->setCellValue('G1', 'Jalur Masuk');
        $sheet->setCellValue('H1', 'Gelombang');
        $sheet->setCellValue('I1', 'Program Studi');
    
        $data['pkkmb'] = $this->pkkmb->dmaba()->result_array();
        $baris_data = 2;
        $no = 1;
        foreach ($data['pkkmb'] as $pkkmb) {
            $sheet->setCellValue('A' . $baris_data, $no++);
            $sheet->setCellValue('B' . $baris_data, $pkkmb['no_daftar']);
    
            // Add image to the cell
            $imagePath = 'https://daftar.persadakhatulistiwa.ac.id/assets/berkas/foto/' . $pkkmb['foto'];
            $validImageTypes = ['jpg', 'jpeg', 'png', 'bmp', 'gif']; // Supported image types
    
            // Extract file extension and check if it's valid
            $fileExtension = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
            if (in_array($fileExtension, $validImageTypes) && file_exists($imagePath)) {
                $drawing = new Drawing();
                $drawing->setPath($imagePath);
                $drawing->setHeight(60); // Adjust image height
                $drawing->setCoordinates('C' . $baris_data);
                $drawing->setOffsetX(10);
                $drawing->setOffsetY(10);
                $drawing->setWorksheet($sheet);
            } else {
                // Handle invalid file extension or missing file
                $sheet->setCellValue('C' . $baris_data, 'Invalid Image');
            }
    
            $sheet->setCellValue('D' . $baris_data, $pkkmb['nama_siswa']);
            $sheet->setCellValue('E' . $baris_data, $pkkmb['email_akun_siswa']);
            $sheet->setCellValue('F' . $baris_data, $pkkmb['hp_siswa']);
            $sheet->setCellValue('G' . $baris_data, $pkkmb['jalur']);
            $sheet->setCellValue('H' . $baris_data, $pkkmb['gelombang']);
            
            // Handling Program Studi based on the prodi_penerimaan field
            switch ($pkkmb['prodi_penerimaan']) {
                case 1:
                    $sheet->setCellValue('I' . $baris_data, 'Pendidikan Bahasa dan Sastra Indonesia');
                    break;
                case 2:
                    $sheet->setCellValue('I' . $baris_data, 'Pendidikan Matematika');
                    break;
                case 3:
                    $sheet->setCellValue('I' . $baris_data, 'Pendidikan Ekonomi');
                    break;
                case 4:
                    $sheet->setCellValue('I' . $baris_data, 'Pendidikan Pancasila dan Kewarganegaraan');
                    break;
                case 5:
                    $sheet->setCellValue('I' . $baris_data, 'Pendidikan Komputer');
                    break;
                case 6:
                    $sheet->setCellValue('I' . $baris_data, 'Pendidikan Biologi');
                    break;
                case 7:
                    $sheet->setCellValue('I' . $baris_data, 'Pendidikan Anak Usia Dini');
                    break;
                case 8:
                    $sheet->setCellValue('I' . $baris_data, 'Pendidikan Bahasa Inggris');
                    break;
                default:
                    $sheet->setCellValue('I' . $baris_data, 'Pendidikan Guru Sekolah Dasar');
                    break;
            }
    
            $baris_data++;
        }
    
        $writer = new Xlsx($spreadsheet);
    
        $fileName = 'Data Pendaftaran Mahasiswa Baru PKKMB.xlsx';
    
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        // header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

}

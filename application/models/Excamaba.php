<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Excamaba extends CI_Model 
{
	protected $ci;

	public function __construct()
	{
		parent::__construct();
	
	}
	public function get_maba(Array $mahasiswa)
	{
    		header('Content-Type: application/vnd.ms-excel');
    		header('Content-Disposition: attachment;filename="datamaba2021.xlsx"');
    		$spreadsheet = new Spreadsheet();
    		$sheet = $spreadsheet->getActiveSheet();
    		$sheet->getStyle('A1:O1')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFD371');
           // $sheet->getStyle('A1:O1')
            //        ->getAlignment()->setWrapText(true); 
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setAutoSize(true);
            $sheet->getColumnDimension('F')->setAutoSize(true);
            $sheet->getColumnDimension('G')->setAutoSize(true);
            $sheet->getColumnDimension('H')->setAutoSize(true);
            $sheet->getColumnDimension('I')->setAutoSize(true);
            $sheet->getColumnDimension('J')->setAutoSize(true);
            $sheet->getColumnDimension('K')->setAutoSize(true);
            $sheet->getColumnDimension('L')->setAutoSize(true);
            $sheet->getColumnDimension('M')->setAutoSize(true);
            $sheet->getColumnDimension('N')->setAutoSize(true);
            $sheet->getColumnDimension('O')->setAutoSize(true);
		    $sheet->setCellValue('A1', 'Nama*')		 		   
				   ->setCellValue('B1', 'NISN')
				   ->setCellValue('C1', 'NIK')
				   ->setCellValue('D1', 'Tempat Lahir*')
				   ->setCellValue('E1', 'Tanggal Lahir*')
				   ->setCellValue('F1', 'Agama*')
				   ->setCellValue('G1', 'Asal Sekolah')
				   ->setCellValue('H1', 'Janis Kelamin*')
				   ->setCellValue('I1', 'Semester*')
				   ->setCellValue('J1', 'Alamat')
				   ->setCellValue('K1', 'Email')
				   ->setCellValue('L1', 'No. Telepon')
				   ->setCellValue('M1', 'Jalur Masuk (TES:1 / PMDK:0)*')
				   ->setCellValue('N1', 'Gelombang (1,2,3)')
				   ->setCellValue('O1', 'Program Studi');
				  

		$row_cell = 2;

		foreach ($mahasiswa as $key =>  $value) 
		{
			
			if(!empty($value->tmp_lahir_siswa)) {
				$tempatlahir = $value->tmp_lahir_siswa;
			}else{
				$tempatlahir = "-";
			}
			if(!empty($value->tgl_lahir_siswa)) {
				$datex = str_replace("/", "-",$value->tgl_lahir_siswa);
			}else{
				$datex = "00-00-0000";
			}
			if(!empty($value->agama_siswa)) {
				$agama = $value->agama_siswa;
			}else{
				$agama = "-";
			}
			if($value->jekel_siswa == "wanita") {
				$jekel = "P";
			}elseif($value->jekel_siswa == "pria"){
				$jekel = "L";
			}else{
				$jekel = "-";
			}
			if($value->jalur == "test") {
				$jalur = "1";			
			}else{
				$jalur = "0";
			}
			$sheet->setCellValue('A'.$row_cell, $value->nama_siswa)
					  ->setCellValue('B'.$row_cell, $value->nis_siswa.' ')
					  ->setCellValue('C'.$row_cell, $value->nik_siswa.' ')					  
					  ->setCellValue('D'.$row_cell, $tempatlahir)
					  ->setCellValue('E'.$row_cell, $datex)
					  ->setCellValue('F'.$row_cell, $agama)
					  ->setCellValue('G'.$row_cell, $value->nama_sekolah)
					  ->setCellValue('H'.$row_cell, $jekel)
					  ->setCellValue('I'.$row_cell, '1')
					  ->setCellValue('J'.$row_cell, $value->alamat_siswa)
					  ->setCellValue('K'.$row_cell, $value->email_akun_siswa)
					  ->setCellValue('L'.$row_cell, $value->hp_siswa.' ')
					  ->setCellValue('M'.$row_cell, $jalur)
					  ->setCellValue('N'.$row_cell, $value->gelombang)
					  ->setCellValue('O'.$row_cell, $value->nama_prodi);
			$row_cell++;
		}

		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}
}
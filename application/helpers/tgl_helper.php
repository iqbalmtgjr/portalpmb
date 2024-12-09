<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('generatehtml'))
{
	function waktu()
       {
           date_default_timezone_set('Asia/Jakarta');
           return date("d/m/Y");
       }
	 function umur($tgl)
       {
           date_default_timezone_set('Asia/Jakarta');
           $sekarang = date("Ymd");
		   $lahir = ubhtgl($tgl);
		   $umur = floor(($sekarang-$lahir)/10000);
		   return $umur;
       }
	function ubhtgl($tanggal)
    {
        return $newtanggal= substr($tanggal,6,4).''.substr($tanggal, 3,2).''.substr($tanggal, 0,2);
    }   
              
    function tgl_indo1($tgl)
       {
            return substr($tgl, 0, 2).' '.getbln(substr($tgl, 3,2)).' '.substr($tgl,6);
       }
    function tgl_indo($tgl)
       {
            return substr($tgl, 8, 2).' '.getbln(substr($tgl, 5,2)).' '.substr($tgl, 0, 4);
       }
	function getbln($bln)
		{
			switch ($bln) 
        {
            
            case 1:
                return "Januari";
            break;
        
            case 2:
                return "Februari";
            break;
        
            case 3:
                return "Maret";
            break;
        
            case 4:
                return "April";
            break;
        
            case 5:
                return "Mei";
            break;
        
            case 6:
                return "Juni";
            break;
        
            case 7:
                return "Juli";
            break;
        
            case 8:
                return "Agustus";
            break;
        
            case 9:
                return "September";
            break;
        
             case 10:
                return "Oktober";
            break;
        
            case 11:
                return "November";
            break;
        
            case 12:
                return "Desember";
            break;
        }
        
    }
     
    function ubahtanggal($tanggal)
    {
        return $newtanggal= substr($tanggal,8,2).'-'.substr($tanggal, 5,2).'-'.substr($tanggal, 0,4);
    }
    
    function ubahtanggal2($tanggal)
    {
        return $newtanggal=substr($tanggal,8,2 ).'/'.  substr($tanggal, 5,2).'/'.  substr($tanggal, 0,4);
    }
    

}

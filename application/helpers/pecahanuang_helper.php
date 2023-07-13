<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('generatehtml'))
{
	function rp($x)
       {
            if(is_int($x)==FALSE)
            {
                return '';
            }
            else
            {
           return number_format((int)$x,0,",",".");
            }
       }
    function getField($tables,$field,$pk,$value)
    {
        $CI =& get_instance();
        $data=$CI->db->query("select $field from $tables where $pk='$value'");
        if($data->num_rows()>0)
        {
            $data=$data->row_array();
            return $data[$field];
        }
        else
        {
            return '';
        }
    }
    function get_biaya_kuliah($tahun_akademik,$jenis_biaya_kuliah,$konsentrasi,$field) //dipakai
    {
		// sudah ok
        $CI =& get_instance();
        $where  =   array(  'tahun_masuk'=>$tahun_akademik,
                            'jenis_bayar_id1'=>$jenis_biaya_kuliah,
                            'prodi_id1'=>$konsentrasi);
        $r      =  $CI->db->get_where('biaya_kuliah',$where);
        if($r->num_rows()>0)
        {
            $r=$r->row_array();
            return $r[$field];
        }
        else
        {
            return 0;
        }
    }
    function get_biaya_persks($tahun_akademik,$konsentrasi,$field) //dipakai
    {
		// sudah ok
        $CI =& get_instance();
        $where  =   array(  'tahun_masuk'=>$tahun_akademik,
                            'jenis_bayar_id1'=> 5,
                            'prodi_id1'=>$konsentrasi);
        $r      =  $CI->db->get_where('biaya_kuliah',$where);
        if($r->num_rows()>0)
        {
            $r=$r->row_array();
            return $r[$field];
        }
        else
        {
            return 0;
        }
    }
    function get_biaya_sks($student_id, $konsentrasi,$field,$semester) //dipakai
    {
		// sudah ok
        $CI =& get_instance();
		$CI->db->select('sks_jumlah');
        $where  =   array(  'smt_sks'=>$semester,
							'id_msiswasks'=>$student_id,
                            'prodi_sks'=>$konsentrasi
                            );
							
        $r      =  $CI->db->get_where('sks_mahasiswa',$where);
        if($r->num_rows()>0)
        {
            $r=$r->row_array();
            return $r[$field];
        }
        else
        {
            return 0;
        }
    }
    function get_biaya_sudah_bayar($nim,$jenis_bayar_id) //dipakai
    {
        $CI     =   & get_instance();
        $query  =   "SELECT sum(jumlah_detail) as jumlah 
                    from pembayaran_detail 
                    where nim_detail='$nim' and jenis_bayar_iddetail='$jenis_bayar_id' 
                    group by jenis_bayar_iddetail";
        $data   =   $CI->db->query($query);
        if($data->num_rows()>0)
        {
            $r  =   $data->row_array();
            return $r['jumlah'];
        }
        else
        {
            return 0;
        }
    }
    function get_persentase_pembayaran($jumlah_bayar,$sudah_bayar) //dipakai
    {
        if(empty($jumlah_bayar) || empty($sudah_bayar))
        {
            return 0;
        }
        else
        {
            return ($sudah_bayar/$jumlah_bayar)*100;
        }
        
    }
    function get_semester_sudah_bayar($nim,$semester) //dipakai
    {
        $CI     =   & get_instance();
        $query  =   "SELECT sum(jumlah_detail) as jumlah 
                    from pembayaran_detail 
                    where nim_detail='$nim' and jenis_bayar_iddetail='1' and semester_detail='$semester' 
                    group by jenis_bayar_iddetail";
        $data   =   $CI->db->query($query);
        if($data->num_rows()>0)
        {
            $r  =   $data->row_array();
            return $r['jumlah'];
        }
        else
        {
            return 0;
        }
    }
    function get_sks_sudah_bayar($nim,$semester) //dipakai
    {
        $CI     =   & get_instance();
        $query  =   "SELECT sum(jumlah_detail) as jumlah 
                    from pembayaran_detail 
                    where nim_detail='$nim' and jenis_bayar_iddetail='5' and semester_detail='$semester' 
                    group by jenis_bayar_iddetail";
        $data   =   $CI->db->query($query);
        if($data->num_rows()>0)
        {
            $r  =   $data->row_array();
            return $r['jumlah'];
        }
        else
        {
            return 0;
        }
    }
}

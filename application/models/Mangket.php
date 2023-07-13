<?php
class Mangket extends CI_Model {

    function __construct(){
       
        parent::__construct();        
          
    }    
    
    public function TambahData($tableName, $data){
        $res = $this->db->insert($tableName, $data);
        if($this->db->affected_rows()){
    		return $res;
    	}else{
    		return false;
    	}
    }
}
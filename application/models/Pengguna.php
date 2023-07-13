<?php
class Pengguna extends CI_Model {

    function __construct(){
       
        parent::__construct();        
          
    }    
    
    public function insertUser($d)
    {  
        $string = array(            
                'first_name'=>$d['nama'],                
                'email'=>$d['email'],
                'id_bahasa' => $d['bhs'],                
				'ip_address'    => $this->input->ip_address(),                
                'role'=>$this->roles[0], 
                'status'=>$this->status[0], 
                'level'=> 'tamu',               
                'password'=> '', 
                'last_login'=> ''
        );
            $q = $this->db->insert_string('users',$string);             
            $this->db->query($q);
            return $this->db->insert_id();
    }
    
    public function isDuplicate($email)
    {     
        $this->db->get_where('users', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;         
    }
    
    public function insertToken($user_id)
    {   
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d');
        
        $string = array(
                'token'=> $token,
                'pengguna_id'=>$user_id,
                'created'=>$date
            );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $user_id;
        
    }
    
    public function isTokenValid($token)
    {
       $tkn = substr($token,0,30);
       $uid = substr($token,30);      
       
        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn, 
            'tokens.pengguna_id' => $uid), 1);                         
               
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);            
            if($createdTS != $todayTS){
                return false;
            }
            if($row->digunakan == '1'){
                return false;
            }
            
            $user_info1 = $this->getUserInfo($row->pengguna_id);
            $user_info = array(
                'id' => $row->id,
                'nama' =>$user_info1->nama,
                'pengguna_id' =>$user_info1->pengguna_id
                );
            return $user_info;
            
        }else{
            return false;
        }
        
    }    
    
    public function getUserInfo($id)
    {
        
        $this->db->from('pengguna');
        $this->db->where('pengguna_id',$id);
        $this->db->limit(1);
		$q = $this->db->get();
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }
    
    public function updateUserInfo($post)
    {
		date_default_timezone_set('Asia/Jakarta');		
		$harini = date('Y-m-d H:i:s');		
        $data = array(
               'password' => $post['password'],               
               'last_login' => strtotime($harini), 
 //              'waktu_masuk' => time(),
               'status' => $this->status[1]
            );
//		$cah = date('Y-m-d H:i:s', $data['last_login'] );	//mengubah format waktu	
        $this->db->where('users_id', $post['user_id']);
        $this->db->update('users', $data); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){			
            error_log('Unable to updateUserInfo('.$post['user_id'].')');
            return false;
        }        
        $user_info = $this->getUserInfo($post['user_id']); 
        return $user_info; 
    }
  
   
    
    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('pengguna', array('email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }
    }
    
    public function updatePassword($post)
    {   
       
        $this->db->where('pengguna_id', $post['pengguna_id']);
        $this->db->update('pengguna', array('password' => $post['password'])); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updatePassword('.$post['pengguna_id'].')');
            return false;
        }
        return true;
    } 
    public function batalToken($id)
    {   
        
        $this->db->where('id', $id);
        $this->db->update('tokens', array('digunakan'=>'1')); 
        return true;
    }

    public function UpdateData($tableName, $data, $where){        
		$res = $this->db->update($tableName, $data, $where);
		return $res;
    }
	function set_akun($param = 0){
             
        $this->db->from('pengguna');
		$this->db->where('email', $param);        
        $data = $this->db->get();
		if($this->db->affected_rows() > 0){ 
			return $data->row();
        }else {
			// hilangkan error object
			return (Object) array('password' => '', 'status' => '0');
		}
    }
     public function updateLoginTime($id)
    {
		date_default_timezone_set('Asia/Jakarta');		
		$harini = date('Y-m-d H:i:s');	
        $this->db->where('pengguna_id', $id);
        $this->db->update('pengguna', array('last_login' => strtotime($harini) ));
        return;
    }
   

}

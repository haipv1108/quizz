<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mverify extends CI_Model{
	private $_name = 'user';
	public function __construct(){ 
		parent::__construct(); 
		$this->load->database();
	}
	public function check_user($u_info){ 
		$check	= $this->db->select('name, email, level')->where('name', $u_info['name'])->where('password', $u_info['password'])->get($this->_name); 
		if($check -> row_array() >0){ 
			return $check->row_array(); 
		} else {
			return false; 
		} 
	}
	/*public function register($a_Userinfo){
		$a_User = $this->db->select('email')->where('email', $a_Userinfo['email'])->get($this->_name);
		if($a_User->row_array() == 0){// cho phep them
			$this->db->insert($this->_name, array(
				'username' => $a_Userinfo['username'],
				'email' => $a_Userinfo['email'],
				'password' => $a_Userinfo['password'],
				'level' => 1
			));
			return true;
		}else{
			return false;
		}
	}*/
	
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mprofile extends CI_Model{
	private $_name = 'user';
	function __construct(){
		parent::__construct();
		$this->load->database();
	}	

	function search_user($id){
		$query = $this->db->where('id',$id)->get($this->_name);
		if($query ->row_array()>0)
			return $query->row_array();
		else return false;
	}
	function updateuser($u_info){
	$this->db->where('id', $u_info['id'])->limit(1)->update($this->_name, $u_info);
	}
}

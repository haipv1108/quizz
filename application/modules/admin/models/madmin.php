<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Madmin extends CI_Model{
	private $_name = 'user';
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function count_all(){
		return $this->db->count_all($this->_name);
	}
	// Lay du lieu rieng theo tung phan
	function viewuser($per_page, $offset){
		$query = $this->db->limit($per_page,$offset)->get($this->_name);
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
	function check_name($name){
		$query = $this->db->where('name', $name)->get($this->_name);
		if($query -> row_array()>0)
			return false;
		else return true;
	}
	function check_mail($email){
		$query = $this->db->where('email', $email)->get($this->_name);
		if($query -> row_array()>0)
			return false;
		else return true;
	}
	function adduser($u_info){
		$this->db->insert($this->_name, $u_info);
	}
	function updateuser($u_info){
		$this->db->where('id', $u_info['id'])->limit(1)->update($this->_name, $u_info);
	}
	function deleteuser($id){
		$this->db->where('id', $id)->limit(1)->delete($this->_name);
	}
	function search_user($id){
		$query = $this->db->where('id',$id)->get($this->_name);
		if($query ->row_array()>0)
			return $query->row_array();
		else return false;
	}
}

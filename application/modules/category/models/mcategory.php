<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mcategory extends CI_Model{
	private $_name = 'category';
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function count_all(){
		return $this->db->count_all($this->_name);
	}
	// Lay du lieu rieng theo tung phan
	function viewcategory($per_page, $offset){
		$query = $this->db->get($this->_name, $per_page, $offset);
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
	function addcategory($cate_info){
		$this->db->insert($this->_name, $cate_info);
	}
	function updatecategory($cate_info){
		$this->db->where('id', $cate_info['id'])->limit(1)->update($this->_name, $cate_info);
	}
	function deletecategory($id){
		$this->db->where('id', $id)->limit(1)->delete($this->_name);
	}
	function search_category($id){
		$query = $this->db->where('id',$id)->get($this->_name);
		if($query ->row_array()>0)
			return $query->row_array();
		else return false;
	}
}
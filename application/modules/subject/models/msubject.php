<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Msubject extends CI_Model{
	private $_name = 'subject';
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function count_all(){
		return $this->db->count_all($this->_name);
	}
	// Lay du lieu rieng theo tung phan
	function viewsubject($per_page, $offset){
		$query = $this->db->select('subject.id, subject.name as subject_name, category.name as category_name, subject.decription')
				->from($this->_name)
				->join('category','category.id = subject.categoryid')
				->limit($per_page, $offset)
				->group_by(array('category_name','subject_name'))
				->get();
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
	function get_list_category(){
		$query = $this->db->select('id,name')->get('category');
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
	function addsubject($subject_info){
		$this->db->insert($this->_name, $subject_info);
	}
	function updatesubject($subject_info){
		$this->db->where('id', $subject_info['id'])->limit(1)->update($this->_name, $subject_info);
	}
	function deletesubject($id){
		$this->db->where('id', $id)->limit(1)->delete($this->_name);
	}
	function search_subject($id){
		$query = $this->db->where('id',$id)->get($this->_name);
		if($query ->row_array()>0)
			return $query->row_array();
		else return false;
	}
}
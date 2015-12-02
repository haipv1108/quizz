<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mhome extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function get_list_cate(){
		$query = $this->db->select('id, name, decription')->get('category');
		if($query ->num_rows() >0)
			return $query->result_array();
		else return false;
	}
	function listtest($id){
		$query = $this->db->select('test.id, test.name, level.name as level')
				->from('test')
				->where('subjectid',$id)
				->join('level','level.id = test.levelid')
				->group_by(array('level.name', 'test.name'))
				->get();
		if($query ->num_rows() >0)
			return $query->result_array();
		else return false;
	}
	function get_listtest_by_categoryid($categoryid){
		$query = $this->db->select('id, name, madethi, time, sl, decription')
				->where('categoryid', $categoryid)
				->get('test');
		if($query ->num_rows() >0)
			return $query->result_array();
		else return false;
	}
	function get_subject($id){
		$query = $this->db->select('name, decription')->where('id',$id)->get('subject');
		if($query -> row_array()>0)
			return $query->row_array();
		else return false;	
	}
	// tim kiem de test theo ten hoac ma de this-
	function search_test($search){
		$query = $this->db->select('t.id, t.name, t.madethi, t.decription')
				->from('test as t')
				->like('t.name', $search)
				->or_like('t.madethi', $search)
				->get();
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}


}
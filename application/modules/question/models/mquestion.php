<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mquestion extends CI_Model{
	private $_name = 'questionbank';

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('array');
	}

	function count_all(){
		return $this->db->count_all($this->_name);
	}

	function viewquestion($per_page, $offset){
		$query = $this->db->order_by('id','desc')->get($this->_name, $per_page, $offset);
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}

	function addquestion($quiz_info){
		$this->db->insert($this->_name, $quiz_info);
	}

	function updatequestion($edit_quiz){
		$this->db->where('id', $edit_quiz['id'])->limit(1)->update($this->_name, $edit_quiz);
	}

	function deletequestion($id){
		$this->db->where('id', $id)->limit(1)->delete($this->_name);
	}

	function search_question($id){
		$query = $this->db->where('id',$id)->get($this->_name);
		if($query ->row_array()>0)
			return $query->row_array();
		else return false;
	}

	function get_questions_with_subject_level($subject_id, $level_id) {
		$this->db->select('id');
		$query = $this->db->where('subjectid', $subject_id)->where('level', $level_id)->get($this->_name);
		if($query->num_rows()>0)
			return $query->result_array();
		return null;
	}

	function get_questions_with_category($categoryid) {
		$this->db->select('id');
		$query = $this->db->where('categoryid', $categoryid)->get($this->_name);
		if($query->num_rows()>0)
			return $query->result_array();
		return null;
	}
}
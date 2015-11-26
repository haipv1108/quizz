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

	function gettests($user_id){
		$query = $this->db->select('testid')->where('userid',$user_id)->get('responses');
		if($query->result_array()>0)
			return $query->result_array();
		else return false;
	}


	function get_test_detail($id){
			$query = $this->db->select('q.question, q.answer, test.id, q.level, q.correct, q.ans_explained, question.score')
			->from('test')
			->where('test.id',$id)
			->join('question','test.id = question.testid')
			->join('questionbank as q','q.id = question.questionid')
			->limit(20)
			->get();
	if($query->num_rows()>0)
		return $query->result_array();
	else return false;
	}

	function get_answer($id){
		$query = $this->db->select('answer_choice')->where('testid',$id)->limit(1)->get('responses');
		if($query->num_rows()>0)
			return $query->row_array();
		else return false;
	}

	function find_testid($test_name){
		$query = $this->db->select('name')->where('name',$test_name)->get('test');
		if($query->num_rows()>0)
			return TRUE;
		else return FALSE;
	}

	function get_test_detail_from_testname($name){
		$query = $this->db->select('q.question, q.answer, test.id, q.level, q.correct, q.ans_explained, q.score')
					->from('test')
					->where('test.name',$name)
					->join('question','test.id = question.testid')
					->join('questionbank as q','q.id = question.questionid')
					->limit(20)
					->get();
		if($query->num_rows()>0)
			return $query->result_array();
		else
			return false;
	}



}

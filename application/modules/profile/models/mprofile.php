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
		$query = $this->db->select('r.id, t.madethi')
				->from('responses as r')
				->where('userid',$user_id)
				->join('test as t', 't.id = r.testid')
				->order_by('r.id','desc')
				->get();
		if($query->result_array()>0)
			return $query->result_array();
		else return false;
	}


	function get_test_detail($id){
			$query = $this->db->select('q.type, q.question, q.answer, test.id, q.level, q.correct, q.ans_explained, question.score')
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
	
	// Kiem tra xem test id do nguoi dung da lam chua
	function check_testid_by_user($responses_id, $userid){
		$query = $this->db->select('answer_choice, testid, score')
				->where('id', $responses_id)
				->where('userid', $userid)
				->get('responses');
		if($query->num_rows()>0)
			return $query->row_array();
		else return false;
	}

	function find_test($test){//id, ma de, name
		$query = $this->db->select('id, name, madethi, time, sl, decription')
				->like('id', $test)
				->or_like('madethi', $test)
				->or_like('name', $test)
				->get('test');
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}

	function get_test_detail_from_testname($name){
			$query = $this->db->select('q.type, q.question, q.answer, test.id, q.level, q.correct, q.ans_explained, question.score')
			->from('test')
			->where('test.name',$name)
			->join('question','test.id = question.testid')
			->join('questionbank as q','q.id = question.questionid')
			->limit(20)
			->get();
	if($query->num_rows()>0)
		return $query->result_array();
	else return false;
	}
}

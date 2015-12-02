<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MmanageTest extends CI_Model{
	private $_name = 'test';
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function count_all(){
		return $this->db->count_all($this->_name);
	}

	function viewtest($per_page, $offset){
		$query = $this->db->limit($per_page,$offset)
				->order_by('id','desc')
				->get($this->_name);
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}

	function search_test($id){
		$query = $this->db->where('id',$id)->get($this->_name);
		if($query ->row_array()>0)
			return $query->row_array();
		else return false;
	}
	
	function deletetest($id){
		$this->db->where('id', $id)->limit(1)->delete($this->_name);
	}

	function find_test($test_id){
		$query = $this->db->select('q.type, q.question, q.answer, test.id, q.level, q.correct, q.ans_explained, question.score')
			->from('test')
			->where('test.id',$test_id)
			->join('question','test.id = question.testid')
			->join('questionbank as q','q.id = question.questionid')
			->limit(20)
			->get();
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}

	function insert_test($data) {
		$str_query = $this->db->insert_string($this->_name, $data['test_info']);
		$this->db->query($str_query);

		$testid = $this->get_last_id();

		foreach ($data['test_question'] as  $key => $value) {
			$this->db->insert('question', array('testid' => $testid, 'questionid' => $value['questionid'], 'score' => $value['score']));
		}
	}

	private function get_last_id() {
		return $this->db->insert_id();
	}

}
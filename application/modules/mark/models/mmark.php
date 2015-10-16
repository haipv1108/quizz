<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mmark extends CI_Model{
	private $_name = 'test';
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function count_all(){
		return $this->db->count_all($this->_name);
	}
	function deletetest($id){
		$this->db->where('id', $id)->limit(1)->delete($this->_name);
	}
	//Xoa rows from question table
	function deletequestion($testid){
		$this->db->where('testid',$testid)->delete('question');
	}
	function get_test_detail($id){
	$query = $this->db->select('q.question, q.answer, test.id, q.level, q.correct, q.ans_explained, q.score')
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

	function search($made){
		return NULL;
	}
}
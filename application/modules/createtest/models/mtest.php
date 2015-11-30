<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mtest extends CI_Model{
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

	function deletequestion($testid){
		$this->db->where('testid',$testid)->delete('question');
	}

	function insert_test($data) {
		$str_query = $this->db->insert_string($this->_name, $data['test_info']);
		$this->db->query($str_query);

		$testid = $this->get_last_id();

		echo "<pre>";
		print_r($data['test_question']);

		foreach ($data['test_question'] as  $key => $value) {
			$this->db->insert('question', array('testid' => $testid, 'questionid' => $value['questionid'], 'score' => $value['score']));
		}
	}

	private function get_last_id() {
		return $this->db->insert_id();
	}
}
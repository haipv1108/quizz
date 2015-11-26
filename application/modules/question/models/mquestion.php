<<<<<<< HEAD
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
		$query = $this->db->get($this->_name, $per_page, $offset);
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

	public function get_questions_with_subject_level($subject, $level) {
		$this->db->select('qb.id');
		$this->db->from('level, questionbank as qb, subject');
		$this->db->where('level.id = level');
		$this->db->where('level= ' . $level);

		$this->db->where('subject.id = subjectid');
		$this->db->where('subjectid', $subject);
		$query = $this->db->get();
		return $query->result_array();
	}
=======
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
		$query = $this->db->get($this->_name, $per_page, $offset);
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

	public function get_questions_with_subject_level($subject, $level) {
		$this->db->select('qb.id');
		$this->db->from('level, questionbank as qb, subject');
		$this->db->where('level.id = level');
		$this->db->where('level= ' . $level);

		$this->db->where('subject.id = subjectid');
		$this->db->where('subjectid', $subject);
		$query = $this->db->get();
		return $query->result_array();
	}
>>>>>>> 2f027a8c4eeb1ffe20b53bf645666342c313386a
}
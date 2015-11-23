<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mrandom extends CI_Model{
	private $_name = 'questionbank';
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function adduser($u_info){
		$this->db->insert('user', $u_info);
	}
	function addquiz_of_test($quiz_info){
		$this->db->insert('question', $quiz_info);
	}
	
	
	function add_category($cate_info){
		$this->db->insert('category', $cate_info);
	}
	function list_cate(){
		$query = $this->db->select('id')->get('category');
		return $query->result_array();
	}
	function add_level_category($level_info){
		$this->db->insert('level', $level_info);
	}
	function add_subject($subject_info){
		$this->db->insert('subject', $subject_info);
	}
	function list_subject($cate_id){
		$query = $this->db->select('id')
				->where('categoryid', $cate_id)
				->get('subject');
		return $query->result_array();
	}
	function get_level($sub_id){
		$query = $this->db->query("
								SELECT level.id FROM subject, category, level WHERE subject.id = {$sub_id} AND subject.categoryid = category.id AND category.id = level.categoryid 
								");
		return $query->result_array();
	}
	function get_categoryid($sub_id){
		$query = $this->db->select('c.id')
				->from('category as c')
				->join('subject as s', 's.categoryid = c.id')
				->where('s.id', $sub_id)
				->get();
		return $query->result_array();
	}
	function add_test($test_info){
		$this->db->insert('test', $test_info);
	}
	function add_questionbank($quiz_info){
		$this->db->insert('questionbank', $quiz_info);
	}
	function list_test(){
		$query = $this->db->select('id, subjectid, sl')->get('test');
		return $query->result_array();
	}
	function list_questionbank($sub_id){
		$query = $this->db->select('id')->where('subjectid', $sub_id)->limit(20)->get('questionbank');
		return $query->result_array();
	}
	function add_question($question_info){
		$this->db->insert('question', $question_info);
	}
	
}
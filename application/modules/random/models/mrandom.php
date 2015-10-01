<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mrandom extends CI_Model{
	private $_name = 'questionbank';
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function addquestion($quiz_info){
		$this->db->insert('questionbank', $quiz_info);
	}
	function adduser($u_info){
		$this->db->insert('user', $u_info);
	}
	function addtest($test_info){
		$this->db->insert('test', $test_info);
	}
	function addquiz_of_test($quiz_info){
		$this->db->insert('question', $quiz_info);
	}
	function addsubject($subject_info){
		$this->db->insert('subject', $subject_info);
	}
	function add_level_category($level_info){
		$this->db->insert('level', $level_info);
	}
}
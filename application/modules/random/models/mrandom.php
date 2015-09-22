<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mrandom extends CI_Model{
	private $_name = 'question';
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function addquestion($quiz_info){
		$this->db->insert($this->_name, $quiz_info);
	}
	function adduser($u_info){
		$this->db->insert($this->_name, $u_info);
	}
	function addtest($test_info){
		$this->db->insert($this->_name, $test_info);
	}
	function addquiz_of_test($test_info){
		$this->db->insert($this->_name, $test_info);
	}
	function addsubject($subject_info){
		$this->db->insert($this->_name, $subject_info);
	}
}
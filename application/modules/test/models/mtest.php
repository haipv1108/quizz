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
	//Xoa rows from question table
	function deletequestion($testid){
		$this->db->where('testid',$testid)->delete('question');
	}
}
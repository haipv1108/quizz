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


}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mhome extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function get_list_cate(){
		$query = $this->db->select('id,name')->get('category');
		if($query ->num_rows() >0)
			return $query->result_array();
		else return false;
	}
	function get_list_subject($cate_id){
		$query = $this->db->select('subject.id,subject.name, count(test.id) as sl')
				->from('subject')
				->where('categoryid',$cate_id)
				->join('category','category.id = subject.categoryid')
				->join('test','test.subjectid = subject.id')
				-> group_by(array('subject.id','subject.name'))
				->get();
		/*$query = $this->db->query("
									select subject.id,subject.name, count(test.id) as sl
									from category, subject, test
									where category.id = 1
									and category.id = subject.categoryid
									and subject.id = test.subjectid
									group by subject.id, subject.name
								");
		*/
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
	function listtest($id){
		$query = $this->db->select('test.id, test.name, level.name as level')
				->from('test')
				->where('subjectid',$id)
				->join('level','level.id = test.levelid')
				->group_by(array('level.name', 'test.name'))
				->get();
		if($query ->num_rows() >0)
			return $query->result_array();
		else return false;
	}
	function get_list_level($subjectid){
		/*$query = $this->db->select('level.id, level.name')
				->from('level')
				->join('category','category.id = level.categoryid')
				->join('subject','subject.categoryid = category.id')
				->where('subject.id',$subjectid)
				->group_by('level.name')
				->get();
		*/
		$query = $this->db->query("
								SELECT level.id, level.name FROM subject, category, level WHERE subject.id = {$subjectid} AND subject.categoryid = category.id AND category.id = level.categoryid 
								");
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
	function get_list_test($subjectid, $levelid){
		$query = $this->db->select('id, name')->where('subjectid',$subjectid)->where('levelid', $levelid)->get('test');
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
	function get_subject($id){
		$query = $this->db->select('name')->where('id',$id)->get('subject');
		if($query -> row_array()>0)
			return $query->row_array();
		else return false;	
	}

}
<?php
Class Mlevel extends CI_Model {
    private $_table_name = 'level';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_level($category_id) {
        $query = $this->db->select('id, name')->where('categoryid',$category_id)->get($this->_table_name);
        return $query->result_array();
    }

    function add_level($level_arr) {
        $str = $this->db->insert_string($this->_table_name, $level_arr);
        $this->db->query($str);
    }

    function update_level($level_arr) {
        $where = "id = ". $level_arr['id'];
        $str = $this->db->update_string($this->_table_name, $level_arr, $where);
        $this->db->query($str);
    }

    function remove_level($id) {
        $str = "DELETE FROM " . $this->_table_name . " WHERE id = " . $id;
        $this->db->query($str);
    }
	
	function get_list_level(){
		$query = $this->db->select('id,name')->get($this->_table_name);
		if($query->num_rows()>0)
			return $query->result_array();
		 return false;
	}

    function check_level_existed($name, $categoryid) {
        $query = $this->db->where('name', $name)->where('categoryid', $categoryid)->get($this->_table_name);
        return $query->num_rows() > 0? true:false;
    }
}
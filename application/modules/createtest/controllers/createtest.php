<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class CreateTest extends MX_Controller {
	private $_form_create_test1 = 'create_test';
	private $_data;
	function __construct(){
		parent::__construct();
		$this->load->model('mtest');
		$this->load->model('category/mcategory');
		$this->load->model('subject/msubject');
		$this->load->model('mtest');
		$this->load->helper(array('form_vali'));
		$this->load->helper('form');
		$this->load->helper('array');
	}

	function index(){
		$this->_data['categories'] = $this->mcategory->get_list_category();
		$this->_data['subjects'] = $this->get_subject();
		$this->load->view($this->_form_create_test1, $this->_data);
	}

	function get_subject() {
		if (isset($_POST['id'])) {
			$subjects = $this->msubject->select_subject($_POST['id']);
		} else {
			return $this->msubject->select_subject($this->_data['categories'][0]['id']);
		}

		foreach($subjects as $key => $value) {
			$id = $value['id'];
			$name = $value['name'];
			print "<option value=\"$id\">$name</option>\n";
		}
	}
}


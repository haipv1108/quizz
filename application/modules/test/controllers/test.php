<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends MX_Controller {
	private $_form_create_test1 = 'create_test_1';
	private $_form_create_test2 = 'create_test_2';

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
		$data['categories'] = $this->mcategory->get_list_category();
		$data['subjects'] = $this->msubject->select_subject(NULL);
		$this->load->view($this->_form_create_test1, $data);
	}

	function create_test() {

	}
}
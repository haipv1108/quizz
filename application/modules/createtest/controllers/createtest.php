<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class CreateTest extends MX_Controller {
	private $_form_create_test1 = 'create_test';
	private $_data ;
	private $_subs_selected = null;

	function __construct(){
		parent::__construct();
		$this->load->model('mtest');
		$this->load->model('category/mcategory');
		$this->load->model('subject/msubject');
		$this->load->model('mtest');
		$this->load->model('level/mlevel');
		$this->load->model('question/mquestion');
		$this->load->helper(array('form_vali'));
		$this->load->helper('form');
		$this->load->helper('array');

	}

	function index(){
		$this->_data['categories'] = $this->mcategory->get_list_category();
		$this->load->view($this->_form_create_test1, $this->_data);

	}

	function get_subject() {
		if (isset($_POST['cat_id']) && strcmp($_POST['cat_id'],'non_select') != 0)
		{
			$subjects = $this->msubject->select_subject($_POST['cat_id']);
		}
		print "<option value=\"non_select\">Select Subject</option>\n";
		if (strcmp($_POST['cat_id'],'non_select') == 0) {
			return;
		}
		foreach($subjects as $key => $value) {
			$id = $value['id'];
			$name = $value['name'];
			print "<option value=\"$id\">$name</option>\n";
		}
	}

	function get_level() {
		if (isset($_POST['cat_id']) && strcmp($_POST['cat_id'],'non_select') != 0) {
			$sub_id = $_POST['cat_id'];
			$levels = $this->mlevel->get_level($sub_id);
		}
		print "<option value = \"non_select\">Select Level</option>\n";
		if (strcmp($_POST['cat_id'],'non_select') == 0) {
			return;
		}

		foreach($levels as $key => $value) {
			$id = $value['id'];
			$name = $value['name'];
			print "<option value = \"$id\">$name</option>\n";
		}
	}

	function get_input() {
		$data = json_decode(stripslashes($_POST['data']));
		$input_data['test_name'] = $_POST['test_name'];
		$input_data['test_time'] = $_POST['test_time'];
		$input_data['test_des']= $_POST['test_des'];
		$input_data['category']= $_POST['category'];
		$input_data['level'] = $_POST['level'];

		$input_data['subjects'] = array();
		foreach($data as $key => $value) {
			array_push($input_data['subjects'],
				array('id' => $value->id, 'name' => $value->name, 'num_question' => $value->numQuestion));
		}

		$this->create_test($input_data);

	}

	function create_test($input_data) {
		$questionbank = array();
		foreach($input_data['subjects'] as $key => $value) {
			array_push($questionbank, $this->mquestion->get_questions_with_subject_level($input_data['subjects'][0]['id'], $input_data['level']));
		}
		echo "<pre>";
		print_r($questionbank);

	}
}


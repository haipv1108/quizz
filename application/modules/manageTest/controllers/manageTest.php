<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ManageTest extends MX_Controller {
	private $_form_create_test1 = 'create_test1';
	private $_data ;
	private $_subs_selected = null;

	function __construct(){
		
		parent::__construct();
		$this->load->model('mmanageTest');
		$this->load->model('category/mcategory');
		$this->load->model('subject/msubject');
		$this->load->model('level/mlevel');
		$this->load->model('question/mquestion');
		$this->load->helper(array('form','array','test', 'url'));
		$this->load->library('form_validation');
	}

	function index(){
	 	save_url();// Luu current_url vao session
		$user = check_login(3);
		// config pagination
		$total = $this->mmanageTest->count_all();
		$base = '/managetest/';
		$per_page = 5;
		$config = pagi_config($base, $total, $per_page);
		$this->pagination->initialize($config);
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2);
		// end pagination
		$data = array(
						'view_test' => $this->mmanageTest->viewtest($per_page,$this->uri->segment($config['uri_segment'])),
						'meta_title' => 'Manage User',
						'user' => $user,
						'total' => $total,
						'active' => 'test-view',
						'paginator' => $this->pagination->create_links(),
						'template' => 'backend/home/view_test',
					);

	 	$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
	}


	function add(){
		save_url();// Luu current_url vao session
		$user = check_login(3);
		$this->_data = array(
							'template' => 'create_test',
							'user' => $user,
							'categories' => $this->mcategory->get_list_category(),
							'active' => 'test-add',
							'meta_title' => 'Add Test'
							);
		if($this->input->post('submit')){
			vali_test();// check validate_form su dung helper
			if($this->form_validation->run() == TRUE){
				$data = json_decode(stripslashes($_POST['data']));
				$input_data = get_info_test();//get info user using helpe

				if ($input_data['categoryid'] == 'non_select') {
					echo "Chưa chọn môn học";
					return;
				}
		 		if (sizeof($data) <= 0) {
		 			$this->create_test($input_data);
		 			return;
		 		}

				foreach($data as $key => $value) {
					array_push($input_data['subjects'],
						array('id' => $value->id, 'name' => $value->name, 'num_question' => $value->numQuestion, 'score_question' => $value->scoreQuestion, 'level' => $value->level, 'level_name' => $value->levelName));
					$input_data['current_num_question'] += $value->numQuestion;
				}

				$re= $this->create_test($input_data);
				if ($re == null) {
					$this->_data['success'] = "Tao de thanh cong";
				} else {
					$this->_data['error'] = $re;
				}

			}
		}
	 	$this->load->view('admin/backend/layouts/home',isset($this->_data)?$this->_data:NULL);
	}

 	function viewTest($test_id= 0){
		save_url();// Luu current_url vao session
		$user = check_login(3);
		$data = array(
				'user' => $user,
				'meta_title' => 'View Test Detail',
				'template' => 'backend/home/viewTestDetails'
				);
		$test = $this->mmanageTest->find_test($test_id);
		if(!$test){
			$data['error'] = 'Bạn chưa tạo bài test này. ';
			$data['template'] = 'backend/home/notify';
			$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
			return;
		}
		$data['test'] = $test;
		$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
	}

	function delete($id = 0){
	 	save_url();// Luu current_url vao session
		$user = check_login(3);
		$data = array(
			'user' => $user,
			'active' => 'test-view',
			'meta_title' => 'Delete Test',
			'template' => 'backend/home/delete_test'
			);
		$test_info = $this->mmanageTest->search_test($id);
		if(!$test_info){
			$data['error'] = 'Test not found in database.';
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}else{
			$data['user_test']= $test_info;
			if($this->input->post('submit')){
				$this->form_validation->set_rules('delete', 'Delete Radio', 'required'); 
				$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
				if($this->form_validation->run() == TRUE){
					if($this->input->post('delete')=='yes'){
						$this->mmanageTest->deletetest($id);
						$data['success'] = 'You have successfully deleted.';
					}else if($this->input->post('delete') =='no'){
						$data['success'] = 'I also think you should not delete user';
					}
				}
			}
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}

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

	function create_test($input_data) {
		$i = 0;
		$test_question = array();
		$get_question_info = array();
		$question_not_enough = false;
		$num_general_question = $input_data['max_question'] - $input_data['current_num_question'];

		if (isset($input_data['subjects']) && sizeof($input_data['subjects']) > 0) {
			foreach($input_data['subjects'] as $key => $value) {
				$input_data['subjects'][$key]['questions'] = array();
				$result = $this->mquestion->get_questions_with_subject_level($value['id'], $value['level']);

				if (sizeof($result) < $value['num_question'] || $result == NULL){
					$question_not_enough = true;
					$get_question_info[$i] = "Phần học " . $value['name'] .  " với độ khó " . $value['level_name']. " không đủ câu hỏi<br>";
					++$i;
				} else if ($result != null)
					$input_data['subjects'][$key]['questions'] = $result;
			}
		}

		if ($num_general_question > 0)  {
			$result = $this->mquestion->get_questions_with_category($input_data['categoryid']);
			if (sizeof($result) < $num_general_question || $result == NULL) {
				$get_question_info[$i] = "Không đủ dữ liệu cho câu hỏi tổng hợp<br>";
				$question_not_enough = true;
				++$i;
			} else 
				$input_data['general_question_bank'] = $result;
		}

		if ($question_not_enough == true)  {
			return $get_question_info;
		}

		//random lay cau hoi
		foreach ($input_data['subjects'] as $key => $value) { // voi moi phan hoc
			$num_question = $value['num_question']; //lay so luong cau hoi trong moi phan
			$input_data['subjects'][$key]['result'] = array();
			while ($num_question > 0) { //trong khi so luong cau hoi > 0
				$question_index = rand(0,sizeof($value['questions']) - 1); //lay random tu 0 den so luong cau hoi trong phan hoc - 1
				$question_id = $value['questions'][$question_index]; //lay id cua cau hoi
				array_push($test_question, array('questionid' => $question_id['id'], 'score' => $value['score_question']));//them vao trong ket qua
 	   			array_splice($input_data['subjects'][$key]['questions'], $question_index,1);
				--$num_question ;
			}
		}


		while ($num_general_question > 0) {
			$question_index = rand(0, sizeof($input_data['general_question_bank']) - 1);
			$question_id = $input_data['general_question_bank'][$question_index];
			array_push($test_question, array('questionid' => $question_id['id'], 'score' => $input_data['general_score']));
			array_slice($input_data['general_question_bank'], $question_index);
			--$num_general_question;
		}

		//save to database
		$data['test_info']['name'] = $input_data['test_name'];
		$data['test_info']['time'] = $input_data['test_time'];
		$data['test_info']['decription']= $input_data['test_des'];
		$data['test_info']['sl'] = $input_data['max_question'];
		$data['test_info']['madethi'] = $input_data['madethi'];
		$data['test_info']['categoryid'] = $input_data['categoryid'];
		$data['test_question'] = $test_question;

		$this->mmanageTest->insert_test($data);
		echo "Thành công";
		return null;
	}

}

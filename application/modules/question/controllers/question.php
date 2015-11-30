<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Question extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mquestion');
		$this->load->helper('question');
		$this->load->model('category/mcategory');
		$this->load->model('level/mlevel');
		$this->load->model('subject/msubject');
	}
	function index(){
		save_url();// Luu current_url vao session
		$user = check_login(3);
		// config pagination
		$total = $this->mquestion->count_all();
		$base = 'question/';
		$per_page = 10;
		$config = pagi_config($base, $total, $per_page);
		$this->pagination->initialize($config);
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2);
		// end pagination
		$data = array(
						'view_question' => $this->mquestion->viewquestion($per_page, $offset),
						'meta_title' => 'View Question',
						'user' => $user,
						'total' => $total,
						'active' => 'quiz-view',
						'paginator' => $this->pagination->create_links(),
						'template' => 'view_question'
					);
		$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
	}

	function addquestion(){
		save_url();// Luu current_url vao session
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Add Question',
					'active' => 'quiz-add',
					'template' => 'add_question',
					'categories' => $this->mcategory->get_list_category()
					);
		if($this->input->post('submit')){
			vali_question();// check validate_form su dung helper
			if($this->form_validation->run() == TRUE){
				$quiz_info = get_info_question();//get info user using helper
				$this->mquestion->addquestion($quiz_info);
				$data['success'] = 'Thêm câu hỏi thành công';
				$data['template'] = 'notify';
				$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
				return;
			}
		}
		$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
	}
	function editquestion($id = 0){
		save_url();// Luu current_url vao session
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Edit Question',
					'active' => 'quiz-edit',
					'template' => 'edit_question',
					'category' => $this->mcategory->get_list_category(),
					'subject' => $this->msubject->get_list_subject(),
					'level' => $this->mlevel->get_list_level(),
					);
		$quiz_info = $this->mquestion->search_question($id);
		if(!$quiz_info){
			$data['error'] = 'Question not found in database.';
			$data['template'] = 'notify';
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
			return;
		}
		$data['quiz_info']= $quiz_info;
		if($this->input->post('submit')){
			vali_question();// check validate_form using helper
			if($this->form_validation->run() == TRUE){
				$edit_quiz = get_info_question();//get info user using helper
				$edit_quiz['id'] = $id;
				$this->mquestion->updatequestion($edit_quiz);
				$data['success'] = 'Sửa câu hỏi thành công';
				$data['template'] = 'notify';
				echo "<pre>";
								print_r($correct);
				//$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
				return;
			}
		}
		$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
	}
	function deletequestion($id = 0){
		save_url();// Luu current_url vao session
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Delete Question',
					'active' => 'quiz-delete',
					'template' => 'delete_question'
					);
		$quiz_info = $this->mquestion->search_question($id);
		if(!$quiz_info){
			$data['error'] = 'Question not found in database.';
			$data['template'] = 'notify';
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
			return;
		}
		$data['quiz_info']= $quiz_info;
		if($this->input->post('submit')){
			$this->form_validation->set_rules('delete', 'Delete Radio', 'required'); 
			$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
			if($this->form_validation->run() == TRUE){
				if($this->input->post('delete')=='yes'){
					$this->mquestion->deletequestion($id);
					$success = 'Bạn đã xóa câu hỏi thành công.';
				}else if($this->input->post('delete') =='no'){
					$success = 'Tôi cũng nghĩ bạn không nên xóa câu hỏi này.';
				}
				$data['success'] = $success;
			}
		}
		$data['template'] = 'notify';
		$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
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
}
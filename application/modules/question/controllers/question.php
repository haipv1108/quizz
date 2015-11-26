<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Question extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mquestion');
		$this->load->helper('question');
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
						'template' => 'view_question',
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
					'template' => 'add_question'
					);
		if($this->input->post('submit')){
			vali_question();// check validate_form su dung helper
			if($this->form_validation->run() == TRUE){
				$quiz_info = get_info_question();//get info user using helper
				$this->mquestion->addquestion($quiz_info);
				$success = 'Add Question in Question Bank successfully.';
				$data['success'] = $success;
			}
		}
		$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
	}
	function editquestion($id = 0){
		// co 1 loi la chua kiem tra name da thay doi roi.
		save_url();// Luu current_url vao session
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Edit Question',
					'active' => 'quiz-edit',
					'template' => 'edit_question'
					);
		$quiz_info = $this->mquestion->search_question($id);
		if(!$quiz_info){
			$data['error'] = 'Question not found in database.';
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}
		else{
			$data['quiz_info']= $quiz_info;
			if($this->input->post('submit')){
				vali_question();// check validate_form using helper
				if($this->form_validation->run() == TRUE){
					$edit_quiz = get_info_question();//get info user using helper
					$edit_quiz['id'] = $id;
					$this->mquestion->updatequestion($edit_quiz);
					$message = 'Edit Question successfully.';
					$data['success'] = $message;
				}
			}
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}
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
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}
		else{
			$data['quiz_info']= $quiz_info;
			if($this->input->post('submit')){
				$this->form_validation->set_rules('delete', 'Delete Radio', 'required'); 
				$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
				if($this->form_validation->run() == TRUE){
					if($this->input->post('delete')=='yes'){
						$this->mquestion->deletequestion($id);
						$success = 'You have successfully deleted.';
					}else if($this->input->post('delete') =='no'){
						$success = 'I also think you should not delete user';
					}
					$data['success'] = $success;
				}
			}
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}
	}
}
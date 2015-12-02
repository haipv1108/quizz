<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subject extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('subject');
		$this->load->model('msubject');
		$this->load->model('test/mtest');
		$this->load->model('category/mcategory');
	}
	function index(){
		save_url();// Luu current_url vao session
		$user = check_login(3);
		// config pagination
		$total = $this->msubject->count_all();
		$base = 'subject/';
		$per_page = 5;
		$config = pagi_config($base, $total, $per_page);
		$this->pagination->initialize($config);
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2);
		// end pagination
		$data = array(
						'view_subject' => $this->msubject->viewsubject($per_page, $offset),
						'meta_title' => 'Manage Subject',
						'user' => $user,
						'total' => $total,
						'active' => 'subject-view',
						'paginator' => $this->pagination->create_links(),
						'template' => 'view_subject',
					);
		$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
	}
	function addsubject(){
		save_url();// Luu current_url vao session
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Add Subject',
					'active' => 'subject-add',
					'list_category'=>$this->mcategory->get_list_category(),
					'template' => 'add_subject'
					);
		if($this->input->post('submit')){
			vali_subject();// check validate_form su dung helper
			if($this->form_validation->run() == TRUE){
				$subject_info = get_info_subject();//get info user using helper
				$check_name = $this->msubject->check_name($subject_info['name']);
				if(!$check_name){
					$error = 'Subject Name is available';
					$data['error'] = $error;
				}else{
					$this->msubject->addsubject($subject_info);
					$success = 'Add Subject successfully.';
					$data['success'] = $success;
				}
			}
		}
		$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
	}
	function editsubject($id = 0){
		save_url();// Luu current_url vao session
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Edit Subject',
					'active' => 'subject-edit',
					'list_category'=>$this->msubject->get_list_category(),
					'template' => 'edit_subject'
					);
		$subject_info = $this->msubject->search_subject($id);
		if(!$subject_info){
			$data['error'] = 'Subject not found in database.';
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}
		else{
			$data['subject_info']= $subject_info;
			if($this->input->post('submit')){
				vali_subject();// check validate_form su dung helper
				if($this->form_validation->run() == TRUE){
					$new_cate = get_info_subject();//get info user using helper
					$new_subject['id'] = $id;
					$this->msubject->updatesubject($new_subject);
					$message = 'Edit Subject successfully.';
					$data['success'] = $message;
				}
			}
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}
	}
	function deletesubject($id = 0){
		save_url();// Luu current_url vao session
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Delete Subject',
					'active' => 'subject-delete',
					'template' => 'delete_subject'
					);
		$subject_info = $this->msubject->search_subject($id);
		if(!$subject_info){
			$data['error'] = 'Subject not found in database.';
			$data['template'] = 'notify';
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
			return;
		}
		$data['subject_info']= $subject_info;
		if($this->input->post('submit')){
			$this->form_validation->set_rules('delete', 'Delete Radio', 'required'); 
			$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
			if($this->form_validation->run() == TRUE){
				if($this->input->post('delete')=='yes'){
					$this->msubject->deletesubject($id);
					$success = 'You have successfully deleted.';
				}else if($this->input->post('delete') =='no'){
					$success = 'I also think you should not delete Subject';
				}
				$data['success'] = $success;
				$data['template'] = 'notify';
				$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
				return;
			}
		}
		$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
	}
}
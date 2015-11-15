<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('madmin');
		$this->load->helper(array('form_vali'));
		$this->load->library(array('email'));
	 }
	 
	function index()
	{
		$user = check_login(3);
		// config pagination
		$total = $this->madmin->count_all();
		$base = '/admin/';
		$per_page = 5;
		$config = pagi_config($base, $total, $per_page);
		$this->pagination->initialize($config);
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2);
		// end pagination
		$data = array(
						'view_user' => $this->madmin->viewuser($per_page,$this->uri->segment($config['uri_segment'])),
						'meta_title' => 'Manage User',
						'user' => $user,
						'total' => $total,
						'active' => 'admin-view',
						'paginator' => $this->pagination->create_links(),
						'template' => 'backend/home/view_user',
					);
		$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
	}
	function adduser(){
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Add User',
					'active' => 'admin-add',
					'template' => 'backend/home/add_user'
					);
		if($this->input->post('submit')){
			vali_user();// check validate_form su dung helper
			if($this->form_validation->run() == TRUE){
				$u_info = get_info_user();//get info user using helper
				$u_info['active'] = 0;
				$error = '';
				$check_name = $this->madmin->check_name($u_info['name']);
				if(!$check_name){
					$error = 'User Name is available';
				}else{
					$check_mail = $this->madmin->check_mail($u_info['email']);
					if(!$check_mail){
						$error = 'Email is available';
					}else{
						$this->madmin->adduser($u_info);
						$success = 'Add User successfully.';
						$data['success'] = $success;
					}
				}
				$data['error'] = $error;
			}
		}
		$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
	}
	function edituser($id = 0){
		// co 1 loi la chua kiem tra name da thay doi roi.
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Edit User',
					'active' => 'admin',
					'template' => 'backend/home/edit_user'
					);
		$user_info = $this->madmin->search_user($id);
		if(!$user_info){
			$data['error'] = 'User not found in database.';
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
		else{
			$data['user_info']= $user_info;
			if($this->input->post('submit')){
				vali_user();// check validate_form su dung helper
				if($this->form_validation->run() == TRUE){
					$u_info = get_info_user();//get info user using helper
					$u_info['id'] = $id;
					$this->madmin->updateuser($u_info);
					$message = 'Edit user successfully.';
					$data['success'] = $message;
				}
			}
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
	}
	function deleteuser($id = 0){
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Delete User',
					'active' => 'admin',
					'template' => 'backend/home/delete_user'
					);
		$user_info = $this->madmin->search_user($id);
		if(!$user_info){
			$data['error'] = 'User not found in database.';
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
		else{
			$data['user_info']= $user_info;
			if($this->input->post('submit')){
				$this->form_validation->set_rules('delete', 'Delete Radio', 'required'); 
				$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
				if($this->form_validation->run() == TRUE){
					if($this->input->post('delete')=='yes'){
						$this->madmin->deleteuser($id);
						$data['success'] = 'You have successfully deleted.';
					}else if($this->input->post('delete') =='no'){
						$data['success'] = 'I also think you should not delete user';
					}
				}
			}
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
	}
}
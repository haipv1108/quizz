<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mprofile');
		$this->load->helper(array('form_vali'));
	 }
	 
	function index(){
		$this->load->view('backend/layouts/home');
	}

function edit($id = 1){
		// co 1 loi la chua kiem tra name da thay doi roi.
		//$user = check_login(2)||check_login(1);
		$data = array(
					//'user' => $user,
					'meta_title' => 'Manage Profile',
					'template' => 'backend/home/edit'
					);
		$user_info = $this->mprofile->search_user($id);
		if(!$user_info){
			$data['error'] = 'User not found in database.';
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
		else{
			$data['user_info']= $user_info;
			if($this->input->post('submit')){
				profile();// check validate_form su dung helper
				if($this->form_validation->run() == TRUE){
					$u_info = get_info_user();//get info user using helper
					$u_info['id'] = $id;
					$u_info['name'] = $user_info['name'];
					$u_info['level'] = $user_info['level'];
					print_r($u_info);
					$this->mprofile->updateuser($u_info);
					$message = 'Edit user successfully.';
					$data['success'] = $message;
				}
			}
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
	}
	
}
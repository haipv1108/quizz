<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class Verify extends MX_Controller{ 
		public function __construct(){ 
			parent::__construct(); 
			$this->load->helper(array('form', 'url', 'cookie')); 
			$this->load->library(array('form_validation','session')); 
			$this->load->model(array('mverify')); 
		} 
		public function index(){
			$user = $this->session->userdata('user');
			if($user['logged_in']){
				$a_UserInfo['user'] = $this->session->userdata('user'); 
				redirect(base_url().'member');
			}else{
				redirect(base_url().'home/login');
			}
		} 
		public function login(){ 
			$this->form_validation->set_rules('username', 'Username', 'trim|required'); 
			$this->form_validation->set_rules('password', 'Password', 'required'); 
			$this->form_validation->set_error_delimiters('<div style="color: red; font-weight: bold">', '</div>');
			if($this->form_validation->run() == TRUE){
				$u_info = array(
									'name' => $this->input->post('username'),
									'password' => md5($this->input->post('password'))
								);
				$check = $this->mverify->check_user($u_info); 
				if($check){
					$data = array(
									'id' => $check['id'],
 									'name' => $check['name'],
									'email' => $check['email'],
									'level'	=> $check['level'],
									'logged_in'	=> TRUE
								);
					$this->session->set_userdata('user', $data); 
					if($check['level'] == 3)
						redirect(base_url().'admin'); 
					/*else if($check['level'] == 2)
						redirect(base_url().'member'); */
					else redirect(site_url());
				} else{ 
					$error['error'] = 'Username or Password error.';
				} 
			}
			$this->load->view('login', isset($error)?$error: NULL); 
		} 
		public function logout(){ 
			$this->session->sess_destroy();	// Unset session of user 
			redirect(base_url().'verify/login'); 
		} 
}
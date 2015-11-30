<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('madmin');
	}
	function check_user_availablity(){
		$username = $this->input->post('username');
		$check_name = $this->madmin->check_name_availablity($username);
		
		if($check_name)
			echo 'true';
		else
			echo 'false';
	}
	function check_email_availablity(){
		$email = $this->input->post('email');
		$check_email = $this->madmin->check_email_availablity($email);
		
		if($check_email)
			echo 'true';
		else
			echo 'false';
	}
}

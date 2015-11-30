<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('msubject');
	}
	function check_subject_availablity(){
		$name = $this->input->post('name');
		$check_name = $this->msubject->check_subject_availablity($name);
		
		if($check_name)
			echo 'true';
		else
			echo 'false';
	}
}

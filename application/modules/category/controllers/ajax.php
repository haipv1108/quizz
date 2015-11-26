<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mcategory');
	}
	function check_category_availablity(){
		$name = $this->input->post('name');
		$check_name = $this->mcategory->check_category_availablity($name);
		
		if($check_name)
			echo 'true';
		else
			echo 'false';
	}
}

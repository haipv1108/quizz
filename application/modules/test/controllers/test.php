<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mtest');
		$this->load->helper(array('form_vali'));
	}
	function index(){
		
	}
}
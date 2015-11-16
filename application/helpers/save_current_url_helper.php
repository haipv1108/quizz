<?php defined('BASEPATH') OR exit('No direct script access allowed');
if (!function_exists('save_url')){
	function save_url(){
		$ci = &get_instance();
		$data = array(
					'current_url' => 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']
					);
		$ci->session->set_userdata('current_url', $data); 
	}
}
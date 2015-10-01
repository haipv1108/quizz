<?php defined('BASEPATH') OR exit('No direct script access allowed');
if (!function_exists('template')){
	function template($link, $data){
		$ci = & get_instance();
		$ci->load->view($link,isset($data)?$data:NULL);
	}
}
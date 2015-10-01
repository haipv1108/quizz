<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('check_login')){
	function check_login($level = 1){
		$ci = &get_instance();
		$user = $ci->session->userdata('user');
		if($user['logged_in'] && $user['level'] ==$level){
			$user = $ci->session->userdata('user');
			return $user;
		}
		else redirect(base_url().'verify/login');
	}
}

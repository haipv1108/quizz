<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('profile_user')){
	function profile(){
		$ci = &get_instance();
		$ci->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$ci->form_validation->set_rules('gender', 'Gender', 'required');
		$ci->form_validation->set_rules('birthday', 'Birthday', 'required');
		$ci->form_validation->set_rules('address', 'Address', 'required|min_length[1]');
		$ci->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
	}
}

if(!function_exists('info_user')){
	function info_user(){
		$ci = &get_instance();
		$json_string = array(
							'birthday' => $ci->input->post('birthday'),
							'gender' => $ci->input->post('gender'),
							'address' => $ci->input->post('address')
							);
		$extra_info = json_encode($json_string);
		$u_info = array(
							'email' => $ci->input->post('email'),
							'extra_info' => $extra_info
						);
		return $u_info;
	}
}


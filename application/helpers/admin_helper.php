<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//user
if(!function_exists('vali_user')){
	function vali_user(){
		$ci = &get_instance();
		$ci->form_validation->set_rules('username', 'User Name', 'required|min_length[5]|max_length[40]'); 
		$ci->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$ci->form_validation->set_rules('password', 'Password', 'required|matches[passconf]'); 
		$ci->form_validation->set_rules('passconf', 'Password Confirmation', 'required'); 
		$ci->form_validation->set_rules('gender', 'Gender', 'required');
		$ci->form_validation->set_rules('birthday', 'Birthday', 'required');
		$ci->form_validation->set_rules('level', 'Level', 'required'); 
		$ci->form_validation->set_rules('address', 'Address', 'required|min_length[1]');
		$ci->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
	}
}
if(!function_exists('get_info_user')){
	function get_info_user(){
		$ci = &get_instance();
		$json_string = array(
							'birthday' => $ci->input->post('birthday'),
							'gender' => $ci->input->post('gender'),
							'address' => $ci->input->post('address')
							);
		$extra_info = json_encode($json_string);
		$u_info = array(
							'name' => $ci->input->post('username'),
							'email' => $ci->input->post('email'),
							'password' => md5($ci->input->post('password')),
							'level' => $ci->input->post('level'),
							'active' => 1,
							'extra_info' => $extra_info
						);
		return $u_info;
	}
}
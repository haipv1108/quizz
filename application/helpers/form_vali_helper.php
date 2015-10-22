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
if(!function_exists('profile_user')){
	function profile(){
		$ci = &get_instance();
		$ci->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$ci->form_validation->set_rules('password', 'Password', 'required|matches[passconf]'); 
		$ci->form_validation->set_rules('passconf', 'Password Confirmation', 'required'); 
		$ci->form_validation->set_rules('gender', 'Gender', 'required');
		$ci->form_validation->set_rules('birthday', 'Birthday', 'required');
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
							'extra_info' => $extra_info
						);
		return $u_info;
	}
}


//category
if(!function_exists('vali_category')){
	function vali_category(){
		$ci = &get_instance();
			$ci->form_validation->set_rules('name', 'Name Category', 'required|min_length[5]|max_length[100]'); 
			$ci->form_validation->set_rules('decription', 'Decription', 'required|min_length[5]|max_length[100]');
			$ci->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
	}
}
if(!function_exists('get_info_category')){
	function get_info_category(){
		$ci = &get_instance();
		$cate_info = array(
							'name' => $ci->input->post('name'),
							'decription' => $ci->input->post('decription')
						);
		return $cate_info;
	}
}
//question
if(!function_exists('vali_question')){
	function vali_question(){
		$ci = &get_instance();
		$ci->form_validation->set_rules('question', 'User Question', 'required|min_length[1]'); 
		$ci->form_validation->set_rules('answerA', 'Answer A', 'required');
		$ci->form_validation->set_rules('answerB', 'Answer B', 'required');
		$ci->form_validation->set_rules('answerC', 'Answer C', 'required');
		//$ci->form_validation->set_rules('answerD', 'Answer D', 'required');
		$ci->form_validation->set_rules('level', 'Level', 'required');
		$ci->form_validation->set_rules('correct', 'Correct', 'required');
		$ci->form_validation->set_rules('ans_explained', 'Answer Explained', 'required|min_length[1]');
		$ci->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
	}
}
if(!function_exists('get_info_question')){
	function get_info_question(){
		$ci = &get_instance();
		$json_string = array(
								"answerA" => $ci->input->post('answerA'),
								"answerB" => $ci->input->post('answerB'),
								"answerC" => $ci->input->post('answerC'),
								"answerD" => $ci->input->post('answerD')
							);
		$answer = json_encode($json_string);
		$quiz_info = array(
							'question' => $ci->input->post('question'),
							'answer' => $answer,
							'level' => $ci->input->post('level'),
							'correct' => $ci->input->post('correct'),
							'ans_explained' => $ci->input->post('ans_explained'),
						);
		return $quiz_info;
	}
}
//subject
if(!function_exists('vali_subject')){
	function vali_subject(){
		$ci = &get_instance();
			$ci->form_validation->set_rules('name', 'Subject Name', 'required|min_length[3]|max_length[30]'); 
			$ci->form_validation->set_rules('category', 'Category Name', 'required'); 
			$ci->form_validation->set_rules('decription', 'Decription', 'required|min_length[5]|max_length[100]');
			$ci->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
	}
}
if(!function_exists('get_info_subject')){
	function get_info_subject(){
		$ci = &get_instance();
		$subject_info = array(
							'categoryid' => $ci->input->post('category'),
							'name' => $ci->input->post('name'),
							'decription' => $ci->input->post('decription')
						);
		return $subject_info;
	}
}
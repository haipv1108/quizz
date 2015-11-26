<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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
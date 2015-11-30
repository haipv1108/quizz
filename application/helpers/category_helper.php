<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('vali_test')){
	function vali_test(){
		$ci = &get_instance();
		$ci->form_validation->set_rules('test_name', 'Tên đề thi', 'required'); 
		$ci->form_validation->set_rules('test_time', 'Thời gian', 'required'); 
		$ci->form_validation->set_rules('test_des', 'Mô tả đề test', 'required');
		$ci->form_validation->set_rules('category', 'Môn học', 'required');
		$ci->form_validation->set_rules('max_question', 'Số lượng câu hỏi', 'required'); 
		$ci->form_validation->set_rules('madethi', 'Mã đề thi', 'required');
		$ci->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
	}
}

if(!function_exists('get_info_test')){
	function get_info_test(){
		$ci = &get_instance();
		$quiz_info = array(
							'test_name' => $ci->input->post('test_name'),
							'test_time' => $ci->input->post('test_time'),
							'test_des' => $ci->input->post('test_des'),
							'category' => $ci->input->post('category'),
							'max_question' => $ci->input->post('max_question'),
							'madethi' => $ci->input->post('madethi'),
							'current_num_question' => 0,
							'subjects' => array(),
						);
		return $quiz_info;
	}
}
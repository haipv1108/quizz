<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once getcwd() . "\application\modules\manageTest\models\mmanageTest.php";

if(!function_exists('vali_test')){
	function vali_test(){
		$ci = &get_instance();
		$ci->form_validation->set_rules('test_name', 'Tên đề thi', 'required'); 
		$ci->form_validation->set_rules('test_time', 'Thời gian', 'required|integer'); 
		$ci->form_validation->set_rules('test_des', 'Mô tả đề test', 'required');
		$ci->form_validation->set_rules('category', 'Môn học', 'required|valid_category');
		$ci->form_validation->set_rules('max_question', 'Số lượng câu hỏi', 'required|not_zero|integer'); 
		$ci->form_validation->set_rules('madethi', 'Mã đề thi', 'required|valid_madethi');
		$ci->form_validation->set_rules('general_score', 'Điểm câu hỏi tổng hợp', 'required|not_zero|integer');
		$ci->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
	}

	function not_zero($id) {
		$ci = &get_instance();
		if ($id <= 0) {
			$ci->form_validation->set_message('not_zero', '{field} không thể nhỏ hơn 0');
			return false;
		} else {
			return true;
		}
	}

	function valid_category($id) {
		$ci = &get_instance();
		if ($id == 'non_select') {
			$ci->form_validation->set_message('valid_category', '{field} chưa được chọn');
			return false;
		} else {
			return true;
		}	
	}

	function valid_madethi($madethi) {
		$ci = &get_instance();
		$mmanageTest = new MmanageTest();
		if ($mmanageTest->check_made_existed($madethi) == true) {
			$ci->form_validation->set_message('valid_madethi', '{field} đã tồn tại!');
			return false;
		} else {
			return true;
		}
	}
} 


if(!function_exists('get_info_test')){
	function get_info_test(){
		$ci = &get_instance();
		$test_info = array(
							'test_name' => $ci->input->post('test_name'),
							'test_time' => $ci->input->post('test_time'),
							'test_des' => $ci->input->post('test_des'),
							'categoryid' => $ci->input->post('category'),
							'max_question' => $ci->input->post('max_question'),
							'madethi' => $ci->input->post('madethi'),
							'current_num_question' => 0,
							'general_score' => $ci->input->post('general_score'),
							'subjects' => array(),
						);
		return $test_info;
	}
}
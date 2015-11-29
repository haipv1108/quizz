<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//question
if(!function_exists('vali_question')){
	function vali_question(){
		$ci = &get_instance();
		$ci->form_validation->set_rules('category', 'Môn học', 'required'); 
		$ci->form_validation->set_rules('subject', 'Phần học', 'required'); 
		$ci->form_validation->set_rules('level', 'Mức độ', 'required');
		$ci->form_validation->set_rules('type', 'Loại câu hỏi', 'required');
		$ci->form_validation->set_rules('question', 'Nội dung câu hỏi', 'required|min_length[1]'); 
		$ci->form_validation->set_rules('answer[]', 'Đáp án', 'required');
		$ci->form_validation->set_rules('correct[]', 'Câu trả lời', 'required');
		$ci->form_validation->set_rules('ans_explained', 'Giải thích câu trả lời', 'required|min_length[1]');
		$ci->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
	}
}
if(!function_exists('get_info_question')){
	function get_info_question(){
		$ci = &get_instance();
		$answer = $ci->input->post('answer');
		$correct = $ci->input->post('correct');
		$ans_json = array_for_json($answer);
		$corr_json = array_for_json($correct);
		$quiz_info = array(
							'categoryid' => $ci->input->post('category'),
							'subjectid' => $ci->input->post('subject'),
							'level' => $ci->input->post('level'),
							'type' => $ci->input->post('type'),
							'question' => $ci->input->post('question'),
							'answer' => $ans_json,
							'level' => $ci->input->post('level'),
							'correct' => $corr_json,
							'ans_explained' => $ci->input->post('ans_explained'),
						);
		return $quiz_info;
	}
}

if(!function_exists('array_for_json')){
	function array_for_json($array_string){
		$array = array();
		$j = 1;
		for ($i = 0; $i < sizeof($array_string); ++$i) {
			array_push($array, array($j++  => $array_string[$i]));
		}
		$arr_json = json_encode($array);
		return $arr_json;
	}
}
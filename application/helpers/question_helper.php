<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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
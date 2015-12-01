<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends MX_Controller {
	private $_form_create_test1 = 'create_test_1';
	private $_form_create_test2 = 'create_test_2';

	function __construct(){
		parent::__construct();
		$this->load->model('mtest');
		$this->load->model('category/mcategory');
		$this->load->model('subject/msubject');
		$this->load->model('mtest');
		$this->load->helper();
		$this->load->helper('form');
		$this->load->helper('array');
	}
	function index(){
		redirect(base_url());
	}

	function testdetail($testid = 0){
		save_url();
		$user = check_login12(1,2);
		$data = array(
				'user' => $user,
				'meta_title' => 'Test Detail',
				);
		$test = $this->mtest->get_test_detail($testid);
		if(!$test){
			$data['error'] = 'Không có đề thi trong hệ thống';
			$data['template'] = 'home/notify'; 
			$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
			return;
		}
		$data['test'] = $test;
		$data['test_info'] = $this->mtest->get_test_info($testid);
		if($this->input->post('submit')){
			$result['answer'] = $this->input->post('answer');
			$result['test'] = $data['test'];
			$responses = array(
					"userid" => $user['id'],
					"testid" => $testid,
				);
			$this->result($result,$responses);
			return;
		}
		$data['template'] = 'home/testdetail'; 
		$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
	}
// One True All Score <tyrpe = 1>
	private function markScoreForAQuestionOTAS($answer_choice,$answer_true){
		foreach ($answer_choice as $key => $value) {
			if(!in_array($value, $answer_true))
				return 0;
		}
		return 1;
	}
// Part True Part Score <type = 2>
	private function markScoreForAQuestionPTPS($answer_choice,$answer_true){
		$total_anstrue = 0;
		$total_choice = 0;
		$score = 0;
		foreach ($answer_true as $key => $value) {
			$total_anstrue+=1;
		}
		foreach ($answer_choice as $key => $value) {
			if(!in_array($value, $answer_true))
				return 0;
			$total_choice +=1;
		}
		return $total_choice/$total_anstrue;
	}
// All True All Score <type = 3>
	private function markScoreForAQuestionATAS($answer_choice,$answer_true){
		$total_anstrue = 0;
		$total_choice = 0;
		$score = 0;
		foreach ($answer_true as $key => $value) {
			$total_anstrue+=1;
		}
		foreach ($answer_choice as $key => $value) {
			if(!in_array($value, $answer_true))
				return 0;
			$total_choice +=1;
		}
		if($total_anstrue == $total_choice)
			return 1;
		else
			return 0;
	}


	function result($result,$responses){		
			$Score = 0;
			$totalScore = 0;
			$ans;
			foreach ($result['test'] as $key => $value) {
				$true_ans = json_decode($value['correct'],true);
				if(!empty($result['answer'][$key])){
					if($value['type'] == 1)
						$partScore = $this->markScoreForAQuestionOTAS($result['answer'][$key],$true_ans);
					else if($value['type'] == 2)
						$partScore = $this->markScoreForAQuestionPTPS($result['answer'][$key],$true_ans);
					else
						$partScore = $this->markScoreForAQuestionATAS($result['answer'][$key],$true_ans);
					$Score += $partScore*$value['score'];
				}
				$totalScore += $value['score'];
			}
				$responses['score'] =  round($Score/ $totalScore,3);
				$responses['answer_choice'] = json_encode($result['answer']);
				if(isset($responses['answer_choice']))
					$this->mtest->addtest($responses);
				
		if(!$this->input->post('submit_rs')){
			$data['totalScore'] = $totalScore;
			$data['score'] = $Score;
			$data['meta_title'] = 'result';
			$data['template'] = 'home/result';			
			$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
		}else{
			redirect(base_url());
		}
	}
	
	function printTest($testid = 0){
		// kiem tra testid co ton tai khong?
		$check_test = $this->mtest->get_test_detail($testid);
		if(!$check_test){
			$data['error'] = 'Không có đề thi trong hệ thống.';
			$data['template'] = 'home/notify'; 
			$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
			return;
		}
		$data['test'] = $check_test;
		$data['test_info'] = $this->mtest->get_test_info($testid);
		$this->load->view('home/printTest',isset($data)?$data:NULL);
	}
	
	
}
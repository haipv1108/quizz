<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mprofile');
		$this->load->model('test/mtest');
		$this->load->helper('profile');
	 }
	 
	function index(){
		save_url();// Luu current_url vao session
		$user = check_login12(1,2);
		$data = array(
				'user' => $user,
				'template' => 'home/index'
			);		
		$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
	}

	function edit(){
		save_url();// Luu current_url vao session
		$user = check_login12(1,2);
		$data = array(
					'user' => $user,
					'meta_title' => 'Manage Profile',
					'template' => 'home/edit'
					);
		$user_info = $this->mprofile->search_user($user['id']);
		if(!$user_info){
			$data['error'] = 'User not found in database.';
			$data['template'] = 'home/notify';
			$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
			return;
		}
		$data['user_info']= $user_info;
		if($this->input->post('submit')){
			profile();
			if($this->form_validation->run() == TRUE){
				$u_info = info_user();
				$u_info['id'] = $user['id'];
				$this->mprofile->updateuser($u_info);
				$data['success'] = 'Cập nhật thông tin tài khoản thành công';
				$data['template'] = 'home/notify';
				$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
				return;
			}
		}
		$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
	}

	function review_test(){
		save_url();// Luu current_url vao session
		$user = check_login(1);
		$tests = $this->mprofile->gettests($user['id']);
		$data = array(
			'user' => $user,
			'meta_title' => 'Review Test',
			'template' => 'home/review',
			'tests' => $tests,
			);
		$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
	}

	function detailtest($responses_id= 0){
		save_url();// Luu current_url vao session
		$user = check_login(1);
		$data = array(
				'user' => $user,
				'meta_title' => 'Review Test Detail',
				'template' => 'home/reviewDetail'
				);
		$responses = $this->mprofile->check_testid_by_user($responses_id, $user['id']);
		if(!$responses){
			$data['error'] = 'Bạn chưa làm bài test này. ';
			$data['template'] = 'home/notify';
			$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
			return;
		}
		$test = $this->mprofile->get_test_detail($responses['testid']);
		$data['test'] = $test;
		$data['score'] = $responses['score'];
		$data['answer_choosen'] = json_decode($responses['answer_choice']);
		$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
	}

	function choose_test(){
		save_url();// Luu current_url vao session
		$user = check_login(2);
		$data = array(
			'user' => $user,
			'meta_title' => 'Choose Test',
			'template' => 'home/choose_test'
			);
		if($this->input->post('submit')){
			$this->form_validation->set_rules('test','Test Name','required|min_length[1]|max_length[10]');
			if($this->form_validation->run() == TRUE){
				$test = $this->input->post('test'); //id, ma de thi, name
				$test_result = $this->mprofile->find_test($test);
				if(!$test_result){
					$data['message'] = "Không có đề nào trong hệ thống.";
				}else{
					$data['listtest'] = $test_result;
				}				
			}
		}
		$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
	}

	function mark($testid){	
		save_url();// Luu current_url vao session
		$user = check_login(2);

		$data = array(
			'user' =>$user,
			'meta_title' => 'Mark',
			'test' => $this->mtest->get_test_detail($testid)
			);
		if($this->input->post('submit')){
			$result['answer'] = $this->input->post('answer');
			$result['test'] = $data['test'];
			$this->displayResult($result);
		}
		$data['template'] = 'home/mark';	
		$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
	}
	
	function displayResult($result){
		save_url();// Luu current_url vao session
		$user = check_login(2);
		$score = 0;
		$totalScore =0;
		foreach ($result['test'] as $key => $value) {
			$true_ans = json_decode($value['correct'],true);
			if(!empty($result['answer'][$key])){
				if($value['type'] == 1)
					$partScore = $this->markScoreForAQuestionOTAS($result['answer'][$key],$true_ans);
				else if($value['type'] == 2)
					$partScore = $this->markScoreForAQuestionPTPS($result['answer'][$key],$true_ans);
				else
					$partScore = $this->markScoreForAQuestionATAS($result['answer'][$key],$true_ans);
				$score += $partScore*$value['score'];
			}
			$totalScore += $value['score'];
		}
		if(!$this->input->post('submit_rs')){
			$data = array(
					'user' => $user,
					'totalScore' => $totalScore,
					'score' => $score,
					'meta_title' => 'Result',
					'template' => 'home/result'
				);			
			$this->load->view('home/frontend/layouts/home',isset($data)?$data:NULL);
		}else{
			redirect(base_url());
		}
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
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mprofile');
		$this->load->helper(array('form_vali'));
	 }
	 
	function index(){
		save_url();// Luu current_url vao session
		$user = check_login12(1,2);
		$data = array(
				'user' => $user
			);		
		$this->load->view('layouts/home',isset($data)?$data:NULL);
	}

	function edit($id = 1){
		save_url();// Luu current_url vao session
		$user = check_login12(1,2);
		$data = array(
					'user' => $user,
					'meta_title' => 'Manage Profile',
					'template' => 'home/edit'
					);
		$user_info = $this->mprofile->search_user($id);
		if(!$user_info){
			$data['error'] = 'User not found in database.';
			$this->load->view('layouts/home',isset($data)?$data:NULL);
		}
		else{
			$data['user_info']= $user_info;
			if($this->input->post('submit')){
				profile();
				if($this->form_validation->run() == TRUE){
					$u_info = get_info_user();
					$u_info['id'] = $id;
					$u_info['name'] = $user_info['name'];
					$u_info['level'] = $user_info['level'];
					print_r($u_info);
					$this->mprofile->updateuser($u_info);
					$message = 'Edit user successfully.';
					$data['success'] = $message;
				}
			}
			$this->load->view('layouts/home',isset($data)?$data:NULL);
		}
	}

	function review_test(){
		$user = check_login(1);
		$tests = $this->mprofile->gettests($user['id']);
		$data = array(
			'user' => $user,
			'meta_title' => 'Review Test',
			'template' => 'home/review',
			'tests' => $tests,
			);
		$this->load->view('layouts/home',isset($data)?$data:NULL);
	}

	function detailtest($responses_id){
		$user = check_login(1);
		if(!isset($responses_id)||!is_numeric($responses_id))
			redirect(base_url());
		$responses = $this->mprofile->get_answer($responses_id);
		$test = $this->mprofile->get_test_detail($responses['testid']);
		$data = array(
			'user' => $user,
			'test' =>$test,
			'score' => $responses['score'],
			'answer_choosen' => json_decode($responses['answer_choice']),
			'meta_title' => 'Review Test Detail',
			'template' => 'home/reviewDetail'
			);
		$this->load->view('layouts/home',isset($data)?$data:NULL);
	}

	function choose_test(){
		$user = check_login(2);
		$data = array(
			'user' => $user,
			'meta_title' => 'Choose Test',
			'template' => 'home/choose_test'
			);
		if(!$this->input->post('submit_choosetest')&&!$this->input->post('submit_mark')){
		}else{
			$this->form_validation->set_rules('choose','choose','required|min_length[5]|max_length[10]');
			if($this->form_validation->run() == TRUE){
				if($this->mprofile->find_testid($this->input->post('choose')) == TRUE)
					redirect(base_url()."profile/profile/mark/".$this->input->post('choose'));
				else {
					$data['message'] = "test name is not exists";
				}
			}
		}
		$this->load->view('layouts/home',isset($data)?$data:NULL);
	}

	function mark($test_name){		
		save_url();
		$user = check_login(2);

		$data = array(
			'user' =>$user,
			'meta_title' => 'Mark',
			'test' => $this->mprofile->get_test_detail_from_testname($test_name)
			);
		
		if(!$this->input->post('submit')&&!$this->input->post('submit_rs')){
			$data['template'] = 'home/mark';	
			$this->load->view('layouts/home',isset($data)?$data:NULL);
		}else{
			$result['answer'] = $this->input->post('answer');
			$result['test'] = $data['test'];
			$this->displayResult($result);
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
	
	function displayResult($result){
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
			$this->load->view('layouts/home',isset($data)?$data:NULL);
		}else{
			redirect(base_url());
		}
	}



}
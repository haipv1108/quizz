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

	function detailtest($testid){
		$user = check_login(1);
		if(!isset($testid)||!is_numeric($testid))
			redirect(base_url());
		$answer = $this->mprofile->get_answer($testid);
		$test = $this->mprofile->get_test_detail($testid);
		$data = array(
			'test' => $test,
			'answer' => json_decode($answer['answer_choice']),
			'meta_title' => 'Review Test Detail',
			'template' => 'home/reviewDetail'
		);
		$this->load->view('layouts/home',isset($data)?$data:NULL);
	}

	function choose_test(){
		$data = array(
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
		$user = check_login(2);	
		$test = $this->mprofile->get_test_detail_from_testname($test_name);

		if(!$this->input->post('submit_mark')&&!$this->input->post('submit_rs')){
			$data = array(
				'user' =>$user,
				'meta_title' => 'Mark',
				'template' => 'home/mark',
				);
			if(isset($test)) $data['test'] = $test;
			$this->load->view('layouts/home',isset($data)?$data:NULL);
		}else{
			$this->displayResult($test);
		}
	}

	function displayResult($test){
		$answer = $this->input->post('answer');
		$total_score = 0; $total_question = 0;
		$score = 0; $correct_question = 0;
		foreach ($test as $key => $value) {
			$total_score += $value['score'];
			$total_question+=1;
			if( isset($answer[$key]) && $answer[$key] == $value['correct']){
				$score +=$value['score'];
				$correct_question +=1;
			}
		}
		$result = array(
				'correct_question' => $correct_question,
				'total_question' => $total_question,
				'score' => $score*10/$total_score
			);
		if(!$this->input->post('submit_rs')){
			$data['result'] = $result;
			$data['meta_title'] = 'result';
			$data['template'] = 'home/result';			
			$this->load->view('layouts/home',isset($data)?$data:NULL);
		}else{
			redirect(base_url()."profile");
		}
	}


}
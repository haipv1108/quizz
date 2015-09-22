<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Random extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mrandom');
		$this->load->helper(array('rand'));
	}
	function index(){//sinh do dong cau hoi
		for($i = 0; $i < 3000; $i++){
			$quiz_info = random_quiz();
			$this->mrandom->addquestion($quiz_info);
		}
		echo 'Thanh cmn cong';
	}
	function randomuser(){//sinh tu dong nguoi dung
		for($i = 0; $i < 3000; $i++){
			$u_info = random_user();
			$this->mrandom->adduser($u_info);
		}
		echo 'Thanh cmn cong';
	}
	function random_test(){//sinh tu dong ten de
		for($i = 0; $i < 400; $i++){
			$test_info = random_test();
			$this->mrandom->addtest($test_info);
		}
		echo 'Thanh cmn cong';
	}
	function random_quiz_of_test(){
		for($i = 0; $i < 2000; $i++){
			$test_info = random_quiz_of_test();
			$this->mrandom->addquiz_of_test($test_info);
		}
		echo 'Thanh cmn cong';
	}
	function random_subject(){
		for($i = 0; $i < 40; $i++){
			$subject_info = random_subject();
			$this->mrandom->addsubject($subject_info);
		}
		echo 'Thanh cmn cong';
	}
}
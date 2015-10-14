<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Random extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mrandom');
		$this->load->helper(array('rand'));
	}
	function index(){//sinh do dong cau hoi
		/*for($i = 0; $i < 3000; $i++){
			$quiz_info = random_quiz();
			$this->mrandom->addquestion($quiz_info);
		}
		echo 'Thanh cmn cong';*/
	}
	/*function randomuser(){//sinh tu dong nguoi dung
		for($i = 0; $i < 3000; $i++){
			$u_info = random_user();
			$this->mrandom->adduser($u_info);
		}
		echo 'Thanh cmn cong';
	}
	function random_test(){//sinh tu dong ten de
		for($i = 1; $i <= 400; $i++){
			$test_info = random_test($i);
			$this->mrandom->addtest($test_info);
			for($j = 1; $j <= rand(20, 30); $j++){
				$quiz_info = random_quiz_of_test($i);
				$this->mrandom->addquiz_of_test($quiz_info);
			}
		}
		echo 'Thanh cmn cong';
	}
	function random_quiz_of_test(){
		for($i = 0; $i < 2000; $i++){
			$test_info = random_quiz_of_test($id);
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
	function random_cate_subject_test_question(){
		for($cate = 1; $cate < 11; $cate++){
			$category_info = random_category();
			$this->mrandom->add_category($category_info);
			for($level_cate = 1; $level_cate < rand(3, 5), $level_cate++){
				$level_info = random_level($cate);
				$this->mrandom->add_level_category($level_info);
				
			}
			for($subject = 1; $subject < rand(3, 5), $subject++){
				$subject_info = random_subject($cate);
				$this->mrandom->addsubject($subject_info);
				for($test = 1; $test < rand(15,20); $test++){
					
				}
			}
		}
	}
	*/
	
	
	function random_category(){
		for($i = 1; $i < 10; $i++){
			$cate_info = random_category();
			$this->mrandom->add_category($cate_info);
		}
		echo 'Thanh cmn cong';
	}
	function random_level_category(){
		$list_cate = $this->mrandom->list_cate();
		foreach($list_cate as $key=>$val){
			for($i = 1; $i < rand(4, 6); $i++){
				$level_info = random_level_category($val['id']);
				$this->mrandom->add_level_category($level_info);
			}
		}
		echo 'Thanh cmn cong';
	}
	function random_subject(){
		$list_cate = $this->mrandom->list_cate();
		foreach($list_cate as $key=>$val){
			for($i = 1; $i < rand(4, 6); $i++){
				$subject_info = random_subject($val['id']);
				$this->mrandom->add_subject($subject_info);
			}
		}
		echo 'Thanh cmn cong';
	}
	function random_test(){
		$list_sub = $this->mrandom->list_subject();
		foreach($list_sub as $key=>$val){
			$list_level = $this->mrandom->get_level($val['id']);
			for($i = 0; $i < rand(5, 10); $i++){
				foreach($list_level as $k=>$v){
					$test_info = random_test($val['id'], $v['id']);
					$this->mrandom->add_test($test_info);
				}
			}
		}
		echo 'Thanh cmn cong';
	}
	function random_questionbank(){
		$list_sub = $this->mrandom->list_subject();
		foreach($list_sub as $key=>$val){
			$list_level = $this->mrandom->get_level($val['id']);
			for($i = 0; $i < 10; $i++){
				foreach($list_level as $k=>$v){
					$questionbank_info = random_questionbank($val['id'], $v['id']);
					$this->mrandom->add_questionbank($questionbank_info);
				}
			}
		}
		echo 'Thanh cmn cong';
	}
	
	function random_question(){
		$list_test = $this->mrandom->list_test();
		foreach($list_test as $key=>$val){
			$list_questionbank = $this->mrandom->list_questionbank($val['subjectid']);
			foreach($list_questionbank as $k=>$v){
				$question_info = random_question($val['id'],$v['id']);
				$this->mrandom->add_question($question_info);
			}
		}
		echo 'Thanh cmn cong';
	}
	
}
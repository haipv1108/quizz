<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Random extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mrandom');
		$this->load->helper(array('rand'));
	}
	function index(){
	}
	
	function random_category(){
		for($i = 1; $i < 5; $i++){
			$cate_info = random_category();
			$this->mrandom->add_category($cate_info);
		}
		echo 'Thanh cmn cong';
	}
	function random_level_category(){
		$list_cate = $this->mrandom->list_cate();
		foreach($list_cate as $key=>$val){
			for($i = 1; $i < rand(3, 4); $i++){
				$level_info = random_level_category($val['id']);
				$this->mrandom->add_level_category($level_info);
			}
		}
		echo 'Thanh cmn cong';
	}
	function random_subject(){
		$list_cate = $this->mrandom->list_cate();
		foreach($list_cate as $key=>$val){
			for($i = 1; $i < rand(2, 3); $i++){
				$subject_info = random_subject($val['id']);
				$this->mrandom->add_subject($subject_info);
			}
		}
		echo 'Thanh cmn cong';
	}
	function random_test(){
		$list_cate = $this->mrandom->list_cate();
		foreach($list_cate as $key=>$val){
			for($i = 0; $i < rand(3, 4); $i++){
					$test_info = random_test($val['id']);
					$this->mrandom->add_test($test_info);
				}
			}
		echo 'Thanh cmn cong';
	}
	function random_questionbank(){
		set_time_limit(600);
		for($j = 0; $j < 30; $j++){
			$list_cate = $this->mrandom->list_cate();
			foreach($list_cate as $key=>$val){
				$list_sub = $this->mrandom->list_subject_by_cate($val['id']);// lay cac subject cua category
				foreach($list_sub as $k=>$v){
					$list_level = $this->mrandom->get_level($val['id']);// lay cac level cua category
					for($i = 0; $i < 10; $i++){
						foreach($list_level as $k1=>$v1){//Moi level tao 10 cau hoi.
							$questionbank_info = random_questionbank($v['id'], $val['id'], $v1['id']);//subject, category, level
							$this->mrandom->add_questionbank($questionbank_info);
						}
					}
				}
			}
			echo $j.'<br>';
		}
		
	}
	
	function random_question(){ 
		set_time_limit(450);

		$list_test = $this->mrandom->list_test();
		foreach($list_test as $key=>$val){
			$list_questionbank = $this->mrandom->list_questionbank($val['categoryid']);
			$i = 1;
			foreach($list_questionbank as $k=>$v){
				if($i <= $val['sl']){
					$question_info = random_question($val['id'],$v['id']);
					$this->mrandom->add_question($question_info);
				}
				$i++;
			}
		}
		echo	 'Thanh cmn cong';
	}
	
}
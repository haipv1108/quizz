<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller{
	function __construct(){
		$this->load->model('mhome');
		parent::__construct();
	}

	function index(){
		save_url();
		$list_cate = $this->mhome->get_list_cate();
		/*if(isset($list_cate) && !empty($list_cate)){
			foreach($list_cate as $key=>$val){
				$subject[$val['name']] = $this->mhome->get_list_subject($val['id']);
			}
		}*/
		$data = array(
					'list_cate' => $list_cate,
					'meta_title' => 'Online Examination System Home Page',
					'template' => 'frontend/home/index'
					);
		$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
	}
	function listtest($subjectid){
		$level = $this->mhome->get_list_level($subjectid);
		if(isset($level) && !empty($level)){
			foreach($level as $key=>$val){
				$listtest[$val['name']] = $this->mhome->get_list_test($subjectid, $val['id']);
			}
		}
		$subject = $this->mhome->get_subject($subjectid);
		$data = array(
						'level' => $level,
						'listtest' => $listtest,
						'subject' => $subject,
						'meta_title' => 'List Test '.$subject['name'],
						'template' => 'frontend/home/listtest'
					);
		$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
	}
	function testdetail($testid){
		$data = array(
						'test' => $this->mhome->get_test_detail($testid),
						'meta_title' => 'Test Detail',
						'template' => 'frontend/home/testdetail'
					);
		$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
	}
	// tim kiem de thi
	function search(){
		save_url();// Luu current_url vao session
		$data = array(
					'template' => 'frontend/home/search'
					);
		if($this->input->post('submit')){
			$this->form_validation->set_rules('search', 'Mã đề hoặc Tên đề', 'required'); 
			if($this->form_validation->run() == TRUE){
				$search = $this->input->post('search');
				$data['search'] = $search;
				$search_test = $this->mhome->search_test($search);
				if(!$search_test){
					$data['error'] = 'Không có đề thi trong hệ thống';
				}
				$data['search_test'] = $search_test;
			}
		}
		$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
	}
}
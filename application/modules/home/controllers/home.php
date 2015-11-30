<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller{
	function __construct(){
		$this->load->model('mhome');
		parent::__construct();
	}

	function index(){
		save_url();
		$list_cate = $this->mhome->get_list_cate();
		$data = array(
					'list_cate' => $list_cate,
					'meta_title' => 'Online Examination System Home Page',
					'template' => 'frontend/home/index'
					);
		$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
	}
	function listtest($categoryid){
		$data = array(
						'meta_title' => 'List Test ',
						'template' => 'frontend/home/listtest'
					);
		$get_listtest = $this->mhome->get_listtest_by_categoryid($categoryid);
		if(!$get_listtest){
			$data['error'] = 'Không có đề thi nào.';
		}else{
			$data['listtest'] = $get_listtest;
		}
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
				// lay danh sach theo category
				$list_cate = $this->mhome->get_list_cate();
				foreach($list_cate as $key=>$val){
					$listtest[$val['id']] = $this->mhome->search_test($search, $val['id']);
				}
				if(!$listtest){
					$data['error'] = 'Không có đề thi trong hệ thống';
					$data['template'] = 'home/notify';
					$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
					return;
				}
				$data['listtest'] = $listtest;
				$data['listcate'] = $list_cate;
			}
		}
		$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
	}
}
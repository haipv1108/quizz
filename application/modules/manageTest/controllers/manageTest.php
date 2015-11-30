<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ManageTest extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mmanageTest');
		// $this->load->helper('admin');
		// $this->load->library(array('email'));
	 }

	 function index(){
	 	save_url();// Luu current_url vao session
		$user = check_login(3);
		// config pagination
		$total = $this->mmanageTest->count_all();
		$base = '/managetest/';
		$per_page = 5;
		$config = pagi_config($base, $total, $per_page);
		$this->pagination->initialize($config);
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2);
		// end pagination
		$data = array(
						'view_test' => $this->mmanageTest->viewtest($per_page,$this->uri->segment($config['uri_segment'])),
						'meta_title' => 'Manage User',
						'user' => $user,
						'total' => $total,
						'active' => 'test-view',
						'paginator' => $this->pagination->create_links(),
						'template' => 'backend/home/view_test',
					);

	 	$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
	 }


	 function add(){
	 	$this->load->view('admin/backend/layouts/home');
	 }

	 function delete($id = 0){
	 	save_url();// Luu current_url vao session
		$user = check_login(3);
		$data = array(
			'user' => $user,
			'active' => 'test-view',
			'meta_title' => 'Delete Test',
			'template' => 'backend/home/delete_test'
			);
		$test_info = $this->mmanageTest->search_test($id);
		if(!$test_info){
			$data['error'] = 'Test not found in database.';
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}else{
			$data['user_test']= $test_info;
			if($this->input->post('submit')){
				$this->form_validation->set_rules('delete', 'Delete Radio', 'required'); 
				$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
				if($this->form_validation->run() == TRUE){
					if($this->input->post('delete')=='yes'){
						$this->mmanageTest->deletetest($id);
						$data['success'] = 'You have successfully deleted.';
					}else if($this->input->post('delete') =='no'){
						$data['success'] = 'I also think you should not delete user';
					}
				}
			}
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}

	 }
}
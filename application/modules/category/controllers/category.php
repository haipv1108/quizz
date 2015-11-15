<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mcategory');
		$this->load->model('subject/msubject');
		$this->load->model('test/mtest');
		$this->load->helper(array('form_vali'));
	}
	function index(){
		$user = check_login(3);
		// config pagination
		$total = $this->mcategory->count_all();
		$base = 'category/';
		$per_page = 5;
		$config = pagi_config($base, $total, $per_page);
		$this->pagination->initialize($config);
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2);
		// end pagination
		$data = array(
						'view_category' => $this->mcategory->viewcategory($per_page, $offset),
						'meta_title' => 'Manage Category',
						'user' => $user,
						'total' => $total,
						'active' => 'cate-view',
						'paginator' => $this->pagination->create_links(),
						'template' => 'view_category',
					);
		$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
	}
	function addcategory(){
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Add Category',
					'active' => 'cate-add',
					'template' => 'add_category'
					);
		if($this->input->post('submit')){
			vali_category();// check validate_form su dung helper
			if($this->form_validation->run() == TRUE){
				$cate_info = get_info_category();//get info user using helper
				$check_name = $this->mcategory->check_name($cate_info['name']);
				if(!$check_name){
					$error = 'Category Name is available';
					$data['error'] = $error;
				}else{
					$this->mcategory->addcategory($cate_info);
					$success = 'Add Category successfully.';
					$data['success'] = $success;
				}
			}
		}
		$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
	}
	/*function setlevel($categoryid){
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Set Level Subject',
					'active' => 'cate-add',
					'template' => 'set_level'
					);
		if($this->input->post('submit')){
			vali_setlevel();//check validate_form using helper
			if($this->form_validation->run() == TRUE){
				$level_info() = get_info_setlevel();// get info level using helper
				$this->mcategory->
			}
		}
	}*/
	function editcategory($id = 0){
		// co 1 loi la chua kiem tra name da thay doi roi.
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Edit Category',
					'active' => 'cate-edit',
					'template' => 'edit_category'
					);
		$cate_info = $this->mcategory->search_category($id);
		if(!$cate_info){
			$data['error'] = 'Category not found in database.';
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}
		else{
			$data['cate_info']= $cate_info;
			if($this->input->post('submit')){
				vali_category();// check validate_form su dung helper
				if($this->form_validation->run() == TRUE){
					$new_cate = get_info_category();//get info user using helper
					$new_cate['id'] = $id;
					$this->mcategory->updatecategory($new_cate);
					$message = 'Edit Category successfully.';
					$data['success'] = $message;
				}
			}
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}
	}
	function deletecategory($id = 0){
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Delete Category',
					'active' => 'cate-delete',
					'template' => 'delete_category'
					);
		$cate_info = $this->mcategory->search_category($id);
		if(!$cate_info){
			$data['error'] = 'Category not found in database.';
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}
		else{
			$data['cate_info']= $cate_info;
			if($this->input->post('submit')){
				$this->form_validation->set_rules('delete', 'Delete Radio', 'required'); 
				$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
				if($this->form_validation->run() == TRUE){
					if($this->input->post('delete')=='yes'){
						// delete subject
						$list_subject = $this->mcategory->list_subject($id);
						if(isset($list_subject) && !empty($list_subject)){
							foreach($list_subject as $key=>$val){
								//delete test
								$l_test = $this->msubject->list_test($val['id']);
								if(isset($l_test) && !empty($l_test)){
									foreach($l_test as $k=>$v){
										$this->mtest->deletequestion($v['id']);
										$this->mtest->deletetest($v['id']);
									}
								}
								$this->msubject->deletesubject($val['id']);
							}
						}
						//delete level
						$list_level = $this->mcategory->list_level($id);
						if(isset($list_level) && !empty($list_level)){
							foreach($list_level as $key=>$val){
								$this->mcategory->delete_level($val['id']);
							}
						}
						//delete category
						$this->mcategory->deletecategory($id);
						$success = 'You have successfully deleted.';
					}else if($this->input->post('delete') =='no'){
						$success = 'I also think you should not delete Category';
					}
					$data['success'] = $success;
				}
			}
			$this->load->view('admin/backend/layouts/home',isset($data)?$data:NULL);
		}
	}
}
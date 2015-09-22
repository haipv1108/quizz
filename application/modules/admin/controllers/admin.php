<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('madmin');
		$this->load->helper(array('form_vali'));
		$this->load->library(array('email'));
	 }
	 
	function index()
	{
		$user = check_login(3);
		// config pagination
		$total = $this->madmin->count_all();
		$base = '/admin/';
		$per_page = 5;
		$config = pagi_config($base, $total, $per_page);
		$this->pagination->initialize($config);
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2);
		// end pagination
		$data = array(
						'view_user' => $this->madmin->viewuser($per_page,$this->uri->segment($config['uri_segment'])),
						'meta_title' => 'Manage User',
						'user' => $user,
						'total' => $total,
						'active' => 'admin-view',
						'paginator' => $this->pagination->create_links(),
						'template' => 'backend/home/view_user',
					);
		$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
	}
	function adduser(){
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Add User',
					'active' => 'admin-add',
					'template' => 'backend/home/add_user'
					);
		if($this->input->post('submit')){
			vali_user();// check validate_form su dung helper
			if($this->form_validation->run() == TRUE){
				$u_info = get_info_user();//get info user using helper
				$u_info['active'] = 0;
				$error = '';
				$check_name = $this->madmin->check_name($u_info['name']);
				if(!$check_name){
					$error = 'User Name is available';
				}else{
					$check_mail = $this->madmin->check_mail($u_info['email']);
					if(!$check_mail){
						$error = 'Email is available';
					}else{
						$this->madmin->adduser($u_info);
						$success = 'Add User successfully.';
						$data['success'] = $success;
					}
				}
				$data['error'] = $error;
				/*if($u_info['password'] == $passconf){
					$check_u = $this->madmin->add_user($u_info);
					if($check_u==0){
						$userid = $this->db->insert_id();
						$link_active = base_url()."home/home/active/?userid=".$userid."&key=".md5($salt);
	  
						$message  = "Please follow this link to active your acount <br/>";
						$message .= "Link : <a href=".$link_active.">".$link_active."</a><br/>";
						$message .= "username : ".$a_Userinfo['username']."<br/>";
						$message .= "password : ".$this->input->post("password");
				
						$mail = array(
						"to_receiver"   => $a_Userinfo['email'], 
						"message"       => $message,
					);

				
					$this->load->library("email"); 
					$this->email->config($mail);
					$this->email->sendmail();
					redirect(base_url().'admin/view');

					}else{
						if(isset($a_Userchecking['message_mail_address']))
						$data['message_mail_address'] = $a_Userchecking['message_mail_address'];
						if(isset($a_Userchecking['message_user_name']))
						$data['message_user_name'] = $a_Userchecking['message_user_name'];
						if(isset($a_Userchecking['message_user_name_furi']))
						$data['message_user_name_furi'] = $a_Userchecking['message_user_name_furi'];
						if(isset($a_Userchecking['message_phonenumber']))
						$data['message_phonenumber'] = $a_Userchecking['message_phonenumber'];
						
					}
				}*/
			}
		}
		$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
	}
	function edituser($id = 0){
		// co 1 loi la chua kiem tra name da thay doi roi.
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Edit User',
					'active' => 'admin',
					'template' => 'backend/home/edit_user'
					);
		$user_info = $this->madmin->search_user($id);
		if(!$user_info){
			$data['error'] = 'User not found in database.';
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
		else{
			$data['user_info']= $user_info;
			if($this->input->post('submit')){
				vali_user();// check validate_form su dung helper
				if($this->form_validation->run() == TRUE){
					$u_info = get_info_user();//get info user using helper
					$u_info['id'] = $id;
					$this->madmin->updateuser($u_info);
					$message = 'Edit user successfully.';
					$data['success'] = $message;
				}
			}
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
	}
	function deleteuser($id = 0){
		$user = check_login(3);
		$data = array(
					'user' => $user,
					'meta_title' => 'Delete User',
					'active' => 'admin',
					'template' => 'backend/home/delete_user'
					);
		$user_info = $this->madmin->search_user($id);
		if(!$user_info){
			$data['error'] = 'User not found in database.';
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
		else{
			$data['user_info']= $user_info;
			if($this->input->post('submit')){
				$this->form_validation->set_rules('delete', 'Delete Radio', 'required'); 
				$this->form_validation->set_error_delimiters('<div class="input-notification error png_bg">', '</div>');
				if($this->form_validation->run() == TRUE){
					if($this->input->post('delete')=='yes'){
						$this->madmin->deleteuser($id);
						$data['success'] = 'You have successfully deleted.';
					}else if($this->input->post('delete') =='no'){
						$data['success'] = 'I also think you should not delete user';
					}
				}
			}
			$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
		}
	}

	/*public function manage_page($id){
			
		if(check_login(3)){

		// check box
		if($this->input->post('submit')){
			$action = $this->input->post('dropdown');
			$checkbox = $this->input->post('checkbox');
			if($action=='publish' && is_array($checkbox))
				$check = $this->madmin->publish($checkbox);
			else if($action == 'unpublish' && is_array($checkbox))
				$this->madmin->unpublish($checkbox);
		}

			$data = array(
							'user' => $this->session->userdata('user'),
							'meta_title' => 'Manage Page',
							'active' => 'admin-manage',
							'template' => 'backend/home/manage_page',
							'id'=>$id
						);

			$check = $this->madmin->manage_page($id);
			if($check == false){
				$data['message'] = 'User not found in system';
				$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
			}else{
				$data['view_article'] = $check;
				$this->load->view('backend/layouts/home',isset($data)?$data:NULL);
			}
		}
	}



	// public function email(){
	// 	$this->load->library('email');

	// 	$config = array(
	// 	'protocol' => 'smtp',
 //        'mailpath' => 'ssl://smtp.gmail.com',
 //        'smtp_port' => '465',
 //        'smtp_user' => 'dodaihoc.abvk@gmail.com',
 //        'smtp_pass' => '01646236194',
 //        'mailtype'  => 'html',
 //        'charset' => 'utf-8',
 //        'wordwrap' => TRUE
 //        );
 //        $this->email->initialize($config);
 //        $this->email->set_newline("\r\n");

	// 	$this->email->from('dodaihoc.abvk@gmail.com', 'Hà');
	// 	$this->email->to(''); // cái này chú viết mail chú vào nhé

	// 	$this->email->subject('Email Test');
	// 	$this->email->message('Testing the email class.');	

	// 	$this->email->send();

	// 	echo $this->email->print_debugger();
	// }*/
}
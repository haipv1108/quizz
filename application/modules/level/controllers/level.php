<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Level extends MX_Controller {
    private $_data;
    public function __construct() {
        parent::__construct();
        $this->load->model('mlevel');
        $this->load->model('category/mcategory');
    }

    public function index() {
		save_url();// Luu current_url vao session
		$user = check_login(3);
		$this->_data = array(
							'category' =>$this->mcategory->get_list_category(),
							'template' => 'level',
							'user' => $user,
							'meta_title' => 'Manage Level',
							'active' => 'level-add',
							);
		$this->load->view('admin/backend/layouts/home',isset($this->_data)?$this->_data:NULL);
    }

    private function update_level_view($levels) {
        foreach($levels as $key => $value) {
            print
                "<tr>
                    <td><input type = text class=text-input id = text" . $value['id'] ." value = '" . $value['name'] ."'></td>
                    <td><button class=button onclick='updateLevel(" . $value['id'] . ")'>Update</button></td>
                    <td><button class=button onclick='removeLevel(" . $value['id'] . ")'>Delete</button></td>
                 </tr>
                    ";
        }
    }

    public function get_level() {
        if (isset($_POST['cat_id']))
            $category = $_POST['cat_id'];
        $levels = $this->mlevel->get_level($category);
        $this->update_level_view($levels);
    }



    public function add_level() {
        if (isset($_POST['level_name']) && isset($_POST['cat_id'])) {
            $data['name'] = $_POST['level_name'];
            $data['categoryid'] = $_POST['cat_id'];
            if ($this->mlevel->check_level_existed($data['name'], $data['categoryid']) == false) {
                $this->mlevel->add_level($data);
                $levels = $this->mlevel->get_level($data['categoryid']);
                $this->update_level_view($levels);
            } else {
                echo "false";
            }
        }
    }

    public function remove_level() {
        if (isset($_POST['id']) && isset($_POST['cat_id'])) {
            $this->mlevel->remove_level($_POST['id']);
            $levels = $this->mlevel->get_level($_POST['cat_id']);
            $this->update_level_view($levels);
        }
    }

    public function update_level() {
        if (isset ($_POST['id']) && isset($_POST['name']) && isset($_POST['cat_id'])) {
            $data['name'] = $_POST['name'];
            $data['id'] = $_POST['id'];
            $data['categoryid'] = $_POST['cat_id'];
            if ($this->mlevel->check_level_existed($data['name'], $data['categoryid']) == false) {
                 $this->mlevel->update_level($data);
                 $levels = $this->mlevel->get_level($_POST['cat_id']);
                 $this->update_level_view($levels);
            } else {
                echo "false";
            }
           
        }
    }

}
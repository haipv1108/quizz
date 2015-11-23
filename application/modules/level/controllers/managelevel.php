<?php
class Managelevel extends MX_Controller {
    private $_data;
    public function __construct() {
        parent::__construct();
        $this->load->model('mlevel');
        $this->load->model('category/mcategory');
    }

    public function index() {
        $this->_data['category'] = $this->mcategory->get_list_category();
        $this->load->view('managelevel', $this->_data);
    }

    private function update_level_view($levels) {
        foreach($levels as $key => $value) {
            print
                "<tr>
                    <td><input type = text id = text" . $value['id'] ." value = '" . $value['name'] ."'></td>
                    <td><button onclick='updateLevel(" . $value['id'] . ")'>Update</button></td>
                    <td><button onclick='removeLevel(" . $value['id'] . ")'>Delete</button></td>
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

            $this->mlevel->add_level($data);
            $levels = $this->mlevel->get_level($data['categoryid']);
            $this->update_level_view($levels);
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
            $this->mlevel->update_level($data);
            $levels = $this->mlevel->get_level($_POST['cat_id']);
            $this->update_level_view($levels);
        }
    }

}
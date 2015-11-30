<?php
if(isset($_POST['username']) && $_POST['username'] != ""){
	$username = $_POST['username'];
	$result = search_name($username);
	echo $result;
}
function search_name($username){
	//$ci = &get_instance();
	$this->load->database();
	$query = $ci->db->select('name')->where('name',$username)->get('user');
	if($query->row_array()>0)
		return 'true';
	else return 'false';
}

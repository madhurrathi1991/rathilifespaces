<?php

Class Login_Database extends CI_Model {
 function __construct()
	{
		$this->load->database();
	}

// Read data using username and password
public function login($data) {
$email=$data['email'];// $data['password'];
$password=md5($data['password']);
// $query=$this->db->query("SELECT u.*,ug.* FROM user u inner join user_group ug on u.user_group_id=ug.user_group_id WHERE u.email = '$email' and u.password='$password' and LOWER(ug.user_group_name) like '%super%'");//echo "SELECT * FROM  user_detail WHERE email = '$email' and password='$password'";die;
 $query=$this->db->query("SELECT * FROM  customer_detail WHERE email = '$email' and password='$password'");
if ($query->num_rows() == 1) {
	
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($email) {

$condition = "email =" . "'" . $email . "'";
$this->db->select('*');
$this->db->from('customer_detail');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
//echo $query;die;
if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

}

?>
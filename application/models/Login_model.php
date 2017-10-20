<?php
/**
* 
*/
class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function create($name,$email,$gender,$web,$cmt)
	{
		$array = array('name' =>$name , 'email' => $email , 'gender' => $gender ,'website' =>$web ,'comment' => $cmt );
		$result = $this->db->insert('user',$array);
		return $result;
	}

	function get()
	{
		$this->db->select('*');
		$this->db->from('user');
		$res = $this->db->get();
		return $res ->result();
	}
}
?>
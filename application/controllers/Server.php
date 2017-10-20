<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Server extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	    $this->load->model('Login_model','',TRUE);
	    $this->load->helper('form','url');
	    $this->load->helper('security');
	    $this->load->library('encrypt');
	    $this->load->library('session');
	    $this->load->library('form_validation');
		$this->load->helper(array('form'));
	}
	function index()
	{
	}
	function create()
	{
		$this->form_validation->set_rules('name','Name','trim|required|min_length[3]|max_length[25]|xss_clean|callback_check_name');
        $this->form_validation->set_rules('email','Email','trim|required|is_unique[user.email]|xss_clean|valid_email'); 
        $this->form_validation->set_rules('gender','Gender','required');
        $this->form_validation->set_rules('website','website','trim|required|is_unique[user.email]|xss_clean|callback_valid_url');
        $this->form_validation->set_rules('comment','comment','trim|required|is_unique[user.email]|xss_clean|min_length[5]|max_length[100]');
        if($this->form_validation->run()==FALSE)
        {
        	$data['result'] = $this->Login_model->get();
			$this->load->view('index',$data);
        }
        else
        {
        	$name   = $this->input->post('name');
           	$email  = $this->input->post('email');
        	$gender = $this->input->post('gender');
        	$web    = $this->input->post('website');
        	$cmt    = $this->input->post('comment');
        	
            $result = $this->Login_model->create($name,$email,$gender,$web,$cmt);
            if ($result)
            {
            	$data['result'] = $this->Login_model->get();
				$this->load->view('index',$data);     
			}
        }
	}

	function check_name($name)
	{
	    if(preg_match('/^[a-zA-Z_\s]+$/', $name))
	    {     
	      return $name;
	    }
	    else
	    {
	       $this->form_validation->set_message('check_name','Only letter and space allowed');
	      return FALSE;
	    }
	}

	function valid_url($web)
	{
		if(preg_match('|http(s)?://[a-z0-9]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i',$web))
			{
				return $web;
			}
		else
		{
			$this->form_validation->set_message('valid_url','The URL you entered is not correctly formatted.');
			return FALSE;
		}
	}

	function get()
	{
		$data['result'] = $this->Login_model->get();
		$this->load->view('index',$data);
	}
}

?>
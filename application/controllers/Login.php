<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('common_model');
	}

	public function index()
	{
		if ($this->input->post()) 
		{
			$where = array('username' => post('usename'), 
		  				   'password' => md5(post('password'))
		  				  );

			$result = $this->common_model->Authentication('admin',$where);
			

			if ($result) 
			{
				$sess_data = array('username'  => $result->username,
								   'id'        => $result->id, 
								   'logged_in' => TRUE, 
									);

				$this->session->set_userdata($sess_data);

				$msg = "You are Login Successfully";
				$this->session->set_flashdata('success',$msg);
				redirect('dashboard','refresh');
			}
			else
			{
				$msg = "Your Email or Password is Incorrect";
				$this->session->set_flashdata('error',$msg);
				redirect('/','refresh');
			}
		}
		else
		{
		    $this->load->view('login');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/','refresh');
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		session_start();
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		if ( isset($_SESSION['username']) ) 
		{
			redirect('mycal/display');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email_address', 'Email Address', 'valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

		if ( $this->form_validation->run() !== false ) 
		{
			//then validation passed. Get from db
			$this->load->model('admin_model');
			$res = $this
                  ->admin_model
                  ->verify_user(
                     $this->input->post('email_address'), 
                     $this->input->post('password')
                  );

			if ( $res['login'] !== false ) 
			{
				$_SESSION['type'] 			= $res['type'];
				$_SESSION['username'] 		= $this->input->post('email_address');
				$_SESSION['menu']			= $res['menu'];
				$_SESSION['fname']			= $res['fname'];
				$_SESSION['lname']			= $res['lname'];
				$_SESSION['dname']			= $res['fname'] . " " . $res['lname'];
				redirect('mycal/display');
			}
		}
		$this->load->view('login_view');
	}

	public function logout()
	{
		session_destroy();
		$this->load->view('login_view');
	}
}

?>

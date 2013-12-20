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
				//$_SESSION['id'] 			= $res['id'];
				$_SESSION['type'] 			= $res['type'];
				$_SESSION['username'] 		= $this->input->post('email_address');
				$_SESSION['menu']			= $res['menu'];
                $_SESSION['new_menu']       = $res['new_menu'];
				$_SESSION['fname']			= $res['fname'];
				$_SESSION['lname']			= $res['lname'];
				$_SESSION['dname']			= $res['fname'] . " " . $res['lname'];
				$_SESSION['default_site']	= $res['default_site'];
				$_SESSION['siteswitch']		= $res['cal_switch'];
				redirect('mycal/display');
			}
		}
		$this->load->view('login_view');
	}
	
	public function register()
	{
		//$this->output->enable_profiler(true);
		$this->load->model('admin_model');
		$email			= $this->input->get_post('email');
		$fname			= $this->input->get_post('fname');
		$lname			= $this->input->get_post('lname');
		$uname			= $this->input->get_post('uname');
		$pword			= $this->input->get_post('pword');
		
		$uarr			= array('username' => $uname, 'email' => $email);
		$u_exists		= $this->admin_model->checkMember($uarr);
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
		    $errors[]	= "Invalid email.";
		}
		
		if(strlen($fname) == 0)
		{
			$errors[]	= "Please enter first name.";
		}
		
		if(strlen($lname) == 0)
		{
			$errors[]	= "Please enter surname.";
		}
		
		if(strlen($uname) == 0)
		{
			$errors[]	= "Please enter username.";
		}
		
		if( 
			ctype_alnum($pword) // numbers & digits only 
			&& strlen($pword)>4 // at least 5 chars 
			&& strlen($pword)<11 // at most 10 chars  
			&& preg_match('`[a-z]`',$pword) // at least one lower case 
			&& preg_match('`[0-9]`',$pword) // at least one digit
			)
		{}
		else
		{
			$errors[]	= "Please enter valid password (5-10 characters, alphanumeric).";
		} 
		
		if($u_exists > 0)
		{
			$errors[]	= "Username or email already in use.";
		}
		
		$result 					= array();
		
		if(empty($errors))
		{
			$data['first_name']		= $fname;
			$data['last_name']		= $lname;
			$data['username']		= $uname;
			$data['email']			= $email;
			$data['password']		= md5($pword);
			$res 					= $this->admin_model->register($data);
			
			if($res)
			{
				$result['status']	= "Success";
			}
			else
			{
				$result['status']	= "MySQL Failure";
			}
		}
		else 
		{
			$result['status']	= "Failure";
			$result['errors']	= $errors;
		}
		
		unset($data);
		$result['type']				= "json";
		$data						= json_encode($result);
		
		echo $data;
	}	
	
	public function mobileLogin()
	{
		//$this->output->enable_profiler(TRUE);
		$this->load->model('admin_model');
		if($this->input->post('username'))
		{
			$username		= $this->input->post('username'); 
			$password		= $this->input->post('password');		
		}
		else 
		{
			$username 		= $this->uri->segment(3);
			$password		= $this->uri->segment(4);
		}
		
		$res 				= $this->admin_model->verify_user($username, $password, true);	
		
		if ($res) 
		{
			$data['token'] 		= $res;
			$data['output'] 	= 'json';
			
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($data));
		}
		else 
		{
			redirect('autherror');
		}
	} 
	
	public function mobileLogout()
	{
		$this->load->model('admin_model');
		$token			= $this->input->post('token');
		$res 			= $this->admin_model->mobileLogout($token);
		
		if($res)
		{
			$data['success'] 			= $res;
			$data['output'] 			= 'json';
		}
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));	
	}
	

	public function logout()
	{
		session_destroy();
		$this->load->view('login_view');
	}
}

?>

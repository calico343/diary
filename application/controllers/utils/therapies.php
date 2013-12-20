<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Therapies extends  CI_Controller
{
	public $data = '';
	
	public function __construct()
	{
		session_start();
		parent::__construct();
		
		if ( !isset($_SESSION['username']) ) 
		{
			redirect('admin');
		}	
		//$this->output->enable_profiler(TRUE);
	}
	function index(){
		$this->load->view('header', $this->data);
		$this->load->view('leftbar', $this->data);
		
		$this->load->view('utils/therapies/therapies_default');

		$this->load->view('footer', $this->data);
	}
	
	function display($id = null)
	{
		
	}
	
	function showPartNames($partString)
	{
		$this->load->model('utils/Therapies_model');

		$con_data				= $this->Contacts_model->returnNameOnPart($partString);
		$data['con']			= $con_data;
		$this->load->view('/contacts/viewContactList', $data);
	}
}

?>
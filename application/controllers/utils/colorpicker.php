<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Colorpicker extends  CI_Controller
{
	public function __construct()
	{
		session_start();
		parent::__construct();
		$this->load->library('session');
		if ( !isset($_SESSION['username']) ) 
		{
			redirect('admin');
		}	
		//$this->output->enable_profiler(TRUE);
	}
	
	function pickColors()
	{
		$data['therapies']	= $this->getTherapyList();
		$this->load->view('header');
		$this->load->view('leftbar');
		$this->load->view('utils/settings/colorpicker', $data);
		$this->load->view('footer');
	}
	
	function getTherapyList()
	{
		$this->load->model('utils/Therapies_model');
		$th_data			= $this->Therapies_model->returnTherapiesList();
		return $th_data;
	}
	
	function setColors()
	{
		$item		= $this->input->post('item');
		$color		= $this->input->post('color');
		
		$this->load->model('utils/utils_model');
		
		
	}
	
}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utils extends  CI_Controller
{
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
		
	}
	
	function display($id = null)
	{
		
	}
	
	function returnSites()
	{
		$this->load->model('utils/Utils_model');
		return	$this->Utils_model->returnSitesList();
	}
	
	function therapies()
	{
		
	}
	
	function pickColors()
	{
		$data['therapies']	= $this->getTherapyList();
		$data['sites']		= $this->returnSites();
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
		
		$this->load->model('utils/Therapies_model');
		$result 	= $this->Therapies_model->updateColors(Array('item' => $item, 'color' => $color));
		return $result;
	}
	
}

?>
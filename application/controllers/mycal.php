<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mycal extends  CI_Controller
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
	
	function showViewTab()
	{
		$data['th']			= $this->getTherapyList();
		$this->load->view('appointments/viewtab', $data);
	}
	
	function insertEvent()
	{
		//$this->output->enable_profiler(TRUE);

		foreach($_POST as $key=>$var)
		{
			$event_array[$key] = $var;
			echo "$key, $var<br/>";
		}

		$this->load->model('Mycal_model');
		
		$result				= $this->Mycal_model->addCalendarData($event_array);
		echo $result; 
	}
	
	function editEvent()
	{
		//$this->output->enable_profiler(true);
		foreach($_POST as $key=>$var)
		{
			$event_array[$key] = $var;
		}
		
		$this->load->model('Mycal_model');
		
		$result				= $this->Mycal_model->editCalendarData($event_array);
		return $result; 
	}

	function editEventTimes()
	{
		$this->output->enable_profiler(false);
		foreach($_POST as $key=>$var)
		{
			$event_array[$key] = $var;
		}
		
		$this->load->model('Mycal_model');
		
		$result				= $this->Mycal_model->editEventTimes($event_array);
		return $result; 
	}

	function editEventDate()
	{
		$this->output->enable_profiler(false);
		foreach($_POST as $key=>$var)
		{
			$event_array[$key] = $var;
		}
		
		$this->load->model('Mycal_model');
		
		$result				= $this->Mycal_model->editEventDate($event_array);
		return $result; 
	}
	
	function deleteEvent()
	{
		//$this->output->enable_profiler(true);
		foreach($_POST as $key=>$var)
		{
			$event_array[$key] = $var;
		}
		
		$this->load->model('Mycal_model');
		
		$result				= $this->Mycal_model->deleteEvent($event_array);
		return $result; 
	} 
	
	function filter($type)
	{
		if(!isset($date))
		{
			$date 				= strftime("%Y-%m-%d", time());
		}
		
		if(!isset($view))
		{
			if($_SESSION['default_site'] == 'rfh')
			{
				$view 			= 'm';	
			}
			else
			{
				$view 			= 'w';
			}
		}

		$this->display($view, $date, $type);
	}
	
	function display($filter = null, $view = null, $date = null)
	{	
		//$this->output->enable_profiler(TRUE);
		date_default_timezone_set('UTC'); 
		
		if(!isset($filter))
		{
			$filter				= 'all';
		}
		
		if(!$date)
		{
			$date 				= strftime("%Y-%m-%d", time());
		}
		
		if(!$view)
		{
			if($_SESSION['default_site'] == 'rfh')
			{
				$view 			= 'w';	
			}
			else
			{
				$view 			= 'm';
			}
		}
		
		$this->load->model('Mycal_model');

		$data['month'] 			= strftime("%m", strtotime($date));
		$data['year']			= strftime("%Y", strtotime($date));
		$data['day']			= strftime("%d", strtotime($date));

		$cal_data				= $this->Mycal_model->getCalendarData($date, $view, $filter);
		
		$data['title'] 			= "Calendar";
		$data['description'] 	= "Calendar";
		$data['cal']			= $cal_data;
		$data['th']				= $this->getTherapyList();
		$data['sweek']			= $this->weekStart($date);
		$data['ddate']			= $date;
		$data['apTypeData']		= $this->getAppointmentTypes();
		$data['filter']			= $filter;
		
		//echo $this->session->userdata('u_id')."<br>";
		//echo $this->session->userdata('u_email')."<br>";
		//echo $this->session->userdata('u_default_site')."<br>";
		//echo $this->session->userdata('u_site_switch_privilege')."<br>";
		//echo $this->session->userdata('u_privilege')."<br>";

		$this->load->view('header', $data);
		//$this->load->view('leftbar', $data);
		
		$data['error_message'] = $this->lang->line('error_generic');
		if($view == 'w')
		{
			$this->load->view('/appointments/mycalweek', $data);
		}
		else if($view == 'd')
		{
			$this->load->view('/appointments/mycalday', $data);
		}
		else if($view == 'test'){
			$this->load->view('/appointments/mycalweekCopy', $data);
		}
		else
		{
			$this->load->view('/appointments/mycalmonth', $data);
		}
		$this->load->view('/appointments/caltabs', $data);
		$this->load->view('footer');
	}
	
	//clone for testing
	function displayTest($view = null, $date = null, $type = null)
	{	
		//$this->output->enable_profiler(TRUE);
		date_default_timezone_set('UTC'); 
		
		if(!$date)
		{
			$date 				= strftime("%Y-%m-%d", time());
		}
		
		if(!$view)
		{
			if($_SESSION['default_site'] == 'rfh')
			{
				$view 			= 'w';	
			}
			else
			{
				$view 			= 'w';
			}
		}
		
		$this->load->model('Mycal_model');

		$data['month'] 			= strftime("%m", strtotime($date));
		$data['year']			= strftime("%Y", strtotime($date));
		$data['day']			= strftime("%d", strtotime($date));

		$cal_data				= $this->Mycal_model->getCalendarData($date, $view);
		
		$data['title'] 			= "Calendar";
		$data['description'] 	= "Calendar";
		$data['cal']			= $cal_data;
		$data['th']				= $this->getTherapyList();
		$data['sweek']			= $this->weekStart($date);
		$data['ddate']			= $date;
		$data['apTypeData']		= $this->getAppointmentTypes();
		
		//echo $this->session->userdata('u_id')."<br>";
		//echo $this->session->userdata('u_email')."<br>";
		//echo $this->session->userdata('u_default_site')."<br>";
		//echo $this->session->userdata('u_site_switch_privilege')."<br>";
		//echo $this->session->userdata('u_privilege')."<br>";

		$this->load->view('header', $data);
		$this->load->view('leftbar', $data);
		
		$data['error_message'] = $this->lang->line('error_generic');
		if($view == 'w')
		{
			$this->load->view('/appointments/mycalweek', $data);
		}
		else if($view == 'd')
		{
			$this->load->view('/appointments/mycalday', $data);
		}
		else if($view == 'test'){
			$this->load->view('/appointments/mycalweekCopy', $data);
		}
		else
		{
			$this->load->view('/appointments/mycalmonth', $data);
		}
		$this->load->view('/appointments/caltabs', $data);
		$this->load->view('footer');
	}
	
	//date and periodtype don't exist unless you get them
	//http://ellislab.com/codeigniter/user-guide/libraries/uri.html
	//the page is loaded like so
	//http://avocet.spinhalf.com/index.php/mycal/getPeriodArray/2012-12-01/m/json
	function getPeriodArray($date = null,  $periodtype, $filter)
	{
		//echo $date . " " . __LINE__;
		$this->output->enable_profiler(false);
		if(!$date)
		{
			$date 				= date("Y-m-d");
		}
		
		if(!$periodtype)
		{
			$periodtype			= 'm';
		}
		
		if(!$filter)
		{
			$filter				= 'all';
		}
		
		$this->load->model('Mycal_model');
		$cal_data				= $this->Mycal_model->getCalendarData($date, $periodtype, $filter);

		echo json_encode($cal_data);
	}
	
	function getTherapyList()
	{
		$this->load->model('utils/Therapies_model');
		$th_data			= $this->Therapies_model->returnTherapiesList();
		return $th_data;
	}
	
	function weekStart($date)
	{
		
		$this->load->model('Mycal_model');
		$ww 				= $this->Mycal_model->getStartAndEndDateOfWeek($date);

		return $ww;
	}
	
	function getAppointmentTypes()
	{
		$this->load->model('Mycal_model');
		$apTypeData			= $this->Mycal_model->getAppointmentTypes();
		return $apTypeData;		
	}
	
	function tempSet()
	{
		//$this->output->enable_profiler(TRUE);
		$this->load->model('Mycal_model');
		$apTypeData			= $this->Mycal_model->tempSetter();
	}
}

?>

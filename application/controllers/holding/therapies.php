<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Therapies extends  CI_Controller
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
    }
    
    function index()
    {
        //Block for Page Title & menu selection    
        $data['title']          = "Therapies";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Therapies"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
    function week()
    {
        //Block for Page Title & menu selection    
        $data['title']          = "Therapies - Week";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Therapies"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "Week";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
    function day()
    {
        //Block for Page Title & menu selection    
        $data['title']          = "Therapies - Day";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Therapies"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "Day";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
    function month()
    {
        //Block for Page Title & menu selection    
        $data['title']          = "Therapies - Month";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Therapies"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "Month";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
    function therapies()
    {
        //Block for Page Title & menu selection    
        $data['title']          = "Therapies - Therapies";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Therapies"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "Therapies";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
    function activepatients()
    {
        //Block for Page Title & menu selection    
        $data['title']          = "Therapies - Active Patients";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Therapies"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "Active Patients";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
    
    
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends  CI_Controller
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
        $data['title']          = "Events";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Events"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
    function Walk()
    {
        //Block for Page Title & menu selection    
        $data['title']          = "Events - Walk";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Events"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "Walk";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
    function Theatre()
    {
        //Block for Page Title & menu selection    
        $data['title']          = "Events - Theatre";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Events"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "Theatre";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
    function Lecture()
    {
        //Block for Page Title & menu selection    
        $data['title']          = "Events - Lecture";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Events"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "Lecture";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
    
    
}
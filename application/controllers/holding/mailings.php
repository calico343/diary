<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailings extends  CI_Controller
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
        $data['title']          = "Mailings";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Mailings"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }

    function sms()
    {
        //Block for Page Title & menu selection    
        $data['title']          = "Mailings - SMS";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Mailings"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "SMS";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
    function email()
    {
        //Block for Page Title & menu selection    
        $data['title']          = "Mailings - Email";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Mailings"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "Email";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
   
    function letters()
    {
        //Block for Page Title & menu selection    
        $data['title']          = "Mailings - Letters";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Mailings"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "Letters";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
   
}
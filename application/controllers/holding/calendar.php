<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends  CI_Controller
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
        $data['title']          = "Calendar";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Calendar"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
}
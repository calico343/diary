<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grants extends  CI_Controller
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
        $data['title']          = "Grants";  //e.g. Therapies - Calendar
        $data['currentsection'] = "Grants"; //e.g. Therapies (itemname from menu table)
        $data['currentview']    = "";   //e.g. Week (itemname of layer from menu table)
        
        
        $this->load->view('header', $data);
        $this->load->view('tba');
    }
    
}
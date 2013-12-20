<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Theatre extends CI_Controller 
{
	public $data = '';
   function __construct()
   {
      session_start();
      parent::__construct();
      if ( !isset($_SESSION['username']) ) {
         redirect('admin');
      }
   }

	public function index()
	{
		$this->load->view('header', $this->data);
		$this->load->view('leftbar', $this->data);
		
		$this->load->view('events/theatre_default.php'); 
		$this->load->view('footer', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends  CI_Controller
{
	public $data 	=	'';
	public function __construct()
	{
		session_start();
		parent::__construct();
		 $this->lang->load('error', 'english');
		if ( !isset($_SESSION['username']) ) 
		{
			redirect('admin');
		}	
		$this->load->library('session');
		$this->output->enable_profiler(FALSE);
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	
	function index(){
		$this->data['posts_per_page'] = $this->config->item('posts_per_page');
		$this->load->view('header', $this->data);
		$this->load->view('leftbar', $this->data);
		$this->load->view('contacts/contact_default.php'); 
		$this->load->view('footer', $this->data);		
	}
	
	function display($id = null)
	{
		
	}
	/*AJAX*/
	function getAlternativeAddresses(){
		$this->output->enable_profiler(FALSE);
		$this->load->model('contacts/Contacts_model');	
		$CID = $this->uri->segment(4);	
		echo json_encode($this->Contacts_model->alternateAddress($CID));
	}
	function delete(){
			$this->output->enable_profiler(FALSE);
			$contacts_deleted_state = array(
										'Deleted'=>'1'
									);
			$this->db->where('CID', $_REQUEST['CID']);
			$this->db->update('new_contacts', $contacts_deleted_state); 
			echo json_encode(array('status'=>0,'msg'=>$this->lang->line('contact_deleted')));
	}
	function flySearch(){
		$this->output->enable_profiler(FALSE);
		$this->load->model('contacts/Contacts_model');
		$name = $_REQUEST['keyword'];	
		$page = 0;
		if(isset($_REQUEST['page'])){
			$page = $_REQUEST['page'];
		}
		$data = $this->Contacts_model->autoCompleteSearch($name,$page);
		echo json_encode($data);
	}
	
	function getContactInfo(){
		$cid = $_REQUEST['cid'];
		$this->output->enable_profiler(FALSE);
		$this->load->model('contacts/Contacts_model');
		echo json_encode($this->Contacts_model->getContact($cid));
	}
	
	function insertContact(){
		//echo var_dump($_REQUEST);
		$this->output->enable_profiler(FALSE); 
		$this->form_validation->set_rules('address1', 'Address 1', 'required');
		$this->form_validation->set_rules('address2', 'Address 2', 'required');
		$this->form_validation->set_rules('address3', 'Address 3', 'required');
		$this->form_validation->set_rules('zip',   'Zip', 'required');
		$this->form_validation->set_rules('city',  'City','required');
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('fname','First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('telno', 'Telephone Number', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('fax', 'Fax', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|email');
	/*
		$rules = array(
        array('field' => 'address1',
              'label' => 'Address 1',
              'rules' => 'required') 
      ) ;
	
    $this->form_validation->set_rules($rules); 
	*///var_dump($_REQUEST);
	//echo validation_errors();
		$v = $this->form_validation->run();
		//echo $v.'##';
		if (!$v){
			$msg = validation_errors();
			if($msg == ''){
				$msg = $this->lang->line('error_generic');	
			}
			echo json_encode(array('status'=>0,'msg'=>$msg));
		}else{
		$stamp = date('Y-m-d H:i:s');
		//var_dump($_REQUEST); 
		$contacts_addresses  = array(
							'ContactType' 	=> 'I',
							'PCode'			=>$_REQUEST['PCode'],
							'Salutation'	=>$_REQUEST['Salutation'],
							'Name1'			=>$_REQUEST['title']." ".$_REQUEST['fname']." ".$_REQUEST['lname'],
							'Name2'			=>$_REQUEST['lname'].",".$_REQUEST['fname'].",".$_REQUEST['title'].",".$_REQUEST['PCode'],
							'Address1'		=>$_REQUEST['address1'],
							'Address2'		=>$_REQUEST['address2'],
							'Address2b'		=>$_REQUEST['address3'],
							'PostCode'		=>$_REQUEST['zip'],
							'Address3'		=>$_REQUEST['city'],
							'Country'		=>$_REQUEST['countryFeild'],
							'County'		=>$_REQUEST['countyFeild'],
							'OtherComm'		=>$_REQUEST['notes_id'],
							'AddName'		=>$_REQUEST['typeFld'],
							'MailSort'		=>$_REQUEST['mailSort'],
							'Midname'		=>$_REQUEST['middlename'],
							'Initials'		=>$_REQUEST['initials'],
							'Addresse'		=>$_REQUEST['addressee'],
							'Title'			=>$_REQUEST['title'],
							'Firstname'		=>$_REQUEST['fname'],
							'Surname'		=>$_REQUEST['lname'],
							'Phone'			=>$_REQUEST['telno'],
							'Mobile'		=>$_REQUEST['mobile'],
							'Fax'			=>$_REQUEST['fax'],
							'Email'			=>$_REQUEST['email'],
							'WebAddress'	=>$_REQUEST['sites_id'],
							'AddValidDate'	=>$stamp,
							'CreateDate'	=>$stamp,
							'UpdateDate'	=>$stamp,
							'AddedBy'		=>$this->session->userdata('u_id')
						); 
		if($_REQUEST['hdnContactID']!=''){
			$this->db->where('CID', $_REQUEST['hdnContactID']);
			$this->db->update('new_contacts', $contacts_addresses); 
			echo json_encode(array('status'=>0,'msg'=>$this->lang->line('contact_form_update_success'),'cid'=>$_REQUEST['hdnContactID']));
		}else{
			$this->db->insert('new_contacts', $contacts_addresses); 
			$stamp = date('Y-m-d H:i:s');	
			echo json_encode(array('status'=>0,'msg'=>$this->lang->line('contact_form_success'),'cid'=>$this->db->insert_id()));
		}
		/*$contacts = array(
							
							'contacts_categories_id'=>$_REQUEST['contacts_categories_id'],
							'contacts_address_id'	=>$contacts_address_id
						 );
		$this->db->insert('contacts', $contacts); 
		$contacts_id = $this->db->insert_id();*/	
		
		}
						 /*
GET http://avocet.spinhalf.com/index.php/contacts/contacts/insertContact/?title=Mr&fname=aaa&lname=aaa&address1=aaa&address2=aaa&address3=aaa&address4=bbb&zip=bbb&city=bbb&telno=1234567890&mobile=1234567890&fax=1234567890&email=aaa%40bbb.com&sites_id=2&contacts_categories_id=11&notes_id=test%09%09
15ms	*/

	}
		function insertContactAddress(){
		//echo var_dump($_REQUEST);
		$this->output->enable_profiler(FALSE);
		$this->form_validation->set_rules('address1', 'Address 1', 'required');
		$this->form_validation->set_rules('address2', 'Address 2', 'required');
		/*
		$this->form_validation->set_rules('address3', 'Address 3', 'required');
		$this->form_validation->set_rules('zip', 	  'Zip', 	   'required');
		$this->form_validation->set_rules('city',  	  'City', 	   'required');
		$this->form_validation->set_rules('telno', 					'Telephone Number', 'required');
		$this->form_validation->set_rules('mobile', 				'Mobile', 			'required');
		$this->form_validation->set_rules('fax', 					'Fax', 				'required');
		$this->form_validation->set_rules('email', 					'email', 			'required|email');
*/
		$v = $this->form_validation->run();
		//echo $v.'##';
		if (!$v){
			$msg = validation_errors();
			if($msg == ''){
				$msg = $this->lang->line('error_generic');	
			}
			echo json_encode(array('status'=>0,'msg'=>$msg));
		}else{
		$stamp = date('Y-m-d H:i:s');
		$contacts_addresses  = array(
							'CID'			=>$_REQUEST['CID'],	
							'AddValidDate'	=>$stamp,	
							'Address1'		=>$_REQUEST['address1'],
							'Address2'		=>$_REQUEST['address2'],
							'Address2b'		=>$_REQUEST['address3'],
							'PostCode'		=>$_REQUEST['zip'],
							'Address3'		=>$_REQUEST['city'],
							'Country'		=>$_REQUEST['countryField'],
							'County'		=>$_REQUEST['countyFeild'],
							'AddName'		=>$_REQUEST['typeFld'],
							'Phone'			=>$_REQUEST['telno'],
							'Mobile'		=>$_REQUEST['mobile'],
							'Fax'			=>$_REQUEST['fax'],
							'Email'			=>$_REQUEST['email'],
							'WebAddress'	=>$_REQUEST['sites_id']
						); 
		$this->db->insert('new_contacts_addresses', $contacts_addresses); 
		$contacts_address_id = $this->db->insert_id();
		$stamp = date('Y-m-d H:i:s');	
		echo json_encode(array('status'=>1,'msg'=>'Alternative Address'));
		/*$contacts = array(
							
							'contacts_categories_id'=>$_REQUEST['contacts_categories_id'],
							'contacts_address_id'	=>$contacts_address_id
						 );
		$this->db->insert('contacts', $contacts); 
		$contacts_id = $this->db->insert_id();*/	
		
		}
						 /*
GET http://avocet.spinhalf.com/index.php/contacts/contacts/insertContact/?title=Mr&fname=aaa&lname=aaa&address1=aaa&address2=aaa&address3=aaa&address4=bbb&zip=bbb&city=bbb&telno=1234567890&mobile=1234567890&fax=1234567890&email=aaa%40bbb.com&sites_id=2&contacts_categories_id=11&notes_id=test%09%09
15ms	*/

	}
	/*END AJAX*/
	function showPartNames($partString)
	{
		$this->load->model('contacts/Contacts_model');

		$con_data				= $this->Contacts_model->returnNameOnPart($partString);
		$data['con']			= $con_data;
		$data['partstring']		= $partString;
		$this->load->view('/contacts/viewContactList', $data);
	}
	
	function newContactForm()
	{
		$data = '';
		$this->output->enable_profiler(TRUE);
		foreach($_REQUEST as $key => $var)
		{
			$data[$key] 			= $var;
		}
		
		$data['sites']				= $this->getSites();
		$data['categories']			= $this->getCategories();
		$this->load->view('/contacts/newContact', $data);
	} 
	
	function editContactForm($data)
	{
		$this->load->view('/contacts/newContact', $data);
	} 
	
	function getCategories()
	{
		$this->load->model('contacts/Contacts_model');
		$con_data				= $this->Contacts_model->returnContactCategories();
		return $con_data;
	}

	function getSites()
	{
		$this->load->model('utils/Utils_model');
		$ut_data				= $this->Utils_model->returnSitesList();
		return $ut_data;
	}	
}

?>
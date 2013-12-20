<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts_model extends CI_Model
{	
	function Contacts_model()
	{
		parent::__construct();
	}	
	public function alternateAddress($CID){
		
		$this->db->select('CID, AddName, Address1, Address2, Address2b, Address3, County, PostCode, Country, Phone');
		$this->db->where('CID', $CID); 
		/*$this->db->order_by('dl_time');*/
		$results['sData'] = $this->db->get('new_contacts_addresses')->result_array();
		$res = array();
		$res['aaData'] = array();
		foreach($results['sData'] as $a){
			
			$valArray = array($a['AddName'],$a['Address1'],$a['Address2'],$a['Address2b'],$a['Address3'],$a['County'],$a['PostCode'],$a['Country'],'<button class="editAddressButton" data-id="'.$a['CID'].'">Edit</button><button class="deleteAddressButton" data-id="'.$a['CID'].'">Delete</button>');
			//var_dump($valArray);
			array_push($res['aaData'],$valArray);
		}
		return $res;
	}
	
	public function autoCompleteSearch($name, $page){
		
		$this->db->select('CID,PCode,Title,Surname,Firstname,PostCode');
		//$this->db->limit(10, 20);
		$posts = $this->config->item('posts_per_page')+1;
		$p = $this->config->item('posts_per_page')*$page;
		$this->db->limit($posts, $p);
		$this->db->like('Surname', $name); 
		$this->db->where('Deleted', '0'); 
		/*$this->db->order_by('dl_time');*/
		$results['data'] = $this->db->get('new_contacts')->result_array();
		if(sizeof($results['data'])>$this->config->item('posts_per_page')){
			$results['show_next_page_button'] = true;	
		}else{
			$results['show_next_page_button'] = false;
		}
		return $results;
	}
	
	public function getContact($cid){
		
		$this->db->select('*');
		$this->db->where('CID', $cid); 
		/*$this->db->order_by('dl_time');*/
		//add ability to lock records
		$results['data'] = $this->db->get('new_contacts')->result_array();
		return $results;
	}
	
	public function returnNameOnPart($partString)
	{
		$con_data				= array();
		$counter				= 0;
		
		$query					= $this->db
									->select('`CID`,`Title`,`Firstname`,`Surname`')
									->from('new_contacts')
									->like('Surname', $partString, 'both')
									->or_like('Firstname', $partString, 'both')
								->get();
								
		foreach($query->result() as $row)
		{
			$counter++;
			$con_data[$row->CID]		= Array(
										"id" 			=> $row->CID,
			 							"fname" 		=> $row->Firstname,
										"title" 		=> $row->Title,
										"lname" 		=> $row->Surname
									);
			
		}
		$con_data['count']		= $counter; 
		return $con_data;						
	}
	
	public function returnIdentity($id)
	{
		$con_data				= array();
		
		$query					= $this->db
									->select('*')
									->from('contacts')
									->where('id', $id)
								->get();
								
		foreach($query->result() as $row)
		{
			$con_data[$row->id]		= Array(
										"id" 			=> $row->id,
			 							"fname" 		=> $row->fname,
										"lname" 		=> $row->lname
									);
			
		}
		return $con_data;						
	}
	
	public function returnContactCategories()
	{
		$con_data				= array();
		
		$query					= $this->db
									->select('*')
									->from('contacts_categories')
								->get();
								
		foreach($query->result() as $row)
		{
			$con_data[$row->id]		= Array(
										"id" 			=> $row->id,
			 							"contact_type"	=> $row->contact_type,
									);
		}
		return $con_data;						
	}
}

?>
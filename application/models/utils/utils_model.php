<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utils_model extends CI_Model
{	
	function Utils_model()
	{
		parent::__construct();
	}	
	
	public function returnSitesList()
	{
		$ut_data				= array();
		
		$query					= $this->db
									->select('*')
									->from('sites')
								->get();
								
		foreach($query->result() as $row)
		{
			$ut_data[$row->id]		= Array(
										"id" 				=> $row->id,
			 							"name" 				=> $row->name,
										"dateadded"			=> $row->dateadded,
										"description"		=> $row->description,
										"address1"			=> $row->address1,
										"address2"			=> $row->address2,
										"address3"			=> $row->address3,
										"zip"				=> $row->zip,
										"default_color"		=> $row->default_color
									);
		}
		return $ut_data;						
	}	
}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Therapies_model extends CI_Model
{	
	function Therapies_model()
	{
		parent::__construct();
	}	
	
	public function returnTherapiesList()
	{
		$th_data				= array();
		
		$query					= $this->db
									->select('*')
									->from('therapies')
								->get();
								
		foreach($query->result() as $row)
		{
			$th_data[$row->id]		= Array(
										"id" 			=> $row->id,
			 							"name" 			=> $row->name,
										"color" 		=> $row->colour,
										"cssclass"		=> $row->csscll
									);
		}
		return $th_data;						
	}
	
	public function updateColors($data)
	{
		$id							= $data['item'];
		$query						= $this->db->update('therapies', array('colour' => $data['color']), "id = $id");

		return $this->db->affected_rows();	
	}
}

?>
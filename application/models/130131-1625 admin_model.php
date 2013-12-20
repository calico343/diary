<?php

class Admin_model extends CI_Model 
{
	function __construct()
	{
		$this->load->library('session');
		//$this->output->enable_profiler(TRUE);
	}

	public function verify_user($email, $password)
	{
		$q = $this
            ->db
            ->where('email', $email)
            ->where('password', md5($password))
            ->limit(1)
            ->get('users');

		if ( $q->num_rows > 0 ) 
		{
			$res['login']		= true;
						
			foreach($q->result() as $row)
			{
				$res['type'] 	= $row->privilege; 				
				//save some info in the session
				$array = array(
					'u_id'						=> $row->id,	
                    'u_email'					=> $row->email,
                    'u_default_site'     		=> $row->default_site,
                    'u_site_switch_privilege'	=> $row->site_switch_privilege,
					'u_privilege'				=> $row->privilege
               );
				$this->session->set_userdata($array);
				$res['fname']	= $row->first_name;
				$res['lname']	= $row->last_name;
			}
			$res['menu']		= $this->render_menu($res['type']);
			return $res;
		}
		else 
		{
			return false;
		}
	}
	
	public function render_menu($type)
	{
		$menu_array 	= array();
		
		$mq				= $this
						->db
						->where($type, true)
						->where('live', '1')
						->where('layer', 'head')
						->get('menu'); 
						
		foreach($mq->result() as $mrow)
		{			
			$iq			= $this
						->db
						->where('live', '1')
						->where('layer', $mrow->itemname)
						->get('menu');
						
			foreach($iq->result() as $irow)
			{
				$item_array[$irow->itemname] =  $irow->itemstring;
			}	
			if(!empty($item_array)) 
			{ 
				$menu_array[$mrow->itemname] = $item_array ;
			}
			else 
			{
				$menu_array[$mrow->itemname] = $mrow->itemstring;
			}
			unset($item_array);
			//echo $this->db->last_query(); 
		}  
		return $menu_array;
	}
}


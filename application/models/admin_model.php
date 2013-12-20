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
				$res['fname']					= $row->first_name;
				$res['lname']					= $row->last_name;
				$res['site_switch_privilege']	= $row->site_switch_privilege;
				$res['default_site']			= $row->default_site;
				$res['privilege']				= $row->privilege;
				$res['cal_switch']				= $row->cal_switch_privilege;
			}
			$res['menu']		= $this->render_menu($res['type']);
            $res['new_menu']    = $this->render_new_menu($res['type']);
            
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
    
    public function render_new_menu($type)
    {
        
        $menuitems = $this
                        ->db
                        ->where($type, true)
                        ->where('live', '1')
                        ->get('menu'); 
        
        $menuarray = array();
        
        foreach($menuitems->result() as $mrow)
        {             
            $menuarray[] = $mrow;     
        }
         
        return $menuarray;
    }
    
    public function checkMember($data)
	{
		$res 				= 0;
		foreach($data as $k => $v)
		{
			$q = $this
	            ->db
	            ->where($k, $v)
	            ->limit(1)
			->get('users');
	
			if ( $q->num_rows > 0 ) 
			{
				$res	=	$res + $q->num_rows;
			}
		}
		return $res;
	} 

	public function verify_user($username, $password, $app = null)
	{
		$q = $this
            ->db
            ->where('email', $username)
            ->where('password', md5($password))
            ->limit(1)
		->get('users');

		if ( $q->num_rows > 0 ) 
		{
			if($app == true)
			{
				$token 	= $this->getUniqueCode();
				$data 	= array('token' => $token);
				
				$uq		= $this
							->db
							->where('email', $username)
	            			->where('password', md5($password))
	            		->update('users', $data);
				if($uq)
				{
					return $token;	
				}
				else 
				{
					redirect('autherror/display');
				}
			}
			else 
			{
				return $q->result();				
			}
		}
		else
		{
			return false;	
		}
	}
	
	public function register($data)
	{
		$q 		= $this->db->insert('users', $data);

		if($q) { return true; } else {  return false; } ; 
	}
	
	public function tokenVerify($token)
	{
		$q = $this
            ->db
            ->where('token', $token)
            ->limit(1)
		->get('users');
		
		if($q->num_rows > 0)
		{
			foreach($q->result() as $row)
			{
				foreach($row as $k => $v)
				{
					$uar[$k] = $v;					
				}
			}
			$stat[0] = true;
			$stat[1] = $uar;
			return $stat;	
		}
		else
		{
			return false;
		}
	}
	
	public function mobileLogout($token)
	{            
		$data 	= array('token' => '');
		$uq		= $this
					->db
					->where('token', $token)
					->update('users', $data);
			
		return $this->db->affected_rows();
	}
	
	private function getUniqueCode($length = "")
	{
		$code = md5(uniqid(rand(1000000000, 9999999999), true));
		if ($length != "")
		{
			return substr($code, 0, $length);
		}
		else
		{
			return $code;	
		} 
	}	
}


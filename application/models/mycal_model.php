<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mycal_model extends CI_Model
{	
	function Mycal_model()
	{
		parent::__construct();
	}	
	
	function addCalendarData($data)
	{
		$query 						= $this->db
										->insert('new_calendar_appointments', 
										array(
											'start_date'	=> $data['sdate'],
											'end_date' 		=> $data['edate'],
											'start_time'	=> $data['stime'],
											'end_time' 		=> $data['etime'],
											'notes_id'		=> $data['notes'],
											'type'			=> $data['type'],
											'reminder'		=> $data['rem'],
											'contact_id' 	=> $data['contactid'],
											'therapy_id' 	=> $data['therapy']
										));
		return $this->db->affected_rows();						
	}
	
	function editCalendarData($data)
	{
		$id							= $data['calid'];
		$query						= $this->db
										->update('new_calendar_appointments',
										array(
											'start_date'	=> $data['sdate'],
											'end_date' 		=> $data['edate'],
											'start_time'	=> $data['stime'],
											'end_time' 		=> $data['etime'],
											'notes_id'		=> $data['notes'],
											'type'			=> $data['type'],
											'reminder'		=> $data['rem'],
											'contact_id' 	=> $data['contactid'],
											'therapy_id' 	=> $data['therapy']
										), "id = $id");

		return $this->db->affected_rows();								
	}
	
	function editEventTimes($data)
	{
		$id							= $data['calid'];
		$query						= $this->db
										->update('new_calendar_appointments',
										array(
											'start_date'	=> $data['sdate'],
											'end_date' 		=> $data['edate'],
											'start_time'	=> $data['stime'],
											'end_time' 		=> $data['etime']
										), "id = $id");

		return $this->db->affected_rows();								
	}
	
	function editEventDate($data)
	{
		$id							= $data['calid'];
		$query						= $this->db
										->update('new_calendar_appointments',
										array(
											'start_date'	=> $data['sdate'],
											'end_date' 		=> $data['edate']
										), "id = $id");

		return $this->db->affected_rows();								
	}
	
	function deleteEvent($data)
	{
		$id							= $data['calid'];
		$query						= $this->db->delete('new_calendar_appointments', array('id'	=> $id));
		return $this->db->affected_rows();								
	}
	
	function getAppointmentTypes()
	{
		$query					= $this->db
									->select('
										`calendar_event_type.id`,
										`calendar_event_type.name`
									')
									->from('calendar_event_type')
									->order_by('id')
								->get();
		foreach($query->result() as $row)
		{
			$apTypeData[$row->id]	= $row->name;
		}
		return $apTypeData;
	}
	
	function getCalendarData($date, $periodtype, $evtype = null)
	{		
		if($periodtype == 'w')
		{
			$dates					= $this->getStartAndEndDateOfWeek($date);
			
			$query					= $this->db
										->select('
											`new_calendar_appointments.id` AS calid,
											`new_calendar_appointments.start_date` AS sdate,
											`new_calendar_appointments.end_date` AS edate,
											`new_calendar_appointments.start_time`,
											`new_calendar_appointments.end_time`,
											`new_calendar_appointments.date_added`,
											`new_calendar_appointments.stamp` AS castamp,
											`new_calendar_appointments.user_created_id`,
											`new_calendar_appointments.user_edited_id`,
											`new_calendar_appointments.cancelled`,
											`new_calendar_appointments.date_cancelled`,
											`new_calendar_appointments.notes_id`,
											`new_calendar_appointments.contact_id`,
											`new_calendar_appointments.therapy_id`,
											`new_calendar_appointments.type` AS ctype, 
											`new_calendar_appointments.reminder`,
											`new_calendar_appointments.site`,
											`therapies.name`, 
											`therapies.csscll`, 
											`new_contacts.Firstname`, 
											`new_contacts.Surname`, 
											`therapies.colour`,
											`calendar_event_type.cssclass`,
											`new_contacts.Title`
										  ')
										->from('new_calendar_appointments')
										->join('new_contacts', 'new_calendar_appointments.contact_id = new_contacts.CID', 'left outer')
										->join('therapies', 'new_calendar_appointments.therapy_id = therapies.id', 'left outer')
										->join('calendar_event_type', 'new_calendar_appointments.type = calendar_event_type.id', 'left outer')
										->where('start_date > ', $dates[0])
										->where('start_date < ', $dates[1])
									->get();
		}
		else if($periodtype == 'e')
		{
			$id						= $date;
			$query					= $this->db
										->select('
											`new_calendar_appointments.id` AS calid,
											`new_calendar_appointments.start_date` AS sdate,
											`new_calendar_appointments.end_date` AS edate,
											`new_calendar_appointments.start_time`,
											`new_calendar_appointments.end_time`,
											`new_calendar_appointments.date_added`,
											`new_calendar_appointments.stamp` AS castamp,
											`new_calendar_appointments.user_created_id`,
											`new_calendar_appointments.user_edited_id`,
											`new_calendar_appointments.cancelled`,
											`new_calendar_appointments.date_cancelled`,
											`new_calendar_appointments.notes_id`,
											`new_calendar_appointments.contact_id`,
											`new_calendar_appointments.therapy_id`,
											`new_calendar_appointments.type` AS ctype,
											`new_calendar_appointments.reminder`,
											`new_calendar_appointments.site`,
											`therapies.name`, 
											`therapies.csscll`, 
											`new_contacts.Firstname`, 
											`new_contacts.Surname`, 
											`therapies.colour`,
											`calendar_event_type.cssclass`,
											`new_contacts.Title`
										  ')
										->from('new_calendar_appointments')
										->join('new_contacts', 'new_calendar_appointments.contact_id = new_contacts.CID', 'left outer')
										->join('therapies', 'new_calendar_appointments.therapy_id = therapies.id', 'left outer')
										->join('calendar_event_type', 'new_calendar_appointments.type = calendar_event_type.id', 'left outer')
										->where('new_calendar_appointments.id', $id)
									->get();		
		}
		else if($periodtype == 'd')
		{
			$year					= strftime("%Y", strtotime($date));
			$month					= strftime("%m", strtotime($date));
			$day					= strftime("%d", strtotime($date));
			$nday					= $day + 1;
			
			$query					= $this->db
										->select('
											`new_calendar_appointments.id` AS calid,
											`new_calendar_appointments.start_date` AS sdate,
											`new_calendar_appointments.end_date` AS edate,
											`new_calendar_appointments.start_time`,
											`new_calendar_appointments.end_time`,
											`new_calendar_appointments.date_added`,
											`new_calendar_appointments.stamp` AS castamp,
											`new_calendar_appointments.user_created_id`,
											`new_calendar_appointments.user_edited_id`,
											`new_calendar_appointments.cancelled`,
											`new_calendar_appointments.date_cancelled`,
											`new_calendar_appointments.notes_id`,
											`new_calendar_appointments.contact_id`,
											`new_calendar_appointments.therapy_id`,
											`new_calendar_appointments.type` AS ctype,
											`new_calendar_appointments.reminder`,
											`new_calendar_appointments.site`,
											`therapies.name`, 
											`therapies.csscll`, 
											`new_contacts.Firstname`, 
											`new_contacts.Surname`, 
											`therapies.colour`,
											`calendar_event_type.cssclass`,
											`new_contacts.Title`
										  ')
										->from('new_calendar_appointments')
										->join('new_contacts', 'new_calendar_appointments.contact_id = new_contacts.CID', 'left outer')
										->join('therapies', 'new_calendar_appointments.therapy_id = therapies.id', 'left outer')
										->join('calendar_event_type', 'new_calendar_appointments.type = calendar_event_type.id', 'left outer')
										->where('start_date > ', "$year-$month-$day")
										->where('start_date < ', "$year-$month-$nday")
									->get();
		}
		else
		{
			$year					= strftime("%Y", strtotime($date));
			$month					= strftime("%m", strtotime($date));
			
			$query					= $this->db
										->select('
											`new_calendar_appointments.id` AS calid,
											`new_calendar_appointments.start_date` AS sdate,
											`new_calendar_appointments.end_date` AS edate,
											`new_calendar_appointments.start_time`,
											`new_calendar_appointments.end_time`,
											`new_calendar_appointments.date_added`,
											`new_calendar_appointments.stamp` AS castamp,
											`new_calendar_appointments.user_created_id`,
											`new_calendar_appointments.user_edited_id`,
											`new_calendar_appointments.cancelled`,
											`new_calendar_appointments.date_cancelled`,
											`new_calendar_appointments.notes_id`,
											`new_calendar_appointments.contact_id`,
											`new_calendar_appointments.therapy_id`,
											`new_calendar_appointments.type` AS ctype, 
											`new_calendar_appointments.reminder`,
											`new_calendar_appointments.site`,
											`therapies.name`, 
											`therapies.csscll`, 
											`new_contacts.Firstname`, 
											`new_contacts.Surname`, 
											`therapies.colour`,
											`calendar_event_type.cssclass`,
											`new_contacts.Title`
										  ')
										->from('new_calendar_appointments')
										->join('new_contacts', 'new_calendar_appointments.contact_id = new_contacts.CID', 'left outer')
										->join('therapies', 'new_calendar_appointments.therapy_id = therapies.id', 'left outer')
										->like('new_calendar_appointments.start_date', "$year-$month", 'after')
										->join('calendar_event_type', 'new_calendar_appointments.type = calendar_event_type.id', 'left outer')
									->get();
		}
		
		$cal_data					= array();
		
		//var_dump($query->result());
		foreach($query->result() as $row)
		{
			$day 					= strftime("%d", strtotime($row->sdate));
			$month 					= strftime("%m", strtotime($row->sdate));
			$year 					= strftime("%Y", strtotime($row->sdate));
			
			if($evtype == null || $evtype == "all")
			{
				$cal_data[$row->calid] 	= Array(
											 "day"				=> $day,
											 "month"			=> $month,
											 "year"				=> $year,
											 "sdate"			=> strftime("%Y-%m-%d",strtotime($row->sdate)),
											 "edate"			=> strftime("%Y-%m-%d",strtotime($row->edate)),
											 "start"			=> strftime("%H:%M",strtotime($row->start_time)),
											 "end"				=> strftime("%H:%M",strtotime($row->end_time)),
											 "date_added"		=> $row->date_added,
											 "stamp"			=> $row->castamp,
											 "type"				=> $row->ctype,
											 "user_created_id"	=> $row->user_created_id,
											 "user_edited_id"	=> $row->user_edited_id,
											 "cancelled"		=> $row->cancelled,
											 "date_cancelled"	=> $row->date_cancelled,
											 "notes_id"			=> $row->notes_id,
											 "contact_id"		=> $row->contact_id,
											 "therapy_id"		=> $row->therapy_id,
											 "cal_id"			=> $row->calid,
											 "therapy_name"		=> $row->name, 
											 "colourcode"		=> $row->colour,
											 "cssclass"			=> $row->csscll,
											 "site"				=> $row->site,			
											 "fname"			=> $row->Firstname, 
											 "lname"			=> $row->Surname,
											 "title"			=> $row->Title,
											 "reminder"			=> $row->reminder
										);
			}
			else 
			{
				if(trim($row->ctype) == trim($evtype))
				{
					$cal_data[$row->calid] 	= Array(
											 "day"				=> $day,
											 "month"			=> $month,
											 "year"				=> $year,
											 "sdate"			=> strftime("%Y-%m-%d",strtotime($row->sdate)),
											 "edate"			=> strftime("%Y-%m-%d",strtotime($row->edate)),
											 "start"			=> strftime("%H:%M",strtotime($row->start_time)),
											 "end"				=> strftime("%H:%M",strtotime($row->end_time)),
											 "date_added"		=> $row->date_added,
											 "stamp"			=> $row->castamp,
											 "type"				=> $row->ctype,
											 "user_created_id"	=> $row->user_created_id,
											 "user_edited_id"	=> $row->user_edited_id,
											 "cancelled"		=> $row->cancelled,
											 "date_cancelled"	=> $row->date_cancelled,
											 "notes_id"			=> $row->notes_id,
											 "contact_id"		=> $row->contact_id,
											 "therapy_id"		=> $row->therapy_id,
											 "cal_id"			=> $row->calid,
											 "therapy_name"		=> $row->name, 
											 "colourcode"		=> $row->colour,
											 "cssclass"			=> $row->csscll,
											 "site"				=> $row->site,			
											 "fname"			=> $row->Firstname, 
											 "lname"			=> $row->Surname,
											 "title"			=> $row->Title,
											 "reminder"			=> $row->reminder
										);
				}
			}
		}
		//echo $this->db->last_query();
		return $cal_data;
	}
	
	function getStartAndEndDateOfWeek($date) 
	{
		$time						= strtotime($date);
		$weekday					= strftime("%w", $time);
		$de							= strftime("%Y-%m-%d",((6 - $weekday) * 86400) + $time);
		$ds							= strftime("%Y-%m-%d",((-$weekday) * 86400) + $time);
			
		$res[0]						= $ds;
		$res[1]						= $de;
		$res[2]						= $weekday;

		return $res;
	}
	
	function tempSetter()
	{
		$query					= $this->db
									->select('`new_calendar_appointments.id` AS calid,')
									->from('new_calendar_appointments')
								->get();
		$x = 0;		
		$s = "";				
		foreach($query->result() as $row)
		{
			$id					= $row->calid;
			$x%2 ? $s = 'RFH' : $s = "ELP"; 
			echo $x . " " . $s . "<br/>";
			//$nq					= $this->db->update('new_calendar_appointments', array('site' => $s), "id = $id");
			//print_r($nq);
			$x++;
		}
	}
}
?>

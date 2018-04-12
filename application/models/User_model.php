<?php

class User_model extends CI_Model
{
    
 //    function create()
	// {
	// 	$this->db->insert('tbl_user_registration',$this);
	// 	return $this->db->insert_id();
	// }
    function start_session()
    {
        if($this->session->userdata('register_id'))
        {   
            $this->register_id=$this->session->userdata('register_id');         
            if($this->user_exists())
            {
                $this->user_exists();
                $this->loggedin=TRUE;
            }
        }
        else
            $this->loggedin=FALSE;
    }

            function user_exists()
    {
            $this->db->select('tbl_user_registration.*')->from('tbl_user_registration');
            $this->db->where('register_id',$this->register_id); 
            $query=$this->db->get();
            //echo $this->db->last_query();exit;
           foreach($query->result() as $row)
        { 
            $this->register_id=$row->register_id;
            $this->register_username=$row->register_username;
            $this->register_email=$row->register_email;
            $this->register_password=$row->register_password;
            return $row;
        }
        return false;
    }

     function user_check($register_username, $register_password) 
    { 
        

                $this->db->select('tbl_user_registration.*')->from('tbl_user_registration');
                $this->db->where('register_username',$register_username); 
                $this->db->or_where('register_email',$register_username);
                
                $query=$this->db->get();
                //echo $this->db->last_query(); exit;
                foreach($query->result() as $row)
            {
             //echo $register_password;
             //echo $row->register_password;
            if (password_verify($register_password, $row->register_password)) 
            {
                  $this->register_id=$row->register_id;
                  $this->register_username=$row->register_username;
                 $this->register_email=$row->register_email;
                 $this->register_password=$row->register_password;
                
                return TRUE;
            }
        }
    
        return FALSE;
    }
  function insert_register()
    {
        $this->db->insert('tbl_user_registration',$this);
        return $this->db->insert_id();
    }
	

	function get_profile($register_id)
{
		$this->db->select('tbl_user_registration.*')->from('tbl_user_registration');
		$this->db->where('tbl_user_registration.register_id', $register_id);
    	$this->db->order_by('register_id', 'asc');

		$query = $this->db->get();
        //echo $this->db->last_query();exit;

		foreach ($query->result() as $row) 
		{
			return $row;
		}
}
/////update user///////
    
    function update_user($register_id, $data1)
    {
         $edited_details = array(
                'register_firstname' => $data1['register_firstname'],
                'register_lastname' => $data1['register_lastname'],
                'register_nationality' => $data1['register_nationality'],
                'register_location' => $data1['register_location'],
               //'register_image' => $data1['register_image'],
                'register_dob'=> $data1['register_dob'],
                'register_gender'=> $data1['register_gender'],
                'register_mobile'=>$data1['register_mobile'],
                'register_email'=>$data1['register_email']
               );
        $this->db->where('register_id', $register_id);
        $this->db->update('tbl_user_registration',$edited_details);
        //echo $this->db->last_query(); exit;
    }
/////close update user////
    //////show booked events//////
      function my_booked_events()
    {
      $register_id='11';
      $this->db->select('tbl_event_booking.booking_id,booking_event_name,booking_userid,booking_user_firstname,booking_user_lastname,booking_user_address,booking_user_email,booking_user_mobile')->from('tbl_event_booking');
      $this->db->where('tbl_event_booking.booking_userid', $register_id);
      $query=$this->db->get();
     //echo $this->db->last_query();exit;
     return $query->result();
    }
    /////close booked events/////
		function is_loggedin()
	{

		return $this->loggedin;
	}


	

	
	function find_email_by_name($register_email)
	{
		$query = $this->db->get_where('tbl_user_registration',array('register_email' => $register_email));
		if($query->num_rows() >0) 
		{
			foreach ($query->result() as $row) 
			{
				return $row->register_username;
			}
			 
                }
	}

	function update_user_email($data) 
	{
		$sql = "UPDATE tbl_user_registration SET rs='$data[rs]' WHERE register_email='$data[email]'"; 
		
		$this->db->query($sql);

	}

	public function get_mail($rs)
	{
		$this->db->select('register_email, register_username');
		$this->db->from('tbl_user_registration');
		$this->db->where('rs', $rs); 
		$query = $this->db->get();
		return $query->result();
	}

	function update_password($password, $rs)
{
  $this->db->update('tbl_user_registration',array('register_password'=>$password, 'rs'=>''),array('rs'=>$rs));

} 

function mail_exists($register_email)
    {
       $query = $this->db->get_where('tbl_user_registration', array('register_email' => $register_email));
       //echo $this->db->last_query();
       return $query->row();      
    }
    
    function username_exists($register_username)
    {
       $query = $this->db->get_where('tbl_user_registration', array('register_username' => $register_username));
       //echo $this->db->last_query();
       return $query->row();      
    }
    
  
	
	
	

	

   

   
    
   

  
 

 

  
 
  
 
  
 


	

    }?>
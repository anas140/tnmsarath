<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    function insert_event()
    {
        $this->db->insert('tbl_events',$this);
        return $this->db->insert_id();
        echo $this->db->last_query();
        //exit;
    }
    function insert_seat($data)
    {
        $this->db->insert('tbl_seats',$data);
        echo $this->db->last_query();
        //exit;
    }
    function insert_faq($data)
    {
        $this->db->insert('tbl_faq',$data);
    }
	 function insert_package($data)
    {
        $this->db->insert('tbl_package',$data);
        //echo $this->db->last_query();
    }
     function update_package($package_id)
    {
        $this->db->update('tbl_package',$this, array('package_id'=>$package_id));
    }
	  function delete_package($package_id)
    {
        $this->db->update('tbl_package',$this, array('package_id'=>$package_id));
    }


       function single_package_id($data)
    {
        $this->db->select('*');
        $this->db->select('tbl_package.package_id,package_name,package_description,package_image,package_price,tbl_course.course_id,course_name')->from('tbl_package');
        $this->db->join('tbl_course','tbl_course.course_id=tbl_package.course_id','left');
        
        //$this->db->from('tbl_package');
        $this->db->where('package_id', $data);
        $query = $this->db->get();
        return $query->result() ;

    }
     function display_package()
   {
       //$this ->db-> select('*');
       //$this ->db-> from('tbl_package');
      $this->db->select('tbl_package.package_id,package_name,package_description,package_image,package_price,package_status,package_postedon,tbl_course.course_id,course_name')->from('tbl_package');
        $this->db->join('tbl_course','tbl_course.course_id=tbl_package.course_id','left');
       $this->db->where('package_delete_status',0);
       $this->db->order_by('package_id', 'desc');
       $query = $this->db->get();
       return $query->result() ;
   }
        function insert_about()
    {
        $this->db->insert('tbl_about',$this);
        //echo $this->db->last_query();
        //exit;
    }
    /////insert blog//////
      function insert_blog($data)
    {
        $this->db->insert('tbl_blog',$data);
    }
    /////close insert blog/////
        function display_events()
    {
        //$category = $this->input->post('category_name');
        //$id = $this->input->post('category_id');
        $this -> db -> select('*');
        $this -> db -> from('tbl_events');
        $this->db->where('event_delete_status',0);
        $this->db->order_by('event_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    ///////display category///////////
    function display_category()
    {
        //$category = $this->input->post('category_name');
        //$id = $this->input->post('category_id');
        $this -> db -> select('*');
        $this -> db -> from('tbl_category');
        $this->db->where('category_delete_status',0);
        $this->db->order_by('category_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    //////insert category///////////
      function insert_category($data)
    {
        $this->db->insert('tbl_category',$data);
        //echo $this->db->last_query();
    }
//////close insert category/////////////
    //////insert course///////////
      function insert_course($data)
    {
        $this->db->insert('tbl_course',$data);
        //echo $this->db->last_query();
    }
//////close insert course/////////////
    /////insert instructor profile/////
          function insert_instructor_profile($data)
    {
        $this->db->insert('tbl_instructor_profile',$data);
        //echo $this->db->last_query();
    }
    ////close insert instructor profile////
        //////insert slider///////////
      function insert_slider($data)
    {
        $this->db->insert('tbl_slider',$data);
        return $this->db->insert_id();

        //echo $this->db->last_query();
    }
//////close insert slider/////////////
    /////single category selection/////

    function single_category_id($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $data);
        $query = $this->db->get();
        return $query->result() ;
    }
    /////close single category//////////
       function single_event_id($event_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_events');
        $this->db->where('event_id', $event_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result() ;
    }
    /////select single slider/////
    function single_slider_id($slider_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->where('slider_id', $slider_id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result() ;
    }
    //////close single slider//////
        function single_about_id($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_about');
        $this->db->where('about_id', $data);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result() ;
    }
        function update_event($event_id)
    {
        $this->db->update('tbl_events',$this, array('event_id'=>$event_id));
        //echo $this->db->last_query();exit;
    }
    ////update seat//////////
      function update_seat($event_id,$data,$seat_type)
    {
        //$this->db->update('tbl_seats',$this, array('event_id'=>$event_id));
         $this->db->where('event_id', $event_id);
         $this->db->where('seat_type', $seat_type);
        $this->db->update('tbl_seats', $data);
        echo $this->db->last_query();exit;
    }
    ////close update seat//////
    ///update instructor profile/////
    function update_instructor_profile($profile_id)
    {
        $this->db->update('tbl_instructor_profile',$this, array('profile_id'=>$profile_id));
    }
    ////close update instructor profile/////
    ///////update slider//////////
         function update_slider($slider_id)
    {
        $this->db->update('tbl_slider',$this, array('slider_id'=>$slider_id));
    }
    /////close update slider/////
    /////update category//////
         function update_category($category_id)
    {
        $this->db->update('tbl_category',$this, array('category_id'=>$category_id));
    }
    /////close update category///////
          function update_about($about_id)
    {
        $this->db->update('tbl_about',$this, array('about_id'=>$about_id));
    }
    /////close update moinu////////
	//////update course/////
	function update_course($course_id)
	{
		$this->db->update('tbl_course',$this, array('course_id'=>$course_id));
		//echo $this->db->last_query();exit;
	}
	/////close update course////
        function delete_event($event_id)
    {
        $this->db->update('tbl_events',$this, array('event_id'=>$event_id));
    }
	/////delete course////////
	    function delete_course($course_id)
    {
        $this->db->update('tbl_course',$this, array('course_id'=>$course_id));
    }
	/////close delete course////
    /////////delete about/////////
         function delete_about($about_id)
    {
        $this->db->update('tbl_about',$this, array('about_id'=>$about_id));
    }
    //////close delete about////////////
        function display_about()
    {
        //$category = $this->input->post('category_name');
        //$id = $this->input->post('category_id');
        $this -> db -> select('*');
        $this -> db -> from('tbl_about');
        $this->db->where('about_delete_status',0);
        $this->db->order_by('about_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    //////single blog/////
     function single_blog_id($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('blog_id', $data);
        $query = $this->db->get();
        return $query->result() ;
    }

    //////close single blog//////
    ////start single profile ///
    function single_profile_id($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_instructor_profile');
        $this->db->where('profile_id',$data);
        $query=$this->db->get();
        return $query->result();
        
    }
    /////close start single profile////
    ///////display blog////////
      function display_blog()
    {
        $this ->db-> select('*');
        $this ->db-> from('tbl_blog');
        $this->db->where('blog_delete_status',0);
        $this->db->order_by('blog_id', 'desc');
        $query = $this->db->get();

        return $query->result() ;
    }
    ///////close display blog//////
	
	///////display course////////
    //   function display_course()
    // {
    //     $this ->db-> select('*');
    //     $this ->db-> from('tbl_course');
    //     $this->db->where('course_delete_status',0);
    //     $this->db->order_by('course_id', 'desc');
    //     $query = $this->db->get();
       
    //     return $query->result() ;
    //  }
    function display_course()
   {
        $this->db->select('tbl_course.*, tbl_languages.language_name')
                 ->from('tbl_course')
                 ->join('tbl_languages', 'FIND_IN_SET(tbl_languages.language_id, tbl_course.course_language)','left');
        $query = $this->db->get();
      // echo $this->db->last_query();exit;
       return $query->result() ;
   }
    ///////close display course//////
	/////get course for course module////
	   function get_courses()
    {
        $this ->db-> select('course_id,course_name,course_language');
        $this ->db-> from('tbl_course');
        $this->db->where('course_delete_status',0);
        $this->db->order_by('course_id', 'desc');
        $query = $this->db->get();
       
        return $query->result() ;
    }
	////close get course for get module////
    //////display testimonial/////
       function display_testimonial()
    {
        $this ->db-> select('*');
        $this ->db-> from('tbl_testimonial');
        $this ->db-> where('testimonial_type',1);
        $this->db->where('testimonial_delete_status',0);
        $this->db->order_by('testimonial_id', 'desc');
        $query = $this->db->get();
        return $query->result() ;
    }
    ////close display testimonial//////
    //////display instructor profile/////
    function display_instructor_profile()
    {
        $this ->db-> select('*');
        $this ->db-> from('tbl_instructor_profile');
        $this->db->where('profile_delete_status',0);
        $this->db->order_by('profile_id', 'desc');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result() ;
    }
    /////close display instructor profile/////
    //////display banners///////
        function display_slider()
        {
        $this ->db-> select('*');
        $this ->db-> from('tbl_slider');
        $this->db->where('slider_delete_status',0);
        $this->db->order_by('slider_id', 'desc');
        $query = $this->db->get();
        return $query->result() ;
    }
    //////close display banners/////
     //////display faq/////
       function display_faq()
    {
        $this ->db->select('*');
        $this ->db->from('tbl_faq');
        $this->db->where('faq_delete_status',0);
        $this->db->order_by('faq_id', 'desc');
        $query = $this->db->get();
        return $query->result() ;
    }
    ////close display faq//////

     //////display testimonial/////
       function display_vdo_testimonial()
    {
        $this ->db-> select('*');
        $this ->db-> from('tbl_testimonial');
        $this ->db-> where('testimonial_type',2);
        $this->db->where('testimonial_delete_status',0);
        $this->db->order_by('testimonial_id', 'desc');
        $query = $this->db->get();
        return $query->result() ;
    }
    ////close display testimonial//////
    //////insert testimonial///////
     function insert_testimonial($data)
    {
        $this->db->insert('tbl_testimonial',$data);
    }

    //////close insert testimonial///////
    //////insert vdo testimonial///////
     function insert_vdo_testimonial($data)
    {
        $this->db->insert('tbl_testimonial',$data);
    }

    //////close insert vdo testimonial///////
    //////single testimonial////////
    
    function single_testimonial_id($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_testimonial');
        $this->db->where('testimonial_id', $data);
        $query = $this->db->get();
        return $query->result() ;
    }
    //////close single testimonial///////
	    //////single course////////
    
    function single_course_id($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_course');
        $this->db->where('course_id', $data);
        $query = $this->db->get();
        return $query->result() ;
    }
    //////close single testimonial///////
    /////update testimonial//////
        function update_testimonial($testimonial_id)
    {
        $this->db->update('tbl_testimonial',$this, array('testimonial_id'=>$testimonial_id));
    }
    ////close update testimonial/////
        //////single faq////////
    
    function single_faq_id($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_faq');
        $this->db->where('faq_id', $data);
        $query = $this->db->get();
        return $query->result() ;
    }
    //////close single faq///////
       /////update faq//////
        function update_faq($faq_id)
    {
        $this->db->update('tbl_faq',$this, array('faq_id'=>$faq_id));
    }
    ////close update faq/////
    /////update blog/////////
       function update_blog($blog_id)
    {
        $this->db->update('tbl_blog',$this, array('blog_id'=>$blog_id));
    }
    /////close update blog/////
    ///////get all enquiry////////
    function get_all_enquiry()
    {
        $this->db->select('*');
        $this->db->from('tbl_enquiry');
        $this->db->where('enquiry_delete_status',0);
        $this->db->order_by('enquiry_id', 'desc');
        $query = $this->db->get();
        return $query->result() ;
    }
    ////////close get all enquiry////

///////////delete faq///////
     function delete_faq($faq_id)
    {

        //$this->db->where('faq_id',$faq_id);
        //$this->db->delete('tbl_faq');
        $this->db->update('tbl_faq',$this,array('faq_id'=>$faq_id));
    }
    //////////close delete faq/////
    /////delete testimonial/////
    function delete_testimonial($testimonial_id)
    {
        $this->db->update('tbl_testimonial',$this,array('testimonial_id'=>$testimonial_id));
    }
    /////close delete destimonial////
     /////delete testimonial/////
    function delete_vdo_testimonial($testimonial_id)
    {
        $this->db->update('tbl_testimonial',$this,array('testimonial_id'=>$testimonial_id));
    }
    /////close delete destimonial////
    //////delete category//////////////
        function delete_category($category_id)
    {
        $this->db->update('tbl_category',$this,array('category_id'=>$category_id));
        //echo $this->db->last_query();
    }
    //////close delete category//////
        //////delete blog//////////////
        function delete_blog($blog_id)
    {
        $this->db->update('tbl_blog',$this,array('blog_id'=>$blog_id));
        //echo $this->db->last_query();
    }
    //////close delete blog//////


          //////delete slider//////////////
        function delete_slider($slider_id)
    {
        $this->db->update('tbl_slider',$this,array('slider_id'=>$slider_id));
        //echo $this->db->last_query();
    }
    //////close delete slider//////
          //////delete enquiry//////////////
        function delete_enquiry($enquiry_id)
    {
        $this->db->update('tbl_enquiry',$this,array('enquiry_id'=>$enquiry_id));
        //echo $this->db->last_query();
    }
    //////close delete enquiry//////
    ////////get all course///////////
      function get_all_course()
    {
        $this->db->select('tbl_course.*')->from('tbl_course');
        //$this->db->join('tbl_category','tbl_course.course_category=tbl_category.category_id','left');
        $this->db->order_by('course_id','desc');
        $query = $this->db->get();
        return $query->result();
    }

    ///////close get all course/////
    //////get course/////
    function get_course()
    {
        $this -> db -> select('course_name,course_id,course_status');
        $this -> db -> from('tbl_course');
        $this->db->where('course_status','0');
        //$this->db->where('course_parent', ' ');
        $this->db->order_by('course_name', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    ///////close get course/////
    //////get all language///////
    function get_all_language()
    {
        $this ->db-> select('language_id,language_name,language_delete_status');
        $this ->db-> from('tbl_languages');
        $this->db->where('language_delete_status','0');
        $this->db->order_by('language_name', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    //////close get all language
	///////category status update///////
	   function update_category_status($category_id,$category_status)
    {
        if($category_status==0)
        {
            $new_stat="1";
        }
        elseif($category_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_category SET category_status = '$new_stat' WHERE category_id='$category_id'");
        //echo $this->db->last_query();
    }
	///////close category status update/////
		///////faq status update///////
	   function update_faq_status($faq_id,$faq_status)
    {
        if($faq_status==0)
        {
            $new_stat="1";
        }
        elseif($faq_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_faq SET faq_status = '$new_stat' WHERE faq_id='$faq_id'");
        //echo $this->db->last_query();
    }
	///////close faq status update/////
	
		///////vdo testimo status update///////
	   function update_vdotestimonial_status($vdo_testimonial_id,$vdo_testimonial_status)
    {
        if($vdo_testimonial_status==0)
        {
            $new_stat="1";
        }
        elseif($vdo_testimonial_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_testimonial SET testimonial_status = '$new_stat' WHERE testimonial_id='$vdo_testimonial_id'");
        //echo $this->db->last_query();
    }
		///////course status update///////
	   function update_course_status($course_id,$course_status)
    {
        if($course_status==0)
        {
            $new_stat="1";
        }
        elseif($course_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_course SET course_status = '$new_stat' WHERE course_id='$course_id'");
        //echo $this->db->last_query();
    }
	///////testimo status update///////
	   function update_testimonial_status($testimonial_id,$testimonial_status)
    {
        if($testimonial_status==0)
        {
            $new_stat="1";
        }
        elseif($testimonial_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_testimonial SET testimonial_status = '$new_stat' WHERE testimonial_id='$testimonial_id'");
        //echo $this->db->last_query();
    }
	////close testimonial update status////
	 function update_blog_status($blog_id,$blog_status)
    {
        if($blog_status==0)
        {
            $new_stat="1";
        }
        elseif($blog_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_blog SET blog_status = '$new_stat' WHERE blog_id='$blog_id'");
        //echo $this->db->last_query();
    }
	///////close blog status update/////
		 function update_about_status($about_id,$about_status)
    {
        if($about_status==0)
        {
            $new_stat="1";
        }
        elseif($about_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_about SET about_status = '$new_stat' WHERE about_id='$about_id'");
        //echo $this->db->last_query();
    }
	///////close about status update/////
			 function update_slider_status($slider_id,$slider_status)
    {
        if($slider_status==0)
        {
            $new_stat="1";
        }
        elseif($slider_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_slider SET slider_status = '$new_stat' WHERE slider_id='$slider_id'");
        //echo $this->db->last_query();
    }
	///////close about status update/////
	   function update_event_status($event_id,$event_status)
    {
        if($event_status==0)
        {
            $new_stat="1";
        }
        elseif($event_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_events SET event_status = '$new_stat' WHERE event_id='$event_id'");
        //echo $this->db->last_query();
    }
	/////close event status update////////
	//////update package status///////
	  function update_package_status($package_id,$package_status)
    {
        if($package_status==0)
        {
            $new_stat="1";
        }
        elseif($package_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_package SET package_status = '$new_stat' WHERE package_id='$package_id'");
        //echo $this->db->last_query();
    }
  /////close update package//////
	/////get notification/////
	 function get_notification()
    {
        $this ->db-> select('*');
        $this ->db-> from('tbl_enquiry');
        $this->db->where('enquiry_delete_status','0');
        $query = $this->db->get();
        return $query->result();
    }
	////close get notification///
    /////get all events////////
        function booked_events()
    {
      $this->db->select('tbl_event_booking.booking_id,booking_event_name,booking_date,booking_userid,booking_user_firstname,booking_user_lastname,booking_user_address,booking_user_email,booking_user_mobile,booking_status,tbl_user_registration.register_id,register_firstname,register_lastname')->from('tbl_event_booking');
       $this->db->join('tbl_user_registration','tbl_user_registration.register_id=tbl_event_booking.booking_userid','left');
         $this->db->where('booking_delete_status','0');
        $query = $this->db->get();
        return $query->result();
      
    }
    ////close get all events////
    /////delete bookings////////
    function delete_booking($booking_id)
    {
        $this->db->update('tbl_event_booking',$this, array('booking_id'=>$booking_id));
    }
    ////close delete booking//////

        ///////close about status update/////
       function update_booking_status($booking_id,$booking_status)
    {
        if($booking_status==0)
        {
            $new_stat="1";
        }
        elseif($booking_status==1)
        {
            $new_stat="0";
        }
        $query = $this->db->query("UPDATE tbl_event_booking SET booking_status = '$new_stat' WHERE booking_id='$booking_id'");
        //echo $this->db->last_query();
    }
    /////close event status update////////

    function  select_image($id,$image)
   {
            $image_to_remove=$image;
            $this->db->select('tbl_events.featured_image')->from('tbl_events');
            $this->db->where('event_id',$id);
            $query = $this->db->get();
            //echo $this->db->last_query();exit;
            $data=$query->result();
            
            $images=$data[0]->featured_image;
         
            $images_new=unserialize($images);
            //print_r($images_new);exit;
            $key = array_search($image_to_remove,$images_new, true);
         if ($key !== false)
        {
            unset($images_new[$key]);
            $related_images_string = serialize($images_new);

            $suc_msg=$this->db->update('tbl_events',array('featured_image'=>$related_images_string),array('event_id'=>$id));
            if($suc_msg)
            {
              echo "1000";
            }

        }
    }


   function get_images_by_id($event_id)
  {
    $this->db->select('tbl_events.featured_image')->from('tbl_events');
    $this->db->where('event_id',$event_id);
    $query = $this->db->get();
    foreach ($query->result() as $row) 
    {
        return $row;
    }
  }

  function get_seat_type($event_id)
    {
        $this->db->select('tbl_seats.*')->from('tbl_seats');
        //$this->db->join('tbl_city','tbl_city.city_id=tbl_shop_branch.branch_city','left');
        $this->db->where('event_id',$event_id);
        $query = $this->db->get();
        return $query->result() ;
    }

    // Anas 

    /* 
    *   get seats by event-id
    */
    public function getSeats($event_id) {
        $query = $this->db->get_where('tbl_seats', array('event_id' => $event_id));
        return $query->result_array();
    }

    // Anas
    public function update_seats($data) {
        return $this->db->update_batch('tbl_seats', $data, 'seat_id');

    }
    public function insert_seats($tbl_name,$data) {
        return $this->db->insert_batch($tbl_name, $data);
    }
    public function deleteSeat($id) {
        $this->db->where('seat_id', $id);
        $this->db->delete('tbl_seats');
        return $this->db->affected_rows();
    }

  }
  ?>
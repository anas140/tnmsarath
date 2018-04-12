<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    // function start_session()
    // {
    //     if($this->session->userdata('register_id'))
    //     {   
    //         $this->register_id=$this->session->userdata('register_id');         
    //         if($this->user_exists())
    //         {
    //             $this->user_exists();
    //             $this->loggedin=TRUE;
    //         }
    //     }
    //     else
    //         $this->loggedin=FALSE;
    // }
    //     function user_exists()
    // {
    //         $this->db->select('tbl_user_registration.*')->from('tbl_user_registration');
    //         $this->db->where('register_id',$this->register_id); 
    //         //$this->db->where('register_oauth_provider !=','merchant');
    //     //  $this->db->where('register_oauth_provider !=','facebook');
            
    //         $query=$this->db->get();
    //     //$query=$this->db->get_where('tbl_user_registration',array('register_id' => $this->register_id, 'register_oauth_provider'));
    //     foreach($query->result() as $row)
    //     { 
    //         $this->register_id=$row->register_id;
    //         $this->register_username=$row->register_username;
    //         $this->register_email=$row->register_email;
    //         $this->register_password=$row->register_password;
    //         return $row;
    //     }
    //     return false;
    // }
    // function user_check($register_username, $register_password) 
    // { 
        

    //             $this->db->select('tbl_user_registration.*')->from('tbl_user_registration');
    //             $this->db->where('register_username',$register_username); 
    //             $this->db->or_where('register_email',$register_username);
                
    //             $query=$this->db->get();
    //             //echo $this->db->last_query(); exit;
    //             foreach($query->result() as $row)
    //         {
    //          //echo $register_password;
    //          //echo $row->register_password;
    //         if (password_verify($register_password, $row->register_password)) 
    //         {
    //              $this->register_id=$row->register_id;
    //              $this->register_username=$row->register_username;
    //              $this->register_email=$row->register_email;
    //              $this->register_password=$row->register_password;
                
    //             return TRUE;
    //         }
    //     }
    
    //     return FALSE;
    // }
    // function insert_register()
    // {
    //     $this->db->insert('tbl_user_registration',$this);
    //     return $this->db->insert_id();
    // }
//////display events///////
            function display_events()
    {
        //$category = $this->input->post('category_name');
        //$id = $this->input->post('category_id');
        $this ->db-> select('*');
        $this ->db-> from('tbl_events');
        $this->db->where('event_delete_status',0);
        $this->db->order_by('event_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    //////close display events/////
        //////recent events//////////
        function recent_events()
    {
     $today=date("Y-m-d");
     $this->db->select('tbl_events.event_id,event_name,event_image,event_description,event_postedon')->from('tbl_events');
     $this->db->where('event_end_date>=',$today);
     $this->db->where('event_delete_status',0);
     $this->db->order_by('event_id','desc');
     $this->db->limit(4,0);
     $query=$this->db->get();
     return $query->result();
     }
    /////close recent events//////
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
    //////display vdo testimonial/////
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
    ////close display vdo testimonial//////
      //////display text testimonial/////
       function display_text_testimonial()
    {
        $this ->db-> select('*');
        $this ->db-> from('tbl_testimonial');
        $this ->db-> where('testimonial_type',1);
        $this->db->where('testimonial_delete_status',0);
        $this->db->order_by('testimonial_id', 'desc');
        $query = $this->db->get();
        return $query->result() ;
    }
    function event_search($event_name,$event_category)
    {
      $today=date("Y-m-d");
     $this->db->select('tbl_events.event_id,event_name,event_start_date,event_end_date,event_start_time,event_end_time,event_location,event_contact_person,event_contact_phone,event_contact_email,tbl_category.category_id,category_name')->from('tbl_events');
    $this->db->join('tbl_category','tbl_category.category_id=tbl_events.event_category', 'left');
     $this->db->where('event_status',0);
     if($event_name != "")
    {
      $this->db->where('tbl_events.event_name',$event_name);
    }

    if($event_category != "")
    {
      $this->db->where('tbl_category.category_id',$event_category);
    } 
     $query=$this->db->get();
     //echo $this->db->last_query();exit;
     return $query->result();
    }
 
    ////close display testimonial//////
  //   function menu_category(){
  //       $this -> db -> select('category_id,category_name,category_slug');
  //       $this -> db -> from('tbl_category');
  //       $this->db->where('category_status','0');
  //       $this->db->where("category_id !=",'1');
  //       $this->db->order_by('category_name', 'asc');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //   function menu_course(){
  //       $this -> db -> select('course_id,course_name,course_category,course_slug');
  //       $this -> db -> from('tbl_course');
  //       $this->db->where('course_parent', ' ');
  //       $this->db->where('course_status','0');
  //       $this->db->order_by('course_name', 'asc');
  //       //$this->db->limit('8');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //   function menu_hcourse($category_id){
  //       $this -> db -> select('course_id,course_name,course_category,course_slug');
  //       $this -> db -> from('tbl_course');
  //       $this->db->where('course_parent', ' ');
  //       $this->db->where('course_status','0');
  //       $this->db->where('course_category',$category_id);
  //       $this->db->order_by('course_name', 'asc');
  //       //$this->db->limit('8');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //   function get_all_category()
  //   {
  //       $query = $this->db->get('tbl_category');
  //       return $query->result();
  //   }

  //   function display_category(){
  //       $this -> db -> select('*');
  //       $this -> db -> from('tbl_category');
  //       $this->db->where('category_status','0');
  //       $this->db->order_by('category_name', 'asc');
  //       $query = $this->db->get();
  //       if ($query->num_rows() > 0) {
  //           return $query->result();
  //       } else {
  //           return false;
  //       }
  //   }

  //   function display_category_new(){
  //       $this -> db -> select('*');
  //       $this -> db -> from('tbl_category');
  //       $this->db->where('category_status','0');
  //       //$this->db->order_by('category_name', 'asc');
  //       $query = $this->db->get();
  //       if ($query->num_rows() > 0) {
  //           return $query->result();
  //       } else {
  //           return false;
  //       }
  //   }

  //   function display_category_limit(){
  //       $array = array(2,3,4,14);
  //       $this -> db -> select('*');
  //       $this -> db -> from('tbl_category');
  //       $this->db->where('category_status','0');
  //       $this->db->where_in('category_id', $array);
  //       $this->db->order_by('category_name', 'asc');
  //       $this->db->limit('4');
  //       $query = $this->db->get();
  //       return $query->result() ;
  //   }

  //   function single_category_id($category_slug)
  //   {
  //       $this->db->select('*');
  //       $this->db->from('tbl_category');        
  //       $this->db->where('category_slug', $category_slug);
  //       $query = $this->db->get();
  //       return $query->result() ;
  //   }

  //   function get_course_by_category ($category_id)
  //   {
  //       $this->db->select('course_id,course_category,course_name,course_slug');
  //       $this->db->from('tbl_course');
  //       $this->db->where('course_category', $category_id);
  //       $this->db->where('course_parent', ' ');
  //       $this->db->where('course_status','0');
  //       $this->db->order_by('course_name', 'asc');
  //       $query = $this->db->get();
  //       return $query->result() ;
  //   }

  //  function get_course_by_category_name ($category_name)
  //   {
		// $this -> db -> select('category_id,category_name,category_slug');
  //       $this -> db -> from('tbl_category');
  //       $this->db->where('category_status','0');
		// $this->db->where('category_name', $category_name);
  //       $this->db->order_by('category_name', 'asc');
  //       $query = $this->db->get();
		// //echo $this->db->last_query();
  //       return $query->result() ;
  //   }

  //   function get_course_by_parent ($course_id)
  //   {
  //       $this->db->select('course_id,course_parent,course_name,course_slug');
  //       $this->db->from('tbl_course');
  //       $this->db->where('course_parent', $course_id);
  //       $this->db->order_by('course_name', 'asc');
  //       $query = $this->db->get();
  //       //echo $this->db->last_query();
  //       return $query->result() ;
  //   }

  //   function display_cate_course(){
  //       $query = $this->db->get('tbl_course');
  //       return $query->result();
  //   }

  //   function display_course_limit($category_id){
  //       $array = array(2,3,4,14);
  //       $this -> db -> select('course_id,course_category,course_name,course_slug');
  //       $this -> db -> from('tbl_course'); 
  //       //$this->db->where('course_status','0'); 
  //       $this->db->where_in('course_priority', $array);     
  //       $this->db->where('course_category', $category_id);
  //       $this->db->order_by('course_priority', 'asc');
  //       $this->db->limit('4');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //   function display_home_course(){
  //       $this -> db -> select('course_id,course_category,course_name,course_slug,course_content');
  //       $this -> db -> from('tbl_course');
  //       $this->db->where('course_status','0');
  //       //$this->db->where('course_home_visible','1');
  //       $this->db->order_by('course_id', 'desc');
  //      // $this->db->limit('9');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //   function display_home_course_new(){
  //       $this -> db -> select('course_id,course_category,course_name,course_slug,course_content');
  //       $this -> db -> from('tbl_course');
  //       $this->db->where('course_status','0');
  //       //$this->db->where('course_home_visible','1');
  //       $this->db->order_by('course_id', 'desc');
  //      // $this->db->limit('9');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //   function display_course(){
  //       $this -> db -> select('course_id,course_name,course_category,course_slug,course_parent');
  //       $this -> db -> from('tbl_course');
  //       $this->db->where('course_parent', ' ');
  //       $this->db->where('course_status','0');
  //       $this->db->order_by('course_name', 'asc');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //   function display_enq_course(){
  //       $this -> db -> select('course_id,course_name,course_category,course_slug,course_parent');
  //       $this -> db -> from('tbl_course');
  //       $this->db->where('course_status','0');
  //       $this->db->order_by('course_name', 'asc');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //   function single_course_id($course_slug)
  //   {
  //       $this->db->select('*');
  //       $this->db->from('tbl_course');  
  //       //$this->db->where('course_status','0');      
  //       $this->db->where('course_slug', $course_slug);
  //       $query = $this->db->get();
  //       return $query->row() ;
  //   }

  //   function display_batch()
  //   {
  //       $this->db->select('tbl_course.course_id,tbl_course.course_name,tbl_course.course_slug,tbl_upcoming_batches.*')->from('tbl_upcoming_batches');
  //       $this->db->join('tbl_course','tbl_upcoming_batches.batch_course=tbl_course.course_id','left');
  //       $this->db->where('tbl_upcoming_batches.batch_status','0');
  //       $this->db->order_by('batch_id','desc');
  //       $this->db->limit('5');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //   function display_all_batch()
  //   {
  //       $this->db->select('tbl_course.course_id,tbl_course.course_name,tbl_course.course_slug,tbl_upcoming_batches.*')->from('tbl_upcoming_batches');
  //       $this->db->join('tbl_course','tbl_upcoming_batches.batch_course=tbl_course.course_id','left');
  //       $this->db->where('tbl_upcoming_batches.batch_status','0');
  //       $this->db->order_by('batch_id','desc');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //  function display_testimonial_course(){
  //       $array_of_course_id = array(29,30,36); 
  //       $this -> db -> select('course_id,course_name,course_category,course_slug,course_parent');
  //       $this -> db -> from('tbl_course');
  //       $this->db->where('course_status','0');
  //       $this->db->where_in('course_id', $array_of_course_id);
  //       $this->db->order_by('course_name', 'asc');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //   function display_testimonial_category()
  //   { 
  //       $this -> db -> select('category_id,category_name,category_slug');
  //       $this -> db -> from('tbl_category');
  //       $this->db->where('category_status','0');
  //       $this->db->where("category_id !=",'1');
  //       $this->db->order_by('category_name', 'asc');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //   function display_home_testimonial()
  //   {
  //       $this->db->select('tbl_course.course_id,tbl_course.course_name,tbl_testimonial.*')->from('tbl_testimonial');
  //       $this->db->join('tbl_course','tbl_testimonial.testimonial_course=tbl_course.course_id','left');
  //       $this->db->where('tbl_testimonial.testimonial_status','0');
  //       $this->db->order_by('tbl_testimonial.testimonial_id', 'desc');
  //       $this->db->limit('3');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }

  //   function display_testimonial()
  //   {
  //       $this->db->select('tbl_course.course_id,tbl_course.course_name,tbl_testimonial.*')->from('tbl_testimonial');
  //       $this->db->join('tbl_course','tbl_testimonial.testimonial_course=tbl_course.course_id','left');
  //       $this->db->where('tbl_testimonial.testimonial_status','0');
  //       $this->db->order_by('tbl_testimonial.testimonial_id','desc');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }
    
  //   function testimonial_ajaxx ($course){
  //       $this->db->select('*');
  //       $this->db->from('tbl_testimonial');
  //       $this->db->where('testimonial_course', $course);
  //       $query = $this->db->get();
  //       return $query->result();
  //       /*echo $this->db->last_query();
  //       print_r($query->result());      
  //       $courses = array();
  //       foreach ($query->result() as $course) {
  //           $courses[$course->testimonial_course] = $course->testimonial_name;
  //       }        
  //       echo json_encode($courses);*/
            
  //   }

  //   function testimonial_ajax($course){
  //       $this->db->select('tbl_course.course_id,tbl_course.course_name,tbl_testimonial.*')->from('tbl_testimonial');
  //       $this->db->join('tbl_course','tbl_testimonial.testimonial_course=tbl_course.course_id','left');
  //       $this->db->where('tbl_testimonial.testimonial_status','0');
  //       $this->db->where('tbl_course.course_category', $course);
  //      // $this->db->or_where('tbl_testimonial.testimonial_course', $course);
  //       $this->db->or_where('tbl_course.course_category', $course);
  //       $query = $this->db->get();
  //       return $query->result();
  //   }
  
  //   function insert_inquiry($data)
  //   {
  //       $this->db->insert('tbl_inquiry',$data);
  //   }

  //   function insert_batch_register($data)
  //   {
  //       $this->db->insert('tbl_batch_register',$data);
  //   }

  //   function get_all_blog()
  //   {
  //       $this->db->select('*');
  //       $this->db->from('tbl_blog');  
  //       $this->db->where('blog_status','0');      
  //       $query = $this->db->get();
  //       return $query->result() ;
  //   }

  //   function single_blog_id($blog_slug)
  //   {
  //       $this->db->select('*');
  //       $this->db->from('tbl_blog');  
  //       $this->db->where('blog_status','0');      
  //       $this->db->where('blog_slug', $blog_slug);
  //       $query = $this->db->get();
  //       return $query->result() ;
  //   }
    
  //   function get_course_by_courseid($array_courses)
  //   {
  //       //$array_of_ordered_ids = array(29,30);
  //       $this->db->select('course_id,course_name,course_slug');
  //       $this->db->from('tbl_course');
  //       $this->db->where('course_parent', ' ');
  //       $this->db->where_in('course_id', $array_courses); 
  //       $this->db->where("course_category",'1');
  //       $this->db->order_by('course_id', 'asc');
  //       $query = $this->db->get();
  //       return $query->result() ;
  //   }

  //   function display_footer_menu(){       
  //       $this -> db -> select('*');
  //       $this -> db -> from('tbl_footer_menu');
  //       $this->db->where('footer_status','0');
  //       $this->db->order_by('footer_id', 'desc');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }
    
  //   function get_category_by_footerid($category_id)
  //   {
  //       $this->db->select('category_id,category_name,category_slug');
  //       $this->db->from('tbl_category');
  //       $this->db->where('category_id', $category_id);
  //       $this->db->where("category_id !=",'1');
  //       $this->db->order_by('category_id', 'asc');
  //       $query = $this->db->get();
  //       //echo $this->db->last_query();
  //       return $query->result() ;
  //   }
    
  //   function get_course_by_footerid($course_id)
  //   {
  //       $this->db->select('course_id,course_name,course_slug');
  //       $this->db->from('tbl_course');
  //       $this->db->where('course_id', $course_id);
  //       $this->db->where('course_parent', ' ');
  //       $this->db->order_by('course_id', 'asc');
  //       $this->db->limit('4');
  //       $query = $this->db->get();
  //       return $query->result() ;
  //   }

  //   function display_footer_course($course_id){   
  //       $this -> db -> select('course_id,course_name,course_category,course_slug,course_parent');
  //       $this -> db -> from('tbl_course');
  //       $this->db->where('course_status','0');
  //       $this->db->where('course_parent', $course_id);
  //       $this->db->order_by('course_id', 'asc');
  //       $this->db->limit('6');
  //       $query = $this->db->get();
  //       return $query->result();
  //   }
    
  //   function display_header_menu()
  //   {       
  //       $this -> db -> select('*');
  //       $this -> db -> from('tbl_header_menu');
  //       $this->db->where('header_status','0');
  //       $this->db->order_by('header_priority', 'asc');
  //       $query = $this->db->get();
  //       return $query->result(); 
  //   }
    
  //   function get_category_by_headerid($category_id)
  //   {
  //       $this->db->select('category_id,category_name,category_slug');
  //       $this->db->from('tbl_category');
  //       $this->db->where('category_id', $category_id);
  //       $this->db->where("category_id !=",'1');
  //       $this->db->where('category_status','0');
  //       $this->db->order_by('category_id', 'desc');
  //       $this->db->limit('3');
  //       $query = $this->db->get();        
  //       return $query->result() ;
  //   }
    
  //   function get_course_by_headerid($course_id)
  //   {
  //       $this->db->select('course_id,course_name,course_slug');
  //       $this->db->from('tbl_course');
  //       $this->db->where('course_id', $course_id);
  //       $this->db->where('course_parent', ' ');
  //       $this->db->where('course_status','0');
  //       $this->db->order_by('course_name', 'asc');
  //       $query = $this->db->get();
  //       //echo $this->db->last_query();
  //       return $query->result() ;
  //   }

  //   function display_header_course($course_id)
  //   { 
  //       $this -> db -> select('course_id,course_name,course_category,course_slug,course_parent');
  //       $this -> db -> from('tbl_course');
  //       $this->db->where('course_status','0');
  //       $this->db->where('course_parent',$course_id);       
  //       $this->db->order_by('course_id', 'asc');
  //       $this->db->limit('6');
  //       $query = $this->db->get();
  //       return $query->result();    
  //   }
    
  //   function auto_search_course($searchterm)
  //   {
  //       $display_json = array();
  //       $json_arr = array();
  //       $this->db->select('course_id,course_name,course_slug');
  //       $this->db->from('tbl_course');
  //       $this->db->where('course_status','0');
  //       $this->db->like('course_name',$searchterm);
  //       $query=$this->db->get();
  //       if($query->num_rows() > 0){
  //         foreach ($query->result_array() as $row){
  //           $json_arr["id"] = site_url('course')."/".$row['course_slug'];
  //           $json_arr['label']=$row['course_name'];
  //           $json_arr['value']=$row['course_name'];
  //           array_push($display_json, $json_arr);  
  //         }          
  //       }
  //       else{
  //            $json_arr["id"] = "#";
  //           $json_arr["value"] = "";
  //           $json_arr["label"] = "No Result Found !";
  //           array_push($display_json, $json_arr);  
  //       }

  //       $jsonWrite = json_encode($display_json); //encode that search data
  //       echo $jsonWrite;
  //   }
    
  //   function get_city()
  //   {
  //       $query = $this->db->get('tbl_city');
		// return $query->result();
  //   }
    
  //   function header_search($search_item)
  //   {
  //       $this->db->select('*');
  //       $this->db->from('tbl_course');   
  //       if($search_item != "") {
  //           $this->db->where("course_name like '%$search_item%'");
  //       }
  //       $query = $this->db->get();
  //       return $query->row() ;
  //   }

   
}

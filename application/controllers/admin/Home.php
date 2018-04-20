<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('course_model');
        $this->load->model('event_model');
        $this->load->model('admin');
        $this->load->library('session'); // Start Session

    }

    function index()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        else
        {
            redirect('admin/home/events');
        }
    }
    
    function login()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
            $this->load->view('admin/admin-login');

        }
        else
        {
            redirect('admin/home/category');
        }
    }
       
    function home_page()
    {       
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $this->admin->start_session();
        if($this->admin->admin_check($username,$password))
        {
            $admin_id=$this->admin->admin_id;
            if($admin_id>0)
            {
                $this->session->set_userdata('admin_id',$admin_id);
                $this->admin->start_session();
                redirect('admin/home/category');
            }
        }
        else
        {
            $data['login_status']=1;
            $this->load->view('admin/admin-login',$data);
        }
    }
    
    function logout()
    {
        $this->admin->start_session();
        $this->session->unset_userdata('admin_id');
        $this->load->view('admin/admin-login');
    }

    function add_category()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->data["posts"] = $this->event_model->display_category();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category_name','Category','required');
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('admin/add-category',$this->data);
        }
        else
        {             
            $data = array(
            'category_name' => $this->input->post('category_name'),
            );          
            $this->event_model->insert_category($data);
            $this->session->set_flashdata('message', 'Category inserted Successfully');
            redirect('admin/home/category');
        }
    }

    function category(){
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $data["posts"] = $this->event_model->display_category();
        //print_r($this->data["posts"]);exit;
        $this->load->view('admin/add-category', $data);
    }
	    ///////course module///////
    function course_module()
    {
       $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
         $data["course"] = $this->event_model->get_courses();
         $this->load->view('admin/add-course-module',$data);
    }
    ///////close instructor profile/////
    ///////instructor profile///////
    function instructor_profile()
    {
       $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $data["instructor_profile"] = $this->event_model->display_instructor_profile();
         $this->load->view('admin/add-instructor-profile',$data);
    }
    ///////close instructor profile/////
    ////////add instructor profile//////
       function add_instructor_profile(){ 
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $data["instructor_profile"] = $this->event_model->display_instructor_profile();
        //$data["all_course"] = $this->course_model->get_course();     
        $this->load->library('form_validation');
        //$this->form_validation->set_rules('testimonial_course','Course','required');
        $this->form_validation->set_rules('profile_title','Name','required');
        $this->form_validation->set_rules('profile_description','Post','required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/add-instructor-profile',$data);
        }
        else{
            $config['upload_path']   = './uploads/instructor_profile/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
               
            if($this->upload->do_upload('profile_image'))
            {
                $file_data=$this->upload->data();
                $files=$file_data['file_name'];
                $data=array(
                
                'profile_title' => $this->input->post('profile_title'),
                'profile_description' => $this->input->post('profile_description'),
                'profile_image'  => $files
                
            );
               $this->event_model->insert_instructor_profile($data);
            $this->session->set_flashdata('success', 'Profile inserted Successfully');
            redirect('admin/home/instructor_profile');     
            }
            // $data=array(
                
            //     'testimonial_name' => $this->input->post('testimonial_name'),
            //     'testimonial_review' => $this->input->post('testimonial_review')
            // );
            
                  
        }
    }
    //////close add instructor profile/////
    //////edit instructor profile//////
        function instructor_profile_edit($profile_id)
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('profile_title', 'Name', 'required');
        if($this->form_validation->run() == FALSE)
      {
        $data["profile"]= $this->event_model->single_profile_id($profile_id);
        $data["instructor_profile"] = $this->event_model->display_instructor_profile();
        $this->load->view('admin/add-instructor-profile',$data);
      }
     else
      {
        $postedby='admin';
              
            //$this->event_model->about_dr_moinu = $this->input->post('about_moinu');
            $this->event_model->profile_title = $this->input->post('profile_title');
            $this->event_model->profile_description = $this->input->post('profile_description');
            //s$this->event_model->about_postedby = $postedby;
            if($_FILES['profile_image']['name'] != "")
         {
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG|PNG';
            $config['upload_path'] = './uploads/instructor_profile';
            $config['file_name'] = 'direc'.time();
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('profile_image');
            $logo = $this->upload->data();
            $this->event_model->profile_image =$logo['file_name'];
         }
            $this->event_model->update_instructor_profile($profile_id);
            $this->session->set_flashdata('success', 'Profile Updated successfully');
            redirect('admin/home/instructor_profile');
      }
    }
    //////close edit instructor profile/////
    /////add about///////
          function about(){
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        //$this->data["posts"] = $this->course_model->display_category();
        $data['about']=$this->event_model->display_about();
        //print_r($data['about']);exit;
        $this->load->view('admin/add-about',$data);
    }
    /////close about add//////
	///////////package/////////
       function package(){
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->data["all_package"] = $this->event_model->display_package();
        $this->data["course"] = $this->event_model->get_courses();
        //$this->data["all_course"] = $this->course_model->get_course();
        $this->load->view('admin/add-package', $this->data);
    }
    ///////close package//////
	 ////add package/////
     function add_package(){ 
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $data["all_package"] = $this->event_model->display_package();
        //$data["all_course"] = $this->course_model->get_course();     
        $this->load->library('form_validation');
        //$this->form_validation->set_rules('testimonial_course','Course','required');
        $this->form_validation->set_rules('package_name','Name','required');
        //$this->form_validation->set_rules('testimonial_review','Post','required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/add-package',$data);
        }
        else{
            $config['upload_path']   = './uploads/package/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
               
            if($this->upload->do_upload('package_image'))
            {
                $file_data=$this->upload->data();
                $files=$file_data['file_name'];
                
                $data=array(
                'course_id' => $this->input->post('course_name'),
                'package_name' => $this->input->post('package_name'),
                'package_description' => $this->input->post('package_description'),
                'package_image'  => $files,
                'package_price' => $this->input->post('package_price')
            );
               $this->event_model->insert_package($data);
            $this->session->set_flashdata('success', 'Package inserted Successfully');
            redirect('admin/home/package');     
            }
           
        }
    }
    ////close package/////
      function package_edit($package_id)
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('package_name', 'Name', 'required');
        if($this->form_validation->run() == FALSE)
      {
        $data["package"]= $this->event_model->single_package_id($package_id);
        $data["course"] = $this->event_model->get_courses();
        //$data["single_course"]= $this->event_model->single_course_id($course_id);
        $data["all_package"] = $this->event_model->display_package();
        $this->load->view('admin/add-package',$data);
    }
     else
      {
        $postedby='admin';
              $this->event_model->course_id= $this->input->post('course_name');
              $this->event_model->package_name= $this->input->post('package_name');
               $this->event_model->package_description= $this->input->post('package_description');
                $this->event_model->package_price= $this->input->post('package_price');
              
               
            if($_FILES['package_image']['name'] != "")
         {
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG|PNG';
            $config['upload_path'] = './uploads/package';
            $config['file_name'] = 'direc'.time();
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('package_image');
            $logo = $this->upload->data();
            $this->event_model->package_image =$logo['file_name'];
         }
            $this->event_model->update_package($package_id);
            $this->session->set_flashdata('message', 'Package Updated successfully');
            redirect('admin/home/package');
      }
    }
    ////delete package////
     function package_delete()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->event_model->package_delete_status = 1;
        $package_id=$this->input->post('package_id');
        $this->event_model->delete_package($package_id);
        $this->session->set_flashdata('message', 'Package deleted successfully');
        redirect('admin/home/package');
    }
	//////close package delete////
	
    /////insert about//////
    function add_about()
    {
       $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        } 
        //$this->event_model->about_dr_moinu = strip_tags($this->input->post('about_moinu'));
        $this->event_model->about_success_valley = strip_tags($this->input->post('about_success_valley'));
        $this->event_model->insert_about();
                $this->session->set_flashdata('message', 'About inserted Successfully');
				 redirect('admin/home/about');
    }
     
    /////close insert about////
    //////delete about/////
       function about_delete()
   {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
         $this->event_model->about_delete_status = 1;
         $about_id=$this->input->post('about_id');
         $this->event_model->delete_about($about_id);
         $this->session->set_flashdata('message', 'About deleted successfully');
      redirect('admin/home/about');
   }
       //////delete course/////
       function course_delete()
   {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
         $this->event_model->course_delete_status = 1;
         $course_id=$this->input->post('course_id');
         $this->event_model->delete_course($course_id);
         $this->session->set_flashdata('success', 'Course deleted successfully');
         redirect('admin/home/course');
   }
    //////close delete status////
    //     function category()
    // {
    //     $this->tbl_admin->start_session();
    //     if(!$this->tbl_admin->is_loggedin())
    //     {
    //       redirect('admin/Super_admin/login');
    //     }
        
    //     $this->load->view('admin/course_category');
    // }
    //////close course category//////
    ///////add events page///////////
      function events(){
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        //$this->data["posts"] = $this->course_model->display_category();
        $data["category"] = $this->event_model->display_category();
        $data['events']=$this->event_model->display_events();
        $this->load->view('admin/add-events',$data);
    }
    //////close add events//////
    //////////add data to events//////
     function add_events(){ 
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        //$data["all_course"] = $this->course_model->get_all_course();
        //$data["category"] = $this->course_model->get_category(); 
        //$data["get_course"] = $this->course_model->get_course();       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('event_name','Event Name','required');
        //$this->form_validation->set_rules('course_slug','Slug','required');
        //$this->form_validation->set_rules('course_seo_title','Seo Title','required');
        //$this->form_validation->set_rules('course_category', 'Category', 'required');
        //$this->form_validation->set_rules('event_image', '', 'callback_file_check');
        $data['events']=$this->event_model->display_events(); 
        //if($this->form_validation->run()==FALSE){
            //$this->load->view('admin/add-events',$data);
        //}
       // else{

            // $config['upload_path']          = './uploads/course/';
            // $config['allowed_types'] = 'jpg|jpeg|png|gif';
            // $config['max_size']   = '2048000';
            // $config['max_width'] = '1400';
            // $config['max_height'] = '400';
            // $this->load->library('upload', $config);
            // $this->upload->initialize($config);

            /*$home_visible=$this->input->post('course_home_visible');
            $enquiry_form=$this->input->post('course_enquiry_form');

            if ($home_visible == '1' )
            {
                $home_visible = '1';
            }
            else
            {
                $home_visible = '0';
            }
            if ($enquiry_form == '1' )
            {
                $enquiry_form = '1';
            }
            else
            {
                $enquiry_form = '0';
            }*/


                $postedby='admin';
                $this->event_model->event_category = $this->input->post('event_category');
                $this->event_model->event_name = $this->input->post('event_name');
                $this->event_model->event_start_date =  date("Y-m-d",strtotime($this->input->post('event_start_date')));
                $this->event_model->event_start_time = $this->input->post('event_start_time');
                $this->event_model->event_end_date =  date("Y-m-d",strtotime($this->input->post('event_end_date')));
                $this->event_model->event_end_time = $this->input->post('event_end_time');
                $this->event_model->event_location = $this->input->post('event_location');
                $this->event_model->event_location_lat = $this->input->post('location_latitude');
                $this->event_model->event_location_lng = $this->input->post('location_longitude');
                $this->event_model->event_contact_person = $this->input->post('event_contact_person');
                $this->event_model->event_contact_phone = $this->input->post('event_phone');
                $this->event_model->event_contact_email = $this->input->post('event_email');
                $this->event_model->event_description = $this->input->post('event_description');
                $this->event_model->event_postedby = $postedby;
               if($_FILES['event_image']['name'] != "")
               {
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG|PNG';
            $config['upload_path'] = './uploads/events';
            $config['file_name'] = 'direc'.time();
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('event_image');
            $logo = $this->upload->data();
            $this->event_model->event_image = $logo['file_name'];
            }
              

                  $uploadData1='';
        if(!empty($_FILES['slider_images']['name']))
        {
           
             // print_r($_FILES['slider_images']['name']);
             
              echo $filesCount = count($_FILES['slider_images']['name']);
              for($i = 0; $i < $filesCount; $i++)
              {
                  $_FILES['userFile']['name'] = $_FILES['slider_images']['name'][$i];
                  $_FILES['userFile']['type'] = $_FILES['slider_images']['type'][$i];
                  $_FILES['userFile']['tmp_name'] = $_FILES['slider_images']['tmp_name'][$i];
                  $_FILES['userFile']['error'] = $_FILES['slider_images']['error'][$i];
                  $_FILES['userFile']['size'] = $_FILES['slider_images']['size'][$i];

                  $uploadPath = './uploads/events';
                  $config['upload_path']   = $uploadPath;
                  $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPEG|PNG|JPG';
                  $time = time();
                  $config['file_name'] = "SUS_".$time;
                  $config['overwrite'] = false;
                  //$config['quality'] = '60%';

                  $this->load->library('upload', $config);
                  $this->upload->initialize($config);
                  if($this->upload->do_upload('userFile'))
                  {
                      $fileData = $this->upload->data();
                      $uploadData[$i]['slider_images'] = $fileData['file_name'];
                      
                      //print_r($uploadData1);
                       //exit;
                      //$uploadData[$i]['builder_id'] = $builder_id;
                      //$uploadData[$i]['project_id'] = $project_id;
                  }
              }

              $image_array = array();
              
              for($i=0;$i<count($uploadData);$i++) 
              {
                  array_push($image_array,$uploadData[$i]['slider_images']);
                  //$image_array = $uploadData[$i]['slider_images'];
              }
           // }
            //print_r($image_array);exit;
            
            if(!empty($image_array))
            {
                $uploadData1=serialize($image_array);
               // $uploadData1=$image_array;
            } 
        } 
                $this->event_model->featured_image=$uploadData1;
                $eid=$this->event_model->insert_event();
                 $seat_type = $this->input->post('seat_type');
                $seat_rate = $this->input->post('seat_rate');
                $no_seat = $this->input->post('no_seat'); 
                for($i=0; $i<count($seat_type); $i++)
                {
                    //$this->tbl_merchant_branch->branch_shop_id = $shop_id;
                     $data = array(
                    'seat_type' =>$seat_type[$i],
                    'seat_rate' =>$seat_rate[$i],
                    'seat_total' =>$no_seat[$i],
                    'event_id'=>$eid);
                    
                    // $this->event_model->seat_type = $seat_type[$i];
                    // $this->event_model->seat_rate = $seat_rate[$i];
                    // $this->event_model->seat_total = $no_seat[$i];
                    $this->event_model->insert_seat($data);
               }

                
                $this->session->set_flashdata('message', 'Event inserted Successfully');
                redirect('admin/home/events');
           // }
            // else
            // {
            //     $error = array('error' => $this->upload->display_errors());
            //     $this->load->view('admin/add-events', $error);
            // }           
        //}
    }
    /////close add data to events//////
      ///////update events////////
      function about_edit($about_id)
      {
        //echo "hai";exit;
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->load->library('form_validation');
      $this->form_validation->set_rules('about_success_valley', 'Name', 'required');
          if($this->form_validation->run() == FALSE)
      {
         $data['single_about']= $this->event_model->single_about_id($about_id);
         $data['about']=$this->event_model->display_about();
        //print_r($data['single_about']);exit;
        //$data["get_course"] = $this->course_model->get_course();
        //$data["category"] = $this->course_model->get_category();
        $this->load->view('admin/add-about',$data);
      }
      else
      {
        $postedby='admin';
              
            //$this->event_model->about_dr_moinu = $this->input->post('about_moinu');
            $this->event_model->about_success_valley = $this->input->post('about_success_valley');
            $this->event_model->about_postedby = $postedby;
            $this->event_model->update_about($about_id);
            $this->session->set_flashdata('message', 'About Updated successfully');
            redirect('admin/home/about');
      }
        
    }
    ///////close event edit//////////////
    /////event delete/////
    function event_delete()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->event_model->event_delete_status = 1;
        $event_id=$this->input->post('event_id');
        $this->event_model->delete_event($event_id);
        $this->session->set_flashdata('message', 'Event deleted successfully');
        redirect('admin/home/events');
    }
    /////close event delete
       /////event delete/////
    function enquiry_delete()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->event_model->enquiry_delete_status = 1;
        $enquiry_id=$this->input->post('enquiry_id');
        $this->event_model->delete_enquiry($enquiry_id);
        $this->session->set_flashdata('message', 'Enquiry deleted successfully');
        redirect('admin/home/enquiry');
    }

    ///////close update events//////
    /////event submit/////////
   //     function event_edit_submit($event_id)
   // {
   //    echo "hai";
   //              $postedby='admin';
   //              $this->event_model->event_name = $this->input->post('event_name');
   //              $this->event_model->event_start_date =  date("Y-m-d",strtotime($this->input->post('event_start_date')));
   //              $this->event_model->event_start_time = $this->input->post('event_start_time');
   //              $this->event_model->event_end_date =  date("Y-m-d",strtotime($this->input->post('event_end_date')));
   //              $this->event_model->event_end_time = $this->input->post('event_end_time');
   //              $this->event_model->event_venue = $this->input->post('event_venue');
   //              $this->event_model->event_contact_person = $this->input->post('event_contact_person');
   //              $this->event_model->event_contact_phone = $this->input->post('event_phone');
   //              $this->event_model->event_contact_email = $this->input->post('event_email');
   //              $this->event_model->event_description = $this->input->post('event_description');
   //              $this->event_model->event_postedby = $postedby;
   //             if($_FILES['event_image']['name'] != "")
   //             {
   //          $config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG|PNG';
   //          $config['upload_path'] = './uploads/events';
   //          $config['file_name'] = 'direc'.time();
   //          $config['overwrite'] = false;
   //          $this->load->library('upload', $config);
   //          $this->upload->do_upload('event_image');
   //          $logo = $this->upload->data();
   //          $this->event_model->event_image = $logo['file_name'];
   //          }
   //          $this->event_model->update_event($event_id);
   //          redirect('admin/add_events');
   //    }
   
    ////close event submit/////
     /////event edit/////////
    function event_edit($event_id) {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin()) {
          redirect('admin/home/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('event_name', 'Name', 'required');
        
        if($this->form_validation->run() == FALSE) {
            $data["category"] = $this->event_model->display_category();
            $data["single_event"]= $this->event_model->single_event_id($event_id);
            $data["events"] = $this->event_model->display_events();
            $data['seats'] = $this->event_model->getSeats($event_id);
            $this->load->view('admin/add-events',$data);
        } else {
            $update_seats = 0;
            if(!empty($_POST['seat_id'])) {
                $seats_id = $_POST['seat_id'];
                $update_seats = count($_POST['seat_id']);
                $update_data = '';
                for($i = 0; $i < $update_seats; $i++) {
                    $update_data[$i] = array(
                        'seat_id' => $_POST['seat_id'][$i],
                        'seat_type' => $_POST['seat_type'][$i],
                        'seat_rate' => $_POST['seat_rate'][$i],
                        'seat_total' => $_POST['no_seat'][$i],
                    );
                }
                $this->event_model->update_seats($update_data);
            }
            
            if($update_seats < count($_POST['seat_type'])) {
                $insert_data = '';
                for($j=0, $i = $update_seats; $i < count($_POST['seat_type']); $i++, $j++ ) {
                    if($_POST['seat_type'][$i]) {
                        $insert_data[$j] = array(
                            'seat_type' => $_POST['seat_type'][$i],
                            'seat_rate' => $_POST['seat_rate'][$i],
                            'seat_total' => $_POST['no_seat'][$i],
                            'event_id'   => $event_id,
                        );    
                    }
                    
                }
            $this->event_model->insert_seats($insert_data);
            }
        


        $postedby='admin';
            $this->event_model->event_category = $this->input->post('event_category');   
          $this->event_model->event_name = $this->input->post('event_name');
            $this->event_model->event_start_date =  date("Y-m-d",strtotime($this->input->post('event_start_date')));
               $this->event_model->event_start_time = $this->input->post('event_start_time');
                $this->event_model->event_end_date =  date("Y-m-d",strtotime($this->input->post('event_end_date')));
               $this->event_model->event_end_time = $this->input->post('event_end_time');
               $this->event_model->event_location = $this->input->post('event_location');
               $this->event_model->event_location_lat = $this->input->post('location_latitude');
               $this->event_model->event_location_lng = $this->input->post('location_longitude');
               $this->event_model->event_contact_person = $this->input->post('event_contact_person');
               $this->event_model->event_contact_phone = $this->input->post('event_phone');
               $this->event_model->event_contact_email = $this->input->post('event_email');
               $this->event_model->event_description = $this->input->post('event_description');
              $this->event_model->event_postedby = $postedby;
            if($_FILES['event_image']['name'] != "")
         {
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG|PNG';
            $config['upload_path'] = './uploads/events';
            $config['file_name'] = 'direc'.time();
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('event_image');
            $logo = $this->upload->data();
            $this->event_model->event_image =$logo['file_name'];
         }

             $count=count($_FILES['slider_images']['name']);
         if(!empty($_FILES['slider_images']['name'][0]))
        {
          
            $filesCount = count($_FILES['slider_images']['name']);
            for($i = 0; $i < $filesCount; $i++)
            {
                $_FILES['userFile']['name'] = $_FILES['slider_images']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['slider_images']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['slider_images']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['slider_images']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['slider_images']['size'][$i];

                $uploadPath = './uploads/events';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPEG|PNG|JPG';
                $time = time();
                $config['file_name'] = "SUS_".$time;
                $config['overwrite'] = false;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile'))
                {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['slider_images'] = $fileData['file_name'];
                }
            }

            $db_images = $this->event_model->get_images_by_id($event_id);
            
            $image_array = array();
            if(!empty($db_images->featured_image)) 
            {
                $image_array = unserialize($db_images->featured_image);
            }

            for($i=0;$i<count($uploadData);$i++) 
            {
                array_push($image_array,$uploadData[$i]['slider_images']);
            }
            if(!empty($image_array))
            {
                echo $slider_img=serialize($image_array);
            } 
        }
        else
        {
            $imgs = $this->event_model->get_images_by_id($event_id);
            $slider_img = $imgs->featured_image;
        }
            $this->event_model->featured_image =$slider_img;


            $this->event_model->update_event($event_id);
            //echo $event_id;
           /* $seat_type = $this->input->post('seat_type');
            print_r($seat_type);
            echo count($seat_type);
               $seat_rate = $this->input->post('seat_rate');
                print_r($seat_rate);
              $no_seat = $this->input->post('no_seat'); 
               print_r($no_seat);
              //echo count($seat_type);exit;
                for($i=0;$i<count($seat_type);$i++)
                {
                    echo $i;
                   // $this->tbl_merchant_branch->branch_shop_id = $shop_id;
                    $seat_type=$seat_type[$i];
                      $data = array(
                     'seat_type' =>$seat_type[$i],
                     'seat_rate' =>$seat_rate[$i],
                     'seat_total' =>$no_seat[$i]
                     );
                    //print_r($data);
                    
                    //   $this->event_model->seat_type = $seat_type[$i];
                    //  $this->event_model->seat_rate = $seat_rate[$i];
                    // $this->event_model->seat_total = $no_seat[$i];
                    $this->event_model->update_seat($event_id,$data,$seat_type);
               } */
            $this->session->set_flashdata('message', 'Event Updated successfully');
           redirect('admin/home/events');
      }
    }
    //////close ecent edit///////
      function remove_image()
    {
      $id    = $_POST['id'];
      $image = $_POST['type'];
      $data['image']=$this->event_model->select_image($id,$image);
    }
    function category_delete()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->event_model->category_delete_status = 1;
        $category_id=$this->input->post('category_id');
        $this->event_model->delete_category($category_id);
        $this->session->set_flashdata('message', 'Category deleted successfully');
        redirect('admin/home/category');
    }

    function category_edit($category_id)
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category_name', 'Name', 'required');
        if($this->form_validation->run() == FALSE)
      {
        $data['category']= $this->event_model->single_category_id($category_id);
        $data["posts"] = $this->event_model->display_category();
        $this->load->view('admin/add-category',$data);
      }
      else
      {
      //$this->event_model->about_dr_moinu = $this->input->post('about_moinu');
        $this->event_model->category_name = $this->input->post('category_name');
        $this->event_model->update_category($category_id);
        $this->session->set_flashdata('message', 'category Updated successfully');
        redirect('admin/home/category');
      }
        //print_r($category_id);
    }

    function category_status()
    {
		  $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $category_status = $this->input->post('status');
        $category_id = $this->input->post('id');
        $this->event_model->update_category_status($category_id,$category_status);
    }
	/////faq status//////
	    function faq_status()
    {
		  $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $faq_status = $this->input->post('status');
        $faq_id = $this->input->post('id');
        $this->event_model->update_faq_status($faq_id,$faq_status);
    }
	/////close faq status////
		    function vdo_testimonial_status()
    {
		  $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $vdo_testimonial_status = $this->input->post('status');
        $vdo_testimonial_id = $this->input->post('id');
        $this->event_model->update_vdotestimonial_status($vdo_testimonial_id,$vdo_testimonial_status);
    }
	/////close testimonial status////
		    function testimonial_status()
    {
		  $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $testimonial_status = $this->input->post('status');
        $testimonial_id = $this->input->post('id');
        $this->event_model->update_testimonial_status($testimonial_id,$testimonial_status);
    }
	/////close testimonial status////
	    function blog_status()
    {
		  $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $blog_status = $this->input->post('status');
        $blog_id = $this->input->post('id');
        $this->event_model->update_blog_status($blog_id,$blog_status);
    }
	/////close blog status////
	    function about_status()
    {
		  $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $about_status = $this->input->post('status');
        $about_id = $this->input->post('id');
        $this->event_model->update_about_status($about_id,$about_status);
    }
	//////close about status/////
		    function slider_status()
    {
		  $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $slider_status = $this->input->post('status');
        $slider_id = $this->input->post('id');
        $this->event_model->update_slider_status($slider_id,$slider_status);
    }
	//////close about status/////
	    function event_status()
    {
		  $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $event_status = $this->input->post('status');
        $event_id = $this->input->post('id');
        $this->event_model->update_event_status($event_id,$event_status);
    }
	/////close event status////////
    ////package status////////
            function package_status()
    {
          $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $package_status = $this->input->post('status');
        $package_id = $this->input->post('id');
        $this->event_model->update_package_status($package_id,$package_status);
    }
    /////close event status////////
    ////close package status////
	//////course status/////
	    function course_status()
    {
		  $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $course_status = $this->input->post('status');
        $course_id = $this->input->post('id');
        $this->event_model->update_course_status($course_id,$course_status);
    }
	/////close course status////////
	//////start notification/////
	function notification()
	{
		  $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
		$data['notification']=$this->event_model->get_notification();
		$this->load->view('admin/header',$data);
	}
	///close notification//////
    function add_course(){ 
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $data["all_course"] = $this->event_model->display_course();
		
        //$data["category"] = $this->course_model->get_category(); 
        //$data["get_course"] = $this->course_model->get_course();       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('course_name','course Name','required');
        //$this->form_validation->set_rules('course_slug','Slug','required');
        //$this->form_validation->set_rules('course_seo_title','Seo Title','required');
        //$this->form_validation->set_rules('course_category', 'Category', 'required');
        //$this->form_validation->set_rules('course_image', '', 'callback_file_check');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/add-course',$data);
        }
        else{
            	
            $config['upload_path']          = './uploads/course/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
            //'course_language' => $this->input->post('course_language'),   
            if($this->upload->do_upload('course_image'))
            {
                $file_data=$this->upload->data();
                $files=$file_data['file_name'];
                $language=implode(",",$this->input->post('course_language'));
                $data=array(
                'course_name' => $this->input->post('course_name'),
                'course_description' =>$this->input->post('course_description'),
                'course_duration' =>$this->input->post('course_duration'), 
                'course_rate' =>$this->input->post('course_rate'), 
                'course_renewal_rate' =>$this->input->post('renewal_rate'), 
				'course_language' =>$language ,
                'course_top_status' =>$this->input->post('top_course'),     				
                'course_image'  => $files
                );
                
                $this->event_model->insert_course($data);
                $this->session->set_flashdata('success', 'Course inserted Successfully');
                redirect('admin/home/course');
            }
            else
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/add-blog', $error);
            }          				
        }
    }

	
	     /////course edit/////////
    function course_edit($course_id)
    {
          $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('course_name', 'Name', 'required');
        if($this->form_validation->run() == FALSE)
      {
        $data["all_course"] = $this->event_model->display_course();
        $data["single_course"]= $this->event_model->single_course_id($course_id);
        $this->load->view('admin/add-course',$data);
      }
      else
      {
            //$postedby='admin';
            $this->event_model->course_name = $this->input->post('course_name');
			$this->event_model->course_description = $this->input->post('course_description');
			$this->event_model->course_duration = $this->input->post('course_duration');
			$this->event_model->course_rate = $this->input->post('course_rate');
			$this->event_model->course_renewal_rate = $this->input->post('renewal_rate');
			$this->event_model->course_top_status = $this->input->post('top_course');
			$this->event_model->course_language = $this->input->post('course_language');
            if($_FILES['course_image']['name'] != "")
         {
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG|PNG';
            $config['upload_path'] = './uploads/course';
            $config['file_name'] = 'direc'.time();
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('course_image');
            $logo = $this->upload->data();
            $this->event_model->course_image =$logo['file_name'];
         }
            $this->event_model->update_course($course_id);
            $this->session->set_flashdata('success', 'Course Updated successfully');
            redirect('admin/home/course');
      }
    }
    //////close ecent edit///////
	
	
	
    function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png');
        $mime = get_mime_by_extension($_FILES['course_image']['name']);
        if(isset($_FILES['course_image']['name']) && $_FILES['course_image']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }

    function course(){
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
		$this->data["all_course"] = $this->event_model->display_course();
        //$this->data["all_course"] = $this->event_model->get_all_course();
        //$this->data["get_course"] = $this->event_model->get_course();
        $this->data["language"] = $this->event_model->get_all_language();
        //print_r($this->data["language"]);exit;
        $this->load->view('admin/add-course', $this->data);
    }
////////add more course module///////
        function add_branch()
    {
        //echo "hai";
        //exit;
        //$country = $this->tbl_location->get_country();
        //$city = $this->tbl_location->get_cities();
        //$language = $this->event_model->get_all_language();
        $response = '';
        $fieldHTML = '
            <div style="width:100%;float:left;">
                <div class="j-span3 j-unit">
                    <div class="j-input">
                        <input type="text" id="first_name" name="seat_type[]" placeholder="Seat Type" value="">
                        <span class="j-tooltip j-tooltip-right-top">Seat Type</span>
                    </div>
                </div>
        ';
        $fieldHTML.= '
            <div class="j-span3 j-unit"> 
                <div class="j-input">
                    <input type="text" id="first_name" name="seat_rate[]" placeholder="Rate" value="">
                    <span class="j-tooltip j-tooltip-right-top">Rate</span>
                </div>
            </div>
        ';
		$fieldHTML.= '
            <div class="j-span3 j-unit">
                <div class="j-input">
                    <input type="text" id="first_name" name="no_seat[]" placeholder="No Seat " value="">
                    <span class="j-tooltip j-tooltip-right-top">No Of Seat</span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <a href="javascript:void(0);" class="remove_button" data-id="" title="Add field" style="">Cancel</a>
                </div>
            </div>
        ';
        $response['fieldHTML'] = $fieldHTML;
        echo json_encode($response);
    }
   
    //////close add more course module/////
    // function course_delete($course_id)
    // {
    //     $this->admin->start_session();
    //     if(!$this->admin->is_loggedin())
    //     {
    //       redirect('admin/home/login');
    //     }
    //     $this->course_model->delete_course($course_id);
    //     $this->session->set_flashdata('success', 'Course deleted successfully');
    //     redirect('admin/home/course');
    // }

    // function course_edit($course_id)
    // {
    //     $this->admin->start_session();
    //     if(!$this->admin->is_loggedin())
    //     {
    //       redirect('admin/home/login');
    //     }
    //     $data["course"]= $this->course_model->single_course_id($course_id);
    //     $data["get_course"] = $this->course_model->get_course();
    //     $data["category"] = $this->course_model->get_category();
    //     $this->load->view('admin/update-course',$data);
    // }

    // function course_update($course_id)
    // {
    //     $this->admin->start_session();
    //     if(!$this->admin->is_loggedin())
    //     {
    //       redirect('admin/home/login');
    //     }
    //     $config['upload_path']          = './uploads/course/';
    //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
    //     //$config['max_size']   = '100';
    //     //$config['max_width'] = '1024';
    //     //$config['max_height'] = '768';
    //     $this->load->library('upload', $config);
    //     $this->upload->initialize($config);

    //     if($this->upload->do_upload('course_image'))
    //     {
    //         $course_image=$this->upload->data();
    //         $courseimage=$course_image['file_name'];
    //     }
    //     else
    //     {
    //       $courseimage=$this->input->post('image');
    //     }

    //      $course_slug = preg_replace('/\s+/', '', $this->input->post('course_slug'));
    //     $data = array(
    //         'course_category' => $this->input->post('course_category'),
    //         'course_name' => $this->input->post('course_name'),
    //         'course_seo_title' => $this->input->post('course_seo_title'),
    //         'course_slug' =>$course_slug,
    //         'course_meta_description' => $this->input->post('course_meta_description'),
    //         'course_meta_keywords' => $this->input->post('course_meta_keywords'),
    //         'course_title' => $this->input->post('course_title'),
    //         'course_caption' =>$this->input->post('course_caption'),
    //         'course_content' =>$this->input->post('course_content'),
    //         'course_duration' => $this->input->post('course_duration'),
    //         'course_parent' => $this->input->post('course_parent'),
    //         'course_priority' => $this->input->post('course_priority'),
    //         'course_home_visible' => $this->input->post('course_home_visible'),
    //         'course_enquiry_form' => $this->input->post('course_enquiry_form'),
    //         'course_image'      => $courseimage
    //     );
    //     $this->course_model->update_course($course_id, $data);
    //     $this->session->set_flashdata('success', 'Course updated successfully');
    //     redirect('admin/home/course');
    //     //print_r($courseimage);
    // }
  
    // function course_status()
    // {
    //     $this->admin->start_session();
    //     if(!$this->admin->is_loggedin())
    //     {
    //       redirect('admin/home/login');
    //     }
    //     $course_status = $this->input->post('status');
    //     $course_id = $this->input->post('id');
    //     $this->course_model->update_course_status($course_id,$course_status);
    // }


    function add_blog(){ 
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $data["all_blog"] = $this->course_model->display_blog();     
        $this->load->library('form_validation');
        $this->form_validation->set_rules('blog_title','Title','required');
        $this->form_validation->set_rules('blog_postedby', 'Name', 'required');
        //$this->form_validation->set_rules('blog_image', '', 'callback_blog_file_check');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/add-blog',$data);
        }
        else{

            $config['upload_path']          = './uploads/blog/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
               
            if($this->upload->do_upload('blog_image'))
            {
                $file_data=$this->upload->data();
                $files=$file_data['file_name'];
                $blog_slug = preg_replace('/\s+/', '', $this->input->post('blog_slug'));
                $data=array(
                'blog_language' => $this->input->post('blog_language'),
                'blog_title' => $this->input->post('blog_title'),
                'blog_description' =>$this->input->post('blog_description'),
                'blog_postedby' =>$this->input->post('blog_postedby'),            
                'blog_image'  => $files
                );
                
                $this->event_model->insert_blog($data);
                $this->session->set_flashdata('message', 'Blog inserted Successfully');
                redirect('admin/home/blog');
            }
            else
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/add-blog', $error);
            }                     
        }
    }

    function blog_file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png');
        $mime = get_mime_by_extension($_FILES['blog_image']['name']);
        if(isset($_FILES['blog_image']['name']) && $_FILES['blog_image']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('blog_file_check', 'Please select only jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('blog_file_check', 'Please choose a file to upload.');
            return false;
        }
    }

    function blog(){
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->data["all_blog"] = $this->event_model->display_blog();
        $this->load->view('admin/add-blog', $this->data);
    }
   //////testimonial////////

    // function testimonial(){
    //     $this->admin->start_session();
    //     if(!$this->admin->is_loggedin())
    //     {
    //       redirect('admin/home/login');
    //     }
    //     $this->data["all_testimonial"] =$this->event_model->display_testimonial();
    //     $this->load->view('admin/add-testimonial', $this->data);
    // }
    ///////close testimonial///////
    function blog_delete()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->event_model->blog_delete_status = 1;
        $blog_id=$this->input->post('blog_id');
        $this->event_model->delete_blog($blog_id);
        $this->session->set_flashdata('message', 'Blog deleted successfully');
        redirect('admin/home/blog');
    }

    function blog_edit($blog_id)
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('blog_title', 'Name', 'required');
        if($this->form_validation->run() == FALSE)
       {
        $data["blog"]= $this->event_model->single_blog_id($blog_id);
        //print_r($data["blog"]);
        $data["all_blog"] = $this->event_model->display_blog();
        $this->load->view('admin/add-blog',$data);
      }
      else
      {
        $postedby='admin';
              
            $this->event_model->blog_language = $this->input->post('blog_language');
            $this->event_model->blog_title = $this->input->post('blog_title');
            $this->event_model->blog_postedby = $this->input->post('blog_postedby');
            $this->event_model->blog_description = $this->input->post('blog_description');
            //s$this->event_model->about_postedby = $postedby;
            if($_FILES['blog_image']['name'] != "")
         {
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG|PNG';
            $config['upload_path'] = './uploads/blog';
            $config['file_name'] = 'direc'.time();
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('blog_image');
            $logo = $this->upload->data();
            $this->event_model->blog_image =$logo['file_name'];
         }
            $this->event_model->update_blog($blog_id);
            $this->session->set_flashdata('message', 'Blog Updated successfully');
            redirect('admin/home/blog');
      }

    }

    function delete_blog_image()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $blog_id = $this->input->post('id');
        $blog_type = $this->input->post('type');
        $delete=$this->course_model->delete_blog_image($blog_id,$blog_type);
        //echo 'success';
        echo json_encode('success');

    }
////////add sliders//////////
     function add_slider(){ 
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $data["all_slider"] = $this->event_model->display_slider();
        //$data["all_course"] = $this->course_model->get_course();     
        $this->load->library('form_validation');
        //$this->form_validation->set_rules('testimonial_course','Course','required');
        $this->form_validation->set_rules('slider_text','Name','required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/add-slider',$data);
        }
        else{
            $config['upload_path']   = './uploads/slider/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
               
            if($this->upload->do_upload('slider_image'))
            {
                $file_data=$this->upload->data();
                 $files=$file_data['file_name'];
                //$blog_slug = preg_replace('/\s+/', '', $this->input->post('blog_slug'));
                $testimonial_type='1';
                $data=array(
                 'slider_text' => $this->input->post('slider_text'),
                 'slider_image'  => $files,
                
            );
            if($this->event_model->insert_slider($data))
           {
            $this->session->set_flashdata('message', 'Slider inserted Successfully');
            //echo $this->session->flashdata('message');
            //exit;
            }
           
            redirect('admin/home/slider');     
            }
                  
        }
    }
    ///////close add sliders////
    function add_testimonial(){ 
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $data["all_testimonial"] = $this->event_model->display_testimonial();
        //$data["all_course"] = $this->course_model->get_course();     
        $this->load->library('form_validation');
        //$this->form_validation->set_rules('testimonial_course','Course','required');
        $this->form_validation->set_rules('testimonial_name','Name','required');
        $this->form_validation->set_rules('testimonial_review','Post','required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/add-testimonial',$data);
        }
        else{
            $config['upload_path']   = './uploads/testimonial/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);  
               
            if($this->upload->do_upload('user_image'))
            {
                $file_data=$this->upload->data();
                echo $files=$file_data['file_name'];
                //$blog_slug = preg_replace('/\s+/', '', $this->input->post('blog_slug'));
                $testimonial_type='1';
                $data=array(
                
                'testimonial_name' => $this->input->post('testimonial_name'),
                'testimonial_review' => $this->input->post('testimonial_review'),
                'testimonial_image'  => $files,
                'testimonial_type'=>$testimonial_type
            );
               $this->event_model->insert_testimonial($data);
            $this->session->set_flashdata('message', 'Testimonial inserted Successfully');
            redirect('admin/home/testimonial');     
            }
            // $data=array(
                
            //     'testimonial_name' => $this->input->post('testimonial_name'),
            //     'testimonial_review' => $this->input->post('testimonial_review')
            // );
            
                  
        }
    }
    //////add vdo testimonial////////
        function add_vdo_testimonial(){ 
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $data["all_testimonial"] = $this->event_model->display_testimonial();
        //$data["all_course"] = $this->course_model->get_course();     
        $this->load->library('form_validation');
        //$this->form_validation->set_rules('testimonial_course','Course','required');
        $this->form_validation->set_rules('testimonial_title','Name','required');
        $this->form_validation->set_rules('testimonial_link','Post','required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/add-testimonial',$data);
        }
        else{
     
                $testimonial_type='2';
                $data=array(
                
                'testimonial_title' => $this->input->post('testimonial_title'),
                'testimonial_youtube_link' => $this->input->post('testimonial_link'),
                'testimonial_type'=>$testimonial_type
            );
               $this->event_model->insert_vdo_testimonial($data);
            $this->session->set_flashdata('message', 'Vdo Testimonial Added Successfully');
            redirect('admin/home/vdo_testimonial');     
            }
         
            
                  
       
    }
    /////close add vdo testimonial/////
    ///////////faq/////////
       function faq(){
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->data["all_faq"] = $this->event_model->display_faq();
        //$this->data["all_course"] = $this->course_model->get_course();
        $this->load->view('admin/add-faq', $this->data);
    }
    ///////close faq//////
    //////add faq///////
            function add_faq(){ 
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $data["all_faq"] = $this->event_model->display_faq();
        //$data["all_course"] = $this->course_model->get_course();     
        $this->load->library('form_validation');
        //$this->form_validation->set_rules('testimonial_course','Course','required');
        $this->form_validation->set_rules('faq_title','Name','required');
        $this->form_validation->set_rules('faq_description','Post','required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/add-faq',$data);
        }
        else
        {
          
                $data=array(
                
                'faq_title' => $this->input->post('faq_title'),
                'faq_description' => $this->input->post('faq_description'),
            );
            $this->event_model->insert_faq($data);
            $this->session->set_flashdata('message', 'Faq Added Successfully');
            redirect('admin/home/faq');     
            }
         
            
                  
       
    }
    //////close add faq/////
    /////slider start//////
    function slider()
    {
      $this->admin->start_session();
      if(!$this->admin->is_loggedin())
      {
        redirect('admin/home/login');
      }
      $this->data["all_slider"]=$this->event_model->display_slider();
      $this->load->view('admin/add-slider',$this->data);
    }
    /////close slider start////
    function testimonial(){
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->data["all_testimonial"] = $this->event_model->display_testimonial();
        //$this->data["all_course"] = $this->course_model->get_course();
        $this->load->view('admin/add-testimonial', $this->data);
    }
      function vdo_testimonial(){
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->data["all_testimonial"] = $this->event_model->display_vdo_testimonial();
        //$this->data["all_course"] = $this->course_model->get_course();
        $this->load->view('admin/add-vdo-testimonial', $this->data);
    }

    function testimonial_delete()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->event_model->testimonial_delete_status = 1;
        $testimonial_id=$this->input->post('testimonial_id');
        $this->event_model->delete_testimonial($testimonial_id);
        $this->session->set_flashdata('message', 'Testimonial deleted successfully');
        redirect('admin/home/testimonial');
    }
    ////////slider delete////////
     function slider_delete()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->event_model->slider_delete_status = 1;
        $slider_id=$this->input->post('slider_id');
        $this->event_model->delete_slider($slider_id);
        $this->session->set_flashdata('message', 'Slider deleted successfully');
        redirect('admin/home/slider');
    }
    ///////close slider delete//////
    ////vdo testimo delete////
       function vdo_testimonial_delete()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->event_model->testimonial_delete_status = 1;
        $testimonial_id=$this->input->post('vdo_testimonial_id');
        $this->event_model->delete_vdo_testimonial($testimonial_id);
        $this->session->set_flashdata('message', 'Vdo Testimonial deleted successfully');
        redirect('admin/home/vdo_testimonial');
    }
    ////close vdo testimo delete///
    ///////faq delete//////
   function faq_delete()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        //$this->course_model->delete_testimonial($testimonial_id);
        $this->event_model->faq_delete_status = 1;
        $faq_id=$this->input->post('faq_id');
        $this->event_model->delete_faq($faq_id);
        $this->session->set_flashdata('message', 'Faq deleted successfully');
        redirect('admin/home/faq');
    }
    /////close faq delete////////
    ///////start slider edit/////////
       function slider_edit($slider_id)
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('slider_text', 'Name', 'required');
        if($this->form_validation->run() == FALSE)
      {
        $data["slider"]= $this->event_model->single_slider_id($slider_id);
        $data["all_slider"] = $this->event_model->display_slider();
        $this->load->view('admin/add-slider',$data);
    }
     else
      {
        $postedby='admin';
              
            $this->event_model->slider_text = $this->input->post('slider_text');
            //s$this->event_model->about_postedby = $postedby;
            if($_FILES['slider_image']['name'] != "")
         {
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG|PNG';
            $config['upload_path'] = './uploads/slider';
            $config['file_name'] = 'direc'.time();
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('slider_image');
            $logo = $this->upload->data();
            $this->event_model->slider_image =$logo['file_name'];
         }
            $this->event_model->update_slider($slider_id);
            $this->session->set_flashdata('message', 'Slider Updated successfully');
            redirect('admin/home/slider');
      }
    }
    //////close slider edit////////
    function testimonial_edit($testimonial_id)
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('testimonial_name', 'Name', 'required');
        if($this->form_validation->run() == FALSE)
      {
        $data["testimonial"]= $this->event_model->single_testimonial_id($testimonial_id);
        $data["all_testimonial"] = $this->event_model->display_testimonial();
        $this->load->view('admin/add-testimonial',$data);
    }
     else
      {
        $postedby='admin';
              
            //$this->event_model->about_dr_moinu = $this->input->post('about_moinu');
            $this->event_model->testimonial_name = $this->input->post('testimonial_name');
             $this->event_model->testimonial_review = $this->input->post('testimonial_review');
            //s$this->event_model->about_postedby = $postedby;
            if($_FILES['user_image']['name'] != "")
         {
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG|PNG';
            $config['upload_path'] = './uploads/testimonial';
            $config['file_name'] = 'direc'.time();
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->do_upload('user_image');
            $logo = $this->upload->data();
            $this->event_model->testimonial_image =$logo['file_name'];
         }
            $this->event_model->update_testimonial($testimonial_id);
            $this->session->set_flashdata('message', 'Testimonial Updated successfully');
            redirect('admin/home/testimonial');
      }
    }
    //////vdo testimonial edit/////
      function vdo_testimonial_edit($testimonial_id)
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('testimonial_title', 'Name', 'required');
        if($this->form_validation->run() == FALSE)
      {
        $data["testimonial"]= $this->event_model->single_testimonial_id($testimonial_id);
        //print_r($data["testimonial"]);exit;
        $data["all_testimonial"] = $this->event_model->display_vdo_testimonial();
        $this->load->view('admin/add-vdo-testimonial',$data);
    }
     else
      {
        $postedby='admin';
            $this->event_model->testimonial_title = $this->input->post('testimonial_title');
            $this->event_model->testimonial_youtube_link = $this->input->post('testimonial_link');
            $this->event_model->update_testimonial($testimonial_id);
            $this->session->set_flashdata('message', 'Vdo Testimonial Updated successfully');
            redirect('admin/home/vdo_testimonial');
      }
    }
    /////close vdo testimonial edit//////
///////////faq edit///////////
        function faq_edit($faq_id)
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('faq_title', 'Name', 'required');
        if($this->form_validation->run() == FALSE)
        {
        $data["faq"]= $this->event_model->single_faq_id($faq_id);
        $data["all_faq"] = $this->event_model->display_faq();
        $this->load->view('admin/add-faq',$data);
        }
     else
      {
        //$postedby='admin';
              
            //$this->event_model->about_dr_moinu = $this->input->post('about_moinu');
            $this->event_model->faq_title = $this->input->post('faq_title');
            $this->event_model->faq_description = $this->input->post('faq_description');
            $this->event_model->update_faq($faq_id);
            $this->session->set_flashdata('message', 'Faq Updated successfully');
            redirect('admin/home/faq');
      }
    }
    ///////close faq edit//////
    // function testimonial_update($testimonial_id)
    // {
    //     $this->admin->start_session();
    //     if(!$this->admin->is_loggedin())
    //     {
    //       redirect('admin/home/login');
    //     }

    //     $data = array(
    //         'testimonial_course' => $this->input->post('testimonial_course'),
    //         'testimonial_name' => $this->input->post('testimonial_name'),
    //         'testimonial_sourse' => $this->input->post('testimonial_sourse'),
    //         'testimonial_review' => $this->input->post('testimonial_review')
    //     );
    //     $this->course_model->update_testimonial($testimonial_id, $data);
    //     $this->session->set_flashdata('success', 'Testimonial updated successfully');
    //     redirect('admin/home/testimonial');
    // }
  
    /*function testimonial_status()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $testimonial_status = $this->input->post('status');
        $testimonial_id = $this->input->post('id');
        $this->course_model->update_testimonial_status($testimonial_id,$testimonial_status);
    }*/

        function enquiry(){
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->data["all_enquiry"] = $this->event_model->get_all_enquiry();
        $this->load->view('admin/enquiry', $this->data);
        }
    /////booked events////////
        function booked_events()
     {
       $data['all_bookings']=$this->event_model->booked_events();
       //print_r($data['booked_events']);exit;
       $this->load->view('admin/bookings',$data);
     }
     //////close booked events////
     /////event delete/////
    function booking_delete()
    {
        $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $this->event_model->booking_delete_status = 1;
        $booking_id=$this->input->post('booking_id');
        $this->event_model->delete_booking($booking_id);
        $this->session->set_flashdata('message', 'Booking Details deleted successfully');
        redirect('admin/home/booked_events');
    }
    /////close booking delete/////////
    //////close booking status/////
        function booking_status()
    {
          $this->admin->start_session();
        if(!$this->admin->is_loggedin())
        {
          redirect('admin/home/login');
        }
        $booking_status = $this->input->post('status');
        $booking_id = $this->input->post('id');
        $this->event_model->update_booking_status($booking_id,$booking_status);
    }
    /////close event status////////
    public function deleteSeat() {
        $seatid = $this->input->post('id');
        echo  $this->event_model->deleteSeat($seatid);
    }





}

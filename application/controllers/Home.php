<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('course_model');
        $this->load->model('site_model');
        $this->load->model('event_model');
       // $this->load->model('user_model');
    }

	public function index()
	{
		// $data['category'] = $this->course_model->get_category(); 
  //       $data['seo'] = $this->course_model->get_category(); 
		// $data['courses'] = $this->site_model->display_home_course(); 
  //       $data['all_batch'] = $this->site_model->display_batch();
		// $this->load->view('homepage', $data);
	}
    public function all_events()
    {
        $data['all_events']=$this->site_model->display_events();
        echo json_encode($data);
    }
    public function recent_events()
    {
        $data['recent_events']=$this->site_model->recent_events();
        echo json_encode($data);
    }
    public function all_blogs()
    {
        $data['all_blogs']=$this->site_model->display_blog();
        echo json_encode($data);
    }
    public function all_vdo_testimonials()
    {
        $data['all_vdo_testimonials']=$this->site_model->display_vdo_testimonial();
        echo json_encode($data);
    }
    public function all_text_testimonials()
    {
       $data['all_text_testimonials']=$this->site_model->display_text_testimonial();
       echo json_encode($data);
    }

    
    function search_events()
    {
        $event_name = $this->input->post('event_name');
        $event_category = $this->input->post('event_category');
        //$data['category_id'] = @$this->tbl_function->get_name_from_id($event_category,'setup_city','city_id','city_name');
        $data['event_details'] = $this->site_model->event_search($event_name,$event_category);
        print_r($data['event_details']);
         // if(!empty($data['course_details'])) {
         //   $this->load->view('course_details', $data);
         // } else {
         //     redirect('home/index');
         // }
    }

}

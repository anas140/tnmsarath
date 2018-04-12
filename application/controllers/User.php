<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct()
    {
        parent::__construct();
       
        $this->load->model('course_model');
        $this->load->model('site_model');
        $this->load->model('event_model');
        $this->load->model('user_model');
    }
	public function index()
	{
		$this->user_model->start_session();
    if(!$this->user_model->is_loggedin())
    {
      redirect('Home');
    }	 
    $register_id=$this->user_model->register_id;
    //$data['country'] = $this->tbl_location->get_country();  
		$data['userdata']= $this->user_model->get_profile($register_id);
    //print_r($data['userdata']);exit;

		//$this->load->view('my-account.php',$data);
	}

      function register_user()
    {   
        $register_date=date('Y-m-d');
        $name=$this->user_model->register_firstname = $this->input->post('register_firstname');
        $this->user_model->register_lastname = $this->input->post('register_lastname');
        $this->user_model->register_nationality = $this->input->post('register_nationality');
        $this->user_model->register_location = $this->input->post('register_location');
        $this->user_model->register_dob = date("Y-m-d",strtotime($this->input->post('register_dob')));
        $this->user_model->register_gender = $this->input->post('register_gender');
        $this->user_model->register_mobile = $this->input->post('register_mobile');
        $email=$this->user_model->register_email = $this->input->post('register_email');
        $this->user_model->register_username = $this->input->post('register_username');
        $register_password=$this->user_model->register_password = $this->input->post('register_password');
        $hash = password_hash($register_password, PASSWORD_DEFAULT);
        $this->user_model->register_password = $hash;
        $this->user_model->register_date = $register_date;
        $register_id=$this->user_model->insert_register();
        $this->session->set_userdata('register_id',$register_id);
        $this->user_model->start_session();   
         $config = array(
          'protocol' => 'smtp', 
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'keltronsarutty@gmail.com', 
          'smtp_pass' => 'phpdeveloper', 
          'mailtype' => 'html', 
          'smtp_timeout' => '4',
          'charset' => 'iso-8859-1'
        );

    $this->load->library('email',$config);
    $this->email->set_newline("\r\n");
    $this->email->set_mailtype("html");
    $this->email->from('keltronsarutty@gmail.com', 'moinu');
    $this->email->to($email); 
    $this->email->subject('Confirmation from Success Valley');
    $data['name'] = $name;
    $data['email'] = $email;
    $data['password'] = $register_password;
    //$body=$this->load->view('mail/signup_mail',$data,TRUE);
    //$this->email->message($body);
    //$this->email->send();
    }
        function login()
  {
      $register_username=$this->input->post('username');
      $register_password=$this->input->post('password'); 
    if ($this->user_model->user_check($register_username, $register_password )) 
    {
       
      $register_id=$this->user_model->register_id;
      if($register_id>0)
      {             
        $this->session->set_userdata('register_id',$register_id);
        //$this->session->set_userdata('userId',$register_id);
        $this->user_model->start_session();                        
        //redirect($header_type);
      }
    } 
    else 
    {
       //redirect($header_type);
    }
  }

     function logout()
  {
    $this->user_model->start_session();
    if(!$this->user_model->is_loggedin())
    {
      redirect('Home/index');
    }
    $this->session->unset_userdata('register_id');
    redirect('Home/index');
  }
  public function update_user()
  {
        $register_id=$this->input->post('register_id');
        $register_id='11';
     //$this->load->model('tbl_user');

     // if($_FILES['register_image']['name']!='')
     //     {
     //      $current_date = date('Y-m-d H:i:s');
     //      $config['allowed_types']='gif|jpg|jpeg|png|GIF|JPEG|PNG|JPG';
     //      $config['upload_path']='./uploads/user';
     //      $time = time();
     //      $config['file_name'] = "sus".$time;
     //      $config['overwrite'] = false;
     //      $this->load->library('upload',$config);
     //      $image=$this->upload->do_upload('register_image');
     //      $itemimage1=$this->upload->data();
     //      $register_image = $itemimage1['file_name'];
     //      //$itemimage1['file_name']=$this->input->post('temp_name');
     //     }
     //     else
     //     {
     //      $register_image = $this->input->post('db_img');
     //     }
    
     $data=array('register_firstname'=>$this->input->post('register_firstname'),
                  'register_lastname'=>$this->input->post('register_lastname'),
                 'register_nationality'=>$this->input->post('register_nationality'),
                 'register_location'=>$this->input->post('register_location'),
                 'register_dob'=>date("Y-m-d",strtotime($this->input->post('register_dob'))),
                 'register_gender'=>$this->input->post('register_gender'),
                 'register_mobile'=>$this->input->post('register_mobile'),
                 'register_email' =>$this->input->post('register_email'));
                 //'register_image'=>$register_image);
                  $this->user_model->update_user($register_id, $data);
      // echo $id; exit; 
     redirect('user/profile');
  }

  public function bookings()
  {
    // $this->user_model->start_session();
    // if(!$this->user_model->is_loggedin())
    // {
    //   redirect('Home');
    // }
     $data['booked_events']=$this->user_model->my_booked_events();
     print_r($data['booked_events']);
    //$this->load->view('booking.php');
  }
  
  function user_forgot_password()
{
  $this->load->view('header');
    $this->load->view('user_forgot_password');
    $this->load->view('footer');
}

function find_mail_exists() 
  {
    //echo "dsw"; exit;
    if(isset($_GET['email']) && $_GET['email']!="")
    {
     // echo '/////'.$_GET['email'];
      $data['email'] = $this->tbl_user->mail_exists($_GET['email']);
      //print_r($data['email']);
      $data['numrows'] = count( $data['email']);
      //print_r($data);
      echo json_encode($data);
    }
  }
  
  
  
  function find_username_exists() 
  {
    //echo "dsw"; exit;
    if(isset($_GET['username']) && $_GET['username']!="")
    {
      
      $data['username'] = $this->tbl_user->username_exists($_GET['username']);
      $data['numrows'] = count( $data['username']);
      //print_r($data);
      echo json_encode($data);
    }
  }
  

  








  
  
}
?>
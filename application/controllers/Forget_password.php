<?php
class Forget_password extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('tbl_user');
      }
	  

     function index()
     {
        //$email= $this->input->post('email');
        $email= 'pramishapreman@gmail.com';
		$name= 'Pramisha';
		$this->load->helper('string');
		$rs= random_string('alnum', 40);
		
		$this->tbl_user->update_user_email($email, $rs);
		
         $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'smtp.gmail.com.',
             'smtp_port' => 465,
             'smtp_user' => 'keltronsarutty@gmail.com', 
             'smtp_pass' => 'phpdeveloper', 
             'mailtype' => 'html',
             'charset' => 'iso-8859-1',
             'wordwrap' => TRUE
          ); 

        $this->load->library('email',$config);
		$this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");


		$this->email->from('pramishaprami1234@gmail.com', 'Test');
		$this->email->to($email); 
		$this->email->subject('Forget');
		$data['name'] = $name;
		$data['reset_link']=base_url().'forget_password/get_reset_link/'.$rs;
		$body=$this->load->view('reset_password_email',$data,TRUE);
		$this->email->message($body);
		if($this->email->send())
                {
                   echo 'success';
                } else {
                   echo 'failed';  
                }
        echo 'check your email';
     }
     
     
    public function get_reset_link($rs=FALSE)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_password', 'Password Confirmation', 'required');
        
        //$options = ['cost' => 11];
        $passwordFromPost = $this->input->post('user_password');
        $res_rs= $this->input->post('rs');
       // $password = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
       $password = $passwordFromPost;
        
        
        $query = $this->tbl_user->get_mail($rs);
        $data['rs'] = $rs;
        if(!empty($query))
        {
            $e_mail = $query->useremail;
        }
        else
        {
            $e_mail="";
        }
        
        if($e_mail!="")
        {
        	 if ($this->form_validation->run() == FALSE)
        	 {
        		echo form_open();
        		$this->load->view('header');
        	  	$this->load->view('reset_password', $data);
        	  	$this->load->view('footer');
        	 }
        	 else
        	 {			
        		$this->tbl_user->update_password($password, $res_rs);
        		echo $status = 'success';
        	 }
         }
         else
         {
            echo $status = 'expired';
        	//redirect('resetpassword/email_success/'.$status);
         }
        } 
     
}
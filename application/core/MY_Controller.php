<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model');
		$this->load->model('site_model');
		//$this->load->model('user_model');
	}


	
}

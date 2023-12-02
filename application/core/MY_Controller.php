<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller{


    public function __construct() {
        parent::__construct();
       
       
       
        date_default_timezone_set('Asia/Kolkata'); 
		if (empty($this->session->userdata('loginname')))
		{

			redirect('Login'); 
	
		}
		
        $this->load->model('Login_model');

    }


}

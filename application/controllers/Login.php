<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Login extends CI_Controller
 {
    public function __construct() {
        parent::__construct();
        $this->load->model( 'Login_model' );

    }

    public function index() {
        if ( $this->session->userdata( 'loginname' ) ) {
            redirect( '' );
        } else {
            $this->load->view( 'login' );
        }
    }

    public function loginProcess() 
    {
        $data[ 'u_user_name' ]	 = 	$this->db->escape_str( $this->input->post( 'textUsername', TRUE ) );
        $data[ 'u_password' ]   = 	$this->db->escape_str( $this->input->post( 'textPassword', TRUE ) );
        $data[ 'u_active' ]	    =   '10';

        $this->Login_model->logincheck( $data );
    }

    public function logout() 
    {
        $this->session->unset_userdata( 'loginid' );
        $this->session->unset_userdata( 'loginname' );
        $this->session->unset_userdata( 'loginFullName' );
        $this->session->unset_userdata( 'erlogin' );

        redirect( 'Login' );
    }
    public function UserSignUp() 
    {
       
            $this->load->view( 'SignupView' );
        
    }
    public function RegisterUser() 
    {
        $userName = $this->db->escape_str($this->input->post('textUsername', TRUE));
        $userEmail = $this->db->escape_str($this->input->post('textEmail', TRUE));
        $userPassword = $this->db->escape_str($this->input->post('textPassword', TRUE));
        $userCnPassword = $this->db->escape_str($this->input->post('textConfirmPassword', TRUE));
    
        $data = array(
            'u_fullname' => $userName,
            'u_user_name' => $userEmail,
            'u_password' => $userPassword,
            'u_confirm_password' => $userCnPassword,
            'u_active' => '10'
        );
    
        $this->db->insert('User_Details', $data);
    
        $this->session->set_flashdata('success', 'Welcome, ' . $userName . '&nbsp;!');
    
        redirect('login/registration_success'); 
    
    }
    
    public function registration_success() 
    {
        $data['message'] = $this->session->flashdata('success');
        $this->load->view('registration_success_view', $data);
        
        header('refresh:5;url=' . base_url('Login')); 
    }
}
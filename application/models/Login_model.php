<?php
 defined('BASEPATH') OR exit('No direct script access allowed');  
class Login_model extends CI_Model
{

    public function __construct(){ 
		parent::__construct(); 
		$this->load->database(); 
	} 
    public function logincheck($data)
    { 
    $sql	=	$this->db->get_where('User_Details',$data);
     
    if($sql->num_rows()>0){ 
        $user	=	$sql->row_array(); 
        $this->session->set_userdata('loginid',$user['u_id_pk']); 
        $this->session->set_userdata('loginname',$user['u_user_name']); 
        $this->session->set_userdata('loginFullName',$user['u_fullname']); 

        $this->session->set_userdata('erlogin',$user['u_password']); 

        redirect('Admin/Dashboard');
    } 
    else{ 
        $this->session->set_flashdata('msg', 'Login Error : Username / Password incorrect!');
        redirect('Login'); 
       $this->session->flashdata('msg');
    } 
}
}
?>
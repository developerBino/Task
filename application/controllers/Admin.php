<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Admin extends MY_Controller
 {
    public function __construct() {
        parent::__construct();
        $this->load->model( 'Login_model' );
        $this->load->model( 'Utility_Model' );

    }

    public function index() 
    {
        $this->load->view( 'login' );
    }

    public function Dashboard()
    {
        $details[ 'Menu_List' ] = $this->Utility_Model->getMenus();
        $details[ 'Total_Task' ] = $this->Utility_Model->getTotalTask();
        $details[ 'Total_Comp' ] = $this->Utility_Model->getTotalTaskCompleted(1);
        $details[ 'Total_Pend' ] = $this->Utility_Model->getTotalTaskCompleted(0);


        $this->load->view( 'Header', $details );
        $this->load->view( 'index' );
        $this->load->view( 'Footer' );

    }

}
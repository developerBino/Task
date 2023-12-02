<?php

class Utility_Model extends CI_Model
{

function __construct()
{ 
    parent::__construct();
}

public function getMenus() 
{
    $query       = "SELECT * FROM Page_Menu";

    $sql         =  $this->db->query($query);
    return          $sql->result_array();
}
public function getTotalTaskCompleted($status) 
{
    $query       = "SELECT count(*) as NofTaskCompleted FROM Task_Details 
                    where tt_added_by ='".$this->session->userdata('loginid')."' and tt_is_completed='".$status."'";

    $sql         =  $this->db->query($query);
    return          $sql->result_array();
}
public function getTotalTask() 
{
    $query       = "SELECT count(*) as TotalNoTask FROM Task_Details 
                    where tt_added_by ='".$this->session->userdata('loginid')."'";

    $sql         =  $this->db->query($query);
    return          $sql->result_array();
}
public function getItemTotal() 
{
    $query       = "SELECT count(*) as TotalItems FROM ERP_ItemMaster where eim_active ='10'";

    $sql         =  $this->db->query($query);
    return          $sql->result_array();
}
}

?>
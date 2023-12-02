<?php

class Master_Model extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    public function getAllTask($id)
    {
        $query       = 'SELECT * FROM Task_Details where tt_active = 10 and tt_added_by = "'.$id.'" order by 1 desc';
        $sql         =  $this->db->query($query);
        return          $sql->result_array();
    }
    public function updateTaskCompletionStatus($taskId, $updateData) 
    {
        $this->db->where('tt_id_pk', $taskId);
        $this->db->update('Task_Details', $updateData);
    }
    
    public function get_task_details($userId)
    {
        $query = $this->db->get_where('Task_Details', array('tt_id_pk' => $userId));
        return $query->row_array();
    }
    public function searchMenus($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('Page_Menu');
        $this->db->like('pm_menu_name', $searchTerm);
        $this->db->where('pm_parent_menu <>', ''); 

        $query = $this->db->get();
        log_message('debug', 'Last SQL Query: ' . $this->db->last_query());

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
   
    
   
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masters extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_Model');
        $this->load->model('Utility_Model');
    }

    public function index()
    {
        $details['allTaskData'] =  $this->Master_Model->getAllTask($this->session->userdata('loginid'));
        $details['Menu_List'] = $this->Utility_Model->getMenus();
        $this->load->view('Header', $details);
        $this->load->view('TaskView', $details);
        $this->load->view('Footer');
    }

    public function InsertTask()
    {
        $TaskTitle = $TaskDescription = $TaskDueDate = $text_id_pk ='';
        $TaskTitle          = $this->input->post( 'TaskTitle' );
        $TaskDescription    = $this->input->post( 'TaskDescription' );
        $TaskDueDate        = $this->input->post( 'TaskDueDate' );
        $text_id_pk         = $this->input->post( 'text_id_pk' );
        $data = array(
            'tt_TaskTitle' => $TaskTitle,
            'tt_TaskDescription' => $TaskDescription,
            'tt_TaskDueDate' => date( 'Y-m-d', strtotime( $TaskDueDate ) ),
            'tt_active' => '10',
            'tt_added_by' => $this->session->userdata('loginid')
        );
        if ($text_id_pk != '') {
            $this->db->where('tt_id_pk', $text_id_pk);
            $this->db->update('Task_Details', $data);
        } else {
            $this->db->insert('Task_Details', $data);
        }
        if ($text_id_pk != '') {
            echo 'Task Details Updated Successful!';
        } else {
            echo 'Task Added Successful!';
        }
    }
    public function updateTaskCompletion() 
    {
        
            $taskId = $this->input->post('taskId');
            $isChecked = $this->input->post('isChecked');
    
            $updateData = array('tt_is_completed' => $isChecked); 
            $this->Master_Model->updateTaskCompletionStatus($taskId, $updateData); 
    
            $response = array(
                'status' => 'success',
                'message' => 'Task completion status updated successfully.'
            );
    
            header('Content-Type: application/json');
            echo json_encode($response);
        
    }
    public function getTaskDetails()
    {
        $taskId = $this->input->post('taskId');
        $taskDetails = $this->Master_Model->get_task_details($taskId);
        header('Content-Type: application/json');
        echo json_encode($taskDetails);
    }
    public function DeleteTaskDetails()
    {
        $taskId = $this->input->post('taskId');
        $this->db->where('tt_id_pk', $taskId);
        $this->db->delete('Task_Details');
        $message ='Task Deleted Successfully';
        echo json_encode($message);
    }
    public function autocompleteData()
    {
        $term = $this->input->get('query');
        $autocompleteData = $this->Master_Model->searchMenus($term);
        echo json_encode($autocompleteData);
    }
    public function ProgressInDev()
    {
        $details['Menu_List'] = $this->Utility_Model->getMenus();
        $this->load->view('Header', $details);
        $this->load->view('ProgressInDevView', $details);
        $this->load->view('Footer');
    }
    

}

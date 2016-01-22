<?php
class New_issue extends CI_Controller {
    
    function create_issue() 
    {
        $this->form_validation->set_rules('title', 'title', 'required',
                                         array('required' => 'You must have a %s for your issue.')
                                         );
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('new_issue_view');
        }
        else
        {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $today = date("Y-m-d", time());
            
            $bug_data = array(
                'name'              =>  $title,
                'description'       =>  $description,
                'date_submitted'    =>  $today,
            //    'categoryID'        =>  $category,
            //    'priorityID'        =>  $priority,
            //    'userID'            =>  $userID,
                'statusID'          => 1
            );
            
            $this->db->insert('bugs', $bug_data);
            //$this->load->view('success');
        }
            
    }
}
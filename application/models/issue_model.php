<?php

class Issue_model extends CI_Model {
     
    function create_issue() 
    {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $priority = $_POST['priority'];
            $today = date("Y-m-d", time());
            
            $bug_data = array(
                'name'              =>  $title,
                'description'       =>  $description,
                'date_submitted'    =>  $today,
            //    'categoryID'        =>  $category,
                'priorityID'        =>  $priority,
            //    'userID'            =>  $userID,
                'statusID'          => 1
            );
            
            $this->db->insert('bugs', $bug_data);
            //$this->load->view('success');
    }
        
    function delete_issue() {
        
    }
    
    function edit_issue() {
        
    }
    
    function get_active_issues() {
        
    }
  
    function get_all_issues() {
        $q = $this->db->get('bugs');
        
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
                return $data;
        }
    }

    function get_specific_issue($id) {
        $this->db->where('id', $id);
        $q = $this->db->get('bugs');
        
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
                return $data;
        }
    }
    
    function sort_issues($sort) {
        
        if ($sort == "priority")
        {
            $this->db->order_by('priorityID', 'ASC');
            $q = $this->db->get('bugs');

            if($q->num_rows() > 0)
            {
                foreach ($q->result() as $row)
                {
                    $data[] = $row;
                }
                    return $data;
            }  
        }

    }
    
    function update_issue_status() {
        
    }

}
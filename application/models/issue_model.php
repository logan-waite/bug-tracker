<?php

class Issue_model extends CI_Model {
     
    function create_issue() {
        
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

    function update_issue_status() {
        
    }

}
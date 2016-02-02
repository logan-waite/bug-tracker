<?php

class Issue_model extends CI_Model {
    
    function close_issue() {    // Update issue with active = 0 and leave final comment
        
        $id = $_POST['id'];
        $description = $_POST['description'];
        $today = date("Y-m-d H:i:s");
        
        $bug_data = array(
            'active'        => 0,
            'date_closed'   => $today,
            'statusID'      => 5
        );
        
        $this->db->where('id', $id);
        $this->db->update('bugs', $bug_data);
        
        $comment_data = array(
            'bugID'             => $id,
            'title'             => "Issue Closed",
            'content'           => $description,
        //    'userID'            => $userID,
            'date_submitted'    => $today
        );
        $this->db->reset_query();  
        $this->db->insert('comments', $comment_data);
    }
    
    function create_issue()     // Create new issue with form data
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
            'statusID'          =>  $priority,
        //    'userID'            =>  $userID,
            'active'            => 1
        );

        $this->db->insert('bugs', $bug_data);
        //$this->load->view('success');
    }
        
    function delete_issue() {
        
    }
    
    function edit_issue() {
        $issue = $_POST['id'];
        $title = $_POST['issueTitle'];
        $description = $_POST['editDescription'];
        $today = date("Y-m-d", time());

        $bug_data = array(
            'name'              =>  $title,
        //    'categoryID'        =>  $category,
        //    'userID'            =>  $userID,
            'description'       =>  $description
        );

        $this->db->where('id', $issue);
        $this->db->update('bugs', $bug_data);
        //$this->load->view('success');
    }
    
    function get_active_issues() {  // Returns every active issue
        
        $this->db->where('active', 1);
        $this->db->order_by('date_submitted', 'ASC');
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
  
    function get_all_issues() { // Return every issue found in database
        
        $q = $this->db->get('bugs');
        $this->db->order_by('date_submitted', 'ASC');
        
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
                return $data;
        }
    }

    function get_specific_issue($id) {  // get a single specific issue
        
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
    
    function sort_issues($sort, $active) {  // sort issues by date or priority
        
        // Check to see if we want active issues
        if (isset($active)) 
        {
            $this->db->where('active', 1);
        }
        
        if ($sort == "priority")
        {
            $this->db->order_by('statusID', 'ASC');
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
        elseif ($sort == "date")  
        {
            $this->db->order_by('date_submitted', 'ASC');
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
    
    function update_issue_status($status, $issue) { // Updates issue status

        $bug_data = array(
            'statusID'      => $status
        );
        
        $this->db->where('id', $issue);
        $this->db->update('bugs', $bug_data);
        
    }

}
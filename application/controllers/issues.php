<?php
class Issues extends CI_Controller {
    
    
    function close_issue() {
        $this->form_validation->set_rules('description', 'description', 'required',
                                         array('required' => 'Please enter a %s.')
                                         );
        
        if ($this->form_validation->run() == FALSE)
        {
            //$this->load->view('home');
        }
        else
        {
            $this->load->model("issue_model");
            $this->issue_model->close_issue();
        }     
    }
    
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
            $this->load->model("issue_model");
            $this->issue_model->create_issue();
        }
    }

    function edit_issue() 
    {
        $this->form_validation->set_rules('issueTitle', 'title', 'required',
                                         array('required' => 'You must have a %s for your issue.')
                                         );
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('new_issue_view');
        }
        else
        {
            $this->load->model("issue_model");
            $this->issue_model->edit_issue();
        }
    }
        
    function choose_issue() {
        $id = trim($_POST['issueID']);
        
        $this->load->model('issue_model');
        $issue['issue'] = $this->issue_model->get_specific_issue($id);
        $page = $this->load->view('issue_header', $issue, TRUE);
        
        
        $this->load->model('comment_model');
        if ($this->comment_model->get_comments($id))
        {
            $data['comments'] = $this->comment_model->get_comments($id);            
            $page .= $this->load->view("comments", $data, TRUE);
            echo $page;  
        }
        else
        {
            $page .= "<div class='comment'>
            <h4>No comments have been made for this issue yet.</h4>
            </div>";   
            
            echo $page; 
        }
    }
    
    function new_issue() {
        $page = $this->load->view('new_issue_view', '', TRUE);
        echo $page;
        
    }
    
    function current_issues() {
        $this->load->model('issue_model');
        $data['issues'] = $this->issue_model->get_active_issues();
        $page = $this->load->view('current_issues', $data, TRUE);
        echo $page;
    }
    
    function sort_by($active) {
        $sort = trim($_POST['sort_by']);
        $this->load->model('issue_model');
        $data['issues'] = $this->issue_model->sort_issues($sort, $active);
        $page = $this->load->view('issues', $data, TRUE);
        echo $page;
    }
    
    function change_status() {
        $status_id = $_POST['status_id'];
        $issue_id = $_POST['issue_id'];
        $sort_by = $_POST['sort_by'];
        $active = $_POST['active'];
        
        $this->load->model('issue_model');
        $this->issue_model->update_issue_status($status_id, $issue_id);
        $data['issues'] = $this->issue_model->sort_issues($sort_by, $active);
        $page = $this->load->view('issues', $data, TRUE);
        echo $page;
    }
}
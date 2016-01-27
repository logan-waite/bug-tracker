<?php
class Ajax extends CI_Controller {
    
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
        $data['issues'] = $this->issue_model->get_all_issues();
        $page = $this->load->view('current_issues', $data, TRUE);
        echo $page;
    }
    
    function sort_by() {
        $sort = trim($_POST['sort_by']);
        $this->load->model('issue_model');
        $data['issues'] = $this->issue_model->sort_issues($sort);
        $page = $this->load->view('issues', $data, TRUE);
        echo $page;
    }
}

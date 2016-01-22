<?php
class Ajax extends CI_Controller {
    
    function choose_issue() {
        $this->load->model('comment_model');
        $id = trim($_POST['issueID']);
        $data['comments'] = $this->comment_model->get_comments($id);
        $page = $this->load->view("comments", $data, TRUE);
        echo $page;
        
    }
    
    function new_issue() {
        $page = $this->load->view('new_issue', '', TRUE);
        echo $page;
        
    }
    
    function current_issues() {
        $this->load->model('issue_model');
        $data['issues'] = $this->issue_model->get_all_issues();
        $page = $this->load->view('current_issues', $data, TRUE);
        echo $page;
    }
}
